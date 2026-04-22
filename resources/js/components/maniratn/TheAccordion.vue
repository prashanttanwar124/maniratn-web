<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps<{
    items: Array<{ title: string; content: string }>;
    variant?: 'light' | 'dark';
}>();

const openIndex = ref<number | null>(null);
const isDark = props.variant === 'dark';

function toggle(i: number) {
    openIndex.value = openIndex.value === i ? null : i;
}
</script>

<template>
    <div :style="{ borderTop: `1px solid ${isDark ? 'rgba(232,201,109,0.2)' : 'rgba(107,18,18,0.1)'}` }">
        <div
            v-for="(item, i) in items"
            :key="i"
            :style="{ borderBottom: `1px solid ${isDark ? 'rgba(232,201,109,0.2)' : 'rgba(107,18,18,0.1)'}` }"
        >
            <button
                @click="toggle(i)"
                :style="{
                    width: '100%', display: 'flex', justifyContent: 'space-between', alignItems: 'center',
                    padding: '20px 0', background: 'none', border: 'none', cursor: 'pointer',
                    fontFamily: 'var(--mj-serif)', fontSize: '20px', fontWeight: '500',
                    color: isDark
                        ? (openIndex === i ? '#E8C96D' : 'var(--mj-cream)')
                        : (openIndex === i ? 'var(--mj-crimson)' : 'var(--mj-ink)'),
                    letterSpacing: '0.02em', textAlign: 'left',
                    transition: 'color 0.25s',
                }"
            >
                <span>{{ item.title }}</span>
                <span :style="{
                    fontFamily: 'var(--mj-sans)', fontSize: '20px', fontWeight: '300',
                    color: isDark ? '#C4922A' : 'var(--mj-crimson)',
                    transform: openIndex === i ? 'rotate(45deg)' : 'rotate(0deg)',
                    transition: 'transform 0.3s ease', lineHeight: '1',
                }">+</span>
            </button>

            <div :style="{
                maxHeight: openIndex === i ? '400px' : '0',
                overflow: 'hidden', transition: 'max-height 0.4s ease',
            }">
                <div :style="{
                    paddingBottom: '20px',
                    fontFamily: 'var(--mj-sans)', fontSize: '14px', lineHeight: '1.8',
                    color: isDark ? 'rgba(253,248,240,0.7)' : 'var(--mj-ink-mid)',
                    fontWeight: '300',
                }" v-html="item.content" />
            </div>
        </div>
    </div>
</template>
