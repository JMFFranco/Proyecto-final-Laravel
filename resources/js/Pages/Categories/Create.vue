<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const form = useForm({
    category_name: "",
    category_description: "",
    category_priority: "",
});

const submit = () => {
    form.post(route("categories.store"));
};
</script>

<template>
    <Head title="Create Category" />

    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Crear categoria
                </h2>
                <Link
                    :href="route('categories.index')"
                    class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600"
                >
                    Volver a categorias
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
                                    for="category_name"
                                    value="Nombre de la categoria"
                                    class="dark:text-gray-300"
                                />
                                <TextInput
                                    id="category_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.category_name"
                                    required
                                    autofocus
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.category_name"
                                />
                            </div>

                            <div class="mb-4">
                                <InputLabel
                                    for="category_description"
                                    value="Descripción de la categoria"
                                    class="dark:text-gray-300"
                                />
                                <TextInput
                                    id="category_description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.category_description"
                                    required
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.category_description"
                                />
                            </div>

                            <div class="mb-4">
                                <InputLabel
                                    for="category_priority"
                                    value="Prioridad de la categoria"
                                    class="dark:text-gray-300"
                                />
                                <TextInput
                                    id="category_priority"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.category_priority"
                                    required
                                    min="1"
                                />
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.category_priority"
                                />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <PrimaryButton
                                    class="ml-4"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Crear categoria
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
