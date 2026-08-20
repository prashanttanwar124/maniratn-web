<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

type Props = {
    className?: HTMLAttributes['class'];
};

defineProps<Props>();
</script>

<template>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 48 48"
        :class="className"
        v-bind="$attrs"
    >
        <!-- Star Sparkle -->
        <path
            fill="currentColor"
            d="M24 4 L25.5 10 L31.5 11.5 L25.5 13 L24 19 L22.5 13 L16.5 11.5 L22.5 10 Z"
        />
        <!-- Diamond Crown -->
        <polygon points="24,18 31,23 24,28 17,23" fill="currentColor" opacity="0.9" />
        <!-- Monogram M -->
        <path
            fill="currentColor"
            d="M12 25 h4 v15 h-4 z M32 25 h4 v15 h-4 z M15 25 L24 35 L21 38 L12 28 Z M33 25 L24 35 L27 38 L36 28 Z"
        />
    </svg>
</template>
