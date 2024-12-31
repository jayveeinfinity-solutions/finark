<template>
    <div class="container-fluid py-4 px-5">
        <div class="mt-4 row">
            <h3 class="font-weight-bold">Edit user</h3>
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
                            <form @submit.prevent="submit" method="PUT">
                                <div class="p-4 bg-white card">
                                    <h5 class="font-weight-bolder">Edit your user details</h5>
                                    <p class="text-sm">Here you can modify all the user account details.</p>
                                    <div class="mt-3 row">
                                        <div class="col-12 col-sm-6">
                                            <label>First Name</label>
                                            <input class="form-control" type="text" placeholder="John Doe" v-model="form.name">
                                        </div>
                                        <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                            <label>Email Address</label>
                                            <input class="form-control" :class="{ 'border-danger': errors.email }" type="email" placeholder="johndoe@fin-ark.com" v-model="form.email">
                                            <div v-if="errors.email" v-text="errors.email" class="text-danger mt-1"></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 row" v-if="!helpers.hasRole('developer') && $page.props.auth.user.id != user.id">
                                        <div class="mt-3 col-12 col-sm-6 mt-sm-0">
                                            <label>Role</label>
                                            <select class="form-control" v-model="form.role" required>
                                                <option v-for="role in roles" :key="role.id" :value="role.id">{{ helpers.deSlug(role.name) }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-4 button-row d-flex">
                                        <button class="mb-0 text-white btn bg-dark ms-auto" type="submit" :disabled="hasChanges">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-10 col-lg-7 mt-4" v-if="user.id != $page.props.auth.user.id">
                            <form @submit.prevent="submitAccess" method="PUT">
                                <div class="p-4 bg-white card">
                                    <h5 class="font-weight-bolder">Remove access</h5>
                                    <p class="text-sm">Here you can remove user account from accessing the admin panel.</p>
                                    <div class="mt-3 row">
                                        <div class="col-12 col-sm-6">
                                            <button class="mb-0 text-white btn ms-auto" :class="{'bg-danger': user.active, 'bg-success': !user.active}" type="submit">
                                                <span v-if="user.active"><FontAwesomeIcon icon="fa-solid fa-user-times" /> Remove access</span>
                                                <span v-if="!user.active"><FontAwesomeIcon icon="fa-solid fa-user-check" /> Grant access</span>
                                            </button>
                                        </div>
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
    import helpers from '@shared/Helpers/Functions.js';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';
    import { reactive, computed } from 'vue';
    import { router, usePage } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';

    const page = usePage();

    const props = defineProps({
        user: Object,
        errors: Object,
        roles: Array
    });

    const form = reactive({
        id: null,
        name: null,
        email: null,
        role: null
    });

    form.id = props.user.id;
    form.name = props.user.name;
    form.email = props.user.email;
    form.role = props.user.roles[0].id;

    const hasChanges = computed(() => {
        return form.name == props.user.name && form.email == props.user.email && form.role == props.user.roles[0].id;
    });

    const submitAccess = () => {
        router.post('/admin/users/delete/' + props.user.id,
            null, 
            {
                preserveScroll: true,
                onSuccess: () => {
                    if(props.user.active) {
                        Swal.fire({
                            icon: "success",
                            title: "Successfully updated!",
                            text: "User grants access to the admin panel!",
                            allowOutsideClick: false
                        }); 
                    } else {
                        Swal.fire({
                            icon: "success",
                            title: "Successfully updated!",
                            text: "User removes access to the admin panel!",
                            allowOutsideClick: false
                        }); 
                    }
                }
            }
        );
    };

    const submit = () => {
        if(hasChanges) {
            router.post('/admin/users/update',
                form, 
                {
                    preserveScroll: true,
                    onSuccess: () => {
                        Swal.fire({
                            icon: "success",
                            title: "Successfully updated!",
                            text: "Successfully updated a user!",
                            allowOutsideClick: false
                        }); 
                    }
                }
            );
        }
    };
</script>

<script>
    import CorporateUI from '@shared/Layouts/CorporateUI.vue';

    export default {
        layout: CorporateUI
    }
</script>