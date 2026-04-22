<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

const canvas = ref<HTMLCanvasElement | null>(null);
let gl: WebGLRenderingContext | null = null;
let program: WebGLProgram | null = null;
let animId = 0;
let startTime = Date.now();

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

// ── sparkle ──────────────────────────────────────────────
float sparkle(vec2 uv, float t) {
    vec2 g = floor(uv * 60.0);
    float rnd = hash(g + floor(t * 0.8));
    float phase = hash(g * 3.7);
    float blink = 0.5 + 0.5 * sin(t * 4.0 + phase * 6.28);
    return step(0.94, rnd) * pow(blink, 3.0) * 0.9;
}

void main() {
    vec2 uv = gl_FragCoord.xy / u_res;
    float t  = u_time * 0.18;

    // domain warp — two passes
    vec2 q = vec2(fbm(uv * 2.2 + t),
                  fbm(uv * 2.2 + vec2(5.2, 1.3) + t * 0.9));
    vec2 r = vec2(fbm(uv * 1.8 + 2.0 * q + vec2(1.7, 9.2) + t * 1.1),
                  fbm(uv * 1.8 + 2.0 * q + vec2(8.3, 2.8) + t * 0.8));
    float f = fbm(uv * 1.5 + 2.2 * r + t * 0.5);

    // ── palette ────────────────────────────────────────────
    vec3 dark    = vec3(0.04,  0.008, 0.008);   // near-black crimson
    vec3 crimson = vec3(0.42,  0.07,  0.07);    // #6B1212
    vec3 wine    = vec3(0.29,  0.05,  0.05);    // deep wine
    vec3 gold1   = vec3(0.769, 0.573, 0.165);   // #C4922A
    vec3 gold2   = vec3(0.91,  0.788, 0.427);   // #E8C96D
    vec3 cream   = vec3(0.99,  0.97,  0.94);    // near-white

    // ── layered blend ──────────────────────────────────────
    float f2 = f * f;
    float f3 = f2 * f;
    vec3 col = dark;
    col = mix(col,    wine,    smoothstep(0.1, 0.4, f));
    col = mix(col,    crimson, smoothstep(0.3, 0.6, f));
    col = mix(col,    gold1,   smoothstep(0.55, 0.78, f));
    col = mix(col,    gold2,   smoothstep(0.72, 0.88, f));
    col = mix(col,    cream,   smoothstep(0.86, 0.97, f) * 0.55);

    // ── sparkles ───────────────────────────────────────────
    float sp = sparkle(uv, u_time);
    col += gold2 * sp;

    // ── edge vignette ──────────────────────────────────────
    vec2 vc = uv - 0.5;
    float vig = 1.0 - dot(vc, vc) * 1.8;
    col *= max(vig, 0.0);

    // ── subtle scanline grain ──────────────────────────────
    float grain = (hash(uv * 800.0 + u_time) - 0.5) * 0.025;
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
    gl!.attachShader(p, compileShader(gl!.VERTEX_SHADER, VERT));
    gl!.attachShader(p, compileShader(gl!.FRAGMENT_SHADER, FRAG));
    gl!.linkProgram(p);
    return p;
}

function init() {
    const c = canvas.value!;
    gl = c.getContext('webgl', { antialias: false, alpha: false }) as WebGLRenderingContext;
    if (!gl) return;

    program = buildProgram();
    gl.useProgram(program);

    const buf = gl.createBuffer();
    gl.bindBuffer(gl.ARRAY_BUFFER, buf);
    gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1,-1, 1,-1, -1,1, 1,1]), gl.STATIC_DRAW);

    const loc = gl.getAttribLocation(program, 'a_pos');
    gl.enableVertexAttribArray(loc);
    gl.vertexAttribPointer(loc, 2, gl.FLOAT, false, 0, 0);

    resize();
    window.addEventListener('resize', resize);
    render();
}

function resize() {
    const c = canvas.value;
    if (!c || !gl) return;
    const dpr = Math.min(window.devicePixelRatio, 2);
    c.width  = c.offsetWidth  * dpr;
    c.height = c.offsetHeight * dpr;
    gl.viewport(0, 0, c.width, c.height);
}

function render() {
    animId = requestAnimationFrame(render);
    if (!gl || !program) return;
    const t = (Date.now() - startTime) / 1000;
    const uTime = gl.getUniformLocation(program, 'u_time');
    const uRes  = gl.getUniformLocation(program, 'u_res');
    gl.uniform1f(uTime, t);
    gl.uniform2f(uRes, canvas.value!.width, canvas.value!.height);
    gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
}

onMounted(init);
onUnmounted(() => {
    cancelAnimationFrame(animId);
    window.removeEventListener('resize', resize);
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
