<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

import useCompanies from '@/composables/companies';
import useCouriers from '@/composables/couriers';
import { onMounted } from 'vue';
import { reactive } from 'vue'

const { companies, getCompanies } = useCompanies()
const { couriers, getCouriers, storeCourier } = useCouriers()

const form = reactive({
    name: '',
    company_id: ''
})

const saveCourier = async () => {
    await storeCourier({ ...form })
}

onMounted(getCompanies)
onMounted(getCouriers)
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <!-- <ApplicationLogo class="block h-12 w-auto" /> -->

            <!-- <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Companies!
            </h1> -->

            <table class="min-w-full border divide-y divide-gray-200" v-if="couriers.length">
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
                <template v-for="item in couriers" :key="item.id">
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


            <p class="mt-6 text-gray-500 leading-relaxed" v-if="!couriers.length">
                No couriers found...
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <form class="space-y-6" @submit.prevent="saveCourier">
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

                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <select v-model="form.company_id">
                                <option disabled value="">Select company</option>
                                <option v-for="item in companies" v-bind:value="item.id">{{ item.name }}</option>
                            </select>
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
