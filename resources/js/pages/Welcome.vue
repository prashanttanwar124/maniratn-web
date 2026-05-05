<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { onMounted, onUnmounted } from 'vue';
import CustomCursor from '@/components/maniratn/CustomCursor.vue';
import HeroShader from '@/components/maniratn/HeroShader.vue';
import TheAccordion from '@/components/maniratn/TheAccordion.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';
import TheNav from '@/components/maniratn/TheNav.vue';
import { collections as collectionsRoute, contact } from '@/routes';

gsap.registerPlugin(ScrollTrigger);

function navigate(page: string) {
    if (page === 'collections') {
        router.visit(collectionsRoute());
    } else if (page === 'contact') {
        router.visit(contact());
    }

    window.scrollTo(0, 0);
}

const collections = [
    {
        name: 'Bridal Collection',
        desc: 'Statement sets shaped for weddings, rituals, and once-in-a-lifetime entrances.',
        tag: 'Signature',
        note: '22K gold sets',
        mark: 'B',
        accent: '#E8C96D',
    },
    {
        name: 'Temple Jewellery',
        desc: 'Traditional motifs with weight, texture, and the warmth of inherited craft.',
        tag: 'Heritage',
        note: 'Antique finish',
        mark: 'T',
        accent: '#D6A03A',
    },
    {
        name: 'Daily Wear',
        desc: 'Lightweight pieces that stay graceful from morning routines to evening plans.',
        tag: 'Everyday',
        note: 'Easy elegance',
        mark: 'D',
        accent: '#F2D98D',
    },
    {
        name: 'Diamond Solitaires',
        desc: 'Certified sparkle, clean settings, and brilliant cuts selected with care.',
        tag: 'Premium',
        note: 'Certified stones',
        mark: 'S',
        accent: '#DCD7FF',
    },
];

const faqItems = [
    {
        title: 'What materials do you use?',
        content:
            'All our ornaments are crafted from 22K and 24K hallmarked gold, certified BIS-standard silver, and ethically sourced gemstones including diamonds, rubies, emeralds, and sapphires. Every piece comes with a quality certificate.',
    },
    {
        title: 'Do you offer custom jewellery?',
        content:
            'Yes, we specialise in bespoke commissions. From bridal sets to heirloom pieces, our master craftsmen work closely with you from design sketch to final delivery. Visit our store or contact us to begin your custom journey.',
    },
    {
        title: 'What is your exchange & return policy?',
        content:
            'We offer lifetime exchange on all gold ornaments at the prevailing market rate. Returns are accepted within 7 days of purchase for unused, unworn pieces accompanied by the original bill and packaging.',
    },
    {
        title: 'How do I care for my jewellery?',
        content:
            'Store pieces individually in soft-lined boxes to prevent scratching. Avoid contact with perfumes, chemicals, or chlorinated water. Bring your jewellery to us annually for a complimentary professional cleaning and inspection.',
    },
    {
        title: 'Do you provide EMI or instalment plans?',
        content:
            'We offer flexible monthly instalment schemes for purchases above ₹25,000. We also partner with leading banks for 0% EMI options on select purchases. Ask our team for details in-store.',
    },
];

const featureTiles = [
    {
        title: 'BIS Hallmarked',
        desc: 'Every ornament carries BIS certification — your assurance of verified 22K or 24K purity, without exception.',
        mark: '◈',
    },
    {
        title: 'Custom Orders',
        desc: 'From a sketch on paper to a finished heirloom — our designers work alongside you at every step of the journey.',
        mark: '◇',
    },
    {
        title: 'Expert Craftsmen',
        desc: 'Our goldsmiths have practiced their art for decades. Many learned from their fathers. Their hands know no shortcuts.',
        mark: '✦',
    },
    {
        title: 'Lifetime Exchange',
        desc: 'Bring back any Maniratn piece at any time and exchange it at the prevailing gold rate. No questions. No expiry.',
        mark: '◆',
    },
];

const conciergeTiles = [
    {
        title: 'Private bridal appointments',
        desc: 'A calm showroom hour for the family, the references, the budget, and the pieces that need to feel exactly right.',
        meta: '60-90 min',
        mark: '01',
    },
    {
        title: 'Heirloom redesign',
        desc: 'Bring an older ornament, a loose stone, or a family memory. We will preserve what matters and remake what needs new life.',
        meta: 'Sketch first',
        mark: '02',
    },
    {
        title: 'Annual care',
        desc: 'Cleaning, clasp checks, prong inspection, and honest repair advice for pieces made by us and pieces you already own.',
        meta: 'Lifetime',
        mark: '03',
    },
];

const marqueeItems = Array(4)
    .fill([
        '✦ Handcrafted Gold',
        '✦ BIS Hallmarked',
        '✦ Custom Orders',
        '✦ Lifetime Exchange',
        '✦ 18 Years of Trust',
        '✦ Diamond Certified',
    ])
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

const heroParticles = [
    {
        id: 0,
        left: '8%',
        top: '18%',
        size: '8px',
        dur: '6.2s',
        delay: '0s',
        op: 0.13,
    },
    {
        id: 1,
        left: '72%',
        top: '22%',
        size: '6px',
        dur: '8.1s',
        delay: '1.1s',
        op: 0.09,
    },
    {
        id: 2,
        left: '55%',
        top: '10%',
        size: '10px',
        dur: '5.6s',
        delay: '2.3s',
        op: 0.14,
    },
    {
        id: 3,
        left: '88%',
        top: '38%',
        size: '7px',
        dur: '7.4s',
        delay: '0.5s',
        op: 0.1,
    },
    {
        id: 4,
        left: '32%',
        top: '72%',
        size: '9px',
        dur: '6.8s',
        delay: '1.8s',
        op: 0.08,
    },
    {
        id: 5,
        left: '15%',
        top: '55%',
        size: '6px',
        dur: '9.0s',
        delay: '3.2s',
        op: 0.11,
    },
    {
        id: 6,
        left: '62%',
        top: '65%',
        size: '8px',
        dur: '7.0s',
        delay: '0.9s',
        op: 0.09,
    },
    {
        id: 7,
        left: '42%',
        top: '32%',
        size: '11px',
        dur: '5.2s',
        delay: '4.0s',
        op: 0.12,
    },
    {
        id: 8,
        left: '78%',
        top: '78%',
        size: '7px',
        dur: '8.6s',
        delay: '2.7s',
        op: 0.08,
    },
    {
        id: 9,
        left: '24%',
        top: '14%',
        size: '5px',
        dur: '10s',
        delay: '1.5s',
        op: 0.07,
    },
    {
        id: 10,
        left: '90%',
        top: '58%',
        size: '9px',
        dur: '6.5s',
        delay: '3.8s',
        op: 0.1,
    },
    {
        id: 11,
        left: '48%',
        top: '88%',
        size: '6px',
        dur: '7.8s',
        delay: '0.3s',
        op: 0.08,
    },
    {
        id: 12,
        left: '5%',
        top: '42%',
        size: '7px',
        dur: '8.3s',
        delay: '2.0s',
        op: 0.09,
    },
    {
        id: 13,
        left: '66%',
        top: '45%',
        size: '5px',
        dur: '9.5s',
        delay: '4.5s',
        op: 0.07,
    },
    {
        id: 14,
        left: '20%',
        top: '84%',
        size: '8px',
        dur: '6.0s',
        delay: '1.3s',
        op: 0.11,
    },
    {
        id: 15,
        left: '82%',
        top: '12%',
        size: '6px',
        dur: '7.2s',
        delay: '3.5s',
        op: 0.1,
    },
];

const craftSteps = [
    {
        num: '01',
        title: 'Design',
        detail: 'Every ornament begins as a vision rendered on paper — precise sketches and technical blueprints drawn before a single gram of gold is touched.',
    },
    {
        num: '02',
        title: 'Casting',
        detail: '22K or 24K gold is melted, alloyed to perfection, and poured into hand-engraved moulds built for a single ornament — never mass-produced.',
    },
    {
        num: '03',
        title: 'Stone Setting',
        detail: 'Each gemstone is placed and secured individually by hand. Our setters work under magnification, positioning every stone for maximum brilliance.',
    },
    {
        num: '04',
        title: 'Hallmarking',
        detail: 'The finished piece is submitted for BIS certification. Only after it passes every purity test does it earn the Maniratn name.',
    },
];

const promiseStats: [string, string, string][] = [
    ['18+', 'Years', 'of service'],
    ['5000+', 'Families', 'served'],
    ['100%', 'Purity', 'guaranteed'],
    ['0%', 'Compromise', 'on quality'],
];

const heritageBeats = [
    {
        year: '2007',
        title: 'The first showroom',
        body: 'A modest workshop opened in Pune with a single goldsmith and a single belief — that craft cannot be hurried.',
    },
    {
        year: '2013',
        title: 'Bridal atelier',
        body: 'Demand for bespoke bridal sets grew. We opened a private commission studio dedicated to the wedding family.',
    },
    {
        year: '2019',
        title: 'Diamond programme',
        body: 'Direct sourcing from certified ateliers. Every solitaire is now accompanied by an internationally recognised grading report.',
    },
    {
        year: '2024',
        title: 'A new generation',
        body: 'The next chapter — uniting eighteen years of craft with the contemporary tastes of a new generation of clients.',
    },
];

const testimonials = [
    {
        quote: 'My grandmother bought her first set here in 2009. When my own wedding came, there was no question where I would go. The workmanship has not changed in two generations.',
        name: 'Aarti Deshpande',
        occasion: 'Bridal commission, 2024',
        mark: 'A',
    },
    {
        quote: "They re-set my mother's emerald into a contemporary pendant for my daughter's twenty-first. Three generations, one stone — and they understood exactly what that meant.",
        name: 'Rohan Kulkarni',
        occasion: 'Heirloom redesign, 2023',
        mark: 'R',
    },
    {
        quote: 'I sent sketches over WhatsApp from London. Six weeks later I tried on a Navaratna set that fit as if it had always been mine. Quiet, attentive, exact.',
        name: 'Meera Joshi',
        occasion: 'Custom Navaratna set, 2024',
        mark: 'M',
    },
];

