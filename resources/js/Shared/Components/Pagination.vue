<template>
    <div class="border-top py-3 px-3 d-flex align-items-center" v-if="lastPage > 1">
        <a class="btn btn-sm btn-white d-sm-block d-none mb-0" :href="prevLink" v-if="prevLink != null">Previous</a>
        <nav aria-label="..." class="ms-auto">
            <ul class="pagination pagination-light mb-0">
                <li class="page-item" :class="page.active ? 'active' : ''" v-for="(page, index) in links" :key="index">
                    <span class="page-link font-weight-bold" v-if="page.active && (!page.label.includes('Previous') || !page.label.includes('Next'))">{{ page.label }}</span>
                    <a class="page-link border-0 font-weight-bold" :href="page.url" v-if="!page.active && page.url && !(page.label.includes('Previous') || page.label.includes('Next'))">{{ page.label }}</a>
                </li>
            </ul>
        </nav>
        <a class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-auto" :href="nextLink" v-if="nextLink != null">Next</a>
        <a class="text-white d-sm-block d-none mb-0 ms-auto" v-if="nextLink == null">Next</a>
    </div>
</template>

<script>
    export default {
        props: {
            lastPage: {
                default: 1,
                type: Number
            },
            links: Array,
            prevLink: {
                default: null,
                type: String
            },
            nextLink: {
                default: null,
                type: String
            },
        }
    }   
</script>