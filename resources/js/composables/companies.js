import { ref } from 'vue'
import axios from 'axios'

export default function useCompanies() {
    const companies = ref([])
    const errors = ref('')

    const getCompanies = async () => {
        let response = await axios.get('/api/companies')
        companies.value = response.data
    }

    return {
        errors,
        companies,
        getCompanies
    }
}