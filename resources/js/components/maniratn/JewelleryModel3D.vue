<script setup lang="ts">
import * as THREE from 'three';
import { onMounted, onUnmounted, ref } from 'vue';

const canvasRef = ref<HTMLCanvasElement | null>(null);
let renderer: THREE.WebGLRenderer;
let animationId: number;
let mouseX = 0, mouseY = 0;
let tRotX = 0, tRotY = 0;
const cleanups: Array<() => void> = [];

// ── Prismatic gem shader ───────────────────────────────────
const VERT = /* glsl */`
    varying vec3 vViewNormal;
    varying vec3 vWorldPos;
    void main() {
        vViewNormal = normalize(normalMatrix * normal);
        vWorldPos   = (modelMatrix * vec4(position, 1.0)).xyz;
        gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
    }
`;

const FRAG = /* glsl */`
    uniform float uTime;
    varying vec3  vViewNormal;
    varying vec3  vWorldPos;

    vec3 hue2rgb(float h) {
        h = fract(h);
        return clamp(vec3(
            abs(h * 6.0 - 3.0) - 1.0,
            2.0 - abs(h * 6.0 - 2.0),
            2.0 - abs(h * 6.0 - 4.0)
        ), 0.0, 1.0);
    }

    void main() {
        float NdotV   = abs(vViewNormal.z);
        float fresnel = pow(1.0 - NdotV, 2.6);

        // Chromatic split: separate exponents per channel (real prism dispersion)
        float frR = pow(1.0 - clamp(NdotV + 0.06, 0.0, 1.0), 2.2);
        float frG = pow(1.0 - clamp(NdotV,        0.0, 1.0), 2.8);
        float frB = pow(1.0 - clamp(NdotV - 0.06, 0.0, 1.0), 3.4);

        // Per-facet animated hue
        float fn  = sin(vWorldPos.x * 7.0 + vWorldPos.y * 11.2 + vWorldPos.z * 5.5);
        vec3 rain = hue2rgb(fract(fn * 0.38 + uTime * 0.035));

        // Two-wave caustic interference
        float ca  = sin(vWorldPos.x * 8.5 + vWorldPos.z * 6.0 + uTime * 1.5);
        float cb  = sin(vWorldPos.y * 10.5 + vWorldPos.x * 4.0 - uTime * 1.1);
        vec3 caust = hue2rgb(fract((ca * cb) * 0.5 + 0.5 + uTime * 0.05));

        // 6-point sparkle star at specular peak
        float pk  = pow(NdotV, 3.5);
        float star =  exp(-pow(vViewNormal.x * 15.0, 2.0))
                    + exp(-pow(vViewNormal.y * 15.0, 2.0))
                    + exp(-pow((vViewNormal.x - vViewNormal.y) * 12.5, 2.0)) * 0.65
                    + exp(-pow((vViewNormal.x + vViewNormal.y) * 12.5, 2.0)) * 0.65;
        star *= pk;

        // Gold shimmer on interior facets
        float shim = sin(vWorldPos.y * 13.0 + vWorldPos.x * 8.0 + uTime * 2.1) * 0.5 + 0.5;
        vec3 gold  = vec3(0.92, 0.66, 0.09);

        // Deep blue-indigo crystal interior → bright at edges (always visible)
        vec3 base = mix(vec3(0.12, 0.08, 0.32), vec3(0.95, 0.97, 1.0), NdotV * 0.65 + 0.15);

        // Chromatic rainbow
        vec3 color = base;
        color.r = mix(color.r, rain.r, frR * 0.95);
        color.g = mix(color.g, rain.g, frG * 0.85);
        color.b = mix(color.b, rain.b, frB * 0.95);

        // Caustic interior overlay
        color  = mix(color, caust, 0.28 * (1.0 - frG));

        // Gold shimmer
        color  = mix(color, gold, shim * 0.22 * NdotV);

        // Star burst (bright — visible even without bloom)
        color += vec3(1.6, 1.3, 0.95) * star * 3.5;

        // Warm gold rim
        color.r += frR * 0.65;
        color.g += frG * 0.28;

        // Pulsing core warmth
        float pulse = sin(uTime * 2.3) * 0.25 + 0.75;
        color += gold * (1.0 - NdotV) * 0.45 * pulse;

        gl_FragColor = vec4(color, 0.92);
    }
`;

