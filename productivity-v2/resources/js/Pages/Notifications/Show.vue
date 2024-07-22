<template>
    <Head title="Crear nuevo rol" />

    <Header
        :title="`Administración / Ver notificación #${props.notification.id}`"
    >
        <p>Ver notificación #{{ props.notification.id }}</p>
    </Header>

    <div class="mt-5 py-6 px-4 bg-white border-b border-gray-200 rounded-lg">
        <form @submit.prevent="submit" autocomplete="off">
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <div>
                    <label
                        for="name"
                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white"
                        >Nombre de la notificación *</label
                    >
                    <input
                        type="text"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Comunicaciones ..."
                        disabled
                        v-model="form.name"
                    />
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
                        disabled
                    ></textarea>
                </div>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import Header from '@/Components/Header.vue';
import { ref } from 'vue';

let props = defineProps({
    notification: Object,
});

let form = useForm({
    name: props.notification.name,
    emails: props.notification.emails,
});
</script>
