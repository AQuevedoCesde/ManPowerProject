<template>
    <Head title="Usuarios" />

    <Header title="Administración / Usuarios">
        <p>Usuarios del sistema.</p>
    </Header>

    <div class="py-6 px-4 xl:px-0">
        <div
            class="relative shadow-md rounded-lg bg-white border-b border-gray-200"
        >
            <div
                class="flex flex-colum sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-end p-4"
            >
                <div class="block relative" v-if="Helpers.can('create_users')">
                    <Link
                        :href="route('users.create')"
                        class="text-white inline-block bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >Crear Usuario</Link
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
                        placeholder="Buscar usuarios"
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
                            <th scope="col" class="px-6 py-3">
                                Nombre completo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Correo electrónico
                            </th>
                            <th scope="col" class="px-6 py-3">Rol</th>
                            <th scope="col" class="px-6 py-3">Fecha creado</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            v-for="(user, index) in users.data"
                            :key="index"
                        >
                            <td class="px-6 py-4">{{ user.id }}</td>
                            <th
                                scope="row"
                                class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ user.name }}
                            </th>
                            <td class="px-6 py-4">{{ user.email }}</td>
                            <td class="px-6 py-4">
                                <span
                                    v-for="(role, index) in user.roles"
                                    :key="index"
                                    :class="
                                        user.roles.length > 1
                                            ? 'inline-block mb-1'
                                            : ''
                                    "
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"
                                    >{{ role.display_name }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ dateTimeFormat(user.created_at) }}
                            </td>
                            <td class="px-6 py-4 flex items-center justify-end">
                                <div
                                    class="ml-2"
                                    v-if="Helpers.can('edit_users')"
                                >
                                    <Link
                                        :href="route('users.edit', user.id)"
                                        class="font-bold text-blue-600 dark:text-blue-500"
                                        title="Editar usuario"
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
                                    v-if="Helpers.can('view_users')"
                                >
                                    <Link
                                        :href="route('users.show', user.id)"
                                        class="font-bold text-blue-600 dark:text-blue-500"
                                        title="Ver usuario"
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
                                    v-if="Helpers.can('delete_users')"
                                >
                                    <Delete
                                        :user="user"
                                        message="¿Estás seguro de que deseas eliminar este usuario?"
                                    ></Delete>
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
                            >{{ users.from }}-{{ users.to }}</span
                        >
                        de
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >{{ users.total }}</span
                        >
                    </span>
                </div>
                <div>
                    <Pagination :links="users.links" />
                </div>
            </nav>
        </div>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Pagination from '@/Components/Pagination.vue';
import Delete from '@/Pages/Users/Delete.vue';
import AlertSuccess from '@/Components/Alerts/AlertSuccess.vue';

import { ref, watch } from 'vue';
import debounce from 'lodash.debounce';
import { Inertia } from '@inertiajs/inertia';

import Helpers from '@/helpers/helpers';

let props = defineProps({
    users: {
        type: Object,
        default: [],
    },
    filters: Object,
});

let search = ref(props.filters.search.search);

watch(
    () => props.modelValue,
    (show) => {
        const $targetEl = document.getElementById('modalContent');
        let modal = new Modal($targetEl, {
            backdrop: 'static',
        });
        show ? modal.show() : modal.hide();
    }
);

watch(
    search,
    debounce(function (value) {
        Inertia.get(
            route('users.index'),
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 500)
);

let dateTimeFormat = (datetime) => Helpers.formatDate(datetime);
</script>
