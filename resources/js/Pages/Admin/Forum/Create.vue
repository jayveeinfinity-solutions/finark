<template>
    <Head title="Forum &sdot; " />
    <div class="container-fluid py-4 px-5">
        <AdminHeader />
        <div class="row">
            <div class="row-12">
                <h3 class="font-weight-bold mb-0">Add new post</h3>
                <a class="text-secondary" href="/admin/forum/" style="font-size: 0.9rem;"><svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to forum</a>
            </div>
            <div class="col-lg-9 mt-4">
                <form @submit.prevent="submitForm">
                    <div class="form-group">
                        <label>Title</label>
                        <textarea class="form-control" rows="1" v-model="form.title" placeholder="Title..">.</textarea>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <QuillEditor style="min-height: 100px;" :options="options" @editorChange="editorChange" ref="quillEditor" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <div class="forum_sidebar"></div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    a {
        text-decoration: none !important;
    }
</style>

<script setup>
    import AdminHeader from '@shared/Partials/CorporateUI/AdminHeader.vue';
    import { ref, watch  } from 'vue'
    import { useForm } from '@inertiajs/vue3'
    import { router } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';

    const options = ref({
        debug: 'info',
        modules: {
            toolbar: [
            ['bold', 'italic', 'underline'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            ['link']
            ]
        },
        placeholder: 'Compose an epic...',
        readOnly: false,
        theme: 'snow'
    })

    const quillEditor = ref(null);

    const editorChange = () => {
        form.content = quillEditor.value.getHTML();
    }

    // Set up the form data
    const form = useForm({
        title: '',
        content: ''
    });

    const submitForm = () => {
        router.post('/admin/forum/store', form, 
            {
                preserveState: true,
                onSuccess: () => {
                    Swal.fire({
                        icon: "success",
                        title: "Successfully created!",
                        text: "Successfully created new course!",
                        allowOutsideClick: false
                    }).then((results) => {
                        if(results.isConfirmed) {
                            form.reset();
                        }
                    }) ; 
                }
            }
        );
    }
</script>