<template>
    <nav v-if="links.length > 3" class="border-t border-gray-400 px-4 flex items-center justify-between sm:px-0">
        <div class="-mt-px w-0 flex-1 flex">
            <InertiaLink
                :href="links[0].url"
                class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-400 hover:border-gray-300"
            >
                <ArrowLongLeftIcon class="mr-3 h-5 w-5 text-gray-400" />
                Previous
            </InertiaLink>
        </div>
        <div class="hidden md:-mt-px md:flex">
            <template v-for="(link, index) in links" :key="link.label">
                <InertiaLink
                    v-if="index !== 0 && index < 5"
                    :href="link.url"
                    :class="[
                        link.active
                            ? 'border-indigo-500 text-indigo-600'
                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                        'border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium',
                    ]"
                >
                    {{ link.label }}
                </InertiaLink>
            </template>
            <span
                v-if="links.length > 7"
                class="border-transparent text-gray-500 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium"
            >
                ...
            </span>
            <InertiaLink
                v-if="links.length > 7"
                :href="links[links.length - 2].url"
                :class="[
                    links[links.length - 2].active
                        ? 'border-indigo-500 text-indigo-600'
                        : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                    'border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium',
                ]"
            >
                {{ links[links.length - 2].label }}
            </InertiaLink>
        </div>
        <div class="-mt-px w-0 flex-1 flex justify-end">
            <InertiaLink
                :href="links[links.length - 1].url"
                class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-400 hover:border-gray-300"
            >
                Next
                <ArrowLongRightIcon class="ml-3 h-5 w-5 text-gray-400" />
            </InertiaLink>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { ArrowLongLeftIcon, ArrowLongRightIcon } from '@heroicons/vue/20/solid';
import { Link as InertiaLink } from '@inertiajs/vue3';
import type { PaginationLink } from '@/types/pagination';

defineProps<{ links: PaginationLink[] }>();
</script>
