<template>
    <Head title="Vacantes" />

    <Header title="Marketing / Vacantes">
        <p>
            Adapta las vacantes en tiempo real para reflejar cambios en los
            requisitos o en la estrategia de contratación. Modifica detalles,
            requisitos y responsabilidades de manera fácil y rápida.
        </p>
    </Header>

    <div class="py-6 px-4 xl:px-0">
        <div
            class="relative shadow-md rounded-lg bg-white border-b border-gray-200"
        >
            <div class="flex items-center justify-end p-4">
                <div v-if="Helpers.can('create_vacancies')">
                    <Link
                        :href="route('vacancies.create')"
                        class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >Crear Vacante</Link
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
                        placeholder="Buscar vacantes"
                        v-model="search"
                    />
                </div>
            </div>

            <AlertSuccess
                :message="$page.props.flash.message"
                v-if="$page.props.flash.message"
            ></AlertSuccess>

            <div class="relative overflow-x-auto">
                <table
                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg"
                >
                    <thead
                        class="text-xs text-white uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <strong>#</strong>
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 cursor-pointer"
                                style="width: 20%"
                                @click="sortBy('position')"
                            >
                                <div class="flex items-center">
                                    Nombre del cargo
                                    <a href="#"
                                        ><svg
                                            class="w-3 h-3 ms-1.5"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 cursor-pointer"
                                @click="sortBy('city.name')"
                            >
                                <div class="flex items-center">
                                    Ciudad
                                    <a href="#"
                                        ><svg
                                            class="w-3 h-3 ms-1.5"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 cursor-pointer"
                                @click="sortBy('category.name')"
                            >
                                <div class="flex items-center">
                                    Categoría
                                    <a href="#"
                                        ><svg
                                            class="w-3 h-3 ms-1.5"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 cursor-pointer">
                                Estado
                            </th>
                            <th
                                scope="col"
                                class="px-6 py-3 cursor-pointer"
                                @click="sortBy('category.name')"
                            >
                                <div class="flex items-center">
                                    Fecha de creación
                                    <a href="#"
                                        ><svg
                                            class="w-3 h-3 ms-1.5"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"
                                            />
                                        </svg>
                                    </a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            v-for="(vacancy, index) in sortedData"
                            :key="index"
                        >
                            <td class="px-6 py-4">{{ vacancy.id }}</td>
                            <th
                                scope="row"
                                class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ vacancy.position }}
                            </th>
                            <td class="px-6 py-4">{{ vacancy.city.name }}</td>
                            <td class="px-6 py-4">
                                {{ vacancy.category.name }}
                            </td>
                            <td class="px-6 py-4">
                                <Status :status="vacancy.status"></Status>
                            </td>
                            <td class="px-6 py-4">
                                {{ formatDate(vacancy.created_at) }}
                            </td>
                            <td class="px-6 py-4 flex items-center justify-end">
                                <div
                                    class="ml-2"
                                    v-if="Helpers.can('view_vacancies')"
                                >
                                    <Link
                                        :href="
                                            route('vacancies.show', vacancy.id)
                                        "
                                        class="font-bold text-blue-600 dark:text-blue-500"
                                        title="Ver vacante"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-800 dark:text-white"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 20 14"
                                        >
                                            <g
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                            >
                                                <path
                                                    d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                />
                                                <path
                                                    d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z"
                                                />
                                            </g>
                                        </svg>
                                    </Link>
                                </div>
                                <div
                                    class="ml-2"
                                    v-if="Helpers.can('edit_vacancies')"
                                >
                                    <Link
                                        :href="
                                            route('vacancies.edit', vacancy.id)
                                        "
                                        class="font-bold text-blue-600 dark:text-blue-500"
                                        title="Editar vacante"
                                    >
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
                                </div>

                                <div
                                    class="ml-2"
                                    v-if="Helpers.can('delete_vacancies')"
                                >
                                    <Delete
                                        :vacancy="vacancy"
                                        message="¿Deseas eliminar la vacante y todo su contenido?"
                                    ></Delete>
                                </div>
                                <div
                                    class="ml-2"
                                    v-if="Helpers.can('create_image')"
                                >
                                    <Link
                                        :href="
                                            route('vacancy.social', vacancy.id)
                                        "
                                        class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-500 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        title="Generar pieza gráfica"
                                    >
                                        <svg
                                            class="w-3 h-3 text-white me-2"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 20 18"
                                        >
                                            <path
                                                fill="currentColor"
                                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"
                                            />
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"
                                            />
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z"
                                            />
                                        </svg>
                                        Generar
                                    </Link>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <nav
                class="flex items-center justify-between py-4 px-4"
                aria-label="Table navigation"
            >
                <div>
                    <span
                        class="text-sm font-normal text-gray-500 dark:text-gray-400"
                        >Mostrando
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >{{ vacancies.from }}-{{ vacancies.to }}</span
                        >
                        de
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >{{ vacancies.total }}</span
                        >
                    </span>
                </div>
                <div>
                    <Pagination :links="vacancies.links" />
                </div>
            </nav>
        </div>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Pagination from '@/Components/Pagination.vue';
import Status from '@/Components/Status.vue';
import Delete from '@/Pages/Vacancies/Delete.vue';
import AlertSuccess from '@/Components/Alerts/AlertSuccess.vue';
import Helpers from '@/helpers/helpers';
import { ref, watch, computed } from 'vue';
import debounce from 'lodash.debounce';
import { Inertia } from '@inertiajs/inertia';

let props = defineProps({
    vacancies: {
        type: Object,
        default: [],
    },
    filters: Object,
});

const sortKey = ref('name');
const sortOrder = ref('asc');

const sortedData = computed(() => {
    return props.vacancies.data.sort((a, b) => {
        let modifier = 1;
        if (sortOrder.value === 'desc') modifier = -1;

        const keys = sortKey.value.split('.');
        let aValue = a;
        let bValue = b;

        keys.forEach((key) => {
            aValue = aValue[key];
            bValue = bValue[key];
        });

        if (aValue < bValue) return -1 * modifier;
        if (aValue > bValue) return 1 * modifier;
        return 0;
    });
});

function sortBy(key) {
    if (sortKey.value === key) {
        sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortKey.value = key;
        sortOrder.value = 'asc';
    }
}

const formatDate = (date) => {
    return Helpers.formatDateWhitHours(date);
};
let search = ref(props.filters.search.search);

watch(
    search,
    debounce(function (value) {
        Inertia.get(
            route('vacancies.index'),
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 500)
);
</script>
