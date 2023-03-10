<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Companies from '@/Components/Companies.vue';
</script>

<template>
    <AppLayout title="Companies">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Companies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Companies />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
