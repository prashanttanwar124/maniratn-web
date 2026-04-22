<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { onMounted, onUnmounted } from 'vue';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import TheNav from '@/components/maniratn/TheNav.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';
import TheAccordion from '@/components/maniratn/TheAccordion.vue';
import HeroShader from '@/components/maniratn/HeroShader.vue';
import { collections as collectionsRoute, contact } from '@/routes';

gsap.registerPlugin(ScrollTrigger);

function navigate(page: string) {
    if (page === 'collections') router.visit(collectionsRoute());
    else if (page === 'contact') router.visit(contact());
    window.scrollTo(0, 0);
}

const collections = [
    { name: 'Bridal Collection', desc: 'Timeless sets for your most precious day', tag: 'Signature', icon: '💍' },
    { name: 'Temple Jewellery', desc: 'Traditional designs rooted in heritage', tag: 'Heritage', icon: '🪔' },
    { name: 'Daily Wear', desc: 'Elegant, lightweight pieces for everyday grace', tag: 'Everyday', icon: '✨' },
    { name: 'Diamond Solitaires', desc: 'Brilliant cuts, exceptional clarity', tag: 'Premium', icon: '💎' },
];

const faqItems = [
    { title: 'What materials do you use?', content: 'All our ornaments are crafted from 22K and 24K hallmarked gold, certified BIS-standard silver, and ethically sourced gemstones including diamonds, rubies, emeralds, and sapphires. Every piece comes with a quality certificate.' },
    { title: 'Do you offer custom jewellery?', content: 'Yes, we specialise in bespoke commissions. From bridal sets to heirloom pieces, our master craftsmen work closely with you from design sketch to final delivery. Visit our store or contact us to begin your custom journey.' },
    { title: 'What is your exchange & return policy?', content: 'We offer lifetime exchange on all gold ornaments at the prevailing market rate. Returns are accepted within 7 days of purchase for unused, unworn pieces accompanied by the original bill and packaging.' },
    { title: 'How do I care for my jewellery?', content: 'Store pieces individually in soft-lined boxes to prevent scratching. Avoid contact with perfumes, chemicals, or chlorinated water. Bring your jewellery to us annually for a complimentary professional cleaning and inspection.' },
    { title: 'Do you provide EMI or instalment plans?', content: 'We offer flexible monthly instalment schemes for purchases above ₹25,000. We also partner with leading banks for 0% EMI options on select purchases. Ask our team for details in-store.' },
];

const featurePoints: [string, string][] = [
    ['BIS Hallmarked', 'Certified purity on every piece'],
    ['Custom Orders', 'Bespoke designs, your vision'],
    ['Expert Craftsmen', 'Artisans with decades of skill'],
    ['Lifetime Exchange', 'Trust that lasts forever'],
];

const marqueeItems = Array(4)
    .fill(['✦ Handcrafted Gold', '✦ BIS Hallmarked', '✦ Custom Orders', '✦ Lifetime Exchange', '✦ 18 Years of Trust', '✦ Diamond Certified'])
    .flat();

const stats: [string, string][] = [
    ['18+', 'Years of craft'],
    ['5000+', 'Happy families'],
    ['100%', 'Hallmarked gold'],
];

const cardGradients = [
    'linear-gradient(135deg,#4A0D0D 0%,#6B1212 55%,#8B2020 100%)',
    'linear-gradient(135deg,#2C1A0A 0%,#5C3010 55%,#7A4218 100%)',
    'linear-gradient(135deg,#1A0F0A 0%,#3A2010 55%,#5A3518 100%)',
    'linear-gradient(135deg,#0A0A1A 0%,#1A1A3A 55%,#2A2A5A 100%)',
];

