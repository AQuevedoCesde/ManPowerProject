<template>
    <Head :title="vacancy.position" />

    <Header :title="`Marketing / Vacantes / Ver #${vacancy.id}`"> </Header>

    <div
        class="mt-5 py-6 px-4 relative shadow-md rounded-lg bg-white border-b border-gray-200"
    >
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

            <span class="pl-2">{{ vacancy.position }}</span>
        </h4>

        <hr class="h-px my-2 mb-4 bg-gray-200 border-0 dark:bg-gray-700" />

        <AlertSuccess
            :message="$page.props.flash.message"
            v-if="$page.props.flash.message"
        ></AlertSuccess>

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <figure
                    class="max-w-lg vacancy_image"
                    v-if="
                        vacancy.vacancy_images.length != 0 &&
                        lastImage(vacancy.vacancy_images)
                    "
                >
                    <img
                        class="h-auto max-w-full"
                        :src="`${lastImage(vacancy.vacancy_images)}`"
                        :alt="vacancy.position"
                    />
                    <figcaption
                        class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400"
                    >
                        Imagen generada con AI
                    </figcaption>
                </figure>
                <div
                    class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                    role="alert"
                    v-else
                >
                    <span class="font-medium"
                        >Aún no has generado ninguna imagen para esta vacante o
                        no está aprobada.
                    </span>
                    Por favor, genera una ahora o solicita la aprobación de las
                    piezas generadas.
                    <Link
                        v-if="Helpers.can('create_image')"
                        :href="route('vacancy.social', vacancy.id)"
                        class="font-bold text-blue-600 dark:text-blue-500"
                        title="Generar pieza grafica"
                        >Generar imagen
                    </Link>
                </div>
            </div>
            <div>
                <ol
                    class="max-w-md space-y-1 text-gray-500 text-md list-inside dark:text-gray-400 mb-4"
                >
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Categoría:
                        </span>
                        {{ vacancy.category.name }}
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Ciudad:
                        </span>
                        {{ vacancy.city.name }} -
                        {{ vacancy.city.state.name }}
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Salario:
                        </span>
                        {{ vacancy.salary }}
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >ID Vacante Jobsite:
                        </span>
                        {{ vacancy.erp_vacancy_id }}
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Enlace de la vacante:
                        </span>
                        <a
                            class="bg-blue-700 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            :href="vacancy.link"
                            target="_blank"
                            rel="noopener noreferrer"
                            >Ver oferta</a
                        >
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Usuario:
                        </span>
                        {{ vacancy.user.name }}
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Estado:
                        </span>
                        <Status :status="vacancy.status"></Status>
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Fecha creado:
                        </span>
                        {{ formatDate(vacancy.created_at) }}
                    </li>
                    <li>
                        <span
                            class="font-semibold text-gray-900 dark:text-white"
                            >Fecha actualizado:
                        </span>
                        {{ formatDate(vacancy.updated_at) }}
                    </li>
                </ol>
                <div>
                    <h4 class="font-semibold text-gray-900 dark:text-white">
                        Descripción:
                    </h4>
                    <p class="text-sm">{{ vacancy.description }}</p>
                </div>
                <div v-if="vacancy.more_information">
                    <h4 class="font-semibold text-gray-900 dark:text-white">
                        Información adicional:
                    </h4>
                    <p class="text-sm">{{ vacancy.more_information }}</p>
                </div>
            </div>
        </div>

        <div class="relative overflow-x-auto mt-5">
            <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                v-if="vacancy.vacancy_images.length != 0"
            >
                <caption
                    class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800"
                >
                    Piezas generadas para la vacante
                </caption>
                <thead
                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                >
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Imagen</th>
                        <th scope="col" class="px-6 py-3">Descripción</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                        v-for="(image, index) in vacancy.vacancy_images"
                        :key="index"
                    >
                        <td class="px-6 py-4">{{ image.id }}</td>
                        <td class="w-32 p-4 vacancy_image">
                            <img
                                class="cursor-pointer"
                                :src="`${image.url}`"
                                :alt="vacancy.position"
                                @click="showImage(image)"
                                title="Descargar"
                            />
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-ellipsis text-md">
                                {{ image.description }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <Status :status="image.status"></Status>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end">
                                <div class="pl-2" v-if="image.status_id == 3">
                                    <span
                                        title="Descargar"
                                        @click="downloadImage(image.url)"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 20 19"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4"
                                            />
                                        </svg>
                                    </span>
                                </div>
                                <div class="pl-2">
                                    <span
                                        title="Ver imagen"
                                        @click="showImage(image)"
                                    >
                                        <svg
                                            class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950"
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
                                    </span>
                                </div>
                                <div
                                    class="pl-2"
                                    v-if="Helpers.can('edit_image')"
                                >
                                    <Link
                                        :href="
                                            route('vacancy.social.edit', image)
                                        "
                                    >
                                        <span title="Actualizar plantilla">
                                            <svg
                                                class="w-6 h-6 text-gray-800 dark:text-white cursor-pointer hover:text-gray-950"
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
                                                    d="M7 19H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v4M6 1v4a1 1 0 0 1-1 1H1m11 8h4m-2 2v-4m5 2a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"
                                                />
                                            </svg>
                                        </span>
                                    </Link>
                                </div>
                                <div
                                    class="pl-2"
                                    v-if="Helpers.can('delete_image')"
                                >
                                    <Delete
                                        :image="image"
                                        message="¿Estás seguro de que quieres eliminar esta imagen?"
                                    ></Delete>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <Modal @close="onClose($event)" v-model="showModal" classes="max-w-7xl">
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <figure class="max-w-full vacancy_image">
                    <img
                        v-if="vacancy_image.filename"
                        class="h-auto mx-auto max-w-full"
                        :src="`${vacancy_image.url}`"
                        :alt="vacancy.position"
                    />
                </figure>
            </div>
            <div>
                <h3 class="font-bold">Estado de la pieza gráfica.</h3>
                <div class="mt-4">
                    <form method="post" autocomplete="off">
                        <label
                            for="reason"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            >Por favor, proporciona la razón o motivo específico
                            detrás de tu decisión de rechazo o aprobación.
                            Detalles adicionales ayudarán a comprender mejor tu
                            elección. <strong>(Opcional)</strong></label
                        >
                        <textarea
                            id="reason"
                            rows="4"
                            v-model="vacancy_image.reason"
                            :disabled="
                                vacancy_image.status_id == 3 ||
                                vacancy_image.status_id == 2
                                    ? true
                                    : false
                            "
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Mensaje..."
                        ></textarea>
                    </form>
                </div>
                <div
                    class="mt-4"
                    v-if="
                        vacancy_image.status_id != 3 &&
                        vacancy_image.status_id != 2
                    "
                >
                    <LoadingSpinner
                        classes="fill-green-500"
                        v-if="loading"
                    ></LoadingSpinner>
                    <span v-if="Helpers.can('approve_image')">
                        <Button
                            @click="approveImage(vacancy_image)"
                            type="button"
                            classes=""
                            colors="bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                        >
                            Aprobar
                        </Button>
                    </span>
                    <span v-if="Helpers.can('reject_image')">
                        <Button
                            @click="rejectImage()"
                            type="button"
                            classes="ml-3"
                            colors="bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                        >
                            Rechazar
                        </Button>
                    </span>
                </div>
            </div>
        </div>
    </Modal>

    <AlertModal
        idModal="approveImage"
        v-model="showModalApprove"
        message="Aprobar imagen para su publicación en redes sociales!"
        @close="onCloseApprove($event)"
        @accept="onAcceptApprove($event)"
    ></AlertModal>

    <AlertModal
        idModal="rejectImage"
        v-model="showModalReject"
        message="Rechazar la imagen debido a que no cumple con las condiciones de marca o ortografía."
        @close="onCloseReject($event)"
        @accept="onAcceptReject($event)"
    ></AlertModal>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import Status from '@/Components/Status.vue';
import Modal from '@/Components/Modal.vue';
import LoadingSpinner from '@/Components/LoadingSpinner.vue';
import Button from '@/Components/Button.vue';
import AlertModal from '@/Components/AlertModal.vue';
import AlertSuccess from '@/Components/Alerts/AlertSuccess.vue';
import Delete from '@/Pages/Vacancies/Social/Delete.vue';

import { ref, onMounted } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

// path to Helpers
import Helpers from './../../helpers/helpers';

onMounted(() => {
    document
        .querySelector('.vacancy_image img')
        .addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });
});

