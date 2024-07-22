<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/inertia-vue3';

const errors = computed(() => usePage().props.value.errors);

const hasErrors = computed(() => Object.keys(errors.value).length > 0);
</script>

<template>
    <div
        v-if="hasErrors"
        class="flex items-baseline p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
        role="alert"
    >
        <svg
            class="flex-shrink-0 w-4 h-4"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 20"
        >
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
            />
        </svg>
        <div class="ms-3 text-sm font-medium">
            <div class="font-medium text-red-600">
                <strong>¡Ups! Algo ha salido mal.</strong>
            </div>
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
            </ul>
        </div>
    </div>
</template>
