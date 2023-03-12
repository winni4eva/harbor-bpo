import { ref } from 'vue'
import axios from 'axios'
//import { useRouter } from 'vue-router'

export default function useShipments() {
    //const company = ref([])
    const shipments = ref([])

    const errors = ref('')
    //const router = useRouter()

    const getShipments = async (userId) => {
        let response = await axios.get(`/api/shipments?userId=${userId}`)
        shipments.value = response.data.data
    }

    // const getCompany = async (id) => {
    //     let response = await axios.get(`/api/companies/${id}`)
    //     company.value = response.data.data
    // }

    const storeShipment = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/shipments', data)
            //await router.push({ name: 'companies.index' })
            this.$inertia.visit(route('shipment'), { method: 'get', data: 'Shipment saved successfully' });
        } catch (e) {
            if (e.response?.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }

    }

    // const updateCompany = async (id) => {
    //     errors.value = ''
    //     try {
    //         await axios.patch(`/api/companies/${id}`, company.value)
    //         await router.push({ name: 'companies.index' })
    //     } catch (e) {
    //         if (e.response.status === 422) {
    //             for (const key in e.response.data.errors) {
    //                 errors.value = e.response.data.errors
    //             }
    //         }
    //     }
    // }

    return {
        errors,
        //company,
        shipments,
        //getCompany,
        getShipments,
        storeShipment,
        //updateCompany
    }
}