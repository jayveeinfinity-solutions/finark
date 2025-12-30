<script setup>
    import SidebarLink from '@shared/Partials/Intranet/SidebarLink.vue';

    const r2Endpoint = import.meta.env.VITE_R2_ENDPOINT;
</script>

<template>
    <aside class="hidden w-64 flex-col border-r border-border-light bg-white lg:flex">
        <div class="flex h-16 shrink-0 items-center gap-3 border-b border-border-light px-6">
            <div class="h-[36px]">
                <img :src="`${r2Endpoint}/images/brands/logo-banner.png`" class="h-full w-auto object-contain" alt="Logo">
            </div>
        </div>
        <div class="flex flex-1 flex-col justify-between overflow-y-auto px-4 py-4">
            <nav class="flex flex-col gap-1.5">
                <SidebarLink :href="route('intranet.dashboard')">
                    <template #icon>dashboard</template>
                    <template #label>Dashboard</template>
                </SidebarLink>
                <SidebarLink :href="route('intranet.discussions')">
                    <template #icon>forum</template>
                    <template #label>Discussions</template>
                </SidebarLink>
                <SidebarLink :href="route('intranet.courses')">
                    <template #icon>school</template>
                    <template #label>Courses</template>
                </SidebarLink>
                <SidebarLink :href="route('intranet.okr')">
                    <template #icon>track_changes</template>
                    <template #label>OKRs</template>
                </SidebarLink>
            </nav>
            <div class="flex flex-col gap-2 border-t border-border-light pt-4">
                <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-text-muted hover:bg-gray-50 hover:text-text-main transition-colors" href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <span class="text-sm font-medium">Settings</span>
                </a>
                <a class="group flex items-center gap-3 rounded-lg px-3 py-2.5 text-text-muted hover:bg-gray-50 hover:text-text-main transition-colors" href="#">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="text-sm font-medium">Log Out</span>
                </a>
                <div class="mt-3 flex items-center gap-3 rounded-lg border border-border-light bg-gray-50 p-3 shadow-sm">
                    <div class="size-10 rounded-full bg-cover bg-center ring-2 ring-white" data-alt="User profile photo" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAp9vAMIXYt9kBRusefg3kMKZ-TK_MeaiRtEZRDxVm-skNhq-3Fm6_53f5zzPxZ1PsnjI3ixjlT-v3KPSAtHqTpFkWRiO-iBObyhe5RyixcQ0cE6mkoHQaEg8BJOrG9ULOCQQtSvwkTgppuSo6MR8C-j0JUR2U_FSF9T-Y7nEheYklMNwBSkTE1KRM7KKSAKqaY5X-jXX9pyL6VrSG5QrNzsx44elTuljcDQtZDyrmAfzkrUhoE8PcyB1cT9o9YGVFTX88899QJr_8P");'></div>
                    <div class="flex flex-col overflow-hidden">
                        <p class="truncate text-sm font-bold text-text-main">Alex Morgan</p>
                        <p class="truncate text-xs text-text-muted">Senior Advisor</p>
                    </div>
                </div>
            </div>
        </div>
    </aside>
</template>