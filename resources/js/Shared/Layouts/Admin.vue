<template>
    <body class="bg-landing-image w-100 vh-100">
        <div class="admin--main-content" :class="isSidebarShow">
            <div class="admin--header">
                <div class="row">
                    <div class="col">
                        <div class="admin--header--breadcrumb d-flex flex-row">
                            <div class="sidebar-icon-wrapper" @click.prevent="ToggleSidebar" >
                                <FontAwesomeIcon icon="fa-solid fa-bars-staggered" class="icon" v-if="Sidebar" />
                                <FontAwesomeIcon icon="fa-solid fa-bars" class="icon" v-if="!Sidebar" />
                            </div>
                            <div class="ps-3">
                                <h6>Dashboard</h6>
                                <p>
                                    Partners <FontAwesomeIcon icon="fa-solid fa-angles-right" class="icon" />
                                    Create
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <!-- <input class="form-control finark-bg-glass" placeholder="Search bar..."> -->
                    </div>
                    <div class="col">
                        <div class="d-flex flex-row justify-content-end align-items-center">
                            <button type="button" class="btn btn-sm text-white position-relative mx-3">
                                <FontAwesomeIcon icon="fa-solid fa-bell" />
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    99+
                                </span>
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="rounded-circle" src="https://randomuser.me/api/portraits/men/66.jpg" width="30">
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Activity</a></li>
                                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="admin--main">
                <div class="h-auto finark-bg-default-alt py-3 px-4">
                    <slot />
                </div>
            </div>
        </div>
        <div class="admin--sidebar" :class="isSidebarShow">
            <div class="admin--sidebar--wrapper overflow-hidden">
                <div class="admin--sidebar--content d-flex flex-column">
                    <div class="admin--sidebar--content--header">
                        <a href="/admin/home/">
                            <img src="/storage/images/brands/logo-banner-white.png" />
                        </a>
                        <div class="icon-wrapper text-center align-self-center" @click.prevent="ToggleSidebar" >
                            <FontAwesomeIcon icon="fa-solid fa-bars-staggered" class="icon" v-if="Sidebar" />
                            <FontAwesomeIcon icon="fa-solid fa-bars" class="icon" v-if="!Sidebar" />
                        </div>
                    </div>
                    <div class="admin--sidebar--content--user">
                        <div class="row">
                            <div class="col-lg-5 col-12 align-self-lg-start text-end">
                                <img class="admin--sidebar--content--user--avatar rounded-circle" src="https://randomuser.me/api/portraits/men/66.jpg" />
                            </div>
                            <div class="col-lg-7 col-12 align-self-center text-center">
                                <h6 class="admin--sidebar--content--user--name">John Vincent Bonza</h6>
                                <span class="admin--sidebar--content--user--role">Administrator</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="admin--sidebar--navigation">
                    <a class="nav--link d-flex justify-content-between" href="/admin/home">
                        <div>
                            <FontAwesomeIcon icon="fa-solid fa-gauge" class="nav--icon" /> Dashboard
                        </div>
                        <span class="badge rounded-pill text-bg-danger align-self-center">0</span>
                    </a>
                    <a class="nav--link d-flex justify-content-between" href="/admin/partners">
                        <div>
                            <FontAwesomeIcon icon="fa-solid fa-calendar-check" class="nav--icon" /> Appointments
                        </div>
                        <span class="badge rounded-pill text-bg-danger align-self-center">0</span>
                    </a>
                    <a class="nav--link">
                        <FontAwesomeIcon icon="fa-solid fa-newspaper" class="nav--icon" /> Blogs
                    </a>
                    <a class="nav--link">
                        <FontAwesomeIcon icon="fa-solid fa-user-tie" class="nav--icon" /> Careers
                    </a>
                    <a class="nav--link">
                        <FontAwesomeIcon icon="fa-solid fa-calendar-days" class="nav--icon" /> Events
                    </a>
                    <a class="nav--link" href="/admin/partners">
                        <FontAwesomeIcon icon="fa-solid fa-handshake" class="nav--icon" /> Partners
                    </a>
                    <a class="nav--link">
                        <FontAwesomeIcon icon="fa-solid fa-cog" class="nav--icon" /> Settings
                    </a>
                </div>
                <div class="admin--sidebar--footer text-center">
                    &copy; 2023 &sdot; FinArk
                </div>
            </div>
        </div>
    </body>
</template>

<script>
    export default {
        data() {
            return {
                Sidebar: true
            }
        },
        computed: {
            isSidebarShow() {
                return this.Sidebar ? 'show' : '';
            }
        },
        methods: {
            ToggleSidebar() {
                this.Sidebar = !this.Sidebar;
            }
        }
    }
</script>
