<script setup>
defineProps({
    type: {
        type: String,
        default: "submit",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    classes: {
        type: String,
    },
    colors: {
        type: String,
        default:
            "bg-blue-500 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800",
    },
});
</script>

<template>
    <button
        v-if="!disabled"
        :type="type"
        :class="[colors, classes]"
        class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition ease-in-out duration-150"
    >
        <slot />
    </button>

    <button
        v-else
        type="button"
        class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center"
        disabled
        :class="classes"
    >
        <slot />
    </button>
</template>
