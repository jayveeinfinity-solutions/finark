<template>
    <Head :title="video.data.name + ' &sdot; FinArk Admin Panel &sdot; '" />
    <div class="container-fluid py-3 px-5">
        <div class="row mt-6">
            <div class="col-lg-12 col-sm-12">
                <div class="mb-4 card blur rounded-2">
                    <div class="p-4 card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-md-flex justify-content-between align-items-center mx-2">
                                    <div class="mb-md-0 mb-3">
                                        <a class="text-secondary" :href="'/admin/courses/' + video.data.course.id" style="font-size: 0.9rem;">
                                            <svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to {{ video.data.course.name }}
                                        </a>
                                        <h2 class="font-weight-bold mb-0"> {{ video.data.name }} </h2>
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
        </div>
    </div>
    <div class="container-fluid p-0">
        <vue-plyr ref="plyr">
            <video
                controls
                crossorigin
                playsinline
                :data-poster="$page.props.r2Endpoint + '/images/default_poster.png'"
            >
                <source
                :src="$page.props.r2Endpoint + '/videos/course-' + video.data.course_id + '/' + video.data.filename"
                type="video/mp4"
                />
            </video>
        </vue-plyr>
    </div>
    <div class="container-fluid px-4">
        <div class="py-4 bg-transparent border-0 shadow-none card card-body">
            <div class="row">
                <div class="col-12">
                    <div class="py-1 d-flex justify-content-between">
                        <a class="btn btn-white d-sm-block d-none mb-0" :href="'/admin/videos/' + video.data.prev_video" style="font-size: 0.9rem;" v-if="video.data.prev_video">
                            <FontAwesomeIcon icon="fa-solid fa-long-arrow-alt-left" /> Back episode
                        </a>
                        <div class="ms-auto"></div>
                        <a class="btn btn-white d-sm-block d-none mb-0" :href="'/admin/videos/' + video.data.next_video" style="font-size: 0.9rem;" v-if="video.data.next_video">
                            Next episode <FontAwesomeIcon icon="fa-solid fa-long-arrow-alt-right" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid border-top pb-4">
        <div class="py-4 bg-transparent border-0">
            <div class="row">
                <div class="col-8">
                    <div class="p-4">
                        <h5 class="font-weight-bolder">About video</h5>
                        <p v-html="video.data.description"></p>
                        <div class="mt-6">
                            <h1 class="text-lg fw-bold">Your mentor</h1>
                            <div class="mt-3 col-span-1">
                                <div class="d-flex align-items-center">
                                    <div class="avatar rounded-circle me-1 finark-bg-gradient-primary me-2" v-if="video.data.user.name">
                                        <span>{{ helpers.toUserInitial(video.data.user.name) }}</span>
                                    </div>
                                    <div class="align-self-center">
                                        <div class="fw-bold text-dark-blue">{{ video.data.user.name }}</div>
                                        <p class="text-sm m-0">Hey, I am your mentor!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script setup>
    import helpers from '@shared/Helpers/Functions.js';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';
    import { ref, onMounted, reactive } from 'vue';
    import { throttle } from 'lodash';
    import { usePage } from '@inertiajs/vue3';
    import axios from 'axios';

    const page = usePage();

    const props = defineProps({
        video: Object,
        watchVideo: Object
    });

    const watchVideoState = reactive({
        currentTime: 0,
        completed: false
    });

    if(props.watchVideo) {
        watchVideoState.currentTime = props.watchVideo.progress;
        watchVideoState.completed = props.watchVideo.completed;
    }

    const plyr = ref(null);

    onMounted(() => {
        if(!watchVideoState.completed) {
            plyr.value.player.on('timeupdate', handleTimeUpdate);
        }
        plyr.value.player.on('loadeddata', onDataLoaded);
        // plyr.value.player.on('seeked', (event) => {
        //     if(plyr.value.player.currentTime > watchVideoState.currentTime) {
        //         plyr.value.player.currentTime = watchVideoState.currentTime;
        //     }
        // })
    });

    const onDataLoaded = () => {
        if(watchVideoState.currentTime <= plyr.value.player.duration){}
        plyr.value.player.off("loadeddata",onDataLoaded);
        plyr.value.player.currentTime = watchVideoState.currentTime;
    }

    const handleTimeUpdate = throttle(async (event) => {
        await storeVideoProgress(plyr.value.player.currentTime);
    }, 10000);

    const storeVideoProgress = (currentTime) => {
        if(currentTime >= watchVideoState.currentTime && !watchVideoState.completed) {
            watchVideoState.completed = currentTime >= (plyr.value.player.duration * .90) ? 1 : 0;
            watchVideoState.currentTime = watchVideoState.completed == 1 ? plyr.value.player.duration : currentTime;

            let formData = new FormData;

            formData.set('user_id', page.props.auth.user.id);
            formData.set('video_id', props.video.data.id);
            formData.set('progress', currentTime);
            formData.set('completed', watchVideoState.completed);
            axios.post('/admin/videos/watch/update', formData)
			.then((response) => {
                //console.log(response);
			});
        }
    }
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
</style>