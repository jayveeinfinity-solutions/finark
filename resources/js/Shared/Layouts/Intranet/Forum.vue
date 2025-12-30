<script setup>
    import Sidebar from '@shared/Partials/Intranet/Sidebar.vue';
    import Header from '@shared/Partials/Intranet/Header.vue';
</script>

<template>
    <body class="bg-background text-text-main font-display overflow-x-hidden antialiased selection:bg-primary selection:text-white">
        <div class="flex h-screen w-full overflow-hidden">
            <Sidebar />
            <main class="flex h-full flex-1 flex-col overflow-auto bg-background">
                <Header />
                <slot/>
            </main>
        </div>
    </body>
</template>