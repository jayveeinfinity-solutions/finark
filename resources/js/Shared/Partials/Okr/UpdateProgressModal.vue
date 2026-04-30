<template>
    <Transition name="modal">
        <div v-if="show" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-slate-900 border border-slate-800 rounded-xl shadow-2xl w-full max-w-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold text-white">Update Progress</h3>
                    <button @click="$emit('close')" class="text-slate-400 hover:text-white transition-colors">
                        <FontAwesomeIcon icon="fa-solid fa-times" />
                    </button>
                </div>

                <form @submit.prevent="submit">
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-slate-300 mb-2">
                            {{ keyResult.title }}
                        </label>
                        <div class="relative">
                            <input
                                v-model="form.current_value"
                                type="number"
                                step="0.01"
                                class="w-full bg-slate-800 border border-slate-700 rounded-lg py-2 px-4 text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all"
                                :placeholder="`Target: ${keyResult.target_value}`"
                            />
                            <span v-if="keyResult.format_type === 'percentage'" class="absolute right-4 top-2 text-slate-400">%</span>
                        </div>
                        <div v-if="form.errors.current_value" class="text-red-500 text-xs mt-1">
                            {{ form.errors.current_value }}
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button
                            type="button"
                            @click="$emit('close')"
                            class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-800 hover:bg-slate-700 rounded-lg transition-colors"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            {{ form.processing ? 'Saving...' : 'Save Changes' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Transition>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { defineProps, defineEmits, watch } from 'vue';

const props = defineProps({
    show: Boolean,
    keyResult: Object,
});

const emit = defineEmits(['close', 'updated']);

const form = useForm({
    current_value: props.keyResult?.current_value || 0,
});

watch(() => props.keyResult, (newVal) => {
    if (newVal) {
        form.current_value = newVal.current_value;
    }
});

const submit = () => {
    form.patch(`/admin/okrs/key-results/${props.keyResult.id}`, {
        onSuccess: () => {
            emit('updated');
            emit('close');
        },
    });
};
</script>

<style scoped>
.modal-enter-active,
.modal-leave-active {
    transition: opacity 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}
</style>
