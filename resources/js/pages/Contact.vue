<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { onMounted, onUnmounted, ref } from 'vue';
import CustomCursor from '@/components/maniratn/CustomCursor.vue';
import TheAccordion from '@/components/maniratn/TheAccordion.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';
import TheNav from '@/components/maniratn/TheNav.vue';

gsap.registerPlugin(ScrollTrigger);

const form = ref({ name: '', phone: '', email: '', subject: '', message: '' });
const sent = ref(false);
const errors = ref<Record<string, string>>({});

const subjectOptions = [
    'General Enquiry',
    'Custom / Bespoke Order',
    'Bridal Commission',
    'Heirloom Redesign',
    'Pricing & Availability',
    'Exchange or Return',
    'Other',
];

const channels = [
    {
        title: 'Visit the showroom',
        lines: [
            'Maniratn Jewellers',
            'Main Bazaar Road, Opp. Town Hall',
            'Pune — 411 001',
        ],
        cta: 'Get directions',
        mark: '◈',
    },
    {
        title: 'Call or WhatsApp',
        lines: ['+91 98765 43210', '+91 98765 43211', 'Mon–Sat · 10 AM – 8 PM'],
        cta: 'Tap to call',
        mark: '◇',
    },
    {
        title: 'Write to us',
        lines: [
            'hello@maniratn.com',
            'Reply within 24 hours',
            'Working days only',
        ],
        cta: 'Send an email',
        mark: '✦',
    },
];

const infoAccordion = [
    {
        title: 'Showroom hours',
        content:
            'Monday to Saturday: 10:00 AM to 8:00 PM. Sunday: 11:00 AM to 6:00 PM. Public holidays: 11:00 AM to 4:00 PM. Festival hours may extend; please call ahead during Diwali, Akshaya Tritiya, and the wedding season.',
    },
    {
        title: 'Custom orders & appointments',
        content:
            'Bespoke commissions begin with a private consultation at our atelier. Bookings should be made at least 3 days in advance. Available Monday to Saturday, 11 AM to 6 PM. Evening slots can be arranged on request.',
    },
    {
        title: 'Exchange & buy-back policy',
        content:
            'All Maniratn gold ornaments are eligible for lifetime exchange at the prevailing rate. Buy-back is offered on hallmarked pieces accompanied by the original invoice. Stones are valued separately by an independent assessor.',
    },
    {
        title: 'EMI and instalment plans',
        content:
            'Flexible monthly schemes are available for purchases above ₹25,000. Zero-cost EMI on select bank cards. Full plan details and eligibility can be discussed with the showroom team in person.',
    },
    {
        title: 'Care & lifetime cleaning',
        content:
            'Bring your Maniratn pieces back annually for complimentary professional cleaning, polishing, and a full inspection of clasps and prongs. We will tell you if anything needs attention before it becomes a problem.',
    },
];

const trustStrip: [string, string, string][] = [
    ['18+', 'Years', 'serving Pune'],
    ['5000+', 'Families', 'served'],
    ['<24h', 'Reply', 'on enquiries'],
    ['100%', 'Hallmark', 'on every piece'],
];

function validate(): boolean {
    const v: Record<string, string> = {};

    if (!form.value.name.trim()) {
        v.name = 'Please tell us your name.';
    }

    if (!form.value.phone.trim()) {
        v.phone = 'A phone number lets us reach you fastest.';
    }

    if (!form.value.message.trim()) {
        v.message = 'Please share what we can help with.';
    }

    errors.value = v;

    return Object.keys(v).length === 0;
}

function handleSubmit(): void {
    if (!validate()) {
        return;
    }

    sent.value = true;
}

function resetForm(): void {
    sent.value = false;
    errors.value = {};
    form.value = { name: '', phone: '', email: '', subject: '', message: '' };
}