onMounted(() => {
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
    tl.from('.hero-eyebrow', { y: 20, opacity: 0, duration: 0.6, delay: 0.4 })
      .from('.hero-title',   { y: 44, opacity: 0, duration: 0.9 }, '-=0.35')
      .from('.hero-body',    { y: 22, opacity: 0, duration: 0.65 }, '-=0.55')
      .from('.hero-cta',     { y: 20, opacity: 0, duration: 0.5 }, '-=0.4')
      .from('.hero-stats',   { y: 20, opacity: 0, duration: 0.5 }, '-=0.3')
      .from('.hero-image-card', { y: 24, opacity: 0, duration: 0.55 }, '-=0.3');

    gsap.from('.collection-item', {
        scrollTrigger: { trigger: '.collections-grid', start: 'top 82%' },
        y: 36, opacity: 0, duration: 0.55, stagger: 0.1, ease: 'power3.out',
    });
    gsap.from('.mj-promise-text', {
        scrollTrigger: { trigger: '.feature-section', start: 'top 78%' },
        x: -36, opacity: 0, duration: 0.75, ease: 'power3.out',
    });
    gsap.from('.mj-promise-deco', {
        scrollTrigger: { trigger: '.feature-section', start: 'top 78%' },
        x: 36, opacity: 0, duration: 0.75, ease: 'power3.out', delay: 0.1,
    });
    gsap.from('.faq-section', {
        scrollTrigger: { trigger: '.faq-section', start: 'top 82%' },
        y: 28, opacity: 0, duration: 0.65, ease: 'power3.out',
    });
    gsap.from('.cta-section', {
        scrollTrigger: { trigger: '.cta-section', start: 'top 88%' },
        y: 20, opacity: 0, duration: 0.55, ease: 'power3.out',
    });
});

onUnmounted(() => {
    ScrollTrigger.killAll();
});
</script>

