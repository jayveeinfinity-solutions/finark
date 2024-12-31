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
    <body class="bg-white">
        <div class="main-content">
            <Header />
        </div>
        <div class="header pt-5 pb-1 bg-landing-image">
            <div class="container">
                <div class="header-body text-center mt-7 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="finark-landing-h1 finark-fw-800 text-white text-left text-uppercase text-shadow-landing">
                                <span v-if="$page.component == 'About'">About Us</span>
                                <span v-else-if="$page.component == 'Services'">Our Services</span>
                                <span v-else>{{ $page.component }}</span>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="separator separator-bottom separator-skew zindex-100" style="height: 100px !important;">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div> -->
        </div>
        <slot/>
        <Footer />
    </body>
</template>

<script setup>
    import Header from './../Partials/Header';
    import Footer from './../Partials/Footer';
</script>