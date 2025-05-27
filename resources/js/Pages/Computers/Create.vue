<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    categories: Array,
});

const form = useForm({
    computer_brand: "",
    computer_model: "",
    computer_price: null,
    computer_ram_size: null,
    computer_is_laptop: false,
    fk_category_computer: "",
    status: false,
});

const submit = () => {
    form.post(route("computers.store"), {
        onSuccess: () => {
            console.log("Computadora creada correctamente");
        },
        onError: (errors) => {
            console.error("Errores de validación:", errors);
        },
        onFinish: () => {
            console.log("Petición terminada");
        },
    });
};
</script>

<template>
    <Head title="Creat computer" />

    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Crear computador
                </h2>
                <Link
                    :href="route('computers.index')"
                    class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600"
                >
                    Volver a computadores
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div class="p-6">
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <InputLabel
                                    for="computer_brand"
                                    value="Marca del computador"
                                    class="dark:text-gray-300"
                                />
                                <TextInput
                                    id="computer_brand"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.computer_brand"
                                    required
                                    autofocus
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.computer_brand"
                                />
                            </div>

                            <div class="mb-4">
                                <InputLabel
                                    for="computer_model"
                                    value="Modelo del computador"
                                    class="dark:text-gray-300"
                                />
                                <input
                                    id="computer_model"
                                    type="text"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    v-model="form.computer_model"
                                    required
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.computer_model"
                                />
                            </div>

                            <div class="mb-4">
                                <InputLabel
                                    for="computer_price"
                                    value="Precio del computador"
                                    class="dark:text-gray-300"
                                />
                                <TextInput
                                    id="computer_price"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.computer_price"
                                    required
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.computer_price"
                                />
                            </div>

                            <div class="mb-4">
                                <InputLabel
                                    for="computer_ram_size"
                                    value="Memoria RAM"
                                    class="dark:text-gray-300"
                                />
                                <TextInput
                                    id="computer_ram_size"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.computer_ram_size"
                                    required
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.computer_ram_size"
                                />
                            </div>

                            <div class="mb-4 flex items-center">
                                <input
                                    id="computer_is_laptop"
                                    type="checkbox"
                                    class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    v-model="form.computer_is_laptop"
                                />
                                <InputLabel
                                    for="computer_is_laptop"
                                    value="¿Es una laptop?"
                                    class="ml-2 dark:text-gray-300"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.computer_is_laptop"
                                />
                            </div>

                            <div class="mb-4 flex items-center">
                                <input
                                    id="status"
                                    type="checkbox"
                                    class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                    v-model="form.status"
                                />
                                <InputLabel
                                    for="status"
                                    value="¿Se encuentra disponible el computador?"
                                    class="ml-2 dark:text-gray-300"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.status"
                                />
                            </div>

                            <div class="mb-4">
                                <InputLabel
                                    for="fk_category_computer"
                                    value="category"
                                    class="dark:text-gray-300"
                                />
                                <select
                                    id="fk_category_computer"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    v-model="form.fk_category_computer"
                                    required
                                >
                                    <option value="">
                                        Seleccione una categoria
                                    </option>
                                    <option
                                        v-for="category in categories"
                                        :key="category.category_id"
                                        :value="category.category_id"
                                    >
                                        {{ category.category_name }}
                                        (Descripción:
                                        {{ category.category_description }})
                                    </option>
                                </select>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.fk_category_computer"
                                />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Crear computador
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
