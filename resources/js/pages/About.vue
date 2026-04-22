<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import TheNav from '@/components/maniratn/TheNav.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';

const values = [
    {
        title: 'Purity First',
        desc: 'Every ornament is hallmarked and quality checked before it reaches you.',
    },
    {
        title: 'Craft with Care',
        desc: 'Design language balances classic forms and modern wearability.',
    },
    {
        title: 'Family Trust',
        desc: 'Built with consistent service, transparent pricing, and long-term support.',
    },
];
</script>

<template>
    <Head title="About — Maniratn Jewellers" />
    <TheNav current-page="about" />

    <main class="mj-about-page">
        <section class="mj-about-hero">
            <span>Our Story</span>
            <h1>Jewellery house built on trust since 2007.</h1>
            <p>
                Maniratn serves families with timeless pieces, honest guidance,
                and dependable after-sales support.
            </p>
        </section>

        <section class="mj-about-values">
            <article v-for="value in values" :key="value.title" class="mj-about-card">
                <h2>{{ value.title }}</h2>
                <p>{{ value.desc }}</p>
            </article>
        </section>
    </main>

    <TheFooter />
</template>

<style scoped>
.mj-about-page {
    padding-top: 80px;
    min-height: 100vh;
    background: var(--mj-cream);
}

.mj-about-hero {
    max-width: 72rem;
    margin: 0 auto;
    padding: 3.5rem 1.25rem 2rem;
}

.mj-about-hero span {
    font-family: var(--mj-sans);
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: var(--mj-gold);
}

.mj-about-hero h1 {
    margin-top: 0.6rem;
    font-family: var(--mj-serif);
    font-size: clamp(2rem, 5vw, 3.4rem);
    color: var(--mj-ink);
    line-height: 1.1;
}

.mj-about-hero p {
    margin-top: 0.8rem;
    max-width: 36rem;
    color: var(--mj-ink-soft);
    font-family: var(--mj-sans);
    line-height: 1.7;
}

.mj-about-values {
    max-width: 72rem;
    margin: 0 auto;
    padding: 0 1.25rem 4rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
}

.mj-about-card {
    border: 1px solid rgba(196, 146, 42, 0.2);
    background: #fff;
    padding: 1.2rem;
}

.mj-about-card h2 {
    font-family: var(--mj-serif);
    color: var(--mj-crimson);
    font-size: 1.6rem;
}

.mj-about-card p {
    margin-top: 0.5rem;
    color: var(--mj-ink-soft);
    font-family: var(--mj-sans);
    line-height: 1.7;
}

@media (min-width: 900px) {
    .mj-about-values {
        grid-template-columns: repeat(3, 1fr);
    }
}
</style>
