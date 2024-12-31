<template>
    <Head>
        <title>Sign in &sdot; FinArk &sdot; Navigating the Ever-Changing Financial Seas</title>
        <link rel="canonical" href="http://fin-ark.com/">
    </Head>
    <div class="main-content">
        <Header />
    </div>
    <div class="container-fluid py-5">
        <div class="container p-0 p-lg-5">
            <div class="d-flex justify-content-center">
                <form class="finark-bg-signin finark-signin-form">
                    <h2 class="text-white text-uppercase mb-4">Sign In</h2>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group text-center">
                    <button class="btn finark-bg-primary text-white">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <Footer />
</template>

<script setup>
    import Header from './../Shared/Partials/Header.vue';
    import Footer from './../Shared/Partials/Footer.vue';
</script>

<script>
    import LandingAlt from './../Shared/Layouts/LandingAlt.vue';

    export default {
        layout: LandingAlt
    }
</script>