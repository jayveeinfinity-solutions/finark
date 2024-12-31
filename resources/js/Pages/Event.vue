<template>
    <Head title="Events &sdot; " />
    <body class="bg-white">
        <div class="main-content">
            <Header />
        </div>
        <div class="header pt-5 pb-1 bg-landing-image">
            <div class="container">
                <div class="header-body text-center mt-7 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="finark-landing-h1 finark-fw-800 text-white text-left text-uppercase text-shadow-landing">Events</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100" style="height: 100px !important;">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <div class="container mt-5">
            <div class="p-5 mb-4 finark-bg-radial-gradient rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold text-white">.NET Conf Philippines 2022</h1>
                    <p class="col-md-8 fs-4 text-light">For the first time in 3 years, we're going to have .NET Conf live! Join us on December 14 at Microsoft Philippines for .NET Conf Philippines 2022! The event starts at 6:00 PM.</p>
                    <button class="btn btn-danger btn-lg" type="button">Join event</button>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h1 class="finark-fw-800 text-uppercase">Upcoming</h1>
            <div class="finark-landing-separator rounded mb-4"></div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow rounded d-flex flex-row">
                        <div class="p-5 finark-bg-primary rounded align-self-stretch d-lg-block d-none">
                            <h1 class="fs-1 text-white">8th</h1>
                            <p class="text-light text-center">Aug 8</p>
                        </div>
                        <div class="p-5">
                            <span class="badge finark-bg-primary d-lg-none d-sm-inline-block">8th Aug 2023</span>
                            <h1 class="text-uppercase fw-bold">Google I/O Extended Manila 2023</h1>
                            <p class="font-weight-400">Google I/O is an annual developer conference held by Google in Mountain View, California. "I/O" stands for Input/Output, as well as the slogan "Innovation in the Open".</p>
                            <p class="font-weight-400">
                                <FontAwesomeIcon icon="fa-solid fa-location-dot" class="text-finark" /> <a href="https://gdg.community.dev/events/details/google-gdg-manila-presents-google-io-extended-manila-2022/#event-info">Bonifacio High Street, Cinema 2 - 3F Central Square, 5th Avenue cor. 30th Street, Bonifacio Global City Taguig, 1119</a>
                            </p>
                            <button class="btn btn-danger">View details</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </body>
</template>

<script setup>
    import Header from './../Shared/Partials/Header.vue';
    import Footer from './../Shared/Partials/Footer.vue';
</script>