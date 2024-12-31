<template>
    <div class="container-fluid py-4 px-5">
        <AdminHeader />
        <div class="mt-4 row">
            <a class="text-secondary" href="/admin/appointments" style="font-size: 0.9rem;"><svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to appointments</a>
        </div>
        <div class="mt-4 row min-vh-80">
            <div class="mx-auto col-lg-8">
                <div class="mb-4 blur card">
                    <div class="pb-0 card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6>Appointment Details</h6>
                                <p class="mb-0 text-sm">Service plan: <b>{{ appointment.data.service_plan.name }}</b></p>
                                <p class="mb-0 text-sm">#<b>{{ appointment.data.id }}</b></p>
                            </div>
                            <!-- <a href="javascript:;" class="mb-0 btn btn-dark ms-auto d-flex justify-content-center align-items-center">
                                <svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.80078 2.80002C2.80078 2.02683 3.42758 1.40002 4.20078 1.40002H7.41084C7.78212 1.40002 8.13821 1.54752 8.40078 1.81008L10.7907 4.20002C11.0533 4.46257 11.2008 4.81867 11.2008 5.18997V11.2C11.2008 11.9732 10.574 12.6 9.80078 12.6H4.20078C3.42758 12.6 2.80078 11.9732 2.80078 11.2V2.80002Z" fill="#F9FAFB"></path>
                                </svg>
                                Invoice
                            </a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <hr class="mt-0 mb-4 horizontal dark">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="d-flex">
                                    
                                    <div class="avatar avatar-xxl me-3 finark-bg-gradient-primary">
                                        <span class="fs-3">{{ appointment.data.client.name[0].toUpperCase() }}</span>
                                    </div>
                                    <!-- <div>
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png?20170328184010" class="avatar avatar-xxl me-3" alt="product image">
                                    </div> -->
                                    <div>
                                        <h6 class="mt-2 mb-0 text-lg">{{ appointment.data.client.name }}</h6>
                                        <p class="mb-0 text-sm">{{ appointment.data.date }} &sdot; {{ appointment.data.time }}</p>
                                        <span class="badge badge-sm badge-info" v-if="appointment.data.status == 'Pending'">
                                            <FontAwesomeIcon icon="fa-solid fa-clock" />
                                            {{ appointment.data.status }}
                                        </span>
                                        <span class="badge badge-sm badge-success" v-if="appointment.data.status == 'Completed'">
                                            <FontAwesomeIcon icon="fa-solid fa-check" />
                                            {{ appointment.data.status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="my-auto col-lg-6 col-md-6 col-12 text-end">
                                <a href="javascript:;" class="mb-0 btn btn-white">Contact Us</a>
                                <p class="mt-2 mb-0 text-sm">Do you like the product? Leave us a review <a href="javascript:;">here</a>.</p>
                            </div> -->
                        </div>
                        <hr class="mt-4 mb-4 horizontal dark">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <h6 class="mb-3">Track appointment</h6>
                                <div class="timeline timeline-one-side">
                                    <div class="mb-3 timeline-block">
                                        <span class="timeline-step"><FontAwesomeIcon icon="fa-solid fa-check" /></span>
                                        <div class="timeline-content">
                                            <h6 class="mb-0 text-sm text-dark font-weight-bold">Appointment completed</h6>
                                            <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">28 AUG 11:30 AM</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 timeline-block">
                                        <span class="timeline-step"><FontAwesomeIcon icon="fa-solid fa-envelope" /></span>
                                        <div class="timeline-content">
                                            <h6 class="mb-0 text-sm text-dark font-weight-bold">Email sent to assigned financial advisor</h6>
                                            <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">08 AUG 2:38 PM</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 timeline-block">
                                        <span class="timeline-step"><FontAwesomeIcon icon="fa-solid fa-envelope" /></span>
                                        <div class="timeline-content">
                                            <h6 class="mb-0 text-sm text-dark font-weight-bold">Email sent to client</h6>
                                            <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">08 AUG 2:35 PM</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 timeline-block">
                                        <span class="timeline-step"><FontAwesomeIcon icon="fa-solid fa-check" /></span>
                                        <div class="timeline-content">
                                            <h6 class="mb-0 text-sm text-dark font-weight-bold">Appointment schedule confirmed</h6>
                                            <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">08 AUG 2:33 PM</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 timeline-block">
                                        <span class="timeline-step"><FontAwesomeIcon icon="fa-solid fa-user-check" /></span>
                                        <div class="timeline-content">
                                            <h6 class="mb-0 text-sm text-dark font-weight-bold">Financial advisor assigned</h6>
                                            <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">08 AUG 2:30 PM</p>
                                        </div>
                                    </div>
                                    <div class="mb-3 timeline-block">
                                        <span class="timeline-step"><FontAwesomeIcon icon="fa-solid fa-clipboard-check" /></span>
                                        <div class="timeline-content">
                                            <h6 class="mb-0 text-sm text-dark font-weight-bold">Appointment received</h6>
                                            <p class="mt-1 mb-0 text-xs text-secondary font-weight-bold">08 AUG 1:41 PM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6 col-12">
                                <h6 class="mb-3">Financial advisor details</h6>
                                <ul class="list-group">
                                    <li class="p-4 mb-2 bg-gray-100 border-0 list-group-item d-flex border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm">{{ appointment.data.user ? appointment.data.user.name : '--' }}</h6>
                                            <!-- <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-2">Viking Burrito</span></span> -->
                                            <span class="mb-2 text-xs">
                                                <span class="text-dark font-weight-bold">{{ appointment.data.user ? 'Email Address: ' + appointment.data.user.email : '--' }}</span>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="col-lg-3 col-12 ms-auto">
                                <h6 class="mb-3">Order Summary</h6>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">Product Price: </span>
                                    <span class="text-dark font-weight-bold ms-2">$90</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="mb-2 text-sm">Delivery: </span>
                                    <span class="text-dark ms-2 font-weight-bold">$14</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-sm">Taxes: </span>
                                    <span class="text-dark ms-2 font-weight-bold">$1.95</span>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <span class="mb-2 text-lg">Total: </span>
                                    <span class="text-lg text-dark ms-2 font-weight-bold">$105.95</span>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script setup>
    import AdminHeader from '@shared/Partials/CorporateUI/AdminHeader.vue';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';

    const props = defineProps({
        appointment: Array
    });
</script>

<script>
    import CorporateUI from '@shared/Layouts/CorporateUI.vue';

    export default {
        layout: CorporateUI
    }
</script>