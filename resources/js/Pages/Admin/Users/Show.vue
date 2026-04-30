<template>
    <Head :title="user.data.name + ' &sdot; FinArk Admin Panel &sdot; '" />
    <div class="pb-6">
        <div class="container-fluid py-3 px-5">
            <!-- <div class="row mt-6">
                <div class="col-lg-12 col-sm-12">
                    <div class="mb-4 card blur rounded-2">
                        <div class="p-4 card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-md-flex justify-content-between align-items-center mx-2">
                                        <div class="mb-md-0 mb-3">
                                            <a class="text-secondary" href="/admin/users/" style="font-size: 0.9rem;">
                                                <svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to users
                                            </a>
                                            <h2 class="font-weight-bold mb-0"> {{ user.name }} </h2>
                                            <div class="d-flex mt-2">
                                                <span class="me-3 text-dark"><FontAwesomeIcon icon="fa-solid fa-clock" class="me-1" /> {{ video.data.time_humans }}</span>
                                                <span class="me-3 text-dark"><FontAwesomeIcon icon="fa-solid fa-calendar" /> {{ video.data.timeago }} </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="container-fluid">
                <div class="py-2 bg-transparent border-0 shadow-none card card-body">
                    <div class="row">
                        <div class="col-auto">
                            <div class="border border-4 border-gray-100 avatar avatar-2xl rounded-circle position-relative mt-n7 finark-bg-gradient-primary">
                                <span class="fs-1">{{ helpers.toUserInitial(user.data.name) }}</span>
                                <!-- <div class="avatar rounded-circle me-1 finark-bg-gradient-primary">
                                    
                                    </div> -->
                                <!-- <img src="https://demos.creative-tim.com/corporate-ui-dashboard-pro/assets/img/team-1.jpg" alt="profile_image" class="w-100"> -->
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h3 class="mb-0 font-weight-bold">
                                    {{ helpers.capitalized(user.data.name) }}
                                </h3>
                                <p class="mb-0">
                                    {{ user.data.email }}
                                </p>
                            </div>
                        </div>
                        <!-- <div class="mx-auto mt-3 col-lg-4 col-md-6 pe-0 my-sm-auto ms-sm-auto me-sm-0 text-sm-end">
                            <a href="javascript:;" class="btn btn-white">Cancel</a>
                            <a href="javascript:;" class="btn btn-dark">Save</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="mt-4 container-fluid">
                <h5 class="mb-3 font-weight-bold">Performance & OKRs</h5>
                <OkrDashboard 
                    :objectives="objectives" 
                    :stats="okrStats" 
                />
            </div>

            <div class="mt-4 row">
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="p-3 pb-0 card-header">
                            <div class="row">
                                <div class="col-8 d-flex">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h5 class="mb-0 text-lg font-weight-semibold">Vision</h5>
                                        <p class="text-sm">Strategic Focus</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3 pt-1 card-body">
                            <h6>Corporate Vision</h6>
                            <p class="text-sm">To be the leading financial ark for every individual seeking security and growth.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="p-3 card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="mb-0 text-lg font-weight-semibold">Training course progress</h5>
                                    <p class="text-sm font-weight-normal">Here you will see all the training course progress.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-0 card-body">
                            <div class="table">
                                <table class="table table-responsive table-flush">
                                    <thead>
                                        <tr>
                                        <th class="text-xs border-top-0 font-weight-semibold">Videos</th>
                                        <th class="text-xs border-top-0 font-weight-semibold">Status</th>
                                        <th class="text-xs border-top-0 font-weight-semibold">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="watchVideo in user.data.watch_videos" :key="watchVideo.id">
                                            <td>
                                                <div class="px-3">
                                                    <span class="text-sm font-weight-semibold text-dark">{{ watchVideo.video.name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-primary" v-if="!watchVideo.completed">
                                                    <FontAwesomeIcon icon="fa-solid fa-clock" class="me-1" />
                                                    {{ Math.floor(watchVideo.progress / watchVideo.video.duration * 100) }}%
                                                </span>
                                                <span class="badge badge-success" v-if="watchVideo.completed">
                                                    <FontAwesomeIcon icon="fa-solid fa-check" class="me-1" />
                                                    Done
                                                </span>
                                            </td>
                                            <td class="text-sm">
                                                {{ watchVideo.timeago }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <Footer />
        </div>
    </div>
</template>

<script setup>
    import { watch } from 'vue';
    import helpers from '@shared/Helpers/Functions.js';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';
    import OkrDashboard from '@shared/Partials/Okr/OkrDashboard.vue';
    import { usePage } from '@inertiajs/vue3';

    const page = usePage();

    const props = defineProps({
        user: Object,
        objectives: Array,
        okrStats: Object
    });
</script>