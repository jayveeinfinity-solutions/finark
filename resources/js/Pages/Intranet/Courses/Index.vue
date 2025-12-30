<script setup>
    import ForumLayout from '@shared/Layouts/Intranet/Forum.vue';

    defineOptions({
        layout: ForumLayout
    });
</script>

<template>
    <Head>
        <title>Courses</title>
    </Head>
    <div class="flex-1 overflow-y-auto p-4 md:p-8">
        <div class="max-w-7xl mx-auto flex flex-col gap-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="flex flex-col gap-1 rounded-xl p-4 bg-surface-light border border-border-light shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <p class="text-text-secondary text-sm font-medium">Total Hours Watched</p>
                        <span class="material-symbols-outlined text-primary bg-primary/10 p-1.5 rounded-lg">schedule</span>
                    </div>
                    <p class="text-text-main text-3xl font-bold tracking-tight mt-2">24.5h</p>
                    <p class="text-green-600 text-xs font-bold flex items-center gap-1 mt-1 bg-green-50 w-fit px-1.5 py-0.5 rounded">
                        <span class="material-symbols-outlined text-[14px]">trending_up</span> +12% this month
                    </p>
                </div>
                <div class="flex flex-col gap-1 rounded-xl p-4 bg-surface-light border border-border-light shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <p class="text-text-secondary text-sm font-medium">Courses Completed</p>
                        <span class="material-symbols-outlined text-primary bg-primary/10 p-1.5 rounded-lg">school</span>
                    </div>
                    <p class="text-text-main text-3xl font-bold tracking-tight mt-2">12</p>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                        <div class="bg-primary h-full rounded-full shadow-[0_0_10px_rgba(16,52,167,0.3)]" style="width: 75%"></div>
                    </div>
                </div>
                <div class="flex flex-col gap-1 rounded-xl p-4 bg-surface-light border border-border-light shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <p class="text-text-secondary text-sm font-medium">Pending OKRs</p>
                        <span class="material-symbols-outlined text-primary bg-primary/10 p-1.5 rounded-lg">ads_click</span>
                    </div>
                    <p class="text-text-main text-3xl font-bold tracking-tight mt-2">3</p>
                    <p class="text-text-secondary text-xs font-medium mt-1">Next review in 5 days</p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h2 class="text-text-main text-xl font-bold border-l-4 border-primary pl-3">Continue Learning</h2>
                <div class="flex flex-col md:flex-row items-stretch gap-0 md:gap-6 rounded-2xl bg-surface-light border border-border-light overflow-hidden shadow-sm hover:shadow-lg transition-all group/card">
                    <div class="w-full md:w-2/5 aspect-video md:aspect-auto bg-cover bg-center relative cursor-pointer overflow-hidden" data-alt="People analyzing financial charts on a tablet" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB-79rkZRf4OPPTrHCEUf9GG76S8eCdVhlfn7pdG93o-kBcu_9UmtbHuGxfJw5q2o6siM4Rbnl-fZ8dwZshqY3lhzI-xAoFeH5h81sewfftQNFlWu4Z6u3RdIZFbraXNQW85C1d1HHJ7qk1UtGLgf1KCOaZwAd8fks9TlDNE6QHV0Mkk1nTAtcio-bF96x5aqMKWdHxqhMkuIEFJ32Dedj8rpJSU6GGhuxPWskILTArxbITX8I8x7YJG11whl2e7yODzSfiolGujyaq");'>
                        <div class="absolute inset-0 bg-primary/20 mix-blend-multiply opacity-0 group-hover/card:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute inset-0 bg-black/10 flex items-center justify-center opacity-0 group-hover/card:opacity-100 transition-opacity duration-300">
                            <div class="size-14 rounded-full bg-white/90 backdrop-blur-sm flex items-center justify-center text-primary shadow-lg scale-90 group-hover/card:scale-100 transition-transform duration-300">
                                <span class="material-symbols-outlined text-[32px] fill ml-1">play_arrow</span>
                            </div>
                        </div>
                        <div class="absolute bottom-3 right-3 bg-white/90 backdrop-blur-md px-2.5 py-1 rounded-md text-text-main text-xs font-bold shadow-sm">
                            45m remaining
                        </div>
                    </div>
                    <div class="flex-1 p-6 flex flex-col justify-center gap-4">
                        <div class="flex flex-col gap-2">
                            <span class="w-fit px-2.5 py-1 rounded-md text-xs font-bold bg-primary/10 text-primary uppercase tracking-wider">Estate Planning</span>
                            <h3 class="text-text-main text-2xl font-bold leading-tight group-hover/card:text-primary transition-colors">Advanced Estate Planning Strategies</h3>
                            <p class="text-text-secondary text-sm">Instructor: Sarah Jenkins • Module 3 of 5</p>
                        </div>
                        <div class="flex flex-col gap-2 w-full max-w-md">
                            <div class="flex justify-between text-xs font-bold text-text-secondary">
                                <span>Progress</span>
                                <span class="text-primary">65%</span>
                            </div>
                            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                                <div class="bg-primary h-full rounded-full shadow-sm" style="width: 65%"></div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <button class="bg-primary hover:bg-primary/90 hover:shadow-lg hover:shadow-primary/30 text-white px-5 py-2.5 rounded-lg text-sm font-bold inline-flex items-center gap-2 transition-all">
                                <span class="material-symbols-outlined">play_arrow</span>
                                Resume Course
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <h2 class="text-text-main text-xl font-bold border-l-4 border-primary pl-3">Browse Courses</h2>
                    <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 scrollbar-hide">
                        <button class="whitespace-nowrap px-4 py-2 rounded-lg bg-text-main text-white text-sm font-bold shadow-md shadow-slate-200">All</button>
                        <button class="whitespace-nowrap px-4 py-2 rounded-lg bg-white hover:bg-surface-hover text-text-secondary hover:text-text-main text-sm font-medium border border-border-light transition-colors">Wealth Management</button>
                        <button class="whitespace-nowrap px-4 py-2 rounded-lg bg-white hover:bg-surface-hover text-text-secondary hover:text-text-main text-sm font-medium border border-border-light transition-colors">Compliance</button>
                        <button class="whitespace-nowrap px-4 py-2 rounded-lg bg-white hover:bg-surface-hover text-text-secondary hover:text-text-main text-sm font-medium border border-border-light transition-colors">Sales</button>
                        <button class="whitespace-nowrap px-4 py-2 rounded-lg bg-white hover:bg-surface-hover text-text-secondary hover:text-text-main text-sm font-medium border border-border-light transition-colors">Market Analysis</button>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <div class="group flex flex-col bg-surface-light border border-border-light rounded-xl overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all cursor-pointer h-full">
                        <div class="relative aspect-video bg-cover bg-center overflow-hidden" data-alt="Bitcoin coin with digital graph background" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA0mij8xeRLf1TtC3x_mfdvWs4KiByatv2cbiGHT0RO0CXoIczHdJUuimj4cklMgbPcIILU6c0y_2aWELoZRDLR4oWl5nYDr0rvPCTmsRXQjD7lJ09VuLuZRPAj7N0MeLwWvk0PRLt2euvoZU5_Y-PzWc78yuZDe7OU3Jzi_reQYSptv817LvlDnng2xCvRpsVxK3gWT8UQKBtHGnCDSeaF83nbLYTYbc5u7vh2uzIH_xqOsTK_Oh5F8G1zGpA09rVEXJ9Y1Xrxs-39");'>
                            <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/10 transition-colors duration-300"></div>
                            <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2 py-1 rounded text-text-main text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                Crypto
                            </div>
                        </div>
                        <div class="p-4 flex flex-col gap-3 flex-1">
                            <div class="flex-1">
                                <h3 class="text-text-main text-base font-bold leading-snug group-hover:text-primary transition-colors">Crypto for Advisors: Risk &amp; Reward</h3>
                                <p class="text-text-secondary text-sm mt-1">By Michael Chen</p>
                            </div>
                            <div class="flex flex-col gap-1.5 mt-2">
                                <div class="flex justify-between text-xs text-text-secondary font-medium">
                                    <span>40% Completed</span>
                                    <span class="text-primary font-bold">1h 20m left</span>
                                </div>
                                <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-primary h-full rounded-full" style="width: 40%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="group flex flex-col bg-surface-light border border-border-light rounded-xl overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all cursor-pointer h-full">
                        <div class="relative aspect-video bg-cover bg-center overflow-hidden" data-alt="Legal documents and gavel on desk" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDnhZxssp-HPSsPq-0fcP-N9jGCX63IsoZTn_W2l4S8caEe0UXZf69AlpdSfoNDZxnJ_Xk-mnrEdz-94-lHcOKkiPCCOB2L_4Ai9WeG6EJo_BA65l5zZpYh20zncIzA-ece7zKOs1kHGNYDto81la0Cc4yWktL-WcO_uYyVRkWGBSkFJnlTod3HeSXm-6R3c0dXBmMWmJ5S8oqsRX5Ya-fGKD3k1_-bWX06WIJiKgOuS0z6mIkr91ySZdJs9ViO9DcruiHycgz3TNLA");'>
                            <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/10 transition-colors duration-300"></div>
                            <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2 py-1 rounded text-text-main text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                Compliance
                            </div>
                        </div>
                        <div class="p-4 flex flex-col gap-3 flex-1">
                            <div class="flex-1">
                                <h3 class="text-text-main text-base font-bold leading-snug group-hover:text-primary transition-colors">Q3 Regulatory Changes Deep Dive</h3>
                                <p class="text-text-secondary text-sm mt-1">By Legal Dept.</p>
                            </div>
                            <div class="mt-2 flex items-center justify-between">
                                <span class="text-xs font-bold px-2 py-1 bg-slate-100 rounded text-slate-500">Not Started</span>
                                <span class="text-xs text-text-secondary font-medium bg-white border border-slate-200 px-2 py-0.5 rounded-full">45 mins</span>
                            </div>
                        </div>
                    </div>
                    <div class="group flex flex-col bg-surface-light border border-border-light rounded-xl overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all cursor-pointer h-full">
                        <div class="relative aspect-video bg-cover bg-center" data-alt="Two people shaking hands in meeting" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCcDX9O9dpfYXVE2u2k6JNiE-22uyAYYcxaRtMMBzWZ_Zt8nTR_OiRM6fP4xFqG7ptX8SYQakBe4v6QLeWrnaEYThMs_vsTQGiXxONy9X-4mSwEb39yX3mQU9A5WVsxhyknSGAUpyOK5OaiEnpKxEm9pCk6WPqqCY2hzF8lSTjIz6-EbZvzZ5wRsbqR-IvykE-1KeMxKKbXaW96ZpGjOqet0i9Y4mBJMVl0meV_1aAHCmn-fiVPaw2cKEVuNIFriRG6bNHjzSRx0UZV");'>
                            <div class="absolute inset-0 bg-primary/80 mix-blend-multiply opacity-90 group-hover:opacity-100 transition-opacity"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                <span class="material-symbols-outlined text-white text-4xl font-bold border-2 border-white rounded-full p-2 scale-90 group-hover:scale-100 transition-transform">check</span>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col gap-3 flex-1 bg-green-50/50">
                            <div class="flex-1 opacity-75 group-hover:opacity-100 transition-opacity">
                                <h3 class="text-text-main text-base font-bold leading-snug group-hover:text-primary transition-colors">Client Relationship Mastery</h3>
                                <p class="text-text-secondary text-sm mt-1">By Jessica Pearson</p>
                            </div>
                            <div class="mt-2 flex items-center gap-2 text-green-600 text-xs font-bold uppercase tracking-wide bg-green-100 w-fit px-2 py-1 rounded">
                                <span class="material-symbols-outlined text-sm">verified</span>
                                Completed
                            </div>
                        </div>
                    </div>
                    <div class="group flex flex-col bg-surface-light border border-border-light rounded-xl overflow-hidden hover:shadow-lg hover:border-primary/30 transition-all cursor-pointer h-full">
                        <div class="relative aspect-video bg-cover bg-center overflow-hidden" data-alt="Stock market graph on dark background" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBsV9bPLj87n1Rpq2mHuQZh3szyWSpCyWH1KvDscS7sEIipWFwAbmRR1Y7fddWUNSqN32YECxKlhcfbpbW9Bo-NygZmx4vrY5G7UiVekFvTDwyNlFxZU3f5X9DUiF0feL3lfvmnJZJ4jnoI9bOAKPQyj34upewdileMrD9fqYU1Z-A0Z9DsNuOA3qvBmID9a8UhgTdKMjjaKNqr2IgBtZn1-LVLwNJ5Ev7MvF-95UWCbLzml7sdi-AP0xWpA62yphmkvg9S2SctPG07");'>
                            <div class="absolute inset-0 bg-primary/0 group-hover:bg-primary/10 transition-colors duration-300"></div>
                            <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2 py-1 rounded text-text-main text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                Market
                            </div>
                        </div>
                        <div class="p-4 flex flex-col gap-3 flex-1">
                            <div class="flex-1">
                            <h3 class="text-text-main text-base font-bold leading-snug group-hover:text-primary transition-colors">Technical Analysis 101</h3>
                            <p class="text-text-secondary text-sm mt-1">By Robert K.</p>
                            </div>
                            <div class="flex flex-col gap-1.5 mt-2">
                                <div class="flex justify-between text-xs text-text-secondary font-medium">
                                    <span>10% Completed</span>
                                    <span class="text-primary font-bold">2h 15m left</span>
                                </div>
                                <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-primary h-full rounded-full" style="width: 10%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="h-10"></div>
        </div>
    </div>
</template>