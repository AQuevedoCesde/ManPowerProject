<template>
    <div
        :id="idModal"
        tabindex="-1"
        aria-hidden="true"
        data-modal-backdrop="static"
        class="fixed top-0 left-0 right-0 z-60 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full transition-opacity duration-300"
    >
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button
                    @click="closeModal()"
                    type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                >
                    <svg
                        class="w-3 h-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 14 14"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                        />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg
                        class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                        />
                    </svg>
                    <h3
                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"
                    >
                        {{ message }}
                    </h3>
                    <div
                        class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert"
                        v-if="showErrorMessage"
                    >
                        <svg
                            class="flex-shrink-0 inline w-4 h-4 me-3"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                            />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Error!</span>
                            {{ errorMessage }}
                        </div>
                    </div>

                    <button
                        @click="accept"
                        type="button"
                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 gree dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                    >
                        Aceptar
                    </button>
                    <button
                        @click="closeModal()"
                        type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                    >
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Modal } from "flowbite";
import { watch } from "vue";

let props = defineProps({
    modelValue: {
        required: true,
        type: Boolean,
        default: false,
    },
    message: {
        default: "Are you sure you want to delete this?",
        type: String,
    },
    idModal: {
        required: true,
        type: String,
    },
    errorMessage: {
        required: false,
        type: String,
    },
    showErrorMessage: {
        default: false,
        type: Boolean,
    },
});

const emit = defineEmits(["close", "accept"]);

const closeModal = () => {
    emit("close", false);
};

const accept = () => {
    emit("accept", true);
};

watch(
    () => props.modelValue,
    (show) => {
        const $targetEl = document.getElementById(props.idModal);
        let modal = new Modal($targetEl, {
            backdrop: "static",
        });
        show ? modal.show() : modal.hide();
    }
);
</script>