onMounted(() => {
    // ── Hero entrance ──────────────────────────────────────
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
    tl.from('.hero-eyebrow', { y: 20, opacity: 0, duration: 0.6, delay: 0.5 })
        .from('.hero-title', { y: 44, opacity: 0, duration: 0.9 }, '-=0.35')
        .from('.hero-body', { y: 22, opacity: 0, duration: 0.65 }, '-=0.55')
        .from('.hero-cta', { y: 20, opacity: 0, duration: 0.5 }, '-=0.4')
        .from('.hero-stats', { y: 20, opacity: 0, duration: 0.5 }, '-=0.3')
        .from('.hero-card', { y: 24, opacity: 0, duration: 0.55 }, '-=0.3')
        .from(
            '.hero-scroll-ind',
            { y: 10, opacity: 0, duration: 0.5 },
            '-=0.2',
        );

    // ── Hero stat count-up ─────────────────────────────────
    document.querySelectorAll<HTMLElement>('.mj-stat-num').forEach((el, i) => {
        const txt = el.textContent?.trim() ?? '';
        const target = parseFloat(txt);
        const suffix = txt.replace(/[\d.]/g, '');
        const obj = { val: 0 };
        gsap.to(obj, {
            val: target,
            duration: 1.6,
            ease: 'power2.out',
            delay: 1.9 + i * 0.2,
            onUpdate: () => {
                el.textContent = Math.round(obj.val) + suffix;
            },
        });
    });

    // ── Collections ────────────────────────────────────────
    gsap.from('.collection-item', {
        scrollTrigger: { trigger: '.collections-grid', start: 'top 82%' },
        y: 36,
        opacity: 0,
        duration: 0.55,
        stagger: 0.1,
        ease: 'power3.out',
    });

    // ── Concierge ──────────────────────────────────────────
    gsap.from('.mj-concierge-copy, .mj-concierge-card', {
        scrollTrigger: { trigger: '.mj-concierge-section', start: 'top 82%' },
        y: 36,
        opacity: 0,
        duration: 0.62,
        stagger: 0.1,
        ease: 'power3.out',
    });

    // ── Craft steps ────────────────────────────────────────
    gsap.from('.mj-craft-head', {
        scrollTrigger: { trigger: '.mj-craft-section', start: 'top 80%' },
        y: 30,
        opacity: 0,
        duration: 0.75,
        ease: 'power3.out',
    });
    gsap.from('.mj-craft-step', {
        scrollTrigger: { trigger: '.mj-craft-steps', start: 'top 82%' },
        y: 50,
        opacity: 0,
        duration: 0.65,
        stagger: 0.14,
        ease: 'power3.out',
    });

    // ── Heritage story ─────────────────────────────────────
    gsap.from(
        '.mj-heritage-eyebrow, .mj-heritage-h2, .mj-heritage-lead, .mj-heritage-sign',
        {
            scrollTrigger: {
                trigger: '.mj-heritage-section',
                start: 'top 80%',
            },
            y: 28,
            opacity: 0,
            duration: 0.7,
            stagger: 0.08,
            ease: 'power3.out',
        },
    );
    gsap.from('.mj-heritage-beat', {
        scrollTrigger: { trigger: '.mj-heritage-timeline', start: 'top 82%' },
        y: 32,
        opacity: 0,
        duration: 0.6,
        stagger: 0.12,
        ease: 'power3.out',
    });

    // ── Testimonials ───────────────────────────────────────
    gsap.from('.mj-tm-head', {
        scrollTrigger: {
            trigger: '.mj-testimonials-section',
            start: 'top 82%',
        },
        y: 28,
        opacity: 0,
        duration: 0.7,
        ease: 'power3.out',
    });
    gsap.from('.mj-tm-card', {
        scrollTrigger: { trigger: '.mj-tm-grid', start: 'top 85%' },
        y: 38,
        opacity: 0,
        duration: 0.6,
        stagger: 0.13,
        ease: 'power3.out',
    });

    // ── Promise / Feature section ──────────────────────────
    gsap.from('.fs-head', {
        scrollTrigger: { trigger: '.feature-section', start: 'top 82%' },
        y: 36,
        opacity: 0,
        duration: 0.8,
        ease: 'power3.out',
    });
    gsap.from('.fs-stat', {
        scrollTrigger: { trigger: '.fs-stats-band', start: 'top 85%' },
        y: 30,
        opacity: 0,
        duration: 0.55,
        stagger: 0.1,
        ease: 'power3.out',
    });
    gsap.from('.fs-tile', {
        scrollTrigger: { trigger: '.fs-tiles', start: 'top 85%' },
        y: 28,
        opacity: 0,
        duration: 0.5,
        stagger: 0.1,
        ease: 'power2.out',
    });

    // ── Stat count-up ──────────────────────────────────────
    document.querySelectorAll<HTMLElement>('.fs-stat-num').forEach((el, i) => {
        const txt = el.textContent?.trim() ?? '';
        const target = parseFloat(txt);
        const suffix = txt.replace(/[\d.]/g, '');
        const obj = { val: 0 };
        gsap.to(obj, {
            scrollTrigger: { trigger: el, start: 'top 88%' },
            val: target,
            duration: 2.0,
            ease: 'power2.out',
            delay: i * 0.12,
            onUpdate: () => {
                el.textContent = Math.round(obj.val) + suffix;
            },
        });
    });

    // ── FAQ & CTA ──────────────────────────────────────────
    gsap.from('.faq-section', {
        scrollTrigger: { trigger: '.faq-section', start: 'top 82%' },
        y: 28,
        opacity: 0,
        duration: 0.65,
        ease: 'power3.out',
    });
    gsap.from('.cta-section', {
        scrollTrigger: { trigger: '.cta-section', start: 'top 88%' },
        y: 20,
        opacity: 0,
        duration: 0.55,
        ease: 'power3.out',
    });
});

onUnmounted(() => {
    ScrollTrigger.killAll();
});
</script>

