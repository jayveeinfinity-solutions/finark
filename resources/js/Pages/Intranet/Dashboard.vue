<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth?.user);
</script>

<template>
    <Head title="Intranet Dashboard" />

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-[#1034A7] to-[#1B3768] rounded-[2rem] p-10 text-white shadow-2xl relative overflow-hidden">
            <div class="relative z-10 flex flex-col gap-4 max-w-2xl">
                <div class="flex items-center gap-3">
                    <span class="px-4 py-1.5 rounded-full bg-white/20 text-white text-xs font-bold uppercase tracking-wider backdrop-blur-md border border-white/10">Welcome Back</span>
                </div>
                <h1 class="text-5xl font-extrabold tracking-tight leading-tight">
                    Hello, <span class="text-white/80 italic font-medium">{{ user?.name || 'Advisor' }}</span>
                </h1>
                <p class="text-white/70 text-lg leading-relaxed font-medium">
                    Your portal for growth, performance tracking, and advisor resources is ready. Let's make today productive.
                </p>
                <div class="flex gap-4 mt-4">
                    <button class="px-8 py-3.5 rounded-2xl bg-white text-[#1034A7] font-bold text-sm shadow-xl hover:scale-105 transition-transform active:scale-95">View Performance</button>
                    <button class="px-8 py-3.5 rounded-2xl bg-white/10 text-white font-bold text-sm backdrop-blur-sm border border-white/10 hover:bg-white/20 transition-all">Quick Settings</button>
                </div>
            </div>
            
            <!-- Abstract background shapes -->
            <div class="absolute -right-20 -top-20 size-96 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute right-20 -bottom-20 size-64 bg-[#0d2b8a] rounded-full blur-3xl opacity-50"></div>
        </div>

        <!-- Quick Stats Placeholder -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div v-for="i in 4" :key="i" class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                <div class="size-12 rounded-2xl bg-slate-50 flex items-center justify-center text-[#1034A7] mb-4">
                    <span class="material-symbols-outlined">analytics</span>
                </div>
                <div class="flex flex-col gap-1">
                    <span class="text-slate-500 text-sm font-semibold">Performance Metric</span>
                    <span class="text-2xl font-bold text-slate-800">0.00%</span>
                    <span class="text-green-500 text-xs font-bold flex items-center gap-1 mt-2">
                        <span class="material-symbols-outlined text-sm">trending_up</span>
                        +0% from last month
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
