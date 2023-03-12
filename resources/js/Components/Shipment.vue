<script setup>

import useCouriers from '@/composables/couriers';
import useOptions from '@/composables/options';
import useShipments from '@/composables/shipments';
import { usePage } from '@inertiajs/vue3';
import { onMounted, computed, reactive } from 'vue';

const { couriers, getCouriers } = useCouriers()
const { shippingOptions, getShippingOptions } = useOptions()
const { storeShipment } = useShipments()

const form = reactive({
    courier_id: '',
    courier_shipping_option_id: '',
    weight: '',
    length: '',
    breadth: ''
})

const {...userInfo} = computed(() => usePage().props.auth).value;

const saveShipment = async () => {
    await storeShipment({ ...form, userId: userInfo.user.id }, )
}
onMounted(getShippingOptions(userInfo.user.id))
onMounted(getCouriers(userInfo.user.id))
</script>

<template>
    <div>
        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
            <form class="space-y-6" @submit.prevent="saveShipment">
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
                        <label for="name" class="block text-sm font-medium text-gray-700">Shipping Options</label>
                        <div class="mt-1">
                            <select v-model="form.courier_shipping_option_id">
                                <option disabled value="">Select Shipping Option</option>
                                <option v-for="item in shippingOptions" v-bind:value="item.id">{{ item.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Package Weight</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.weight">
                        </div>
                    </div>
                </div>

                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Package Length</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.length">
                        </div>
                    </div>
                </div>

                <div class="space-y-4 rounded-md shadow-sm">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Package Breadth</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    v-model="form.breadth">
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
