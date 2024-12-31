<template>
    <Head :title="'Edit ' + course.data.name + ' &sdot; Admin Panel &sdot; '" />
    <div class="container-fluid py-4 px-5">
        <div class="mt-8 row">
            <div class="col-12 mb-3">
                <h3 class="font-weight-bold">Edit course</h3>
                <a class="text-secondary" :href="'/admin/courses/' + course.data.id" style="font-size: 0.9rem;"><svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to course</a>
            </div>
            <div class="col-12">
                <div class="mb-5">
                    <div class="row">
                        <div class="col-10 col-lg-7">
                            <form @submit.prevent="submit">
                                <div class="p-4 bg-white card">
                                    <h5 class="font-weight-bolder">Edit course details</h5>
                                    <p class="text-sm">Here you can edit all the course details.</p>
                                    <div class="mt-3 row">
                                        <div class="col-12 col-sm-6">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="Course name..." v-model="form.name" required>
                                            <div v-if="errors.name" v-text="errors.name" class="text-danger mt-1"></div>
                                        </div>
                                        <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                            <label>Poster</label>
                                            <input class="form-control" type="file" @input="form.poster = $event.target.files[0]">
                                            <div v-if="errors.file" v-text="errors.file" class="text-danger mt-1"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row">
                                        <div class="mt-3 col-12 col-sm-12 mt-sm-0">
                                            <label>Description</label>
                                            <div class="editor-container mb-5">
                                                <QuillEditor :options="options" theme="snow" toolbar="minimal"  v-model:content="form.description" contentType="html" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row">
                                        <div class="mt-3 col-6 col-sm-6 mt-sm-0">
                                            <label>Visibility</label>
                                            <select class="form-control" v-model="form.visibility">
                                                <option value="1">Public</option>
                                                <option value="0">Unlisted</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <label>Tag <span class="text-muted fst-italic">(Optional)</span></label>
                                            <input class="form-control" type="text" placeholder="Tag..." v-model="form.tag">
                                            <div v-if="errors.tag" v-text="errors.tag" class="text-danger mt-1"></div>
                                        </div>
                                    </div>
                                    <div class="mt-4 button-row d-flex">
                                        <button class="mb-0 text-white btn bg-dark ms-auto" type="submit" title="Save" :disabled="form.processing">Save</button>
                                    </div>
                                </div>
                            </form>
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

    const props = defineProps({
        course: Object,
        errors: Object
    });

    const options = {
        placeholder: 'Write course description...',
        formats: [
            'background',
            'bold',
            'color',
            'font',
            'code',
            'italic',
            'link',
            'size',
            'strike',
            'script',
            'underline',
            'blockquote',
            'header',
            'indent',
            'list',
            'align',
            'direction',
            'code-block',
            'formula'
            // 'image'
            // 'video'
        ]
    }

    const form = useForm({
        id: null,
        name: null,
        poster: null,
        description: null,
        visibility: null,
        tag: null
    });

    form.id = props.course.data.id;
    form.name = props.course.data.name;
    form.description = props.course.data.description;
    form.visibility = props.course.data.visibility;
    form.tag = props.course.data.tag;

    const submit = () => {
        router.post('/admin/courses/update',
            form, 
            {
                preserveState: true,
                onSuccess: () => {
                    Swal.fire({
                        icon: "success",
                        title: "Saved!",
                        text: "Successfully update course details!",
                        allowOutsideClick: false
                    }).then((results) => {
                        if(results.isConfirmed) {
                            form.reset();

                            form.id = props.course.data.id;
                            form.name = props.course.data.name;
                            form.description = props.course.data.description;
                            form.visibility = props.course.data.visibility;
                            form.tag = props.course.data.tag;
                        }
                    }) ; 
                }
            }
        );
    };
</script>