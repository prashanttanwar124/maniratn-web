<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed, reactive, ref } from 'vue';
import CustomCursor from '@/components/maniratn/CustomCursor.vue';
import TheFooter from '@/components/maniratn/TheFooter.vue';
import TheNav from '@/components/maniratn/TheNav.vue';

interface StoreInfo {
    name: string;
    tagline: string;
    phone: string;
    address: string;
}

interface CustomerResult {
    id: number;
    name: string;
    mobile: string;
    city?: string;
    dob?: string;
    anniversary_date?: string;
    vault_token?: string;
    vault_url?: string;
}

const props = defineProps<{
    initialCode?: string;
    initialPin?: string;
    store?: StoreInfo;
}>();

const form = reactive({
    token: props.initialCode || '',
    pin: props.initialPin || '',
    name: '',
    mobile: '',
    email: '',
    dob: '',
    anniversary_date: '',
    city: 'Virar',
    address: '',
});

const isSubmitting = ref(false);
const errorMsg = ref('');
const fieldErrors = ref<Record<string, string>>({});
const registeredCustomer = ref<CustomerResult | null>(null);
const vaultUrl = ref<string | null>(null);

const isTokenPrefilled = computed(() => Boolean(props.initialCode && props.initialCode.trim() !== ''));

const cleanMobileInput = (e: Event) => {
    const target = e.target as HTMLInputElement;
    let digits = target.value.replace(/\D/g, '');
    if (digits.length > 10 && digits.startsWith('91')) {
        digits = digits.slice(2);
    }
    if (digits.length > 10) {
        digits = digits.slice(0, 10);
    }
    form.mobile = digits;
};

const submitOnboarding = async () => {
    errorMsg.value = '';
    fieldErrors.value = {};

    if (!form.token || form.token.trim() === '') {
        errorMsg.value = 'Missing counter registration token. Please scan the QR code at the showroom counter.';
        return;
    }

    if (!form.name || form.name.trim().length < 2) {
        fieldErrors.value.name = 'Please enter your full name.';
        return;
    }

    if (!form.mobile || form.mobile.length !== 10) {
        fieldErrors.value.mobile = 'Please enter a valid 10-digit mobile number.';
        return;
    }

    isSubmitting.value = true;

    try {
        const csrfToken = (document.querySelector('meta[name="csrf-token"]') as HTMLMetaElement)?.content || '';

        const res = await fetch('/join', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: JSON.stringify(form),
        });

        const data = await res.json();

        if (res.ok && data?.success) {
            registeredCustomer.value = data.customer;
            vaultUrl.value = data.vault_url || `/vault/${data.customer?.vault_token}`;
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else if (res.status === 401) {
            errorMsg.value = data?.message || 'Invalid or expired counter code. Please scan the QR standee again.';
        } else if (data?.errors) {
            fieldErrors.value = data.errors;
            errorMsg.value = 'Please correct the highlighted fields.';
        } else {
            errorMsg.value = data?.message || 'Registration failed. Please try again.';
        }
    } catch (err: any) {
        errorMsg.value = 'Unable to connect to the store system. Please check with counter staff.';
    } finally {
        isSubmitting.value = false;
    }
};

</script>

