<template>
    <div class="px-4 sm:px-2">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight bg-gray-50"
        >
            {{ title }}
        </h2>
        <div class="text-sm mt-2">
            <slot />
        </div>
    </div>
</template>

<script setup>
const props = defineProps(["title"]);
</script>
