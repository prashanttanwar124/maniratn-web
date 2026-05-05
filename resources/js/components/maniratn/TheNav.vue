<script setup lang="ts">
import { router } from '@inertiajs/vue3';
import gsap from 'gsap';
import { onMounted, onUnmounted, ref, watch } from 'vue';
import { about, collections, contact, home } from '@/routes';

defineProps<{
    currentPage: string;
    heroVariant?: 'dark' | 'light';
}>();

const menuOpen = ref(false);
const scrolled = ref(false);

const navItems = [
    { label: 'Home', key: 'home' },
    { label: 'Collections', key: 'collections' },
    { label: 'About', key: 'about' },
];

function resolveRoute(page: string) {
    switch (page) {
        case 'collections': return collections();
        case 'about': return about();
        case 'contact': return contact();
        default: return home();
    }
}

function navigate(page: string): void {
    menuOpen.value = false;
    router.visit(resolveRoute(page));
    window.scrollTo(0, 0);
}

function syncScrollState(): void {
    scrolled.value = window.scrollY > 12;
}

watch(menuOpen, (isOpen) => {
    document.body.style.overflow = isOpen ? 'hidden' : '';
});

onMounted(() => {
    syncScrollState();
    window.addEventListener('scroll', syncScrollState, { passive: true });

    gsap.fromTo('.mj-navbar',
        { y: -10, opacity: 0 },
        { y: 0, opacity: 1, duration: 0.6, ease: 'power3.out' }
    );
});

onUnmounted(() => {
    document.body.style.overflow = '';
    window.removeEventListener('scroll', syncScrollState);
});
</script>

<template>
    <!-- Thin gold top accent bar -->
    <div class="mj-topbar" :class="{ 'is-scrolled': scrolled }"></div>

    <header
        class="mj-navbar"
        :class="[
            `mj-navbar-${heroVariant ?? 'dark'}`,
            {
                'is-menu-open': menuOpen,
                'is-scrolled': scrolled,
            },
        ]"
    >
        <!-- Left links -->
        <nav class="mj-nav-left">
            <button
                v-for="item in navItems"
                :key="item.key"
                type="button"
                class="mj-nav-link"
                :class="{ active: currentPage === item.key }"
                @click="navigate(item.key)"
            >{{ item.label }}</button>
        </nav>

        <!-- Center brand -->
        <button class="mj-nav-brand" type="button" @click="navigate('home')">
            <img
                src="/logo.png"
                alt="Maniratn Jewellers"
                class="mj-brand-logo"
                :class="{ 'is-scrolled-logo': scrolled }"
            />
        </button>

        <!-- Right actions -->
        <div class="mj-nav-right">
            <button
                type="button"
                class="mj-nav-link"
                :class="{ active: currentPage === 'contact' }"
                @click="navigate('contact')"
            >Contact</button>
            <button type="button" class="mj-nav-cta" @click="navigate('contact')">
                Visit Store
            </button>
        </div>

        <!-- Mobile toggle -->
        <button
            type="button"
            class="mj-mobile-toggle"
            :aria-expanded="menuOpen"
            @click="menuOpen = !menuOpen"
        >
            <span class="mj-toggle-bar" :class="{ open: menuOpen }"></span>
            <span class="mj-toggle-bar" :class="{ open: menuOpen }"></span>
            <span class="mj-toggle-bar" :class="{ open: menuOpen }"></span>
        </button>
    </header>

    <!-- Mobile drawer -->
    <transition name="mj-drawer">
        <div v-if="menuOpen" class="mj-drawer-overlay" @click.self="menuOpen = false">
            <nav class="mj-drawer-panel">
                <div class="mj-drawer-brand">
                    <img src="/logo.png" alt="Maniratn Jewellers" class="mj-drawer-logo" />
                </div>
                <div class="mj-drawer-links">
                    <button
                        v-for="item in [...navItems, { label: 'Contact', key: 'contact' }]"
                        :key="item.key"
                        type="button"
                        class="mj-drawer-link"
                        :class="{ active: currentPage === item.key }"
                        @click="navigate(item.key)"
                    >
                        <svg width="6" height="6" viewBox="0 0 8 8"><rect x="4" y="0" width="4" height="4" transform="rotate(45 4 4)" fill="#C4922A" /></svg>
                        {{ item.label }}
                    </button>
                </div>
                <button type="button" class="mj-drawer-cta" @click="navigate('contact')">
                    Book a Visit
                </button>
            </nav>
        </div>
    </transition>