onMounted(() => {
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
    tl.from('.ct-eyebrow', { y: 18, opacity: 0, duration: 0.5, delay: 0.15 })
        .from('.ct-title', { y: 36, opacity: 0, duration: 0.85 }, '-=0.25')
        .from('.ct-lead', { y: 22, opacity: 0, duration: 0.6 }, '-=0.55')
        .from(
            '.ct-channel',
            { y: 24, opacity: 0, duration: 0.55, stagger: 0.1 },
            '-=0.4',
        );

    gsap.from('.ct-form-card, .ct-info-card', {
        scrollTrigger: { trigger: '.ct-content', start: 'top 82%' },
        y: 36,
        opacity: 0,
        duration: 0.7,
        stagger: 0.12,
        ease: 'power3.out',
    });

    gsap.from('.ct-trust-item', {
        scrollTrigger: { trigger: '.ct-trust-strip', start: 'top 88%' },
        y: 22,
        opacity: 0,
        duration: 0.55,
        stagger: 0.08,
        ease: 'power3.out',
    });

    gsap.from('.ct-faq-section', {
        scrollTrigger: { trigger: '.ct-faq-section', start: 'top 85%' },
        y: 28,
        opacity: 0,
        duration: 0.65,
        ease: 'power3.out',
    });
});

onUnmounted(() => {
    ScrollTrigger.killAll();
});
</script>

