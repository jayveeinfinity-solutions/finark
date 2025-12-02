<template>
    <body class="finark-signin-container bg-landing-image-4">
        <div class="finark-signin-wrapper">
            <div class="finark-signin-form">
                <div class="finark-signin-form-header">
                    <img style="height: 40px;" src="{{ config('r2.endpoint') }}/images/brands/logo-banner.png">
                    <div>
                        <h5>Log in to continue</h5>
                    </div>
                </div>
                <div class="alert alert-warning text-center" role="alert">
                    FinArk intranet is on <span class="text-danger fw-bold">maintenance</span>.<br>Thank you!
                </div>
                <div>
                    <form @submit.prevent="submit">
                        <div class="form-group mb-2">
                            <label class="fw-bold mb-0">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" v-model="form.email" required>
                            <div v-if="form.errors.email" v-text="form.errors.email" class="text-danger mt-1"></div>
                        </div>
                        <div class="form-group mb-2">
                            <label class="fw-bold mb-0">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" v-model="form.password" required>
                            <div v-if="form.errors.password" v-text="form.errors.password" class="text-danger mt-1"></div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-block finark-bg-primary text-white" type="submit" :disabled="form.processing">Sign in</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="finark-signin-others">
                    <ul>
                        <li>
                            <a href="#">
                                <span>Can't log in?</span>
                            </a>
                        </li>
                    </ul>
                </div> -->
                <div class="finark-signin-footer">
                    <a href="/"><FontAwesomeIcon icon="fa-solid fa-arrow-left-long" /> Go back to landing page</a>
                </div>
            </div>
        </div>
    </body>
</template>

<script>
    import Main from './../../Shared/Layouts/Main.vue';

    export default {
        layout: Main
    }
</script>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    import Swal from 'sweetalert2';

    let form = useForm({
        email: '',
        password: ''
    });

    let submit = () => {
        form.post('/auth', {
            preserveScroll: true,
            onSuccess: () => {
                Swal.fire({
                    icon: "success",
                    title: "Successfully signed in!",
                    text: "You can now proceed to dashboard",
                    allowOutsideClick: false
                }).then((result) => {
                    if(result.isConfirmed) {
                        location.replace("/admin");
                    }
                }); 
            }
        });
    }
</script>