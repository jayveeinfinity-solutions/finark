<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth?.user);

const isSidebarOpen = ref(true);

const navigation = [
    { name: 'Dashboard', icon: 'grid_view', href: route('intranet.dashboard'), active: route().current('intranet.dashboard') },
    // Add more navigation items here
];
</script>

<template>
    <div class="min-h-screen bg-slate-50 font-sans">
        <!-- Sidebar -->
        <aside 
            :class="[isSidebarOpen ? 'w-64' : 'w-20']"
            class="fixed inset-y-0 left-0 bg-[#1034A7] text-white transition-all duration-300 z-50 flex flex-col shadow-xl"
        >
            <!-- Logo Area -->
            <div class="h-20 flex items-center px-6 gap-3 overflow-hidden border-b border-white/10">
                <div class="size-8 bg-white rounded-lg flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-[#1034A7] font-bold">account_balance</span>
                </div>
                <span v-if="isSidebarOpen" class="text-xl font-bold tracking-tight whitespace-nowrap">FinArk</span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 py-6 px-3 space-y-2 overflow-y-auto custom-scrollbar">
                <Link 
                    v-for="item in navigation" 
                    :key="item.name"
                    :href="item.href"
                    :class="[item.active ? 'bg-white/20 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white']"
                    class="flex items-center gap-3 px-3 py-3 rounded-xl transition-all group"
                >
                    <span class="material-symbols-outlined shrink-0" :class="{'filled': item.active}">{{ item.icon }}</span>
                    <span v-if="isSidebarOpen" class="font-medium whitespace-nowrap">{{ item.name }}</span>
                </Link>
            </nav>

            <!-- User Profile (Sidebar Bottom) -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center gap-3 p-2 rounded-xl bg-white/5 overflow-hidden">
                    <div class="size-10 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div v-if="isSidebarOpen" class="flex flex-col min-w-0">
                        <span class="text-sm font-bold truncate">{{ user?.name || 'Advisor' }}</span>
                        <span class="text-[10px] text-white/50 uppercase tracking-wider font-bold">Standard Account</span>
                    </div>
                </div>
                <Link 
                    :href="route('intranet.logout')" 
                    method="post" 
                    as="button"
                    class="w-full mt-4 flex items-center gap-3 px-3 py-3 rounded-xl text-white/70 hover:bg-red-500/20 hover:text-red-200 transition-all"
                >
                    <span class="material-symbols-outlined shrink-0">logout</span>
                    <span v-if="isSidebarOpen" class="font-medium">Sign Out</span>
                </Link>
            </div>
        </aside>

        <!-- Main Content Wrapper -->
        <main 
            :class="[isSidebarOpen ? 'pl-64' : 'pl-20']"
            class="transition-all duration-300 min-h-screen flex flex-col"
        >
            <!-- Header -->
            <header class="h-20 bg-white border-b border-slate-200 sticky top-0 z-40 flex items-center justify-between px-8">
                <div class="flex items-center gap-4">
                    <button 
                        @click="isSidebarOpen = !isSidebarOpen"
                        class="p-2 rounded-lg hover:bg-slate-100 text-slate-500 transition-colors"
                    >
                        <span class="material-symbols-outlined">{{ isSidebarOpen ? 'menu_open' : 'menu' }}</span>
                    </button>
                    <h2 class="text-xl font-bold text-slate-800">
                        {{ $page.props.header || 'Dashboard' }}
                    </h2>
                </div>
                
                <div class="flex items-center gap-4">
                    <!-- Placeholder for notifications/search -->
                    <button class="p-2 rounded-full hover:bg-slate-100 text-slate-400">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                </div>
            </header>

            <!-- Page Content -->
            <div class="flex-1 p-8">
                <slot></slot>
            </div>
        </main>
    </div>
</template>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}
</style>
