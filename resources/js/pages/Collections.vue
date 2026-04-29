<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { computed, onMounted, onUnmounted, ref } from 'vue';
import CustomCursor from '@/components/maniratn/CustomCursor.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';
import TheNav from '@/components/maniratn/TheNav.vue';
import { contact } from '@/routes';

gsap.registerPlugin(ScrollTrigger);

function navigate(): void {
    router.visit(contact());
    window.scrollTo(0, 0);
}

type Collection = {
    title: string;
    desc: string;
    tag: 'Bridal' | 'Heritage' | 'Everyday' | 'Diamond' | 'Men';
    purity: string;
    pieces: string;
    mark: string;
    accent: string;
    gradient: string;
};

const filters: Array<{ key: 'all' | Collection['tag']; label: string }> = [
    { key: 'all', label: 'All' },
    { key: 'Bridal', label: 'Bridal' },
    { key: 'Heritage', label: 'Heritage' },
    { key: 'Everyday', label: 'Everyday' },
    { key: 'Diamond', label: 'Diamond' },
    { key: 'Men', label: 'Men' },
];

const activeFilter = ref<'all' | Collection['tag']>('all');

const collections: Collection[] = [
    {
        title: 'Bridal Sets',
        desc: 'Statement pieces designed for the wedding morning — necklaces, vanki, jhumka, and waist sets that move with you.',
        tag: 'Bridal',
        purity: '22K Gold',
        pieces: '38 pieces',
        mark: 'B',
        accent: '#E8C96D',
        gradient: 'linear-gradient(135deg,#4A0D0D 0%,#6B1212 55%,#8B2020 100%)',
    },
    {
        title: 'Temple Jewellery',
        desc: 'Antique-finish ornaments inspired by southern temple traditions. Heavy, carved, and rich with motif.',
        tag: 'Heritage',
        purity: '22K Antique',
        pieces: '24 pieces',
        mark: 'T',
        accent: '#D6A03A',
        gradient: 'linear-gradient(135deg,#2C1A0A 0%,#5C3010 55%,#7A4218 100%)',
    },
    {
        title: 'Daily Wear',
        desc: 'Lightweight pieces that hold their grace from the morning routine to a long evening — chains, studs, bangles, rings.',
        tag: 'Everyday',
        purity: '22K Gold',
        pieces: '64 pieces',
        mark: 'D',
        accent: '#F2D98D',
        gradient: 'linear-gradient(135deg,#3A2010 0%,#5C3818 55%,#7A4F22 100%)',
    },
    {
        title: 'Diamond Solitaires',
        desc: 'Certified solitaires in clean, considered settings. Each stone arrives with a recognised grading report.',
        tag: 'Diamond',
        purity: '18K Gold + Diamond',
        pieces: '42 pieces',
        mark: 'S',
        accent: '#DCD7FF',
        gradient: 'linear-gradient(135deg,#0A0A1A 0%,#1A1A3A 55%,#2A2A5A 100%)',
    },
    {
        title: 'Polki & Kundan',
        desc: 'Uncut diamonds and lac-set kundan, finished by hand. Intended for occasions that warrant the heaviest pieces.',
        tag: 'Heritage',
        purity: '22K + Polki',
        pieces: '18 pieces',
        mark: 'P',
        accent: '#F5E8C0',
        gradient: 'linear-gradient(135deg,#3A0F0F 0%,#5A1818 55%,#7B2424 100%)',
    },
    {
        title: "Men's Edit",
        desc: 'Quiet kadas, signet rings, chains, and cufflinks. Built with the same standards, finished with restraint.',
        tag: 'Men',
        purity: '22K Gold',
        pieces: '22 pieces',
        mark: 'M',
        accent: '#C4922A',
        gradient: 'linear-gradient(135deg,#1A0F0A 0%,#2C1A10 55%,#3F2818 100%)',
    },
    {
        title: 'Engagement Rings',
        desc: 'Solitaire and three-stone settings, with diamond, ruby, emerald, and sapphire centres. Sized in-store within the week.',
        tag: 'Diamond',
        purity: '18K Gold + Stones',
        pieces: '34 pieces',
        mark: 'E',
        accent: '#F3F0FF',
        gradient: 'linear-gradient(135deg,#101024 0%,#1F1F4A 55%,#2D2D6A 100%)',
    },
    {
        title: 'Festive Light',
        desc: 'Lighter sets meant for festivals, family ceremonies, and the gatherings between weddings and ordinary days.',
        tag: 'Everyday',
        purity: '22K Gold',
        pieces: '46 pieces',
        mark: 'L',
        accent: '#F0D17A',
        gradient: 'linear-gradient(135deg,#4A2010 0%,#6A3018 55%,#8A4220 100%)',
    },
];

