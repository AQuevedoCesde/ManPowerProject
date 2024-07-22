<template>
    <span title="Eliminar" @click="deleteImage(image)">
        <svg
            class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 18 20"
        >
            <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"
            />
        </svg>
    </span>
    <AlertModal
        :idModal="deleteImage + image.id"
        v-model="showModalDelete"
        :message="message"
        @close="onCloseDelete($event)"
        @accept="onAcceptDelete($event)"
    ></AlertModal>
</template>

<script setup>
import AlertModal from "@/Components/AlertModal.vue";

import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

let props = defineProps({
    image: {
        required: true,
        type: Object,
    },
    message: {
        required: true,
        type: String,
    },
});

const showModalDelete = ref(false);

// Delete the image
const deleteImage = () => (showModalDelete.value = true);
const onCloseDelete = (event) => {
    showModalDelete.value = false;
    document.querySelector("body > div[modal-backdrop]")?.remove();
};
const onAcceptDelete = (event) => {
    let deleteImage = useForm({ ...props.image });

    deleteImage.delete(route("vacancy.social.delete", props.image.id), {
        preserveScroll: true,
        onError: () => {
            onCloseDelete(false);
        },
        onSuccess: () => {
            onCloseDelete(false);
        },
    });
};
</script>
