<template>
    <div
        v-if="project.taking_action == 1"
        class="bg-red-500 w-20 text-center p-2 rounded-md text-white font-bold mb-[-15px] mt-1"
    >
        Alerta
    </div>
    <div class="shadow-md bg-white border-b border-gray-200 rounded-md">
        <div
            class="text-sm text-white uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400 p-2 mt-3 border rounded-md font-semibold"
        >
            <div class="flex justify-around">
                <h1>{{ project.id }} - {{ project.name }}</h1>
                <h2>CSS: {{ project.css }}</h2>
                {{}}
            </div>

            <div class="flex p-1">
                <input
                    type="text"
                    placeholder="Ingresa un avance..."
                    class="w-full h-8 text-sm rounded-md border text-black"
                />
                <button
                    class="bg-white rounded-md p-2 ml-3 mr-3 text-gray-700 focus:ring-2 focus:ring-indigo-500 hover:bg-blue-400"
                >
                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 13l4 4L19 7"
                        ></path>
                    </svg>
                </button>
                <div>
                    <button
                        data-modal-target="alert-modal"
                        data-modal-toggle="alert-modal"
                        class="bg-white rounded-md p-2 text-gray-700 focus:ring-2 focus:ring-indigo-500 hover:bg-blue-400"                    >
                        <svg
                            class="h-4 w-4 text-gray-800 dark:text-white"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M17.133 12.632v-1.8a5.407 5.407 0 0 0-4.154-5.262.955.955 0 0 0 .021-.106V3.1a1 1 0 0 0-2 0v2.364a.933.933 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C6.867 15.018 5 15.614 5 16.807 5 17.4 5 18 5.538 18h12.924C19 18 19 17.4 19 16.807c0-1.193-1.867-1.789-1.867-4.175Zm-13.267-.8a1 1 0 0 1-1-1 9.424 9.424 0 0 1 2.517-6.391A1.001 1.001 0 1 1 6.854 5.8a7.43 7.43 0 0 0-1.988 5.037 1 1 0 0 1-1 .995Zm16.268 0a1 1 0 0 1-1-1A7.431 7.431 0 0 0 17.146 5.8a1 1 0 0 1 1.471-1.354 9.424 9.424 0 0 1 2.517 6.391 1 1 0 0 1-1 .995ZM8.823 19a3.453 3.453 0 0 0 6.354 0H8.823Z"
                            />
                        </svg>
                    </button>
                </div>
                <div>
                    <button
                        class="bg-white rounded-md p-2 ml-3 mr-3 text-gray-700 focus:ring-2 focus:ring-indigo-500 hover:bg-blue-400"
                        @click="Detail"
                    >
                        <svg
                            class="h-4 w-4"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 4h4m0 0v4m0-4-5 5M8 20H4m0 0v-4m0 4 5-5"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <CardDetail
            v-if="isDetailVisible"
            :class="{ isopen: isDetailVisible }"
            :project="project"
        ></CardDetail>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import CardDetail from './CardDetail.vue';
import { ref } from 'vue';

const props = defineProps({
    project: {
        type: Object,
        required: true,
    },
});

const isDetailVisible = ref(false);

let Detail = () => {
    isDetailVisible.value = !isDetailVisible.value;
};
</script>