const visibleCollections = computed(() =>
    activeFilter.value === 'all'
        ? collections
        : collections.filter((c) => c.tag === activeFilter.value),
);

const materials = [
    {
        title: '22K & 24K Gold',
        desc: 'Hallmarked, daily-rate priced, with full transparency of making charges.',
        mark: '◈',
    },
    {
        title: 'Certified Diamonds',
        desc: 'Internationally graded solitaires, sourced from select cutting ateliers.',
        mark: '◇',
    },
    {
        title: 'Coloured Stones',
        desc: 'Ruby, emerald, sapphire — each accompanied by a stone valuation.',
        mark: '✦',
    },
    {
        title: 'Pearls & Polki',
        desc: 'Hand-strung pearls and lac-set polki for heritage and traditional pieces.',
        mark: '◆',
    },
];

function setFilter(key: typeof activeFilter.value): void {
    activeFilter.value = key;
    requestAnimationFrame(() => {
        gsap.from('.col-card', {
            y: 22,
            opacity: 0,
            duration: 0.45,
            stagger: 0.06,
            ease: 'power3.out',
        });
    });
}

onMounted(() => {
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
    tl.from('.cl-eyebrow', { y: 18, opacity: 0, duration: 0.5, delay: 0.15 })
        .from('.cl-title', { y: 36, opacity: 0, duration: 0.85 }, '-=0.25')
        .from('.cl-lead', { y: 22, opacity: 0, duration: 0.6 }, '-=0.55')
        .from(
            '.cl-stat',
            { y: 18, opacity: 0, duration: 0.5, stagger: 0.08 },
            '-=0.4',
        );

    gsap.from('.col-filter-btn', {
        scrollTrigger: { trigger: '.col-filters', start: 'top 90%' },
        y: 16,
        opacity: 0,
        duration: 0.45,
        stagger: 0.06,
        ease: 'power3.out',
    });
    gsap.from('.col-card', {
        scrollTrigger: { trigger: '.col-grid', start: 'top 85%' },
        y: 36,
        opacity: 0,
        duration: 0.55,
        stagger: 0.08,
        ease: 'power3.out',
    });

    gsap.from('.mat-head', {
        scrollTrigger: { trigger: '.mat-section', start: 'top 82%' },
        y: 28,
        opacity: 0,
        duration: 0.7,
        ease: 'power3.out',
    });
    gsap.from('.mat-tile', {
        scrollTrigger: { trigger: '.mat-grid', start: 'top 85%' },
        y: 28,
        opacity: 0,
        duration: 0.5,
        stagger: 0.1,
        ease: 'power3.out',
    });

    gsap.from('.cl-cta-inner > *', {
        scrollTrigger: { trigger: '.cl-cta-section', start: 'top 86%' },
        y: 22,
        opacity: 0,
        duration: 0.55,
        stagger: 0.08,
        ease: 'power3.out',
    });
});

onUnmounted(() => {
    ScrollTrigger.killAll();
});
</script>

