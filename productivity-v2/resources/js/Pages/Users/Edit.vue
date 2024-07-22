<template>
    <Head title="Editar usuario" />

    <Header :title="`Administración / Editar usuario #${user.id}`">
        <p>
            Editar usuario #{{ user.id }}, por favor completa los campos
            requeridos marcados con (*).
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
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
                    Actualizar usuario
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
import { ref, computed, onMounted } from 'vue';

const props = defineProps({
    user: Object,
    permissions: Array,
    roles: Array,
});

onMounted(() => {
    form.permissions = props.user.permissions.map(function (permission) {
        return permission.id;
    });
    form.roles = props.user.roles.map(function (role) {
        return role.id;
    });
});

let loading = ref(false);

let form = useForm({
    id: props.user.id,
    name: props.user.name,
    email: props.user.email,
    roles: [],
    permissions: [],
});

const permissionsCols = computed(() => {
    const columnCount = 4;
    return Helpers.chunk(props.permissions, columnCount);
});

let submit = () => {
    loading.value = true;
    form.put(route('users.update', props.user.id), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
        },
    });
};
</script>
