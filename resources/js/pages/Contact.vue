<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import TheNav from '@/components/maniratn/TheNav.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';
import TheAccordion from '@/components/maniratn/TheAccordion.vue';

const form = ref({ name: '', phone: '', email: '', subject: '', message: '' });
const sent = ref(false);
const errors = ref<Record<string, string>>({});

const subjectOptions = [
    'General Enquiry',
    'Custom Order',
    'Bridal Jewellery',
    'Pricing & Availability',
    'Exchange / Return',
    'Other',
];

const infoAccordion = [
    {
        title: 'Store Location & Hours',
        content: 'Maniratn Jewellers, Main Bazaar Road, Opposite Town Hall, Your City — 000 001. Monday - Saturday: 10:00 AM - 8:00 PM. Sunday: 11:00 AM - 6:00 PM.',
    },
    {
        title: 'Phone & WhatsApp',
        content: 'Call or WhatsApp us for pricing, availability, and custom orders: +91 98765 43210 and +91 98765 43211.',
    },
    {
        title: 'Email Enquiries',
        content: 'For catalogues and custom design briefs: hello@maniratn.com. We usually reply within 24 hours on working days.',
    },
    {
        title: 'Custom Orders & Appointments',
        content: 'Book a custom jewellery consultation at least 3 days in advance. Available Monday to Saturday, 11 AM - 6 PM.',
    },
];

function validate(): boolean {
    const validationErrors: Record<string, string> = {};

    if (!form.value.name.trim()) {
        validationErrors.name = 'Name is required';
    }

    if (!form.value.phone.trim()) {
        validationErrors.phone = 'Phone is required';
    }

    if (!form.value.message.trim()) {
        validationErrors.message = 'Message is required';
    }

    errors.value = validationErrors;

    return Object.keys(validationErrors).length === 0;
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
    form.value = {
        name: '',
        phone: '',
        email: '',
        subject: '',
        message: '',
    };
}
</script>

<template>
    <Head title="Contact — Maniratn Jewellers" />
    <TheNav current-page="contact" />

    <main class="mj-contact-page">
        <section class="mj-contact-hero">
            <div class="mj-contact-hero-inner">
                <span class="mj-contact-kicker">Get in Touch</span>
                <h1>Simple help for every jewellery question.</h1>
                <p>
                    Ask about custom orders, availability, exchange policy, or
                    appointments. Our team replies fast.
                </p>
            </div>
        </section>

        <section class="mj-contact-content">
            <div class="mj-contact-info">
                <div class="mj-contact-info-card">
                    <h2>Visit or call us</h2>
                    <TheAccordion :items="infoAccordion" variant="light" />
                </div>
                <div class="mj-contact-map">Store map preview</div>
            </div>

            <div class="mj-contact-form-card">
                <div v-if="sent" class="mj-contact-thankyou">
                    <h3>Message received</h3>
                    <p>Thank you. We will contact you shortly.</p>
                    <button @click="resetForm" class="mj-btn-crimson">
                        Send another
                    </button>
                </div>

                <form v-else class="mj-contact-form" @submit.prevent="handleSubmit">
                    <h3>Send an enquiry</h3>

                    <div class="mj-contact-grid-two">
                        <div>
                            <label class="mj-label">Name *</label>
                            <input
                                v-model="form.name"
                                class="mj-input mj-input-light"
                                :class="{ 'mj-input-error': errors.name }"
                                placeholder="Your full name"
                            />
                            <span v-if="errors.name" class="mj-field-error">{{
                                errors.name
                            }}</span>
                        </div>
                        <div>
                            <label class="mj-label">Phone *</label>
                            <input
                                v-model="form.phone"
                                class="mj-input mj-input-light"
                                :class="{ 'mj-input-error': errors.phone }"
                                placeholder="+91 00000 00000"
                            />
                            <span v-if="errors.phone" class="mj-field-error">{{
                                errors.phone
                            }}</span>
                        </div>
                    </div>

                    <div>
                        <label class="mj-label">Email</label>
                        <input
                            v-model="form.email"
                            type="email"
                            class="mj-input mj-input-light"
                            placeholder="your@email.com"
                        />
                    </div>

                    <div>
                        <label class="mj-label">Subject</label>
                        <select
                            v-model="form.subject"
                            class="mj-input mj-input-light mj-select"
                        >
                            <option value="">Select a subject...</option>
                            <option
                                v-for="option in subjectOptions"
                                :key="option"
                                :value="option"
                            >
                                {{ option }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="mj-label">Message *</label>
                        <textarea
                            v-model="form.message"
                            class="mj-input mj-input-light"
                            :class="{ 'mj-input-error': errors.message }"
                            rows="5"
                            placeholder="Tell us how we can help..."
                        />
                        <span v-if="errors.message" class="mj-field-error">{{
                            errors.message
                        }}</span>
                    </div>

                    <button type="submit" class="mj-btn-gold mj-contact-submit">
                        Send Message
                    </button>
                </form>
            </div>
        </section>
    </main>

    <TheFooter />
</template>

<style scoped>
.mj-contact-page {
    padding-top: 80px;
    background: var(--mj-cream);
}

.mj-contact-hero {
    padding: 3.5rem 1.25rem 2.5rem;
}

.mj-contact-hero-inner {
    max-width: 72rem;
    margin: 0 auto;
}

.mj-contact-kicker {
    display: inline-block;
    font-family: var(--mj-sans);
    font-size: 0.72rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-gold);
    margin-bottom: 0.75rem;
}

