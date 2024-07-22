<template>
    <div class="flex">
        <div class="w-11/12 px-10">
            <div class="flex justify-between mt-3">
                <p class="font-semibold">Analista: {{ project.user.name }}</p>
                <p class="font-semibold">
                    Fecha de entrega: {{ project.deadline }}
                </p>
                <p class="font-semibold">
                    Prioridad: {{ project.bkl_priority.id }}
                </p>
            </div>
            <div class="flex justify-between mt-5">
                <!-- <p class="font-semibold">Último avance:</p>
                <p class="font-semibold">Fecha:</p>  -->
            </div>
            <div class="mt-3">
                <p>
                    <!-- Avance -->
                </p>
            </div>
        </div>

        <div class="p-1 flex flex-col justify-around">
            <div class="bg-yellow-200 p-1.5 rounded-md font-bold self-center ">
                <p class="text-sm" >{{ project.bkl_state.name }}</p>
            </div>
            <div class="flex justify-evenly mt-2">
                <Link :href="route('it.backlog.edit', project.id)">
                    <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 21 21"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279"
                        />
                    </svg>
                </Link>
                <Delete
                    :project="project"
                    message="¿Deseas eliminar el proyecto y todo su contenido?"
                >
                </Delete>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';
import Delete from './../Delete.vue';

const props = defineProps({
    project: {
        type: Object,
        required: true,
    },
});
</script>