<template>
    <Head title="Collections — Maniratn Jewellers" />

    <CustomCursor />
    <TheNav current-page="collections" hero-variant="light" />

    <main class="cl-page">
        <!-- ── Hero ────────────────────────────────────────── -->
        <section class="cl-hero">
            <div class="cl-hero-bg" aria-hidden="true">
                <span class="cl-hero-watermark">M</span>
            </div>
            <div class="cl-hero-inner">
                <div class="mj-eyebrow-row cl-eyebrow">
                    <svg width="8" height="8" viewBox="0 0 8 8">
                        <rect
                            x="4"
                            y="0"
                            width="4"
                            height="4"
                            transform="rotate(45 4 4)"
                            fill="#C4922A"
                        />
                    </svg>
                    <span class="mj-eyebrow">Our Collections</span>
                </div>
                <h1 class="cl-title">
                    Find a piece<br />
                    that fits<br />
                    <em class="mj-crimson-i">your story.</em>
                </h1>
                <p class="cl-lead">
                    From the wedding morning to the quiet weekday afternoon —
                    eight curated edits, each held to the same Maniratn standard
                    of purity, craft, and care.
                </p>

                <div class="cl-stats">
                    <div class="cl-stat">
                        <span class="cl-stat-num">8</span>
                        <span class="cl-stat-label">Curated edits</span>
                    </div>
                    <div class="cl-stat">
                        <span class="cl-stat-num">280+</span>
                        <span class="cl-stat-label">Pieces in catalogue</span>
                    </div>
                    <div class="cl-stat">
                        <span class="cl-stat-num">100%</span>
                        <span class="cl-stat-label">BIS hallmarked</span>
                    </div>
                </div>

                <aside class="cl-hero-panel" aria-label="Featured collection">
                    <span class="cl-hero-panel-kicker">Featured Edit</span>
                    <div class="cl-hero-panel-mark" aria-hidden="true">B</div>
                    <h2>Bridal sets for the full wedding story.</h2>
                    <p>
                        Necklaces, jhumka, vanki, bangles, and waist sets
                        designed as one language, not separate purchases.
                    </p>
                    <button
                        type="button"
                        class="cl-hero-panel-link"
                        @click="navigate"
                    >
                        Start an enquiry →
                    </button>
                </aside>
            </div>
        </section>

        <!-- ── Filters ─────────────────────────────────────── -->
        <section class="col-filters-wrap">
            <div class="col-filters-inner">
                <div class="col-filters-meta">
                    <span class="col-filters-count"
                        >{{ visibleCollections.length }} edits</span
                    >
                    <span class="col-filters-divider" aria-hidden="true"
                        >·</span
                    >
                    <span class="col-filters-cat">{{
                        activeFilter === 'all' ? 'All categories' : activeFilter
                    }}</span>
                </div>
                <div class="col-filters">
                    <button
                        v-for="f in filters"
                        :key="f.key"
                        type="button"
                        class="col-filter-btn"
                        :class="{
                            'col-filter-btn-active': activeFilter === f.key,
                        }"
                        @click="setFilter(f.key)"
                    >
                        {{ f.label }}
                    </button>
                </div>
            </div>
        </section>

        <!-- ── Grid ────────────────────────────────────────── -->
        <section class="col-grid-section">
            <div class="col-grid">
                <article
                    v-for="(c, i) in visibleCollections"
                    :key="c.title"
                    class="col-card"
                    :class="{
                        'col-card-featured': i === 0 && activeFilter === 'all',
                    }"
                >
                    <div
                        class="col-thumb"
                        :style="{
                            '--collection-accent': c.accent,
                            background: c.gradient,
                        }"
                    >
                        <span class="col-num">{{
                            String(i + 1).padStart(2, '0')
                        }}</span>
                        <span class="col-purity">{{ c.purity }}</span>
                        <div class="col-center">
                            <span class="col-mark" aria-hidden="true">{{
                                c.mark
                            }}</span>
                            <span class="col-thumb-name">{{ c.title }}</span>
                            <span class="col-thumb-pieces">{{ c.pieces }}</span>
                        </div>
                        <div class="col-overlay">
                            <span>Enquire →</span>
                        </div>
                    </div>
                    <div class="col-body">
                        <div class="col-row">
                            <span class="col-name">{{ c.title }}</span>
                            <span class="col-tag">{{ c.tag }}</span>
                        </div>
                        <p class="col-desc">{{ c.desc }}</p>
                        <button
                            class="col-link"
                            type="button"
                            @click="navigate"
                        >
                            Enquire about this edit →
                        </button>
                    </div>
                </article>
            </div>
        </section>

        <!-- ── Materials ──────────────────────────────────── -->
        <section class="mat-section">
            <div class="mat-head">
                <div class="mj-eyebrow-row" style="justify-content: center">
                    <svg width="8" height="8" viewBox="0 0 8 8">
                        <rect
                            x="4"
                            y="0"
                            width="4"
                            height="4"
                            transform="rotate(45 4 4)"
                            fill="#C4922A"
                        />
                    </svg>
                    <span class="mj-eyebrow">Materials & Standards</span>
                </div>
                <h2 class="mat-h2">
                    Only what we would<br />
                    <em class="mj-gold-i">wear ourselves.</em>
                </h2>
                <p class="mat-lead">
                    Every gram of metal and every stone we set comes with a
                    paper trail. The right to ask is yours; the responsibility
                    to disclose is ours.
                </p>
            </div>

            <div class="mat-grid">
                <div v-for="m in materials" :key="m.title" class="mat-tile">
                    <span class="mat-mark" aria-hidden="true">{{
                        m.mark
                    }}</span>
                    <h3 class="mat-title">{{ m.title }}</h3>
                    <p class="mat-desc">{{ m.desc }}</p>
                </div>
            </div>

            <div class="mat-foot" aria-hidden="true">
                <span></span>
                <svg width="8" height="8" viewBox="0 0 8 8">
                    <rect
                        x="4"
                        y="0"
                        width="4"
                        height="4"
                        transform="rotate(45 4 4)"
                        fill="#C4922A"
                        opacity="0.5"
                    />
                </svg>
                <span class="mat-foot-text"
                    >BIS Hallmarked · Certified since 2007</span
                >
                <svg width="8" height="8" viewBox="0 0 8 8">
                    <rect
                        x="4"
                        y="0"
                        width="4"
                        height="4"
                        transform="rotate(45 4 4)"
                        fill="#C4922A"
                        opacity="0.5"
                    />
                </svg>
                <span></span>
            </div>
        </section>

        <!-- ── CTA ─────────────────────────────────────────── -->
        <section class="cl-cta-section">
            <div class="cl-cta-inner">
                <svg
                    width="28"
                    height="28"
                    viewBox="0 0 16 16"
                    style="margin: 0 auto 24px; display: block"
                >
                    <path
                        d="M8 0 L9 7 L16 8 L9 9 L8 16 L7 9 L0 8 L7 7Z"
                        fill="#C4922A"
                        opacity="0.85"
                    />
                </svg>
                <h2 class="cl-cta-h2">Looking for something not listed?</h2>
                <p class="cl-cta-body">
                    Most of our finest pieces never make it to the catalogue. If
                    you have a sketch, a photograph, or simply an idea — speak
                    with our atelier.
                </p>
                <div class="cl-cta-btns">
                    <button class="mj-btn-gold" @click="navigate">
                        Speak with the Atelier
                    </button>
                    <button class="mj-btn-ghost" @click="navigate">
                        Book an Appointment
                    </button>
                </div>
            </div>
        </section>
    </main>

    <TheFooter />
