<template>
    <!-- Button trigger modal -->
    <div class="position-fixed bottom-0 end-0 mr-3 mb-3">
        <button type="button" class="btn finark-bg-primary text-white" data-bs-toggle="modal" data-bs-target="#feedbackFormModal">
            <FontAwesomeIcon icon="fa-solid fa-edit" /> Write a feedback
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="feedbackFormModal" tabindex="-1" aria-labelledby="feedbackFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="feedbackFormModalLabel">FinArk feedback form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="d-flex flex-column finark-bg-primary pt-4 px-4 pb-3">
                    <div class="mb-3 d-flex justify-content-center">
                        <img src="/storage/images/brands/logo-banner-white.png" height="48">
                    </div>
                    <h2 class="fw-bold text-white text-center">Tell us how would you rate our website?</h2>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="SubmitForm">
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">*Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name..."  v-model="name" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">*Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">*How would you rate our website?</label><br>
                            <input type="radio" class="btn-check" name="btn-check-rate" id="btn-check-poor" value="poor" autocomplete="off" v-model="rate">
                            <label class="btn btn-outline-primary btn-sm" for="btn-check-poor">Poor</label>
                            <input type="radio" class="btn-check" name="btn-check-rate" id="btn-check-fair" value="fair" autocomplete="off" v-model="rate">
                            <label class="btn btn-outline-primary btn-sm" for="btn-check-fair">Fair</label>
                            <input type="radio" class="btn-check" name="btn-check-rate" id="btn-check-good" value="good" autocomplete="off" v-model="rate">
                            <label class="btn btn-outline-primary btn-sm" for="btn-check-good">Good</label>
                            <input type="radio" class="btn-check" name="btn-check-rate" id="btn-check-very-good" value="very-good" autocomplete="off" v-model="rate">
                            <label class="btn btn-outline-primary btn-sm" for="btn-check-very-good">Very Good</label>
                            <input type="radio" class="btn-check" name="btn-check-rate" id="btn-check-excellent" value="excellent" autocomplete="off" v-model="rate">
                            <label class="btn btn-outline-primary btn-sm" for="btn-check-excellent">Excellent</label>
                        </div>
                        <div class="mb-3">
                            <label for="comments" class="form-label fw-bold">*Is there anything else you'd like to share about our website experience?</label>
                            <textarea class="form-control" id="comments" rows="3" placeholder="Write your messsages, comments and suggestions..." v-model="message" required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalClose">Close</button>
                            <button type="submit" class="btn finark-bg-primary text-white" :disabled="isSubmitReady">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer pt-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2';

    export default {
        data() {
            return {
                name: "",
                email: "",
                message: "",
                rate: ""
            }
        },
        computed: {
            isSubmitReady() {
                return !(
                    this.name 
                    && 
                    /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email) 
                    && 
                    this.message 
                    && 
                    this.rate);
            }
        },
        methods: {
            SubmitForm(e) {
                var formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('message', this.message);
                formData.append('rate', this.rate);

                this.Save(formData);
            },
            async Save(formData) {
                const response = await this.$http.post('/feedback/store', formData)

                if(response.data.status === "success") {
                    this.ResetForm();
                    Swal.fire({
                        title: "Feedback submitted!",
                        text: "Thank you for rating our website!",
                        icon: 'success',
                        allowOutsideClick: false
                    }).then((result) => {
                        if(result.isConfirmed) {
                            const buttonClose = document.getElementById('modalClose');
                            buttonClose.click();
                        }
                    }); 
                }
            },
            ResetForm() {
                // Reset the form fields
                this.name = '';
                this.email = '';
                this.message = '';
                this.rate = '';
            }
        }
    }
</script>