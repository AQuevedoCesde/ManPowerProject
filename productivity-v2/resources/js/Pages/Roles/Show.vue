<template>
    <Head title="Crear nuevo rol" />

    <Header :title="`Administración / Ver rol #${props.role.id} `">
        <p>Ver rol #{{ props.role.id }}.</p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        for="display_name"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Nombre del rol</label
                    >
                    <input
                        type="text"
                        id="display_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Administrador"
                        v-model="form.display_name"
                        disabled
                    />
                </div>
            </div>

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
                            disabled
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
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import Header from "@/Components/Header.vue";
import Helpers from "@/helpers/helpers";
import { ref, computed, onMounted } from "vue";

const props = defineProps({
    permissions: Array,
    role: Object,
});

onMounted(() => {
    form.permissions = props.role.permissions.map(function (permission) {
        return permission.id;
    });
});

const permissionsCols = computed(() => {
    const columnCount = 4;
    return Helpers.chunk(props.permissions, columnCount);
});

let form = useForm({
    display_name: props.role.display_name,
    permissions: [],
});
</script>
