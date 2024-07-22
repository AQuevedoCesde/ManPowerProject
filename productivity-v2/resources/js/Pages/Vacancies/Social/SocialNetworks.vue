<template>
    <Head title="Generar pieza para redes sociales" />

    <Header title="Marketing / Vacantes / Generar pieza para redes sociales">
        <p>
            Experimenta la revolucionaria capacidad de la inteligencia
            artificial para crear piezas gráficas atractivas y personalizadas
            que complementan tus ofertas laborales. La IA potencia la
            presentación visual de cada vacante.
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <ol
            class="flex items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base"
        >
            <li
                class="flex md:w-full items-center text-blue-600 dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700"
            >
                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500"
                >
                    <svg
                        class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2.5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                        />
                    </svg>
                    OpenAI
                </span>
            </li>
            <li
                class="flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700"
                :class="{
                    'text-blue-600 dark:text-blue-500':
                        formStep == 2 || formStep == 3,
                }"
            >
                <span
                    class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500"
                >
                    <svg
                        class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2.5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        v-if="formStep == 2 || formStep == 3"
                    >
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                        />
                    </svg>
                    <span v-else class="mr-2">2</span>
                    Verificación
                </span>
            </li>
            <li
                class="flex items-center"
                :class="{
                    'text-blue-600 dark:text-blue-500': formStep == 3,
                }"
            >
                <svg
                    class="w-3.5 h-3.5 sm:w-4 sm:h-4 mr-2.5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    v-if="formStep == 3"
                >
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"
                    />
                </svg>
                <span v-else class="mr-2">3</span>
                Resultado
            </li>
        </ol>
    </div>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <div v-if="formStep == 1" class="transition duration-300 ease-in-out">
            <AlertSuccess
                :message="$page.props.flash.message"
                v-if="$page.props.flash.message"
            ></AlertSuccess>

            <AlertDangerClose v-model="openAiError">
                <span class="font-bold">Error! </span>
                <span v-html="openAiError"></span>
            </AlertDangerClose>

            <div class="grid md:grid-cols-4 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <label
                        for="words"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Palabas</label
                    >
                    <input
                        type="number"
                        id="words"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="40"
                        v-model="promptConfig.words"
                        @input="checkMaxLengthWords"
                    />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label
                        for="characters"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Caracteres</label
                    >
                    <input
                        type="number"
                        id="characters"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="280"
                        v-model="promptConfig.characters"
                        @input="checkMaxLengthCharacters"
                    />
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <label
                        for="body"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Descripción de la vacante (Puedes modificar las
                        instrucciones)</label
                    >
                    <textarea
                        id="body"
                        rows="11"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Información de la oferta laboral..."
                        v-model="formAi.body"
                        :disabled="true"
                    ></textarea>
                    <div
                        v-if="errorsAi"
                        v-for="error in errorsAi.body"
                        :key="error"
                        v-text="error"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>

                <div class="relative z-0 w-full mb-6 group">
                    <label
                        for="body_formatter"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Resultado</label
                    >
                    <textarea
                        id="body_formatter"
                        rows="11"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Texto generado por inteligencia artificial"
                        v-model="formAi.result"
                        :disabled="true"
                    ></textarea>
                </div>
            </div>
        </div>

        <div
            v-if="formStep == 2"
            class="transition duration-300 ease-in-out text-sm pb-5"
        >
            <h4
                class="font-semibold text-lg text-gray-800 leading-tight mb-1 flex justify-left items-center"
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
            <p>
                Verifica la información de la vacante antes de generar la pieza
                grafica.
            </p>
            <div class="text-sm">
                <hr
                    class="h-px my-2 mb-4 bg-gray-200 border-0 dark:bg-gray-700"
                />

                <AlertDangerClose v-model="showAlertDanger">
                    <span class="font-bold">Error! </span>
                    <span v-html="errorMessage"></span>
                </AlertDangerClose>

                <div class="grid md:grid-cols-5 md:gap-6">
                    <div class="relative z-0 w-full md:col-span-2 group">
                        <div>
                            <label
                                for="city"
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                                >Ciudad *</label
                            >
                            <input
                                type="text"
                                id="city"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Medellín"
                                v-model="vacancy.city.name"
                                disabled="disabled"
                            />
                            <div
                                v-if="errorsImageGeneration"
                                v-for="error in errorsImageGeneration.city"
                                :key="error"
                                v-text="error"
                                class="text-red-500 text-xs mt-1"
                            ></div>
                        </div>
                    </div>

                    <div class="relative z-0 w-full group md:col-span-3">
                        <label
                            for="recruiter_email"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                            >Categoría *</label
                        >
                        <input
                            type="text"
                            id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            v-model="vacancy.category.name"
                            disabled="disabled"
                        />
                    </div>
                    <div class="md:col-span-1">
                        <label
                            for="erp_vacancy_id"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                            >ID Vacante ERP *</label
                        >
                        <input
                            type="number"
                            id="erp_vacancy_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="40484"
                            v-model="vacancy.erp_vacancy_id"
                            :disabled="true"
                        />
                        <div
                            v-if="errorsImageGeneration"
                            v-for="error in errorsImageGeneration.erp_vacancy_id"
                            :key="error"
                            v-text="error"
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
                            v-model="vacancy.link"
                            :disabled="true"
                        />
                        <div
                            v-if="errorsImageGeneration"
                            v-for="error in errorsImageGeneration.link"
                            :key="error"
                            v-text="error"
                            class="text-red-500 text-xs mt-1"
                        ></div>
                    </div>

                    <div class="relative z-0 w-full group md:col-span-5">
                        <div>
                            <label
                                for="salary"
                                class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                                >Salario *</label
                            >
                            <input
                                type="text"
                                id="salary"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Salario: $1.160.000 + afiliación a EPS y ARL"
                                v-model="vacancy.salary"
                                :disabled="true"
                            />
                            <div
                                v-if="errorsImageGeneration"
                                v-for="error in errorsImageGeneration.salary"
                                :key="error"
                                v-text="error"
                                class="text-red-500 text-xs mt-1"
                            ></div>
                        </div>
                    </div>

                    <div class="relative z-0 w-full group md:col-span-5">
                        <label
                            for="description"
                            class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                            >Descripción de la vacante *</label
                        >
                        <textarea
                            id="description"
                            rows="6"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Descripción de la vacante optimizada para redes sociales..."
                            v-model="formAi.result"
                        ></textarea>
                        <p class="mt-2 text-sm text-gray-900 dark:text-white">
                            <span class="font-bold"
                                >{{ formAi.result.length }} / 280</span
                            >
                        </p>
                        <div
                            v-if="errorsImageGeneration"
                            v-for="error in errorsImageGeneration.result"
                            :key="error"
                            v-text="error"
                            class="text-red-500 text-xs mt-1"
                        ></div>
                    </div>
                </div>
            </div>
        </div>
        <div
            v-if="formStep == 3"
            class="transition-opacity ease-in duration-700 mb-6"
        >
            <h4 class="font-semibold text-lg text-gray-800 leading-tight mb-2">
                Resultado
            </h4>
            <div class="text-sm">
                <hr
                    class="h-px my-2 mb-4 bg-gray-200 border-0 dark:bg-gray-700"
                />

                <figure class="max-w-full" v-if="image">
                    <img
                        class="h-auto mx-auto"
                        :src="image.url"
                        alt="image description"
                    />
                    <figcaption
                        class="mt-2 text-sm font-bold text-center text-gray-500 dark:text-gray-400"
                    >
                        Imagen generada a traves de un sistema automatizado, por
                        favor validar la información.
                    </figcaption>
                </figure>
                <span
                    v-else
                    class="mt-2 text-sm font-bold text-center text-gray-500 dark:text-gray-400"
                    >Aún no se ha generado la pieza grafica.</span
                >
            </div>
        </div>
        <div class="actions">
            <div
                class="max-w-7xl mx-auto text-right flex items-center justify-end"
            >
                <LoadingSpinner
                    classes="fill-green-500"
                    v-if="loading"
                ></LoadingSpinner>
                <ButtonComponent
                    v-if="formStep == 1"
                    @click="submitAi()"
                    type="submit"
                    :disabled="loading"
                    classes="ml-3"
                    colors="bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    Generar texto
                </ButtonComponent>

                <ButtonComponent
                    v-if="formStep == 2"
                    @click="imageGeneration()"
                    :disabled="loading || formAi.result == ''"
                    type="submit"
                    classes="ml-3"
                    colors="bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    Generar Imagen
                </ButtonComponent>

                <ButtonComponent
                    class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-3"
                    v-if="formStep > 1"
                    @click="prevStep()"
                >
                    Anterior
                </ButtonComponent>
                <ButtonComponent
                    class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ml-3"
                    v-if="formStep < 3 && (image || formStep == 1)"
                    @click="nextStep()"
                >
                    Siguiente
                </ButtonComponent>

                <ButtonComponent
                    v-if="formStep == 3"
                    @click="submitVacancyImage()"
                    :disabled="loading || !image"
                    type="button"
                    classes="ml-3"
                    colors="bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    Finalizar
                </ButtonComponent>
            </div>
        </div>
    </div>
    <AlertModal
        idModal="saveImageAi"
        v-model="showModal"
        message="La imagen será enviada al área de comunicaciones para su respectiva verificación y aprobación. Una vez aprobada, podrá ser publicada en redes sociales."
        @close="onClose($event)"
        @accept="onAccept($event)"
    ></AlertModal>