<template>
    <Head title="Contact — Maniratn Jewellers" />

    <CustomCursor />
    <TheNav current-page="contact" hero-variant="light" />

    <main class="ct-page">
        <!-- ── Hero ────────────────────────────────────────── -->
        <section class="ct-hero">
            <div class="ct-hero-bg" aria-hidden="true">
                <span class="ct-hero-watermark">M</span>
            </div>
            <div class="ct-hero-inner">
                <div class="mj-eyebrow-row ct-eyebrow">
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
                    <span class="mj-eyebrow">Get in Touch</span>
                </div>
                <h1 class="ct-title">
                    A conversation is<br />
                    where every piece<br />
                    <em class="mj-crimson-i">begins.</em>
                </h1>
                <p class="ct-lead">
                    Whether it is a custom commission, a question of
                    availability, or simply a moment of advice from our atelier
                    — we would be glad to hear from you.
                </p>

                <div class="ct-appointment-strip">
                    <div>
                        <span class="ct-appointment-kicker"
                            >Private consultations</span
                        >
                        <strong
                            >Bridal and redesign appointments are available this
                            week.</strong
                        >
                    </div>
                    <span class="ct-appointment-time">11 AM - 6 PM</span>
                </div>

                <div class="ct-channels">
                    <article
                        v-for="ch in channels"
                        :key="ch.title"
                        class="ct-channel"
                    >
                        <span class="ct-channel-mark" aria-hidden="true">{{
                            ch.mark
                        }}</span>
                        <h3 class="ct-channel-title">{{ ch.title }}</h3>
                        <div class="ct-channel-lines">
                            <span v-for="line in ch.lines" :key="line">{{
                                line
                            }}</span>
                        </div>
                        <span class="ct-channel-cta">{{ ch.cta }} →</span>
                    </article>
                </div>
            </div>
        </section>

        <!-- ── Form & Info ─────────────────────────────────── -->
        <section class="ct-content">
            <article class="ct-form-card">
                <div v-if="sent" class="ct-thankyou">
                    <svg
                        width="34"
                        height="34"
                        viewBox="0 0 16 16"
                        style="margin-bottom: 18px"
                    >
                        <path
                            d="M8 0 L9 7 L16 8 L9 9 L8 16 L7 9 L0 8 L7 7Z"
                            fill="#C4922A"
                            opacity="0.85"
                        />
                    </svg>
                    <h3>Your message has been received.</h3>
                    <p>
                        Thank you for writing to Maniratn. A member of our team
                        will respond within twenty-four working hours. If your
                        enquiry is urgent, please call us at
                        <strong>+91 98765 43210</strong>.
                    </p>
                    <button @click="resetForm" class="mj-btn-crimson">
                        Send another
                    </button>
                </div>

                <form v-else class="ct-form" @submit.prevent="handleSubmit">
                    <div class="ct-form-head">
                        <span class="mj-eyebrow" style="color: var(--mj-gold)"
                            >Send an enquiry</span
                        >
                        <h2>Tell us how we can help.</h2>
                        <p>
                            Most enquiries are answered the same working day.
                            Bridal and bespoke briefs are routed directly to our
                            atelier lead.
                        </p>
                    </div>

                    <div class="ct-grid-two">
                        <div class="ct-field">
                            <label class="ct-label"
                                >Name <em>required</em></label
                            >
                            <input
                                v-model="form.name"
                                class="ct-input"
                                :class="{ 'ct-input-error': errors.name }"
                                placeholder="Your full name"
                            />
                            <span v-if="errors.name" class="ct-field-error">{{
                                errors.name
                            }}</span>
                        </div>
                        <div class="ct-field">
                            <label class="ct-label"
                                >Phone <em>required</em></label
                            >
                            <input
                                v-model="form.phone"
                                class="ct-input"
                                :class="{ 'ct-input-error': errors.phone }"
                                placeholder="+91 00000 00000"
                            />
                            <span v-if="errors.phone" class="ct-field-error">{{
                                errors.phone
                            }}</span>
                        </div>
                    </div>

                    <div class="ct-field">
                        <label class="ct-label">Email</label>
                        <input
                            v-model="form.email"
                            type="email"
                            class="ct-input"
                            placeholder="your@email.com"
                        />
                    </div>

                    <div class="ct-field">
                        <label class="ct-label">Subject</label>
                        <select
                            v-model="form.subject"
                            class="ct-input ct-select"
                        >
                            <option value="">Choose a subject…</option>
                            <option
                                v-for="o in subjectOptions"
                                :key="o"
                                :value="o"
                            >
                                {{ o }}
                            </option>
                        </select>
                    </div>

                    <div class="ct-field">
                        <label class="ct-label"
                            >Message <em>required</em></label
                        >
                        <textarea
                            v-model="form.message"
                            class="ct-input ct-textarea"
                            :class="{ 'ct-input-error': errors.message }"
                            rows="5"
                            placeholder="Sketches, photographs, or a few lines about what you have in mind…"
                        />
                        <span v-if="errors.message" class="ct-field-error">{{
                            errors.message
                        }}</span>
                    </div>

                    <button type="submit" class="mj-btn-gold ct-submit">
                        Send Message
                    </button>

                    <p class="ct-form-note">
                        By writing to us you agree to be contacted by Maniratn
                        Jewellers about your enquiry. We do not share details
                        with third parties — ever.
                    </p>
                </form>
            </article>

            <aside class="ct-info-card">
                <div class="ct-info-head">
                    <span class="mj-eyebrow" style="color: var(--mj-gold)"
                        >The atelier</span
                    >
                    <h2>Find us in Pune.</h2>
                    <p>
                        Tucked into the lanes of Main Bazaar, opposite the Town
                        Hall — our showroom and atelier sit under the same roof.
                        Walk in, or book a private consultation.
                    </p>
                </div>

                <div class="ct-map" aria-hidden="true">
                    <div class="ct-map-grid"></div>
                    <div class="ct-map-marker">
                        <span class="ct-map-pin"></span>
                        <span class="ct-map-pin-pulse"></span>
                    </div>
                    <div class="ct-map-label">
                        <span
                            class="mj-eyebrow"
                            style="color: var(--mj-gold); font-size: 9px"
                            >Showroom</span
                        >
                        <span class="ct-map-label-name"
                            >Maniratn Jewellers</span
                        >
                        <span class="ct-map-label-addr"
                            >Main Bazaar Road · Pune</span
                        >
                    </div>
                </div>

                <div class="ct-info-accordion">
                    <h3>Practical details</h3>
                    <TheAccordion :items="infoAccordion" variant="light" />
                </div>
            </aside>
        </section>

        <!-- ── Trust strip ─────────────────────────────────── -->
        <section class="ct-trust-strip">
            <div class="ct-trust-inner">
                <div
                    v-for="[num, label, sub] in trustStrip"
                    :key="label"
                    class="ct-trust-item"
                >
                    <span class="ct-trust-num">{{ num }}</span>
                    <span class="ct-trust-label">{{ label }}</span>
                    <span class="ct-trust-sub">{{ sub }}</span>
                </div>
            </div>
        </section>

        <!-- ── Closing FAQ band ────────────────────────────── -->
        <section class="ct-faq-section">
            <div class="ct-faq-inner">
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
                    <span class="mj-eyebrow">A note from us</span>
                </div>
                <h2 class="ct-faq-h2">
                    The bench is small.<br />
                    <em class="mj-crimson-i">The patience is large.</em>
                </h2>
                <p class="ct-faq-body">
                    We answer every message ourselves. If a piece you have asked
                    about is currently on the bench, we will tell you so. We
                    will not promise what we cannot make in time — and we will
                    not finish a piece a day before it is ready.
                </p>
                <span class="ct-faq-sign">— The Maniratn Atelier</span>
            </div>
        </section>
    </main>

    <TheFooter />
