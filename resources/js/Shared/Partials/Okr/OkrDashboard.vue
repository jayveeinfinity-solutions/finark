<template>
    <div class="okr-dashboard mt-8">
        <!-- Stats Header -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-md">
                <div class="text-slate-500 text-xs uppercase font-bold mb-1">Total Objectives</div>
                <div class="text-3xl font-black text-white">{{ stats.totalObjectives }}</div>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-md">
                <div class="text-slate-500 text-xs uppercase font-bold mb-1">Avg. Progress</div>
                <div class="text-3xl font-black text-blue-500">{{ stats.avgProgress }}%</div>
            </div>
            <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 shadow-md">
                <div class="text-slate-500 text-xs uppercase font-bold mb-1">Days Left in Q</div>
                <div class="text-3xl font-black text-amber-500">{{ stats.daysLeftInQuarter }}</div>
            </div>
        </div>

        <!-- Objectives Grid -->
        <div v-if="objectives.length > 0" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <ObjectiveCard 
                v-for="objective in objectives" 
                :key="objective.id" 
                :objective="objective"
                @update-progress="openModal"
            />
        </div>
        <div v-else class="text-center py-12 bg-slate-900 rounded-2xl border border-slate-800 border-dashed">
            <p class="text-slate-500">No objectives found for this period.</p>
        </div>

        <UpdateProgressModal 
            :show="showModal"
            :key-result="selectedKeyResult"
            @close="showModal = false"
            @updated="$emit('refresh')"
        />
    </div>
</template>

<script setup>
import { ref, defineProps, defineEmits } from 'vue';
import ObjectiveCard from './ObjectiveCard.vue';
import UpdateProgressModal from './UpdateProgressModal.vue';

const props = defineProps({
    objectives: Array,
    stats: Object,
});

defineEmits(['refresh']);

const showModal = ref(false);
const selectedKeyResult = ref(null);

const openModal = (keyResult) => {
    selectedKeyResult.value = keyResult;
    showModal.value = true;
};
</script>