</template>

<script setup>
import Header from '@/Components/Header.vue';
import LoadingSpinner from '@/Components/LoadingSpinner.vue';
import ButtonComponent from '@/Components/Button.vue';
import AlertModal from '@/Components/AlertModal.vue';
import AlertDangerClose from '@/Components/Alerts/AlertDangerClose.vue';
import AlertSuccess from '@/Components/Alerts/AlertSuccess.vue';

import { ref, computed, watch } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    vacancy: {
        type: Object,
    },
});

let loading = ref(false);
let showAlertDanger = ref(false);
let errorMessage = ref();
let openAiError = ref();

// Steps navigation
const formStep = ref(1);
function nextStep() {
    formStep.value++;
}
function prevStep() {
    formStep.value--;
}

// Step 1
const promptConfig = ref({
    words: 40,
    characters: 280,
});

const checkMaxLengthWords = () => {
    if (promptConfig.value.words > 40) {
        promptConfig.value.words = 40;
    }
};

const checkMaxLengthCharacters = () => {
    if (promptConfig.value.characters > 280) {
        promptConfig.value.characters = 280;
    }
};

const formAi = ref({
    body: computed(() => {
        return `Por favor ayuda mejorando la redacción del siguiente texto corrigiendo su ortografía donde sea necesario y puntuación. Es para una pieza gráfica publicitaria en redes sociales, genera todo en un solo párrafo, máximo con ${promptConfig.value.words} palabras y un total de ${promptConfig.value.characters} caracteres: \r\n \r\n${props.vacancy.description}`;
    }),
    result: '',
});

