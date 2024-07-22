<template>
    <Head title="Editar notificación" />

    <Header :title="`Administración / Editar notificación #${notification.id}`">
        <p>
            Editar notificación #{{ notification.id }}, por favor completa los
            campos marcados con (*), ya que son obligatorios.
        </p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        for="name"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Nombre *</label
                    >
                    <input
                        type="text"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Comunicaciones..."
                        v-model="form.name"
                    />
                    <div
                        v-if="form.errors.name"
                        v-text="form.errors.name"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                </div>
            </div>

            <div class="grid gap-6 mb-2 md:grid-cols-1">
                <div>
                    <label
                        for="emails"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Correos electrónicos *</label
                    >
                    <textarea
                        id="emails"
                        rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Correos electrónicos"
                        v-model="form.emails"
                    ></textarea>
                    <div
                        v-if="form.errors.emails"
                        v-text="form.errors.emails"
                        class="text-red-500 text-xs mt-1"
                    ></div>
                    <p
                        class="ms-auto text-xs mt-1 text-gray-500 dark:text-gray-400"
                    >
                        Añade varias direcciones de correo electrónico,
                        separándolas por comas (,).
                    </p>
                </div>
            </div>

            <div
                v-if="form.errors.permissions"
                v-text="form.errors.name"
                class="text-red-500 text-xs mt-1"
            ></div>

            <div class="flex items-center mt-4">
                <Button type="submit" :disabled="loading">
                    Actualizar notificación
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
import { ref } from 'vue';

const props = defineProps({
    notification: Object,
});

let loading = ref(false);

let form = useForm({
    id: props.notification.id,
    name: props.notification.name,
    emails: props.notification.emails,
});

let submit = () => {
    loading.value = true;
    form.put(route('notifications.update', props.notification.id), {
        preserveScroll: true,
        onError: () => {
            loading.value = false;
        },
        onFinish: () => {
            loading.value = false;
        },
    });
};
</script>