<template>
    <Head title="Maniratn Jewellers — Since 2007" />
    <TheNav current-page="home" hero-variant="dark" />

    <div class="mj-page">
        <!-- ── Hero ──────────────────────────────────────────── -->
        <section class="mj-hero">
            <!-- Left: content -->
            <div class="mj-hero-content">
                <div class="mj-hero-deco-ring mj-hero-deco-ring--tl"></div>
                <div class="mj-hero-deco-ring mj-hero-deco-ring--br"></div>

                <div class="hero-eyebrow">
                    <div class="mj-ew-line"></div>
                    <span>Since 2007</span>
                </div>

                <h1 class="hero-title">
                    Adorn<br>
                    <em>your finest</em><br>
                    <span class="mj-gold-text">moments.</span>
                </h1>

                <p class="hero-body">
                    Handcrafted gold &amp; diamond ornaments for generations of celebrations.
                    Every piece tells a story of tradition and artistry.
                </p>

                <div class="hero-cta">
                    <button class="mj-btn-gold" @click="navigate('collections')">Explore Collections</button>
                    <button class="mj-btn-ghost" @click="navigate('contact')">Visit Store</button>
                </div>

                <div class="hero-stats">
                    <div v-for="[num, label] in stats" :key="num" class="mj-stat">
                        <span class="mj-stat-num">{{ num }}</span>
                        <span class="mj-stat-label">{{ label }}</span>
                    </div>
                </div>
            </div>

            <!-- Right: WebGL shader -->
            <div class="mj-hero-shader">
                <HeroShader />

                <!-- Overlay: floating info pills -->
                <div class="mj-shader-overlay">
                    <div class="mj-hero-pill mj-hero-pill--tl">
                        <span class="mj-pill-dot"></span>
                        <span>22K Hallmarked Gold</span>
                    </div>
                    <div class="mj-hero-pill mj-hero-pill--tr">
                        <span class="mj-pill-dot"></span>
                        <span>BIS Certified</span>
                    </div>
                    <div class="mj-hero-pill mj-hero-pill--bl">
                        <span class="mj-pill-dot"></span>
                        <span>Custom Orders</span>
                    </div>
                </div>

                <!-- Bottom arrival card -->
                <div class="hero-image-card">
                    <svg width="10" height="10" viewBox="0 0 8 8" style="flex-shrink:0">
                        <rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#C4922A"/>
                    </svg>
                    <div>
                        <div class="mj-card-title">New Arrival — Bridal 2025</div>
                        <div class="mj-card-sub">Navaratna necklace set · 22K gold</div>
                    </div>
                    <button class="mj-card-link" @click="navigate('collections')">View →</button>
                </div>
            </div>
        </section>

        <!-- ── Marquee ─────────────────────────────────────── -->
        <div class="mj-marquee-wrap">
            <div class="mj-marquee-track">
                <span v-for="(t, i) in marqueeItems" :key="i" class="mj-marquee-item">{{ t }}</span>
            </div>
        </div>

        <!-- ── Collections ──────────────────────────────────── -->
        <section class="mj-collections-section">
            <div class="mj-section-head">
                <div>
                    <div class="mj-eyebrow-row">
                        <svg width="8" height="8" viewBox="0 0 8 8"><rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#C4922A"/></svg>
                        <span class="mj-eyebrow">Our Collections</span>
                    </div>
                    <h2 class="mj-section-h2">
                        Crafted for every<br><em class="mj-crimson-i">occasion</em>
                    </h2>
                </div>
                <button class="mj-view-all" @click="navigate('collections')">View All →</button>
            </div>

            <div class="collections-grid">
                <div
                    v-for="(col, i) in collections"
                    :key="i"
                    class="collection-item"
                    @click="navigate('collections')"
                >
                    <div class="mj-col-thumb" :style="{ background: cardGradients[i] }">
                        <div class="mj-col-ring mj-col-ring--1"></div>
                        <div class="mj-col-ring mj-col-ring--2"></div>
                        <span class="mj-col-icon">{{ col.icon }}</span>
                        <div class="col-overlay">
                            <span>Explore</span>
                        </div>
                    </div>
                    <div class="mj-col-body">
                        <div class="mj-col-row">
                            <span class="mj-col-name">{{ col.name }}</span>
                            <span class="mj-col-tag">{{ col.tag }}</span>
                        </div>
                        <p class="mj-col-desc">{{ col.desc }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Promise ──────────��───────────────────────────── -->
        <section class="feature-section">
            <div class="mj-promise-text">
                <div class="mj-eyebrow-row">
                    <svg width="8" height="8" viewBox="0 0 8 8"><rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#E8C96D"/></svg>
                    <span class="mj-eyebrow" style="color:var(--mj-gold-light)">Our Promise</span>
                </div>
                <h2 class="mj-promise-h2">
                    Jewellery that carries<br>
                    <em class="mj-gold-i">generations</em> of love
                </h2>
                <p class="mj-promise-body">
                    For over 18 years, Maniratn Jewellers has been the trusted choice for families
                    across the region — from first gold purchases to grand bridal sets.
                </p>
                <div class="mj-promise-grid">
                    <div v-for="[title, desc] in featurePoints" :key="title" class="mj-promise-item">
                        <div class="mj-pi-head">
                            <svg width="6" height="6" viewBox="0 0 8 8"><rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#C4922A"/></svg>
                            <span class="mj-pi-title">{{ title }}</span>
                        </div>
                        <span class="mj-pi-desc">{{ desc }}</span>
                    </div>
                </div>
            </div>

            <div class="mj-promise-deco">
                <div class="mj-stats-grid">
                    <div v-for="[num, label, sub] in promiseStats" :key="num" class="mj-pstat">
                        <span class="mj-pstat-num">{{ num }}</span>
                        <span class="mj-pstat-label">{{ label }}</span>
                        <span class="mj-pstat-sub">{{ sub }}</span>
                    </div>
                </div>
                <div class="mj-promise-badge">
                    <svg width="14" height="14" viewBox="0 0 8 8"><rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#C4922A"/></svg>
                    <span>BIS Hallmarked · Trusted Since 2007</span>
                </div>
            </div>
        </section>

        <!-- ── FAQ ──────────────��───────────────────────────── -->
        <section class="faq-section">
            <div class="mj-faq-inner">
                <div class="mj-faq-head">
                    <div class="mj-faq-orn">
                        <div class="mj-gold-line"></div>
                        <svg width="8" height="8" viewBox="0 0 8 8"><rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#C4922A"/></svg>
                        <div class="mj-gold-line"></div>
                    </div>
                    <span class="mj-eyebrow" style="display:block;text-align:center;margin-bottom:10px">Questions</span>
                    <h2 class="mj-faq-h2">Frequently asked</h2>
                </div>
                <TheAccordion :items="faqItems" variant="light" />
            </div>
        </section>

        <!-- ── CTA ───────────────────��────────────────���─────── -->
        <section class="cta-section">
            <div class="mj-cta-inner">
                <svg width="28" height="28" viewBox="0 0 16 16" style="margin:0 auto 28px;display:block">
                    <path d="M8 0 L9 7 L16 8 L9 9 L8 16 L7 9 L0 8 L7 7Z" fill="#C4922A" opacity="0.85"/>
                </svg>
                <h2 class="mj-cta-h2">Begin your jewellery journey</h2>
                <p class="mj-cta-body">
                    Visit our store or get in touch — we're here to help you find the perfect piece.
                </p>
                <div class="mj-cta-btns">
                    <button class="mj-btn-gold mj-cta-btn" @click="navigate('contact')">Contact Us</button>
                    <button class="mj-btn-ghost mj-cta-btn" @click="navigate('collections')">View Collections</button>
                </div>
                <div class="mj-cta-rule">
                    <span></span>
                    <svg width="8" height="8" viewBox="0 0 8 8"><rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#C4922A" opacity="0.4"/></svg>
                    <span></span>
                </div>
            </div>
        </section>

        <TheFooter />
    </div>
</template>

<script lang="ts">
const promiseStats: [string, string, string][] = [
    ['18+',   'Years',    'of service'],
    ['5000+', 'Families', 'served'],
    ['100%',  'Purity',   'guaranteed'],
    ['0%',    'Compromise', 'on quality'],
];
</script>

<style scoped>
/* ── Page wrapper — kills all x-overflow ─────────────── */
.mj-page {
    overflow-x: hidden;
    width: 100%;
}

/* ── Hero ────────────────────��───────────────────────── */
.mj-hero {
    min-height: 100vh;
    display: grid;
    grid-template-columns: 1fr 1fr;
    overflow: hidden;                /* prevent shader canvas overflow */
}

.mj-hero-content {
    background: var(--mj-crimson);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 120px 64px 80px;
    position: relative;
    overflow: hidden;
    min-width: 0;
}

.mj-hero-deco-ring {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}
.mj-hero-deco-ring--tl {
    top: -80px; right: -80px;
    width: 320px; height: 320px;
    border: 1px solid rgba(196,146,42,0.15);
}
.mj-hero-deco-ring--br {
    bottom: 40px; left: -60px;
    width: 220px; height: 220px;
    border: 1px solid rgba(196,146,42,0.1);
}

/* Eyebrow */
.hero-eyebrow {
    display: flex; align-items: center; gap: 10px;
    margin-bottom: 22px;
}
.mj-ew-line { width: 32px; height: 0.5px; background: var(--mj-gold); flex-shrink: 0; }
.hero-eyebrow span {
    font-family: var(--mj-sans);
    font-size: 11px; letter-spacing: 0.28em;
    color: var(--mj-gold); text-transform: uppercase;
}

/* Title */
.hero-title {
    font-family: var(--mj-serif);
    font-size: clamp(46px, 5vw, 74px);
    font-weight: 300; line-height: 1.08;
    color: var(--mj-cream);
    margin-bottom: 28px; letter-spacing: 0.01em;
}
.hero-title em { font-weight: 400; font-style: italic; }

/* Body */
.hero-body {
    font-family: var(--mj-sans);
    font-size: 14px; line-height: 1.85;
    color: rgba(253,248,240,0.62);
    max-width: 340px; margin-bottom: 40px;
    font-weight: 300;
}

/* CTA */
.hero-cta { display: flex; gap: 14px; align-items: center; flex-wrap: wrap; }

/* Stats */
.hero-stats {
    display: flex; gap: 36px; flex-wrap: wrap;
    margin-top: 56px; padding-top: 28px;
    border-top: 1px solid rgba(196,146,42,0.18);
}
.mj-stat-num {
    display: block;
    font-family: var(--mj-serif); font-size: 30px;
    font-weight: 500; color: var(--mj-gold-light); line-height: 1;
}
.mj-stat-label {
    display: block;
    font-family: var(--mj-sans); font-size: 10px;
    letter-spacing: 0.16em; color: rgba(253,248,240,0.4);
    text-transform: uppercase; margin-top: 4px;
}

/* ── Shader panel ────────────────────────────────────── */
.mj-hero-shader {
    position: relative;
    overflow: hidden;
    min-height: 100vh;
    min-width: 0;
}

/* Floating overlay pills */
.mj-shader-overlay {
    position: absolute;
    inset: 0;
    pointer-events: none;
}
.mj-hero-pill {
    position: absolute;
    display: flex; align-items: center; gap: 8px;
    background: rgba(10,4,4,0.55);
    border: 1px solid rgba(196,146,42,0.3);
    backdrop-filter: blur(8px);
    padding: 9px 16px;
    font-family: var(--mj-sans); font-size: 11px;
    letter-spacing: 0.14em; text-transform: uppercase;
    color: rgba(232,201,109,0.9);
    white-space: nowrap;
}
.mj-hero-pill--tl { top: 18%; left: 8%; }
.mj-hero-pill--tr { top: 30%; right: 8%; }
.mj-hero-pill--bl { bottom: 28%; left: 8%; }
.mj-pill-dot {
    width: 6px; height: 6px; border-radius: 50%;
    background: var(--mj-gold); flex-shrink: 0;
    animation: mj-blink 2.4s ease-in-out infinite;
}
@keyframes mj-blink {
    0%, 100% { opacity: 1; } 50% { opacity: 0.35; }
}

/* Bottom card on shader panel */
.hero-image-card {
    position: absolute; bottom: 32px; left: 24px; right: 24px;
    background: rgba(10,4,4,0.75);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(196,146,42,0.25);
    border-top: 2px solid var(--mj-gold);
    padding: 18px 22px;
    display: flex; align-items: center; gap: 14px;
    z-index: 2;
}
.mj-card-title {
    font-family: var(--mj-serif); font-size: 15px;
    font-weight: 500; color: var(--mj-cream); line-height: 1;
}
.mj-card-sub {
    font-family: var(--mj-sans); font-size: 11px;
    color: rgba(232,201,109,0.65); margin-top: 3px;
}
.mj-card-link {
    margin-left: auto;
    background: none; border: none; cursor: pointer;
    font-family: var(--mj-sans); font-size: 11px;
    letter-spacing: 0.1em; color: var(--mj-gold);
    font-weight: 500; white-space: nowrap;
    transition: color 0.2s;
}
.mj-card-link:hover { color: var(--mj-gold-light); }

/* ── Marquee ────────────���────────────────────────────── */
.mj-marquee-wrap {
    background: var(--mj-gold);
    padding: 13px 0;
    overflow: hidden;          /* critical: prevent x scroll */
    width: 100%;
}
.mj-marquee-track {
    display: flex; gap: 48px;
    width: max-content;        /* let it grow, clipped by parent */
    animation: mj-marquee 22s linear infinite;
}
.mj-marquee-item {
    font-family: var(--mj-sans); font-size: 11px;
    letter-spacing: 0.22em; text-transform: uppercase;
    color: var(--mj-crimson-dark); font-weight: 600;
    white-space: nowrap;
}
@keyframes mj-marquee {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}

/* ── Shared eyebrow ────────���─────────────────────────── */
.mj-eyebrow-row { display: flex; align-items: center; gap: 8px; margin-bottom: 14px; }
.mj-eyebrow {
    font-family: var(--mj-sans); font-size: 11px;
    letter-spacing: 0.26em; color: var(--mj-gold); text-transform: uppercase;
}

/* ── Collections ──────────────���──────────────────────── */
.mj-collections-section {
    padding: 100px 60px;
    background: linear-gradient(180deg, #FEFBF5 0%, var(--mj-cream) 100%);
    overflow: hidden;
}
.mj-section-head {
    display: flex; justify-content: space-between;
    align-items: flex-end; margin-bottom: 48px;
    gap: 16px; flex-wrap: wrap;
}
.mj-section-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(34px, 4vw, 54px);
    font-weight: 300; color: var(--mj-ink);
    letter-spacing: 0.01em; line-height: 1.15;
}
.mj-crimson-i { color: var(--mj-crimson); font-style: italic; }
.mj-view-all {
    font-family: var(--mj-sans); font-size: 12px;
    letter-spacing: 0.15em; color: var(--mj-gold);
    text-transform: uppercase; cursor: pointer;
    border: none; background: none;
    border-bottom: 1px solid var(--mj-gold); padding-bottom: 2px;
    white-space: nowrap;
}

.collections-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
}
.collection-item {
    cursor: pointer; overflow: hidden;
    border: 1px solid rgba(196,146,42,0.2);
    background: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}
