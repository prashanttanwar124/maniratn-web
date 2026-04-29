<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { onMounted, onUnmounted } from 'vue';
import CustomCursor from '@/components/maniratn/CustomCursor.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';
import TheNav from '@/components/maniratn/TheNav.vue';
import { collections as collectionsRoute, contact } from '@/routes';

gsap.registerPlugin(ScrollTrigger);

function navigate(page: 'collections' | 'contact'): void {
    if (page === 'collections') {
        router.visit(collectionsRoute());
    } else {
        router.visit(contact());
    }

    window.scrollTo(0, 0);
}

const stats: [string, string, string][] = [
    ['18+', 'Years', 'of practice'],
    ['5000+', 'Families', 'served'],
    ['100%', 'Hallmarked', 'gold purity'],
    ['4', 'Generations', 'of craft'],
];

const values = [
    {
        title: 'Purity, first',
        body: 'Every ornament leaves the bench BIS-hallmarked. No quiet compromises, no almost-fines — only verified 22K and 24K gold.',
        mark: '◈',
    },
    {
        title: 'Craft over speed',
        body: 'A single bridal commission can take six weeks at the bench. We will not finish a piece a day before it is ready.',
        mark: '◇',
    },
    {
        title: 'Family trust',
        body: 'Most of our clients return because their parents did. Service, pricing, and care must all hold up across generations.',
        mark: '✦',
    },
    {
        title: 'Transparent pricing',
        body: 'Daily gold rate, making charges, stone valuations — every figure is broken down on your invoice. No hidden line.',
        mark: '◆',
    },
];

const milestones = [
    {
        year: '2007',
        title: 'A bench, a belief',
        body: 'A small showroom opens in Pune with a single goldsmith and a single principle: craft cannot be hurried.',
    },
    {
        year: '2011',
        title: 'First master takes over',
        body: 'Our senior craftsman, trained by his father, joins full-time and begins shaping the house style.',
    },
    {
        year: '2013',
        title: 'Bridal atelier',
        body: 'A private commission studio opens, dedicated entirely to wedding sets and heirloom redesigns.',
    },
    {
        year: '2017',
        title: 'A decade of trust',
        body: 'Five thousand families later, we mark ten years with a complete refit of the workshop floor.',
    },
    {
        year: '2019',
        title: 'Diamond programme',
        body: 'Direct sourcing from certified ateliers; every solitaire arrives with an internationally recognised report.',
    },
    {
        year: '2024',
        title: 'A new generation',
        body: 'The next chapter begins — uniting eighteen years of craft with the tastes of a new generation of clients.',
    },
];

const team = [
    {
        name: 'Master Bench',
        role: 'Senior Goldsmith',
        detail: "Forty-one years at the bench. Trained at his father's workshop in Kolhapur. Lead on every bridal commission.",
        mark: 'B',
    },
    {
        name: 'The Setter',
        role: 'Stone-setting Atelier',
        detail: 'Works under magnification, often for hours on a single ring. Trained in Surat, joined Maniratn in 2014.',
        mark: 'S',
    },
    {
        name: 'The Designer',
        role: 'Design Studio',
        detail: 'Bridges sketch and bench. Works from family heirlooms, photographs, and conversations to a finished blueprint.',
        mark: 'D',
    },
    {
        name: 'The Family',
        role: 'Service & Care',
        detail: 'The voice on the phone, the hand at the showroom door — and the people you will speak to in twenty years too.',
        mark: 'F',
    },
];

