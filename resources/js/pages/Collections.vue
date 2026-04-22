<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import gsap from 'gsap';
import TheNav from '@/components/maniratn/TheNav.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';

const collections = [
    {
        title: 'Bridal',
        desc: 'Grand sets for weddings and milestone moments.',
    },
    {
        title: 'Temple',
        desc: 'Traditional forms inspired by heritage artistry.',
    },
    {
        title: 'Daily Wear',
        desc: 'Lightweight elegance for everyday confidence.',
    },
    {
        title: 'Diamonds',
        desc: 'Certified sparkle for special celebrations.',
    },
];

onMounted(() => {
    gsap.from('.mj-collection-card', {
        y: 20,
        opacity: 0,
        duration: 0.5,
        stagger: 0.1,
        ease: 'power3.out',
    });
});
</script>

<template>
    <Head title="Collections — Maniratn Jewellers" />
    <TheNav current-page="collections" />

    <main class="mj-collections-page">
        <section class="mj-collections-hero">
            <span>Our Collections</span>
            <h1>Find piece that fits your story.</h1>
            <p>
                Curated styles with trusted purity, balanced design, and timeless
                wearability.
            </p>
        </section>

        <section class="mj-collections-grid-wrap">
            <article
                v-for="collection in collections"
                :key="collection.title"
                class="mj-collection-card"
            >
                <div class="mj-collection-media">{{ collection.title }}</div>
                <h2>{{ collection.title }}</h2>
                <p>{{ collection.desc }}</p>
            </article>
        </section>
    </main>

    <TheFooter />
</template>

<style scoped>
.mj-collections-page {
    padding-top: 80px;
    background: var(--mj-cream);
    min-height: 100vh;
}

.mj-collections-hero {
    max-width: 72rem;
    margin: 0 auto;
    padding: 3.5rem 1.25rem 2.2rem;
}

.mj-collections-hero span {
    font-family: var(--mj-sans);
    font-size: 0.72rem;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: var(--mj-gold);
}

.mj-collections-hero h1 {
    margin-top: 0.6rem;
    font-family: var(--mj-serif);
    font-size: clamp(2rem, 5vw, 3.4rem);
    color: var(--mj-ink);
}

.mj-collections-hero p {
    margin-top: 0.8rem;
    max-width: 34rem;
    color: var(--mj-ink-soft);
    font-family: var(--mj-sans);
    line-height: 1.7;
}

.mj-collections-grid-wrap {
    max-width: 72rem;
    margin: 0 auto;
    padding: 0 1.25rem 4rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
}

.mj-collection-card {
    border: 1px solid rgba(196, 146, 42, 0.2);
    background: #fff;
    padding: 0.9rem;
}

.mj-collection-media {
    min-height: 11rem;
    display: grid;
    place-items: center;
    background: linear-gradient(135deg, rgba(196, 146, 42, 0.12), rgba(107, 18, 18, 0.08));
    color: var(--mj-crimson);
    font-family: var(--mj-serif);
    font-size: 1.4rem;
}

.mj-collection-card h2 {
    margin-top: 0.9rem;
    font-family: var(--mj-serif);
    color: var(--mj-ink);
    font-size: 1.5rem;
}

.mj-collection-card p {
    margin-top: 0.35rem;
    color: var(--mj-ink-soft);
    line-height: 1.7;
    font-family: var(--mj-sans);
}

@media (min-width: 700px) {
    .mj-collections-grid-wrap {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
