<script setup>

defineProps({
    partShares: Object,
});

</script>

<template>
    <div>
        <table
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                    >
                        <tr>
                            <th scope="col" class="px-2 py-3">Product Code</th>
                            <th scope="col" class="px-2 py-3">Retail Price</th>
                            <th scope="col" class="px-2 py-3">
                                Discount Amount
                            </th>
                            <th scope="col" class="px-2 py-3">
                                Discount Percentage
                            </th>
                            <th scope="col" class="px-2 py-3">Final Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- {{ partShares }} -->
                        <template v-if="partShares?.length > 0">
                            <tr
                                v-for="service in partShares"
                                :key="service.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200"
                            >
                            
                                <td class="px-2 py-4">{{ service.code }}</td>
                                <td class="px-2 py-4">{{ service.retail_price }}</td>
                                <td class="px-2 py-4">{{ service.discount.toFixed(2) }}</td>
                                <td class="px-2 py-4">{{ service.discount }}</td>
                                <td class="px-2 py-4">{{ service.final_price }}</td>
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
</template>

<style scoped>

</style>