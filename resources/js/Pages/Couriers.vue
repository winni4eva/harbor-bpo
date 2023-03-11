<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Couriers from '@/Components/Couriers.vue';
</script>

<template>
    <AppLayout title="Couriers">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Couriers
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Couriers />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
