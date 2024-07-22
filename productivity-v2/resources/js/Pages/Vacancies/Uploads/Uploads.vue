<template>
    <Head title="Multimedia" />

    <Header title="Vacantes / Multimedia">
        <p>
            El módulo de CRUD de Imágenes redefine la gestión visual al ofrecer
            una plataforma intuitiva para cargar y organizar plantillas
            destinadas a piezas gráficas. Facilita la asociación de imágenes con
            categorías específicas y la incorporación de colores predominantes,
            proporcionando una herramienta eficiente para la creación y
            personalización de recursos visuales en un solo lugar.
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <div
            class="flex items-center justify-end pb-6"
            v-if="Helpers.can('create_mediafiles')"
        >
            <div>
                <Link
                    :href="route('vacancies.uploads.create')"
                    class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    >Subir imágenes</Link
                >
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <figure
                v-for="(file, index) in mediafiles.data"
                :key="index"
                @click="showMediaFile(file, index)"
                class="relative max-w-xs overflow-hidden bg-cover bg-no-repeat cursor-pointer rounded-lg"
            >
                <img
                    class="h-auto rounded-lg max-w-full transition duration-300 ease-in-out hover:scale-110"
                    :src="`${file.url}`"
                    :alt="file.name"
                />

                <figcaption
                    class="absolute px-4 py-2 text-sm text-white bottom-0 w-full bg-black/50"
                >
                    <p>
                        {{ file.category.name }}
                    </p>
                </figcaption>
            </figure>
        </div>
        <nav
            class="flex items-center justify-between py-4 px-0 pt-6"
            aria-label="Table navigation"
        >
            <div>
                <span
                    class="text-sm font-normal text-gray-500 dark:text-gray-400"
                    >Mostrando
                    <span class="font-semibold text-gray-900 dark:text-white"
                        >{{ mediafiles.from }}-{{ mediafiles.to }}</span
                    >
                    de
                    <span class="font-semibold text-gray-900 dark:text-white">{{
                        mediafiles.total
                    }}</span>
                </span>
            </div>
            <div>
                <Pagination :links="mediafiles.links" />
            </div>
        </nav>
    </div>

    <Modal @close="onClose($event)" v-model="showModal" classes="max-w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <figure
                    class="relative max-w-full overflow-hidden bg-cover bg-no-"
                    v-if="mediaFile.name"
                >
                    <img
                        class="h-auto max-w-full"
                        :src="`${mediaFile.url}`"
                        :alt="mediaFile.name"
                    />
                </figure>
            </div>

            <div class="text-left">
                <h6 class="text-lg font-bold dark:text-white mb-4">
                    Editar imagen
                </h6>
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
                                :disabled="
                                    !Helpers.can('edit_mediafiles')
                                        ? true
                                        : false
                                "
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
                                :disabled="
                                    !Helpers.can('edit_mediafiles')
                                        ? true
                                        : false
                                "
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
                    <div class="grid gap-6 mb-6 md:grid-cols-1 text-left">
                        <div>
                            <label
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                                for="image"
                                >Archivos (png, jpg o jpeg)</label
                            >
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="image"
                                type="file"
                                :disabled="
                                    !Helpers.can('edit_mediafiles')
                                        ? true
                                        : false
                                "
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
                        <Button
                            type="submit"
                            :disabled="loading"
                            v-if="Helpers.can('edit_mediafiles')"
                        >
                            Actualizar imagen
                        </Button>
                        <Button
                            type="btn"
                            :disabled="loading"
                            colors="bg-red-500 hover:bg-red-800 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            classes="ml-2"
                            @click.prevent="deleteMediaFile()"
                            v-if="Helpers.can('delete_mediafiles')"
                        >
                            Eliminar imagen
                        </Button>
                        <LoadingSpinner
                            classes="fill-green-500 ml-2"
                            v-if="loading"
                        ></LoadingSpinner>
                    </div>
                </form>
            </div>
        </div>
    </Modal>

    <AlertModal
        idModal="deleteMediaImage"
        v-model="showModalDelete"
        message="Eliminar imagen plantilla?"
        @close="onCloseDelete($event)"
        @accept="onAcceptDeleteMediaFile($event)"
    ></AlertModal>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Pagination from '@/Components/Pagination.vue';
import Modal from '@/Components/Modal.vue';
import LoadingSpinner from '@/Components/LoadingSpinner.vue';
import Button from '@/Components/Button.vue';
import AlertModal from '@/Components/AlertModal.vue';

import Helpers from '@/helpers/helpers';

import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

defineProps({
    mediafiles: Object,
    categories: Array,
});

let loading = ref(false);
let showModal = ref(false);
let mediaFile = ref({});
let showModalDelete = ref(false);
let colors = ref([
    { name: 'Orange', hex: '#e77c22' },
    { name: 'Blue', hex: '#466ea5' },
    { name: 'Red', hex: '#ab404b' },
    { name: 'Gray', hex: '#67696f' },
    { name: 'Green', hex: '#6e8f82' },
    { name: 'Light Blue', hex: '#6390c6' },
    { name: 'Black', hex: '#000000' },
]);
const form = useForm({
    category_id: '',
    color: '',
    images: null,
});

watch(mediaFile, (newVal, oldVal) => {
    form.category_id = newVal.category_id;
    form.color = newVal.color;
});

let showMediaFile = (file, index) => {
    showModal.value = true;
    mediaFile.value = file;
};

const onClose = (event) => {
    showModal.value = event;
    form.images = null;
    const file = document.getElementById('image');
    file.value = '';
    document.querySelector('body > div[modal-backdrop]')?.remove();
};

const handleFileChange = (event) => {
    form.images = event.target.files;
};

let submit = () => {
    loading.value = true;
    form.post(route('vacancies.uploads.update', mediaFile.value), {
        preserveScroll: true,
        onError: (errors) => {
            loading.value = false;
        },
        onSuccess: (page) => {
            loading.value = false;
            onClose(false);
        },
    });
};

let deleteMediaFile = () => {
    showModalDelete.value = true;
};

const onCloseDelete = (event) => {
    showModalDelete.value = event;
    document.querySelector('body > div[modal-backdrop]')?.remove();
};

let onAcceptDeleteMediaFile = () => {
    loading.value = true;
    let deleteImage = useForm({ ...mediaFile.value });

    deleteImage.delete(route('vacancies.uploads.delete', mediaFile.value), {
        preserveScroll: true,
        onError: () => {
            onCloseDelete(false);
            loading.value = false;
        },
        onSuccess: () => {
            onCloseDelete(false);
            onClose(false);
            loading.value = false;
        },
    });
};
</script>
