<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

import useCompanies from '@/composables/companies';
import { onMounted } from 'vue';

const { companies, getCompanies } = useCompanies()

onMounted(getCompanies)
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <!-- <ApplicationLogo class="block h-12 w-auto" /> -->

            <!-- <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Companies!
            </h1> -->

            <table class="min-w-full border divide-y divide-gray-200" v-if="companies.length">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Name</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Email</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Address</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Website</span>
                        </th>
                    </tr>
                </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="item in companies" :key="item.id">
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.name }}
                        </td>
                    </tr>
                </template>
            </tbody>
            </table>


            <p class="mt-6 text-gray-500 leading-relaxed" v-if="!companies.length">
                No companies found...
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            
        </div>
    </div>
</template>
