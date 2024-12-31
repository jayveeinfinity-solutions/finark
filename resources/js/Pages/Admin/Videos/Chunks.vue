<template>
    <Head title="Upload chunks video &sdot; Admin Panel &sdot; " />
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 mb-3">
                <h3 class="font-weight-bold">Add new video</h3>
                <a class="text-secondary" :href="'/admin/courses/' + course.data.id" style="font-size: 0.9rem;">
                    <svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to course</a>
            </div>
            <div class="col-12">
                <div class="mb-5">
                    <div class="row">
                        <div class="col-10 col-lg-7">
                            <div class="p-4 bg-white card">
                                <h5 class="font-weight-bolder"><FontAwesomeIcon icon="fa-solid fa-upload" /> Upload video</h5>
                                <div class="card-body">
                                    <input type="file" @input="videoForm.file = $event.target.files[0]" v-if="!formTracker.uploading" required @change="fileInputChange">
                                    <div v-if="formTracker.uploading && !formTracker.failed">
                                        <div class="alert alert-info text-sm" role="alert" v-if="!formTracker.uploadingComplete">
                                            Uploading <em>{{ videoForm.file.name }}</em>...
                                        </div>
                                        <div class="alert alert-success text-sm" v-if="formTracker.uploadingComplete">
                                            Upload complete. Edit video details on <a :href="'/admin/videos/edit/' + formTracker.uid">{{ '/admin/videos/edit/' + formTracker.uid }}</a>.
                                        </div>
                                        <div class="progress" v-if="formTracker.uploading && !formTracker.uploadingComplete">
                                            <div class="progress-bar" v-bind:style="{ width: formTracker.progress + '%' }"></div>
                                        </div>
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
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';
    import { useForm, router } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';
    import axios from 'axios';

    const props = defineProps({
        course: Object,
        errors: Object
    });

    let formTracker = useForm({
        saveStatus: null,
        uploading: false,
        uploadingComplete: false,
        failed: false,
        progress: null,
        totalChunks: 0,
        uid: null
    });

    const videoForm = useForm({
        file: null,
        chunks: [],
    });

    const fileInputChange = () => {
        if(videoForm.file.type != 'video/mp4') {
            Swal.fire({
                icon: 'warning',
                title: 'Error',
                text: "test"
            }).then((result) => {
                if(result.isConfirmed) {
                    videoForm.file = null;
                    videoForm.reset();
                }
            });
            return;
        }

        let size = 2048 * 2048, chunks = Math.ceil(videoForm.file.size / size);

        for (let i = 0; i < chunks; i++) {
            videoForm.chunks.push(videoForm.file.slice(
                i * size, Math.min(i * size + size, videoForm.file.size), videoForm.file.type
            ));
        }

        formTracker.totalChunks = videoForm.chunks.length;

        formTracker.uploading = true;
        formTracker.failed = false;

        upload();
    }

    const upload = () => {
        let formData = new FormData;

        formData.set('is_last', videoForm.chunks.length === 1);
        formData.set('file', videoForm.chunks[0], `${videoForm.file.name}.part`);
        formData.set('course_id', `${props.course.data.id}`);

        axios.post('/admin/videos/upload/chunks', formData)
			.then((response) => {
                videoForm.chunks.shift();
				formTracker.progress = Math.floor(((formTracker.totalChunks - videoForm.chunks.length) / formTracker.totalChunks) * 100);
                if(videoForm.chunks.length == 0) {
                    if(response.data.uid != null) {
                        formTracker.uid = response.data.uid;
                        formTracker.uploadingComplete = true;
                    }
                } else {
                    upload();
                }
			});
    }
</script>