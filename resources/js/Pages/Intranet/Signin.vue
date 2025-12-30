<script setup>
    import SigninLayout from '@shared/Layouts/Intranet/Signin.vue';
    import { useForm, usePage } from '@inertiajs/vue3';
    import { computed } from 'vue'

    defineOptions({
        layout: SigninLayout
    });

    defineProps({
        errors: Object
    });

    const r2Endpoint = import.meta.env.VITE_R2_ENDPOINT;
    const errors = computed(() => usePage().props.errors)

    let form = useForm({
        email: '',
        password: ''
    });

    const submit = () => {
        form.post('/auth', {
            preserveScroll: true,
            onSuccess: () => {
                location.replace('/intranet');
            }
        });
    }
</script>

<template>
    <div class="flex min-h-screen w-full flex-row overflow-hidden">
        <div class="hidden lg:flex w-1/2 relative flex-col justify-between bg-surface-dark overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center opacity-60 transition-opacity"
                data-alt="Modern high-rise corporate building glass facade reflecting blue sky"
                style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBr1Scu_G_Ujjhl0F0KLGXmDWLOWQiuJkhnlpMAgmT8Xbta8RLacwxFq-5XITCTa4ykUNiC03iYZbOvejXeSMH9FoRIU8x4mz5rxu3TXTtaqNoGHskCnpsgNn_VYVC6PqA1wW1a7JezX2mF58pve4HrlJYL3UZ_DCBCF8evt-Anza1LapYf0PbtSIjOcAaaL1IfMk-BCEyhJf_A6tKtQewswexSMBN6w0ykPJJ9H724lVkORDYoFs_hNNvO2KdW4wm_G7bFqOV8mAqw');"></div>
            <div class="absolute inset-0 bg-gradient-to-br from-primary/90 to-background-dark/95"></div>
            <div class="relative z-10 px-12 py-10 flex items-center gap-4 text-white">
                <div class="h-[64px]">
                    <img :src="`${r2Endpoint}/images/brands/logo-banner-white.png`" class="h-full w-auto object-contain" alt="Logo">
                </div>
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
                        <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10"
                            data-alt="Portrait of a ng yuin harng financial advisor"
                            :style="{backgroundImage: `url(${r2Endpoint}/images/leaders/ng-yuin-harng.jpg)`}"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10"
                            data-alt="Portrait of a poh liang liah financial advisor"
                            :style="{backgroundImage: `url(${r2Endpoint}/images/leaders/poh-liang-liah.jpg)`}"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10"
                            data-alt="Portrait of a cammie tan financial advisor"
                            :style="{backgroundImage: `url(${r2Endpoint}/images/leaders/cammie-tan.jpg)`}"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10"
                            data-alt="Portrait of a jerry goh financial advisor"
                            :style="{backgroundImage: `url(${r2Endpoint}/images/leaders/jerry-goh.jpg)`}"></div>
                        <div class="w-12 h-12 rounded-full border-2 border-primary bg-gray-300 bg-cover bg-center ring-2 ring-white/10"
                            data-alt="Portrait of a rachel phua financial advisor"
                            :style="{backgroundImage: `url(${r2Endpoint}/images/leaders/rachel-phua.jpg)`}"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-white text-base font-bold">2,000+ Advisors</span>
                        <span class="text-gray-300 text-sm font-medium">Trust FinArk for growth</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-6 sm:p-12 lg:p-24 bg-surface-light dark:bg-background-dark relative">
            <div class="lg:hidden absolute top-8 left-8 flex items-center gap-3 text-text-main dark:text-white">
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
            <div class="w-full max-w-[420px] flex flex-col gap-8">
                <div class="flex flex-col gap-2 mb-2">
                    <p class="text-text-main dark:text-white tracking-tight text-3xl font-bold leading-tight">Welcome back</p>
                    <p class="text-text-secondary dark:text-gray-400 text-base font-normal leading-relaxed">Sign in to access your dashboard and manage your portfolio.</p>
                </div>
                <div class="w-full bg-red-50 dark:bg-red-900/10 border border-red-200 dark:border-red-900/20 rounded-lg p-4 flex gap-3 animate-[fadeIn_0.3s_ease-out]" v-show="errors?.auth || errors?.email">
                    <span class="material-symbols-outlined text-red-600 dark:text-red-400 shrink-0">error</span>
                    <div class="flex flex-col gap-1">
                        <h3 class="text-sm font-bold text-red-900 dark:text-red-200">Invalid credentials</h3>
                        <p class="text-sm text-red-700 dark:text-red-300 leading-snug">{{ errors.email ?? errors.auth }}</p>
                    </div>
                </div>
                <form class="flex flex-col gap-5" @submit.prevent="submit()">
                    <label class="flex flex-col w-full gap-2">
                        <span class="text-text-main dark:text-white text-sm font-semibold leading-normal">Email or Username</span>
                        <input
                            class="form-input flex w-full resize-none overflow-hidden rounded-lg text-text-main dark:text-white bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark focus:border-primary focus:ring-4 focus:ring-primary/10 h-12 placeholder:text-text-secondary/60 p-3 text-base font-medium transition-all" required type="text"
                            placeholder="advisor@finark.com" 
                            v-model="form.email" />
                    </label>
                    <label class="flex flex-col w-full gap-2">
                        <div class="flex justify-between items-center">
                            <span class="text-text-main dark:text-white text-sm font-semibold leading-normal">Password</span>
                            <a class="text-sm font-semibold text-primary hover:text-primary-hover hover:underline transition-all" href="#">Forgot Password?</a>
                        </div>
                        <div class="flex w-full items-stretch rounded-lg relative">
                            <input class="form-input flex w-full resize-none overflow-hidden rounded-lg text-text-main dark:text-white bg-white dark:bg-surface-dark border border-border-light dark:border-border-dark focus:border-primary focus:ring-4 focus:ring-primary/10 h-12 placeholder:text-text-secondary/60 p-3 pr-12 text-base font-medium transition-all" required type="password"
                            placeholder="Enter your password" 
                            v-model="form.password" />
                            <div class="absolute right-0 top-0 h-full flex items-center justify-center pr-3">
                                <button class="text-text-secondary hover:text-primary transition-colors cursor-pointer flex items-center justify-center p-1.5 rounded-full hover:bg-background-light dark:hover:bg-white/5" type="button">
                                    <span class="material-symbols-outlined text-[20px]">visibility</span>
                                </button>
                            </div>
                        </div>
                    </label>
                    <div class="flex items-center gap-3 py-1">
                        <label class="flex items-center gap-2.5 cursor-pointer group select-none">
                        <div class="relative flex items-center">
                            <input class="peer sr-only form-checkbox" type="checkbox"/>
                            <div class="w-5 h-5 border-2 border-border-light dark:border-border-dark rounded bg-white dark:bg-surface-dark peer-checked:bg-primary peer-checked:border-primary transition-all"></div>
                            <span class="material-symbols-outlined absolute left-0 top-0 text-white text-[16px] opacity-0 peer-checked:opacity-100 pointer-events-none transition-opacity ml-[2px] mt-[2px]">check</span>
                        </div>
                        <span class="text-sm font-medium text-text-secondary group-hover:text-text-main dark:group-hover:text-white transition-colors">Remember me for 30 days</span>
                        </label>
                    </div>
                    <button class="group flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-primary hover:bg-primary-hover active:scale-[0.99] transition-all text-white text-base font-bold leading-normal tracking-[0.01em] shadow-lg shadow-primary/25 hover:shadow-primary/40 mt-2"  @click.prevent="submit()">
                        <span class="group-hover:translate-x-[-2px] transition-transform">Log In</span>
                        <span class="material-symbols-outlined text-[20px] ml-2 opacity-0 -translate-x-2 group-hover:opacity-100 group-hover:translate-x-0 transition-all duration-300">arrow_forward</span>
                    </button>
                </form>
                <div class="flex flex-col items-center gap-6 mt-6">
                    <div class="w-full h-px bg-border-light dark:bg-border-dark relative">
                        <span class="absolute left-1/2 -translate-x-1/2 -top-2.5 bg-surface-light dark:bg-background-dark px-3 text-xs text-text-secondary font-semibold tracking-wider">NEW ADVISOR?</span>
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
</template>
