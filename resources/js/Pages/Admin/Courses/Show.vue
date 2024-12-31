<template>
    <Head :title="course.data.name + ' &sdot; FinArk Admin Panel &sdot; '" />
    <div class="container-fluid px-5">
        <div class="row mt-6">
            <div class="col-lg-12 col-sm-12">
                <div class="mb-4 card blur rounded-2">
                    <div class="p-4 card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-md-flex justify-content-between align-items-center mx-2">
                                    <div class="mb-md-0 mb-3">
                                        <h2 class="font-weight-bold mb-0">{{ course.data.name }}</h2>
                                        <div class="d-flex mt-2">
                                            <span class="me-3 text-dark"><FontAwesomeIcon icon="fa-solid fa-film" /> {{ course.data.videos.length }} episodes</span>
                                            <span class="me-3 text-dark"><FontAwesomeIcon icon="fa-solid fa-clock" /> {{ course.data.time_humans }}</span>
                                            <span class="me-3 text-dark"><FontAwesomeIcon icon="fa-solid fa-calendar" /> {{ course.data.timeago }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <a :href="'/admin/courses/edit/' + course.data.id" class="btn btn-sm btn-dark mb-0" v-if="helpers.hasRole('admin', 'developer')">Edit course</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-4 bg-transparent border-0">
            <div class="row">
                <div class="col-8">
                    <div class="p-4">
                        <h5 class="font-weight-bolder">About this course</h5>
                        <p v-html="course.data.description"></p>
                        <div class="mt-6">
                            <h1 class="text-lg fw-bold">Your mentor</h1>
                            <div class="mt-3 col-span-1">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded-circle me-1 finark-bg-gradient-primary me-2" v-if="course.data.user.name">
                                        <span>{{ helpers.toUserInitial(course.data.user.name) }}</span>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark-blue">{{ course.data.user.name }}</div>
                                        <p class="text-sm m-0">Hey, I am your mentor!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="font-weight-bolder">Course episodes ({{ course.data.videos.length }})</h5>
                            <a :href="'/admin/videos/create/' + course.data.id" class="btn btn-sm mb-0 btn-dark" v-if="helpers.hasRole('admin', 'developer')">Upload video</a>
                        </div>
                        <div class="mt-4 py-2">
                            <a :href="'/admin/videos/' + video.uid" v-for="video in course.data.videos" :key="video.id" class="d-flex justify-content-between align-items-center px-5 py-4 bg-white rounded flex-grow-1 mb-md-0 w-100 mt-1 border border-gray-200">
                                <div class="d-flex align-items-center flex-grow-1" v-if="video.visibility">
                                    <div class="d-flex justify-content-center align-items-center mr-5 me-2 rounded-circle bg-gray-100" style="min-width: 2.25rem; min-height: 2.25rem;" v-if="!video.watched || !video.watched.completed">
                                        <FontAwesomeIcon icon="fa-solid fa-play-circle" />
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mr-5 me-2 rounded-circle bg-gray-100" style="min-width: 2.25rem; min-height: 2.25rem;" v-if="video.watched && video.watched.completed">
                                        <FontAwesomeIcon icon="fa-solid fa-check-circle" class="text-success" />
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between w-100">
                                        <div class="px-1">
                                            <h2 class="text-dark-blue leading-snug text-sm mb-0">{{ video.sequence + '. ' + video.name }}</h2>
                                            <span class="badge badge-sm badge-info me-1" v-if="!video.watched || !video.watched.completed">{{ video.time_humans }}</span>
                                            <span class="badge badge-sm badge-primary" v-if="video.watched && !video.watched.completed">On-going ({{ Math.floor(video.watched.progress / video.duration * 100) }}%)</span>
                                            <span class="badge badge-sm badge-success" v-if="video.watched && video.watched.completed">Completed</span>
                                        </div>
                                        <div class="text-muted opacity-75 d-flex align-items-center mr-4">
                                            <!-- <FontAwesomeIcon icon="fa-solid fa-clock" class="me-1" /><div class="text-nowrap">6m 59s</div> -->
                                            <a :href="'/admin/videos/edit/' + video.uid" class="btn btn-sm btn-white mb-0" v-if="helpers.hasRole('admin', 'developer')"><FontAwesomeIcon icon="fa-solid fa-cog" /></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <!-- <a class="d-flex justify-content-between align-items-center px-5 py-4 bg-white rounded flex-grow-1 mb-md-0 w-100 mt-1 border border-gray-200" href="/admin/videos/2">
                                <div class="d-flex align-items-center flex-grow-1">
                                    <div class="d-flex justify-content-center align-items-center mr-5 me-2 rounded-circle bg-gray-100" style="min-width: 2.25rem; min-height: 2.25rem;">
                                        <FontAwesomeIcon icon="fa-solid fa-play-circle" />
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between w-100">
                                        <div>
                                            <h2 class="text-dark-blue leading-snug text-sm mb-0">02. Getting set up</h2>
                                        </div>
                                        <div class="text-xs text-muted opacity-75 d-flex align-items-center me-4">
                                            <FontAwesomeIcon icon="fa-solid fa-clock" class="me-1" /><div class="text-nowrap">10m 36s</div>
                                        </div>
                                    </div>
                                </div>
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer class="pb-5" />
    </div>
</template>

<script setup>
    import helpers from '@shared/Helpers/Functions.js';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';

    const props = defineProps({
        course: Object
    });
</script>

<style scoped>
    .bg-page-gradient {
        background-image: radial-gradient(100% 100.26% at 50% 0%,#113967 0%,#0f172a 49.18%);
    }
    .text-course {
        color: rgba(235, 237, 238, 1);
    }
    .leading-snug {
        line-height: 1.375;
    }
    .text-dark-blue {
        color: var(--bs-heading-color);
    }
    .fs-time {
        font-size: .7rem !important;
    }
</style>