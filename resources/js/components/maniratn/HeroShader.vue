<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

const canvas = ref<HTMLCanvasElement | null>(null);
let gl: WebGLRenderingContext | null = null;
let program: WebGLProgram | null = null;
let vertexBuffer: WebGLBuffer | null = null;
let uTimeLocation: WebGLUniformLocation | null = null;
let uResolutionLocation: WebGLUniformLocation | null = null;
let resizeMediaQuery: MediaQueryList | null = null;
let intersectionObserver: IntersectionObserver | null = null;
let animId = 0;
let isVisible = true;
let isTabVisible = true;
let lastFrameTime = 0;
let pixelRatioCap = 1.5;
let targetFrameDuration = 1000 / 30;

const VERT = `
attribute vec2 a_pos;
void main() { gl_Position = vec4(a_pos, 0.0, 1.0); }
`;

const FRAG = `
precision highp float;
uniform float u_time;
uniform vec2  u_res;

// ── hash & noise ────────────────────────────────────────
float hash(vec2 p) {
    p = fract(p * vec2(127.1, 311.7));
    p += dot(p, p + 19.19);
    return fract(p.x * p.y);
}
float noise(vec2 p) {
    vec2 i = floor(p), f = fract(p);
    f = f * f * (3.0 - 2.0 * f);
    float a = hash(i),
          b = hash(i + vec2(1,0)),
          c = hash(i + vec2(0,1)),
          d = hash(i + vec2(1,1));
    return mix(mix(a,b,f.x), mix(c,d,f.x), f.y);
}

// ── fractal brownian motion ──────────────────────────────
float fbm(vec2 p) {
    float v = 0.0, a = 0.5;
    mat2 rot = mat2(0.80, 0.60, -0.60, 0.80);
    for (int i = 0; i < 7; i++) {
        v += a * noise(p);
        p  = rot * p * 2.1;
        a *= 0.48;
    }
    return v;
}

void main() {
    vec2 uv = gl_FragCoord.xy / u_res;
    float t  = u_time * 0.14;

    // domain warp — two passes
    vec2 q = vec2(fbm(uv * 2.2 + t),
                  fbm(uv * 2.2 + vec2(5.2, 1.3) + t * 0.9));
    vec2 r = vec2(fbm(uv * 1.8 + 2.0 * q + vec2(1.7, 9.2) + t * 1.1),
                  fbm(uv * 1.8 + 2.0 * q + vec2(8.3, 2.8) + t * 0.8));
    float f = fbm(uv * 1.5 + 2.2 * r + t * 0.5);

    // ── palette ────────────────────────────────────────────
    vec3 dark    = vec3(0.025, 0.005, 0.005);   // near-black crimson
    vec3 ink     = vec3(0.06,  0.015, 0.015);   // very dark ink
    vec3 wine    = vec3(0.22,  0.04,  0.04);    // deep wine
    vec3 crimson = vec3(0.42,  0.07,  0.07);    // #6B1212
    vec3 gold1   = vec3(0.769, 0.573, 0.165);   // #C4922A
    vec3 gold2   = vec3(0.91,  0.788, 0.427);   // #E8C96D

    // ── layered blend ──────────────────────────────────────
    vec3 col = dark;
    col = mix(col,    ink,     smoothstep(0.05, 0.2, f));
    col = mix(col,    wine,    smoothstep(0.18, 0.42, f));
    col = mix(col,    crimson, smoothstep(0.36, 0.60, f));
    col = mix(col,    gold1,   smoothstep(0.58, 0.78, f));
    col = mix(col,    gold2,   smoothstep(0.74, 0.90, f) * 0.7);

    // ── soft radial center glow ────────────────────────────
    vec2 vc = uv - vec2(0.62, 0.48);
    float glow = exp(-dot(vc, vc) * 3.5) * 0.18;
    col += gold1 * glow;

    // ── edge vignette ──────────────────────────────────────
    vec2 vv = uv - 0.5;
    float vig = 1.0 - dot(vv, vv) * 1.6;
    col *= max(vig, 0.0);

    // ── subtle film grain ──────────────────────────────────
    float grain = (hash(uv * 600.0 + u_time * 0.5) - 0.5) * 0.018;
    col += grain;

    gl_FragColor = vec4(clamp(col, 0.0, 1.0), 1.0);
}
`;

