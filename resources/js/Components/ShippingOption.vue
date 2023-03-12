<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

import useCouriers from '@/composables/couriers';
import useOptions from '@/composables/options';
import { usePage } from '@inertiajs/vue3';
import { onMounted, computed, reactive } from 'vue';

const { couriers, getCouriers } = useCouriers()
const { storeShippingOption, shippingOptions, getShippingOptions } = useOptions()

const form = reactive({
    name: '',
    courier_id: ''
})

const saveOption = async () => {
    await storeShippingOption({ ...form })
}

const {...userInfo} = computed(() => usePage().props.auth).value;

onMounted(getCouriers(userInfo.user.id))
onMounted(getShippingOptions(userInfo.user.id))
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <!-- <ApplicationLogo class="block h-12 w-auto" /> -->

            <!-- <h1 class="mt-8 text-2xl font-medium text-gray-900">
                Companies!
            </h1> -->

            <table class="min-w-full border divide-y divide-gray-200" v-if="shippingOptions.length">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Name</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50">
                            <span
                                class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Company</span>
                        </th>
                    </tr>
                </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="item in shippingOptions" :key="item.id">
                    <tr class="bg-white">
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


            <p class="mt-6 text-gray-500 leading-relaxed" v-if="!shippingOptions.length">
                No shipping options found...
            </p>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <form class="space-y-6" @submit.prevent="saveOption">

                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Courier</label>
                        <div class="mt-1">
                            <select v-model="form.courier_id">
                                <option disabled value="">Select Courier</option>
                                <option v-for="item in couriers" v-bind:value="item.id">{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Options</label>
                        <div class="mt-1">
                            <select v-model="form.name">
                                <option disabled value="">Select Optioon</option>
                                <option v-for="item in ['Air Freight', 'Sea Freight']" v-bind:value="item">{{ item }}</option>
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