// Soft glow corona shader (additive, BackSide)
const GLOW_FRAG = /* glsl */`
    uniform float uTime;
    uniform vec3  uColor;
    varying vec3  vViewNormal;
    varying vec3  vWorldPos;
    void main() {
        float rim   = pow(1.0 - abs(vViewNormal.z), 1.8);
        float pulse = sin(uTime * 2.4) * 0.22 + 0.78;
        gl_FragColor = vec4(uColor * rim * pulse, rim * 0.55 * pulse);
    }
`;

onMounted(() => {
    const el = canvasRef.value!;

    // Use actual rendered size — el must have explicit height (set via CSS height: 580px)
    const w = el.clientWidth  || 540;
    const h = el.clientHeight || 580;

    const scene  = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(44, w / h, 0.1, 60);
    camera.position.set(0, 0.4, 7.2);
    camera.lookAt(0, 0, 0);

    // alpha: true so canvas blends with dark section background
    renderer = new THREE.WebGLRenderer({ canvas: el, alpha: true, antialias: true });
    renderer.setSize(w, h);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

    const uTime = { value: 0 };

    // helper: make a glow shader mesh (additive corona)
    function makeGlow(radius: number, col: THREE.ColorRepresentation, opacity: number) {
        return new THREE.Mesh(
            new THREE.IcosahedronGeometry(radius, 2),
            new THREE.ShaderMaterial({
                vertexShader: VERT,
                fragmentShader: GLOW_FRAG,
                uniforms: {
                    uTime,
                    uColor: { value: new THREE.Color(col) },
                },
                transparent: true,
                depthWrite: false,
                side: THREE.BackSide,
                blending: THREE.AdditiveBlending,
                opacity,
            }),
        );
    }

    // ── Central hero gem ────────────────────────────────────
    const heroGeo = new THREE.IcosahedronGeometry(1.35, 2);
    const heroGem = new THREE.Mesh(heroGeo, new THREE.ShaderMaterial({
        vertexShader: VERT,
        fragmentShader: FRAG,
        uniforms: { uTime },
        transparent: true,
        side: THREE.DoubleSide,
        depthWrite: false,
    }));
    scene.add(heroGem);

    // Edge crystal lines
    scene.add(new THREE.LineSegments(
        new THREE.EdgesGeometry(heroGeo),
        new THREE.LineBasicMaterial({ color: 0xE8C96D, transparent: true, opacity: 0.25 }),
    ));

    // Fake glow corona — 3 additive layers
    scene.add(makeGlow(1.55, 0xC4922A, 0.9));
    scene.add(makeGlow(2.10, 0xC4922A, 0.6));
    scene.add(makeGlow(3.20, 0xAA6600, 0.3));

    // Halo rings (static, tilted — like Saturn rings)
    const haloRingDefs = [
        { r: 1.65, tube: 0.016, rx: 0.30,           rz: 0,             col: 0xE8C96D, op: 0.55 },
        { r: 1.85, tube: 0.010, rx: Math.PI / 2.5,  rz: Math.PI / 4,   col: 0xC4922A, op: 0.38 },
        { r: 2.05, tube: 0.007, rx: -Math.PI / 3.0, rz: -Math.PI / 5,  col: 0xA07010, op: 0.26 },
    ];
    const haloRings = haloRingDefs.map(({ r, tube, rx, rz, col, op }) => {
        const m = new THREE.Mesh(
            new THREE.TorusGeometry(r, tube, 8, 160),
            new THREE.MeshBasicMaterial({
                color: col, transparent: true, opacity: op,
                depthWrite: false, blending: THREE.AdditiveBlending,
            }),
        );
        m.rotation.set(rx, 0, rz);
        scene.add(m);

        return m;
    });

    // ── Colored jewel satellites ────────────────────────────
    type SatDef = { r: number; spd: number; tx: number; tz: number; col: number };
    const satDefs: SatDef[] = [
        { r: 2.70, spd: 0.40, tx:  0,             tz: 0,           col: 0xFF2244 }, // ruby
        { r: 3.10, spd: 0.28, tx:  Math.PI / 2.7, tz: Math.PI / 5, col: 0x00E87A }, // emerald
        { r: 2.50, spd: 0.46, tx: -Math.PI / 3.1, tz: Math.PI / 4, col: 0x4488FF }, // sapphire
        { r: 2.90, spd: 0.22, tx:  Math.PI / 1.9, tz: Math.PI / 6, col: 0xCC44FF }, // amethyst
        { r: 3.30, spd: 0.19, tx:  Math.PI / 4.4, tz: -Math.PI / 5,col: 0xFF9944 }, // topaz
    ];

    const orbits = satDefs.map(({ r, tx, tz, col }) => {
        const plane = new THREE.Group();
        plane.rotation.x = tx;
        plane.rotation.z = tz;
        scene.add(plane);

        const size = 0.20 + Math.random() * 0.12;
        const geo  = new THREE.OctahedronGeometry(size, 0);

        // Gem body — MeshPhongMaterial so lighting adds depth
        const mesh = new THREE.Mesh(geo, new THREE.MeshPhongMaterial({
            color: col, emissive: new THREE.Color(col).multiplyScalar(0.5),
            specular: 0xFFFFFF, shininess: 400,
            transparent: true, opacity: 0.92, side: THREE.DoubleSide,
        }));
        mesh.position.x = r;
        plane.add(mesh);

        // Edge lines
        const el2 = new THREE.LineSegments(
            new THREE.EdgesGeometry(geo),
            new THREE.LineBasicMaterial({ color: col, transparent: true, opacity: 0.7 }),
        );
        el2.position.x = r;
        plane.add(el2);

        // Fake glow — two additive spheres at gem position
        [size * 2.8, size * 5.5].forEach((gr, gi) => {
            const gm = new THREE.Mesh(
                new THREE.SphereGeometry(gr, 8, 8),
                new THREE.MeshBasicMaterial({
                    color: col, transparent: true, opacity: gi === 0 ? 0.18 : 0.07,
                    depthWrite: false, blending: THREE.AdditiveBlending,
                }),
            );
            gm.position.x = r;
            plane.add(gm);
        });

        // Orbital trail ring
        const trail = new THREE.Mesh(
            new THREE.TorusGeometry(r, 0.008, 4, 160),
            new THREE.MeshBasicMaterial({
                color: col, transparent: true, opacity: 0.14,
                depthWrite: false, blending: THREE.AdditiveBlending,
            }),
        );
        trail.rotation.x = Math.PI / 2;
        plane.add(trail);

        // Point light at gem
        const light = new THREE.PointLight(col, 1.5, 6);
        light.position.x = r;
        plane.add(light);

        return { plane, mesh };
    });

    const orbitAngles = satDefs.map(() => Math.random() * Math.PI * 2);

    // ── Constellation lines ─────────────────────────────────
    const tmpV  = new THREE.Vector3();
    const lines = satDefs.map(() => {
        const geo = new THREE.BufferGeometry().setFromPoints([new THREE.Vector3(), new THREE.Vector3()]);
        const mat = new THREE.LineBasicMaterial({ color: 0xC4922A, transparent: true, opacity: 0 });
        scene.add(new THREE.Line(geo, mat));

        return { geo, mat };
    });

    // ── Galaxy spiral dust ──────────────────────────────────
    const dustN   = 480;
    const dustPos = new Float32Array(dustN * 3);
    let di = 0;

    for (let arm = 0; arm < 2; arm++) {
        for (let i = 0; i < dustN / 2; i++) {
            const t = i / (dustN / 2);
            const a = t * Math.PI * 7 + arm * Math.PI;
            const r = 1.8 + t * 3.6;
            dustPos[di++] = Math.cos(a) * r + (Math.random() - 0.5) * 0.8;
            dustPos[di++] = (Math.random() - 0.5) * 0.5;
            dustPos[di++] = Math.sin(a) * r + (Math.random() - 0.5) * 0.8;
        }
    }

    const dustGeo = new THREE.BufferGeometry();
    dustGeo.setAttribute('position', new THREE.BufferAttribute(dustPos, 3));
    const dustMat = new THREE.PointsMaterial({
        color: 0xE8C96D, size: 0.05, transparent: true, opacity: 0.65,
        sizeAttenuation: true, depthWrite: false, blending: THREE.AdditiveBlending,
    });
    const dust = new THREE.Points(dustGeo, dustMat);
    scene.add(dust);

    // Far stars
    const starN   = 200;
    const starPos = new Float32Array(starN * 3);

    for (let i = 0; i < starN; i++) {
        const r = 5.5 + Math.random() * 3.5;
        const t = Math.random() * Math.PI * 2;
        const p = Math.acos(2 * Math.random() - 1);
        starPos[i * 3]     = r * Math.sin(p) * Math.cos(t);
        starPos[i * 3 + 1] = r * Math.sin(p) * Math.sin(t);
        starPos[i * 3 + 2] = r * Math.cos(p);
    }

    const starGeo = new THREE.BufferGeometry();
    starGeo.setAttribute('position', new THREE.BufferAttribute(starPos, 3));
    scene.add(new THREE.Points(starGeo, new THREE.PointsMaterial({
        color: 0xFFF5EE, size: 0.04, transparent: true, opacity: 0.32,
        sizeAttenuation: true, depthWrite: false, blending: THREE.AdditiveBlending,
    })));

    // ── Lights ──────────────────────────────────────────────
    scene.add(new THREE.AmbientLight(0x221108, 4));

    const key  = new THREE.PointLight(0xFFE4AA, 6, 22);
    key.position.set(5, 5, 6);
    scene.add(key);

    const fill = new THREE.PointLight(0x8899FF, 3, 22);
    fill.position.set(-6, 2, 4);
    scene.add(fill);

    const rim  = new THREE.PointLight(0xFFCC44, 4, 16);
    rim.position.set(0, -5, -4);
    scene.add(rim);

    // ── Mouse ───────────────────────────────────────────────
    const onMM = (e: MouseEvent) => {
        const rect = el.getBoundingClientRect();
        mouseX = (e.clientX - rect.left) / rect.width  - 0.5;
        mouseY = (e.clientY - rect.top)  / rect.height - 0.5;
    };
    window.addEventListener('mousemove', onMM);
    cleanups.push(() => window.removeEventListener('mousemove', onMM));

    // ── Resize ──────────────────────────────────────────────
    const onResize = () => {
        const nw = el.clientWidth  || 540;
        const nh = el.clientHeight || 580;
        camera.aspect = nw / nh;
        camera.updateProjectionMatrix();
        renderer.setSize(nw, nh);
    };
    window.addEventListener('resize', onResize);
    cleanups.push(() => window.removeEventListener('resize', onResize));

    // ── Animation ───────────────────────────────────────────
    let t = 0;

    const animate = () => {
        animationId = requestAnimationFrame(animate);
        t += 0.005;
        uTime.value = t * 8;

        tRotX += (mouseY * 0.4 - tRotX) * 0.04;
        tRotY += (mouseX * 0.5 - tRotY) * 0.04;

        // Hero gem breathe + rotate
        heroGem.rotation.y = t * 0.24 + tRotY;
        heroGem.rotation.x = Math.sin(t * 0.20) * 0.08 + tRotX;
        const breath = 1 + Math.sin(t * 1.55) * 0.025;
        heroGem.scale.setScalar(breath);

        // Halo rings spin independently
        haloRings[0].rotation.z  = t * 0.12;
        haloRings[1].rotation.y  = t * 0.09;
        haloRings[2].rotation.x += 0.0007;

        // Satellite orbits
        satDefs.forEach(({ spd }, i) => {
            orbitAngles[i] += spd * 0.005;
            orbits[i].plane.rotation.y = orbitAngles[i];
            orbits[i].mesh.rotation.y  = t * 1.4 + i;
            orbits[i].mesh.rotation.z  = t * 0.9 + i;
        });

        // Constellation lines update
        orbits.forEach(({ mesh }, i) => {
            mesh.getWorldPosition(tmpV);
            const pos = lines[i].geo.attributes.position as THREE.BufferAttribute;
            pos.setXYZ(0, 0, 0, 0);
            pos.setXYZ(1, tmpV.x, tmpV.y, tmpV.z);
            pos.needsUpdate = true;
            lines[i].mat.opacity = (Math.sin(t * 1.8 + i * 1.4) * 0.5 + 0.5) * 0.22;
        });

        // Galaxy dust drift
        dust.rotation.y  =  t * 0.04;
        dust.rotation.x  = -t * 0.013;
        dustMat.opacity   = 0.45 + Math.sin(t * 2.8) * 0.20;

        // Orbiting lights
        key.position.x  = Math.cos(t * 0.65) * 6.5;
        key.position.z  = Math.sin(t * 0.65) * 6.5;
        fill.position.x = Math.cos(t * 0.45 + Math.PI) * 6;
        fill.position.z = Math.sin(t * 0.45 + Math.PI) * 5;

        renderer.render(scene, camera);
    };
    animate();
});

onUnmounted(() => {
    cancelAnimationFrame(animationId);
    renderer?.dispose();
    cleanups.forEach(fn => fn());
    cleanups.length = 0;
});
</script>

<template>
    <canvas ref="canvasRef" class="mj-3d-canvas"></canvas>
</template>

<style scoped>
.mj-3d-canvas {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    display: block;
}
</style>