</template>

<style scoped>
.cl-page {
    background: var(--mj-cream);
    overflow-x: hidden;
}

/* ── Hero ────────────────────────────────────────────── */
.cl-hero {
    position: relative;
    padding: 168px 60px 80px;
    background:
        radial-gradient(
            circle at 88% 8%,
            rgba(196, 146, 42, 0.14),
            transparent 38%
        ),
        radial-gradient(
            circle at 8% 92%,
            rgba(107, 18, 18, 0.06),
            transparent 42%
        ),
        linear-gradient(180deg, var(--mj-cream) 0%, var(--mj-cream-mid) 100%);
    overflow: hidden;
}
.cl-hero-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    user-select: none;
}
.cl-hero-watermark {
    position: absolute;
    right: -3%;
    bottom: -22%;
    font-family: var(--mj-serif);
    font-size: min(54vw, 620px);
    font-weight: 700;
    line-height: 1;
    color: rgba(26, 15, 10, 0.05);
    letter-spacing: -0.02em;
}
.cl-hero-inner {
    max-width: 1180px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
    min-height: 510px;
    padding-right: 392px;
}
.cl-title {
    font-family: var(--mj-serif);
    font-size: clamp(48px, 6.4vw, 92px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.04;
    letter-spacing: 0.005em;
    margin: 12px 0 28px;
}
.cl-title em {
    font-style: italic;
    font-weight: 400;
}
.cl-lead {
    max-width: 540px;
    font-family: var(--mj-sans);
    font-size: 15.5px;
    line-height: 1.9;
    color: var(--mj-ink-soft);
    font-weight: 300;
    margin-bottom: 48px;
}
.cl-stats {
    display: flex;
    gap: 56px;
    flex-wrap: wrap;
    padding-top: 28px;
    border-top: 1px solid rgba(196, 146, 42, 0.22);
    max-width: 720px;
}
.cl-stat-num {
    display: block;
    font-family: var(--mj-serif);
    font-size: 32px;
    font-weight: 500;
    color: var(--mj-gold);
    line-height: 1;
}
.cl-stat-label {
    display: block;
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.18em;
    color: var(--mj-ink-soft);
    text-transform: uppercase;
    margin-top: 6px;
}
.cl-hero-panel {
    position: absolute;
    top: 12px;
    right: 0;
    width: 330px;
    min-height: 462px;
    padding: 30px 28px;
    background: linear-gradient(145deg, #4a0d0d 0%, #6b1212 56%, #8b2020 100%);
    border: 1px solid rgba(196, 146, 42, 0.38);
    box-shadow: 0 28px 64px rgba(74, 13, 13, 0.24);
    overflow: hidden;
}
.cl-hero-panel::before {
    content: '';
    position: absolute;
    inset: 14px;
    border: 1px solid rgba(232, 201, 109, 0.22);
    pointer-events: none;
}
.cl-hero-panel-kicker,
.cl-hero-panel-link {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: rgba(232, 201, 109, 0.68);
}
.cl-hero-panel-mark {
    display: grid;
    place-items: center;
    width: 112px;
    aspect-ratio: 1;
    margin: 52px 0 42px;
    position: relative;
    color: var(--mj-gold-light);
    font-family: var(--mj-serif);
    font-size: 54px;
    font-weight: 300;
}
.cl-hero-panel-mark::before,
.cl-hero-panel-mark::after {
    content: '';
    position: absolute;
    inset: 10px;
    border: 1px solid rgba(232, 201, 109, 0.32);
    transform: rotate(45deg);
}
.cl-hero-panel-mark::after {
    inset: 28px;
    border-color: rgba(232, 201, 109, 0.18);
}
.cl-hero-panel h2 {
    font-family: var(--mj-serif);
    font-size: 27px;
    font-weight: 300;
    line-height: 1.18;
    color: var(--mj-cream);
    margin-bottom: 16px;
}
.cl-hero-panel p {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.82;
    color: rgba(253, 248, 240, 0.48);
    margin-bottom: 26px;
}
.cl-hero-panel-link {
    background: transparent;
    border: 0;
    border-bottom: 1px solid rgba(232, 201, 109, 0.42);
    padding: 0 0 5px;
    cursor: pointer;
}

/* ── Filters ─────────────────────────────────────────── */
.col-filters-wrap {
    background: var(--mj-cream);
    border-top: 1px solid rgba(196, 146, 42, 0.18);
    border-bottom: 1px solid rgba(196, 146, 42, 0.18);
    position: sticky;
    top: 0;
    z-index: 10;
    backdrop-filter: blur(6px);
    background: rgba(253, 248, 240, 0.92);
}
.col-filters-inner {
    max-width: 1180px;
    margin: 0 auto;
    padding: 18px 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
}
.col-filters-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--mj-ink-soft);
}
.col-filters-count {
    color: var(--mj-crimson);
    font-weight: 600;
}
.col-filters-divider {
    color: rgba(196, 146, 42, 0.5);
}
.col-filters {
    display: flex;
    gap: 4px;
    flex-wrap: wrap;
}
.col-filter-btn {
    border: 1px solid transparent;
    background: transparent;
    cursor: pointer;
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--mj-ink-soft);
    padding: 8px 14px;
    transition: all 0.22s ease;
    font-weight: 500;
}
.col-filter-btn:hover {
    color: var(--mj-crimson);
}
.col-filter-btn-active {
    color: var(--mj-cream);
    background: var(--mj-crimson);
    border-color: var(--mj-crimson);
}

