<template>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand d-flex align-items-center m-0" href="/admin">
                <img src="/storage/images/brands/logo-banner-white.png" />
                <!-- <span class="font-weight-bold text-lg">FinArk</span> -->
            </a>
        </div>
        <div class="collapse navbar-collapse px-4 w-auto " id="sidenav-collapse-main" style="height: calc(100vh - 150px); overflow-x: hidden;">
            <ul class="navbar-nav">
                <li class="nav-item" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link active" href="/admin/dashboard">
                        <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <FontAwesomeIcon icon="fa-solid fa-gauge" class="text-white" />
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </Link>
                </li>
                <li class="nav-item">
                    <Link class="nav-link active" href="/admin/forum">
                        <div class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <FontAwesomeIcon icon="fa-solid fa-comments" class="text-white" />
                        </div>
                        <span class="nav-link-text ms-1">Forum</span>
                    </Link>
                </li>
                <li class="nav-item mt-2">
                    <div class="d-flex align-items-center nav-link">
                        <FontAwesomeIcon icon="fa-solid fa-globe" />
                        <span class="font-weight-normal text-md ms-2">FinArk Management</span>
                    </div>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/okr">
                        <FontAwesomeIcon icon="fa-solid fa-bullseye" />
                        <span class="nav-link-text ms-1">Vision & OKR</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/courses">
                        <FontAwesomeIcon icon="fa-solid fa-film" />
                        <span class="nav-link-text ms-1">Training courses</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/product-comparison">
                        <FontAwesomeIcon icon="fa-solid fa-question-circle" />
                        <span class="nav-link-text ms-1">Product Comparison</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/contributions">
                        <FontAwesomeIcon icon="fa-solid fa-hands-helping" />
                        <span class="nav-link-text ms-1">Contributions</span>
                    </Link>
                </li>
                <li class="nav-item mt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <div class="d-flex align-items-center nav-link">
                        <FontAwesomeIcon icon="fa-solid fa-user-friends" />
                        <span class="font-weight-normal text-md ms-2">Client Management</span>
                    </div>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/appointments">
                        <FontAwesomeIcon icon="fa-solid fa-calendar-check" />
                        <span class="nav-link-text ms-1">Appointments</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/clients">
                        <FontAwesomeIcon icon="fa-solid fa-user-friends" />
                        <span class="nav-link-text ms-1">Clients</span>
                    </Link>
                </li>
                <li class="nav-item mt-2">
                    <div class="d-flex align-items-center nav-link" v-if="helpers.hasRole('admin', 'developer')">
                        <FontAwesomeIcon icon="fa-solid fa-sitemap" />
                        <span class="font-weight-normal text-md ms-2">Content Management</span>
                    </div>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/blogs">
                        <FontAwesomeIcon icon="fa-solid fa-newspaper" />
                        <span class="nav-link-text ms-1">Blogs</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/events">
                        <FontAwesomeIcon icon="fa-solid fa-calendar-days" />
                        <span class="nav-link-text ms-1">Events</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/partners">
                        <FontAwesomeIcon icon="fa-solid fa-handshake" />
                        <span class="nav-link-text ms-1">Partners</span>
                    </Link>
                </li>
                <li class="nav-item mt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <div class="d-flex align-items-center nav-link">
                        <FontAwesomeIcon icon="fa-solid fa-users" />
                        <span class="font-weight-normal text-md ms-2">Recruitment Management</span>
                    </div>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/careers">
                        <FontAwesomeIcon icon="fa-solid fa-user-tie" />
                        <span class="nav-link-text ms-1">Careers</span>
                    </Link>
                </li>
                <li class="nav-item mt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <div class="d-flex align-items-center nav-link">
                        <FontAwesomeIcon icon="fa-solid fa-key" />
                        <span class="font-weight-normal text-md ms-2">Access Management</span>
                    </div>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('admin', 'developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/users">
                        <FontAwesomeIcon icon="fa-solid fa-users" />
                        <span class="nav-link-text ms-1">Users</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/roles">
                        <FontAwesomeIcon icon="fa-solid fa-id-badge" />
                        <span class="nav-link-text ms-1">Roles</span>
                    </Link>
                </li>
                <li class="nav-item border-start my-0 pt-2" v-if="helpers.hasRole('developer')">
                    <Link class="nav-link position-relative ms-0 ps-2 py-2 " href="/admin/permissions">
                        <FontAwesomeIcon icon="fa-solid fa-clipboard-check" />
                        <span class="nav-link-text ms-1">Permissions</span>
                    </Link>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-4">
            <!-- <div class="card" id="sidenavCard">
                <div class="card-body  text-start p-3 w-100">
                    <div class="mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="text-primary" viewBox="0 0 24 24" fill="currentColor" id="sidenavCardIcon">
                        <path d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625z" />
                        <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                        </svg>
                    </div>
                    <div class="docs-info">
                        <h6 class="font-weight-bold up mb-2">Need help?</h6>
                        <p class="text-sm font-weight-normal">Please check our docs.</p>
                        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/corporate-ui-dashboard" target="_blank" class="font-weight-bold text-sm mb-0 icon-move-right mt-auto w-100 mb-0">
                        Documentation
                        <i class="fas fa-arrow-right-long text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div> -->
            <div class="d-flex justify-content-center pt-3">
                <a class="btn btn-sm btn-danger" href="/signout">
                    <FontAwesomeIcon icon="fa-solid fa-sign-out-alt" />
                    <span class="nav-link-text ms-1">Sign out</span>
                </a>
            </div>
        </div>
    </aside>
</template>

<script setup>
    import helpers from './../../../Shared/Helpers/Functions';
</script>