onMounted(() => {
    // Hero
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
    tl.from('.ab-eyebrow', { y: 18, opacity: 0, duration: 0.5, delay: 0.15 })
        .from('.ab-title', { y: 36, opacity: 0, duration: 0.85 }, '-=0.25')
        .from('.ab-lead', { y: 22, opacity: 0, duration: 0.6 }, '-=0.55')
        .from('.ab-cta', { y: 18, opacity: 0, duration: 0.5 }, '-=0.4')
        .from(
            '.ab-stat',
            { y: 22, opacity: 0, duration: 0.55, stagger: 0.1 },
            '-=0.3',
        );

    // Stat count-up
    document.querySelectorAll<HTMLElement>('.ab-stat-num').forEach((el, i) => {
        const txt = el.textContent?.trim() ?? '';
        const target = parseFloat(txt);

        if (Number.isNaN(target)) {
            return;
        }

        const suffix = txt.replace(/[\d.]/g, '');
        const obj = { val: 0 };
        gsap.to(obj, {
            val: target,
            duration: 1.5,
            ease: 'power2.out',
            delay: 0.9 + i * 0.12,
            onUpdate: () => {
                el.textContent = Math.round(obj.val) + suffix;
            },
        });
    });

    // Story
    gsap.from(
        '.ab-story-eyebrow, .ab-story-h2, .ab-story-body p, .ab-story-sign',
        {
            scrollTrigger: { trigger: '.ab-story-section', start: 'top 80%' },
            y: 28,
            opacity: 0,
            duration: 0.65,
            stagger: 0.08,
            ease: 'power3.out',
        },
    );

    // Values
    gsap.from('.ab-value-head', {
        scrollTrigger: { trigger: '.ab-values-section', start: 'top 82%' },
        y: 28,
        opacity: 0,
        duration: 0.7,
        ease: 'power3.out',
    });
    gsap.from('.ab-value-tile', {
        scrollTrigger: { trigger: '.ab-values-grid', start: 'top 85%' },
        y: 32,
        opacity: 0,
        duration: 0.55,
        stagger: 0.1,
        ease: 'power3.out',
    });

    // Timeline
    gsap.from('.ab-timeline-head', {
        scrollTrigger: { trigger: '.ab-timeline-section', start: 'top 80%' },
        y: 28,
        opacity: 0,
        duration: 0.7,
        ease: 'power3.out',
    });
    gsap.from('.ab-tl-row', {
        scrollTrigger: { trigger: '.ab-timeline-rail', start: 'top 82%' },
        x: 24,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        ease: 'power3.out',
    });

    // Team
    gsap.from('.ab-team-head', {
        scrollTrigger: { trigger: '.ab-team-section', start: 'top 80%' },
        y: 28,
        opacity: 0,
        duration: 0.7,
        ease: 'power3.out',
    });
    gsap.from('.ab-team-card', {
        scrollTrigger: { trigger: '.ab-team-grid', start: 'top 85%' },
        y: 36,
        opacity: 0,
        duration: 0.6,
        stagger: 0.12,
        ease: 'power3.out',
    });

    // CTA
    gsap.from('.ab-cta-section .ab-cta-inner > *', {
        scrollTrigger: { trigger: '.ab-cta-section', start: 'top 86%' },
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
    <Head title="About — Maniratn Jewellers" />

    <CustomCursor />
    <TheNav current-page="about" hero-variant="light" />

    <main class="ab-page">
        <!-- ── Hero ────────────────────────────────────────── -->
        <section class="ab-hero">
            <div class="ab-hero-bg" aria-hidden="true">
                <span class="ab-hero-watermark">M</span>
            </div>

            <div class="ab-hero-inner">
                <div class="mj-eyebrow-row ab-eyebrow">
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
                    <span class="mj-eyebrow">Our Story</span>
                </div>

                <h1 class="ab-title">
                    A jewellery house<br />
                    built on <em class="mj-crimson-i">trust,</em><br />
                    <span class="mj-gold-text">since 2007.</span>
                </h1>

                <p class="ab-lead">
                    Maniratn was founded with a single belief — that the
                    ornaments a family wears deserve the same patience their
                    stories were built on. Eighteen years on, that belief still
                    shapes every commission we accept and every piece we finish.
                </p>

                <div class="ab-cta">
                    <button
                        class="mj-btn-crimson"
                        @click="navigate('collections')"
                    >
                        View Collections
                    </button>
                    <button
                        class="ab-btn-ghost-light"
                        @click="navigate('contact')"
                    >
                        Visit the Atelier →
                    </button>
                </div>

                <div class="ab-stats">
                    <div
                        v-for="[num, label, sub] in stats"
                        :key="label"
                        class="ab-stat"
                    >
                        <span class="ab-stat-num">{{ num }}</span>
                        <span class="ab-stat-label">{{ label }}</span>
                        <span class="ab-stat-sub">{{ sub }}</span>
                    </div>
                </div>

                <aside class="ab-hero-panel" aria-label="Atelier promise">
                    <span class="ab-hero-panel-kicker">Atelier Promise</span>
                    <div class="ab-hero-panel-mark" aria-hidden="true">M</div>
                    <h2>One master signs every finished ornament.</h2>
                    <p>
                        From first sketch to final polish, each Maniratn piece
                        is checked at the bench before it reaches the showroom
                        floor.
                    </p>
                    <div class="ab-hero-panel-foot">
                        <span>Hand finished</span>
                        <span>BIS certified</span>
                    </div>
                </aside>
            </div>
        </section>

        <!-- ── Story ───────────────────────────────────────── -->
        <section class="ab-story-section">
            <div class="ab-story-inner">
                <div class="ab-story-frame" aria-hidden="true">
                    <div class="ab-story-frame-inner">
                        <div class="ab-story-frame-top">
                            <span>The first bench</span>
                            <span class="ab-story-frame-year">2007</span>
                        </div>
                        <div class="ab-story-frame-body">
                            <span class="ab-story-frame-mono">M · J</span>
                            <div class="ab-story-frame-orn">
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
                            <span class="ab-story-frame-tag"
                                >Maniratn Jewellers</span
                            >
                            <span
                                class="ab-story-frame-tag ab-story-frame-tag-fade"
                                >Goldsmiths · Pune</span
                            >
                        </div>
                        <div class="ab-story-frame-foot">
                            <span></span>
                            <span class="ab-story-frame-foot-text"
                                >Crafted by hand · Worn for life</span
                            >
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="ab-story-body">
                    <div class="mj-eyebrow-row ab-story-eyebrow">
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
                        <span class="mj-eyebrow">From the founder</span>
                    </div>
                    <h2 class="ab-story-h2">
                        We never set out to be<br />
                        <em class="mj-crimson-i">the largest.</em>
                    </h2>
                    <p>
                        We set out to be the house a family came back to. The
                        one a daughter visits with her mother twenty years after
                        her mother's first piece was made. The one a son returns
                        to with a sketch of his grandmother's necklace and asks
                        if it can be set anew for his bride.
                    </p>
                    <p>
                        Every ornament that leaves our atelier is shaped by hand
                        at our bench in Pune — not on a production line. We only
                        finish a piece when our master craftsman signs off on
                        it. That, more than anything else, is the Maniratn
                        promise.
                    </p>
                    <div class="ab-story-sign">
                        <span class="ab-story-sign-name"
                            >— The Maniratn Atelier</span
                        >
                        <span class="ab-story-sign-place"
                            >Pune · Est. 2007</span
                        >
                    </div>
                </div>
            </div>
        </section>

        <!-- ── Values ──────────────────────────────────────── -->
        <section class="ab-values-section">
            <div class="ab-value-head">
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
                    <span class="mj-eyebrow">What we hold to</span>
                </div>
                <h2 class="ab-values-h2">
                    Four standards, eighteen years —<br />
                    <em class="mj-gold-i">unbroken.</em>
                </h2>
                <p class="ab-values-lead">
                    The shape of our work has changed. The standards that
                    produce it have not.
                </p>
            </div>

            <div class="ab-values-grid">
                <article
                    v-for="value in values"
                    :key="value.title"
                    class="ab-value-tile"
                >
                    <span class="ab-value-mark" aria-hidden="true">{{
                        value.mark
                    }}</span>
                    <h3 class="ab-value-title">{{ value.title }}</h3>
                    <p class="ab-value-body">{{ value.body }}</p>
                </article>
            </div>
        </section>

        <!-- ── Timeline ────────────────────────────────────── -->
        <section class="ab-timeline-section">
            <div class="ab-timeline-head">
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
                    <span class="mj-eyebrow">The chapters</span>
                </div>
                <h2 class="ab-tl-h2">
                    A house, written<br /><em class="mj-crimson-i">slowly.</em>
                </h2>
            </div>

            <div class="ab-timeline-rail">
                <div class="ab-tl-spine" aria-hidden="true"></div>
                <article
                    v-for="(m, i) in milestones"
                    :key="m.year"
                    class="ab-tl-row"
                    :class="{ 'ab-tl-row-alt': i % 2 === 1 }"
                >
                    <span class="ab-tl-dot" aria-hidden="true"></span>
                    <span class="ab-tl-year">{{ m.year }}</span>
                    <div class="ab-tl-card">
                        <h3 class="ab-tl-title">{{ m.title }}</h3>
                        <p class="ab-tl-body">{{ m.body }}</p>
                    </div>
                </article>
            </div>
        </section>

        <!-- ── Team / Atelier ──────────────────────────────── -->
        <section class="ab-team-section">
            <div class="ab-team-head">
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
                    <span class="mj-eyebrow">The Atelier</span>
                </div>
                <h2 class="ab-team-h2">
                    The hands behind<br /><em class="mj-gold-i"
                        >every ornament.</em
                    >
                </h2>
                <p class="ab-team-lead">
                    Four roles. Four disciplines. One bench. The people who
                    actually make the work happen.
                </p>
            </div>

            <div class="ab-team-grid">
                <article
                    v-for="member in team"
                    :key="member.role"
                    class="ab-team-card"
                >
                    <div class="ab-team-portrait" aria-hidden="true">
                        <span class="ab-team-mark">{{ member.mark }}</span>
                    </div>
                    <span class="ab-team-role">{{ member.role }}</span>
                    <h3 class="ab-team-name">{{ member.name }}</h3>
                    <p class="ab-team-detail">{{ member.detail }}</p>
                </article>
            </div>
        </section>

        <!-- ── CTA ─────────────────────────────────────────── -->
        <section class="ab-cta-section">
            <div class="ab-cta-inner">
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
                <h2 class="ab-cta-h2">Begin a conversation with the bench.</h2>
                <p class="ab-cta-body">
                    Whether it is a bridal commission, an heirloom redesign, or
                    simply a piece you have been turning over in your mind for
                    years — we would be glad to make it with you.
                </p>
                <div class="ab-cta-btns">
                    <button class="mj-btn-gold" @click="navigate('contact')">
                        Book an Appointment
                    </button>
                    <button
                        class="mj-btn-ghost"
                        @click="navigate('collections')"
                    >
                        Browse Collections
                    </button>
                </div>
                <div class="ab-cta-rule" aria-hidden="true">
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
                    <span></span>
                </div>
            </div>
        </section>
    </main>

    <TheFooter />
</template>

<style scoped>
/* ── Page wrapper ────────────────────────────────────── */
.ab-page {
    background: var(--mj-cream);
    overflow-x: hidden;
}

/* ── Hero ────────────────────────────────────────────── */
.ab-hero {
    position: relative;
    padding: 168px 60px 96px;
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
.ab-hero-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    user-select: none;
}
.ab-hero-watermark {
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
.ab-hero-inner {
    max-width: 1180px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
    padding-right: 390px;
    min-height: 520px;
}
.ab-title {
    font-family: var(--mj-serif);
    font-size: clamp(48px, 6.4vw, 92px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.04;
    letter-spacing: 0.005em;
    margin: 12px 0 28px;
    max-width: 920px;
}
.ab-title em {
    font-style: italic;
    font-weight: 400;
}
.ab-lead {
    max-width: 580px;
    font-family: var(--mj-sans);
    font-size: 15.5px;
    line-height: 1.9;
    color: var(--mj-ink-soft);
    font-weight: 300;
    margin-bottom: 36px;
}
.ab-cta {
    display: flex;
    gap: 16px;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 72px;
}
.ab-btn-ghost-light {
    background: none;
    border: none;
    cursor: pointer;
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--mj-gold);
    font-weight: 600;
    border-bottom: 1px solid var(--mj-gold);
    padding: 4px 0 6px;
    transition:
        color 0.2s,
        border-color 0.2s;
}
.ab-btn-ghost-light:hover {
    color: var(--mj-crimson);
    border-color: var(--mj-crimson);
}
.ab-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-top: 1px solid rgba(196, 146, 42, 0.22);
    border-bottom: 1px solid rgba(196, 146, 42, 0.22);
    max-width: 720px;
}
.ab-stat {
    display: flex;
    flex-direction: column;
    padding: 28px 24px 26px;
    border-right: 1px solid rgba(196, 146, 42, 0.16);
    transition: background 0.3s ease;
}
.ab-stat:last-child {
    border-right: none;
}
.ab-stat:hover {
    background: rgba(196, 146, 42, 0.05);
}
.ab-stat-num {
    font-family: var(--mj-serif);
    font-size: clamp(38px, 5vw, 60px);
    font-weight: 300;
    line-height: 1;
    background: linear-gradient(180deg, #6b4f1e 0%, #c4922a 60%, #e8c96d 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 10px;
}
.ab-stat-label {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--mj-ink);
    font-weight: 500;
}
.ab-stat-sub {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.06em;
    color: var(--mj-ink-soft);
    margin-top: 4px;
}
.ab-hero-panel {
    position: absolute;
    right: 0;
    top: 18px;
    width: 330px;
    min-height: 470px;
    padding: 30px 28px;
    background: linear-gradient(165deg, #2c0a0a 0%, #4a0d0d 62%, #5a1414 100%);
    border: 1px solid rgba(196, 146, 42, 0.38);
    box-shadow: 0 28px 64px rgba(74, 13, 13, 0.24);
    overflow: hidden;
}
.ab-hero-panel::before {
    content: '';
    position: absolute;
    inset: 14px;
    border: 1px solid rgba(232, 201, 109, 0.22);
    pointer-events: none;
}
.ab-hero-panel-kicker,
.ab-hero-panel-foot {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: rgba(232, 201, 109, 0.62);
}
.ab-hero-panel-mark {
    margin: 54px 0 42px;
    font-family: var(--mj-serif);
    font-size: 118px;
    font-weight: 300;
    line-height: 0.72;
    color: rgba(253, 248, 240, 0.16);
}
.ab-hero-panel h2 {
    font-family: var(--mj-serif);
    font-size: 28px;
    font-weight: 300;
    line-height: 1.18;
    color: var(--mj-cream);
    margin-bottom: 18px;
}
.ab-hero-panel p {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.82;
    color: rgba(253, 248, 240, 0.48);
}
.ab-hero-panel-foot {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    margin-top: 42px;
    padding-top: 18px;
    border-top: 1px solid rgba(232, 201, 109, 0.22);
    letter-spacing: 0.16em;
}

/* ── Story ───────────────────────────────────────────── */
.ab-story-section {
    background: var(--mj-cream);
    padding: 110px 60px;
    position: relative;
}
.ab-story-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 1px;
    height: 64px;
    background: linear-gradient(to bottom, var(--mj-gold), transparent);
    transform: translateX(-50%);
    opacity: 0.5;
}
.ab-story-inner {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 0.85fr 1.15fr;
    gap: 72px;
    align-items: center;
}

/* Frame */
.ab-story-frame {
    aspect-ratio: 0.82 / 1;
    max-width: 380px;
    width: 100%;
    background: linear-gradient(160deg, #2c0a0a 0%, #4a0d0d 60%, #5a1414 100%);
    border: 1px solid rgba(196, 146, 42, 0.45);
    box-shadow: 0 30px 64px rgba(26, 10, 10, 0.32);
    position: relative;
    padding: 24px;
}
.ab-story-frame::before,
.ab-story-frame::after {
    content: '';
    position: absolute;
    width: 18px;
    height: 18px;
    border: 1px solid rgba(232, 201, 109, 0.6);
}
.ab-story-frame::before {
    top: 10px;
    left: 10px;
    border-right: none;
    border-bottom: none;
}
.ab-story-frame::after {
    bottom: 10px;
    right: 10px;
    border-left: none;
    border-top: none;
}
.ab-story-frame-inner {
    height: 100%;
    border: 1px solid rgba(232, 201, 109, 0.32);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 28px 22px;
    background: repeating-linear-gradient(
        45deg,
        rgba(232, 201, 109, 0.04) 0 1px,
        transparent 1px 12px
    );
}
.ab-story-frame-top {
    display: flex;
    justify-content: space-between;
    align-items: baseline;
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: rgba(232, 201, 109, 0.7);
}
.ab-story-frame-year {
    font-family: var(--mj-serif);
    font-size: 22px;
    color: var(--mj-gold-light);
    letter-spacing: 0.08em;
}
.ab-story-frame-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    text-align: center;
}
.ab-story-frame-mono {
    font-family: var(--mj-serif);
    font-size: clamp(64px, 8vw, 100px);
    font-weight: 300;
    color: var(--mj-cream);
    letter-spacing: 0.18em;
    line-height: 1;
    margin-bottom: 6px;
}
.ab-story-frame-orn {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 70%;
}
.ab-story-frame-orn span {
    flex: 1;
    height: 0.5px;
    background: rgba(232, 201, 109, 0.4);
}
.ab-story-frame-tag {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--mj-gold-light);
}
.ab-story-frame-tag-fade {
    color: rgba(232, 201, 109, 0.5);
    font-size: 9.5px;
    letter-spacing: 0.22em;
}
.ab-story-frame-foot {
    display: flex;
    align-items: center;
    gap: 10px;
}
.ab-story-frame-foot span:first-child,
.ab-story-frame-foot span:last-child {
    flex: 1;
    height: 0.5px;
    background: rgba(232, 201, 109, 0.32);
}
.ab-story-frame-foot-text {
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.24em;
    text-transform: uppercase;
    color: rgba(232, 201, 109, 0.6);
    white-space: nowrap;
}

/* Story body */
.ab-story-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(34px, 4.4vw, 58px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.12;
    margin: 8px 0 24px;
    letter-spacing: 0.005em;
}
.ab-story-body p {
    font-family: var(--mj-sans);
    font-size: 14.5px;
    line-height: 1.95;
    color: var(--mj-ink-soft);
    margin-bottom: 18px;
    max-width: 540px;
    font-weight: 300;
}
.ab-story-sign {
    display: flex;
    align-items: baseline;
    gap: 16px;
    padding-top: 22px;
    border-top: 1px solid rgba(196, 146, 42, 0.22);
    max-width: 380px;
    margin-top: 12px;
}
.ab-story-sign-name {
    font-family: var(--mj-serif);
    font-size: 17px;
    font-style: italic;
    color: var(--mj-crimson);
    font-weight: 500;
}
.ab-story-sign-place {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-ink-soft);
    margin-left: auto;
}

/* ── Values ──────────────────────────────────────────── */
.ab-values-section {
    background: linear-gradient(
        180deg,
        var(--mj-cream-mid) 0%,
        var(--mj-cream) 100%
    );
    padding: 100px 60px;
    overflow: hidden;
    position: relative;
}
.ab-value-head {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 56px;
}
.ab-values-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(32px, 4.2vw, 54px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.14;
    margin: 6px 0 16px;
    letter-spacing: 0.005em;
}
.ab-values-lead {
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.85;
    color: var(--mj-ink-soft);
    font-weight: 300;
    max-width: 480px;
    margin: 0 auto;
}
.ab-values-grid {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border: 1px solid rgba(196, 146, 42, 0.2);
    background: rgba(255, 255, 255, 0.55);
}
.ab-value-tile {
    padding: 40px 30px 44px;
    border-right: 1px solid rgba(196, 146, 42, 0.15);
    position: relative;
    transition: background 0.28s ease;
}
.ab-value-tile:last-child {
    border-right: none;
}
.ab-value-tile:hover {
    background: rgba(196, 146, 42, 0.05);
}
.ab-value-tile::before {
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
}
.ab-value-tile:hover::before {
    transform: scaleX(1);
}
.ab-value-mark {
    display: block;
    font-size: 22px;
    color: var(--mj-gold);
    margin-bottom: 18px;
    line-height: 1;
    transition: transform 0.3s ease;
}
.ab-value-tile:hover .ab-value-mark {
    transform: scale(1.18) rotate(15deg);
}
.ab-value-title {
    font-family: var(--mj-serif);
    font-size: 19px;
    font-weight: 500;
    color: var(--mj-ink);
    margin-bottom: 12px;
    letter-spacing: 0.01em;
}
.ab-value-body {
    font-family: var(--mj-sans);
    font-size: 13px;
    line-height: 1.85;
    color: var(--mj-ink-soft);
    font-weight: 300;
}

/* ── Timeline ────────────────────────────────────────── */
.ab-timeline-section {
    background: var(--mj-cream);
    padding: 110px 60px 96px;
    position: relative;
    overflow: hidden;
}
.ab-timeline-section::before {
    content: '18';
    position: absolute;
    left: -3%;
    top: 36%;
    transform: translateY(-50%);
    font-family: var(--mj-serif);
    font-size: min(36vw, 360px);
    font-weight: 700;
    color: rgba(26, 15, 10, 0.04);
    line-height: 1;
    pointer-events: none;
}
.ab-timeline-head {
    max-width: 1180px;
    margin: 0 auto 56px;
    position: relative;
}
.ab-tl-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(32px, 4vw, 54px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.14;
    margin-top: 6px;
    letter-spacing: 0.005em;
}

.ab-timeline-rail {
    max-width: 880px;
    margin: 0 auto;
    position: relative;
    padding: 12px 0;
}
.ab-tl-spine {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 50%;
    width: 1px;
    background: linear-gradient(
        to bottom,
        transparent,
        rgba(196, 146, 42, 0.42),
        transparent
    );
    transform: translateX(-50%);
}
.ab-tl-row {
    display: grid;
    grid-template-columns: 1fr 80px 1fr;
    align-items: center;
    gap: 18px;
    margin-bottom: 36px;
    position: relative;
}
.ab-tl-row:last-child {
    margin-bottom: 0;
}
.ab-tl-row .ab-tl-card {
    grid-column: 3;
    text-align: left;
}
.ab-tl-row .ab-tl-year {
    grid-column: 1;
    text-align: right;
}
.ab-tl-row-alt .ab-tl-card {
    grid-column: 1;
    text-align: right;
}
.ab-tl-row-alt .ab-tl-year {
    grid-column: 3;
    text-align: left;
}
.ab-tl-dot {
    grid-column: 2;
    justify-self: center;
    width: 10px;
    height: 10px;
    background: var(--mj-cream);
    border: 1px solid var(--mj-gold);
    transform: rotate(45deg);
    box-shadow: 0 0 0 4px var(--mj-cream);
    z-index: 1;
}
.ab-tl-year {
    font-family: var(--mj-serif);
    font-size: 24px;
    color: var(--mj-gold);
    letter-spacing: 0.04em;
    align-self: center;
}
.ab-tl-card {
    background: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(196, 146, 42, 0.18);
    padding: 22px 24px;
    transition:
        transform 0.3s ease,
        border-color 0.3s ease,
        box-shadow 0.3s ease;
    box-shadow: 0 12px 32px rgba(26, 15, 10, 0.05);
}
.ab-tl-card:hover {
    transform: translateY(-3px);
    border-color: rgba(196, 146, 42, 0.4);
    box-shadow: 0 18px 42px rgba(26, 15, 10, 0.1);
}
.ab-tl-title {
    font-family: var(--mj-serif);
    font-size: 18px;
    font-weight: 500;
    color: var(--mj-ink);
    margin-bottom: 8px;
    letter-spacing: 0.01em;
}
.ab-tl-body {
    font-family: var(--mj-sans);
    font-size: 13px;
    line-height: 1.8;
    color: var(--mj-ink-soft);
    font-weight: 300;
}

/* ── Team ────────────────────────────────────────────── */
.ab-team-section {
    background: linear-gradient(170deg, #1a0f0a 0%, #110b07 55%, #0a0602 100%);
    padding: 110px 60px;
    overflow: hidden;
    position: relative;
}
.ab-team-section::before {
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
.ab-team-head {
    text-align: center;
    max-width: 720px;
    margin: 0 auto 56px;
    position: relative;
}
.ab-team-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(32px, 4vw, 52px);
    font-weight: 300;
    color: var(--mj-cream);
    line-height: 1.15;
    margin: 6px 0 16px;
}
.ab-team-lead {
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.85;
    color: rgba(253, 248, 240, 0.5);
    font-weight: 300;
    max-width: 480px;
    margin: 0 auto;
}
.ab-team-grid {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    position: relative;
}
.ab-team-card {
    background: rgba(232, 201, 109, 0.04);
    border: 1px solid rgba(196, 146, 42, 0.22);
    padding: 28px 24px 30px;
    position: relative;
    overflow: hidden;
    transition:
        transform 0.32s ease,
        border-color 0.32s ease,
        background 0.32s ease;
}
.ab-team-card::before {
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
}
.ab-team-card:hover {
    transform: translateY(-5px);
    border-color: rgba(232, 201, 109, 0.42);
    background: rgba(232, 201, 109, 0.07);
}
.ab-team-card:hover::before {
    transform: scaleX(1);
}

.ab-team-portrait {
    aspect-ratio: 1 / 1;
    display: grid;
    place-items: center;
    background:
        radial-gradient(
            circle at 50% 45%,
            rgba(232, 201, 109, 0.16),
            transparent 55%
        ),
        repeating-linear-gradient(
            45deg,
            rgba(232, 201, 109, 0.05) 0 1px,
            transparent 1px 12px
        ),
        linear-gradient(135deg, #2c0a0a, #4a0d0d);
    border: 1px solid rgba(232, 201, 109, 0.18);
    margin-bottom: 22px;
    position: relative;
}
.ab-team-portrait::after {
    content: '';
    position: absolute;
    inset: 14px;
    border: 1px solid rgba(232, 201, 109, 0.12);
}
.ab-team-mark {
    font-family: var(--mj-serif);
    font-size: 56px;
    font-weight: 300;
    color: var(--mj-gold-light);
    text-shadow: 0 6px 22px rgba(0, 0, 0, 0.5);
    letter-spacing: 0.04em;
    z-index: 1;
}
.ab-team-role {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--mj-gold);
    display: block;
    margin-bottom: 8px;
}
.ab-team-name {
    font-family: var(--mj-serif);
    font-size: 19px;
    font-weight: 500;
    color: var(--mj-cream);
    margin-bottom: 12px;
    letter-spacing: 0.01em;
}
.ab-team-detail {
    font-family: var(--mj-sans);
    font-size: 12.5px;
    line-height: 1.85;
    color: rgba(253, 248, 240, 0.45);
    font-weight: 300;
}

/* ── CTA ─────────────────────────────────────────────── */
.ab-cta-section {
    background: linear-gradient(
        155deg,
        var(--mj-crimson) 0%,
        var(--mj-crimson-dark) 100%
    );
    padding: 96px 60px;
    overflow: hidden;
    position: relative;
}
.ab-cta-section::before {
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
.ab-cta-inner {
    max-width: 640px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 1;
}
.ab-cta-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(28px, 3.6vw, 46px);
    font-weight: 300;
    color: var(--mj-cream);
    margin-bottom: 14px;
    line-height: 1.18;
    letter-spacing: 0.005em;
}
.ab-cta-body {
    font-family: var(--mj-sans);
    font-size: 14px;
    color: rgba(253, 248, 240, 0.6);
    margin: 0 auto 36px;
    max-width: 480px;
    line-height: 1.85;
    font-weight: 300;
}
.ab-cta-btns {
    display: flex;
    gap: 16px;
    justify-content: center;
    flex-wrap: wrap;
}
.ab-cta-btns .mj-btn-gold,
.ab-cta-btns .mj-btn-ghost {
    min-width: 170px;
    padding: 15px 32px;
}
.ab-cta-rule {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin-top: 56px;
}
.ab-cta-rule span {
    display: block;
    width: 80px;
    height: 0.5px;
    background: rgba(196, 146, 42, 0.28);
}

/* Shared eyebrow row */
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
    .ab-hero {
        padding: 148px 40px 80px;
    }
    .ab-hero-inner {
        padding-right: 0;
        min-height: 0;
    }
    .ab-hero-panel {
        position: relative;
        inset: auto;
        width: 100%;
        min-height: 0;
        margin-top: 36px;
    }
    .ab-stats {
        grid-template-columns: repeat(2, 1fr);
    }
    .ab-stat:nth-child(2) {
        border-right: none;
    }
    .ab-stat:nth-child(3),
    .ab-stat:nth-child(4) {
        border-top: 1px solid rgba(196, 146, 42, 0.16);
    }
    .ab-story-section {
        padding: 88px 40px;
    }
    .ab-story-inner {
        gap: 48px;
        grid-template-columns: 0.9fr 1.1fr;
    }
    .ab-values-section {
        padding: 88px 40px;
    }
    .ab-values-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .ab-value-tile:nth-child(2) {
        border-right: none;
    }
    .ab-value-tile:nth-child(3),
    .ab-value-tile:nth-child(4) {
        border-top: 1px solid rgba(196, 146, 42, 0.15);
    }
    .ab-timeline-section {
        padding: 88px 40px 80px;
    }
    .ab-team-section {
        padding: 88px 40px;
    }
    .ab-team-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .ab-cta-section {
        padding: 84px 40px;
    }
}

@media (max-width: 900px) {
    .ab-hero {
        padding: 132px 28px 64px;
    }
    .ab-story-section {
        padding: 76px 28px;
    }
    .ab-story-inner {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    .ab-story-frame {
        max-width: 320px;
        margin: 0 auto;
    }
    .ab-values-section {
        padding: 76px 28px;
    }
    .ab-timeline-section {
        padding: 76px 28px 64px;
    }

    /* Single-side timeline on tablet */
    .ab-tl-spine {
        left: 16px;
        transform: none;
    }
    .ab-tl-row,
    .ab-tl-row.ab-tl-row-alt {
        grid-template-columns: 32px 80px 1fr;
        gap: 14px;
    }
    .ab-tl-row .ab-tl-year,
    .ab-tl-row.ab-tl-row-alt .ab-tl-year {
        grid-column: 2;
        text-align: left;
    }
    .ab-tl-row .ab-tl-card,
    .ab-tl-row.ab-tl-row-alt .ab-tl-card {
        grid-column: 3;
        text-align: left;
    }
    .ab-tl-dot {
        grid-column: 1;
        justify-self: start;
    }

    .ab-team-section {
        padding: 76px 28px;
    }
    .ab-cta-section {
        padding: 72px 28px;
    }
}

@media (max-width: 640px) {
    .ab-hero {
        padding: 116px 20px 52px;
    }
    .ab-title {
        font-size: clamp(36px, 10vw, 52px);
    }
    .ab-cta {
        gap: 12px;
        flex-direction: column;
        align-items: flex-start;
    }
    .ab-cta button {
        width: 100%;
    }
    .ab-cta .ab-btn-ghost-light {
        width: auto;
    }
    .ab-stats {
        grid-template-columns: 1fr;
    }
    .ab-stat {
        border-right: none;
        border-bottom: 1px solid rgba(196, 146, 42, 0.16);
    }
    .ab-stat:nth-child(3),
    .ab-stat:nth-child(4) {
        border-top: none;
    }
    .ab-stat:last-child {
        border-bottom: none;
    }

    .ab-story-section {
        padding: 60px 20px;
    }
    .ab-story-h2 {
        font-size: clamp(28px, 8vw, 40px);
    }
    .ab-values-section {
        padding: 60px 20px;
    }
    .ab-values-grid {
        grid-template-columns: 1fr;
    }
    .ab-value-tile {
        border-right: none;
        border-bottom: 1px solid rgba(196, 146, 42, 0.15);
    }
    .ab-value-tile:last-child {
        border-bottom: none;
    }
    .ab-value-tile:nth-child(3),
    .ab-value-tile:nth-child(4) {
        border-top: none;
    }

    .ab-timeline-section {
        padding: 56px 20px 56px;
    }
    .ab-tl-row,
    .ab-tl-row.ab-tl-row-alt {
        grid-template-columns: 24px 64px 1fr;
        gap: 10px;
        margin-bottom: 26px;
    }
    .ab-tl-card {
        padding: 18px 18px;
    }

    .ab-team-section {
        padding: 56px 20px;
    }
    .ab-team-grid {
        grid-template-columns: 1fr;
    }
    .ab-cta-section {
        padding: 60px 20px;
    }
    .ab-cta-btns {
        flex-direction: column;
        align-items: center;
    }
    .ab-cta-btns .mj-btn-gold,
    .ab-cta-btns .mj-btn-ghost {
        width: 100%;
        max-width: 280px;
    }
}
</style>
