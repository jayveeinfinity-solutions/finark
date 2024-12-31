<template>
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
</template>

<script>
    import AdminLayout from '@shared/Layouts/Admin.vue';

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
                
                this.$http.post('/admin/partner-group/store',
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
        layout: AdminLayout
    }
</script>