<template>
    <Head title="Actualizar plantilla" />

    <Header title="Vacantes / Piezas / Actualizar">
        <p>
            Elige una imagen para regenerar la pieza gráfica con la imagen
            seleccionada.
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <AlertDanger
            :message="$page.props.flash.message"
            v-if="$page.props.flash.message"
        ></AlertDanger>

        <form @submit.prevent="submit()" autocomplete="off">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div v-for="(file, index) in mediaFiles" :key="index">
                    <input
                        type="radio"
                        :id="`image-${file.id}`"
                        :value="file.id"
                        v-model="form.template_image"
                        class="hidden peer"
                    />
                    <label
                        :for="`image-${file.id}`"
                        class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 peer-checked:bg-gray-300"
                    >
                        <img
                            class="h-auto rounded-lg max-w-full transition duration-300 ease-in-out hover:scale-110"
                            :src="`${file.url}`"
                            :alt="file.filename"
                        />
                    </label>
                </div>
            </div>
            <div
                v-if="form.errors.template_image"
                v-text="form.errors.template_image"
                class="text-red-500 text-xs mt-2"
            ></div>
            <div class="flex items-center mt-4">
                <Button type="submit" :disabled="loading"> Actualizar </Button>
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
import AlertDanger from '@/Components/Alerts/AlertDanger.vue';
import { ref } from 'vue';

const props = defineProps({
    vacancyImage: Object,
    mediaFiles: Object,
});

let loading = ref(false);

let form = useForm({
    template_image: null,
});

let submit = () => {
    loading.value = true;
    form.put(route('vacancy.social.update', props.vacancyImage.id), {
        preserveScroll: true,
        onError: (errors) => {
            loading.value = false;
        },
        onSuccess: (page) => {
            console.log('here 1');
        },
        onFinish: (visit) => {
            console.log('here 2');
            loading.value = false;
        },
    });
    // loading.value = false;
};
</script>
