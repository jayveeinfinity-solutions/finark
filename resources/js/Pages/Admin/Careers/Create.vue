<template>
    <Head title="Create new careers &sdot; Admin Panel &sdot; " />
    <div class="container-fluid py-4 px-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <div class="mb-md-0 mb-3">
                        <h3 class="font-weight-bold mb-0">Create new career</h3>
                        <a class="text-secondary" style="font-size: .9rem;" href="/admin/careers"><FontAwesomeIcon icon="fa-solid fa-arrow-left-long" /> Back to careers</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border shadow-xs p-3 mb-4">
            <div class="card-body">
                <form class="row g-3" @submit.prevent="Save">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Position*</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Type name..." required v-model="name">
                    </div>
                    <div class="col-md-12">
                        <label for="inputAddress" class="form-label">Details</label>
                        <textarea type="text" class="form-control w-50" id="inputAddress" placeholder="Type details..." v-model="url" rows="5"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Location</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="The Plaza, Singapore" v-model="url">
                    </div>
                    <div class="col-md-12">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="flexRadioDefault">
                            <label class="custom-control-label" for="customRadio1">On Site</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="flexRadioDefault">
                            <label class="custom-control-label" for="customRadio1">Work From Home</label>
                        </div>
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
            Save: function(e) {
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
                
                this.$http.post('/admin/partner/store',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function() {
                    this.name = "";
                    this.url = "";
                    this.logo = null;
                    this.file = null;

                    e.target.reset();
                })
                .catch(function() {
                    console.log('FAILURE!!');
                });
            }
        },
        layout: CorporateUI
    }
</script>