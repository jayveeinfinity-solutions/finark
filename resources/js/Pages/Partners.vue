<template>
    <div class="container pt-8 pb-5">
        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav justify-content-center finark-business-partners">
                    <li class="nav-item" v-for="partner in partner_groups" :key="partner.id" :class="partner.isActive ? 'active' : ''">
                        <a class="nav-link" :class="partner.isActive ? 'active' : ''" aria-current="page" href="#" @click.prevent="SetActive(partner.id)">{{ partner.name }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 py-5">
                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-4 col-sm-6" v-for="partner in partners" :key="partner.id" :class="active_group == -1 || partner.groups.includes(active_group) ? '' : 'd-none'">
                        <div class="card pt-4 px-3 d-flex mh-100 flex-column justify-content-center">
                            <img class="align-self-center" style="width: 70%;" :src="'/storage/images/uploads/' + partner.logo" v-if="partner.logo">
                            <h4 class="py-3 text-center" :class="!partner.logo ? 'fs-3' : ''">{{ partner.name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                active_group: -1,
                partner_groups: [],
                partners: []
            }
        },
        created() {
            this.GetPartnerGroups();
            this.GetPartners();
        },
        methods: {
            SetActive(id) {
                this.partner_groups.forEach(partner => {
                    if(id == partner.id) {
                        partner.isActive = true;
                        this.active_group = id;
                    } else {
                        partner.isActive = false;
                    }
                });
            },
            GetPartnerGroups() {
                const allObject = { id: -1, name: "All", isActive: true };
                this.partner_groups = [allObject].concat(this.$page.props.groups);
            },
            GetPartners() {
                this.partners = this.$page.props.partners;
            }
        }
    }
</script>