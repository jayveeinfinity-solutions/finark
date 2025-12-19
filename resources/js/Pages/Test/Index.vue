<script>
    import Main from '@shared/Layouts/Main.vue';

    export default {
        layout: Main
    }
</script>

<script setup>
    import { ref, onMounted, onBeforeUnmount } from "vue";
    import { router } from "@inertiajs/vue3";

    let props = defineProps({
        testPosts: Object,
    });

    const content = ref(null);

    const handleMentionClick = (e) => {
        const mentionEl = e.target.closest(".mention");

        if (!mentionEl) return;

        const userId = mentionEl.dataset.id;

        if (userId) {
            router.visit(`/users/${userId}`);
        }
    };

    onMounted(() => {
        content.value?.addEventListener("click", handleClick);
    });

    onBeforeUnmount(() => {
        content.value?.removeEventListener("click", handleClick);
    });
</script>

<template>
    <div>
        <section class="container">
            <Link class="px-4 py-2 bg-black text-white rounded" href="/test/create">Create</Link>
            <article v-for="testPost in testPosts" :key="testPost.id" class="my-3">
                <div class="post-card">
                    <div class="post-title">
                        {{ testPost.title }}
                        <Link :href="'/test/post/' + testPost.id">
                            <span class="position-absolute right-3 text-white rounded">Edit</span>
                        </Link>
                    </div>
                    <div class="post-body">
                        <div class="post-content" v-html="testPost.content" @click="handleMentionClick"></div>
                    </div>
                </div>
            </article>
        </section>
    </div>
</template>

<style lang="scss">
    .post-content .mention {
        cursor: pointer;
        color: #2563eb;
        font-weight: 600;
    }
    .post-content .mention * {
        pointer-events: none;
    }
    .post-card {
        border: 1px solid #ccc;
        border-radius: 6px;
    }
    .post-title {
        position: relative;
        font-size: 16px;
        font-weight: 700;
        padding: 1rem;
        border-bottom: 1px solid #ccc;

        span {
            cursor: pointer;
            padding: 3px 10px;
            font-size: 14px;
            background-color: #000;

            &:hover {
                background-color: #333;
            }
        }
    }
    .post-body {
        padding: 1rem;
    }
    .post-content {
        /* Base reset */
        all: revert;
        font-size: 12px;
        line-height: 1.6;
        color: #111;

        /* Headings */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
            margin: 0 0 0.5rem 0;
            line-height: 1.4;
        }

        h1 { font-size: 16px; }
        h2 { font-size: 15px; }
        h3 { font-size: 14px; }

        /* Paragraph */
        p {
            margin: 0 0 0.75rem 0;
            font-size: 12px;
        }

        /* Lists */
        ul, ol {
            margin: 0 0 0.75rem 1.25rem;
            padding: 0;
        }

        li {
            margin: 0.25rem 0;
        }

        /* Inline text */
        strong { font-weight: 700; }
        em { font-style: italic; }
        u { text-decoration: underline; }

        /* Links */
        a {
            color: #2563eb;
            text-decoration: underline;
            word-break: break-word;
        }

        /* Blockquote */
        blockquote {
            margin: 0.75rem 0;
            padding-left: 1rem;
            border-left: 3px solid #ddd;
            color: #555;
            font-style: italic;
        }

        /* Code */
        code {
            background: #f4f4f5;
            padding: 2px 4px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 11px;
        }

        pre {
            background: #f4f4f5;
            padding: 0.75rem;
            border-radius: 6px;
            overflow-x: auto;
            font-size: 11px;
        }

        /* Images */
        img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin: 0.75rem 0;
        }

        /* Tables (optional) */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0.75rem;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 0.5rem;
            font-size: 12px;
        }

        /* Remove last margin */
        > *:last-child {
            margin-bottom: 0;
        }
    }
</style>