<template>
    <Head title="Maniratn Jewellers — Since 2007" />

    <CustomCursor />
    <TheNav current-page="home" hero-variant="dark" />

    <div class="mj-page">
        <!-- ── Hero: full-width with shader bg ────────────── -->
        <section class="mj-hero">
            <!-- Layer 0: WebGL shader fills entire hero -->
            <HeroShader />

            <!-- Layer 1: gradient overlay — ensures left text is legible -->
            <div class="mj-hero-overlay"></div>

            <!-- Layer 1b: floating gold particles -->
            <div class="hero-particles" aria-hidden="true">
                <div
                    v-for="p in heroParticles"
                    :key="p.id"
                    class="hero-particle"
                    :style="{
                        left: p.left,
                        top: p.top,
                        width: p.size,
                        height: p.size,
                        animationDuration: p.dur,
                        animationDelay: p.delay,
                        opacity: p.op,
                    }"
                ></div>
            </div>

            <!-- Layer 2: content -->
            <div class="mj-hero-content">
                <div class="hero-eyebrow">
                    <div class="mj-ew-line"></div>
                    <span>Since 2007</span>
                </div>

                <h1 class="hero-title">
                    Adorn<br />
                    <em>your finest</em><br />
                    <span class="mj-gold-text">moments.</span>
                </h1>

                <p class="hero-body">
                    Handcrafted gold &amp; diamond ornaments for generations of
                    celebrations. Every piece tells a story of tradition and
                    artistry.
                </p>

                <div class="hero-cta">
                    <button
                        class="mj-btn-gold"
                        @click="navigate('collections')"
                    >
                        Explore Collections
                    </button>
                    <button class="mj-btn-ghost" @click="navigate('contact')">
                        Visit Store
                    </button>
                </div>

                <div class="hero-stats">
                    <div
                        v-for="[num, label] in stats"
                        :key="num"
                        class="mj-stat"
                    >
                        <span class="mj-stat-num">{{ num }}</span>
                        <span class="mj-stat-label">{{ label }}</span>
                    </div>
                </div>
            </div>

            <!-- Layer 2b: scroll indicator -->
            <div class="hero-scroll-ind" aria-hidden="true">
                <span class="hsi-text">Scroll</span>
                <div class="hsi-line"><div class="hsi-dot"></div></div>
            </div>

            <!-- Layer 3: bottom-right arrival card -->
            <div class="hero-card">
                <svg
                    width="10"
                    height="10"
                    viewBox="0 0 8 8"
                    style="flex-shrink: 0"
                >
                    <rect
                        x="4"
                        y="0"
                        width="4"
                        height="4"
                        transform="rotate(45 4 4)"
                        fill="#C4922A"
                    />
                </svg>
                <div>
                    <div class="hero-card-title">New Arrival — Bridal 2025</div>
                    <div class="hero-card-sub">
                        Navaratna necklace set · 22K gold
                    </div>
                </div>
                <button class="hero-card-link" @click="navigate('collections')">
                    View →
                </button>
            </div>
        </section>

        <!-- ── Marquee ─────────────────────────────────────── -->
        <div class="mj-marquee-wrap">
            <div class="mj-marquee-track">
                <span
                    v-for="(t, i) in marqueeItems"
                    :key="i"
                    class="mj-marquee-item"
                    >{{ t }}</span
                >
            </div>
        </div>

        <!-- ── Heritage Story ──────────────────────────────── -->
        <section class="mj-heritage-section">
            <div class="mj-heritage-inner">
                <div class="mj-heritage-copy">
                    <div class="mj-eyebrow-row mj-heritage-eyebrow">
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
                        <span class="mj-eyebrow">Our Heritage</span>
                    </div>
                    <h2 class="mj-heritage-h2">
                        A house built<br />
                        <em class="mj-crimson-i">one ornament at a time.</em>
                    </h2>
                    <p class="mj-heritage-lead">
                        Maniratn began in 2007 with a single goldsmith's bench
                        and a single principle — that an ornament worth wearing
                        is worth waiting for. Eighteen years on, the bench has
                        grown, the principle has not.
                    </p>
                    <p class="mj-heritage-lead">
                        Every piece that leaves our atelier carries the same
                        quiet patience of the first one we ever made. It is the
                        only way we know how to work.
                    </p>
                    <div class="mj-heritage-sign">
                        <span class="mj-heritage-sign-name"
                            >— The Maniratn Atelier</span
                        >
                        <span class="mj-heritage-sign-place"
                            >Pune · Est. 2007</span
                        >
                    </div>
                </div>

                <div class="mj-heritage-frame" aria-hidden="true">
                    <div class="mj-heritage-frame-inner">
                        <div class="mj-heritage-frame-top">
                            <span>Established</span>
                        </div>
                        <div class="mj-heritage-frame-year">
                            <span class="mj-heritage-frame-19">20</span
                            ><span class="mj-heritage-frame-07">07</span>
                        </div>
                        <div class="mj-heritage-frame-orn">
                            <span></span>
                            <svg width="10" height="10" viewBox="0 0 8 8">
                                <rect
                                    x="4"
                                    y="0"
                                    width="4"
                                    height="4"
                                    transform="rotate(45 4 4)"
                                    fill="#C4922A"
                                />
                            </svg>
                            <span></span>
                        </div>
                        <div class="mj-heritage-frame-foot">
                            <span class="mj-heritage-frame-mono">M · J</span>
                            <span class="mj-heritage-frame-tag"
                                >Maniratn Jewellers</span
                            >
                            <span
                                class="mj-heritage-frame-tag mj-heritage-frame-tag-fade"
                                >Goldsmiths · Pune</span
                            >
                        </div>
                    </div>
                </div>
            </div>

            <div class="mj-heritage-timeline">
                <div
                    v-for="beat in heritageBeats"
                    :key="beat.year"
                    class="mj-heritage-beat"
                >
                    <span class="mj-heritage-beat-year">{{ beat.year }}</span>
                    <span
                        class="mj-heritage-beat-dot"
                        aria-hidden="true"
                    ></span>
                    <h3 class="mj-heritage-beat-title">{{ beat.title }}</h3>
                    <p class="mj-heritage-beat-body">{{ beat.body }}</p>
                </div>
            </div>
        </section>

        <!-- ── Collections ──────────────────────────────────── -->
        <section class="mj-collections-section">
            <div class="mj-section-head">
                <div>
                    <div class="mj-eyebrow-row">
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
                    <h2 class="mj-section-h2">
                        Crafted for every<br /><em class="mj-crimson-i"
                            >occasion</em
                        >
                    </h2>
                    <p class="mj-section-lead">
                        Explore jewellery made for the moments families return
                        to for years: wedding mornings, festive evenings, daily
                        rituals, and quiet milestones.
                    </p>
                </div>
                <button class="mj-view-all" @click="navigate('collections')">
                    View All →
                </button>
            </div>

            <div class="collections-grid">
                <button
                    v-for="(col, i) in collections"
                    :key="i"
                    class="collection-item"
                    :class="{ 'collection-item-featured': i === 0 }"
                    type="button"
                    @click="navigate('collections')"
                >
                    <div
                        class="mj-col-thumb"
                        :style="{
                            '--collection-accent': col.accent,
                            background: cardGradients[i],
                        }"
                    >
                        <span class="mj-col-num">{{
                            String(i + 1).padStart(2, '0')
                        }}</span>
                        <span class="mj-col-note">{{ col.note }}</span>
                        <div class="mj-col-center">
                            <span class="mj-col-mark" aria-hidden="true">{{
                                col.mark
                            }}</span>
                            <span class="mj-col-thumb-name">{{
                                col.name
                            }}</span>
                        </div>
                        <div class="col-overlay"><span>Explore →</span></div>
                    </div>
                    <div class="mj-col-body">
                        <div class="mj-col-row">
                            <span class="mj-col-name">{{ col.name }}</span>
                            <span class="mj-col-tag">{{ col.tag }}</span>
                        </div>
                        <p class="mj-col-desc">{{ col.desc }}</p>
                    </div>
                </button>
            </div>
        </section>

        <!-- ── Concierge ───────────────────────────────────── -->
        <section class="mj-concierge-section">
            <div class="mj-concierge-inner">
                <div class="mj-concierge-copy">
                    <div class="mj-eyebrow-row">
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
                        <span class="mj-eyebrow">Maniratn Concierge</span>
                    </div>
                    <h2 class="mj-concierge-h2">
                        Not just a purchase.<br />
                        <em class="mj-gold-i">A guided making.</em>
                    </h2>
                    <p class="mj-concierge-lead">
                        The right jewellery conversation has room for
                        references, family opinions, metal rates, delivery
                        dates, and the small details that make a piece yours.
                    </p>
                    <button class="mj-btn-gold" @click="navigate('contact')">
                        Book a Consultation
                    </button>
                </div>

                <div class="mj-concierge-grid">
                    <article
                        v-for="tile in conciergeTiles"
                        :key="tile.title"
                        class="mj-concierge-card"
                    >
                        <span class="mj-concierge-mark">{{ tile.mark }}</span>
                        <span class="mj-concierge-meta">{{ tile.meta }}</span>
                        <h3 class="mj-concierge-title">{{ tile.title }}</h3>
                        <p class="mj-concierge-desc">{{ tile.desc }}</p>
                    </article>
                </div>
            </div>
        </section>

        <!-- ── The Making ──────────────────────────────────── -->
        <section class="mj-craft-section">
            <div class="mj-craft-head">
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
                    <span class="mj-eyebrow">The Making</span>
                </div>
                <h2 class="mj-craft-h2">
                    How tomorrow's heirlooms<br /><em class="mj-gold-i"
                        >are born today</em
                    >
                </h2>
                <p class="mj-craft-sub">
                    Four steps. Eighteen years of practice. Zero shortcuts.
                </p>
            </div>

            <div class="mj-craft-steps">
                <div
                    v-for="step in craftSteps"
                    :key="step.num"
                    class="mj-craft-step"
                >
                    <span class="mj-cs-num">{{ step.num }}</span>
                    <div class="mj-cs-orn" aria-hidden="true">
                        <div class="mj-cs-line-l"></div>
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
                        <div class="mj-cs-line-r"></div>
                    </div>
                    <h3 class="mj-cs-title">{{ step.title }}</h3>
                    <p class="mj-cs-detail">{{ step.detail }}</p>
                </div>
            </div>

            <div class="mj-craft-foot" aria-hidden="true">
                <span></span>
                <svg width="6" height="6" viewBox="0 0 8 8">
                    <rect
                        x="4"
                        y="0"
                        width="4"
                        height="4"
                        transform="rotate(45 4 4)"
                        fill="#C4922A"
                        opacity="0.35"
                    />
                </svg>
                <span></span>
            </div>
        </section>

        <!-- ── Promise / Feature ────────────────────────────── -->
        <section class="feature-section">
            <!-- Header -->
            <div class="fs-head">
                <div
                    class="mj-eyebrow-row"
                    style="justify-content: center; margin-bottom: 20px"
                >
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
                    <span class="mj-eyebrow" style="color: var(--mj-gold-light)"
                        >Our Promise</span
                    >
                </div>
                <h2 class="fs-h2">
                    Built on trust,<br />
                    <em class="mj-gold-i">carried through generations</em>
                </h2>
                <p class="fs-lead">
                    Eighteen years. Thousands of families. One unwavering
                    standard. At Maniratn, trust is not a promise we make — it
                    is the only way we have ever worked.
                </p>
            </div>

            <!-- Stats band -->
            <div class="fs-stats-band">
                <div
                    v-for="[num, label, sub] in promiseStats"
                    :key="num"
                    class="fs-stat"
                >
                    <span class="fs-stat-num">{{ num }}</span>
                    <span class="fs-stat-label">{{ label }}</span>
                    <span class="fs-stat-sub">{{ sub }}</span>
                </div>
            </div>

            <!-- Feature tiles -->
            <div class="fs-tiles">
                <div
                    v-for="tile in featureTiles"
                    :key="tile.title"
                    class="fs-tile"
                >
                    <span class="fs-tile-mark" aria-hidden="true">{{
                        tile.mark
                    }}</span>
                    <h3 class="fs-tile-title">{{ tile.title }}</h3>
                    <p class="fs-tile-desc">{{ tile.desc }}</p>
                </div>
            </div>

            <!-- Footer badge -->
            <div class="fs-badge-row">
                <svg width="8" height="8" viewBox="0 0 8 8">
                    <rect
                        x="4"
                        y="0"
                        width="4"
                        height="4"
                        transform="rotate(45 4 4)"
                        fill="#C4922A"
                        opacity="0.6"
                    />
                </svg>
                <span class="fs-badge-text"
                    >BIS Hallmarked &nbsp;·&nbsp; Certified Since 2007
                    &nbsp;·&nbsp; Trusted by 5,000+ Families</span
                >
                <svg width="8" height="8" viewBox="0 0 8 8">
                    <rect
                        x="4"
                        y="0"
                        width="4"
                        height="4"
                        transform="rotate(45 4 4)"
                        fill="#C4922A"
                        opacity="0.6"
                    />
                </svg>
            </div>
        </section>

        <!-- ── Testimonials ─────────────────────────────────── -->
        <section class="mj-testimonials-section">
            <div class="mj-tm-head">
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
                    <span class="mj-eyebrow">Voices of Trust</span>
                </div>
                <h2 class="mj-tm-h2">
                    Carried by families,<br />
                    <em class="mj-crimson-i">across generations.</em>
                </h2>
                <p class="mj-tm-lead">
                    We have been fortunate enough to be part of weddings,
                    milestones, and quiet family moments for nearly two decades.
                </p>
            </div>

            <div class="mj-tm-grid">
                <figure
                    v-for="(t, i) in testimonials"
                    :key="i"
                    class="mj-tm-card"
                    :class="{ 'mj-tm-card-featured': i === 1 }"
                >
                    <span class="mj-tm-quote-mark" aria-hidden="true">“</span>
                    <blockquote class="mj-tm-quote">{{ t.quote }}</blockquote>
                    <div class="mj-tm-rule" aria-hidden="true">
                        <span></span>
                        <svg width="6" height="6" viewBox="0 0 8 8">
                            <rect
                                x="4"
                                y="0"
                                width="4"
                                height="4"
                                transform="rotate(45 4 4)"
                                fill="#C4922A"
                                opacity="0.65"
                            />
                        </svg>
                        <span></span>
                    </div>
                    <figcaption class="mj-tm-foot">
                        <span class="mj-tm-mark" aria-hidden="true">{{
                            t.mark
                        }}</span>
                        <span class="mj-tm-meta">
                            <span class="mj-tm-name">{{ t.name }}</span>
                            <span class="mj-tm-occasion">{{ t.occasion }}</span>
                        </span>
                    </figcaption>
                </figure>
            </div>

            <div class="mj-tm-foot-band" aria-hidden="true">
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
                <span class="mj-tm-foot-text"
                    >Five thousand families · One unbroken standard</span
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

        <!-- ── FAQ ──────────────────────────────────────────── -->
        <section class="faq-section">
            <div class="mj-faq-inner">
                <div class="mj-faq-head">
                    <div class="mj-faq-orn">
                        <div class="mj-gold-line"></div>
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
                        <div class="mj-gold-line"></div>
                    </div>
                    <span
                        class="mj-eyebrow"
                        style="
                            display: block;
                            text-align: center;
                            margin-bottom: 10px;
                        "
                        >Questions</span
                    >
                    <h2 class="mj-faq-h2">Frequently asked</h2>
                </div>
                <TheAccordion :items="faqItems" variant="light" />
            </div>
        </section>

        <!-- ── CTA ──────────────────────────────────────────── -->
        <section class="cta-section">
            <div class="mj-cta-inner">
                <svg
                    width="28"
                    height="28"
                    viewBox="0 0 16 16"
                    style="margin: 0 auto 28px; display: block"
                >
                    <path
                        d="M8 0 L9 7 L16 8 L9 9 L8 16 L7 9 L0 8 L7 7Z"
                        fill="#C4922A"
                        opacity="0.85"
                    />
                </svg>
                <h2 class="mj-cta-h2">Begin your jewellery journey</h2>
                <p class="mj-cta-body">
                    Visit our store or get in touch — we're here to help you
                    find the perfect piece.
                </p>
                <div class="mj-cta-btns">
                    <button
                        class="mj-btn-gold mj-cta-btn"
                        @click="navigate('contact')"
                    >
                        Contact Us
                    </button>
                    <button
                        class="mj-btn-ghost mj-cta-btn"
                        @click="navigate('collections')"
                    >
                        View Collections
                    </button>
                </div>
                <div class="mj-cta-rule">
                    <span></span>
                    <svg width="8" height="8" viewBox="0 0 8 8">
                        <rect
                            x="4"
                            y="0"
                            width="4"
                            height="4"
                            transform="rotate(45 4 4)"
                            fill="#C4922A"
                            opacity="0.4"
                        />
                    </svg>
                    <span></span>
                </div>
            </div>
        </section>

        <TheFooter />
    </div>
