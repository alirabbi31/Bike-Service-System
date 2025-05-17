<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { computed } from "vue";
defineProps({
    parts: Object,
});

const form = useForm({
    customer_name: "",
    phone: "",
    chassis_number: "",
    bay_number: "",
    km_run: "",
    customer_phone: "",
    service_charge: "",
    service_type: "",
    start_date: "",
    image: "",
    parts: [
        {
            part_id: "",
            quantity: "",
        },
    ],
});

const addParts = () => {
    form.parts.push({
        part_id: "",
        quantity: "",
    });
};

const partOptions = computed(() => {
    return parts.map((part) => ({
        value: part.id,
        label: part.name,
        price: part.retail_price,
    }));
});

const types = [
    {
        value: "free",
        label: "Free",
    },
    {
        value: "aid",
        label: "Paid",
    },
]
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="my-5 px-10">
            <div>
                <h1 class="text-2xl font-bold">Service Create</h1>
                <hr class="border-2 border-gray-300 my-2" />
            </div>
        </div>
        <div class="">
            <form class="max-w-md mx-auto">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            v-model="form.customer_name"
                            type="text"
                            name="customer_name"
                            id="customer_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            required
                        />
                        <label
                            for="customer_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Customer Name</label
                        >
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            v-model="form.phone"
                            type="text"
                            name="phone"
                            id="phone"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            required
                        />
                        <label
                            for="phone"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Phone</label
                        >
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            v-model="form.chassis_number"
                            type="text"
                            name="floating_chassis_number"
                            id="floating_chassis_number"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_chassis_number"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Chassis Number</label
                        >
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            v-model="form.km_run"
                            type="text"
                            name="floating_km_run"
                            id="floating_km_run"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_km_run"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Km Run</label
                        >
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            v-model="form.bay_number"
                            type="text"
                            name="floating_bay_number"
                            id="floating_bay_number"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_bay_number"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Bay Number</label
                        >
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            v-model="form.service_charge"
                            type="text"
                            name="floating_service_charge"
                            id="floating_service_charge"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_service_charge"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Service Charge</label
                        >
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <div class="max-w-sm">
                        <label for="start">Start Time:</label>

                        <input
                            type="datetime-local"
                            id="start"
                            name="start_time"
                            v-model="form.start_date"
                            required
                        />
                    </div>
                    <div>
                        <div class="relative max-w-sm">
                        <label>Select Type</label>
                        <select
                            v-model="form.service_type"
                            placeholder="Select Type"
                        >
                            <option
                                v-for="(type, index) in types"
                                :value="type.value"
                            >
                                {{ type.label }}
                            </option>
                        </select>
                    </div>
                    </div>

                    <div class="relative w-full"></div>
                </div>

                <div class="">
                    <div
                        v-for="(part, index) in form.parts"
                        class="relative w-full"
                    >
                        <div class="flex gap-6 mt-4">
                            <div>
                                <label>Select Part</label>
                                <select
                                    v-model="form.parts[index].part_id"
                                    placeholder="Select Part"
                                >
                                    <option
                                        v-for="(part, index) in parts"
                                        :value="part.id"
                                    >
                                        {{ part.name }}
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label>Select Part</label>
                                <input
                                    type="number"
                                    v-model="form.parts[index].quantity"
                                    placeholder="Quantity"
                                />
                            </div>
                            <div>
                                <button type="button" @click="addParts()">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button
                    :disabled="form.processing"
                    @click.prevent="form.post(route('services.store'))"
                    type="submit"
                    class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Submit
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
<style lang="scss" scoped></style>