<template>
    <Head title="Join Privé VIP Club | Maniratn Jewellers" />
    <CustomCursor />

    <div class="min-h-screen bg-[#070b0a] text-[#f4efe6] selection:bg-[#c4922a] selection:text-[#070b0a] font-sans antialiased">
        <TheNav />

        <main class="relative pt-28 pb-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
            <!-- Background luxury ambient glow -->
            <div class="pointer-events-none absolute -top-20 left-1/2 -translate-x-1/2 w-[600px] h-[500px] bg-[radial-gradient(ellipse_at_center,rgba(196,146,42,0.12),transparent_70%)] blur-3xl"></div>

            <!-- SUCCESS STATE: LUXURY WELCOME & DIGITAL VAULT CARD -->
            <div v-if="registeredCustomer" class="max-w-2xl mx-auto text-center pt-8 pb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-[#c4922a]/40 bg-[#c4922a]/10 text-[#d4a849] text-xs uppercase tracking-[0.25em] font-semibold mb-6 animate-pulse">
                    ✨ Membership Activated
                </div>

                <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-white mb-4">
                    Welcome to <span class="bg-gradient-to-r from-[#e7cb8b] via-[#c4922a] to-[#e7cb8b] bg-clip-text text-transparent">Maniratn Privé</span>
                </h1>

                <p class="text-sm sm:text-base text-neutral-300 max-w-lg mx-auto mb-10 leading-relaxed">
                    Thank you, <strong class="text-white font-semibold">{{ registeredCustomer.name }}</strong>. Your exclusive membership and Smart Digital Gold Vault have been created.
                </p>

                <!-- Digital VIP Pass Card Preview -->
                <div class="relative overflow-hidden rounded-2xl border-2 border-[#c4922a]/60 bg-gradient-to-br from-[#122420] via-[#0d1a17] to-[#070d0b] p-6 sm:p-8 text-left shadow-2xl shadow-black/80 mb-10">
                    <div class="absolute top-0 right-0 w-48 h-48 bg-[radial-gradient(circle_at_top_right,rgba(196,146,42,0.25),transparent_70%)]"></div>
                    <div class="absolute inset-2 border border-[#c4922a]/20 rounded-xl pointer-events-none"></div>

                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <span class="text-[10px] uppercase tracking-[0.3em] text-[#c4922a] font-bold">MANIRATN JEWELLERS</span>
                            <h2 class="text-lg sm:text-xl font-serif font-bold text-white tracking-wider">PRIVÉ VIP CLUB</h2>
                        </div>
                        <div class="w-10 h-10 rounded-full border border-[#c4922a]/50 flex items-center justify-center bg-[#c4922a]/10 text-[#d4a849] text-lg">
                            💎
                        </div>
                    </div>

                    <div class="space-y-1 mb-8">
                        <p class="text-[10px] uppercase tracking-wider text-neutral-400">Cardholder Name</p>
                        <p class="text-xl font-serif font-bold text-white tracking-wide">{{ registeredCustomer.name }}</p>
                        <p class="text-xs text-neutral-400 font-mono">+91 {{ registeredCustomer.mobile }}</p>
                    </div>

                    <div class="flex items-end justify-between border-t border-[#c4922a]/20 pt-4">
                        <div>
                            <p class="text-[9px] uppercase tracking-wider text-neutral-400">Digital Vault Status</p>
                            <p class="text-xs font-semibold text-emerald-400 flex items-center gap-1.5 mt-0.5">
                                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span> Active & Verified
                            </p>
                        </div>
                        <div class="text-right">
                            <p class="text-[9px] uppercase tracking-wider text-neutral-400">Location</p>
                            <p class="text-xs font-medium text-neutral-300">{{ registeredCustomer.city || 'Virar West' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Button to Open Vault -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a
                        v-if="vaultUrl"
                        :href="vaultUrl"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 rounded-xl bg-gradient-to-r from-[#c4922a] via-[#dfb65b] to-[#c4922a] text-[#070b0a] font-bold text-sm tracking-wider uppercase hover:brightness-110 shadow-lg shadow-[#c4922a]/25 transition transform active:scale-95"
                    >
                        <span>🔓 Open My Digital Gold Vault</span>
                    </a>

                    <Link
                        href="/"
                        class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-4 rounded-xl border border-neutral-700 bg-neutral-900/60 text-neutral-300 text-sm font-medium hover:border-neutral-500 hover:text-white transition"
                    >
                        Return to Homepage
                    </Link>
                </div>
            </div>

            <!-- REGISTRATION FORM STATE -->
            <div v-else class="max-w-3xl mx-auto">
                <!-- Header Title -->
                <div class="text-center mb-10">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full border border-[#c4922a]/40 bg-[#c4922a]/10 text-[#d4a849] text-[11px] uppercase tracking-[0.2em] font-semibold mb-4">
                        👑 VIP Walk-in Registration
                    </div>

                    <h1 class="font-serif text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-white mb-3">
                        Join <span class="bg-gradient-to-r from-[#e7cb8b] via-[#c4922a] to-[#e7cb8b] bg-clip-text text-transparent">Maniratn Privé</span>
                    </h1>

                    <p class="text-xs sm:text-sm text-neutral-400 max-w-md mx-auto leading-relaxed">
                        Enjoy your personal Smart Digital Gold Vault, instant GST invoice downloads, lifetime jewellery certificates, and special anniversary rewards.
                    </p>
                </div>

                <!-- Error Notice -->
                <div v-if="errorMsg" class="mb-6 p-4 rounded-xl border border-rose-500/40 bg-rose-950/30 text-rose-200 text-xs flex items-center gap-3">
                    <span class="text-base">⚠️</span>
                    <p class="font-medium">{{ errorMsg }}</p>
                </div>

                <!-- Luxury Registration Card -->
                <div class="relative rounded-2xl border border-[#c4922a]/30 bg-[#0d1412]/90 backdrop-blur-xl p-6 sm:p-10 shadow-2xl shadow-black/80">
                    <form @submit.prevent="submitOnboarding" class="space-y-6">
                        <!-- Secret Token Notice (Hidden or Badge) -->
                        <div v-if="isTokenPrefilled" class="flex items-center justify-between px-4 py-2.5 rounded-lg border border-[#c4922a]/20 bg-[#122420]/40 text-xs">
                            <span class="text-neutral-400 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Verified Showroom Counter Standee
                            </span>
                            <span class="font-mono text-[10px] text-[#c4922a] tracking-wider font-semibold">TOKEN ATTACHED</span>
                        </div>

                        <!-- Manual Token Input if not scanned via QR -->
                        <div v-else class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                Counter QR Secret Token <span class="text-rose-400">*</span>
                            </label>
                            <input
                                v-model="form.token"
                                type="text"
                                placeholder="karatsetu_..."
                                class="w-full px-4 py-3 rounded-lg border border-neutral-700 bg-black/40 text-white font-mono text-xs focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                            />
                            <p class="text-[10px] text-neutral-500">Scan the QR code on our showroom counter standee to auto-fill.</p>
                        </div>

                        <!-- Optional Counter PIN (Only if store asks for it) -->
                        <div v-if="form.pin || !isTokenPrefilled" class="space-y-1.5">
                            <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                Store Counter Code (Optional)
                            </label>
                            <input
                                v-model="form.pin"
                                type="text"
                                maxlength="10"
                                placeholder="e.g. 4123"
                                class="w-full px-4 py-3 rounded-lg border border-neutral-700 bg-black/40 text-white font-mono text-sm focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                            />
                        </div>

                        <!-- Personal Details -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                            <!-- Full Name -->
                            <div class="sm:col-span-2 space-y-1.5">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                    Full Name <span class="text-[#c4922a]">*</span>
                                </label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    required
                                    placeholder="e.g. Rajesh S. Sharma"
                                    class="w-full px-4 py-3.5 rounded-lg border border-neutral-700 bg-black/50 text-white text-sm focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                                />
                                <p v-if="fieldErrors.name" class="text-xs text-rose-400">{{ fieldErrors.name }}</p>
                            </div>

                            <!-- Mobile Number -->
                            <div class="sm:col-span-2 space-y-1.5">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                    Mobile Number <span class="text-[#c4922a]">*</span>
                                </label>
                                <div class="relative flex items-center">
                                    <span class="absolute left-3.5 text-xs font-bold text-[#c4922a] pointer-events-none">+91</span>
                                    <input
                                        :value="form.mobile"
                                        @input="cleanMobileInput"
                                        type="tel"
                                        required
                                        maxlength="10"
                                        placeholder="98XXXXXXXX"
                                        class="w-full pl-14 pr-4 py-3.5 rounded-lg border border-neutral-700 bg-black/50 text-white text-sm font-mono tracking-wider focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                                    />
                                </div>
                                <p v-if="fieldErrors.mobile" class="text-xs text-rose-400">{{ fieldErrors.mobile }}</p>
                                <p class="text-[11px] text-neutral-500">Used for your Digital Vault passbook and WhatsApp invoice delivery.</p>
                            </div>

                            <!-- Birthday -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                    Date of Birth 🎂 (Optional)
                                </label>
                                <input
                                    v-model="form.dob"
                                    type="date"
                                    class="w-full px-4 py-3 rounded-lg border border-neutral-700 bg-black/50 text-white text-xs focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                                />
                                <p class="text-[10px] text-neutral-500">Receive special birthday gold discount vouchers.</p>
                            </div>

                            <!-- Anniversary -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                    Wedding Anniversary 💍 (Optional)
                                </label>
                                <input
                                    v-model="form.anniversary_date"
                                    type="date"
                                    class="w-full px-4 py-3 rounded-lg border border-neutral-700 bg-black/50 text-white text-xs focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                                />
                                <p class="text-[10px] text-neutral-500">Celebrate your anniversary with exclusive rewards.</p>
                            </div>

                            <!-- City -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                    City / Town
                                </label>
                                <input
                                    v-model="form.city"
                                    type="text"
                                    placeholder="e.g. Virar / Mumbai"
                                    class="w-full px-4 py-3 rounded-lg border border-neutral-700 bg-black/50 text-white text-xs focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                                />
                            </div>

                            <!-- Email -->
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold uppercase tracking-wider text-neutral-300">
                                    Email Address (Optional)
                                </label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    placeholder="e.g. rajesh@example.com"
                                    class="w-full px-4 py-3 rounded-lg border border-neutral-700 bg-black/50 text-white text-xs focus:border-[#c4922a] focus:ring-1 focus:ring-[#c4922a] outline-none transition"
                                />
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4 border-t border-neutral-800">
                            <button
                                type="submit"
                                :disabled="isSubmitting"
                                class="w-full py-4 rounded-xl bg-gradient-to-r from-[#c4922a] via-[#e2be6c] to-[#c4922a] text-[#070b0a] font-bold text-sm tracking-wider uppercase hover:brightness-110 shadow-lg shadow-[#c4922a]/20 disabled:opacity-50 disabled:cursor-not-allowed transition transform active:scale-[0.99] flex items-center justify-center gap-2"
                            >
                                <span v-if="isSubmitting" class="w-4 h-4 border-2 border-[#070b0a] border-t-transparent rounded-full animate-spin"></span>
                                <span>{{ isSubmitting ? 'Registering VIP Membership...' : '✨ Activate VIP Pass & Digital Vault' }}</span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- VIP Privileges Info Strip -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
                    <div class="p-4 rounded-xl border border-neutral-800 bg-neutral-950/40 text-center">
                        <div class="text-xl mb-1">🔐</div>
                        <h2 class="text-xs font-bold text-white mb-0.5">Digital Gold Vault</h2>
                        <p class="text-[11px] text-neutral-400 leading-snug">Access all your purchases, HUID hallmarking, and invoices on your phone 24/7.</p>
                    </div>

                    <div class="p-4 rounded-xl border border-neutral-800 bg-neutral-950/40 text-center">
                        <div class="text-xl mb-1">📈</div>
                        <h2 class="text-xs font-bold text-white mb-0.5">Live Portfolio Valuation</h2>
                        <p class="text-[11px] text-neutral-400 leading-snug">Automatic valuation of your jewellery based on today's market gold rates.</p>
                    </div>

                    <div class="p-4 rounded-xl border border-neutral-800 bg-neutral-950/40 text-center">
                        <div class="text-xl mb-1">🎁</div>
                        <h2 class="text-xs font-bold text-white mb-0.5">Anniversary Privileges</h2>
                        <p class="text-[11px] text-neutral-400 leading-snug">Special making charge discounts and festive gift surprises on your special days.</p>
                    </div>
                </div>
            </div>
        </main>

        <TheFooter />
    </div>
</template>
