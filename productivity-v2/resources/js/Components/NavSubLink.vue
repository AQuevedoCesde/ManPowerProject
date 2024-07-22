<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps(["href", "active"]);

const classes = computed(() =>
    props.active
        ? "flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 dark:text-white bg-gray-100 dark:bg-gray-700 transition duration-150 ease-in-out"
        : "flex items-center p-2 pl-11 w-full text-sm font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 transition  duration-150 ease-in-out"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
