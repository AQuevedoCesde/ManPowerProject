<template>
    <div class="flex flex-col w-full mt-1">
        <p class="font-bold">{{ field }}</p>
        <input
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:bg-gray-700 dark:border-gray-600 dark:placeholder-black dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            :placeholder="initialText"
            v-model="inputvalue"
            @input="updateValue"
        />
        <div
            v-if="error"
            v-text="error"
            class="text-red-500 text-xs mt-1"
        ></div>
    </div>
</template>

<script setup>
import { defineProps, ref, defineEmits } from 'vue';

const props = defineProps({
    field: {
        type: String,
        required: true,
    },
    initialText: {
        type: String,
        required: true,
    },
    modelValue: {
        type: String,
    },
    error:{
        type: Object
    }
});

const inputvalue = ref(props.modelValue);
const emit = defineEmits(['update:modelValue']);
const updateValue = () => {
    emit('update:modelValue', inputvalue.value);
};
</script>
