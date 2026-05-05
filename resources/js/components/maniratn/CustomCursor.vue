<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue';

const x = ref(-100);
const y = ref(-100);
const hovered = ref(false);
const clicking = ref(false);
const isTouch = ref(false);

let raf = 0;
let targetX = -100;
let targetY = -100;
let currentX = -100;
let currentY = -100;

function onMove(event: MouseEvent): void {
    targetX = event.clientX;
    targetY = event.clientY;
}

function onDown(): void {
    clicking.value = true;
}

function onUp(): void {
    clicking.value = false;
}

function onEnter(event: Event): void {
    const element = event.target as HTMLElement;

    hovered.value = Boolean(element.closest('a,button,[data-cursor]'));
}

function onLeave(event: Event): void {
    const element = event.target as HTMLElement;

    if (!element.closest('a,button,[data-cursor]')) {
        hovered.value = false;
    }
}

function loop(): void {
    currentX += (targetX - currentX) * 0.14;
    currentY += (targetY - currentY) * 0.14;
    x.value = currentX;
    y.value = currentY;
    raf = requestAnimationFrame(loop);
}

onMounted(() => {
    if (window.matchMedia('(pointer: coarse)').matches) {
        isTouch.value = true;

        return;
    }

    document.documentElement.classList.add('mj-cursor-active');
    document.body.classList.add('mj-cursor-active');
    document.documentElement.style.cursor = 'none';
    document.body.style.cursor = 'none';
    window.addEventListener('mousemove', onMove, { passive: true });
    window.addEventListener('mousedown', onDown);
    window.addEventListener('mouseup', onUp);
    document.addEventListener('mouseover', onEnter);
    document.addEventListener('mouseout', onLeave);
    loop();
});

onUnmounted(() => {
    if (isTouch.value) {
        return;
    }

    document.documentElement.classList.remove('mj-cursor-active');
    document.body.classList.remove('mj-cursor-active');
    document.documentElement.style.removeProperty('cursor');
    document.body.style.removeProperty('cursor');
    window.removeEventListener('mousemove', onMove);
    window.removeEventListener('mousedown', onDown);
    window.removeEventListener('mouseup', onUp);
    document.removeEventListener('mouseover', onEnter);
    document.removeEventListener('mouseout', onLeave);
    cancelAnimationFrame(raf);
});
</script>

<template>
    <div
        v-if="!isTouch"
        class="mj-cur-ring"
        :class="{ hovered, clicking }"
        :style="{ transform: `translate(${x}px, ${y}px)` }"
    ></div>
</template>

<style scoped>
.mj-cur-ring {
    position: fixed;
    top: 0;
    left: 0;
    width: 28px;
    height: 28px;
    margin-left: -14px;
    margin-top: -14px;
    pointer-events: none;
    z-index: 9999;
    will-change: transform;
    display: grid;
    place-items: center;
    border: 1.5px solid rgba(196, 146, 42, 0.9);
    border-radius: 50%;
    background:
        radial-gradient(
            circle at center,
            rgba(232, 201, 109, 0.16),
            rgba(196, 146, 42, 0.05) 58%,
            transparent 72%
        );
    box-shadow:
        0 0 12px rgba(196, 146, 42, 0.18),
        inset 0 0 16px rgba(232, 201, 109, 0.08);
    transition:
        width 0.18s ease,
        height 0.18s ease,
        margin 0.18s ease,
        border-color 0.18s ease,
        background 0.18s ease,
        box-shadow 0.18s ease,
        transform 0.02s linear;
}

.mj-cur-ring::after {
    content: '';
    width: 7px;
    height: 7px;
    background: linear-gradient(
        135deg,
        var(--mj-gold-light) 0%,
        var(--mj-gold) 100%
    );
    transform: rotate(45deg);
    border-radius: 1px;
    box-shadow: 0 0 8px rgba(232, 201, 109, 0.45);
}

.mj-cur-ring.hovered {
    width: 40px;
    height: 40px;
    margin-left: -20px;
    margin-top: -20px;
    border-color: rgba(232, 201, 109, 0.95);
    background:
        radial-gradient(
            circle at center,
            rgba(232, 201, 109, 0.22),
            rgba(196, 146, 42, 0.08) 58%,
            transparent 76%
        );
    box-shadow:
        0 0 18px rgba(232, 201, 109, 0.22),
        inset 0 0 20px rgba(232, 201, 109, 0.12);
}

.mj-cur-ring.hovered::after {
    width: 9px;
    height: 9px;
}

.mj-cur-ring.clicking {
    width: 20px;
    height: 20px;
    margin-left: -10px;
    margin-top: -10px;
    background: rgba(255, 255, 255, 0.14);
    border-color: rgba(255, 255, 255, 0.9);
    box-shadow:
        0 0 10px rgba(255, 255, 255, 0.18),
        inset 0 0 10px rgba(255, 255, 255, 0.1);
}

.mj-cur-ring.clicking::after {
    width: 6px;
    height: 6px;
    background: rgba(255, 255, 255, 0.95);
    box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
}
</style>