/* ── Grid ────────────────────────────────────────────── */
.col-grid-section {
    background: var(--mj-cream);
    padding: 60px 60px 100px;
}
.col-grid {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}
.col-card {
    background: rgba(255, 255, 255, 0.66);
    border: 1px solid rgba(196, 146, 42, 0.18);
    border-radius: 8px;
    overflow: hidden;
    transition:
        transform 0.34s ease,
        box-shadow 0.34s ease,
        border-color 0.34s ease;
    box-shadow: 0 16px 42px rgba(26, 15, 10, 0.07);
    display: flex;
    flex-direction: column;
    position: relative;
}
.col-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(
        90deg,
        transparent,
        var(--mj-gold),
        transparent
    );
    transform: scaleX(0);
    transition: transform 0.4s ease;
    z-index: 3;
}
.col-card:hover {
    transform: translateY(-6px);
    border-color: rgba(196, 146, 42, 0.4);
    box-shadow: 0 24px 60px rgba(26, 15, 10, 0.13);
}
.col-card:hover::after {
    transform: scaleX(1);
}
.col-card:hover .col-overlay {
    opacity: 1;
}
.col-card-featured {
    grid-column: span 2;
}

.col-thumb {
    min-height: 290px;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.col-card-featured .col-thumb {
    min-height: 360px;
}
.col-thumb::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(
            circle at 50% 45%,
            color-mix(in srgb, var(--collection-accent) 20%, transparent),
            transparent 38%
        ),
        linear-gradient(135deg, rgba(255, 255, 255, 0.08), transparent 46%),
        repeating-linear-gradient(
            45deg,
            rgba(253, 248, 240, 0.045) 0 1px,
            transparent 1px 14px
        );
    pointer-events: none;
}
.col-num {
    position: absolute;
    top: 18px;
    left: 22px;
    font-family: var(--mj-serif);
    font-size: 11px;
    color: rgba(196, 146, 42, 0.55);
    letter-spacing: 0.2em;
    line-height: 1;
    z-index: 1;
}
.col-purity {
    position: absolute;
    top: 16px;
    right: 18px;
    z-index: 1;
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.16em;
    color: rgba(253, 248, 240, 0.62);
    text-transform: uppercase;
    border: 1px solid rgba(253, 248, 240, 0.16);
    padding: 5px 9px;
}
.col-center {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 14px;
    position: relative;
    z-index: 1;
    width: 100%;
    padding: 44px 24px;
}
.col-mark {
    display: grid;
    place-items: center;
    width: 96px;
    aspect-ratio: 1;
    position: relative;
    color: color-mix(in srgb, var(--collection-accent) 82%, white);
    font-family: var(--mj-serif);
    font-size: 42px;
    font-weight: 300;
    line-height: 1;
    margin-bottom: 4px;
}
.col-mark::before,
.col-mark::after {
    content: '';
    position: absolute;
    inset: 10px;
    border: 1px solid
        color-mix(in srgb, var(--collection-accent) 36%, transparent);
    transform: rotate(45deg);
    background: rgba(253, 248, 240, 0.035);
}
.col-mark::after {
    inset: 24px;
    border-color: color-mix(in srgb, var(--collection-accent) 22%, transparent);
    background: transparent;
}
.col-thumb-name {
    font-family: var(--mj-serif);
    font-size: clamp(22px, 2.2vw, 32px);
    font-weight: 300;
    color: rgba(253, 248, 240, 0.88);
    letter-spacing: 0.01em;
    text-align: center;
    line-height: 1.14;
    text-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
}
.col-thumb-pieces {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: rgba(253, 248, 240, 0.55);
    margin-top: 4px;
}
.col-overlay {
    position: absolute;
    inset: 0;
    background: rgba(74, 13, 13, 0.74);
    opacity: 0;
    transition: opacity 0.28s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
}
.col-overlay span {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.24em;
    color: var(--mj-cream);
    text-transform: uppercase;
    border-bottom: 1px solid rgba(232, 201, 109, 0.55);
    padding-bottom: 3px;
}
.col-body {
    padding: 22px 22px 22px;
    background: rgba(255, 255, 255, 0.6);
    border-top: 1px solid rgba(196, 146, 42, 0.12);
    flex: 1;
    display: flex;
    flex-direction: column;
}
.col-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 10px;
}
.col-name {
    font-family: var(--mj-serif);
    font-size: 19px;
    font-weight: 500;
    color: var(--mj-ink);
    line-height: 1.15;
}
.col-tag {
    flex-shrink: 0;
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--mj-crimson);
    border: 1px solid rgba(107, 18, 18, 0.22);
    padding: 2px 8px;
}
.col-desc {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.75;
    color: var(--mj-ink-soft);
    flex: 1;
    margin-bottom: 14px;
}
.col-link {
    background: none;
    border: none;
    cursor: pointer;
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-gold);
    font-weight: 600;
    padding: 0;
    align-self: flex-start;
    border-bottom: 1px solid transparent;
    transition:
        color 0.2s,
        border-color 0.2s;
}
.col-link:hover {
    color: var(--mj-crimson);
    border-bottom-color: var(--mj-crimson);
}

