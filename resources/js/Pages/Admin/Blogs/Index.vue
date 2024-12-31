<template>
    <Head title="Blogs &sdot; Admin Panel &sdot;" />
    <div class="container-fluid py-4 px-5">
        <AdminHeader />
        <div class="row mt-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <FontAwesomeIcon icon="fa-solid fa-eye" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total Views</p>
                                    <h4 class="mb-2 font-weight-bold">0</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <span class="text-sm text-success font-weight-bolder">
                                            <i class="fa fa-chevron-up text-xs me-1"></i>0%
                                        </span>
                                        <span class="text-sm ms-1"></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <FontAwesomeIcon icon="fa-solid fa-newspaper" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Blogs</p>
                                    <h4 class="mb-2 font-weight-bold">0</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <span class="text-sm text-success font-weight-bolder">
                                            <i class="fa fa-chevron-up text-xs me-1"></i>0%
                                        </span>
                                        <span class="text-sm ms-1">0</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <FontAwesomeIcon icon="fa-solid fa-check" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Active blogs</p>
                                    <h4 class="mb-2 font-weight-bold">0</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <span class="text-sm text-success font-weight-bolder">
                                            <i class="fa fa-chevron-up text-xs me-1"></i>0%
                                        </span>
                                        <span class="text-sm ms-1">0</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <FontAwesomeIcon icon="fa-solid fa-ban" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Inactive blogs</p>
                                    <h4 class="mb-2 font-weight-bold">{{ appointmentsCount ?? 0 }}</h4>
                                    <div class="d-flex align-items-center">
                                        <!-- <span class="text-sm text-success font-weight-bolder">
                                            <i class="fa fa-chevron-up text-xs me-1"></i>0%
                                        </span>
                                        <span class="text-sm ms-1">0</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card shadow-xs border mb-4 pb-3">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0 font-weight-semibold text-lg">Blogs</h6>
                        <p class="text-sm mb-1">Here you will find video courses that could help you to grow your skills.</p>
                    </div>
                    <div class="card-body p-3">
                        <dragdrop></dragdrop>
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
                                <div class="px-5 border border-dashed card h-100 card-plain border-light">
                                    <div class="text-center card-body d-flex flex-column justify-content-center">
                                        <Link href="/admin/courses/create">
                                            <div class="mx-auto mb-2 text-center text-white icon icon-shape bg-dark rounded-circle d-flex align-items-center justify-content-center">
                                                <FontAwesomeIcon icon="fa-solid fa-edit"/>
                                            </div>
                                            <h5 class="text-lg text-dark"> Create new blog</h5>
                                            <p class="mb-0 text-sm text-secondary">Write content to the editor and post to blogs.</p>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
                                <div class="mb-4 card card-background card-background-after-none align-items-start">
                                    <div class="bg-cover full-background" style="background-image: url('https://images.unsplash.com/photo-1637763723578-79a4ca9225f7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80')"></div>
                                    <span class="mask bg-dark opacity-1 border-radius-lg"></span>
                                    <div class="p-3 card-body text-start w-100">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-3 mt-8 border border-white shadow blur d-flex align-items-center w-100 border-radius-md">
                                                    <div class="w-50">
                                                        <p class="mb-1 text-sm text-dark font-weight-bold">Sara Lamalo</p>
                                                        <p class="mb-0 text-xs text-secondary">20 Jul 2022</p>
                                                    </div>
                                                    <p class="text-sm text-dark font-weight-bold ms-auto">Growth</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:;">
                                    <h4 class="font-weight-semibold">Supplementary Retirement Scheme SRS Boosting Your Savings Through Tax Relief</h4>
                                </a>
                                <p class="mb-4">The Supplementary Retirement Scheme (SRS) is a program designed by the Singapore Ministry of Finance to provide attractive tax incentives to citizens and foreigners alike who are looking to save more for their retirement.</p>
                                <a href="javascript:;" class="mt-auto mb-5 text-dark font-weight-semibold icon-move-right w-100"> Read post <i class="text-sm fas fa-arrow-right-long ms-1" aria-hidden="true"></i></a>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
                                <div class="card card-background border-radius-xl card-background-after-none align-items-start mb-4">
                                    <div class="full-background bg-cover" style="background-image: url('https://images.unsplash.com/photo-1517554558809-9b4971b38f39?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80')"></div>
                                    <span class="mask bg-dark opacity-1 border-radius-lg"></span>
                                    <div class="card-body text-start p-3 w-100">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="blur shadow d-flex align-items-center w-100 border-radius-md border border-white mt-8 p-3">
                                                    <div class="w-50">
                                                        <p class="text-dark text-sm font-weight-bold mb-1">Charles Deluvio</p>
                                                        <p class="text-xs text-secondary mb-0">17 Jul 2022</p>
                                                    </div>
                                                    <p class="text-dark text-sm font-weight-bold ms-auto">Education</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript:;">
                                    <h4 class="font-weight-semibold">
                                    Don't be afraid to be wrong
                                    </h4>
                                </a>
                                <p class="mb-4">
                                As Uber works through a huge amount of internal management turmoil.
                                </p>
                                <a href="javascript:;" class="btn btn-block finark-bg-primary text-white font-weight-semibold mt-auto w-100 mb-5">
                                    Watch course
                                    <i class="fas fa-eye text-sm ms-1"></i>
                                </a>
                                <!-- <a href="javascript:;" class=" text-dark font-weight-semibold icon-move-right mt-auto w-100 mb-5">
                                    Read post
                                    <i class="fas fa-arrow-right-long text-sm ms-1" aria-hidden="true"></i>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row mb-4">
            <div class="col-lg-4 col-md-6 mb-md-0 mb-4">
            <div class="card shadow-xs border h-100">
                <div class="card-header pb-0">
                <h6 class="font-weight-semibold text-lg mb-0">Balances over time</h6>
                <p class="text-sm">Here you have details about the balance.</p>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-white px-3 mb-0" for="btnradio1">12 months</label>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-white px-3 mb-0" for="btnradio2">30 days</label>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                    <label class="btn btn-white px-3 mb-0" for="btnradio3">7 days</label>
                </div>
                </div>
                <div class="card-body py-3">
                <div class="chart mb-2">
                    <Bar
                        id="my-chart-id"
                        :options="chartOptions"
                        :data="chartData"
                    />
                </div>
                <button class="btn btn-white mb-0 ms-auto">View report</button>
                </div>
            </div>
            </div>
            <div class="col-lg-8 col-md-6">
            <div class="card shadow-xs border">
                <div class="card-header border-bottom pb-0">
                <div class="d-sm-flex align-items-center mb-3">
                    <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Recent transactions</h6>
                    <p class="text-sm mb-sm-0 mb-2">These are details about the last transactions</p>
                    </div>
                    <div class="ms-auto d-flex">
                    <button type="button" class="btn btn-sm btn-white mb-0 me-2">
                        View report
                    </button>
                    <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center mb-0">
                        <span class="btn-inner--icon">
                        <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-block me-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                        </span>
                        <span class="btn-inner--text">Download</span>
                    </button>
                    </div>
                </div>
                <div class="pb-3 d-sm-flex align-items-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked>
                    <label class="btn btn-white px-3 mb-0" for="btnradiotable1">All</label>
                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off">
                    <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Monitored</label>
                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                    <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Unmonitored</label>
                    </div>
                    <div class="input-group w-sm-25 ms-auto">
                    <span class="input-group-text text-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
                </div>
                <div class="card-body px-0 py-0">
                <div class="table-responsive p-0">
                    <table class="table align-items-center justify-content-center mb-0">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Transaction</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Amount</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Date</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Account</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <div class="d-flex px-2">
                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/small-logos/logo-spotify.svg" class="w-80" alt="spotify">
                            </div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm">Spotify</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-normal mb-0">$2,500</p>
                        </td>
                        <td>
                            <span class="text-sm font-weight-normal">Wed 3:00pm</span>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex">
                            <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/logos/visa.png" class="w-90 mx-auto" alt="visa">
                            </div>
                            <div class="ms-2">
                                <p class="text-dark text-sm mb-0">Visa 1234</p>
                                <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                            </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                            <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                            </svg>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="d-flex px-2">
                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/small-logos/logo-invision.svg" class="w-80" alt="invision">
                            </div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm">Invision</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-normal mb-0">$5,000</p>
                        </td>
                        <td>
                            <span class="text-sm font-weight-normal">Wed 1:00pm</span>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex">
                            <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/logos/mastercard.png" class="w-90 mx-auto" alt="mastercard">
                            </div>
                            <div class="ms-2">
                                <p class="text-dark text-sm mb-0">Mastercard 1234</p>
                                <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                            </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                            <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                            </svg>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="d-flex px-2">
                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/small-logos/logo-jira.svg" class="w-80" alt="jira">
                            </div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm">Jira</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-normal mb-0">$3,400</p>
                        </td>
                        <td>
                            <span class="text-sm font-weight-normal">Mon 7:40pm</span>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex">
                            <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/logos/mastercard.png" class="w-90 mx-auto" alt="mastercard">
                            </div>
                            <div class="ms-2">
                                <p class="text-dark text-sm mb-0">Mastercard 1234</p>
                                <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                            </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                            <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                            </svg>
                            </a>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            <div class="d-flex px-2">
                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/small-logos/logo-slack.svg" class="w-80" alt="slack">
                            </div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-sm">Slack</h6>
                            </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-sm font-weight-normal mb-0">$1,000</p>
                        </td>
                        <td>
                            <span class="text-sm font-weight-normal">Wed 5:00pm</span>
                        </td>
                        <td class="align-middle">
                            <div class="d-flex">
                            <div class="border px-1 py-1 text-center d-flex align-items-center border-radius-sm my-auto">
                                <img src="https://demos.creative-tim.com/corporate-ui-dashboard/assets/img/logos/visa.png" class="w-90 mx-auto" alt="visa">
                            </div>
                            <div class="ms-2">
                                <p class="text-dark text-sm mb-0">Visa 1234</p>
                                <p class="text-secondary text-sm mb-0">Expiry 06/2026</p>
                            </div>
                            </div>
                        </td>
                        <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                            <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                            </svg>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="card shadow-xs border">
                <div class="card-header pb-0">
                <div class="d-sm-flex align-items-center mb-3">
                    <div>
                    <h6 class="font-weight-semibold text-lg mb-0">Overview balance</h6>
                    <p class="text-sm mb-sm-0 mb-2">Here you have details about the balance.</p>
                    </div>
                    <div class="ms-auto d-flex">
                    <button type="button" class="btn btn-sm btn-white mb-0 me-2">
                        View report
                    </button>
                    </div>
                </div>
                <div class="d-sm-flex align-items-center">
                    <h3 class="mb-0 font-weight-semibold">$87,982.80</h3>
                    <span class="badge badge-sm border border-success text-success bg-success border-radius-sm ms-sm-3 px-2">
                    <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.46967 4.46967C0.176777 4.76256 0.176777 5.23744 0.46967 5.53033C0.762563 5.82322 1.23744 5.82322 1.53033 5.53033L0.46967 4.46967ZM5.53033 1.53033C5.82322 1.23744 5.82322 0.762563 5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967L5.53033 1.53033ZM5.53033 0.46967C5.23744 0.176777 4.76256 0.176777 4.46967 0.46967C4.17678 0.762563 4.17678 1.23744 4.46967 1.53033L5.53033 0.46967ZM8.46967 5.53033C8.76256 5.82322 9.23744 5.82322 9.53033 5.53033C9.82322 5.23744 9.82322 4.76256 9.53033 4.46967L8.46967 5.53033ZM1.53033 5.53033L5.53033 1.53033L4.46967 0.46967L0.46967 4.46967L1.53033 5.53033ZM4.46967 1.53033L8.46967 5.53033L9.53033 4.46967L5.53033 0.46967L4.46967 1.53033Z" fill="#67C23A"></path>
                    </svg>
                    10.5%
                    </span>
                </div>
                </div>
                <div class="card-body p-3">
                <div class="chart mt-n6">
                </div>
                </div>
            </div>
            </div>
        </div> -->
        <Footer />
    </div>
