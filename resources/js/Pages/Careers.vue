<template>
    <Head title="Careers &sdot; " />
    <div class="pt-8 pb-0 bg-white">
        <div class="container-xxl container-xl container-lg container-md container-sm pt-5">
            <div class="text-center pt-8 pb-5 fa-2024-bg-aboutus" style="position: relative; height: 25rem;">
                <div class="position-absolute px-5 pb-4" style="bottom: 0;">
                    <h2 class="text-start text-uppercase" style="color: #F6F6FA;font-family: Lato;font-size: 3.5rem;font-style: normal;font-weight: 900;line-height: normal;">
                        CAREERS
                    </h2>
                    <p class="text-start" style="color: #F6F6FA; font-family: Lato; font-size: 2rem; font-style: normal; font-weight: 400; line-height: normal;">
                        Come join our growing team of advisors! Both new and experienced.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl container-xl container-lg container-md container-sm my-7">
        <p class="mb-1" style="color: var(--Grey, #A4ADCA);
text-align: center;
font-family: Lato;
font-size: 2rem;
font-style: normal;
font-weight: 400;
line-height: normal;">
                Embarking on a new journey?
        </p>
        <h1 style="color: var(--Black, #1D1F27);
text-align: center;
font-family: Lato;
font-size: 3.5rem;
font-style: normal;
font-weight: 900;
line-height: normal;">Join us in the world of financial services!</h1>
        <!-- <div class="finark-landing-separator rounded mb-4"></div> -->
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column py-6">
                    <div class="row d-flex flex-row" style="background-image: url('storage/images/backgrounds/Group 28.png');">
                        <div class="col-3 d-lg-block d-none p-0">
                            <img class="w-100" src="storage/images/backgrounds/unsplash_Lks7vei-eAg.png">
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 p-0 py-lg-0 py-5 d-flex align-items-center">
                            <h3 class="w-100 text-center align-self-center" style="color: var(--White, #F6F6FA);
                                font-family: Lato;
                                font-size: 3rem;
                                font-style: normal;
                                font-weight: 900;
                                line-height: normal;">
                                New Advisors
                                <div class="px-2 d-inline-block" style="border-radius: 2.99344rem;
                                    background: var(--White, #F6F6FA);
                                    color: var(--Navy-Blue, #1B3768);
                                    text-align: center;
                                    font-family: Lato;
                                    font-size: 1rem;
                                    font-style: normal;
                                    font-weight: 400;
                                    line-height: 153%; /* 1.7175rem */">Activitely Hiring</div>
                            </h3>
                        </div>
                    </div>
                    <div class="py-5">
                        <p style="color: var(--Text-Grey, #747887);
        text-align: justify;
        font-family: Lato;
        font-size: 1.6rem;
        font-style: normal;
        font-weight: 400;
        line-height: 3rem">
                            Calling All Seasoned Advisors: Elevate Your Practice with Us!
                            <br><br>
                            Are you an experienced agent or consultant ready to reach the next step of success as a producer?Working in an Independent Financial Advisor, you’ll enjoy a heightened competitive edge, with the freedom to compare financial products across a range of providers, ensuring that you can back your advice with the best-in-class solutions.
                            <br>
                            We provide coaching and guidance from experienced industry practitioners to support you to greater productivity. Our competitive banding model would mean that you receive higher remuneration for your work efforts.
                            <br>
                            Our philosophy is all about empowering you. Apart from regulatory requirements, we provide the autonomy to conduct your practice as you see fit - the freedom to manage your time in accordance to your priorities.
                            <br>
                            Join us and enhance your experience of life. Experience the liberty, support, and reward you deserve as a leading financial advisor.
                        </p>
                        <div class="mt-6 text-center">
                            <a class="btn fa-2024-btn-wide" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#applyModal" @click="SetSelectedPosition('NewAdvisor')">Apply now!</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column py-6">
                    <div class="d-flex flex-row" style="background-image: url('storage/images/backgrounds/Group 28.png');">
                        <div class="col-3 d-lg-block d-none p-0">
                            <img class="w-100" src="storage/images/backgrounds/unsplash_Lks7vei-eAg.png">
                        </div>
                        <div class="col-lg-9 col-md-12 col-sm-12 p-0 py-lg-0 py-5 d-flex align-items-center">
                            <h3 class="w-100 text-center align-self-center" style="color: var(--White, #F6F6FA);
                                font-family: Lato;
                                font-size: 3rem;
                                font-style: normal;
                                font-weight: 900;
                                line-height: normal;">Experienced Advisors
                                <div class="px-2 d-inline-block" style="border-radius: 2.99344rem;
                                background: var(--White, #F6F6FA);
                                color: var(--Navy-Blue, #1B3768);
                                text-align: center;
                                font-family: Lato;
                                font-size: 1rem;
                                font-style: normal;
                                font-weight: 400;
                                line-height: 153%; /* 1.7175rem */">Activitely Hiring</div>
                            </h3>
                        </div>
                    </div>
                    <div class="py-5">
                        <p style="color: var(--Text-Grey, #747887);
        text-align: justify;
        font-family: Lato;
        font-size: 1.6rem;
        font-style: normal;
        font-weight: 400;
        line-height: 3rem">
                            As a newcomer looking to establish yourself, we know how crucial it is to have the right support. That's why we offer an excellent learning environment where you will be mentored by established industry professionals whom will shortcut your learning curve.
                            <br>
                            To expedite your professional growth, we provide a rich resource library of meticulously curated training videos, quality content and financial advisory formats. Our aim is to ensure you're fully equipped to navigate the financial services landscape with confidence.
                            <br>
                            We also understand the challenges of entering a new field as it has been shown that ~70% of new consultants transition out of the industry within the first five years. To acknowledge your efforts and dedication during your exploratory phase, we give you full vesting income. This rare benefit guarantees that you retain the rewards of your effort, even if you subsequently decide that the financial services industry isn't your calling.
                            <br>
                            Join us, and experience the power of a supportive professional environment, rich learning resources, and a rewards system that truly respects your contributions. Your journey towards becoming a successful financial consultant starts here!
                        </p>
                        <div class="mt-6 text-center">
                            <a class="btn fa-2024-btn-wide" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#applyModal" @click="SetSelectedPosition('ExperiencedConsultant')">Apply now!</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-4 mb-4">
                <img class="finark-careers w-100 shadow-lg" src="/storage/images/careers/1.jpg">
            </div>
            <div class="col-4 mb-4">
                <img class="finark-careers w-100 shadow-lg" src="/storage/images/careers/2.jpg">
            </div>
            <div class="col-4 mb-4">
                <img class="finark-careers w-100 shadow-lg" src="/storage/images/careers/3.jpg">
            </div>
            <div class="col-4 mb-4">
                <img class="finark-careers w-100 shadow-lg" src="/storage/images/careers/4.jpg">
            </div>
            <div class="col-4 mb-4">
                <img class="finark-careers w-100 shadow-lg" src="/storage/images/careers/5.jpg">
            </div>
            <div class="col-4 mb-4">
                <img class="finark-careers w-100 shadow-lg" src="/storage/images/careers/6.jpg">
            </div>
            <div class="col-4 mb-4">
                <img class="finark-careers w-100 shadow-lg" src="/storage/images/careers/7.jpg">
            </div> -->
            <!-- <div class="col-lg-12 mb-3">
                <div class="card shadow rounded d-flex flex-row">
                    <div class="p-5 finark-bg-primary rounded align-self-stretch d-lg-block d-none">
                        <h1 class="fs-1 text-white">8th</h1>
                        <p class="text-light text-center">Aug 8</p>
                    </div>
                    <div class="p-5">
                        <span class="badge finark-bg-primary d-lg-none d-sm-inline-block">8th Aug 2023</span>
                        <h1 class="text-uppercase fw-bold">New Consultants</h1>
                        <p class="font-weight-400">
                            "Embarking on a New Journey? Join Us in the World of Financial Services!<br><br>
                            As a newcomer looking to establish yourself, we know how crucial it is to have the right support. That's why we offer an excellent learning environment where you will be mentored by established industry professionals whom will shortcut your learning curve.<br><br>
                            To expedite your professional growth, we provide a rich resource library of meticulously curated training videos, quality content and financial advisory formats. Our aim is to ensure you're fully equipped to navigate the financial services landscape with confidence.<br><br>
                            We also understand the challenges of entering a new field as it has been shown that ~70% of new consultants transition out of the industry within the first five years. To acknowledge your efforts and dedication during your exploratory phase, we give you full vesting income. This rare benefit guarantees that you retain the rewards of your effort, even if you subsequently decide that the financial services industry isn't your calling.<br><br>
                            Join us, and experience the power of a supportive professional environment, rich learning resources, and a rewards system that truly respects your contributions. Your journey towards becoming a successful financial consultant starts here!"
                        </p>
                        <button class="btn btn-lg finark-bg-primary rounded-pill text-white" data-bs-toggle="modal" data-bs-target="#applyModal" @click="SetSelectedPosition('NewConsultant')">Apply now!</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="card shadow rounded d-flex flex-row">
                    <div class="p-5">
                        <h1 class="text-uppercase fw-bold">Experienced Consultants</h1>
                        <p class="font-weight-400">
                            "Calling All Seasoned Consultants: Elevate Your Practice with Us!<br><br>
                            Are you an experienced agent or consultant ready to reach the next step of success as a producer?<br><br>
                            Working in an Independent Financial Advisor, you’ll enjoy a heightened competitive edge, with the freedom to compare financial products across a range of providers, ensuring that you can back your advice with the best-in-class solutions.<br><br>
                            We provide coaching and guidance from experienced industry practitioners to support you to greater productivity. Our competitive banding model would mean that you receive higher remuneration for your work efforts.<br><br>
                            Our philosophy is all about empowering you. Apart from regulatory requirements, we provide the autonomy to conduct your practice as you see fit - the freedom to manage your time in accordance to your priorities.<br><br>
                            Join us and enhance your experience of life. Experience the liberty, support, and reward you deserve as a leading financial consultant."
                        </p>
                        <button class="btn btn-lg finark-bg-primary rounded-pill text-white" data-bs-toggle="modal" data-bs-target="#applyModal" @click="SetSelectedPosition('ExperiencedConsultant')">Apply now!</button>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-lg-12 mb-3">
                <div class="card shadow rounded d-flex flex-row">
                    <div class="p-5 finark-bg-primary rounded align-self-stretch d-lg-block d-none">
                        <h1 class="fs-1 text-white">8th</h1>
                        <p class="text-light text-center">Aug 8</p>
                    </div>
                    <div class="p-5">
                        <span class="badge finark-bg-primary d-lg-none d-sm-inline-block">8th Aug 2023</span>
                        <h1 class="text-uppercase fw-bold">Team Leader</h1>
                        <p class="font-weight-400">
                            "Step Up to Leadership: Building Your Team Towards Your Definition of Success”<br><br>
                            Are you a qualified financial consultant eager to lead your own team, or an existing team leader seeking a supportive, empowering environment to grow your leadership skills? We provide the opportunity for your leadership aspirations and facilitate your growth to become an established leader within the financial services industry.<br><br>
                            Our comprehensive support infrastructure is equipped to support you in developing and building your team in areas of recruitment, training and operations. We work together collaboratively to jointly run activities, so that we can add greater value to our consultants without overstretching our leaders.<br><br>
                            Most importantly, we structure our partnership model to ensure that the path to be a director is clear, as long as you can meet the requirements and that you will not be suppressed or shortchanged for your efforts. <br><br>
                            Take the next step in your leadership journey with us and open up a world of possibilities for yourself and your team."
                        </p>
                        <p class="font-weight-400">
                            <FontAwesomeIcon icon="fa-solid fa-location-dot" class="text-finark" /> <a href="https://gdg.community.dev/events/details/google-gdg-manila-presents-google-io-extended-manila-2022/#event-info">FinArk, Singapore</a>
                        </p>
                        <button class="btn btn-lg finark-bg-primary rounded-pill text-white" data-bs-toggle="modal" data-bs-target="#applyModal" @click="SetSelectedPosition('TeamLeader')">Apply now!</button>
                        <button class="btn text-primary">View details</button>
                    </div>
                </div>
            </div> -->
            <!-- Modal -->
            <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="applyModallLabel">Apply as {{ ModalTitle }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="d-flex flex-column finark-bg-primary pt-4 px-4 pb-3">
                            <div class="mb-3 d-flex justify-content-center">
                                <img src="/storage/images/brands/logo-banner-white.png" height="48">
                            </div>
                            <h2 class="fw-bold text-white text-center">Please fill up the following fields</h2>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="SubmitForm">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">*Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name..." v-model="name" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label fw-bold">*Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com" v-model="email" autocomplete="off" required>
                                </div>
                                <!-- <div class="mb-3">
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
                                </div> -->
                                <div class="mb-3">
                                    <label for="file" class="form-label fw-bold">*Portfolio or CV <em>(PDF file only)</em></label>
                                    <input type="file" class="form-control" id="file" @change="HandleFileUpload" required>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="comments" class="form-label fw-bold">*Is there anything else you'd like to share about our website experience?</label>
                                    <textarea class="form-control" id="comments" rows="3" placeholder="Write your messsages, comments and suggestions..." v-model="message" required></textarea>
                                </div> -->
                                <div class="text-end">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalClose">Close</button>
                                    <button type="submit" class="btn finark-bg-primary text-white">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="modal-footer pt-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- # QUOTE SECTION -->
    <div class="container-fluid fa-2024-bg-landing-quote">
        <div class="py-7">
            <p class="fa-2024-landing-quote-p">Your success is only one step away</p>
        </div>
    </div>
</template>

<script>
    import Landing from './../Shared/Layouts/Landing.vue';

    export default {
        data() {
            return {
                name: "",
                email: "",
                position: "",
                file: null
            }
        },
        methods: {
            SetSelectedPosition(position) {
                this.position = position;
            },
            HandleFileUpload(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.file = files[0];

                if (this.file) {
                    if (this.file.type != 'application/pdf') {
                        Swal.fire({
                            title: "Invalid file!",
                            text: "You must submit PDF file only!",
                            icon: 'error'
                        }).then((result) => {
                            if(result.isConfirmed) {
                                this.file = null;
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        title: "No file selected!",
                        text: "Please select a file to upload!",
                        icon: 'question'
                    }).then((result) => {
                        if(result.isConfirmed) {
                            this.file = null;
                        }
                    }); 
                }
            },
            SubmitForm(e) {
                var formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('position', this.position);
                
                // formData.append('name', "John Vincent Bonza");
                // formData.append('email', "jayveeinfinity@gmail.com");
                // formData.append('position', "New Consultant");
                if(this.file != null) {
                    formData.append('file', this.file);
                }

                this.Save(formData);
            },
            async Save(formData) {
                const response = await this.$http.post('/careers/store', formData)

                if(response.data.status === "success") {
                    this.ResetForm();
                    Swal.fire({
                        title: response.data.title,
                        text: response.data.message,
                        icon: response.data.status
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
                        icon: response.data.status
                    });
                }
                // const response = await this.$http.post('/career/store', formData)

                // if(response.data.status === "success") {
                //     this.ResetForm();
                //     Swal.fire({
                //         title: "Thank you!",
                //         text: "Successfully submitted your application!",
                //         icon: 'success'
                //     }).then((result) => {
                //         if(result.isConfirmed) {
                //             const buttonClose = document.getElementById('modalClose');
                //             buttonClose.click();
                //         }
                //     }); 
                // }
            },
            ResetForm() {
                // Reset the form fields
                this.name = '';
                this.email = '';
                this.position = "";
                this.file = null;
            }
        },
        computed: {
            ModalTitle() {
                return (this.position == 'NewAdvisor' ? 'new advisor' : 'experienced consultant')
            }
        },
        layout: Landing
    }
</script>