/* ── Materials ───────────────────────────────────────── */
.mat-section {
    background: linear-gradient(170deg, #1a0f0a 0%, #110b07 55%, #0a0602 100%);
    padding: 100px 60px;
    overflow: hidden;
    position: relative;
}
.mat-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(
        ellipse 65% 35% at 50% 0%,
        rgba(196, 146, 42, 0.07) 0%,
        transparent 60%
    );
    pointer-events: none;
}
.mat-head {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 56px;
    position: relative;
}
.mat-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(32px, 4vw, 52px);
    font-weight: 300;
    color: var(--mj-cream);
    line-height: 1.16;
    margin: 6px 0 16px;
}
.mat-lead {
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.85;
    color: rgba(253, 248, 240, 0.5);
    font-weight: 300;
    max-width: 480px;
    margin: 0 auto;
}
.mat-grid {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border: 1px solid rgba(196, 146, 42, 0.12);
}
.mat-tile {
    padding: 40px 32px 44px;
    border-right: 1px solid rgba(196, 146, 42, 0.1);
    transition: background 0.28s ease;
    position: relative;
}
.mat-tile:last-child {
    border-right: none;
}
.mat-tile:hover {
    background: rgba(196, 146, 42, 0.045);
}
.mat-tile::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(196, 146, 42, 0.5),
        transparent
    );
    transform: scaleX(0);
    transition: transform 0.4s ease;
}
.mat-tile:hover::before {
    transform: scaleX(1);
}
.mat-mark {
    display: block;
    font-size: 22px;
    color: var(--mj-gold);
    margin-bottom: 18px;
    line-height: 1;
    transition: transform 0.3s ease;
}
.mat-tile:hover .mat-mark {
    transform: scale(1.18) rotate(15deg);
}
.mat-title {
    font-family: var(--mj-serif);
    font-size: 18px;
    font-weight: 500;
    color: var(--mj-cream);
    margin-bottom: 12px;
    letter-spacing: 0.01em;
}
.mat-desc {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.85;
    color: rgba(253, 248, 240, 0.4);
    font-weight: 300;
}
.mat-foot {
    max-width: 1180px;
    margin: 56px auto 0;
    display: flex;
    align-items: center;
    gap: 12px;
}
.mat-foot > span:first-child,
.mat-foot > span:last-child {
    flex: 1;
    height: 0.5px;
    background: rgba(196, 146, 42, 0.22);
}
.mat-foot-text {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.24em;
    text-transform: uppercase;
    color: rgba(196, 146, 42, 0.62);
    white-space: nowrap;
}