</template>

<style scoped>
/* ── Top accent bar ──────────────────────────────────── */
.mj-topbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 2px;
    background: linear-gradient(90deg, transparent 0%, #C4922A 30%, #E8C96D 50%, #C4922A 70%, transparent 100%);
    z-index: 102;
    transition: opacity 0.35s ease;
}

.mj-topbar.is-scrolled {
    opacity: 0.92;
}

/* ── Main navbar ─────────────────────────────────────── */
.mj-navbar {
    position: fixed;
    top: 2px;
    left: 0;
    right: 0;
    z-index: 101;
    height: 84px;
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    padding: 0 48px;
    background: transparent;
    border-bottom: 1px solid transparent;
    transition:
        background 0.35s ease,
        border-bottom-color 0.35s ease,
        box-shadow 0.35s ease,
        height 0.35s ease,
        backdrop-filter 0.35s ease;
}

.mj-navbar.is-scrolled,
.mj-navbar.is-menu-open {
    height: 74px;
    backdrop-filter: blur(18px);
    background: rgba(26, 10, 6, 0.86);
    border-bottom-color: rgba(196, 146, 42, 0.28);
    box-shadow: 0 18px 40px rgba(26, 10, 6, 0.16);
}

/* ── Left nav links ──────────────────────────────────── */
.mj-nav-left {
    display: flex;
    align-items: center;
    gap: 32px;
}

.mj-nav-link {
    border: none;
    background: transparent;
    cursor: pointer;
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    font-weight: 400;
    color: rgba(253,248,240,0.72);
    padding-bottom: 3px;
    border-bottom: 1px solid transparent;
    transition: color 0.22s, border-color 0.22s;
    white-space: nowrap;
}
.mj-nav-link:hover,
.mj-nav-link.active {
    color: #E8C96D;
    border-bottom-color: #E8C96D;
}

/* ── Light variant (cream pages) ─────────────────────── */
.mj-navbar-light .mj-nav-link {
    color: rgba(74,55,40,0.72);
    font-weight: 500;
}
.mj-navbar-light .mj-nav-link:hover,
.mj-navbar-light .mj-nav-link.active {
    color: var(--mj-crimson);
    border-bottom-color: var(--mj-gold);
}
.mj-navbar-light .mj-nav-cta {
    border-color: rgba(196,146,42,0.55);
    background: rgba(255,255,255,0.4);
    color: var(--mj-ink);
}
.mj-navbar-light .mj-nav-cta:hover {
    background: var(--mj-crimson);
    border-color: var(--mj-crimson);
    color: var(--mj-cream);
}
.mj-navbar-light .mj-toggle-bar {
    background: rgba(26,15,10,0.78);
}

.mj-navbar-light.is-scrolled,
.mj-navbar-light.is-menu-open {
    background: rgba(253, 248, 240, 0.9);
}

/* ── Center brand ────────────────────────────────────── */
.mj-nav-brand {
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    background: transparent;
    cursor: pointer;
    padding: 0 16px;
    flex-shrink: 0;
}

.mj-brand-logo {
    height: 76px;
    width: auto;
    max-width: 200px;
    object-fit: contain;
    display: block;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
    transition: height 0.35s ease, opacity 0.2s;
}

.mj-brand-logo.is-scrolled-logo {
    height: 62px;
}

.mj-nav-brand:hover .mj-brand-logo { opacity: 0.85; }

/* ── Right actions ───────────────────────────────────── */
.mj-nav-right {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 28px;
}

