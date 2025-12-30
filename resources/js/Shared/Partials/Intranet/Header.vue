<template>
    <header class="flex h-16 shrink-0 items-center justify-between border-b border-border-light bg-white px-6 lg:px-8 shadow-sm z-10">
        <div class="flex items-center gap-4 lg:hidden">
            <button class="text-text-main">
                <span class="material-symbols-outlined">menu</span>
            </button>
            <span class="text-lg font-bold text-primary">FinArk</span>
        </div>
        <div class="hidden flex-1 items-center gap-4 lg:flex">
            <h2 class="text-lg font-bold text-text-main tracking-tight">Dashboard</h2>
            <div class="relative ml-8 w-full max-w-md">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-symbols-outlined text-gray-400 text-[20px]">search</span>
                </div>
                <input class="block w-full rounded-lg border-0 bg-gray-100 py-2 pl-10 pr-4 text-sm text-text-main placeholder:text-gray-400 focus:ring-2 focus:ring-primary focus:bg-white transition-all shadow-inner" placeholder="Search discussions, topics, or advisors..." type="text"/>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <Link class="hidden h-9 items-center justify-center gap-2 rounded-lg bg-primary px-4 text-sm font-bold text-white shadow-md shadow-blue-900/10 hover:bg-blue-800 sm:flex transition-colors" :href="route('intranet.posts.create')">
                <span class="material-symbols-outlined text-[20px]">add</span>
                New Post
            </Link>
            <button class="relative flex size-9 items-center justify-center rounded-lg bg-white border border-border-light text-text-muted hover:text-primary hover:bg-gray-50 transition-colors shadow-sm">
                <span class="material-symbols-outlined text-[20px]">notifications</span>
                <span class="absolute top-2 right-2 size-2 rounded-full bg-red-500 ring-2 ring-white"></span>
            </button>
        </div>
    </header>
</template>