<script>
    import Main from '@shared/Layouts/Main.vue';

    export default {
        layout: Main
    }
</script>

<script setup>
    import { useForm, usePage } from "@inertiajs/vue3";
    import { ref, watch } from "vue";
    import QuillEditor from "@/Shared/Components/QuillEditor.vue";

    const props = defineProps({
        errors: Object,
    });

    const form = useForm({
        title: "",
        body: "",
    });

    const submit = () => {
        clearErrors();

        form.post("/test/store", {
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
            },
        });
    };

    const page = usePage();
    const successMessage = ref(page.props.flash?.success);
    const errorMessages = ref(null);

    watch(
        () => page.props.flash?.success,
        (val) => {
            successMessage.value = val;
            if (val) {
                setTimeout(() => (successMessage.value = null), 3000);
            }
        }
    );

    watch(
        () => page.props.errors,
        (errors) => {
            if (errors && Object.keys(errors).length > 0) {
                errorMessages.value = Object.values(errors).flat();
            }
        },
        { immediate: true }
    );

    const clearErrors = () => {
        errorMessages.value = null;
    };

    const users = [
        { id: 1, value: "devtest1" },
        { id: 2, value: "devtest2" },
        { id: 3, value: "devtest3" },
        { id: 4, value: "devtest4" },
        { id: 5, value: "devtest5" },
    ];
    
    const modules = {
        mention: {
            allowedChars: /^[A-Za-z\sÅÄÖåäö]*$/,
            mentionDenotationChars: ['@'],
            source: function(searchTerm, renderList) {
                const matches =
                    searchTerm.length === 0
                    ? users
                    : users.filter(u =>
                        u.value.toLowerCase().includes(searchTerm.toLowerCase())
                        );

                renderList(matches, searchTerm);
            }
        },
    };
</script>

<template>
    <div>
        <section class="container">
            <Link class="px-4 py-2 bg-black text-white rounded" href="/test">Back</Link>

            <!-- Success Alert -->
            <div v-if="successMessage" class="rounded bg-success text-white px-4 py-2">
                {{ successMessage }}
            </div>

            <!-- Error Alert -->
            <div v-if="errorMessages" class="rounded bg-danger text-white px-4 py-2">
                <ul>
                    <li v-for="(message, index) in errorMessages" :key="index">
                    {{ message }}
                    </li>
                </ul>
            </div>

            <form class="py-3">
                <input
                    v-model="form.title"
                    type="text"
                    class="w-full border rounded p-2"
                    placeholder="Title"
                />
                <!-- <QuillEditor
                    v-model:content="form.body"
                    contentType="html"
                    :modules="modules"
                    theme="snow"
                    placeholder="Type anything..."
                /> -->
                <QuillEditor
                    v-model="form.body"
                    :modules="modules"
                    placeholder="Write your post..."
                />

                <button @click.prevent="submit" class="px-4 py-2 bg-black text-white rounded">Save</button>
            </form>
        </section>
    </div>
</template>