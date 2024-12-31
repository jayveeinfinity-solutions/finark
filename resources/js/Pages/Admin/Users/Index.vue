<template>
    <Head>
        <title>Users &sdot; FinArk Admin Panel &sdot; </title>
    </Head>
    <div class="container-fluid py-4 px-5">
      <div class="row">
        <div class="col-12">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">User list ({{ users.data.length ?? 0 }})</h6>
                  <p class="text-sm">See information about all users</p>
                </div>
                <div class="ms-auto d-flex">
                  <!-- <button type="button" class="btn btn-sm btn-white me-2">
                    View all
                  </button> -->
                  <a href="/admin/users/create" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                    <span class="btn-inner--icon me-1">
                      <FontAwesomeIcon icon="fa-solid fa-user-plus" />
                    </span>
                    <span class="btn-inner--text">Add user</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body px-0 py-0">
              <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                <div class="btn-group" role="group">
                  <input type="radio" class="btn-check" name="btn-check-status" :id="'btn-all'" autocomplete="off" checked @click="applyType(search, 'All')" v-model="type" :value="'All'">
                  <label class="btn btn-white px-3 mb-0" :for="'btn-all'">All</label>
                  <input type="radio" class="btn-check" name="btn-check-status" :id="'btn-active'" autocomplete="off" @click="applyType(search, 'Active')" v-model="type" :value="'Active'">
                  <label class="btn btn-white px-3 mb-0" :for="'btn-active'">Active</label>
                  <input type="radio" class="btn-check" name="btn-check-status" :id="'btn-inactive'" autocomplete="off" @click="applyType(search, 'Inactive')" v-model="type" :value="'Inactive'">
                  <label class="btn btn-white px-3 mb-0" :for="'btn-inactive'">Inactive</label>
                </div>
                <div class="input-group w-sm-25 ms-auto">
                  <span class="input-group-text text-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                    </svg>
                  </span>
                  <input type="text" class="form-control" placeholder="Search" v-model="search">
                </div>
              </div>
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead class="bg-gray-100">
                    <tr>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Name / Email</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7">Role</th>
                      <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Status</th>
                      <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="user in users.data" :key="user.user_id">
                        <td class="align-middle">
                            <div class="d-flex px-2">
                                <div class="avatar rounded-circle me-1 finark-bg-gradient-primary">
                                  <span>{{ user.user_name[0].toUpperCase() }}</span>
                                </div>
                                <!-- <div class="avatar rounded-circle bg-gray-100 me-1 my-2">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png?20170328184010" class="w-80" alt="spotify">
                                </div> -->
                                <div class="my-auto">
                                    <div class="px-2">
                                        <p class="text-dark fw-bold text-sm mb-0"><a :href="'/admin/users/profile/' + user.user_id" class="text-primary">{{ user.user_name }}</a></p>
                                        <p class="text-secondary text-sm mb-0">{{ user.user_email }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                          <span class="mt-3 badge badge-sm border-radius-lg badge-primary">{{ helpers.deSlug(user.role_name) }}</span>
                        </td>
                        <td>
                          <span class="badge badge-sm border border-success text-success bg-success" v-if="user.active">Active</span>
                          <span class="badge badge-sm border border-danger text-danger bg-danger" v-if="!user.active">Inactive</span>
                        </td>
                        <td class="align-middle">
                            <a :href="'/admin/users/edit/' + user.user_id" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user"><svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path></svg>
                            </a>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <Pagination :links="users.links" :prevLink="users.prev_page_url" :nextLink="users.next_page_url" :lastPage="users.last_page"/>
            </div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
</template>

<script setup>
  import helpers from '@shared/Helpers/Functions.js';
  import Pagination from '@shared/Components/Pagination.vue';
  import Footer from '@shared/Partials/CorporateUI/Footer.vue';
  import { ref, watch } from 'vue';
  import { router  } from '@inertiajs/vue3';
  import debounce from 'lodash/debounce';

  const props = defineProps({
    users: Object,
    filters: Object,
  });
  
  let search = ref(props.filters.search);
  let type = ref(props.filters.type);

  watch(search, debounce(function(value) {
    applyType(value)
  }, 300));

  function applyType(search, type = 'All') {
    router.get('/admin/users',
        {
          search: search,
          type: type
        },
        { 
          preserveScroll: true,
          preserveState: true,
          replace: true
        }
    );
  }
</script>

<script>
  import CorporateUI from '@shared/Layouts/CorporateUI.vue';

  export default {
    layout: CorporateUI
  }
</script>