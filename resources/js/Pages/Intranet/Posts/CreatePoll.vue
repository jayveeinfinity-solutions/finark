<template>
    <div class="bg-white border border-gray-200 p-6 md:p-8 shadow-sm">
        <form class="flex flex-col gap-8">
            <div class="flex flex-col gap-3">
                <label class="text-slate-900 text-base font-bold leading-normal" for="poll-question">Your Question</label>
                <textarea class="form-textarea w-full resize-none rounded-lg border border-gray-300 bg-gray-50 text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary min-h-[120px] p-4 text-base transition-colors" id="poll-question" placeholder="e.g., What is the best asset class for Q4 2024?"></textarea>
            </div>
            <div class="flex flex-col gap-4">
                <label class="text-slate-900 text-base font-bold leading-normal">Answer Options</label>
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-blue-50 text-primary flex items-center justify-center text-sm font-bold flex-shrink-0">A</div>
                        <input class="form-input flex-1 rounded-lg border border-gray-300 bg-gray-50 text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 transition-colors" placeholder="Enter first option" type="text" value="Equities"/>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-blue-50 text-primary flex items-center justify-center text-sm font-bold flex-shrink-0">B</div>
                        <input class="form-input flex-1 rounded-lg border border-gray-300 bg-gray-50 text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 transition-colors" placeholder="Enter second option" type="text" value="Fixed Income"/>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-blue-50 text-primary flex items-center justify-center text-sm font-bold flex-shrink-0">C</div>
                        <div class="relative flex-1">
                            <input class="form-input w-full rounded-lg border border-gray-300 bg-gray-50 text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 pr-10 transition-colors" placeholder="Add another option" type="text"/>
                            <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-red-500 transition-colors" type="button">
                                <span class="material-symbols-outlined text-[20px]">close</span>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="mt-2 flex items-center gap-2 text-primary hover:text-primary-hover font-bold text-sm self-start px-2 py-1 rounded hover:bg-blue-50 transition-colors" type="button">
                    <span class="material-symbols-outlined text-[20px]">add_circle</span>
                    Add another option
                </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-slate-900 text-sm font-bold leading-normal">Poll Duration</label>
                    <div class="relative">
                        <select class="form-select w-full rounded-lg border border-gray-300 bg-gray-50 text-slate-900 focus:border-primary focus:ring-1 focus:ring-primary h-12 pl-4 pr-10 transition-colors cursor-pointer appearance-none">
                            <option>1 Day</option>
                            <option selected>3 Days</option>
                            <option>1 Week</option>
                            <option>2 Weeks</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-slate-900 text-sm font-bold leading-normal">Category Tag</label>
                    <div class="relative">
                        <select class="form-select w-full rounded-lg border border-gray-300 bg-gray-50 text-slate-900 focus:border-primary focus:ring-1 focus:ring-primary h-12 pl-4 pr-10 transition-colors cursor-pointer appearance-none">
                            <option>#General</option>
                            <option selected>#MarketTrends</option>
                            <option>#Compliance</option>
                            <option>#ClientManagement</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-4 pt-2">
                <label class="flex items-center gap-3 cursor-pointer group">
                    <div class="relative inline-flex items-center">
                        <input class="peer sr-only" type="checkbox"/>
                    <div class="h-6 w-11 rounded-full bg-gray-200 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary transition-colors"></div>
                    </div>
                    <span class="text-slate-700 text-sm font-medium">Allow multiple answers</span>
                </label>
            </div>
            <!-- <div class="h-px bg-gray-200 w-full my-2"></div>
            <div class="flex flex-col-reverse md:flex-row justify-end gap-4">
            <button class="px-6 py-3 rounded-lg border border-gray-300 text-slate-700 font-bold hover:bg-gray-100 transition-colors w-full md:w-auto" type="button">
                Cancel
            </button>
            <button class="px-8 py-3 rounded-lg bg-primary hover:bg-primary-hover text-white font-bold shadow-lg shadow-blue-900/20 transition-all w-full md:w-auto flex items-center justify-center gap-2" type="button">
                <span class="material-symbols-outlined text-[20px]">send</span>
                Post Poll
            </button>
            </div> -->
        </form>
    </div>
</template>