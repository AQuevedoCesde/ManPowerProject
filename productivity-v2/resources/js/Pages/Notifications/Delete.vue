<template>
    <span title="Eliminar notificación" @click="destroy(notification)">
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
        :idModal="'destroy' + notification.id"
        v-model="showModalDelete"
        :message="message"
        :errorMessage="errorMessage"
        :showErrorMessage="showAlertDanger"
        @close="onCloseDelete($event)"
        @accept="onAcceptDelete($event)"
    ></AlertModal>
</template>

<script setup>
import AlertModal from '@/Components/AlertModal.vue';

import { ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

let props = defineProps({
    notification: {
        required: true,
        type: Object,
    },
    message: {
        required: true,
        type: String,
    },
});

const showModalDelete = ref(false);
const errorMessage = ref();
const showAlertDanger = ref(false);

// Delete the image
const destroy = () => (showModalDelete.value = true);
const onCloseDelete = (event) => {
    showModalDelete.value = false;
    document.querySelector('body > div[modal-backdrop]')?.remove();
};
const onAcceptDelete = (event) => {
    let destroy = useForm({ ...props.notification });

    destroy.delete(route('notifications.destroy', props.notification.id), {
        preserveScroll: true,
        onError: (error) => {
            errorMessage.value = error.message;
            showAlertDanger.value = true;
        },
        onSuccess: () => {
            showAlertDanger.value = false;
            onCloseDelete(false);
        },
    });
};
</script>
