<template>
    <Head title="Editar vacante" />

    <Header :title="`Marketing / Editar vacante #${props.vacancy.id} `">
        <p>
            Editar vacante, por favor completa los campos requeridos marcados
            con (*).
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label
                        for="category"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Categoría *</label
                    >
                    <select
                        id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.category_id"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="category in categories"
                            :key="category.id"
                            :value="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.category_id"
                        v-text="form.errors.category_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="position"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Nombre del Cargo *</label
                    >
                    <input
                        type="text"
                        id="position"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ingeniero(a) eléctrico(a) de presupuesto"
                        v-model="form.position"
                    />
                    <div
                        v-if="form.errors.position"
                        v-text="form.errors.position"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="state"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Departamento *</label
                    >
                    <select
                        id="state"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        @change="getAllCitiesById($event)"
                        v-model="form.department_id"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="(state, index) in states"
                            :key="index"
                            :value="state.id"
                        >
                            {{ state.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.department_id"
                        v-text="form.errors.department_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div>
                    <label
                        for="city"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Ciudad *</label
                    >
                    <select
                        id="city"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.city_id"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="(city, index) in cities"
                            :key="index"
                            :value="city.id"
                        >
                            {{ city.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.city_id"
                        v-text="form.errors.city_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        for="description"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Descripción de la vacante *</label
                    >
                    <textarea
                        id="description"
                        rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Descripción de la vacante..."
                        v-model="form.description"
                    ></textarea>
                    <p class="mt-2 text-sm text-gray-900 dark:text-white">
                        <span class="font-bold"
                            >{{ form.description.length }} / 300</span
                        >
                    </p>
                    <div
                        v-if="form.errors.description"
                        v-text="form.errors.description"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-6">
                <div class="md:col-span-2">
                    <label
                        for="erp_vacancy_id"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >ID Vacante Jobsite *</label
                    >
                    <input
                        type="number"
                        id="erp_vacancy_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="40484"
                        v-model="form.erp_vacancy_id"
                    />
                    <div
                        v-if="form.errors.erp_vacancy_id"
                        v-text="form.errors.erp_vacancy_id"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
                <div class="md:col-span-4">
                    <label
                        for="link"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Enlace de la vacante *</label
                    >
                    <input
                        type="text"
                        id="link"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="https://manpowergroupco.avature.net/es_CO/empleate/JobDetail/..."
                        v-model="form.link"
                    />
                    <div
                        v-if="form.errors.link"
                        v-text="form.errors.link"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>

            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        for="salary"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Salario
                    </label>
                    <input
                        type="text"
                        id="salary"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="$7.000.000 a $10.000.000 de acuerdo al perfil"
                        v-model="form.salary"
                    />
                    <div
                        v-if="form.errors.salary"
                        v-text="form.errors.salary"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>

            <div class="flex items-center">
                <Button type="submit" :disabled="loading">
                    Actualizar vacante
                </Button>
                <LoadingSpinner
                    classes="fill-green-500 ml-2"
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
import { ref, watch, onMounted } from 'vue';

const props = defineProps({
    vacancy: {
        required: true,
        type: Object,
    },
    categories: Array,
    states: Array,
});

let cities = ref([]);
let loading = ref(false);

const getAllCitiesById = async (event) => {
    let departmentId = typeof event == 'number' ? event : event.target.value;
    console.log(departmentId);
    await axios
        .get(route('cities.index', departmentId))
        .then((res) => {
            cities.value = res.data;
        })
        .catch((err) => {
            console.log(err);
        });
};

onMounted(() => {
    getAllCitiesById(props.vacancy.city.state.id);
    console.log(props.vacancy.city.state.id);
});

let form = useForm({
    category_id: props.vacancy.category_id,
    position: props.vacancy.position,
    department_id: props.vacancy.city.state.id,
    city_id: props.vacancy.city_id,
    description: props.vacancy.description,
    erp_vacancy_id: props.vacancy.erp_vacancy_id,
    link: props.vacancy.link,
    salary: props.vacancy.salary,
});

let submit = () => {
    loading.value = true;
    form.put(route('vacancies.update', props.vacancy.id), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
        },
    });
};
</script>
