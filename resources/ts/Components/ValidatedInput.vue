<template>
    <input
        v-model="value"
        v-bind="$attrs"
        :type="type"
        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
    />
    <span class="mt-1 block text-rose-500">
        {{ errorMessage }}
    </span>
</template>

<script setup>
import { useField } from 'vee-validate';

const props = defineProps({
    name: String,
    type: {
        type: String,
        default: 'text',
    },
});

const { value, errorMessage } = useField(() => props.name);
</script>