const props = defineProps({
    vacancy: {
        required: true,
        type: Object,
    },
});

let loading = ref(false);
let showModalApprove = ref(false);
let showModalReject = ref(false);

const lastImage = (images) => {
    if (images.length > 0) {
        let approved = images.find((image) => image.status_id == 3);
        if (approved) {
            return approved.url;
        }
    }
};

const formatDate = (date) => {
    return Helpers.formatDateWhitHours(date);
};

const downloadImage = (image) => {
    const link = document.createElement('a');
    link.href = image;
    link.download = props.vacancy.position;
    link.target = '_blank';
    link.style.display = 'none';

    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
};

const showModal = ref(false);
const onClose = (event) => {
    showModal.value = event;
    document.querySelector('body > div[modal-backdrop]')?.remove();
};
let vacancy_image = ref({
    reason: '',
});
let showImage = (image) => {
    showModal.value = true;
    vacancy_image.value = image;
};

// Approve the image
const approveImage = () => (showModalApprove.value = true);
const onCloseApprove = (event) => {
    showModalApprove.value = event;
    document.querySelector('body > div[modal-backdrop]')?.remove();
};
const onAcceptApprove = (event) => {
    let saveImage = useForm({ ...vacancy_image.value });

    saveImage.post(route('vacancy.social.approve'), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
            onCloseApprove(false);
        },
        onSuccess: () => {
            onClose(false);
            onCloseApprove(false);
        },
    });
};

// Reject the image
const rejectImage = () => (showModalReject.value = true);
const onCloseReject = (event) => {
    showModalReject.value = event;
    document.querySelector('body > div[modal-backdrop]')?.remove();
};
const onAcceptReject = (event) => {
    let saveImage = useForm({ ...vacancy_image.value });

    saveImage.post(route('vacancy.social.reject'), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
            onCloseReject(false);
        },
        onSuccess: () => {
            onClose(false);
            onCloseReject(false);
        },
    });
};
</script>
