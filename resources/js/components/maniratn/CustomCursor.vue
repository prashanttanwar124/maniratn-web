<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

const x = ref(-100);
const y = ref(-100);
const hovered = ref(false);
const clicking = ref(false);

let raf = 0;
let tx = -100, ty = -100;
let cx = -100, cy = -100;

function onMove(e: MouseEvent) {
    tx = e.clientX;
    ty = e.clientY;
}

function onDown() {
 clicking.value = true; 
}
function onUp()   {
 clicking.value = false; 
}

function onEnter(e: Event) {
    const el = e.target as HTMLElement;

    if (el.closest('a,button,[data-cursor]')) {
hovered.value = true;
}
}
function onLeave(e: Event) {
    const el = e.target as HTMLElement;

    if (!el.closest('a,button,[data-cursor]')) {
hovered.value = false;
}
}

function loop() {
    // smooth lerp
    cx += (tx - cx) * 0.14;
    cy += (ty - cy) * 0.14;
    x.value = cx;
    y.value = cy;
    raf = requestAnimationFrame(loop);
}

const isTouch = ref(false);

onMounted(() => {
    if (window.matchMedia('(pointer: coarse)').matches) {
        isTouch.value = true;

        return;
    }

    document.documentElement.classList.add('mj-cursor-active');
    window.addEventListener('mousemove', onMove, { passive: true });
    window.addEventListener('mousedown', onDown);
    window.addEventListener('mouseup',   onUp);
    document.addEventListener('mouseover',  onEnter);
    document.addEventListener('mouseout',   onLeave);
    loop();
});

onUnmounted(() => {
    if (isTouch.value) {
return;
}

    document.documentElement.classList.remove('mj-cursor-active');
    window.removeEventListener('mousemove', onMove);
    window.removeEventListener('mousedown', onDown);
    window.removeEventListener('mouseup',   onUp);
    document.removeEventListener('mouseover',  onEnter);
    document.removeEventListener('mouseout',   onLeave);
    cancelAnimationFrame(raf);
});
</script>

<template>
    <template v-if="!isTouch">
        <!-- Dot: small solid diamond -->
        <div
            class="mj-cur-dot"
            :class="{ hovered: hovered, clicking: clicking }"
            :style="{ transform: `translate(${x}px, ${y}px)` }"
        ></div>

        <!-- Ring: outer circle, lags slightly more -->
        <div
            class="mj-cur-ring"
            :class="{ hovered: hovered, clicking: clicking }"
            :style="{ transform: `translate(${x}px, ${y}px)` }"
        ></div>
    </template>
</template>

<style>
html.mj-cursor-active,
html.mj-cursor-active *,
html.mj-cursor-active *::before,
html.mj-cursor-active *::after {
    cursor: none !important;
}
</style>

<style scoped>
.mj-cur-dot,
.mj-cur-ring {
    position: fixed;
    top: 0; left: 0;
    pointer-events: none;
    z-index: 9999;
    will-change: transform;
    transition: width 0.18s ease, height 0.18s ease, opacity 0.18s ease, background 0.18s ease;
}

/* ── Dot: rotated gold diamond ───────────��─────────── */
.mj-cur-dot {
    width: 8px;
    height: 8px;
    margin-left: -4px;
    margin-top: -4px;
    background: var(--mj-gold);
    transform-origin: center;
    rotate: 45deg;
    box-shadow: 0 0 6px rgba(196,146,42,0.5);
}
.mj-cur-dot.hovered {
    width: 12px;
    height: 12px;
    margin-left: -6px;
    margin-top: -6px;
    background: var(--mj-gold-light);
    box-shadow: 0 0 12px rgba(232,201,109,0.7);
}
.mj-cur-dot.clicking {
    width: 6px;
    height: 6px;
    margin-left: -3px;
    margin-top: -3px;
    background: #fff;
}

/* ── Ring: circular outline ────────────────────────── */
.mj-cur-ring {
    width: 28px;
    height: 28px;
    margin-left: -14px;
    margin-top: -14px;
    border: 1px solid rgba(196,146,42,0.55);
    border-radius: 50%;
    transition: width 0.22s ease, height 0.22s ease, margin 0.22s ease,
                border-color 0.22s ease, opacity 0.22s ease;
}
.mj-cur-ring.hovered {
    width: 44px;
    height: 44px;
    margin-left: -22px;
    margin-top: -22px;
    border-color: rgba(196,146,42,0.9);
}
.mj-cur-ring.clicking {
    width: 22px;
    height: 22px;
    margin-left: -11px;
    margin-top: -11px;
    border-color: rgba(255,255,255,0.7);
}
</style>