</template>

<style scoped>
/* ── Page wrapper ────────────────────────────────────── */
.mj-page {
    overflow-x: hidden;
    width: 100%;
    position: relative;
}

/* ── Hero: full-width shader background ─────────────── */
.mj-hero {
    position: relative;
    min-height: 100vh;
    overflow: hidden;
    display: flex;
    align-items: center;
}

/* Shader canvas sits in layer 0 (absolute, inset 0, from its own scoped style) */

/* Gradient overlay: strong dark on left fades to nearly clear on right */
.mj-hero-overlay {
    position: absolute;
    inset: 0;
    z-index: 1;
    background:
        /* left column: opaque dark so text is always readable */
        linear-gradient(
            105deg,
            rgba(26, 6, 6, 0.98) 0%,
            rgba(60, 12, 12, 0.93) 18%,
            rgba(74, 13, 13, 0.82) 36%,
            rgba(40, 8, 8, 0.45) 56%,
            rgba(10, 2, 2, 0.1) 74%,
            rgba(0, 0, 0, 0) 100%
        ),
        /* bottom fade — keeps card area legible */
        linear-gradient(to top, rgba(10, 2, 2, 0.55) 0%, rgba(0, 0, 0, 0) 28%);
}

/* Content sits in layer 2 */
.mj-hero-content {
    position: relative;
    z-index: 2;
    padding: 148px 5% 110px 7%;
    max-width: 620px;
    width: 52%;
}

/* Eyebrow */
.hero-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 22px;
}
.mj-ew-line {
    width: 32px;
    height: 0.5px;
    background: var(--mj-gold);
    flex-shrink: 0;
}
.hero-eyebrow span {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.28em;
    color: var(--mj-gold);
    text-transform: uppercase;
}

/* Title */
.hero-title {
    font-family: var(--mj-serif);
    font-size: clamp(56px, 6.5vw, 92px);
    font-weight: 300;
    line-height: 1.03;
    color: var(--mj-cream);
    margin-bottom: 30px;
    letter-spacing: 0.005em;
    text-shadow: 0 2px 32px rgba(0, 0, 0, 0.4);
}
.hero-title em {
    font-weight: 400;
    font-style: italic;
    color: rgba(253, 248, 240, 0.92);
}

/* Body */
.hero-body {
    font-family: var(--mj-sans);
    font-size: 15px;
    line-height: 1.85;
    color: rgba(253, 248, 240, 0.65);
    max-width: 380px;
    margin-bottom: 42px;
    font-weight: 300;
}

/* CTAs */
.hero-cta {
    display: flex;
    gap: 14px;
    align-items: center;
    flex-wrap: wrap;
    justify-content: flex-start;
}

/* Stats */
.hero-stats {
    display: flex;
    gap: 36px;
    flex-wrap: wrap;
    margin-top: 56px;
    padding-top: 28px;
    border-top: 1px solid rgba(196, 146, 42, 0.2);
}
.mj-stat-num {
    display: block;
    font-family: var(--mj-serif);
    font-size: 32px;
    font-weight: 500;
    color: var(--mj-gold-light);
    line-height: 1;
}
.mj-stat-label {
    display: block;
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.16em;
    color: rgba(253, 248, 240, 0.4);
    text-transform: uppercase;
    margin-top: 4px;
}

/* Bottom-right arrival card (layer 3) */
.hero-card {
    position: absolute;
    z-index: 3;
    bottom: 36px;
    right: 36px;
    min-width: 280px;
    max-width: 340px;
    background: rgba(8, 3, 3, 0.72);
    backdrop-filter: blur(18px);
    border: 1px solid rgba(196, 146, 42, 0.28);
    border-top: 2px solid var(--mj-gold);
    padding: 18px 22px;
    display: flex;
    align-items: center;
    gap: 14px;
}
.hero-card-title {
    font-family: var(--mj-serif);
    font-size: 15px;
    font-weight: 500;
    color: var(--mj-cream);
    line-height: 1;
}
.hero-card-sub {
    font-family: var(--mj-sans);
    font-size: 11px;
    color: rgba(232, 201, 109, 0.65);
    margin-top: 4px;
}
.hero-card-link {
    margin-left: auto;
    flex-shrink: 0;
    background: none;
    border: none;
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.1em;
    color: var(--mj-gold);
    font-weight: 500;
    transition: color 0.2s;
}
.hero-card-link:hover {
    color: var(--mj-gold-light);
}

/* ── Marquee ─────────────────────────────────────────── */
.mj-marquee-wrap {
    background: var(--mj-gold);
    padding: 13px 0;
    overflow: hidden;
    width: 100%;
}
.mj-marquee-track {
    display: flex;
    gap: 48px;
    width: max-content;
    animation: mj-marquee 22s linear infinite;
}
.mj-marquee-item {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--mj-crimson-dark);
    font-weight: 600;
    white-space: nowrap;
}
@keyframes mj-marquee {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-50%);
    }
}

/* ── Shared eyebrow ──────────────────────────────────── */
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

