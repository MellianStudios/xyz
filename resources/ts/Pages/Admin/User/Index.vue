<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <div class="pb-20">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-900 py-10">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-3xl font-semibold leading-6 text-white">User list</h1>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                    <Link :href="route('admin.users.create')" as="button">Create user</Link>
                                </div>
                            </div>
                            <div class="mt-8 flow-root">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <table class="min-w-full divide-y divide-gray-700">
                                            <thead>
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0"
                                                    >
                                                        Name
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-3 py-3.5 text-left text-sm font-semibold text-white"
                                                    >
                                                        Street
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-3 py-3.5 text-left text-sm font-semibold text-white"
                                                    >
                                                        Created at
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-3 py-3.5 text-right text-sm font-semibold text-white"
                                                    >
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-800">
                                                <tr v-for="user in users.data" :key="user.id">
                                                    <td
                                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0"
                                                    >
                                                        {{ user.first_name }} {{ user.last_name }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                        {{ user.street }} {{ user.street_number }}
                                                    </td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                        {{
                                                            dayjs(user.created_at).format(
                                                                'dddd Do of MMMM YYYY hh:mm:ss A',
                                                            )
                                                        }}
                                                    </td>
                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0 space-x-2"
                                                    >
                                                        <RawLink
                                                            :href="route('admin.download_media', user.id)"
                                                            as="button"
                                                        >
                                                            Download file
                                                        </RawLink>
                                                        <Link :href="route('admin.users.edit', user.id)" as="button">
                                                            Edit
                                                        </Link>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <Pagination :links="users.links" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import dayjs from 'dayjs';
import advancedFormat from 'dayjs/plugin/advancedFormat';
import Link from '@/Components/Link.vue';
import Pagination from '@/Components/Pagination.vue';
import RawLink from '@/Components/RawLink.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import type { User } from '@/types/models';
import type { LengthAwarePaginator } from '@/types/pagination';

dayjs.extend(advancedFormat);

defineProps<{ users: LengthAwarePaginator<User[]> }>();
</script>

<style scoped></style>
