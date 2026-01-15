<script setup>
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import ForumLayout from '@shared/Layouts/Intranet/Forum.vue';

    const props = defineProps({
        poll: Object,
        options: Array,
    });

    defineOptions({
        layout: ForumLayout
    });

    const selectedOption = ref(props.userVotedOptionId || null);

    const form = useForm({
        option_id: null
    })

    const pollVote = async (pollId, optionId, userId) => {
        // If user clicked same option, do nothing
        // if (selectedOption.value === optionId) return;

        form.option_id = optionId;

        form.post(route('intranet.polls.vote', pollId), {
            onSuccess: (page) => {
                // Update local state
                // selectedOption.value = optionId;
                form.option_id = null;

                // Update votes_count and percentages
                // if (page.props.poll) {
                //     page.props.poll.options.forEach((opt, index) => {
                //         props.options[index].votes = opt.votes_count;
                //     });

                //     const totalVotes = props.options.reduce((sum, o) => sum + o.votes, 0);
                //     props.options.forEach(opt => {
                //         opt.percentage = totalVotes > 0 ? ((opt.votes / totalVotes) * 100).toFixed(2) : 0;
                //     });
                // }
            }
        })
    }
</script>

<template>
    <Head>
        <title>Intranet</title>
    </Head>
    <div class="flex-1 overflow-y-auto p-4 lg:p-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <div class="flex flex-col gap-8 lg:col-span-2">
                    <section>
                        <div class="mb-4 flex items-center justify-between">
                            <h2 class="text-xl font-bold text-primary flex items-center gap-2">
                                <span class="material-symbols-outlined">campaign</span>
                                Announcements
                            </h2>
                            <a class="text-sm font-semibold text-text-muted hover:text-primary transition-colors" href="#">View All</a>
                        </div>
                        <div class="relative overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-black/5 hover:shadow-md transition-shadow">
                            <div class="absolute inset-0 bg-gradient-to-r from-primary/5 to-transparent pointer-events-none"></div>
                            <div class="flex flex-col md:flex-row">
                                <div class="h-48 w-full shrink-0 bg-cover bg-center md:h-auto md:w-64" data-alt="Abstract blue financial data charts" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCMIHL9LfAnsWONhBqGi57X4heH93UQvnQFLOGKYInfEzagVQh6GEjkRWQASCn_IsQ1pPSGOls8rkQOBLfgxa80BmQqLiYsX1ANwClWcBdTQvMOyI1g3ACZBdUFRfpIrdOIS4hemM9-mMkBhwMOT9Jx-Fp6wHUJ4n5SK4PpL82O3bzW_npJKpkq6GaIOV0nEikP-5ls9OTT079UAggDuhb1edkNakb29R03rNl0KIowuE8wCC5q94AfYP8Q9pOfnFfkC2NZG0R_aJ5L");'></div>
                                <div class="flex flex-1 flex-col justify-center p-6 relative z-10">
                                    <div class="mb-2 flex items-center gap-2">
                                        <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-bold text-primary ring-1 ring-inset ring-blue-700/10">Important</span>
                                        <span class="text-xs text-text-muted font-medium">2 hours ago</span>
                                    </div>
                                    <h3 class="mb-2 text-xl font-bold text-text-main">Q3 Compliance Update: New SEC Regulations</h3>
                                    <p class="mb-4 text-sm text-gray-600 line-clamp-2 leading-relaxed">Critical reading for all advisory staff regarding the new marketing rule changes effective next month. Please review the attached PDF in detail.</p>
                                    <div class="flex items-center gap-3">
                                        <button class="flex items-center gap-2 text-sm font-bold text-primary hover:text-blue-800 transition-colors">
                                            Read Full Update 
                                            <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <section class="flex flex-col h-full">
                            <div class="mb-4 flex items-center justify-between">
                                <h2 class="text-lg font-bold text-primary flex items-center gap-2">
                                <span class="material-symbols-outlined">coffee</span>
                                    Breakfast Club
                                </h2>
                                <span class="text-xs bg-blue-100 text-primary font-bold px-2 py-1 rounded-full">3 new</span>
                            </div>
                            <div class="flex-1 flex flex-col gap-4">
                                <article class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-black/5 hover:ring-primary/30 hover:shadow-md transition-all cursor-pointer">
                                    <div class="flex gap-3">
                                        <div class="size-9 shrink-0 rounded-full bg-cover bg-center ring-2 ring-gray-100" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAODqZo5KUKPn18q2T1wAPf4btoIfmimKqyUtsjvR8bq1yK_vkuzi3B1kC4VIOJ8Sy5V9Ic8Ak9zA9VE2YrmvF_2kawCQ_BBUtnltjHoBANKmqsd5ojUMKU8Oi0S4looq-xScYVjszwlc51tyU0clLBCvw5vWWWCqwDz3R7riPb8I8iGYRYFKUfc81XSKOwyXUb3OGwmhYMrju2xiWLo_OECWto7Gowy6AKBSZMD2JVN2BO1hicqtjhCjXlxjDq4kuDcQo0gAddQ-9C");'></div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <h4 class="text-xs font-bold text-text-main">James Wilson</h4>
                                                <span class="text-[10px] text-text-muted font-medium">45m ago</span>
                                            </div>
                                            <p class="text-sm font-medium text-gray-700 line-clamp-2">Impact of rising interest rates on bond portfolios?</p>
                                            <div class="mt-3 flex items-center gap-4 text-gray-400">
                                                <div class="flex items-center gap-1.5 text-xs hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-[16px]">chat_bubble</span> 8
                                                </div>
                                                <div class="flex items-center gap-1.5 text-xs hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-[16px]">thumb_up</span> 24
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-black/5 hover:ring-primary/30 hover:shadow-md transition-all cursor-pointer">
                                    <div class="flex gap-3">
                                        <div class="size-9 shrink-0 rounded-full bg-cover bg-center ring-2 ring-gray-100" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBtPm7v7GB9RVdiUNHHi0PVt4YJ0Rl1kGcVh2mZoVE0hFAcQjE4PFawgBdrCjFmWNwD4nJsL5UNGzBHEHFPORtptthQIkPHbO65qTNfiEo28GanZWekXm4kCZwnExw7loa3XZMZbFHfQWn5mBsO95GT5fgyczy4WOtO1F2j-e6ySAWka7-jeL6ggsxKcEqYgbFimRdNGqYGytUnsisw8_twxbDMnb3tfXKjzmH4znRZKYS65_65kh4lKx1pGXfRqz3N0NCM_dNZuI-B");'></div>
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between mb-1">
                                                <h4 class="text-xs font-bold text-text-main">Sarah Chen</h4>
                                                <span class="text-[10px] text-text-muted font-medium">2h ago</span>
                                            </div>
                                            <p class="text-sm font-medium text-gray-700 line-clamp-2">Year-end tax loss harvesting deadline reminder.</p>
                                            <div class="mt-3 flex items-center gap-4 text-gray-400">
                                                <div class="flex items-center gap-1.5 text-xs hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-[16px]">chat_bubble</span> 12
                                                </div>
                                                <div class="flex items-center gap-1.5 text-xs hover:text-primary transition-colors">
                                                    <span class="material-symbols-outlined text-[16px]">thumb_up</span> 45
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <button class="w-full py-2.5 text-xs font-bold text-text-muted hover:text-primary hover:bg-white rounded-lg border border-transparent hover:border-gray-200 transition-all">View All Discussions</button>
                            </div>
                        </section>
                        <section class="flex flex-col h-full">
                            <div class="mb-4 flex items-center justify-between">
                                <h2 class="text-lg font-bold text-primary flex items-center gap-2">
                                    <span class="material-symbols-outlined">event</span>
                                    Seminars &amp; Workshops
                                </h2>
                                <button class="text-text-muted hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-[20px]">calendar_month</span>
                                </button>
                            </div>
                            <div class="flex-1 flex flex-col gap-3">
                                <div class="group flex items-center gap-3 rounded-xl bg-white p-3 ring-1 ring-black/5 hover:ring-primary/50 shadow-sm hover:shadow-md transition-all cursor-pointer">
                                    <div class="flex h-12 w-12 shrink-0 flex-col items-center justify-center rounded-lg bg-gray-50 text-text-main group-hover:bg-primary group-hover:text-white transition-colors border border-gray-100">
                                        <span class="text-[10px] font-bold uppercase text-text-muted group-hover:text-blue-100">Oct</span>
                                        <span class="text-lg font-bold leading-none">24</span>
                                    </div>
                                    <div class="flex flex-col">
                                        <h4 class="text-sm font-bold text-text-main group-hover:text-primary transition-colors">Webinar: Crypto Assets</h4>
                                        <p class="text-xs text-text-muted font-medium">10:00 AM • Zoom</p>
                                    </div>
                                </div>
                                <div class="group flex items-center gap-3 rounded-xl bg-white p-3 ring-1 ring-black/5 hover:ring-primary/50 shadow-sm hover:shadow-md transition-all cursor-pointer">
                                    <div class="flex h-12 w-12 shrink-0 flex-col items-center justify-center rounded-lg bg-gray-50 text-text-main group-hover:bg-primary group-hover:text-white transition-colors border border-gray-100">
                                        <span class="text-[10px] font-bold uppercase text-text-muted group-hover:text-blue-100">Oct</span>
                                        <span class="text-lg font-bold leading-none">28</span>
                                    </div>
                                    <div class="flex flex-col">
                                        <h4 class="text-sm font-bold text-text-main group-hover:text-primary transition-colors">Team Quarterly Review</h4>
                                        <p class="text-xs text-text-muted font-medium">2:00 PM • Conf Room B</p>
                                    </div>
                                </div>
                                <div class="group flex items-center gap-3 rounded-xl bg-white p-3 ring-1 ring-black/5 hover:ring-primary/50 shadow-sm hover:shadow-md transition-all cursor-pointer">
                                    <div class="flex h-12 w-12 shrink-0 flex-col items-center justify-center rounded-lg bg-gray-50 text-text-main group-hover:bg-primary group-hover:text-white transition-colors border border-gray-100">
                                        <span class="text-[10px] font-bold uppercase text-text-muted group-hover:text-blue-100">Nov</span>
                                        <span class="text-lg font-bold leading-none">02</span>
                                    </div>
                                    <div class="flex flex-col">
                                        <h4 class="text-sm font-bold text-text-main group-hover:text-primary transition-colors">Client Retention Workshop</h4>
                                        <p class="text-xs text-text-muted font-medium">All Day • Online</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <section>
                        <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-xl font-bold text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined">school</span>
                            Training &amp; Development
                        </h2>
                        <a class="text-sm font-semibold text-text-muted hover:text-primary transition-colors" href="#">My Courses</a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="group flex flex-col rounded-xl bg-white p-4 ring-1 ring-black/5 shadow-sm hover:shadow-md hover:ring-primary/30 transition-all">
                                <div class="flex items-start justify-between">
                                    <div class="size-10 rounded-lg bg-blue-50 flex items-center justify-center text-primary">
                                        <span class="material-symbols-outlined">verified_user</span>
                                    </div>
                                    <span class="rounded-full bg-gray-100 px-2.5 py-1 text-[10px] font-bold text-text-muted tracking-wide uppercase">In Progress</span>
                                </div>
                                <h3 class="mt-4 text-sm font-bold text-text-main group-hover:text-primary transition-colors">Anti-Money Laundering (AML) 2024</h3>
                                <p class="mt-1 text-xs text-text-muted font-medium">Due: Oct 30, 2023</p>
                                <div class="mt-5">
                                    <div class="flex justify-between text-[10px] font-bold mb-1.5">
                                        <span class="text-text-main">Progress</span>
                                        <span class="text-primary">65%</span>
                                    </div>
                                    <div class="h-1.5 w-full rounded-full bg-gray-100">
                                        <div class="h-1.5 rounded-full bg-primary" style="width: 65%"></div>
                                    </div>
                                </div>
                                <button class="mt-5 w-full rounded-lg bg-gray-50 border border-gray-200 py-2 text-xs font-bold text-text-main hover:bg-primary hover:text-white hover:border-transparent transition-all">Continue</button>
                            </div>
                            <div class="group flex flex-col rounded-xl bg-white p-4 ring-1 ring-black/5 shadow-sm hover:shadow-md hover:ring-primary/30 transition-all">
                                <div class="flex items-start justify-between">
                                    <div class="size-10 rounded-lg bg-green-50 flex items-center justify-center text-green-600">
                                        <span class="material-symbols-outlined">trending_up</span>
                                    </div>
                                    <span class="rounded-full bg-green-50 px-2.5 py-1 text-[10px] font-bold text-green-700 tracking-wide uppercase">New</span>
                                </div>
                                <h3 class="mt-4 text-sm font-bold text-text-main group-hover:text-primary transition-colors">Advanced Portfolio Strategy</h3>
                                <p class="mt-1 text-xs text-text-muted font-medium">4 Modules • 3.5 Hours</p>
                                <div class="mt-5">
                                    <div class="flex justify-between text-[10px] font-bold mb-1.5">
                                        <span class="text-text-main">Progress</span>
                                        <span class="text-text-muted">0%</span>
                                    </div>
                                    <div class="h-1.5 w-full rounded-full bg-gray-100">
                                        <div class="h-1.5 rounded-full bg-green-500" style="width: 0%"></div>
                                    </div>
                                </div>
                                <button class="mt-5 w-full rounded-lg bg-gray-50 border border-gray-200 py-2 text-xs font-bold text-text-main hover:bg-primary hover:text-white hover:border-transparent transition-all">Start Course</button>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-black/5">
                        <div class="mb-4 flex items-center justify-between">
                            <h3 class="text-base font-bold text-text-main">My OKRs</h3>
                            <a class="text-xs font-bold text-primary hover:underline" href="#">View All</a>
                        </div>
                        <div class="flex flex-col gap-5">
                            <div class="space-y-1.5">
                                <div class="flex justify-between text-xs font-semibold">
                                    <span class="text-text-main">Q3 Client Acquisition</span>
                                    <span class="text-primary">75%</span>
                                </div>
                                <div class="h-1.5 w-full rounded-full bg-gray-100">
                                    <div class="h-1.5 rounded-full bg-primary" style="width: 75%"></div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <div class="flex justify-between text-xs font-semibold">
                                    <span class="text-text-main">AUM Growth</span>
                                    <span class="text-purple-600">40%</span>
                                </div>
                                <div class="h-1.5 w-full rounded-full bg-gray-100">
                                    <div class="h-1.5 rounded-full bg-purple-500" style="width: 40%"></div>
                                </div>
                            </div>
                            <div class="space-y-1.5">
                                <div class="flex justify-between text-xs font-semibold">
                                    <span class="text-text-main">Professional Development</span>
                                    <span class="text-green-600">90%</span>
                                </div>
                                <div class="h-1.5 w-full rounded-full bg-gray-100">
                                    <div class="h-1.5 rounded-full bg-green-500" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-xl bg-white p-4 shadow-sm ring-1 ring-black/5">
                        <div class="mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">poll</span>
                            <h3 class="text-base font-bold text-text-main">Poll of the day</h3>
                        </div>
                        <p class="mb-4 text-sm font-semibold text-text-main leading-snug">{{ poll.title }}</p>
                        <div class="space-y-3">
                            <button type="button" class="relative flex w-full items-center justify-between overflow-hidden rounded-lg bg-gray-50 border border-gray-100 px-4 py-2.5 text-left text-sm text-text-main hover:bg-white hover:border-gray-300 transition-all group" v-for="(option, index) in options" :key="option.id" @click="pollVote(poll.poll.id, option.id, 1)">
                                <span class="relative z-10 font-medium">{{ `${option.label}. ${option.text}` }}</span>
                                <span class="relative z-10 text-xs text-text-muted font-mono font-bold group-hover:text-text-main">{{ option.percentage }}%</span>
                                <div class="absolute bottom-0 left-0 top-0 bg-blue-100/50 transition-all duration-500 border-r border-blue-200" :style="{ width: option.percentage + '%'}"></div>
                            </button>
                        </div>
                        <p class="mt-4 text-right text-xs text-text-muted font-medium">248 votes • Ends in 2 days</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>