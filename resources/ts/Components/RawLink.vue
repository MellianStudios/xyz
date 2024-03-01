<template>
    <a
        :class="
            as === 'button'
                ? 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                : 'text-indigo-400 hover:text-indigo-600'
        "
    >
        <slot />
    </a>
</template>

<script setup lang="ts">
defineProps({
    as: {
        type: String,
        default: 'a',
    },
});
</script>

<style scoped></style>
