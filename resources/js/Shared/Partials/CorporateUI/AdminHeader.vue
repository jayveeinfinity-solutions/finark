<template>
    <div class="row mt-6">
        <div class="col-lg-12 col-sm-12">
            <div class="mb-4 card blur rounded-2">
                <div class="p-4 card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-md-flex justify-content-between align-items-center mx-2">
                                <div class="mb-md-0 mb-3">
                                    <h3 class="font-weight-bold mb-0">Hello, {{ username }}!</h3>
                                    <p class="mb-0">Signed in as {{ deSlug(role) }}</p>
                                </div>
                                <div>
                                    <DigitalClockWidget timezone="Asia/Singapore" />
                                </div>
                                <!-- <button type="button" class="btn btn-sm btn-white btn-icon d-flex align-items-center mb-0 ms-md-auto mb-sm-0 mb-2 me-2">
                                    <span class="btn-inner--icon">
                                        <span class="p-1 bg-success rounded-circle d-flex ms-auto me-2">
                                            <span class="visually-hidden">New</span>
                                        </span>
                                    </span>
                                    <span class="btn-inner--text">Messages</span>
                                </button>
                                <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                                    <span class="btn-inner--icon">
                                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </span>
                                    <span class="btn-inner--text">Sync</span>
                                </button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>    
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/vue3';
    import DigitalClockWidget from '@shared/Components/DigitalClockWidget.vue';

    const page = usePage();

    const username = computed(() => {
        return page.props.auth.user.name;
    });

    const role = computed(() => {
        return page.props.auth.user.roles.name ?? '';
    });

    const deSlug = (slug) => {
        var words = slug.split('-');
        for (var i = 0; i < words.length; i++) {
            var word = words[i];
            words[i] = word.charAt(0).toUpperCase() + word.slice(1);
        }
        return words.join(' ');
    }
</script>