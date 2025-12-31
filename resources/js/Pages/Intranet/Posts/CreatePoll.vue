<script setup>
    import { useForm } from '@inertiajs/vue3'

    const form = useForm({
        question: '',
        options: [
            { text: '' },
            { text: '' }
        ],
        allow_multiple_answers: false
    })

    const addOption = () => {
        form.options.push({ text: '' })
    }

    const removeOption = (index) => {
        if (form.options.length > 1) {
            form.options.splice(index, 1)
        }
    }

    const submit = () => {
        form.post(route('posts.store'))
    }
</script>

<template>
    <div class="bg-white border border-gray-200 p-6 md:p-8 shadow-sm">
        <form class="flex flex-col gap-8">
            <div class="flex flex-col gap-3">
                <label class="text-slate-900 text-base font-bold leading-normal" for="poll-question">Your Question</label>
                <textarea class="form-textarea w-full resize-none rounded-lg border border-gray-300 bg-gray-50 text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary min-h-[120px] p-4 text-base transition-colors" id="poll-question" placeholder="e.g., What is the best asset class for Q4 2024?" v-model="form.question"></textarea>
            </div>
            <div class="flex flex-col gap-4">
                <label class="text-slate-900 text-base font-bold leading-normal">Answer Options</label>
                <div class="space-y-3">
                    <div class="flex items-center gap-3" v-for="(option, index) in form.options" :key="index">
                        <div class="h-8 w-8 rounded-full bg-blue-50 text-primary flex items-center justify-center text-sm font-bold flex-shrink-0">
                            {{ String.fromCharCode(65 + index) }}
                        </div>
                        <div class="relative flex-1">
                            <input class="form-input w-full rounded-lg border border-gray-300 bg-gray-50 text-slate-900 placeholder:text-slate-400 focus:border-primary focus:ring-1 focus:ring-primary h-12 px-4 pr-10 transition-colors" placeholder="Add another option" type="text" v-model="option.text"/>
                            <button class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-red-500 transition-colors" type="button" @click="removeOption(index)">
                                <span class="material-symbols-outlined text-[20px]">close</span>
                            </button>
                        </div>
                    </div>
                </div>
                <button class="mt-2 flex items-center gap-2 text-primary hover:text-primary-hover font-bold text-sm self-start px-2 py-1 rounded hover:bg-blue-50 transition-colors" type="button"
                    @click="addOption">
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
                        <input class="peer sr-only" type="checkbox" v-model="form.allow_multiple_answers"/>
                    <div class="h-6 w-11 rounded-full bg-gray-200 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary transition-colors"></div>
                    </div>
                    <span class="text-slate-700 text-sm font-medium">Allow multiple answers</span>
                </label>
            </div>
        </form>
    </div>
</template>