/* ── Collections ─────────────────────────────────────── */
.mj-collections-section {
    padding: 112px 60px;
    background:
        linear-gradient(
            180deg,
            rgba(253, 248, 240, 0.92) 0%,
            rgba(244, 231, 211, 0.72) 100%
        ),
        radial-gradient(
            circle at 16% 22%,
            rgba(196, 146, 42, 0.12),
            transparent 34%
        ),
        var(--mj-cream);
    overflow: hidden;
    position: relative;
}
.mj-section-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    max-width: 1180px;
    margin: 0 auto 46px;
    gap: 28px;
    flex-wrap: wrap;
}
.mj-section-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(34px, 4vw, 54px);
    font-weight: 300;
    color: var(--mj-ink);
    letter-spacing: 0.01em;
    line-height: 1.15;
}
.mj-crimson-i {
    color: var(--mj-crimson);
    font-style: italic;
}
.mj-section-lead {
    max-width: 560px;
    margin-top: 18px;
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.8;
    color: var(--mj-ink-soft);
}
.mj-view-all {
    font-family: var(--mj-sans);
    font-size: 12px;
    letter-spacing: 0.15em;
    color: var(--mj-gold);
    text-transform: uppercase;
    border: 1px solid rgba(196, 146, 42, 0.32);
    background: rgba(255, 255, 255, 0.34);
    padding: 13px 18px;
    white-space: nowrap;
    transition:
        background 0.25s ease,
        color 0.25s ease,
        border-color 0.25s ease;
}
.mj-view-all:hover {
    background: var(--mj-crimson);
    border-color: var(--mj-crimson);
    color: var(--mj-cream);
}

.collections-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 16px;
    max-width: 1180px;
    margin: 0 auto;
}
.collection-item {
    overflow: hidden;
    background: rgba(255, 255, 255, 0.62);
    border: 1px solid rgba(196, 146, 42, 0.18);
    border-radius: 8px;
    box-shadow: 0 16px 42px rgba(26, 15, 10, 0.07);
    transition:
        transform 0.32s ease,
        box-shadow 0.32s ease,
        border-color 0.32s ease;
    cursor: pointer;
    position: relative;
    padding: 0;
    text-align: left;
}
.collection-item::after {
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
    transition: transform 0.38s ease;
}
.collection-item:hover {
    transform: translateY(-6px);
    border-color: rgba(196, 146, 42, 0.34);
    box-shadow: 0 24px 60px rgba(26, 15, 10, 0.13);
}
.collection-item:focus-visible {
    outline: 2px solid var(--mj-gold);
    outline-offset: 4px;
}
.collection-item:hover::after {
    transform: scaleX(1);
}
.collection-item:hover .col-overlay {
    opacity: 1;
}
.collection-item-featured {
    grid-column: span 2;
}

.mj-col-thumb {
    min-height: 300px;
    height: 100%;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.collection-item-featured .mj-col-thumb {
    min-height: 368px;
}
.mj-col-thumb::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(
            circle at 50% 45%,
            color-mix(in srgb, var(--collection-accent) 18%, transparent),
            transparent 35%
        ),
        linear-gradient(135deg, rgba(255, 255, 255, 0.08), transparent 46%),
        repeating-linear-gradient(
            45deg,
            rgba(253, 248, 240, 0.045) 0 1px,
            transparent 1px 14px
        );
    pointer-events: none;
}
.mj-col-num {
    position: absolute;
    top: 18px;
    left: 20px;
    font-family: var(--mj-serif);
    font-size: 11px;
    color: rgba(196, 146, 42, 0.55);
    letter-spacing: 0.2em;
    line-height: 1;
    z-index: 1;
}
.mj-col-note {
    position: absolute;
    top: 16px;
    right: 18px;
    z-index: 1;
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.16em;
    color: rgba(253, 248, 240, 0.58);
    text-transform: uppercase;
    border: 1px solid rgba(253, 248, 240, 0.12);
    padding: 5px 8px;
}
.mj-col-center {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 18px;
    position: relative;
    z-index: 1;
    width: 100%;
    padding: 44px 24px;
}
.mj-col-mark {
    display: grid;
    place-items: center;
    width: 92px;
    aspect-ratio: 1;
    position: relative;
    color: color-mix(in srgb, var(--collection-accent) 82%, white);
    font-family: var(--mj-serif);
    font-size: 40px;
    font-weight: 300;
    line-height: 1;
}
.mj-col-mark::before,
.mj-col-mark::after {
    content: '';
    position: absolute;
    inset: 10px;
    border: 1px solid
        color-mix(in srgb, var(--collection-accent) 36%, transparent);
    transform: rotate(45deg);
    background: rgba(253, 248, 240, 0.035);
}
.mj-col-mark::after {
    inset: 24px;
    border-color: color-mix(in srgb, var(--collection-accent) 22%, transparent);
    background: transparent;
}
.mj-col-thumb-name {
    font-family: var(--mj-serif);
    font-size: clamp(22px, 2.2vw, 34px);
    font-weight: 300;
    color: rgba(253, 248, 240, 0.86);
    letter-spacing: 0.01em;
    text-align: center;
    line-height: 1.14;
    text-shadow: 0 12px 32px rgba(0, 0, 0, 0.28);
}
.col-overlay {
    position: absolute;
    inset: 0;
    background: rgba(74, 13, 13, 0.72);
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
    padding-bottom: 2px;
}
.mj-col-body {
    padding: 22px 20px 20px;
    background: rgba(255, 255, 255, 0.56);
    border-top: 1px solid rgba(196, 146, 42, 0.12);
}
.mj-col-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 10px;
}
.mj-col-name {
    font-family: var(--mj-serif);
    font-size: 19px;
    line-height: 1.15;
    font-weight: 500;
    color: var(--mj-ink);
}
.mj-col-tag {
    flex-shrink: 0;
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.16em;
    color: var(--mj-crimson);
    text-transform: uppercase;
    border: 1px solid rgba(107, 18, 18, 0.22);
    padding: 2px 8px;
}
.mj-col-desc {
    font-family: var(--mj-sans);
    font-size: 12px;
    color: var(--mj-ink-soft);
    line-height: 1.7;
}

/* ── Concierge ───────────────────────────────────────── */
.mj-concierge-section {
    background: linear-gradient(170deg, #1a0f0a 0%, #110b07 56%, #0a0602 100%);
    padding: 96px 60px;
    position: relative;
    overflow: hidden;
}
.mj-concierge-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        radial-gradient(
            circle at 12% 18%,
            rgba(196, 146, 42, 0.12),
            transparent 32%
        ),
        radial-gradient(
            circle at 88% 78%,
            rgba(107, 18, 18, 0.35),
            transparent 34%
        );
    pointer-events: none;
}
.mj-concierge-inner {
    max-width: 1180px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
    display: grid;
    grid-template-columns: 0.9fr 1.1fr;
    gap: 58px;
    align-items: center;
}
.mj-concierge-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(34px, 4vw, 56px);
    font-weight: 300;
    color: var(--mj-cream);
    line-height: 1.12;
    margin: 10px 0 22px;
}
.mj-concierge-lead {
    max-width: 440px;
    margin-bottom: 30px;
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.9;
    color: rgba(253, 248, 240, 0.52);
    font-weight: 300;
}
.mj-concierge-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 12px;
}
.mj-concierge-card {
    min-height: 300px;
    padding: 28px 24px 26px;
    border: 1px solid rgba(196, 146, 42, 0.16);
    background: rgba(253, 248, 240, 0.045);
    position: relative;
    overflow: hidden;
    transition:
        transform 0.3s ease,
        background 0.3s ease,
        border-color 0.3s ease;
}
.mj-concierge-card::before {
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
    transition: transform 0.35s ease;
}
.mj-concierge-card:hover {
    transform: translateY(-5px);
    background: rgba(253, 248, 240, 0.07);
    border-color: rgba(196, 146, 42, 0.34);
}
.mj-concierge-card:hover::before {
    transform: scaleX(1);
}
.mj-concierge-mark {
    display: block;
    font-family: var(--mj-serif);
    font-size: 52px;
    font-weight: 300;
    line-height: 1;
    color: rgba(232, 201, 109, 0.28);
    margin-bottom: 44px;
}
.mj-concierge-meta {
    position: absolute;
    top: 26px;
    right: 22px;
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: rgba(232, 201, 109, 0.58);
}
.mj-concierge-title {
    font-family: var(--mj-serif);
    font-size: 21px;
    font-weight: 500;
    color: var(--mj-cream);
    line-height: 1.18;
    margin-bottom: 14px;
}
.mj-concierge-desc {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.82;
    color: rgba(253, 248, 240, 0.42);
    font-weight: 300;
}

/* ── Promise / Feature ───────────────────────────────── */
.feature-section {
    background: linear-gradient(170deg, #1a0f0a 0%, #110b07 55%, #0a0602 100%);
    overflow: hidden;
    position: relative;
}
.feature-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(
        ellipse 65% 35% at 50% 0%,
        rgba(196, 146, 42, 0.06) 0%,
        transparent 60%
    );
    pointer-events: none;
}

/* Head */
.fs-head {
    text-align: center;
    padding: 88px 60px 52px;
    max-width: 680px;
    margin: 0 auto;
    position: relative;
}
.fs-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(32px, 4vw, 52px);
    font-weight: 300;
    color: var(--mj-cream);
    line-height: 1.15;
    margin-bottom: 20px;
    letter-spacing: 0.01em;
}
.fs-lead {
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.85;
    color: rgba(253, 248, 240, 0.42);
    font-weight: 300;
    max-width: 460px;
    margin: 0 auto;
}