</template>

<script setup>
    import AdminHeader from '@shared/Partials/CorporateUI/AdminHeader.vue';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';
</script>

<script>
    import CorporateUI from '@shared/Layouts/CorporateUI.vue';
    import { Bar } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

    export default {
        components: { Bar },
        data() {
            return {
                chartData: {
                    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
                    datasets: [{
                        label: "Sales",
                        tension: 0.4,
                        borderWidth: 0,
                        borderSkipped: false,
                        backgroundColor: "#2ca8ff",
                        data: [450, 200, 100, 220, 500, 100, 400, 230, 500, 200],
                        maxBarThickness: 6
                    },
                    {
                        label: "Sales",
                        tension: 0.4,
                        borderWidth: 0,
                        borderSkipped: false,
                        backgroundColor: "#7c3aed",
                        data: [200, 300, 200, 420, 400, 200, 300, 430, 400, 300],
                        maxBarThickness: 6
                    }],
                },
                chartOptions: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            backgroundColor: '#fff',
                            titleColor: '#1e293b',
                            bodyColor: '#1e293b',
                            borderColor: '#e9ecef',
                            borderWidth: 1,
                            usePointStyle: true
                        }
                    },
                    interaction: {
                        intersect: false,
                        mode: 'index',
                    },
                    scales: {
                        y: {
                            stacked: true,
                            grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [4, 4],
                            },
                            ticks: {
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                            },
                        },
                        x: {
                            stacked: true,
                            grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                            },
                            ticks: {
                            font: {
                                size: 12,
                                family: "Noto Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#64748B"
                            },
                        },
                    },
                }
            }
        },
        props: {
            appointmentsCount: Number
        },
        layout: CorporateUI
    }
</script>