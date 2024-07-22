<template>
    <Header title="Backlog / Crear un nuevo proyecto">
        <p>
            Para crear un nuevo proyecto, por favor completa los campos
            requeridos marcados con (*).
        </p>
    </Header>
    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label
                        for="projectName"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Nombre del proyecto *
                    </label>
                    <input
                        type="text"
                        id="projectName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingresa el nombre del proyecto"
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
                        for="cssCode"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Numero CSS
                    </label>
                    <input
                        type="text"
                        id="cssCode"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingresa el numero css"
                        v-model="form.css"
                    />
                    <div
                        v-if="form.errors.css"
                        v-text="form.errors.css"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>

                <div>
                    <label
                        for="user"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Analista *</label
                    >
                    <select
                        id="User"
                        v-model="form.user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="user in users"
                            :key="user.id"
                            :value="user.id"
                        >
                            {{ user.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.user_id"
                        v-text="form.errors.user_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="rol"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Rol *</label
                    >
                    <select
                        id="rol"
                        v-model="form.bkl_role_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="role in roles"
                            :key="role.id"
                            :value="role.id"
                        >
                            {{ role.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.bkl_role_id"
                        v-text="form.errors.bkl_role_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="area"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Area *</label
                    >
                    <select
                        id="area"
                        @change="getAllManagementById($event)"
                        v-model="form.bkl_area_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="(area, index) in areas"
                            :key="index"
                            :value="area.id"
                        >
                            {{ area.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.bkl_area_id"
                        v-text="form.errors.bkl_area_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="managment"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Gerencia *
                    </label>
                    <select
                        id="managment"
                        v-model="form.bkl_management_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="(management, index) in managements"
                            :key="index"
                            :value="management.id"
                        >
                            {{ management.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.bkl_management_id"
                        v-text="form.errors.bkl_management_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="client"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Cliente *
                    </label>
                    <input
                        type="text"
                        id="client"
                        v-model="form.client"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingresa el nombre del cliente"
                    />
                    <div
                        v-if="form.errors.client"
                        v-text="form.errors.client"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="type"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Tipo *</label
                    >
                    <select
                        id="type"
                        v-model="form.bkl_type_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="type in types"
                            :key="type.id"
                            :value="type.id"
                        >
                            {{ type.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.bkl_type_id"
                        v-text="form.errors.bkl_type_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="Deadline"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Fecha de entrega *</label
                    >
                    <input
                        type="date"
                        id="Deadline"
                        v-model="form.deadline"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    />
                    <div
                        v-if="form.errors.deadline"
                        v-text="form.errors.deadline"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div class="flex justify-center">
                    <label
                        for="Deadline"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white self-end"
                        >Prioridad*</label
                    >
                    <div
                        class="border border-solid border-green-400 hover:bg-green-500 w-12 ml-3 mr-3 cursor-pointer h-7 self-end text-white text-center text-sm flex justify-center items-center"
                        :class="{
                            colorFondo: selectedColor === 3,
                            'color-green': selectedColor === 3,
                        }"
                        @click="changeColor(3)"
                    >
                        Baja
                    </div>
                    <div
                        class="border border-solid border-yellow-500 hover:bg-yellow-300 w-12 ml-3 mr-3 h-12 cursor-pointer self-end text-white text-center text-sm flex justify-center items-center"
                        :class="{
                            colorFondo: selectedColor === 2,
                            'color-yellow': selectedColor === 2,
                        }"
                        @click="changeColor(2)"
                    >
                        Medio
                    </div>
                    <div
                        class="border border-solid border-red-600 hover:bg-red-500 w-12 ml-3 mr-3 cursor-pointer text-white text-center text-sm flex justify-center items-center"
                        :class="{
                            colorFondo: selectedColor === 1,
                            'color-red': selectedColor === 1,
                        }"
                        @click="changeColor(1)"
                    >
                        Alto
                    </div>
                    <div
                        v-if="form.errors.bkl_priority_id"
                        v-text="form.errors.bkl_priority_id"
                        class="text-red-500 text-xs mt-1 self-end"
                    ></div>
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        for="description"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Descripción de la vacante *
                    </label>
                    <textarea
                        id="description"
                        rows="4"
                        v-model="form.description"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Descripción del proyecto..."
                    ></textarea>
                    <p class="mt-2 text-sm text-gray-900 dark:text-white"></p>
                    <div
                        v-if="form.errors.description"
                        v-text="form.errors.description"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>

            <div class="flex justify-center">
                <Button type="submit" :disabled="loading">
                    Crear proyecto
                </Button>
                <LoadingSpinner
                    classes="fill-green-500"
                    v-if="loading"
                ></LoadingSpinner>
            </div>
        </form>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import LoadingSpinner from '@/Components/LoadingSpinner.vue';
import Button from '@/Components/Button.vue';
import axios from 'axios';
import { ref } from 'vue';

const props = defineProps({
    users: Array,
    roles: Array,
    areas: Array,
    types: Array,
});

let managements = ref([]);
let loading = ref(false);
let form = useForm({
    name: '',
    css: '',
    user_id: '',
    bkl_state_id: '1',
    taking_action: '0',
    situation: 'Ingresa el comentario',
    bkl_role_id: '',
    bkl_area_id: '',
    bkl_management_id: '',
    client: '',
    bkl_type_id: '',
    deadline: '',
    bkl_priority_id: '',
    description: '',
});

let getAllManagementById = async (event) => {
    let areaId = event.target.value;
    await axios
        .get(route('managements.index', areaId))
        .then((res) => {
            managements.value = res.data;
        })
        .catch((err) => {
            console.log(err);
        });
};

const selectedColor = ref(null);

const changeColor = (id) => {
    selectedColor.value = id;
    form.bkl_priority_id = id;
};

const submit = () => {
    loading.value = true;
    form.post(route('it.backlog.store'), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
        },
    });
};
</script>

<style scoped>
.color-green {
    background-color: #31c48d;
}

.color-red {
    background-color: #f05252;
}
.color-yellow {
    background-color: #faca15;
}
</style>
