import { ref } from 'vue'
import axios from 'axios'
import { router } from '@inertiajs/vue3'

export default function useCouriers() {
    const couriers = ref([])
    const errors = ref('')

    const getCouriers = async (userId) => {
        let response = await axios.get(`/api/couriers?userId=${userId}`)
        couriers.value = response.data.data
    }

    const storeCourier = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/couriers', data)
            //await router.push({ name: 'companies.index' })
            //this.$inertia.visit(route('couriers'), { method: 'get', data: 'Courier saved successfully' });
            //router.reload({ only: ['couriers'] })
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
        couriers,
        getCouriers,
        storeCourier
    }
}