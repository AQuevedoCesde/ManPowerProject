<template>
    <Header title="Backlog/Editar">
        <p>
            Para agregar avances o editar el proyecto, completa los campos
            obligatorios marcados con (*).
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <h4
                    class="font-semibold text-lg text-gray-800 leading-tight mb-4 flex justify-left items-center"
                >
                    <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 16"
                    >
                        <path
                            d="m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z"
                        />
                    </svg>

                    <span class="pl-2">Información del proyecto</span>
                </h4>

                <hr
                    class="h-px my-2 mb-4 bg-gray-200 border-0 dark:bg-gray-700"
                />

                <form @submit.prevent="submit" autocomplete="off">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <InputText
                                v-model="form.name"
                                initialText="Nombre del proyecto"
                                field="Nombre del proyecto"
                                :error="form.errors.name"
                            />
                        </div>
                        <div>
                            <InputText
                                v-model="form.css"
                                initialText="Número Css"
                                field="CSS"
                                :error="form.errors.css"
                            />
                        </div>

                        <InputSelect
                            :items="users"
                            v-model="form.user_id"
                            initialText="Seleccione"
                            field="Analista"
                            :error="form.errors.user_id"
                        />
                        <div>
                            <InputSelect
                                :items="roles"
                                v-model="form.role_id"
                                initialText="Seleccione"
                                field="Rol"
                                :error="form.errors.role_id"
                            />
                        </div>
                        <div>
                            <InputSelect
                                :items="areas"
                                v-model="form.area_id"
                                @change="getAllManagementById($event)"
                                initialText="Seleccione"
                                field="Areas"
                                :error="form.errors.areas"
                            />
                        </div>
                        <div>
                            <InputSelect
                                :items="managements"
                                v-model="form.management_id"
                                initialText="Seleccione"
                                field="Gerencia"
                                :error="form.errors.management_id"
                            />
                        </div>
                        <div>
                            <InputSelect
                                :items="roles"
                                :initialText="project.bkl_state.name"
                                field="Estado"
                                :error="form.errors.state"
                            />
                        </div>
                        <div>
                            <InputSelect
                                :items="types"
                                :initialText="project.bkl_type.name"
                                field="Tipo"
                                :error="form.errors.types"
                            />
                        </div>
                        <div>
                            <p class="font-bold" for="dateline">
                                Fecha de entrega
                            </p>
                            <input
                                v-model="deadline"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-black dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="date"
                            />
                        </div>
                        <div>
                            <InputText
                                v-model="form.description"
                                initialText="Ingrese la descripción del proyecto"
                                field="Descripción"
                                :error="form.errors.description"
                            />
                        </div>
                    </div>
                </form>
                <div class="flex justify-center items-start mt-20">
                    <Button>Editar proyecto</Button>
                </div>
            </div>
            <div>
                <h4
                    class="font-semibold text-lg text-gray-800 leading-tight mb-4 flex justify-left items-center"
                >
                    <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 16"
                    >
                        <path
                            d="m19.822 7.431-4.846-7A1 1 0 0 0 14.153 0H1a1 1 0 0 0-.822 1.569L4.63 8 .178 14.431A1 1 0 0 0 1 16h13.153a1.001 1.001 0 0 0 .823-.431l4.846-7a1 1 0 0 0 0-1.138Z"
                        />
                    </svg>

                    <span class="pl-2">Avances</span>
                </h4>

                <hr
                    class="h-px my-2 mb-4 bg-gray-200 border-0 dark:bg-gray-700"
                />
                <div
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-black dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 overflow-y-scroll h-screen p-5"
                >
                    <div class="flex justify-center mb-6">
                        <Pop_up :project="project"></Pop_up>
                        <Button
                            data-modal-target="crud-modal"
                            data-modal-toggle="crud-modal"
                            type="button"
                            >Agregar avance</Button
                        >
                    </div>
                    <ProgressContent />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import ProgressContent from '@/Pages/Backlog/Elements/ProgressContent.vue';
import Button from './../../Components/Button.vue';
import Pop_up from '@/Pages/Backlog/Elements/Pop_up.vue';
import { useForm } from '@inertiajs/inertia-vue3';
import InputText from './Elements/InputText.vue';
import InputSelect from '@/Pages/Backlog/Elements/InputSelect.vue';
import { ref } from 'vue';

const props = defineProps({
    roles: Object,
    project: Object,
    types: Object,
    users: Object,
    areas: Object,
    states: Object,
});

const form = useForm({
    name: props.project.name,
    css: props.project.css,
    user_id: props.project.user_id,
    area_id: props.project.bkl_management.bkl_area_id,
    management_id: props.project.bkl_management_id,
    state_id: props.project.state_id,
    type_id: props.project.type_id,
    description: props.project.description,
    deadline: props.project.deadline,
    taking_action: props.project.taking_action,
    situation: props.project.situation,
});

let managements = ref([]);
const alertEnabled = ref(false);

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
</script>

<style scoped>
.opacity-50 {
    opacity: 0.5;
}
</style>
