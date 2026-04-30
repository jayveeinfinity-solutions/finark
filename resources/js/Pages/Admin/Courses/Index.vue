<template>
    <Head title="Courses &sdot; FinArk Admin Panel &sdot;" />
    <div class="container-fluid py-4 px-5">
        <AdminHeader class="mt-1" />
        <div class="row" v-if="helpers.hasRole('admin', 'developer')">
            <div class="col-xl-3 col-sm-6 mb-xl-0">
                <div class="card border shadow-xs mb-4">
                    <div class="card-body text-start p-3 w-100">
                        <div class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                            <FontAwesomeIcon icon="fa-solid fa-film" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total courses</p>
                                    <h4 class="mb-2 font-weight-bold">{{ totalCourses }}</h4>
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
                            <FontAwesomeIcon icon="fa-solid fa-video" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total videos</p>
                                    <h4 class="mb-2 font-weight-bold">{{ totalVideos }}</h4>
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
                            <FontAwesomeIcon icon="fa-solid fa-eye" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total videos completed</p>
                                    <h4 class="mb-2 font-weight-bold">{{ totalVideosCompleted }}</h4>
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
                            <FontAwesomeIcon icon="fa-solid fa-users" />
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="w-100">
                                    <p class="text-sm text-secondary mb-1">Total users completed</p>
                                    <h4 class="mb-2 font-weight-bold">{{ totalUsersCompleted }}</h4>
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
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <div class="card shadow-xs border mb-4 pb-3">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-0 font-weight-semibold text-lg">Courses</h6>
                        <p class="text-sm mb-1">Here you will find video courses that could help you to grow your skills.</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-xl-4 col-md-6 mb-xl-4 mb-4" v-if="helpers.hasRole('admin', 'developer')">
                                <div class="px-5 border border-dashed card h-100 card-plain border-light">
                                    <div class="text-center card-body d-flex flex-column justify-content-center">
                                        <Link href="/admin/courses/create">
                                            <div class="mx-auto mb-2 text-center text-white icon icon-shape bg-dark rounded-circle d-flex align-items-center justify-content-center">
                                                <FontAwesomeIcon icon="fa-solid fa-film"/>
                                            </div>
                                            <h5 class="text-lg text-dark"> Create new course</h5>
                                            <p class="mb-0 text-sm text-secondary">Add course and upload your videos.</p>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 mb-xl-4 mb-4" v-for="course in courses.data" :key="course.id">
                                <div class="mb-4 card card-background card-background-after-none align-items-start">
                                    <div class="bg-cover full-background" :style="{ 'background-image': 'url(' + $page.props.r2Endpoint + '/courses/posters/' + course.poster + ')'}"></div>
                                    <span class="mask bg-dark opacity-1 border-radius-lg"></span>
                                    <div class="p-3 card-body text-start w-100">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-3 mt-8 border border-white shadow blur d-flex align-items-center w-100 border-radius-md">
                                                    <div class="w-50">
                                                        <p class="mb-1 text-sm text-dark font-weight-bold">{{ course.name }} <span class="badge badge-sm badge-danger" v-if="!course.visibility">Unlisted</span></p>
                                                        <p class="mb-0 text-xs text-secondary">{{ course.user.name }}</p>
                                                    </div>
                                                    <p class="text-sm text-dark font-weight-bold ms-auto">{{ course.tag}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a :href="'/admin/courses/' + course.id">
                                    <h4 class="font-weight-semibold mb-0">{{ course.name }}</h4>
                                </a>
                                <span class="badge badge-info me-3 text-dark"><FontAwesomeIcon icon="fa-solid fa-film" /> {{ course.videos.length }} episodes</span>
                                <span class="badge badge-info me-3 text-dark"><FontAwesomeIcon icon="fa-solid fa-clock" /> {{ course.time_humans }}</span>
                                <p class="p-2 mb-4 text-truncate-container" v-html="course.description" style="height: 200px;"></p>
                                <a :href="'/admin/courses/' + course.id" class="btn btn-block finark-bg-primary text-white font-weight-semibold mt-auto w-100 mb-0 align-self-end">
                                    <span v-if="helpers.hasRole('admin', 'developer')">View course</span>
                                    <span v-if="!helpers.hasRole('admin', 'developer')">Watch course</span>
                                    <i class="fas fa-eye text-sm ms-1"></i>
                                </a>
                            </div>
                            <!-- <div class="col-xl-4 col-md-6 mb-xl-0 mb-4">
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
                                <a href="javascript:;" class="btn btn-block finark-bg-primary text-white font-weight-semibold mt-auto w-100 mb-5 align-self-bottom">
                                    Watch course
                                    <i class="fas fa-eye text-sm ms-1"></i>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script setup>
    import AdminHeader from '@shared/Partials/CorporateUI/AdminHeader.vue';
    import Footer from '@shared/Partials/CorporateUI/Footer.vue';
    import helpers from '@shared/Helpers/Functions.js';

    const props = defineProps({
        courses: Object,
        totalCourses: {
            default: 0,
            type: Number
        },
        totalVideos: {
            default: 0,
            type: Number
        },
        totalVideosCompleted: {
            default: 0,
            type: Number
        },
        totalUsersCompleted: {
            default: 0,
            type: Number
        }
    });
</script>

<style scoped>
ul.sort {
    list-style: none;
    padding: 0;
    margin: 30px;
}

li.sort-item {
    padding: 10px;
    width: 25%;
    float: left;
    margin: 0 10px 10px 0;
    background: #EFEFEF;
    border: solid 1px #CCC;
}

.sort-ghost {
    opacity: 0.3;
    transition: all 0.7s ease-out;
}

.text-truncate-container {
    line-clamp: 5;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>