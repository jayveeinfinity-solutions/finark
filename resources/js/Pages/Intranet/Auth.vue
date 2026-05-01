<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const showPassword = ref(false);

const submit = () => {
    form.post(route('intranet.login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Intranet Auth" />
    
    <div class="font-display bg-background-light dark:bg-background-dark text-text-main dark:text-white transition-colors duration-200 antialiased selection:bg-primary/20 selection:text-primary">
        <div class="flex min-h-screen w-full flex-col lg:flex-row overflow-y-auto lg:overflow-hidden">
            <!-- Left Side: Image/Branding (Hidden on mobile) -->
            <div class="hidden lg:flex w-1/2 relative flex-col justify-between bg-surface-dark overflow-hidden">
                <div class="absolute inset-0 bg-cover bg-center opacity-60 mix-blend-overlay transition-opacity" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBr1Scu_G_Ujjhl0F0KLGXmDWLOWQiuJkhnlpMAgmT8Xbta8RLacwxFq-5XITCTa4ykUNiC03iYZbOvejXeSMH9FoRIU8x4mz5rxu3TXTtaqNoGHskCnpsgNn_VYVC6PqA1wW1a7JezX2mF58pve4HrlJYL3UZ_DCBCF8evt-Anza1LapYf0PbtSIjOcAaaL1IfMk-BCEyhJf_A6tKtQewswexSMBN6w0ykPJJ9H724lVkORDYoFs_hNNvO2KdW4wm_G7bFqOV8mAqw');"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-primary/90 to-background-dark/95"></div>
                
                <div class="relative z-10 px-12 py-10 flex items-center gap-4 text-white">
                    <div class="size-8">
                        <svg class="w-full h-full text-white fill-current" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_6_535)">
                                <path clip-rule="evenodd" d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z" fill-rule="evenodd"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_6_535"><rect height="48" width="48"></rect></clipPath>
                            </defs>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold leading-tight tracking-[-0.015em]">FinArk</h2>
                </div>

                <div class="relative z-10 px-12 pb-24 max-w-xl">
                    <h1 class="text-white text-5xl font-extrabold leading-[1.1] tracking-[-0.02em] mb-6 drop-shadow-sm">
                        Empowering Advisors
                    </h1>
                    <p class="text-gray-200 text-lg font-normal leading-relaxed opacity-90 mb-12">
                        Your gateway to financial knowledge, video courses, and OKR tracking. Join the platform designed for modern financial success.
                    </p>
                    <div class="flex items-center gap-4 pt-8 border-t border-white/10">
                        <div class="flex -space-x-4">
                            <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCwVO16z4yEKwCmMFFuAy9cBEnksRFSM71xl_z73_bCz9guvQjYGRQnurseyzP4oSFuHg9gAWD8reZfULO9WcOgpMRSXUYvxOzqQZtux3194Dy-0S3vN_A69Y4wRNRqQmGsndsrIB7sQ32glVLvaEQb0TA7-iDIvGJBSnUHhFvsWb37uzq7PVg9Ua6L-96MMOtUNkvicvTU_H0Ep02Bprpjy2A1liPmFTe6KQf4au3VhTVGAR4jnvvrGdYLDtJyM2YKehL00p98w7vg');"></div>
                            <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuB55-HJqqwMQaDwPx7Cd_D8qh-blEVw_-h4BHM9QWOGN6Bfmg583sJqzmfsUe8GqhNJ_iMcJVwwAXQbWZEGAir2AfVn6aXEojipSsOTTTc_g3hp-m-EFX_kjJMlKyVGyEXkf0596_uBFTtMgMPAkNTI70DNIF0lCZQ0bDpul3E5WA5o27a-lPnnbf8fCkJjsypU9e48r8MfptnXG15TNKaFwYrcSNwu9ZawN5hj2HzgA5e5Sgk8t3XtiNnimjzitrlpTjVmPB7fh-2h');"></div>
                            <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBRnt1PHJGDpjO6vvP5t9gTcCbhqlAr21cSSjcv7oyJuzSTuyvaPe2rmQttnPZYqD5wap182SGfHAb1OvH3JBrwcmTRj1b30AedXcx0yDUGYpl8Wp5JPSqYEw3vTguXFOYuKSmuuMSO4-vwyeOn7c62bBr_85WKPtGDHArG40T8OqwP1oKVmUhYvQD7SRU0jCmoFdpFKqhvKw1wrVTcZWnwn6edfSmtivm41W6pfEVR0oojYaEnxnfHZyWgSmNS85ISuVd_Bh0_575U');"></div>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-white text-base font-bold">2,000+ Advisors</span>
                            <span class="text-gray-300 text-sm font-medium">Trust FinArk for growth</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Auth Form -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-6 sm:p-12 lg:p-24 bg-surface-light dark:bg-background-dark relative">
                <div class="lg:hidden flex items-center justify-center gap-3 text-text-main dark:text-white mb-8">
                    <div class="size-7 text-primary">
                        <svg class="w-full h-full fill-current" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_mobile)">
                                <path clip-rule="evenodd" d="M47.2426 24L24 47.2426L0.757355 24L24 0.757355L47.2426 24ZM12.2426 21H35.7574L24 9.24264L12.2426 21Z" fill-rule="evenodd"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_mobile"><rect height="48" width="48"></rect></clipPath>
                            </defs>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">FinArk</h2>
                </div>

                <div class="w-full max-w-[420px] flex flex-col gap-6">
                    <div class="flex flex-col gap-2 mb-2">
                        <h1 class="text-text-main dark:text-white tracking-tight text-3xl font-bold leading-tight">Intranet Access</h1>
                        <p class="text-text-secondary dark:text-gray-400 text-base font-normal leading-relaxed">Sign in with your advisor credentials to access the internal platform.</p>
                    </div>

                    <!-- Error Alert -->
                    <div v-if="form.errors.email" class="w-full bg-red-50 dark:bg-red-900/10 border border-red-200 dark:border-red-900/20 rounded-lg p-4 flex gap-3 animate-in fade-in duration-300">
                        <span class="material-symbols-outlined text-red-600 dark:text-red-400 shrink-0">error</span>
                        <div class="flex flex-col gap-1">
                            <h3 class="text-sm font-bold text-red-900 dark:text-red-200">Authentication failed</h3>
                            <p class="text-sm text-red-700 dark:text-red-300 leading-snug">{{ form.errors.email }}</p>
                        </div>
                    </div>

                    <form @submit.prevent="submit" class="flex flex-col gap-5">
                        <label class="flex flex-col w-full gap-2">
                            <span class="text-text-main dark:text-white text-sm font-semibold leading-normal">Email Address</span>
                            <div class="relative">
                                <input 
                                    v-model="form.email"
                                    type="email" 
                                    class="flex w-full rounded-lg bg-white dark:bg-surface-dark border h-12 px-3 text-base font-medium transition-all focus:ring-4 focus:ring-primary/10"
                                    :class="form.errors.email ? 'border-red-500 text-red-900 dark:text-red-200 focus:border-red-600' : 'border-border-light dark:border-border-dark border-gray-300 focus:border-primary'"
                                    placeholder="advisor@finark.com" 
                                    required
                                />
                                <div v-if="form.errors.email" class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <span class="material-symbols-outlined text-red-500 text-[20px]">warning</span>
                                </div>
                            </div>
                        </label>

                        <label class="flex flex-col w-full gap-2">
                            <div class="flex justify-between items-center">
                                <span class="text-text-main dark:text-white text-sm font-semibold leading-normal">Password</span>
                                <a class="text-sm font-semibold text-primary hover:text-primary-hover hover:underline transition-all" href="#">Forgot Password?</a>
                            </div>
                            <div class="flex w-full items-stretch rounded-lg relative">
                                <input 
                                    v-model="form.password"
                                    :type="showPassword ? 'text' : 'password'"
                                    class="flex w-full rounded-lg bg-white dark:bg-surface-dark border h-12 px-3 pr-12 text-base font-medium transition-all focus:ring-4 focus:ring-primary/10"
                                    :class="form.errors.email ? 'border-red-500 text-red-900 dark:text-red-200 focus:border-red-600' : 'border-border-light dark:border-border-dark border-gray-300 focus:border-primary'"
                                    placeholder="Enter your password" 
                                    required
                                />
                                <div class="absolute right-0 top-0 h-full flex items-center justify-center pr-3">
                                    <button 
                                        @click="showPassword = !showPassword"
                                        type="button"
                                        class="text-text-secondary hover:text-primary transition-colors cursor-pointer flex items-center justify-center p-1.5 rounded-full hover:bg-background-light dark:hover:bg-white/5"
                                    >
                                        <span class="material-symbols-outlined text-[20px]">{{ showPassword ? 'visibility_off' : 'visibility' }}</span>
                                    </button>
                                </div>
                            </div>
                        </label>

                        <div class="flex items-center gap-3 py-1">
                            <label class="flex items-center gap-2.5 cursor-pointer group select-none">
                                <div class="relative flex items-center">
                                    <input 
                                        v-model="form.remember"
                                        type="checkbox" 
                                        class="peer sr-only"
                                    />
                                    <div class="w-5 h-5 border-2 border-border-light dark:border-border-dark rounded bg-white dark:bg-surface-dark peer-checked:bg-primary peer-checked:border-primary transition-all"></div>
                                    <span class="material-symbols-outlined absolute left-0 top-0 text-white text-[16px] opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity ml-[2px] mt-[2px]">check</span>
                                </div>
                                <span class="text-sm font-medium text-text-secondary group-hover:text-text-main dark:group-hover:text-white transition-colors">Remember me for 30 days</span>
                            </label>
                        </div>

                        <button 
                            type="submit"
                            :disabled="form.processing"
                            class="group flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary hover:bg-primary-hover active:scale-[0.99] transition-all text-white text-base font-bold leading-normal tracking-[0.01em] shadow-lg shadow-primary/25 hover:shadow-primary/40 mt-2 disabled:opacity-50"
                        >
                            <span class="group-hover:translate-x-[-2px] transition-transform">Log In</span>
                            <span class="material-symbols-outlined text-[20px] ml-2 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">arrow_forward</span>
                        </button>
                    </form>

                    <div class="flex flex-col items-center gap-6 mt-6">
                        <div class="w-full h-px bg-border-light dark:bg-border-dark relative">
                            <span class="absolute left-1/2 -translate-x-1/2 -top-2.5 bg-surface-light dark:bg-background-dark px-3 text-xs text-text-secondary font-semibold tracking-wider uppercase">New Advisor?</span>
                        </div>
                        <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 border-2 border-border-light dark:border-border-dark hover:border-primary/30 hover:bg-background-light dark:hover:bg-white/5 transition-all text-text-main dark:text-white text-base font-bold leading-normal">
                            <span class="truncate">Request Platform Access</span>
                        </button>
                        <div class="flex items-center gap-2 text-text-secondary/60 text-xs font-semibold uppercase tracking-wider mt-4">
                            <span class="material-symbols-outlined text-[16px] text-green-600">lock</span>
                            <span>Secure 256-bit SSL Encryption</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Any specific local styles */
</style>
