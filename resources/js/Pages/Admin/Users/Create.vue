<template>
    <div class="container-fluid py-4 px-5">
        <div class="mt-4 row">
            <h3 class="font-weight-bold">Add new user</h3>
            <a class="text-secondary" href="/admin/users" style="font-size: 0.9rem;"><svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to users</a>
            <!-- <h5 class="text-lg font-weight-semibold">Let's start with the basic information</h5>
            <p class="text-sm">Let us know your name and email address. Use an address you don't mind other users contacting you at.</p>
            <hr class="my-2 horizontal dark"> -->
        </div>
        <div class="mt-4 row">
            <div class="col-12">
                <div class="mb-5">
                    <div class="row">
                        <div class="col-10 col-lg-7">
                            <form @submit.prevent="submit">
                                <div class="p-4 bg-white card">
                                    <h5 class="font-weight-bolder">Add your user details</h5>
                                    <p class="text-sm">Here you can set all the user account details.</p>
                                    <div class="mt-3 row">
                                        <div class="col-12 col-sm-6">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="John Doe" v-model="form.name" required>
                                            <div v-if="errors.name" v-text="errors.name" class="text-danger mt-1"></div>
                                        </div>
                                        <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                            <label>Email Address</label>
                                            <input class="form-control" type="email" placeholder="johndoe@fin-ark.com" v-model="form.email" required>
                                            <div v-if="errors.email" v-text="errors.email" class="text-danger mt-1"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row">
                                        <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                            <label>Role</label>
                                            <select class="form-control"  v-model="form.role" required>
                                                <option value="" selected disabled>Choose role...</option>
                                                <option v-for="role in roles" :key="role.id" :value="role.id">{{ deSlug(role.name) }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4 button-row d-flex">
                                        <button class="mb-0 text-white btn bg-dark ms-auto js-btn-next" type="submit" title="Save">Save</button>
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
    import { reactive } from 'vue';
    import { router } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';

    const props = defineProps({
        roles: Array,
        errors: Object
    });

    const form = reactive({
        name: null,
        email: null,
        role: ''
    });

    const submit = () => {
        router.post('/admin/users/store',
            form, 
            {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire({
                        icon: "success",
                        title: "Successfully created!",
                        text: "Successfully created new user!",
                        allowOutsideClick: false
                    }).then((results) => {
                        if(results.isConfirmed) {
                            form.name = null,
                            form.email = null,
                            form.role = ''
                        }
                    }) ; 
                }
            }
        );
    };

    const deSlug = (slug) => {
        var words = slug.split('-');
        for (var i = 0; i < words.length; i++) {
            var word = words[i];
            words[i] = word.charAt(0).toUpperCase() + word.slice(1);
        }
        return words.join(' ');
    }
</script>

<script>
    import CorporateUI from '@shared/Layouts/CorporateUI.vue';

    export default {
        layout: CorporateUI
    }
</script>