.collection-item:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(26,15,10,0.13);
    border-color: rgba(196,146,42,0.5);
}
.collection-item:hover .col-overlay { opacity: 1; }

.mj-col-thumb {
    height: 260px; position: relative; overflow: hidden;
    display: flex; align-items: center; justify-content: center;
}
.mj-col-ring {
    position: absolute; border-radius: 50%;
}
.mj-col-ring--1 { width: 120px; height: 120px; border: 1px solid rgba(196,146,42,0.22); }
.mj-col-ring--2 { width: 80px;  height: 80px;  border: 1px solid rgba(196,146,42,0.16); }
.mj-col-icon { position: relative; z-index: 1; font-size: 38px; }
.col-overlay {
    position: absolute; inset: 0;
    background: rgba(107,18,18,0.72);
    opacity: 0; transition: opacity 0.3s ease;
    display: flex; align-items: center; justify-content: center;
}
.col-overlay span {
    font-family: var(--mj-sans); font-size: 11px;
    letter-spacing: 0.22em; color: var(--mj-cream);
    text-transform: uppercase;
    border-bottom: 1px solid rgba(232,201,109,0.5); padding-bottom: 2px;
}
.mj-col-body { padding: 16px 14px 14px; background: #fff; }
.mj-col-row {
    display: flex; justify-content: space-between;
    align-items: center; margin-bottom: 6px;
}
.mj-col-name { font-family: var(--mj-serif); font-size: 17px; font-weight: 500; color: var(--mj-ink); }
.mj-col-tag {
    font-family: var(--mj-sans); font-size: 9px;
    letter-spacing: 0.15em; color: var(--mj-crimson);
    text-transform: uppercase;
    border: 1px solid rgba(107,18,18,0.28); padding: 2px 7px;
}
.mj-col-desc { font-family: var(--mj-sans); font-size: 12px; color: var(--mj-ink-soft); line-height: 1.6; }

/* ── Promise / Feature ───────────────��───────────────── */
.feature-section {
    display: grid; grid-template-columns: 1fr 1fr;
    background: var(--mj-crimson-dark);
    overflow: hidden;
}
.mj-promise-text { padding: 96px 64px; min-width: 0; }
.mj-promise-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(30px, 3.5vw, 48px);
    font-weight: 300; color: var(--mj-cream);
    line-height: 1.18; margin-bottom: 24px;
}
.mj-gold-i { color: #E8C96D; font-style: italic; }
.mj-promise-body {
    font-family: var(--mj-sans); font-size: 14px;
    line-height: 1.9; color: rgba(253,248,240,0.55);
    margin-bottom: 36px; font-weight: 300; max-width: 380px;
}
.mj-promise-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 22px 28px; }
.mj-pi-head { display: flex; align-items: center; gap: 8px; margin-bottom: 4px; }
.mj-pi-title { font-family: var(--mj-serif); font-size: 16px; font-weight: 500; color: var(--mj-cream); }
.mj-pi-desc { font-family: var(--mj-sans); font-size: 12px; color: rgba(253,248,240,0.42); line-height: 1.5; }

