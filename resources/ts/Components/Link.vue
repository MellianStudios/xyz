<template>
    <Link
        :href="href"
        :as="as"
        :type="type"
        :method="method"
        :preserve-state="props['preserve-state']"
        :class="
            as === 'button'
                ? 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                : 'text-indigo-400 hover:text-indigo-600'
        "
    >
        <slot />
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    as: {
        type: String,
        default: 'a',
    },
    type: {
        type: String,
    },
    method: {
        type: String,
        default: 'GET',
    },
    'preserve-state': {
        type: Boolean,
        default: true,
    },
});
</script>
