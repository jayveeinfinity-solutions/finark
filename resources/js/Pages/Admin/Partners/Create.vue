<template>
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <div class="mb-md-0 mb-3">
                        <h3 class="finark-text-primary">Create new partner</h3>
                        <a class="text-secondary" style="font-size: .9rem;" href="/admin/partners"><FontAwesomeIcon icon="fa-solid fa-arrow-left-long" /> Back to partners</a>
                    </div>
                </div>
            </div>
        </div>
        <div class=" p-3 mb-4 ">
            <div class="card">
                <form class="row g-3" @submit.prevent="Save">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name*</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Type name..." required v-model="name">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Website URL</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="http://fin-ark.com" v-model="url">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Partners Group*</label>
                        <div class="form-check" v-for="group in $page.props.groups" :key="group.id">
                            <input class="form-check-input" type="checkbox" v-model="group.checked" v-bind:id="group.id">
                            <label class="form-check-label" :for="group.id">
                                {{ group.name }}
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="formFile" class="form-label">Partner Logo</label>
                        <input class="form-control" type="file" id="formFile" v-on:change="OnFileChange">
                        <img :src="logo" v-if="logo" style="width: 128px;" />
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import CorporateUI from '@shared/Layouts/CorporateUI.vue';

    export default {
        data() {
            return {
                name: "",
                url: "",
                logo: null,
                file: null
            }
        },
        methods: {
            OnFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.file = files[0];

                this.CreateImage(this.file);
            },  
            CreateImage(file) {
                var image = new Image();
                var reader = new FileReader();

                reader.onload = (e) => {
                    this.logo = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            Save: function(event) {
                let formData = new FormData();

                formData.append('name', this.name);
                formData.append('url', this.url);
                if(this.file != null) {
                    formData.append('file', this.file);
                }
                let selectionGroups = [];
                this.$page.props.groups.forEach(group => {
                    if(group.checked) {
                        selectionGroups.push(group.id);
                    }
                });
                formData.append('groups', selectionGroups.join(','));

                this.name = "";
                this.url = "";
                this.logo = null;
                this.file = null;

                event.target.reset();
                
                this.$http.post('/admin/partner/store',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function() {
                    console.log('SUCCESS!!');
                })
                .catch(function() {
                    console.log('FAILURE!!');
                });
            }
        },
        layout: CorporateUI
    }
</script>