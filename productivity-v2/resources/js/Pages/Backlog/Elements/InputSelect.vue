<template>
    <div class="mt-2">
        <p class="font-bold">{{ field }}</p>
        <select
            :value="modelValue"
            @change="updateValue"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
            <option selected value="">{{ initialText }}</option> 
            <option v-for="item in items" :key="item.id" :value="item.id">
                {{ item.name }}
            </option>
        </select>
        <div
            v-if="error"
            v-text="error"
            class="text-red-500 text-xs mt-1"
        ></div>
    </div>
</template>

<script setup>
import { defineProps, } from 'vue';

const props = defineProps({
    items: {
        type: Array,
        required: true,
        default: () => [],
    },
    field: {
        type: String,
        required: true,
    },
    initialText: {
        type: String,
        required: true,
    },
    modelValue: {
        type: Number,
    },
    error: {
        type: Object,
    },
});

// const inputvalue = ref(props.modelValue);
const emit = defineEmits(['update:modelValue']);
const updateValue = (event) => {
    console.log(event)
    emit('update:modelValue', event.target.value);
};


</script>