/* Stats band */
.fs-stats-band {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-top: 1px solid rgba(196, 146, 42, 0.13);
    border-bottom: 1px solid rgba(196, 146, 42, 0.13);
    margin: 0 60px;
    position: relative;
}
.fs-stat {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 48px 20px;
    border-right: 1px solid rgba(196, 146, 42, 0.1);
    text-align: center;
    transition: background 0.25s ease;
}
.fs-stat:last-child {
    border-right: none;
}
.fs-stat:hover {
    background: rgba(196, 146, 42, 0.04);
}
.fs-stat-num {
    font-family: var(--mj-serif);
    font-size: clamp(48px, 5.5vw, 72px);
    font-weight: 300;
    line-height: 1;
    background: linear-gradient(135deg, #c4922a 0%, #f0d98a 45%, #c4922a 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    display: block;
    margin-bottom: 12px;
}
.fs-stat-label {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(253, 248, 240, 0.72);
    display: block;
    margin-bottom: 5px;
}
.fs-stat-sub {
    font-family: var(--mj-sans);
    font-size: 10px;
    color: rgba(253, 248, 240, 0.25);
    display: block;
    letter-spacing: 0.05em;
}

/* Feature tiles */
.fs-tiles {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    margin: 52px 60px 0;
    border: 1px solid rgba(196, 146, 42, 0.1);
    position: relative;
}
.fs-tile {
    padding: 40px 32px 44px;
    border-right: 1px solid rgba(196, 146, 42, 0.1);
    transition: background 0.28s ease;
    position: relative;
    overflow: hidden;
}
.fs-tile:last-child {
    border-right: none;
}
.fs-tile:hover {
    background: rgba(196, 146, 42, 0.045);
}
.fs-tile::before {
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
.fs-tile:hover::before {
    transform: scaleX(1);
}
.fs-tile-mark {
    display: block;
    font-size: 22px;
    color: var(--mj-gold);
    margin-bottom: 18px;
    line-height: 1;
    transition: transform 0.3s ease;
}
.fs-tile:hover .fs-tile-mark {
    transform: scale(1.15) rotate(15deg);
}
.fs-tile-title {
    font-family: var(--mj-serif);
    font-size: 19px;
    font-weight: 500;
    color: var(--mj-cream);
    margin-bottom: 12px;
    line-height: 1.2;
}
.fs-tile-desc {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.8;
    color: rgba(253, 248, 240, 0.4);
    font-weight: 300;
}

/* Badge row */
.fs-badge-row {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 44px 60px 80px;
    gap: 12px;
}
.fs-badge-text {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: rgba(196, 146, 42, 0.42);
}
.mj-gold-i {
    color: #e8c96d;
    font-style: italic;
}

/* ── FAQ ─────────────────────────────────────────────── */
.faq-section {
    padding: 96px 60px;
    background: var(--mj-cream);
    overflow: hidden;
}
.mj-faq-inner {
    max-width: 800px;
    margin: 0 auto;
}
.mj-faq-head {
    text-align: center;
    margin-bottom: 44px;
}
.mj-faq-orn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 12px;
}
.mj-faq-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(30px, 3vw, 44px);
    font-weight: 300;
    color: var(--mj-ink);
}

/* ── CTA ─────────────────────────────────────────────── */
.cta-section {
    background: linear-gradient(
        155deg,
        var(--mj-crimson) 0%,
        var(--mj-crimson-dark) 100%
    );
    overflow: hidden;
    position: relative;
}
.cta-section::before {
    content: '';
    position: absolute;
    top: -100px;
    left: 50%;
    transform: translateX(-50%);
    width: min(600px, 90vw);
    height: min(600px, 90vw);
    border-radius: 50%;
    border: 1px solid rgba(196, 146, 42, 0.1);
    pointer-events: none;
}
.mj-cta-inner {
    position: relative;
    z-index: 1;
    text-align: center;
    padding: 96px 60px;
}
.mj-cta-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(28px, 3.5vw, 46px);
    font-weight: 300;
    color: var(--mj-cream);
    margin-bottom: 14px;
    line-height: 1.2;
}
.mj-cta-body {
    font-family: var(--mj-sans);
    font-size: 14px;
    color: rgba(253, 248, 240, 0.55);
    margin: 0 auto 40px;
    max-width: 400px;
    line-height: 1.7;
}
.mj-cta-btns {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}
.mj-cta-btn {
    min-width: 160px;
    padding: 15px 36px;
}
.mj-cta-rule {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-top: 52px;
}
.mj-cta-rule span {
    display: block;
    width: 80px;
    height: 0.5px;
    background: rgba(196, 146, 42, 0.28);
}

/* ── Hero particles ──────────────────────────────────── */
.hero-particles {
    position: absolute;
    inset: 0;
    z-index: 1;
    pointer-events: none;
    overflow: hidden;
}
.hero-particle {
    position: absolute;
    background: var(--mj-gold);
    clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
    animation: particle-float linear infinite;
    will-change: transform;
}
@keyframes particle-float {
    0% {
        transform: translateY(0) rotate(0deg) scale(1);
    }
    33% {
        transform: translateY(-18px) rotate(60deg) scale(1.12);
    }
    66% {
        transform: translateY(10px) rotate(120deg) scale(0.9);
    }
    100% {
        transform: translateY(0) rotate(180deg) scale(1);
    }
}

/* ── Hero scroll indicator ───────────────────────────── */
.hero-scroll-ind {
    position: absolute;
    bottom: 44px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 3;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
}
.hsi-text {
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.28em;
    color: rgba(232, 201, 109, 0.38);
    text-transform: uppercase;
}
.hsi-line {
    width: 1px;
    height: 44px;
    background: rgba(196, 146, 42, 0.18);
    position: relative;
    overflow: hidden;
}
.hsi-dot {
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 3px;
    height: 10px;
    background: var(--mj-gold);
    border-radius: 2px;
    animation: hsi-drop 2.2s ease-in-out infinite;
}
@keyframes hsi-drop {
    0% {
        top: -10px;
        opacity: 0;
    }
    15% {
        opacity: 1;
    }
    85% {
        opacity: 0.8;
    }
    100% {
        top: 44px;
        opacity: 0;
    }
}

/* ── Collection shimmer ──────────────────────────────── */
.mj-col-thumb::after {
    content: '';
    position: absolute;
    inset: 0;
    pointer-events: none;
    background: linear-gradient(
        105deg,
        transparent 30%,
        rgba(232, 201, 109, 0.14) 50%,
        transparent 70%
    );
    transform: translateX(-110%);
}
.collection-item:hover .mj-col-thumb::after {
    animation: col-shimmer 0.7s ease forwards;
}
@keyframes col-shimmer {
    to {
        transform: translateX(110%);
    }
}

/* ── CTA button pulse ────────────────────────────────── */
.mj-btn-gold {
    position: relative;
    overflow: hidden;
}
.mj-btn-gold::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.18),
        transparent
    );
    transform: translateX(-100%);
    animation: btn-sweep 3.5s ease infinite;
}
@keyframes btn-sweep {
    0% {
        transform: translateX(-100%);
    }
    40% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(100%);
    }
}

/* ── The Making / Craft Process ──────────────────────── */
.mj-craft-section {
    background: var(--mj-cream-mid);
    padding: 100px 60px 80px;
    overflow: hidden;
    position: relative;
}
.mj-craft-section::before {
    content: '18';
    position: absolute;
    right: -1%;
    top: 50%;
    transform: translateY(-50%);
    font-family: var(--mj-serif);
    font-size: min(38vw, 380px);
    font-weight: 700;
    color: rgba(26, 15, 10, 0.04);
    line-height: 1;
    pointer-events: none;
    user-select: none;
}
.mj-craft-head {
    text-align: center;
    margin-bottom: 72px;
}
.mj-craft-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(30px, 3.8vw, 52px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.15;
    margin-bottom: 16px;
    letter-spacing: 0.01em;
}
.mj-craft-sub {
    font-family: var(--mj-sans);
    font-size: 12px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--mj-ink-soft);
}

/* Four-step grid */
.mj-craft-steps {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    border-top: 1px solid rgba(196, 146, 42, 0.2);
}
.mj-craft-step {
    padding: 48px 36px 44px;
    border-right: 1px solid rgba(196, 146, 42, 0.16);
    position: relative;
    transition: background 0.35s ease;
}
.mj-craft-step:last-child {
    border-right: none;
}
.mj-craft-step:hover {
    background: rgba(196, 146, 42, 0.06);
}

/* Large gradient step number */
.mj-cs-num {
    display: block;
    font-family: var(--mj-serif);
    font-size: clamp(56px, 6vw, 88px);
    font-weight: 300;
    line-height: 1;
    margin-bottom: 20px;
    background: linear-gradient(
        180deg,
        rgba(196, 146, 42, 0.9) 0%,
        rgba(196, 146, 42, 0.2) 100%
    );
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    transition: filter 0.3s ease;
}
.mj-craft-step:hover .mj-cs-num {
    filter: brightness(1.5);
}

/* Ornamental separator between number and title */
.mj-cs-orn {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 18px;
}
.mj-cs-line-l,
.mj-cs-line-r {
    height: 0.5px;
    flex: 1;
    background: rgba(196, 146, 42, 0.35);
    transition: background 0.3s ease;
}
.mj-craft-step:hover .mj-cs-line-l,
.mj-craft-step:hover .mj-cs-line-r {
    background: rgba(196, 146, 42, 0.65);
}

.mj-cs-title {
    font-family: var(--mj-serif);
    font-size: 19px;
    font-weight: 500;
    color: var(--mj-ink);
    margin-bottom: 14px;
    letter-spacing: 0.02em;
}
.mj-cs-detail {
    font-family: var(--mj-sans);
    font-size: 13px;
    line-height: 1.88;
    color: var(--mj-ink-soft);
    font-weight: 300;
}

/* Gold hover accent — top edge reveal */
.mj-craft-step::before {
    content: '';
    position: absolute;
    top: -1px;
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
    transform-origin: left;
}
.mj-craft-step:hover::before {
    transform: scaleX(1);
}

/* Footer rule */
.mj-craft-foot {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 56px;
}
.mj-craft-foot span {
    display: block;
    flex: 1;
    height: 0.5px;
    background: rgba(196, 146, 42, 0.3);
}