.mj-promise-deco {
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    gap: 20px; padding: 64px 40px;
    min-width: 0;
}
.mj-stats-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 2px; width: 100%; max-width: 320px;
}
.mj-pstat {
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    padding: 28px 12px;
    background: rgba(253,248,240,0.04);
    border: 1px solid rgba(196,146,42,0.12);
    text-align: center;
    transition: background 0.22s;
}
.mj-pstat:hover { background: rgba(196,146,42,0.07); }
.mj-pstat-num {
    font-family: var(--mj-serif); font-size: 32px;
    font-weight: 500; color: #E8C96D; line-height: 1;
}
.mj-pstat-label {
    font-family: var(--mj-sans); font-size: 10px;
    letter-spacing: 0.14em; color: rgba(253,248,240,0.65);
    text-transform: uppercase; margin-top: 5px;
}
.mj-pstat-sub {
    font-family: var(--mj-sans); font-size: 9px;
    color: rgba(253,248,240,0.28); margin-top: 2px;
}
.mj-promise-badge {
    display: flex; align-items: center; gap: 8px;
    border: 1px solid rgba(196,146,42,0.18);
    padding: 10px 20px;
    background: rgba(253,248,240,0.03);
}
.mj-promise-badge span {
    font-family: var(--mj-sans); font-size: 11px;
    letter-spacing: 0.1em; color: rgba(232,201,109,0.6);
    text-transform: uppercase;
}

