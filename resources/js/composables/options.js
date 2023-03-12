import { ref } from 'vue'
import axios from 'axios'

export default function useOptions() {
    const errors = ref('') //shipping_option
    const shippingOptions = ref([])

    const getShippingOptions = async (userId) => {
        let response = await axios.get(`/api/shipping_option?userId=${userId}`)
        shippingOptions.value = response.data.data
    }

    const storeShippingOption = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/shipping_option', data)
            //await router.push({ name: 'companies.index' })
            //this.$inertia.visit(route('shipping_option'), { method: 'get', data: 'Shipping options saved successfully' });
            window.location.href = window.location.href 
        } catch (e) {
            if (e.response?.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    return {
        errors,
        shippingOptions,
        getShippingOptions,
        storeShippingOption
    }
}