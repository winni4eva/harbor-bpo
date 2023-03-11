import { ref } from 'vue'
import axios from 'axios'

export default function useCouriers() {
    const couriers = ref([])
    const errors = ref('')

    const getCouriers = async () => {
        let response = await axios.get('/api/couriers')
        couriers.value = response.data
    }

    const storeCourier = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/couriers', data)
            //await router.push({ name: 'companies.index' })
            this.$inertia.visit(route('couriers'), { method: 'get', data: 'Courier saved successfully' });
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