/* ── FAQ ───────────��─────────────────────────────────── */
.faq-section { padding: 96px 60px; background: #fff; overflow: hidden; }
.mj-faq-inner { max-width: 800px; margin: 0 auto; }
.mj-faq-head { text-align: center; margin-bottom: 44px; }
.mj-faq-orn { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 12px; }
.mj-faq-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(30px, 3vw, 44px);
    font-weight: 300; color: var(--mj-ink);
}

/* ── CTA ────────────────────���───────────────────���────── */
.cta-section {
    background: linear-gradient(155deg, var(--mj-crimson) 0%, var(--mj-crimson-dark) 100%);
    overflow: hidden;
    position: relative;
}
.cta-section::before {
    content: '';
    position: absolute; top: -100px; left: 50%;
    transform: translateX(-50%);
    width: min(600px, 90vw); height: min(600px, 90vw);
    border-radius: 50%;
    border: 1px solid rgba(196,146,42,0.1);
    pointer-events: none;
}
.mj-cta-inner {
    position: relative; z-index: 1;
    text-align: center; padding: 96px 60px;
}
.mj-cta-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(28px, 3.5vw, 46px);
    font-weight: 300; color: var(--mj-cream);
    margin-bottom: 14px; line-height: 1.2;
}
.mj-cta-body {
    font-family: var(--mj-sans); font-size: 14px;
    color: rgba(253,248,240,0.55);
    margin: 0 auto 40px; max-width: 400px; line-height: 1.7;
}
.mj-cta-btns { display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; }
.mj-cta-btn { min-width: 160px; padding: 15px 36px; }
.mj-cta-rule {
    display: flex; align-items: center; justify-content: center;
    gap: 12px; margin-top: 52px;
}
.mj-cta-rule span {
    display: block; width: 80px; height: 0.5px;
    background: rgba(196,146,42,0.28);
}

/* ── Responsive ────────────────���─────────────────────── */
@media (max-width: 1100px) {
    .mj-hero { grid-template-columns: 1fr; min-height: auto; }
    .mj-hero-content { padding: 120px 32px 56px; }
    .mj-hero-shader { min-height: 55vh; }
    .collections-grid { grid-template-columns: repeat(2, 1fr); }
    .feature-section { grid-template-columns: 1fr; }
    .mj-promise-text { padding: 72px 40px; }
    .mj-promise-deco { padding: 48px 40px; }
}

@media (max-width: 720px) {
    .mj-hero-content { padding: 110px 24px 52px; }
    .hero-cta { flex-direction: column; }
    .hero-stats { gap: 16px 24px; }
    .mj-collections-section, .faq-section { padding: 72px 20px; }
    .collections-grid { grid-template-columns: 1fr; }
    .mj-promise-text { padding: 56px 24px; }
    .mj-cta-inner { padding: 72px 24px; }
    .mj-hero-pill--tr { display: none; }
    .mj-stats-grid { max-width: 100%; }
    .faq-section { padding-inline: 20px; }
}
</style>