.mj-nav-cta {
    border: 1px solid rgba(232,201,109,0.45);
    background: rgba(253,248,240,0.08);
    color: rgba(253,248,240,0.85);
    cursor: pointer;
    font-family: var(--mj-sans);
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    padding: 9px 20px;
    transition: all 0.22s ease;
    white-space: nowrap;
}
.mj-nav-cta:hover {
    background: var(--mj-gold);
    border-color: var(--mj-gold);
    color: var(--mj-crimson-dark);
}

/* ── Mobile toggle (hamburger) ───────────────────────── */
.mj-mobile-toggle {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    border: none;
    background: transparent;
    cursor: pointer;
    padding: 4px;
    grid-column: 3;
    justify-self: end;
}
.mj-toggle-bar {
    display: block;
    width: 22px;
    height: 1.5px;
    background: rgba(253,248,240,0.8);
    transition: transform 0.25s ease, opacity 0.25s ease, width 0.25s ease;
    transform-origin: center;
}
.mj-toggle-bar:nth-child(2).open { opacity: 0; }
.mj-toggle-bar:nth-child(1).open { transform: translateY(6.5px) rotate(45deg); }
.mj-toggle-bar:nth-child(3).open { transform: translateY(-6.5px) rotate(-45deg); }

/* ── Mobile drawer ───────────────────────────────────── */
.mj-drawer-overlay {
    position: fixed;
    inset: 0;
    z-index: 99;
    background: rgba(26,10,6,0.55);
    backdrop-filter: blur(3px);
}
.mj-drawer-panel {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    width: min(320px, 88vw);
    background: var(--mj-cream);
    border-left: 1px solid rgba(196,146,42,0.2);
    display: flex;
    flex-direction: column;
    padding: 40px 28px 32px;
    gap: 0;
}
.mj-drawer-brand {
    padding-bottom: 24px;
    border-bottom: 1px solid rgba(196,146,42,0.15);
    margin-bottom: 28px;
}
.mj-drawer-logo {
    height: 72px;
    width: auto;
    max-width: 200px;
    object-fit: contain;
    display: block;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}
.mj-drawer-links {
    display: flex;
    flex-direction: column;
    gap: 2px;
    flex: 1;
}
.mj-drawer-link {
    display: flex;
    align-items: center;
    gap: 12px;
    border: none;
    background: transparent;
    text-align: left;
    padding: 14px 4px;
    font-family: var(--mj-sans);
    font-size: 12px;
    letter-spacing: 0.18em;
    text-transform: uppercase;
    color: var(--mj-ink-mid);
    border-bottom: 1px solid rgba(196,146,42,0.1);
    cursor: pointer;
    transition: color 0.2s, padding-left 0.2s;
}
.mj-drawer-link:hover,
.mj-drawer-link.active {
    color: var(--mj-crimson);
    padding-left: 8px;
}
.mj-drawer-cta {
    margin-top: 24px;
    width: 100%;
    padding: 14px;
    background: var(--mj-crimson);
    border: none;
    color: var(--mj-cream);
    font-family: var(--mj-sans);
    font-size: 11px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s;
}
.mj-drawer-cta:hover { background: var(--mj-crimson-dark); }

/* ── Drawer transition ───────────────────────────────── */
.mj-drawer-enter-active,
.mj-drawer-leave-active { transition: opacity 0.25s ease; }
.mj-drawer-enter-active .mj-drawer-panel,
.mj-drawer-leave-active .mj-drawer-panel { transition: transform 0.3s ease; }
.mj-drawer-enter-from,
.mj-drawer-leave-to { opacity: 0; }
.mj-drawer-enter-from .mj-drawer-panel,
.mj-drawer-leave-to .mj-drawer-panel { transform: translateX(100%); }

/* ── Responsive ──────────────────────────────────────── */
@media (max-width: 900px) {
    .mj-navbar { padding: 0 24px; grid-template-columns: auto 1fr auto; }
    .mj-nav-left, .mj-nav-right { display: none; }
    .mj-nav-brand { padding: 0 12px; justify-self: center; }
    .mj-mobile-toggle { display: flex; }
    .mj-brand-logo { height: 56px; }
    .mj-brand-logo.is-scrolled-logo { height: 44px; }
}

@media (max-width: 480px) {
    .mj-navbar { padding: 0 16px; }
}
</style>