/* ── CTA ─────────────────────────────────────────────── */
.cl-cta-section {
    background: linear-gradient(
        155deg,
        var(--mj-crimson) 0%,
        var(--mj-crimson-dark) 100%
    );
    padding: 96px 60px;
    overflow: hidden;
    position: relative;
}
.cl-cta-section::before {
    content: '';
    position: absolute;
    top: -120px;
    left: 50%;
    transform: translateX(-50%);
    width: min(640px, 92vw);
    height: min(640px, 92vw);
    border-radius: 50%;
    border: 1px solid rgba(196, 146, 42, 0.12);
    pointer-events: none;
}
.cl-cta-inner {
    max-width: 640px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 1;
}
.cl-cta-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(28px, 3.6vw, 46px);
    font-weight: 300;
    color: var(--mj-cream);
    margin-bottom: 14px;
    line-height: 1.18;
}
.cl-cta-body {
    font-family: var(--mj-sans);
    font-size: 14px;
    color: rgba(253, 248, 240, 0.6);
    margin: 0 auto 36px;
    max-width: 480px;
    line-height: 1.85;
    font-weight: 300;
}
.cl-cta-btns {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}
.cl-cta-btns .mj-btn-gold,
.cl-cta-btns .mj-btn-ghost {
    min-width: 200px;
    padding: 15px 32px;
}

