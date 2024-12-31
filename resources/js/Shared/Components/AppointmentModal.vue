<template>
    <!-- Modal -->
    <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="appointmentModalLabel">Book an appointment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="modalClose"></button>
                </div>
                <div class="d-flex flex-column finark-bg-primary pt-4 px-4 pb-3">
                    <div class="mb-3 d-flex justify-content-center">
                        <img src="/storage/images/brands/logo-banner-white.png" height="48">
                    </div>
                    <h2 class="fw-bold text-white text-center">Schedule an appointment?</h2>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <form @submit.prevent="SubmitForm">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">*Name</label>
                                <input type="text" class="form-control" :id="name" placeholder="Name..."  v-model="name" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">*Email address</label>
                                <input type="email" class="form-control" :id="email" placeholder="name@example.com" v-model="email" required autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">*Choose date</label><br>
                                <input type="date" class="form-control" :id="date" :min="minDate" v-model="date" required @input="GetAvailableTimeSlots">
                            </div>
                            <div class="mb-3">
                                <label for="comments" class="form-label fw-bold">*Choose available time</label><br>
                                
                                <div v-if="date">
                                    <div class="d-inline-block mx-1" v-for="(timeSlot, index) in timeSlots" :key="index">
                                        <input type="radio" class="btn-check" name="btn-check-time" :id="'btn-check-' + index" :value="index" autocomplete="off" v-model="time" required :disabled="timeSlot.isBooked">
                                        <label class="btn btn-outline-primary btn-sm" :for="'btn-check-' + index">{{ timeSlot.time }}</label>
                                    </div>
                                </div>

                                <p class="time-slot-warning" v-if="timeSlots.length <= 0">
                                    {{ message }}
                                </p>
                            </div>
                            <div class="mb-5 text-center">
                                <button type="submit" class="btn btn-block finark-bg-primary text-white" :disabled="isSubmitReady">Book an appointment</button>
                            </div>
                        </form>
                        <div class="finark-services-separator">OR</div>
                        <div class="d-flex justify-content-center align-items-center p-5">
                            <a class="finark-services-btn bg-gradient-success text-white" href="https://wa.me/6591813260" target="_blank">
                                <FontAwesomeIcon icon="fa-brands fa-whatsapp" class="finark-services-btn-icon" /> Call on Whatsapp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .time-slot-warning {
        font-size: 0.8rem;
        color: var(--bs-red);
    }
</style>

<script>
    import Swal from 'sweetalert2';

    export default {
        data() {
            return {
                name: "",
                email: "",
                date: "",
                time: "",
                timeSlots: [],
                message: "Select appointment date first to view available time slots"
            }
        },
        props: {
            minDate: String,
            page: String
        },
        computed: {
            isSubmitReady() {
                const minDate = Date.parse(this.minDate);
                const selectedDate = Date.parse(this.date);

                return !(
                    this.name 
                    && 
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email) 
                    && 
                    this.isDateValid() 
                    && 
                    this.time);
            }
        },
        methods: {
            isDateValid() {
                const minDate = Date.parse(this.minDate);
                const selectedDate = Date.parse(this.date);
                if(this.date && minDate <= selectedDate) {
                    return true;
                }
                return false;
            },
            async GetAvailableTimeSlots() {
                this.time = ""; 
                this.message = "Select appointment date first to view available time slots";

                if(!/^\d{4}-\d{1,2}-\d{1,2}$/.test(this.date) && !this.isDateValid()) {
                    this.timeSlots = [];
                    return false;
                }

                var formData = new FormData();
                formData.append('date', this.date);

                const response = await this.$http.post('/appointment/timeslots', formData);

                if(response.data.status === "success") {
                    this.timeSlots = response.data.timeSlots;
                } else {
                    this.message = response.data.message;
                }
            },
            SubmitForm(e) {
                var formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('date', this.date);
                formData.append('time', this.time);
                formData.append('service_plan', this.page);

                this.Save(formData)
            },
            async Save(formData) {
                const response = await this.$http.post('/appointment/store', formData);

                if(response.data.status === "success") {
                    this.ResetForm();
                    Swal.fire({
                        title: response.data.title,
                        text: response.data.message,
                        icon: response.data.status,
                        allowOutsideClick: false
                    }).then((result) => {
                        if(result.isConfirmed) {
                            const buttonClose = document.getElementById('modalClose');
                            buttonClose.click();
                        }
                    });
                } else {
                    Swal.fire({
                        title: response.data.title,
                        text: response.data.message,
                        icon: response.data.status,
                        allowOutsideClick: false
                    });
                }
            },
            ResetForm() {
                // Reset the form fields
                this.name = '';
                this.email = '';
                this.date = '';
                this.time = '';
            }
        }
    }
</script>