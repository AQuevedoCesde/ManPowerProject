<template>
    <Head title="Cargar imagen" />

    <Header title="Vacantes / Multimedia / Cargar imagen">
        <p>
            Cargar imágenes para ser asociadas luego a las publicaciones de
            vacantes.
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <form @submit.prevent="submit()" autocomplete="off">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label
                        for="category"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Categoría</label
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
                        for="state"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Color predominante</label
                    >
                    <select
                        id="state"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        v-model="form.color"
                    >
                        <option selected value="">Seleccione...</option>
                        <option
                            v-for="(color, index) in colors"
                            :key="index"
                            :value="color.hex"
                        >
                            {{ color.name }}
                        </option>
                    </select>
                    <div
                        v-if="form.errors.color"
                        v-text="form.errors.color"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        for="image"
                        >Archivos (png, jpg o jpeg)</label
                    >
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        id="multiple_files"
                        type="file"
                        multiple
                        @change="handleFileChange($event)"
                    />
                    <progress
                        v-if="form.progress"
                        :value="form.progress.percentage"
                        max="100"
                    >
                        {{ form.progress.percentage }}%
                    </progress>

                    <div
                        v-if="form.errors.images"
                        v-text="form.errors.images"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>
            <div class="flex items-center">
                <Button type="submit" :disabled="loading">
                    Subir imagenes
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
import { ref } from 'vue';

defineProps({
    categories: Array,
});

let loading = ref(false);
let colors = ref([
    { name: 'Orange', hex: '#e77c22' },
    { name: 'Blue', hex: '#466ea5' },
    { name: 'Red', hex: '#ab404b' },
    { name: 'Gray', hex: '#67696f' },
    { name: 'Green', hex: '#6e8f82' },
    { name: 'Light Blue', hex: '#6390c6' },
    { name: 'Black', hex: '#000000' },
]);

let form = useForm({
    category_id: '',
    color: '',
    images: null,
});

const handleFileChange = (event) => {
    form.images = event.target.files;
};

let submit = () => {
    loading.value = true;
    form.post(route('vacancies.uploads.store'), {
        preserveScroll: true,
        onError: (errors) => {
            loading.value = false;
        },
        onSuccess: (page) => {
            console.log('here 1');
        },
        onFinish: (visit) => {
            console.log('here 2');
        },
    });
};
</script>
