<template>
    <!-- <div class="container-fluid finark-bg-primary">
        <div class="container pt-2 pb-1 px-4 text-white d-flex justify-content-end align-items-center">
            <span class="me-2 fst-italic mb-1" style="font-size: 0.7rem;">Tel: <a class="finark-default-link text-white" href="tel:+65 9181 3260"><b>+65 9181 3260</b></a></span>
            <a class="finark-default-link text-white me-1" href="https://www.facebook.com/FinancialArk" target="_blank">
                <FontAwesomeIcon icon="fa-brands fa-facebook-square" class="fs-5" />
            </a>
            <a class="finark-default-link text-white me-1" href="https://www.instagram.com/finark.advisory/" target="_blank">
                <FontAwesomeIcon icon="fa-brands fa-instagram-square" class="fs-5" />
            </a>
            <a class="finark-default-link text-white me-1" href="https://www.youtube.com/@FinancialArk" target="_blank">
                <FontAwesomeIcon icon="fa-brands fa-youtube-square" class="fs-5" />
            </a>
            <a class="finark-default-link text-white me-1" href="https://www.linkedin.com/company/finarkgroup/" target="_blank">
                <FontAwesomeIcon icon="fa-brands fa-linkedin" class="fs-5" />
            </a>
            <a class="finark-default-link text-white me-1" href="https://wa.me/6591813260" target="_blank">
                <FontAwesomeIcon icon="fa-brands fa-whatsapp-square" class="fs-5" />
            </a>
        </div>
    </div> -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-lg navbar-dark mt-lg-3 mt-md-0">
        <div class="container-xxl container-xl container-lg container-md container-sm">
            <a href="/">
                <img src="/storage/images/brands/logo-banner.png" style="height: 5.125rem;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <FontAwesomeIcon icon="fa-solid fa-bars" class="finark-text-primary" style="font-size: 3rem !important;" />
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-lg-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="/">
                                <img src="/storage/images/brands/logo-banner.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span class="finark-bg-primary"></span>
                                <span class="finark-bg-primary"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navbar items -->
                <ul class="navbar-nav ml-auto" style="gap: 1rem;">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="/">
                            <span class="nav-link-inner--text fw-bold fa-2024-header-nav" :class="$page.component == 'Landing' ? 'active' : ''">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="/about">
                            <span class="nav-link-inner--text fw-bold fa-2024-header-nav" :class="$page.component == 'About' ? 'active' : ''">About Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="/services">
                            <span class="nav-link-inner--text fw-bold fa-2024-header-nav" :class="$page.component == 'Services' ? 'active' : ''">Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="/events">
                            <span class="nav-link-inner--text fw-bold fa-2024-header-nav" :class="$page.component == 'Events' ? 'active' : ''">Events</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="/blogs">
                            <span class="nav-link-inner--text fw-bold fa-2024-header-nav" :class="$page.component == 'Blogs' ? 'active' : ''">Blogs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="/careers">
                            <span class="nav-link-inner--text fw-bold fa-2024-header-nav" :class="$page.component == 'Careers' ? 'active' : ''">Careers</span>
                        </a>
                    </li>
                </ul>
                <a class="btn fa-2024-btn-wide px-lg-4 px-5 d-lg-inline-block d-block mt-lg-0 mt-3 ms-lg-3 ms-0" href="/signin">Log In</a>
            </div>
        </div>
    </nav>
</template>