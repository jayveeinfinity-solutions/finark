<template>
  <div class="quill-wrapper">
    <div ref="editor"></div>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import Quill from "quill";
import "quill/dist/quill.snow.css";

import 'quill-mention';
import 'quill-mention/dist/quill.mention.css';

const props = defineProps({
  modelValue: {
    type: String,
    default: "",
  },
  placeholder: {
    type: String,
    default: "Type anything...",
  },
  modules: {
    type: Object,
    default: () => ({}),
  },
});

const emit = defineEmits(["update:modelValue"]);

const editor = ref(null);
let quill = null;

onMounted(() => {
  quill = new Quill(editor.value, {
    theme: "snow",
    placeholder: props.placeholder,
    modules: {
      toolbar: [
        ["bold", "italic", "underline"],
        [{ list: "ordered" }, { list: "bullet" }],
        ["link"],
      ],
      ...props.modules,
    },
  });

  // Set initial value
  if (props.modelValue) {
    quill.root.innerHTML = props.modelValue;
  }

  // Emit changes
  quill.on("text-change", () => {
    emit("update:modelValue", quill.root.innerHTML);
  });
});

// Sync external changes (edit page, reset, etc.)
watch(
  () => props.modelValue,
  (value) => {
    if (quill && value !== quill.root.innerHTML) {
      quill.root.innerHTML = value || "";
    }
  }
);
</script>

<style scoped>
    .quill-wrapper :deep(.ql-editor) {
    min-height: 150px;
    }
</style>
