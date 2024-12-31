<template>
    <Head>
        <!-- Main meta tags -->
        <meta head-key="description" name="description" content="We provide quality financial advice and competitive financial products and solutions our clients - serving in our clients' needs." />
        <meta head-key="author" name="author" content="John Vincent Bonza - Full Stack Developer - Infinity Solutions former Infinity Brackets">
        <meta head-key="keywords" name="keywords" content="financial, advisory, insurance, partners, life, finark, clients, solutions, financial advisory, insurance partners, we provide, advisory practice, financial consultants, support them, advisory firm">
        <!-- Social media meta tags -->
        <meta head-key="social-title" property="og:title" content="FinArk &sdot; Transforming the way financial advisory is done">
        <meta head-key="social-description" property="og:description" content="We provide quality financial advice and competitive financial products and solutions our clients - serving in our clients' needs.">
        <meta head-key="social-image" property="og:image" content="http://fin-ark.com/storage/images/backgrounds/landing-image.jpeg">
        <meta head-key="social-url" property="og:url" content="http://fin-ark.com/">
        <meta head-key="social-type" property="og:type" content="website">
        <!-- Twitter meta tags -->
        <meta head-key="twitter-title" property="twitter:title" content="FinArk &sdot; Transforming the way financial advisory is done">
        <meta head-key="twitter-description" property="twitter:description" content="We provide quality financial advice and competitive financial products and solutions our clients - serving in our clients' needs.">
        <meta head-key="twitter-image" property="twitter:image" content="http://fin-ark.com/storage/images/backgrounds/landing-image.jpeg">
        <meta content="summary_large_image" name="twitter:card">
    </Head>
    <body class="finark-bg-default">
        <AdminNav v-show="$page.props.auth != null" />
        <div class="main-content">
            <Header />
        </div>
        <div class="header py-md-5 py-2 bg-landing-image-7">
            <div class="container-xxl container-xl container-lg container-md container-sm">
                <div class="header-body text-center mt-7 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <div class="align-self-center">
                                    <h1 class="finark-landing-featured-h1 text-white text-start finark-text-shadow fw-normal lh-1" v-if="$page.component == 'Landing'">
                                        Navigating the<br>ever-changing<br><span class="finark-fw-800">Financial Seas</span>
                                    </h1>
                                    <h1 class="finark-landing-featured-h1 finark-fw-800 text-white text-start text-uppercase finark-text-shadow">
                                        <span v-if="$page.component == 'About'">About Us</span>
                                        <span v-else-if="$page.component == 'Partners'">Our Partners</span>
                                        <span v-else-if="$page.component == 'Services'">Our Services</span>
                                        <span v-else-if="$page.component == 'Contact'">Contact Us</span>
                                        <span v-else-if="$page.component != 'Landing'">{{ $page.component }}</span>
                                    </h1>
                                </div>
                                <div class="d-flex flex-column align-self-center" v-if="$page.component == 'Landing'">
                                    <div class="bg-white mx-auto mb-3 d-lg-block d-none" style="width: 3px; height: 50px;"></div>
                                    <div class="pt-2 pb-1 px-4 text-white d-flex flex-column justify-content-end align-items-center">
                                        <!-- <span class="me-2 fst-italic mb-1" style="font-size: 0.7rem;">Tel: <a class="finark-default-link text-white" href="tel:+65 9181 3260"><b>+65 9181 3260</b></a></span> -->
                                        <a class="finark-default-link text-white mb-1" href="https://www.facebook.com/FinancialArk" target="_blank">
                                            <FontAwesomeIcon icon="fa-brands fa-facebook" class="fs-4 text-white" />
                                        </a>
                                        <a class="finark-default-link text-white mb-1" href="https://www.instagram.com/finark.advisory/" target="_blank">
                                            <FontAwesomeIcon icon="fa-brands fa-instagram-square" class="fs-4 text-white" />
                                        </a>
                                        <a class="finark-default-link text-white mb-1" href="https://www.youtube.com/@FinancialArk" target="_blank">
                                            <FontAwesomeIcon icon="fa-brands fa-youtube-square" class="fs-4 text-white" />
                                        </a>
                                        <a class="finark-default-link text-white mb-1" href="https://www.linkedin.com/company/finarkgroup/" target="_blank">
                                            <FontAwesomeIcon icon="fa-brands fa-linkedin" class="fs-4 text-white" />
                                        </a>
                                        <a class="finark-default-link text-white mb-1" href="https://wa.me/6591813260" target="_blank">
                                            <FontAwesomeIcon icon="fa-solid fa-envelope" class="fs-4 text-white" />
                                        </a>
                                    </div>
                                    <div class="bg-white mx-auto mt-2 d-lg-block d-none" style="width: 3px; height: 50px;"></div>
                                </div>
                            </div>
                            <!-- <h1 class="finark-landing-featured-h1 text-white text-left finark-text-shadow">
                                <span v-if="$page.component == 'Landing'">Navigating the<br>ever-changing<br><span class="finark-fw-800">Financial Seas</span></span>
                                <span v-else-if="$page.component == 'About'">About Us</span>
                                <span v-else-if="$page.component == 'Partners'">Our Partners</span>
                                <span v-else-if="$page.component == 'Services'">Our Services</span>
                                <span v-else-if="$page.component == 'Contact'">Contact Us</span>
                                <span v-else>{{ $page.component }}</span>
                            </h1> -->
                        </div>
                        <!-- <div class="col-12" v-if="$page.component == 'Landing'">
                            <p class="finark-landing-featured-p text-white text-left finark-text-shadow font-weight-400">We provide quality financial advice and competitive financial products and solutions our clients - serving in our clients' needs.</p>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- <div class="separator separator-bottom separator-skew zindex-100" style="height: 100px !important;">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div> -->
        </div>
        <slot/>
        <Footer />
        <FeedbackModal />
    </body>
</template>

<script setup>
    import Header from '@shared/Partials/Header.vue';
    import Footer from '@shared/Partials/Footer.vue';
    
    import FeedbackModal from '@shared/Components/FeedbackModal.vue';

    import AdminNav from '@shared/Partials/CorporateUI/AdminNav.vue';
</script>

<script>
    export default {
        computed: {
            username () {
                return this.$page.props.auth !== null ? this.$page.props.auth.user.username : '';
            }
        }
    }
</script>