/* ── Heritage Story ──────────────────────────────────── */
.mj-heritage-section {
    background:
        radial-gradient(
            circle at 88% 12%,
            rgba(196, 146, 42, 0.1),
            transparent 38%
        ),
        radial-gradient(
            circle at 12% 88%,
            rgba(107, 18, 18, 0.05),
            transparent 42%
        ),
        var(--mj-cream);
    padding: 110px 60px 96px;
    position: relative;
    overflow: hidden;
}
.mj-heritage-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 1px;
    height: 64px;
    background: linear-gradient(to bottom, var(--mj-gold), transparent);
    transform: translateX(-50%);
    opacity: 0.55;
}
.mj-heritage-inner {
    max-width: 1180px;
    margin: 0 auto 80px;
    display: grid;
    grid-template-columns: 1.15fr 0.85fr;
    gap: 72px;
    align-items: center;
}
.mj-heritage-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(34px, 4.2vw, 58px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.12;
    margin: 8px 0 28px;
    letter-spacing: 0.005em;
}
.mj-heritage-lead {
    font-family: var(--mj-sans);
    font-size: 14.5px;
    line-height: 1.95;
    color: var(--mj-ink-soft);
    max-width: 520px;
    margin-bottom: 16px;
    font-weight: 300;
}
.mj-heritage-sign {
    display: flex;
    align-items: baseline;
    gap: 16px;
    margin-top: 28px;
    padding-top: 22px;
    border-top: 1px solid rgba(196, 146, 42, 0.22);
    max-width: 360px;
}
.mj-heritage-sign-name {
    font-family: var(--mj-serif);
    font-size: 17px;
    font-style: italic;
    color: var(--mj-crimson);
    font-weight: 500;
}
.mj-heritage-sign-place {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-ink-soft);
    margin-left: auto;
}

