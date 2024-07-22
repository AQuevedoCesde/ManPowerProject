<template>
    <div
        id="crud-modal"
        tabindex="-1"
        aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
    >
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"
                >
                    <h3
                        class="text-lg font-semibold text-gray-900 dark:text-white"
                    >
                        Crear nuevo avance
                    </h3>

                    <button
                        type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal"
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
                </div>
                <!-- Modal body -->
                <form
                    @submit.prevent="submit"
                    autocomplete="off"
                    class="p-4 md:p-5"
                >
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label
                                for="description"
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                                >Avance:</label
                            >
                            <textarea
                                id="description"
                                v-model="form.avance"
                                rows="4"
                                class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Ingresa aquí tu avance"
                            ></textarea>
                        </div>
                        <div
                            v-if="form.errors.avance"
                            v-text="form.errors.avance"
                            class="text-red-500 text-xs mt-1"
                        ></div>
                    </div>
                    <div class="flex justify-between">
                        <input
                            class="block w-1/2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="file_input"
                            type="file"
                        />
                        <LoadingSpinner
                            classes="fill-green-500"
                            v-if="loading"
                        ></LoadingSpinner>
                        <button
                            type="submit"
                            :disabled="loading"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Agregar nuevo avance
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import { defineProps, ref } from 'vue';
import LoadingSpinner from '@/Components/LoadingSpinner.vue';

let loading = ref(false);

const props = defineProps({
    project: Object,
});
const form = useForm({
    project_id: props.project.id,
    avance: '',
});

const submit = () => {
    loading.value = true;
    form.post(route('it.progress.store'), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
        },
    });
};
</script>