let errorsAi = ref([]);
let submitAi = async () => {
    loading.value = true;
    await axios
        .post(route('vacancy.social.completions'), formAi.value)
        .then((res) => {
            formAi.value.result = res.data.message.content;
            errorsAi.value = [];
            loading.value = false;
        })
        .catch((err) => {
            loading.value = false;
            if (err.response.status === 422) {
                errorsAi.value = err.response.data.errors;
                return;
            }
            console.log(err.response.data.message);
            openAiError.value = err.response.data.message;
        });
};

// Step 2
let errorsImageGeneration = ref([]);
let image = ref();

let imageGeneration = async () => {
    loading.value = true;
    let { result } = formAi.value;

    await axios
        .post(route('vacancy.social.generate'), {
            ...props.vacancy,
            result,
        })
        .then((res) => {
            errorsImageGeneration.value = [];
            showAlertDanger.value = false;
            image.value = res.data;
            formStep.value = 3;
            loading.value = false;
        })
        .catch((err) => {
            loading.value = false;
            if (err.response.status === 422) {
                errorsImageGeneration.value = err.response.data.errors;
                return;
            }
            showAlertDanger.value = true;
            errorMessage.value = err.response.data.message;
        });
};

// Step 3
const showModal = ref(false);

let submitVacancyImage = () => {
    showModal.value = true;
};

const onClose = (event) => {
    showModal.value = event;
    document.querySelector('body > div[modal-backdrop]')?.remove();
};

const onAccept = () => {
    loading.value = true;
    let { result } = formAi.value;
    let { filename, filepath } = image.value;
    let saveVacancyImage = useForm({
        ...props.vacancy,
        result,
        filename,
        filepath,
    });

    onClose(false);

    saveVacancyImage.post(route('vacancy.social.store'), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
        },
    });
};
</script>
