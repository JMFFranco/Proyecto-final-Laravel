<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    category: Object,
});
</script>

<template>
    <Head title="Category Details" />

    <AppLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Detalles de la categoria
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
                        <div class="mb-6">
                            <h3
                                class="text-lg font-medium text-gray-900 dark:text-white"
                            >
                                Información de categoria
                            </h3>

                            <div
                                class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4"
                            >
                                <div>
                                    <p
                                        class="text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        ID
                                    </p>
                                    <p
                                        class="mt-1 text-sm text-gray-900 dark:text-white"
                                    >
                                        {{ category.category_id }}
                                    </p>
                                </div>

                                <div>
                                    <p
                                        class="text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        Nombre
                                    </p>
                                    <p
                                        class="mt-1 text-sm text-gray-900 dark:text-white"
                                    >
                                        {{ category.category_name }}
                                    </p>
                                </div>

                                <div>
                                    <p
                                        class="text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        Descripción
                                    </p>
                                    <p
                                        class="mt-1 text-sm text-gray-900 dark:text-white"
                                    >
                                        {{ category.category_description }}
                                    </p>
                                </div>

                                <div>
                                    <p
                                        class="text-sm font-medium text-gray-500 dark:text-gray-400"
                                    >
                                        Prioridad
                                    </p>
                                    <p
                                        class="mt-1 text-sm text-gray-900 dark:text-white"
                                    >
                                        {{ category.category_priority }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
