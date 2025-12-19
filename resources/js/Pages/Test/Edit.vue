<script>
    import Main from '@shared/Layouts/Main.vue';

    export default {
        layout: Main
    }
</script>

<script setup>
    import { useForm, usePage } from "@inertiajs/vue3";
    import { ref, watch } from "vue";

    const page = usePage();
    const infoMessage = ref(null);
    const successMessage = ref(page.props.flash?.success);
    const errorMessages = ref(null);

    const props = defineProps({
        testPost: Object,
    });

    const form = useForm({
        id: props.testPost.id,
        title: props.testPost.title,
        body: props.testPost.content,
    });

    const submit = () => {
        clearInfo();

        if (!form.isDirty) {
            infoMessage.value = "No changes to update";
            setTimeout(() => {
                infoMessage.value = null;
            }, 3000);
            return;
        }

        clearErrors();

        form.put(`/test/post/${form.id}`, {
            preserveScroll: true,
        });
    };

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

    const clearInfo = () => {
        infoMessage.value = null;
    };

    const clearErrors = () => {
        errorMessages.value = null;
    };
</script>

<template>
    <div>
        <section class="container">
            <Link class="px-4 py-2 bg-black text-white rounded" href="/test">Back</Link>

            <!-- Info Alert -->
            <div v-if="infoMessage" class="rounded bg-info text-black px-4 py-2">
                {{ infoMessage }}
            </div>

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
                <QuillEditor
                    v-model:content="form.body"
                    contentType="html"
                    theme="snow"
                    placeholder="Type anything..."
                />

                <button @click.prevent="submit" class="px-4 py-2 bg-black text-white rounded" :disabled="form.processing">Save</button>
            </form>
        </section>
    </div>
</template>