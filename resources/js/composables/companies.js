import { ref } from 'vue'
import axios from 'axios'

export default function useCompanies() {
    const companies = ref([])
    const errors = ref('')
    const token = 'd1154f5c0af94936b271d5114051da7768e1a7964faac7b8401ef0c291a8aa0e';
    const config = {
        headers: { Authorization: `Bearer ${token}` }
    };

    const getCompanies = async (userId) => {
        let response = await axios.get(`/api/companies?userId=${userId}`, config)
        companies.value = response.data
    }

    const storeCompany = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/companies', data)
            //await router.push({ name: 'companies.index' })
            this.$inertia.visit(route('companies'), { method: 'get', data: 'Company saved successfully' });
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
        companies,
        getCompanies,
        storeCompany
    }
}