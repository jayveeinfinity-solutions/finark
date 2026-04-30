<template>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-lg transition-all hover:border-slate-700">
        <div class="flex justify-between items-start mb-6">
            <div>
                <span 
                    class="px-2 py-1 rounded text-[10px] font-bold uppercase tracking-wider mb-2 inline-block"
                    :class="objective.health_status === 'On Track' ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500'"
                >
                    {{ objective.health_status }}
                </span>
                <h4 class="text-xl font-bold text-white">{{ objective.title }}</h4>
            </div>
            <div class="text-right">
                <div class="text-3xl font-black text-blue-500">{{ objective.progress_percentage }}%</div>
                <div class="text-slate-500 text-xs uppercase font-bold">Overall Progress</div>
            </div>
        </div>

        <div class="space-y-6">
            <div v-for="kr in objective.key_results" :key="kr.id" class="group">
                <div class="flex justify-between items-end mb-2">
                    <div class="text-sm font-medium text-slate-300 group-hover:text-white transition-colors">
                        {{ kr.title }}
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold text-slate-400">
                            {{ kr.current_value }} / {{ kr.target_value }}{{ kr.format_type === 'percentage' ? '%' : '' }}
                        </span>
                        <button 
                            @click="$emit('update-progress', kr)"
                            class="opacity-0 group-hover:opacity-100 p-1 text-slate-400 hover:text-blue-500 transition-all"
                        >
                            <FontAwesomeIcon icon="fa-solid fa-edit" size="xs" />
                        </button>
                    </div>
                </div>
                <div class="h-2 w-full bg-slate-800 rounded-full overflow-hidden">
                    <div 
                        class="h-full bg-blue-600 rounded-full transition-all duration-1000 ease-out"
                        :style="{ width: `${kr.completion_percentage}%` }"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    objective: Object,
});

defineEmits(['update-progress']);
</script>