/* Decorative frame */
.mj-heritage-frame {
    aspect-ratio: 1 / 1.05;
    max-width: 380px;
    margin: 0 auto;
    width: 100%;
    background: linear-gradient(150deg, #faf1dd 0%, #f1e2bd 100%);
    border: 1px solid rgba(196, 146, 42, 0.3);
    box-shadow:
        0 28px 60px rgba(26, 15, 10, 0.1),
        inset 0 0 0 1px rgba(253, 248, 240, 0.55);
    position: relative;
    padding: 24px;
}
.mj-heritage-frame::before,
.mj-heritage-frame::after {
    content: '';
    position: absolute;
    width: 18px;
    height: 18px;
    border: 1px solid rgba(196, 146, 42, 0.55);
}
.mj-heritage-frame::before {
    top: 10px;
    left: 10px;
    border-right: none;
    border-bottom: none;
}
.mj-heritage-frame::after {
    bottom: 10px;
    right: 10px;
    border-left: none;
    border-top: none;
}
.mj-heritage-frame-inner {
    position: relative;
    height: 100%;
    border: 1px solid rgba(196, 146, 42, 0.28);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 36px 24px;
    background:
        repeating-linear-gradient(
            45deg,
            rgba(196, 146, 42, 0.04) 0 1px,
            transparent 1px 12px
        ),
        radial-gradient(
            circle at 50% 50%,
            rgba(253, 248, 240, 0.6),
            transparent 70%
        );
}
.mj-heritage-frame-top {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.32em;
    text-transform: uppercase;
    color: rgba(74, 55, 40, 0.62);
}
.mj-heritage-frame-year {
    font-family: var(--mj-serif);
    font-weight: 300;
    line-height: 1;
    letter-spacing: 0.015em;
    color: var(--mj-ink);
    display: flex;
    align-items: baseline;
    gap: 4px;
}
.mj-heritage-frame-19,
.mj-heritage-frame-07 {
    font-size: clamp(72px, 9vw, 120px);
    background: linear-gradient(180deg, #6b4f1e 0%, #c4922a 60%, #e8c96d 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.mj-heritage-frame-orn {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 65%;
    margin: 4px 0;
}
.mj-heritage-frame-orn span {
    flex: 1;
    height: 0.5px;
    background: rgba(196, 146, 42, 0.45);
}
.mj-heritage-frame-foot {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
}
.mj-heritage-frame-mono {
    font-family: var(--mj-serif);
    font-size: 22px;
    font-weight: 500;
    color: var(--mj-crimson);
    letter-spacing: 0.18em;
}
.mj-heritage-frame-tag {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.26em;
    text-transform: uppercase;
    color: var(--mj-ink-mid);
}
.mj-heritage-frame-tag-fade {
    color: rgba(74, 55, 40, 0.45);
    font-size: 9px;
    letter-spacing: 0.22em;
}

/* Timeline */
.mj-heritage-timeline {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 0;
    border-top: 1px solid rgba(196, 146, 42, 0.22);
    border-bottom: 1px solid rgba(196, 146, 42, 0.22);
    position: relative;
}
.mj-heritage-beat {
    padding: 32px 28px 36px;
    border-right: 1px solid rgba(196, 146, 42, 0.16);
    position: relative;
    transition: background 0.3s ease;
}
.mj-heritage-beat:last-child {
    border-right: none;
}
.mj-heritage-beat:hover {
    background: rgba(196, 146, 42, 0.05);
}
.mj-heritage-beat-year {
    font-family: var(--mj-serif);
    font-size: 14px;
    letter-spacing: 0.18em;
    color: var(--mj-gold);
    display: block;
    margin-bottom: 18px;
}
.mj-heritage-beat-dot {
    position: absolute;
    top: -5px;
    left: 28px;
    width: 8px;
    height: 8px;
    background: var(--mj-cream);
    border: 1px solid var(--mj-gold);
    transform: rotate(45deg);
}
.mj-heritage-beat-title {
    font-family: var(--mj-serif);
    font-size: 18px;
    font-weight: 500;
    color: var(--mj-ink);
    margin-bottom: 10px;
    letter-spacing: 0.01em;
}
.mj-heritage-beat-body {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.85;
    color: var(--mj-ink-soft);
    font-weight: 300;
}

/* ── Testimonials ────────────────────────────────────── */
.mj-testimonials-section {
    background:
        linear-gradient(180deg, var(--mj-cream-mid) 0%, var(--mj-cream) 100%),
        var(--mj-cream);
    padding: 100px 60px 110px;
    position: relative;
    overflow: hidden;
}
.mj-testimonials-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 1px;
    height: 56px;
    background: linear-gradient(to bottom, var(--mj-gold), transparent);
    transform: translateX(-50%);
    opacity: 0.5;
}
.mj-tm-head {
    text-align: center;
    max-width: 640px;
    margin: 0 auto 64px;
}
.mj-tm-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(32px, 4vw, 52px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.15;
    margin: 6px 0 18px;
    letter-spacing: 0.005em;
}
.mj-tm-lead {
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.85;
    color: var(--mj-ink-soft);
    font-weight: 300;
    max-width: 480px;
    margin: 0 auto;
}
.mj-tm-grid {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}
.mj-tm-card {
    background: rgba(255, 255, 255, 0.74);
    border: 1px solid rgba(196, 146, 42, 0.2);
    padding: 36px 32px 28px;
    margin: 0;
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 22px;
    box-shadow: 0 18px 44px rgba(26, 15, 10, 0.06);
    transition:
        transform 0.34s ease,
        box-shadow 0.34s ease,
        border-color 0.34s ease;
}
.mj-tm-card::before {
    content: '';
    position: absolute;
    top: -1px;
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
}
.mj-tm-card:hover {
    transform: translateY(-5px);
    border-color: rgba(196, 146, 42, 0.42);
    box-shadow: 0 26px 56px rgba(26, 15, 10, 0.11);
}
.mj-tm-card:hover::before {
    transform: scaleX(1);
}
.mj-tm-card-featured {
    background: linear-gradient(170deg, #2c0a0a 0%, #4a0d0d 60%, #5a1414 100%);
    border-color: rgba(232, 201, 109, 0.3);
    box-shadow: 0 24px 56px rgba(74, 13, 13, 0.28);
}
.mj-tm-card-featured .mj-tm-quote {
    color: rgba(253, 248, 240, 0.92);
}
.mj-tm-card-featured .mj-tm-quote-mark {
    color: var(--mj-gold-light);
    opacity: 0.5;
}
.mj-tm-card-featured .mj-tm-name {
    color: var(--mj-cream);
}
.mj-tm-card-featured .mj-tm-occasion {
    color: rgba(232, 201, 109, 0.62);
}
.mj-tm-card-featured .mj-tm-mark {
    background: linear-gradient(135deg, #e8c96d 0%, #c4922a 100%);
    color: var(--mj-crimson-dark);
}
.mj-tm-card-featured .mj-tm-rule span {
    background: rgba(232, 201, 109, 0.32);
}

.mj-tm-quote-mark {
    font-family: var(--mj-serif);
    font-size: 64px;
    line-height: 0.5;
    color: var(--mj-gold);
    opacity: 0.55;
    height: 22px;
    display: block;
}
.mj-tm-quote {
    font-family: var(--mj-serif);
    font-size: 17px;
    line-height: 1.6;
    color: var(--mj-ink);
    font-weight: 400;
    margin: 0;
    font-style: italic;
    letter-spacing: 0.005em;
    flex: 1;
}
.mj-tm-rule {
    display: flex;
    align-items: center;
    gap: 10px;
}
.mj-tm-rule span {
    flex: 1;
    height: 0.5px;
    background: rgba(196, 146, 42, 0.32);
}
.mj-tm-foot {
    display: flex;
    align-items: center;
    gap: 14px;
}
.mj-tm-mark {
    width: 38px;
    height: 38px;
    display: grid;
    place-items: center;
    background: linear-gradient(
        135deg,
        var(--mj-crimson) 0%,
        var(--mj-crimson-dark) 100%
    );
    color: var(--mj-gold-light);
    font-family: var(--mj-serif);
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.04em;
    border: 1px solid rgba(196, 146, 42, 0.32);
    flex-shrink: 0;
}
.mj-tm-meta {
    display: flex;
    flex-direction: column;
    gap: 3px;
}
.mj-tm-name {
    font-family: var(--mj-serif);
    font-size: 15px;
    font-weight: 500;
    color: var(--mj-ink);
    line-height: 1.2;
    letter-spacing: 0.01em;
}
.mj-tm-occasion {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: var(--mj-ink-soft);
}
.mj-tm-foot-band {
    max-width: 1180px;
    margin: 64px auto 0;
    display: flex;
    align-items: center;
    gap: 14px;
}
.mj-tm-foot-band > span:first-child,
.mj-tm-foot-band > span:last-child {
    flex: 1;
    height: 0.5px;
    background: rgba(196, 146, 42, 0.22);
}
.mj-tm-foot-text {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.24em;
    text-transform: uppercase;
    color: rgba(196, 146, 42, 0.62);
    white-space: nowrap;
}

/* ── Responsive ──────────────────────────────────────── */
@media (max-width: 1200px) {
    .mj-hero-content {
        width: 62%;
        max-width: 640px;
    }
}

@media (max-width: 1100px) {
    .mj-hero-content {
        width: 70%;
    }
    .hero-card {
        right: 20px;
        bottom: 24px;
        min-width: 240px;
    }
    .collections-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .fs-stats-band {
        grid-template-columns: repeat(2, 1fr);
        margin: 0 40px;
    }
    .fs-tiles {
        grid-template-columns: repeat(2, 1fr);
        margin: 40px 40px 0;
    }
    .fs-tile:nth-child(2) {
        border-right: none;
    }
    .fs-tile:nth-child(3) {
        border-top: 1px solid rgba(196, 146, 42, 0.1);
    }
    .fs-head {
        padding: 72px 40px 44px;
    }
    .fs-badge-row {
        padding: 36px 40px 64px;
    }
    .mj-craft-steps {
        grid-template-columns: repeat(2, 1fr);
    }
    .mj-craft-section {
        padding: 80px 40px 60px;
    }
    .mj-concierge-inner {
        grid-template-columns: 1fr;
        gap: 42px;
    }

    .mj-heritage-section {
        padding: 90px 40px 80px;
    }
    .mj-heritage-inner {
        gap: 48px;
        grid-template-columns: 1.1fr 0.9fr;
        margin-bottom: 64px;
    }
    .mj-heritage-timeline {
        grid-template-columns: repeat(2, 1fr);
    }
    .mj-heritage-beat:nth-child(2) {
        border-right: none;
    }
    .mj-heritage-beat:nth-child(3),
    .mj-heritage-beat:nth-child(4) {
        border-top: 1px solid rgba(196, 146, 42, 0.16);
    }
    .mj-tm-grid {
        grid-template-columns: 1fr;
        max-width: 640px;
    }
    .mj-testimonials-section {
        padding: 88px 40px 96px;
    }
}

/* ── Tablet ───────────────────────────────────────────── */
@media (max-width: 900px) {
    .mj-hero {
        align-items: flex-end;
        padding-bottom: 0;
    }
    .mj-hero-content {
        width: 100%;
        max-width: none;
        padding: 130px 28px 60px;
        text-align: left;
    }
    .mj-hero-overlay {
        background: linear-gradient(
            to top,
            rgba(10, 2, 2, 0.96) 0%,
            rgba(20, 4, 4, 0.88) 40%,
            rgba(30, 6, 6, 0.55) 70%,
            rgba(10, 2, 2, 0.1) 100%
        );
    }
    .hero-card {
        display: none;
    }
    .hero-body {
        max-width: 100%;
    }

    .mj-heritage-section {
        padding: 76px 28px 64px;
    }
    .mj-heritage-inner {
        grid-template-columns: 1fr;
        gap: 40px;
        margin-bottom: 56px;
    }
    .mj-heritage-frame {
        max-width: 320px;
        order: -1;
    }
    .mj-heritage-sign {
        margin-top: 22px;
        padding-top: 18px;
    }
    .mj-tm-foot-band {
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 48px;
    }
    .mj-tm-foot-band > span:first-child,
    .mj-tm-foot-band > span:last-child {
        display: none;
    }

    .mj-collections-section {
        padding: 80px 28px;
    }
    .faq-section {
        padding: 80px 28px;
    }
    .mj-cta-inner {
        padding: 80px 28px;
    }
    .hero-scroll-ind {
        display: none;
    }
    .mj-craft-steps {
        grid-template-columns: repeat(2, 1fr);
    }
    .mj-craft-section {
        padding: 72px 28px 56px;
    }
    .mj-concierge-section {
        padding: 76px 28px;
    }
    .mj-concierge-grid {
        grid-template-columns: 1fr;
    }
    .mj-concierge-card {
        min-height: 0;
    }
}

/* ── Mobile ───────────────────────────────────────────── */
@media (max-width: 640px) {
    /* Hero */
    .mj-hero {
        min-height: 100svh;
        align-items: flex-end;
    }
    .mj-hero-content {
        padding: 110px 20px 52px;
        text-align: left;
    }
    .hero-eyebrow {
        margin-bottom: 16px;
    }
    .hero-title {
        font-size: clamp(40px, 11vw, 58px);
        margin-bottom: 20px;
        line-height: 1.06;
    }
    .hero-body {
        font-size: 14px;
        line-height: 1.75;
        margin-bottom: 32px;
        max-width: 100%;
    }
    .hero-cta {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
    .hero-cta .mj-btn-gold,
    .hero-cta .mj-btn-ghost {
        width: 100%;
        text-align: center;
        padding: 15px 24px;
    }
    .hero-stats {
        gap: 20px 32px;
        margin-top: 36px;
        padding-top: 20px;
    }
    .mj-stat-num {
        font-size: 26px;
    }

    /* Marquee */
    .mj-marquee-wrap {
        padding: 11px 0;
    }

    /* Collections */
    .mj-collections-section {
        padding: 60px 20px;
    }
    .mj-section-head {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 32px;
    }
    .mj-section-h2 {
        font-size: clamp(26px, 7vw, 36px);
    }
    .collections-grid {
        grid-template-columns: 1fr;
        gap: 12px;
    }
    .collection-item-featured {
        grid-column: span 1;
    }
    .mj-col-thumb,
    .collection-item-featured .mj-col-thumb {
        min-height: 240px;
        height: auto;
    }
    .mj-col-note {
        max-width: 124px;
        text-align: right;
        line-height: 1.4;
    }
    .mj-col-row {
        flex-direction: column;
        align-items: flex-start;
    }

    /* Concierge */
    .mj-concierge-section {
        padding: 60px 20px;
    }
    .mj-concierge-h2 {
        font-size: clamp(28px, 8vw, 38px);
    }

    /* Promise / Feature */
    .fs-stats-band {
        grid-template-columns: repeat(2, 1fr);
        margin: 0 20px;
    }
    .fs-stat {
        padding: 32px 16px;
    }
    .fs-tiles {
        grid-template-columns: 1fr 1fr;
        margin: 32px 20px 0;
    }
    .fs-tile {
        padding: 28px 20px 32px;
    }
    .fs-tile:nth-child(2) {
        border-right: none;
    }
    .fs-tile:nth-child(3) {
        border-top: 1px solid rgba(196, 146, 42, 0.1);
    }
    .fs-tile:nth-child(4) {
        border-top: 1px solid rgba(196, 146, 42, 0.1);
        border-right: none;
    }
    .fs-head {
        padding: 56px 20px 36px;
    }
    .fs-badge-row {
        padding: 32px 20px 56px;
    }

    /* FAQ */
    .faq-section {
        padding: 60px 20px;
    }
    .mj-faq-h2 {
        font-size: clamp(24px, 6vw, 32px);
    }

    /* CTA */
    .cta-section::before {
        display: none;
    }
    .mj-cta-inner {
        padding: 60px 20px;
    }
    .mj-cta-h2 {
        font-size: clamp(24px, 7vw, 34px);
    }
    .mj-cta-btns {
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }
    .mj-cta-btn {
        width: 100%;
        max-width: 280px;
    }

    .mj-craft-steps {
        grid-template-columns: 1fr;
    }
    .mj-craft-section {
        padding: 60px 20px 48px;
    }
    .mj-craft-step {
        border-right: none;
        border-bottom: 1px solid rgba(196, 146, 42, 0.1);
    }
    .mj-craft-step:last-child {
        border-bottom: none;
    }
    .hero-particles {
        display: none;
    }

    /* Heritage */
    .mj-heritage-section {
        padding: 60px 20px 52px;
    }
    .mj-heritage-h2 {
        font-size: clamp(28px, 7.5vw, 40px);
    }
    .mj-heritage-frame {
        max-width: 280px;
        padding: 18px;
    }
    .mj-heritage-frame-inner {
        padding: 28px 18px;
    }
    .mj-heritage-timeline {
        grid-template-columns: 1fr;
    }
    .mj-heritage-beat {
        border-right: none;
        border-bottom: 1px solid rgba(196, 146, 42, 0.16);
        padding: 28px 4px;
    }
    .mj-heritage-beat:last-child {
        border-bottom: none;
    }
    .mj-heritage-beat:nth-child(3),
    .mj-heritage-beat:nth-child(4) {
        border-top: none;
    }
    .mj-heritage-beat-dot {
        left: 4px;
    }

    /* Testimonials */
    .mj-testimonials-section {
        padding: 60px 20px 72px;
    }
    .mj-tm-head {
        margin-bottom: 44px;
    }
    .mj-tm-h2 {
        font-size: clamp(26px, 7vw, 36px);
    }
    .mj-tm-card {
        padding: 28px 24px 24px;
    }
    .mj-tm-quote {
        font-size: 15.5px;
    }
}
</style>
