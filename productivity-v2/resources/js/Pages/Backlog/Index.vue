<template>
    <Header title="Backlog \ Lideres">
        <p class="mb-5">
            Monitorea y evalua continuamente el progreso de cada proyecto en
            relación con los planes establecidos, identificando y abordando
            oportunamente cualquier desviación o riesgo potencial.
        </p>
    </Header>
    <div
        class="relative rounded-lg shadow-md bg-white border-b border-gray-200 mt-5"
    >
        <div class="flex items-center justify-end p-4">
            <div>
                <Link
                    :href="route('it.backlog.create')"
                    class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    >Crear Nuevo Proyecto</Link
                >
            </div>
            <div class="relative">
                <div
                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                >
                    <svg
                        class="w-5 h-5 text-gray-500 dark:text-gray-400"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </div>
                <input
                    type="text"
                    id="table-search"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar Proyecto"
                    v-model="search"
                />
            </div>
        </div>
    </div>
    <div>
        <AlertProp_up/>
        <!-- <AlertSuccess
            :message="$page.props.flash.message"
        ></AlertSuccess> -->
        
        <Card
            v-for="project in projects"
            :key="project.id"
            :project="project"
        ></Card>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Card from './Elements/Card.vue';
import { ref, watch } from 'vue';
import debounce from 'lodash.debounce';
import { Inertia } from '@inertiajs/inertia';
import AlertProp_up from './Elements/AlertProp_up.vue';

const props = defineProps({
    filters: Object,
    projects: Array,
});

const search = ref(props.filters.search.search);

watch(
    search,
    debounce(function (value) {
        Inertia.get(
            route('it.backlog.index'),
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 500)
);
</script>