</template>

<style scoped>
.ct-page {
    background: var(--mj-cream);
    overflow-x: hidden;
}

/* ── Hero ────────────────────────────────────────────── */
.ct-hero {
    position: relative;
    padding: 168px 60px 88px;
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
.ct-hero-bg {
    position: absolute;
    inset: 0;
    pointer-events: none;
    user-select: none;
}
.ct-hero-watermark {
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
.ct-hero-inner {
    max-width: 1180px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}
.ct-title {
    font-family: var(--mj-serif);
    font-size: clamp(46px, 6vw, 86px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.05;
    letter-spacing: 0.005em;
    margin: 12px 0 28px;
}
.ct-title em {
    font-style: italic;
    font-weight: 400;
}
.ct-lead {
    max-width: 580px;
    font-family: var(--mj-sans);
    font-size: 15.5px;
    line-height: 1.9;
    color: var(--mj-ink-soft);
    font-weight: 300;
    margin-bottom: 28px;
}
.ct-appointment-strip {
    max-width: 760px;
    margin-bottom: 46px;
    padding: 18px 22px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 22px;
    background: rgba(255, 255, 255, 0.58);
    border: 1px solid rgba(196, 146, 42, 0.22);
    border-left: 3px solid var(--mj-gold);
    box-shadow: 0 18px 42px rgba(26, 15, 10, 0.06);
}
.ct-appointment-kicker,
.ct-appointment-time {
    display: block;
    font-family: var(--mj-sans);
    font-size: 9px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-gold);
    margin-bottom: 6px;
}
.ct-appointment-strip strong {
    font-family: var(--mj-serif);
    font-size: 20px;
    font-weight: 400;
    line-height: 1.25;
    color: var(--mj-ink);
}
.ct-appointment-time {
    margin-bottom: 0;
    color: var(--mj-crimson);
    white-space: nowrap;
}

/* Channel cards */
.ct-channels {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}
.ct-channel {
    background: rgba(255, 255, 255, 0.65);
    border: 1px solid rgba(196, 146, 42, 0.22);
    padding: 28px 26px 26px;
    position: relative;
    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        border-color 0.3s ease;
    cursor: default;
    overflow: hidden;
}
.ct-channel::before {
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
.ct-channel:hover {
    transform: translateY(-4px);
    border-color: rgba(196, 146, 42, 0.45);
    box-shadow: 0 22px 48px rgba(26, 15, 10, 0.1);
}
.ct-channel:hover::before {
    transform: scaleX(1);
}
.ct-channel-mark {
    display: block;
    font-size: 22px;
    color: var(--mj-gold);
    margin-bottom: 16px;
    line-height: 1;
}
.ct-channel-title {
    font-family: var(--mj-serif);
    font-size: 19px;
    font-weight: 500;
    color: var(--mj-ink);
    margin-bottom: 14px;
    letter-spacing: 0.01em;
}
.ct-channel-lines {
    display: flex;
    flex-direction: column;
    gap: 4px;
    margin-bottom: 18px;
}
.ct-channel-lines span {
    font-family: var(--mj-sans);
    font-size: 13px;
    line-height: 1.65;
    color: var(--mj-ink-soft);
}
.ct-channel-lines span:first-child {
    color: var(--mj-ink);
    font-weight: 500;
}
.ct-channel-cta {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-gold);
    font-weight: 600;
    border-bottom: 1px solid rgba(196, 146, 42, 0.4);
    padding-bottom: 3px;
}

/* ── Form & Info ─────────────────────────────────────── */
.ct-content {
    max-width: 1180px;
    margin: 0 auto;
    padding: 88px 60px 96px;
    display: grid;
    grid-template-columns: 1.05fr 0.95fr;
    gap: 28px;
    align-items: start;
}
.ct-form-card,
.ct-info-card {
    background: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(196, 146, 42, 0.22);
    padding: 44px 44px 40px;
    box-shadow: 0 18px 44px rgba(26, 15, 10, 0.06);
    position: relative;
}
.ct-form-card::before,
.ct-info-card::before {
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
    opacity: 0.7;
}

.ct-form-head {
    margin-bottom: 28px;
}
.ct-form-head h2 {
    font-family: var(--mj-serif);
    font-size: clamp(26px, 2.6vw, 34px);
    font-weight: 300;
    color: var(--mj-ink);
    margin: 8px 0 12px;
    line-height: 1.18;
    letter-spacing: 0.005em;
}
.ct-form-head p {
    font-family: var(--mj-sans);
    font-size: 13px;
    line-height: 1.85;
    color: var(--mj-ink-soft);
    font-weight: 300;
    max-width: 480px;
}
.ct-form {
    display: flex;
    flex-direction: column;
    gap: 22px;
}
.ct-grid-two {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
}
.ct-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.ct-label {
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: var(--mj-ink-mid);
    font-weight: 600;
}
.ct-label em {
    font-style: normal;
    color: var(--mj-crimson);
    font-size: 9px;
    margin-left: 6px;
    letter-spacing: 0.16em;
    font-weight: 500;
}
.ct-input {
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid rgba(107, 18, 18, 0.2);
    padding: 12px 0 14px;
    font-family: var(--mj-sans);
    font-size: 14px;
    color: var(--mj-ink);
    font-weight: 400;
    outline: none;
    transition: border-color 0.22s;
}
.ct-input::placeholder {
    color: rgba(74, 55, 40, 0.5);
    font-weight: 300;
}
.ct-input:focus {
    border-bottom-color: var(--mj-crimson);
}
.ct-input-error {
    border-bottom-color: var(--mj-crimson) !important;
}
.ct-select {
    appearance: none;
    cursor: pointer;
    padding-right: 24px;
    background-image:
        linear-gradient(45deg, transparent 50%, var(--mj-gold) 50%),
        linear-gradient(135deg, var(--mj-gold) 50%, transparent 50%);
    background-position:
        calc(100% - 12px) 18px,
        calc(100% - 7px) 18px;
    background-size:
        5px 5px,
        5px 5px;
    background-repeat: no-repeat;
}
.ct-textarea {
    resize: vertical;
    min-height: 110px;
}
.ct-field-error {
    font-family: var(--mj-sans);
    font-size: 11px;
    color: var(--mj-crimson);
    font-weight: 500;
    letter-spacing: 0.02em;
}
.ct-submit {
    width: 100%;
    margin-top: 6px;
    padding: 16px 36px;
}
.ct-form-note {
    font-family: var(--mj-sans);
    font-size: 11px;
    line-height: 1.65;
    color: var(--mj-ink-soft);
    opacity: 0.75;
    text-align: center;
    margin-top: 4px;
}

/* Thank-you */
.ct-thankyou {
    text-align: center;
    padding: 30px 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.ct-thankyou h3 {
    font-family: var(--mj-serif);
    font-size: clamp(24px, 2.4vw, 32px);
    font-weight: 300;
    color: var(--mj-ink);
    margin-bottom: 16px;
    line-height: 1.2;
    max-width: 380px;
}
.ct-thankyou p {
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.85;
    color: var(--mj-ink-soft);
    font-weight: 300;
    max-width: 420px;
    margin-bottom: 28px;
}
.ct-thankyou strong {
    color: var(--mj-crimson);
    font-weight: 600;
}

/* Info card */
.ct-info-head h2 {
    font-family: var(--mj-serif);
    font-size: clamp(26px, 2.6vw, 34px);
    font-weight: 300;
    color: var(--mj-ink);
    margin: 8px 0 12px;
    line-height: 1.18;
    letter-spacing: 0.005em;
}
.ct-info-head p {
    font-family: var(--mj-sans);
    font-size: 13px;
    line-height: 1.85;
    color: var(--mj-ink-soft);
    font-weight: 300;
    margin-bottom: 28px;
}

/* Map */
.ct-map {
    position: relative;
    aspect-ratio: 16 / 9;
    background: linear-gradient(160deg, #2c0a0a 0%, #4a0d0d 60%, #5a1414 100%);
    border: 1px solid rgba(232, 201, 109, 0.32);
    overflow: hidden;
    margin-bottom: 32px;
}
.ct-map-grid {
    position: absolute;
    inset: 0;
    background:
        linear-gradient(90deg, rgba(232, 201, 109, 0.08) 1px, transparent 1px) 0
            0 / 36px 36px,
        linear-gradient(180deg, rgba(232, 201, 109, 0.08) 1px, transparent 1px)
            0 0 / 36px 36px,
        radial-gradient(
            circle at 50% 60%,
            rgba(232, 201, 109, 0.12),
            transparent 60%
        );
    pointer-events: none;
}
.ct-map-marker {
    position: absolute;
    top: 52%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 14px;
    height: 14px;
    z-index: 2;
}
.ct-map-pin {
    position: absolute;
    inset: 0;
    background: var(--mj-gold);
    border: 1.5px solid var(--mj-cream);
    transform: rotate(45deg);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
}
.ct-map-pin-pulse {
    position: absolute;
    top: -8px;
    left: -8px;
    width: 30px;
    height: 30px;
    border: 1px solid var(--mj-gold);
    border-radius: 50%;
    animation: ct-map-pulse 2.4s ease-out infinite;
}
@keyframes ct-map-pulse {
    0% {
        transform: scale(0.6);
        opacity: 0.85;
    }
    100% {
        transform: scale(1.8);
        opacity: 0;
    }
}
.ct-map-label {
    position: absolute;
    left: 22px;
    bottom: 22px;
    background: rgba(8, 3, 3, 0.78);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(232, 201, 109, 0.32);
    border-top: 2px solid var(--mj-gold);
    padding: 14px 18px;
    display: flex;
    flex-direction: column;
    gap: 3px;
    z-index: 2;
}
.ct-map-label-name {
    font-family: var(--mj-serif);
    font-size: 15px;
    font-weight: 500;
    color: var(--mj-cream);
    line-height: 1.1;
}
.ct-map-label-addr {
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.04em;
    color: rgba(232, 201, 109, 0.7);
}

.ct-info-accordion h3 {
    font-family: var(--mj-serif);
    font-size: 19px;
    font-weight: 500;
    color: var(--mj-ink);
    margin-bottom: 12px;
    letter-spacing: 0.01em;
}

/* ── Trust strip ─────────────────────────────────────── */
.ct-trust-strip {
    background: linear-gradient(170deg, #1a0f0a 0%, #110b07 55%, #0a0602 100%);
    padding: 0 60px;
    position: relative;
    overflow: hidden;
}
.ct-trust-strip::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(
        ellipse 60% 60% at 50% 50%,
        rgba(196, 146, 42, 0.08),
        transparent 60%
    );
    pointer-events: none;
}
.ct-trust-inner {
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    border-top: 1px solid rgba(196, 146, 42, 0.16);
    border-bottom: 1px solid rgba(196, 146, 42, 0.16);
    position: relative;
}
.ct-trust-item {
    padding: 56px 28px;
    border-right: 1px solid rgba(196, 146, 42, 0.1);
    text-align: center;
    transition: background 0.28s ease;
}
.ct-trust-item:last-child {
    border-right: none;
}
.ct-trust-item:hover {
    background: rgba(196, 146, 42, 0.05);
}
.ct-trust-num {
    display: block;
    font-family: var(--mj-serif);
    font-size: clamp(40px, 4.6vw, 60px);
    font-weight: 300;
    line-height: 1;
    background: linear-gradient(135deg, #c4922a 0%, #f0d98a 50%, #c4922a 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 12px;
}
.ct-trust-label {
    display: block;
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: rgba(253, 248, 240, 0.72);
    margin-bottom: 4px;
}
.ct-trust-sub {
    display: block;
    font-family: var(--mj-sans);
    font-size: 10px;
    letter-spacing: 0.05em;
    color: rgba(253, 248, 240, 0.32);
}

/* ── Closing band ────────────────────────────────────── */
.ct-faq-section {
    background: var(--mj-cream-mid);
    padding: 96px 60px;
    overflow: hidden;
    position: relative;
}
.ct-faq-section::before {
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
.ct-faq-inner {
    max-width: 720px;
    margin: 0 auto;
    text-align: center;
}
.ct-faq-h2 {
    font-family: var(--mj-serif);
    font-size: clamp(28px, 3.6vw, 46px);
    font-weight: 300;
    color: var(--mj-ink);
    line-height: 1.18;
    margin: 8px 0 22px;
    letter-spacing: 0.005em;
}
.ct-faq-body {
    font-family: var(--mj-sans);
    font-size: 14px;
    line-height: 1.95;
    color: var(--mj-ink-soft);
    font-weight: 300;
    max-width: 580px;
    margin: 0 auto 26px;
}
.ct-faq-sign {
    display: block;
    font-family: var(--mj-serif);
    font-size: 17px;
    font-style: italic;
    color: var(--mj-crimson);
    font-weight: 500;
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

/* ── Responsive ──────────────────────────────────────── */
@media (max-width: 1100px) {
    .ct-hero {
        padding: 148px 40px 80px;
    }
    .ct-channels {
        grid-template-columns: 1fr;
        max-width: 520px;
    }
    .ct-content {
        padding: 72px 40px 80px;
        grid-template-columns: 1fr;
        gap: 24px;
    }
    .ct-form-card,
    .ct-info-card {
        padding: 36px 32px 32px;
    }
    .ct-trust-strip {
        padding: 0 40px;
    }
    .ct-trust-item {
        padding: 44px 22px;
    }
    .ct-faq-section {
        padding: 80px 40px;
    }
}

@media (max-width: 900px) {
    .ct-hero {
        padding: 132px 28px 64px;
    }
    .ct-content {
        padding: 56px 28px 72px;
    }
    .ct-form-card,
    .ct-info-card {
        padding: 32px 24px 28px;
    }
    .ct-trust-strip {
        padding: 0 28px;
    }
    .ct-trust-inner {
        grid-template-columns: repeat(2, 1fr);
    }
    .ct-trust-item:nth-child(2) {
        border-right: none;
    }
    .ct-trust-item:nth-child(3),
    .ct-trust-item:nth-child(4) {
        border-top: 1px solid rgba(196, 146, 42, 0.1);
    }
    .ct-faq-section {
        padding: 72px 28px;
    }
}

@media (max-width: 640px) {
    .ct-hero {
        padding: 116px 20px 52px;
    }
    .ct-title {
        font-size: clamp(36px, 10vw, 52px);
    }
    .ct-appointment-strip {
        flex-direction: column;
        align-items: flex-start;
        padding: 16px 18px;
    }
    .ct-content {
        padding: 44px 20px 60px;
    }
    .ct-grid-two {
        grid-template-columns: 1fr;
        gap: 18px;
    }
    .ct-trust-strip {
        padding: 0 20px;
    }
    .ct-trust-inner {
        grid-template-columns: 1fr;
    }
    .ct-trust-item {
        border-right: none;
        border-bottom: 1px solid rgba(196, 146, 42, 0.1);
        padding: 36px 18px;
    }
    .ct-trust-item:last-child {
        border-bottom: none;
    }
    .ct-trust-item:nth-child(3),
    .ct-trust-item:nth-child(4) {
        border-top: none;
    }
    .ct-faq-section {
        padding: 60px 20px;
    }
    .ct-map-label {
        left: 14px;
        bottom: 14px;
        padding: 10px 14px;
    }
    .ct-map-label-name {
        font-size: 13px;
    }
    .ct-map-label-addr {
        font-size: 10px;
    }
}
</style>
