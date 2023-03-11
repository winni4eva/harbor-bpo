<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

import useCompanies from '@/composables/companies';
import { usePage } from '@inertiajs/vue3';
import { onMounted, reactive, computed } from 'vue';

const { companies, getCompanies, storeCompany, errors } = useCompanies()

const form = reactive({
    name: ''
})

const saveCompany = async () => {
    await storeCompany({ ...form })
}

const {...userInfo} = computed(() => usePage().props.auth).value;

onMounted(getCompanies(userInfo.user.id))
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
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Couriers</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Employees</span>
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
                            {{ item.relationships.couriers?.length }}
                        </td>
                        <td class="px-6 py-4 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap">
                            {{ item.relationships.employees?.length }}
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
            <form class="space-y-6" @submit.prevent="saveCompany">
                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.name">
                        </div>
                    </div>
                </div>

                <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
                    Create
                </button>
            </form>
        </div>
    </div>
</template>
