<script setup>
    import { ref } from 'vue';
    import ForumLayout from '@shared/Layouts/Intranet/Forum.vue';
    import CreatePost from '@pages/Intranet/Posts/CreatePost.vue';
    import CreatePoll from '@pages/Intranet/Posts/CreatePoll.vue';

    defineOptions({
        layout: ForumLayout
    });

    const selectedTab = ref('thread');
    const threadRef = ref('thread');
    const pollRef = ref('poll');

    const submit = () => {
        if(selectedTab.value === 'thread') {
            threadRef.value?.submit();
        }
        if(selectedTab.value === 'poll') {
            pollRef.value?.submit();
        }
    }
</script>

<template>
    <div class="flex-1 max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 py-8 lg:py-10">
        <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
            <div class="flex-1 min-w-0">
                <div class="mb-8" v-show="selectedTab === 'post'">
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Create New Content</h1>
                    <p class="text-slate-500 text-base font-normal leading-normal">Share financial insights, market analysis, or gather team feedback.</p>
                </div>
                <div class="mb-8" v-show="selectedTab === 'poll'">
                    <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">Create a Poll</h1>
                    <p class="text-slate-500 text-base font-normal leading-normal">Ask the FinArk community for their opinion on market trends and strategies.</p>
                </div>
                <div class="bg-white rounded-xl shadow-card border border-slate-200 overflow-hidden">
                    <div class="flex border-b border-slate-200 bg-slate-50/50 px-6">
                        <button class="relative flex items-center gap-2 px-1 py-4 text-sm -mb-px transition-colors"
                            @click="selectedTab = 'post'"
                            :class="selectedTab  === 'post'
                                ? 'font-bold text-primary border-b-2 border-primary'
                                : 'font-medium text-slate-500 hover:text-slate-700 border-b-2 border-transparent hover:border-slate-300'
                            "
                        >
                            <span class="material-symbols-outlined text-[20px]">edit_note</span>
                            Compose Post
                        </button>
                        <button class="relative flex items-center gap-2 px-1 py-4 text-sm -mb-px transition-colors ml-8"
                            @click="selectedTab = 'poll'"
                            :class="selectedTab  === 'poll'
                                ? 'font-bold text-primary border-b-2 border-primary'
                                : 'font-medium text-slate-500 hover:text-slate-700 border-b-2 border-transparent hover:border-slate-300'
                            "
                        >
                            <span class="material-symbols-outlined text-[20px]">poll</span>
                            Create Poll
                        </button>
                    </div>

                    <CreatePost v-show="selectedTab === 'post'" ref="threadRef" />
                    <CreatePoll v-show="selectedTab === 'poll'" ref="pollRef" />

                    <div class="bg-slate-50 px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-200">
                        <div class="flex items-center gap-2 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px] text-slate-400">info</span>
                            <span>Visible to: <strong class="text-slate-700">All Advisors</strong></span>
                        </div>
                        <div class="flex items-center gap-3 w-full sm:w-auto">
                            <button class="flex-1 sm:flex-none px-4 py-2 rounded-lg border border-slate-300 bg-white text-sm font-semibold text-slate-700 shadow-sm hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all" type="button"  v-show="selectedTab === 'thread'">
                                Save Draft
                            </button>
                            <button class="flex-1 sm:flex-none px-5 py-2 rounded-lg bg-primary text-sm font-bold text-white shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all flex items-center justify-center gap-2" type="button" @click="submit" v-show="selectedTab === 'thread'">
                                Publish Post
                                <span class="material-symbols-outlined text-[18px]">send</span>
                            </button>
                            <button class="px-8 py-3 rounded-lg bg-primary hover:bg-primary-hover text-white font-bold shadow-lg shadow-blue-900/20 transition-all w-full md:w-auto flex items-center justify-center gap-2" type="button"  @click="submit" v-show="selectedTab === 'poll'">
                                Publish Poll
                                <span class="material-symbols-outlined text-[20px]">send</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-80 flex flex-col gap-6">
                <div class="bg-white rounded-xl shadow-card border border-slate-200 p-4">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="p-1.5 bg-amber-100 rounded-md text-amber-600">
                            <span class="material-symbols-outlined text-[20px]">lightbulb</span>
                        </div>
                        <h3 class="font-bold text-slate-900">Posting Guidelines</h3>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3 text-sm text-slate-600">
                            <span class="material-symbols-outlined text-[18px] text-green-500 mt-0.5">check_circle</span>
                            <span>Keep insights data-driven and objective.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-600">
                            <span class="material-symbols-outlined text-[18px] text-green-500 mt-0.5">check_circle</span>
                            <span>Cite sources for market claims.</span>
                        </li>
                        <li class="flex items-start gap-3 text-sm text-slate-600">
                            <span class="material-symbols-outlined text-[18px] text-red-500 mt-0.5">cancel</span>
                            <span>Do not share specific client PII.</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-white rounded-xl shadow-card border border-slate-200 p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-slate-900">Recent Drafts</h3>
                        <a class="text-xs font-bold text-primary hover:text-primary-dark" href="#">View All</a>
                    </div>
                    <div class="space-y-1">
                        <a class="block p-3 -mx-3 rounded-lg hover:bg-slate-50 transition-colors group" href="#">
                            <div class="font-semibold text-sm text-slate-800 group-hover:text-primary truncate">Q4 Tech Sector Outlook</div>
                            <div class="text-xs text-slate-500 mt-1">Edited 2h ago</div>
                        </a>
                        <a class="block p-3 -mx-3 rounded-lg hover:bg-slate-50 transition-colors group" href="#">
                            <div class="font-semibold text-sm text-slate-800 group-hover:text-primary truncate">Retirement Planning 2025</div>
                            <div class="text-xs text-slate-500 mt-1">Edited yesterday</div>
                        </a>
                    </div>
                </div>
                <div class="relative bg-gradient-to-br from-[#1034A7]/10 to-white rounded-xl shadow-card border border-[#1034A7]/20 p-4 overflow-hidden">
                    <div class="relative z-10">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="material-symbols-outlined text-primary">poll</span>
                            <h3 class="font-bold text-primary">Pro Tip</h3>
                        </div>
                        <p class="text-sm text-slate-700 mb-4 leading-relaxed">
                            Need quick feedback from the team? Try creating a poll to gather opinions on investment strategies.
                        </p>
                        <button class="text-xs font-bold bg-white text-primary border border-primary/20 px-3 py-2 rounded-lg hover:bg-primary hover:text-white transition-colors shadow-sm">
                            Create a Poll
                        </button>
                    </div>
                    <div class="absolute -bottom-6 -right-6 text-primary/5 rotate-12">
                        <span class="material-symbols-outlined text-[140px]">bar_chart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>