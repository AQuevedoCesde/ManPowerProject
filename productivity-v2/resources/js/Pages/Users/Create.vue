<template>
    <Head title="Crear usuario" />

    <Header title="Administración / Crear usuario">
        <p>
            Crear nuevo usuario, por favor completa los campos requeridos
            marcados con (*).
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <form @submit.prevent="search" autocomplete="off" class="mb-6">
            <div class="grid gap-0 mb-0 md:grid-cols-1">
                <div class="flex items-center">
                    <label for="search-user" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div
                            class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none"
                        >
                            <svg
                                class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1c0 .6-.4 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                />
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="search-user"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Buscar usuario a través de la dirección de correo electrónico."
                            v-model="formSearch.email"
                        />
                    </div>
                    <button
                        type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-500 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 rounded-lg border border-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300"
                    >
                        <svg
                            class="w-4 h-4"
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
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                            />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
                <div
                    v-if="errorsFormSearch"
                    v-for="error in errorsFormSearch.email"
                    :key="error"
                    v-text="error"
                    class="text-red-500 text-xs mt-1"
                ></div>
                <div
                    v-if="searchMessage"
                    v-text="searchMessage"
                    class="text-red-500 text-xs mt-1"
                ></div>
            </div>
        </form>

        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label
                        for="name"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Nombre completo *</label
                    >
                    <input
                        type="text"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nombre completo"
                        v-model="form.name"
                        disabled="disabled"
                    />
                    <div
                        v-if="form.errors.name"
                        v-text="form.errors.name"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="email"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Correo electrónico *</label
                    >
                    <input
                        type="email"
                        id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="sistemassp@manpower.com.co"
                        v-model="form.email"
                        disabled="disabled"
                    />
                    <div
                        v-if="form.errors.email"
                        v-text="form.errors.email"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        for="roles"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Roles</label
                    >
                    <select
                        multiple
                        id="roles"
                        v-model="form.roles"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option
                            v-for="(role, index) in roles"
                            :key="index"
                            :value="role.id"
                        >
                            {{ role.display_name }}
                        </option>
                    </select>
                    <div
                        v-if="!form.errors.roles"
                        class="mt-1 text-xs text-gray-500 dark:text-gray-300"
                    >
                        Elige uno o varios roles para otorgar permisos al
                        usuario. También puedes asignar permisos de manera
                        individual utilizando la opción que se encuentra a
                        continuación. Dejar en blanco para eliminar roles al
                        usuario.
                    </div>
                    <div
                        v-if="form.errors.roles"
                        v-text="form.errors.roles"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>

            <label
                for="roles"
                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                >Permisos</label
            >
            <div
                v-for="(column, columnIndex) in permissionsCols"
                :key="columnIndex"
                class="grid gap-6 mb-2 md:grid-cols-4"
            >
                <div
                    class="flex"
                    v-for="(permission, index) in column"
                    :key="index"
                >
                    <div class="flex items-center h-5">
                        <input
                            aria-describedby="helper-checkbox-text"
                            type="checkbox"
                            :id="permission.name"
                            :value="permission.id"
                            v-model="form.permissions"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        />
                    </div>
                    <div class="ms-2 text-sm">
                        <label
                            :for="permission.name"
                            class="font-bold text-gray-900 dark:text-gray-300"
                            >{{ permission.display_name }}</label
                        >
                        <p
                            id="helper-checkbox-text"
                            class="text-xs font-normal text-gray-500 dark:text-gray-300"
                        >
                            {{ permission.name }}
                        </p>
                    </div>
                </div>
            </div>
            <div
                v-if="form.errors.permissions"
                v-text="form.errors.name"
                class="text-red-500 text-xs mt-1"
            ></div>

            <div class="flex items-center mt-4">
                <Button type="submit" :disabled="loading">
                    Crear usuario
                </Button>
                <LoadingSpinner
                    classes="fill-green-500 ml-4"
                    v-if="loading"
                ></LoadingSpinner>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import LoadingSpinner from '@/Components/LoadingSpinner.vue';
import Button from '@/Components/Button.vue';
import Header from '@/Components/Header.vue';
import Helpers from '@/helpers/helpers';
import { ref, computed } from 'vue';

const props = defineProps({
    permissions: Array,
    roles: Array,
});

const loadingSearch = ref(false);
const formSearch = ref({ email: '' });
let errorsFormSearch = ref([]);
let searchMessage = ref();
const search = async () => {
    await axios
        .post(route('users.adldap'), formSearch.value)
        .then((res) => {
            console.log(res);
            if (res.data.hasOwnProperty('message')) {
                searchMessage.value = res.data.message;
            } else {
                searchMessage.value = null;
            }

            form.email = res.data.email;
            form.name = res.data.name;

            errorsFormSearch.value = [];
        })
        .catch((err) => {
            searchMessage.value = null;
            if (err.response.status === 422) {
                errorsFormSearch.value = err.response.data.errors;
            }
        });
};

let loading = ref(false);

let form = useForm({
    name: null,
    email: null,
    roles: [],
    permissions: [],
});

const permissionsCols = computed(() => {
    const columnCount = 4;
    return Helpers.chunk(props.permissions, columnCount);
});

let submit = () => {
    loading.value = true;
    form.post(route('users.store'), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
        },
    });
};
</script>
