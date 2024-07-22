<template>
    <Head title="Roles" />

    <Header title="Administración / Roles">
        <p>Roles del sistema.</p>
    </Header>

    <div class="py-6 px-4 xl:px-0">
        <div
            class="relative shadow-md rounded-lg bg-white border-b border-gray-200"
        >
            <div
                class="flex items-center justify-end p-4"
                v-if="Helpers.can('create_roles')"
            >
                <div>
                    <Link
                        :href="route('roles.create')"
                        class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-0 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        >Crear Rol</Link
                    >
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
                            <th scope="col" class="px-6 py-3">Nombre</th>
                            <th scope="col" class="px-6 py-3">
                                Nombre visible
                            </th>
                            <th scope="col" class="px-6 py-3">Fecha creado</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            v-for="(role, index) in roles.data"
                            :key="index"
                        >
                            <td class="px-6 py-4">{{ role.id }}</td>
                            <th
                                scope="row"
                                class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ role.name }}
                            </th>
                            <td class="px-6 py-4">{{ role.display_name }}</td>
                            <td class="px-6 py-4">
                                {{ dateTimeFormat(role.created_at) }}
                            </td>
                            <td>
                                <div
                                    class="px-6 py-4 flex items-center justify-end"
                                    v-if="role.id != 1"
                                >
                                    <div
                                        class="ml-2"
                                        v-if="Helpers.can('edit_roles')"
                                    >
                                        <Link
                                            :href="route('roles.edit', role.id)"
                                            class="font-bold text-blue-600 dark:text-blue-500"
                                            title="Editar rol"
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
                                        v-if="Helpers.can('view_roles')"
                                    >
                                        <Link
                                            :href="route('roles.show', role.id)"
                                            class="font-bold text-blue-600 dark:text-blue-500"
                                            title="Ver rol"
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
                                        v-if="Helpers.can('delete_roles')"
                                    >
                                        <Delete
                                            :role="role"
                                            message="¿Estás seguro de que quieres eliminar este rol?"
                                        ></Delete>
                                    </div>
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
                            >{{ roles.from }}-{{ roles.to }}</span
                        >
                        de
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >{{ roles.total }}</span
                        >
                    </span>
                </div>
                <div>
                    <Pagination :links="roles.links" />
                </div>
            </nav>
        </div>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Pagination from '@/Components/Pagination.vue';
import Delete from '@/Pages/Roles/Delete.vue';
import AlertSuccess from '@/Components/Alerts/AlertSuccess.vue';

import Helpers from '@/helpers/helpers';

let props = defineProps({
    roles: {
        type: Object,
        default: [],
    },
    filters: Object,
});

let dateTimeFormat = (datetime) => Helpers.formatDate(datetime);
</script>
