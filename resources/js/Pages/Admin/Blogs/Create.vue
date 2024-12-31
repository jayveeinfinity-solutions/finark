<template>
    <Head title="Create blog &sdot; Admin Panel &sdot;" />
    <div class="container-fluid py-4 px-5">
      <div class="mt-4 row">
          <h3 class="font-weight-bold">Add new blog</h3>
          <a class="text-secondary" href="/admin/blogs" style="font-size: 0.9rem;"><svg class="svg-inline--fa fa-arrow-left-long" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left-long" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="" fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288 480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128z"></path></svg> Back to blogs</a>
          <!-- <h5 class="text-lg font-weight-semibold">Let's start with the basic information</h5>
          <p class="text-sm">Let us know your name and email address. Use an address you don't mind other users contacting you at.</p>
          <hr class="my-2 horizontal dark"> -->
      </div>
      <div class="mt-4 row">
        <div class="col-4">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Blog details</h6>
                  <p class="text-sm">Here you can set blog details.</p>
                </div>
                <!-- <div class="ms-auto d-flex">
                  <button type="button" class="btn btn-sm btn-white me-2">
                    View all
                  </button>
                  <a href="/admin/partner/create" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                    <span class="btn-inner--icon">
                      <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                      </svg>
                    </span>
                    <span class="btn-inner--text">Add partner</span>
                  </a>
                </div> -->
              </div>
            </div>
            <div class="card-body">
              <form class="row g-3" @submit.prevent="Save">
                <div class="col-md-12">
                    <label for="title" class="form-label">Title*</label>
                    <input type="text" class="form-control" id="title" placeholder="Type name...">
                </div>
                <!-- <div class="col-md-6">
                    <label for="inputAddress" class="form-label">Website URL</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="http://fin-ark.com" v-model="url">
                </div> -->
                <div class="col-md-12">
                    <label for="formFile" class="form-label">Cover</label>
                    <input class="form-control" type="file" id="formFile" v-on:change="OnFileChange">
                    <img src="" style="width: 128px;" />
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="card border shadow-xs mb-4">
            <div class="card-header border-bottom pb-0">
              <div class="d-sm-flex align-items-center">
                <div>
                  <h6 class="font-weight-semibold text-lg mb-0">Content</h6>
                  <p class="text-sm">Start writing your content here</p>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="col-12">
                <QuillEditor :modules="modules" theme="snow" toolbar="full" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
</template>

<script setup>
  import Footer from '@shared/Partials/CorporateUI/Footer.vue';
  import ImageUploader from 'quill-image-uploader';
  import { router } from '@inertiajs/vue3';

  const modules = {
    name: 'imageUploader',
    module: ImageUploader,
    options: {
      upload: file => {
        return new Promise((resolve, reject) => {
          const formData = new FormData();
          formData.append("image", file);

          router.post('/admin/upload-image', formData)
          .then(res => {
            console.log(res)
            resolve(res.data.url);
          })
          .catch(err => {
            reject("Upload failed");
            console.error("Error:", err)
          })
        })
      }
    }
  }
</script>

<script>
    import CorporateUI from '@shared/Layouts/CorporateUI.vue';

    export default {
      layout: CorporateUI
    }
</script>