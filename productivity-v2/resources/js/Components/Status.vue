<template>
    <span
        v-if="status.id == 1"
        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300"
        >{{ status.name }}</span
    >
    <span
        v-if="status.id == 2"
        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"
        >{{ status.name }}</span
    >
    <span
        v-if="status.id == 3"
        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"
        >{{ status.name }}</span
    >
</template>

<script setup>
defineProps({
    status: {
        type: Object,
        required: true,
    },
});
</script>
