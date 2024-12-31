<template>
    <Head>
        <title>Dashboard &sdot; FinArk Admin Panel &sdot; </title>
    </Head>
    <div class="container-fluid py-4 px-5">
        <AdminHeader />
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 card border rounded-2">
                    <div class="p-4 card-body">
                        <div class="mb-3 text-center bg-dark shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                            <FontAwesomeIcon icon="fa-solid fa-calendar-check" class="fs-5 text-white" />
                        </div>
                        <p class="mb-1 text-sm">Appointments</p>
                        <h3 class="mb-0 font-weight-bold">{{ appointmentsCount ?? 0 }}
                            <!-- <span class="text-base font-weight-semibold text-success">
                            <svg class="mx-1 mb-2" width="11" height="6" viewBox="0 0 11 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.91583 5.83036C10.0289 5.71726 10.0855 5.58333 10.0855 5.42857C10.0855 5.27381 10.0289 5.13988 9.91583 5.02679L5.91583 1.02679C5.80273 0.913691 5.6688 0.857143 5.51404 0.857143C5.35928 0.857143 5.22535 0.913691 5.11226 1.02679L1.11226 5.02679C0.999161 5.13988 0.942614 5.27381 0.942614 5.42857C0.942614 5.58333 0.999161 5.71726 1.11226 5.83036C1.22535 5.94345 1.35928 6 1.51404 6H9.51404C9.6688 6 9.80273 5.94345 9.91583 5.83036Z" fill="#67C23A"></path>
                            </svg>
                            3.5%
                            </span> -->
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 card border rounded-2">
                    <div class="p-4 card-body">
                        <div class="mb-3 text-center bg-dark shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                            <FontAwesomeIcon icon="fa-solid fa-briefcase" class="fs-5 text-white" />
                        </div>
                        <p class="mb-1 text-sm">Career Applications</p>
                        <h3 class="mb-0 font-weight-bold">{{ careerApplicationsCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 card border rounded-2">
                    <div class="p-4 card-body">
                        <div class="mb-3 text-center bg-dark shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                            <FontAwesomeIcon icon="fa-solid fa-message" class="fs-5 text-white" />
                        </div>
                        <p class="mb-1 text-sm">Feedbacks</p>
                        <h3 class="mb-0 font-weight-bold">{{ feedbackCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mb-4 card border rounded-2">
                    <div class="p-4 card-body">
                        <div class="mb-3 text-center bg-dark shadow-xs shadow icon icon-shape border-radius-md d-flex align-items-center justify-content-center">
                            <FontAwesomeIcon icon="fa-solid fa-handshake" class="fs-5 text-white" />
                        </div>
                        <p class="mb-1 text-sm">Partners</p>
                        <h3 class="mb-0 font-weight-bold">{{ partnersCount ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4" v-if="helpers.hasRole('developer')">
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
            <div class="col-lg-8 col-md-12">
                <div class="card shadow-xs border">
                    <div class="card-header border-bottom pb-0">
                        <div class="d-sm-flex align-items-center mb-3">
                            <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Client Appointments</h6>
                            <p class="text-sm mb-sm-0 mb-2">These are details about the today's appointment</p>
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
                                <input type="radio" class="btn-check" name="btn-check-status" id="btn-today" autocomplete="off" checked>
                                <label class="btn btn-white px-3 mb-0" for="btn-today">Today</label>
                                <input type="radio" class="btn-check" name="btn-check-status" id="btn-upcoming" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="btn-upcoming">Upcoming</label>
                                <input type="radio" class="btn-check" name="btn-check-status" id="btn-pending" autocomplete="off">
                                <label class="btn btn-white px-3 mb-0" for="btn-pending">Pending</label>
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
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7">Client name / Email</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Date Time</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Assigned staff</th>
                                        <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Meeting status</th>
                                        <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <div class="px-2 ms-2">
                                                <p class="text-dark fw-bold text-sm mb-0">John Doe</p>
                                                <p class="text-secondary text-sm mb-0">johndoe@gmail.com</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-normal">3:00PM - 3:30PM</span>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2">
                                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                <img src="https://randomuser.me/api/portraits/men/27.jpg" class="w-80" alt="spotify">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Michael Jones</h6>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm border border-info text-info bg-info">Waiting</span>
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
                                        <td class="align-middle">
                                            <div class="px-2 ms-2">
                                                <p class="text-dark fw-bold text-sm mb-0">John Doe</p>
                                                <p class="text-secondary text-sm mb-0">johndoe@gmail.com</p>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-sm font-weight-normal">3:00PM - 3:30PM</span>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2">
                                            <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                                                <img src="https://randomuser.me/api/portraits/men/27.jpg" class="w-80" alt="spotify">
                                            </div>
                                            <div class="my-auto">
                                                <h6 class="mb-0 text-sm">Michael Jones</h6>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-sm border border-info text-info bg-info">Waiting</span>
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
        <div class="row" v-if="helpers.hasRole('developer')">
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
        </div>
        <Footer />
    </div>
</template>

<script setup>
    import helpers from '@shared/Helpers/Functions.js';
    import AdminHeader from '@shared/Partials/CorporateUI/AdminHeader.vue';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';

    const props = defineProps ({
        appointmentsCount: String,
        careerApplicationsCount: String,
        feedbackCount: String,
        partnersCount: String
    });
</script>

<script>
    import CorporateUI from '@shared/Layouts/CorporateUI.vue';

    // Charts.js
    import { Bar } from 'vue-chartjs';
    import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

    ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

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
        layout: CorporateUI
    }
</script>