<script setup lang="ts">
const footerCols = [
    {
        title: 'Shop',
        links: ['All Collections', 'Bridal', 'Temple Jewellery', 'Daily Wear'],
    },
    {
        title: 'About',
        links: ['Our Story', 'Craftsmanship', 'Certifications', 'Care Guide'],
    },
    {
        title: 'Support',
        links: ['Contact Us', 'Custom Orders', 'Exchange Policy', 'FAQs'],
    },
];
</script>

<template>
    <footer class="mj-footer">
        <div class="mj-footer-inner">
            <div class="mj-footer-brand">
                <span class="mj-footer-logo">Maniratn</span>
                <span class="mj-footer-sub">Jewellers</span>
                <span class="mj-footer-since">Since 2007</span>
                <p>
                    Trusted jewellery partner for everyday elegance, bridal
                    celebrations, and custom heirloom design.
                </p>
            </div>

            <div v-for="column in footerCols" :key="column.title" class="mj-footer-col">
                <h4>{{ column.title }}</h4>
                <span v-for="link in column.links" :key="link" class="mj-footer-link">{{
                    link
                }}</span>
            </div>
        </div>

        <div class="mj-footer-bottom">
            <span>© 2026 Maniratn Jewellers</span>
            <span>BIS Hallmarked · Transparent Pricing</span>
        </div>
    </footer>
</template>

<style scoped>
.mj-footer {
    background: var(--mj-cream-mid);
    border-top: 1px solid rgba(196, 146, 42, 0.25);
    padding: 2.5rem 1.2rem 1.4rem;
}

.mj-footer-inner {
    width: 100%;
    display: grid;
    grid-template-columns: 1fr;
    gap: 1.5rem;
}

.mj-footer-brand {
    max-width: 22rem;
}

.mj-footer-logo {
    display: block;
    font-family: var(--mj-serif);
    font-size: 1.7rem;
    color: var(--mj-crimson);
    line-height: 1;
}

.mj-footer-sub {
    display: block;
    margin-top: 0.1rem;
    font-family: var(--mj-sans);
    font-size: 0.82rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-gold);
}

.mj-footer-since {
    display: block;
    margin-top: 0.18rem;
    font-family: var(--mj-sans);
    font-size: 0.62rem;
    letter-spacing: 0.25em;
    text-transform: uppercase;
    color: var(--mj-ink-soft);
}

.mj-footer-brand p {
    margin-top: 0.9rem;
    color: var(--mj-ink-soft);
    font-family: var(--mj-sans);
    line-height: 1.7;
    font-size: 0.9rem;
}

.mj-footer-col {
    display: grid;
    gap: 0.45rem;
}

.mj-footer-col h4 {
    font-family: var(--mj-sans);
    font-size: 0.7rem;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    color: var(--mj-gold);
    margin-bottom: 0.15rem;
}

.mj-footer-link {
    font-family: var(--mj-sans);
    font-size: 0.88rem;
    color: var(--mj-ink-mid);
}

.mj-footer-bottom {
    width: 100%;
    margin: 1.5rem 0 0;
    padding-top: 1rem;
    border-top: 1px solid rgba(196, 146, 42, 0.2);
    display: flex;
    flex-direction: column;
    gap: 0.3rem;
    color: var(--mj-ink-soft);
    font-family: var(--mj-sans);
    font-size: 0.74rem;
}

@media (min-width: 900px) {
    .mj-footer {
        padding-inline: 2rem;
    }

    .mj-footer-inner {
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 2rem;
    }

    .mj-footer-bottom {
        flex-direction: row;
        justify-content: space-between;
    }
}
</style>