/* Shared eyebrow */
.mj-eyebrow-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 14px;
}
.mj-eyebrow {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.26em;
    color: var(--mj-gold);
    text-transform: uppercase;
}
.mj-crimson-i {
    color: var(--mj-crimson);
    font-style: italic;
    font-weight: 400;
}
.mj-gold-i {
    color: #c4922a;
    font-style: italic;
    font-weight: 400;
}

/* ── Responsive ──────────────────────────────────────── */
@media (max-width: 1100px) {
    .cl-hero {
        padding: 148px 40px 72px;
    }
    .cl-hero-inner {
        min-height: 0;
        padding-right: 0;
    }
    .cl-hero-panel {
        position: relative;
        inset: auto;
        width: 100%;
        min-height: 0;
        margin-top: 36px;
    }
    .col-grid-section {
        padding: 56px 40px 88px;
    }
    .col-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .col-card-featured {
        grid-column: span 2;
    }
    .col-filters-inner {
        padding: 16px 40px;
    }
    .mat-section {
        padding: 88px 40px;
    }
    .mat-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .mat-tile:nth-child(2) {
        border-right: none;
    }
    .mat-tile:nth-child(3),
    .mat-tile:nth-child(4) {
        border-top: 1px solid rgba(196, 146, 42, 0.1);
    }
    .cl-cta-section {
        padding: 84px 40px;
    }
}

@media (max-width: 900px) {
    .cl-hero {
        padding: 132px 28px 60px;
    }
    .col-grid-section {
        padding: 48px 28px 72px;
    }
    .col-filters-inner {
        padding: 14px 28px;
        gap: 12px;
    }
    .col-filters-meta {
        font-size: 10px;
    }
    .mat-section {
        padding: 72px 28px;
    }
    .cl-cta-section {
        padding: 72px 28px;
    }
}

@media (max-width: 640px) {
    .cl-hero {
        padding: 116px 20px 52px;
    }
    .cl-title {
        font-size: clamp(36px, 10vw, 52px);
    }
    .cl-stats {
        gap: 32px 40px;
        padding-top: 22px;
    }
    .cl-stat-num {
        font-size: 26px;
    }

    .col-filters-wrap {
        position: static;
    }
    .col-filters-inner {
        flex-direction: column;
        align-items: flex-start;
        padding: 14px 20px;
        gap: 12px;
    }
    .col-filters {
        width: 100%;
        overflow-x: auto;
        flex-wrap: nowrap;
        scrollbar-width: none;
    }
    .col-filters::-webkit-scrollbar {
        display: none;
    }
    .col-filter-btn {
        flex-shrink: 0;
        padding: 8px 12px;
    }

    .col-grid-section {
        padding: 36px 20px 60px;
    }
    .col-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }
    .col-card-featured {
        grid-column: span 1;
    }
    .col-thumb,
    .col-card-featured .col-thumb {
        min-height: 250px;
    }
    .col-row {
        flex-direction: column;
        align-items: flex-start;
    }

    .mat-section {
        padding: 60px 20px;
    }
    .mat-grid {
        grid-template-columns: 1fr;
    }
    .mat-tile {
        border-right: none;
        border-bottom: 1px solid rgba(196, 146, 42, 0.1);
    }
    .mat-tile:last-child {
        border-bottom: none;
    }
    .mat-tile:nth-child(3),
    .mat-tile:nth-child(4) {
        border-top: none;
    }
    .mat-foot {
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 40px;
    }
    .mat-foot > span:first-child,
    .mat-foot > span:last-child {
        display: none;
    }

    .cl-cta-section {
        padding: 60px 20px;
    }
    .cl-cta-btns {
        flex-direction: column;
        align-items: center;
    }
    .cl-cta-btns .mj-btn-gold,
    .cl-cta-btns .mj-btn-ghost {
        width: 100%;
        max-width: 280px;
        min-width: 0;
    }
}
</style>