.mj-contact-hero h1 {
    font-family: var(--mj-serif);
    color: var(--mj-ink);
    font-size: clamp(2rem, 5vw, 3.5rem);
    line-height: 1.1;
    margin-bottom: 0.85rem;
}

.mj-contact-hero p {
    max-width: 42rem;
    font-family: var(--mj-sans);
    color: var(--mj-ink-soft);
    line-height: 1.7;
}

.mj-contact-content {
    max-width: 72rem;
    margin: 0 auto;
    padding: 0 1.25rem 4rem;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.25rem;
}

.mj-contact-info,
.mj-contact-form-card {
    border: 1px solid rgba(196, 146, 42, 0.2);
    background: #fff;
    padding: 1.2rem;
}

.mj-contact-info-card h2,
.mj-contact-form h3,
.mj-contact-thankyou h3 {
    font-family: var(--mj-serif);
    color: var(--mj-ink);
    font-size: 1.6rem;
    margin-bottom: 0.9rem;
}

.mj-contact-map {
    margin-top: 1rem;
    border: 1px dashed rgba(196, 146, 42, 0.35);
    background: var(--mj-cream-mid);
    min-height: 9rem;
    display: grid;
    place-items: center;
    color: var(--mj-ink-soft);
    font-family: var(--mj-sans);
    font-size: 0.82rem;
    letter-spacing: 0.1em;
    text-transform: uppercase;
}

.mj-contact-form {
    display: grid;
    gap: 1rem;
}

.mj-input-light {
    color: var(--mj-ink);
    border-bottom-color: rgba(107, 18, 18, 0.2);
}

.mj-input-light::placeholder {
    color: rgba(74, 55, 40, 0.55);
}

.mj-contact-grid-two {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
}

.mj-contact-submit {
    width: 100%;
}

.mj-contact-thankyou {
    min-height: 22rem;
    display: grid;
    place-content: center;
    gap: 0.8rem;
    text-align: center;
}

.mj-contact-thankyou p {
    color: var(--mj-ink-soft);
    font-family: var(--mj-sans);
}

@media (min-width: 900px) {
    .mj-contact-content {
        grid-template-columns: 1fr 1fr;
        gap: 1.6rem;
    }

    .mj-contact-grid-two {
        grid-template-columns: 1fr 1fr;
    }
}
</style>