function compileShader(type: number, src: string): WebGLShader {
    const s = gl!.createShader(type)!;
    gl!.shaderSource(s, src);
    gl!.compileShader(s);

    return s;
}

function buildProgram(): WebGLProgram {
    const p = gl!.createProgram()!;
    const vertexShader = compileShader(gl!.VERTEX_SHADER, VERT);
    const fragmentShader = compileShader(gl!.FRAGMENT_SHADER, FRAG);

    gl!.attachShader(p, vertexShader);
    gl!.attachShader(p, fragmentShader);
    gl!.linkProgram(p);
    gl!.deleteShader(vertexShader);
    gl!.deleteShader(fragmentShader);

    return p;
}

function updatePerformanceProfile(): void {
    const prefersReducedMotion = window.matchMedia(
        '(prefers-reduced-motion: reduce)',
    ).matches;
    const lowPowerDevice =
        navigator.hardwareConcurrency !== undefined &&
        navigator.hardwareConcurrency <= 4;

    targetFrameDuration = prefersReducedMotion ? 1000 / 12 : 1000 / 30;
    pixelRatioCap = prefersReducedMotion || lowPowerDevice ? 1 : 1.5;
}

function shouldRenderFrame(now: number): boolean {
    return isVisible && isTabVisible && now - lastFrameTime >= targetFrameDuration;
}

function handleVisibilityChange(): void {
    isTabVisible = !document.hidden;
}

function init(): void {
    const c = canvas.value!;
    gl = c.getContext('webgl', {
        antialias: false,
        alpha: false,
        powerPreference: 'low-power',
        preserveDrawingBuffer: false,
    }) as WebGLRenderingContext;

    if (!gl) {
        return;
    }

    program = buildProgram();
    gl.useProgram(program);
    uTimeLocation = gl.getUniformLocation(program, 'u_time');
    uResolutionLocation = gl.getUniformLocation(program, 'u_res');

    vertexBuffer = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, vertexBuffer);
    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1,-1, 1,-1, -1,1, 1,1]), gl.STATIC_DRAW);

    const loc = gl.getAttribLocation(program, 'a_pos');
    gl.enableVertexAttribArray(loc);
    gl.vertexAttribPointer(loc, 2, gl.FLOAT, false, 0, 0);

    updatePerformanceProfile();
    resize();
    resizeMediaQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    window.addEventListener('resize', resize);
    resizeMediaQuery.addEventListener('change', resize);
    document.addEventListener('visibilitychange', handleVisibilityChange);

    intersectionObserver = new IntersectionObserver(
        ([entry]) => {
            isVisible = entry?.isIntersecting ?? true;
        },
        { threshold: 0.01 },
    );
    intersectionObserver.observe(c);

    render();
}

function resize(): void {
    const c = canvas.value;

    if (!c || !gl) {
        return;
    }

    updatePerformanceProfile();

    const dpr = Math.min(window.devicePixelRatio, pixelRatioCap);
    c.width  = c.offsetWidth  * dpr;
    c.height = c.offsetHeight * dpr;
    gl.viewport(0, 0, c.width, c.height);
}

function render(now = performance.now()): void {
    animId = requestAnimationFrame(render);

    if (!gl || !program) {
        return;
    }

    if (!shouldRenderFrame(now)) {
        return;
    }

    lastFrameTime = now;
    const t = now / 1000;

    gl.uniform1f(uTimeLocation, t);
    gl.uniform2f(uResolutionLocation, canvas.value!.width, canvas.value!.height);
    gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
}

onMounted(init);
onUnmounted(() => {
    cancelAnimationFrame(animId);
    window.removeEventListener('resize', resize);
    resizeMediaQuery?.removeEventListener('change', resize);
    document.removeEventListener('visibilitychange', handleVisibilityChange);
    intersectionObserver?.disconnect();
    gl?.deleteBuffer(vertexBuffer);
    gl?.deleteProgram(program);

    const loseContext = gl?.getExtension('WEBGL_lose_context');
    loseContext?.loseContext();
});
</script>

<template>
    <canvas ref="canvas" class="mj-shader-canvas"></canvas>
</template>

<style scoped>
.mj-shader-canvas {
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
}
</style>
