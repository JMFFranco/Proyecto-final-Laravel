<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Components/Welcome.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <AppLayout title="Compu-Commerce">
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                >
                    Compu-Commerce
                </h2>
                <div class="flex gap-2">
                    <Link
                        :href="route('computers.index')"
                        class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600"
                    >
                        Computadores
                    </Link>
                    <Link
                        :href="route('categories.index')"
                        class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600"
                    >
                        Categorias
                    </Link>
                    <Link
                        href="/"
                        class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600"
                    >
                        Tienda
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="px-4 py-2 bg-gray-800 dark:bg-gray-700 text-white rounded-md hover:bg-gray-700 dark:hover:bg-gray-600"
                    >
                        Crear usuario
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <Welcome />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
