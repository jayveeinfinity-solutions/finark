<script setup>
    import { computed } from 'vue'
    import { usePage } from '@inertiajs/vue3'

    const props = defineProps({
        href: {
            type: String,
            required: true,
        }
    })

    const page = usePage();

    const isActive = computed(() => {
        return page.url.startsWith(new URL(props.href, window.location.origin).pathname)
    })
</script>

<template>
    <Link
        :href="href"
        :class="[
            isActive
                ? 'text-primary bg-primary/10 font-semibold'
                : 'text-text-muted hover:bg-gray-50 hover:text-text-main',
            'group flex items-center gap-3 rounded-lg px-3 py-2.5 transition-colors'
        ]"
    >
        <!-- Icon -->
        <span
            class="material-symbols-outlined transition-all"
            :style="{
                fontVariationSettings: `'FILL' ${isActive ? 1 : 0}`
            }"
        >
            <slot name="icon" />
        </span>

        <!-- Label -->
        <span class="text-sm font-medium">
            <slot name="label" />
        </span>
    </Link>
</template>
