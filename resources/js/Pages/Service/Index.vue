<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import PartsList from "./Partials/PartsList.vue";

defineProps({
    services: Object,
    partShares: Object,
});

const totalPartsPrice = (parts) => {
    let total = 0;
    parts.forEach((part) => {
        total += part.pivot.quantity * part.retail_price;
    });
    return total;
}

const totalAmount = (service) => {
    return Number(service.service_charge) + totalPartsPrice(service.parts);
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="my-5 px-10">
            <div>
                <h1 class="text-2xl font-bold">Services List</h1>
                <hr class="border-2 border-gray-300 my-2" />
            </div>
            <div class="my-5">
                <Link
                    :href="route('services.create')"
                    class="text-white bg-indigo-500 hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                >
                    Add Service
                </Link>
            </div>
            <div class="relative overflow-x-auto">
                <table
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="px-2 py-3">Customer name</th>
                            <th scope="col" class="px-2 py-3">Phone</th>
                            <th scope="col" class="px-2 py-3">
                                Chassis Number
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Service Charge
                            </th>
                            <th scope="col" class="px-2 py-3">Parts Price</th>
                            <th scope="col" class="px-2 py-3">Total Amount</th>
                            <th scope="col" class="px-2 py-3">Start Time</th>
                            <th scope="col" class="px-2 py-3">End Time</th>
                            <th scope="col" class="px-2 py-3">Actual Time</th>
                            <th scope="col" class="px-2 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-if="services.length > 0">
                            <tr
                                v-for="service in services"
                                :key="service.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                            >
                            
                                <td class="px-2 py-4">{{ service.customer_name }}</td>
                                <td class="px-2 py-4">{{ service.phone }}</td>
                                <td class="px-2 py-4">{{ service.chassis_number }}</td>
                                <td class="px-2 py-4">{{ service.service_charge }}</td>
                                <td class="px-2 py-4">{{ totalPartsPrice(service.parts) }}</td>
                                <td class="px-2 py-4">{{ totalAmount(service) }}</td>
                                <td class="px-2 py-4">{{ service.start_date ?? "N/A" }}</td>
                                <td class="px-2 py-4">{{ service.end_time ?? "N/A" }}</td>
                                <td class="px-2 py-4">{{ service.actual_time ?? "N/A" }}</td>
                                <td class="px-2 py-4">
                                    <Link
                                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                    >
                                        Update Service
                                    </Link>
                                </td>
                            </tr>
                        </template>
                        <tr v-else>
                            <td colspan="9" class="text-center">
                                No data found
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-5">
                <h1 class="text-2xl font-bold">Parts List</h1>
                <hr class="border-2 border-gray-300 my-2" />
                <div>
                    <PartsList :partShares="partShares" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped></style>
