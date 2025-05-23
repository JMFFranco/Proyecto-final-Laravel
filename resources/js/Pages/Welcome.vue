<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";

import { router } from '@inertiajs/vue3'

const comprar = (id) => {
    router.post(route('computers.purchase', id), {}, {
        onSuccess: () => {
            alert('Gracias por su compra. El correo ha sido enviado.');
        },
    });
}

const props = defineProps({
    computers: Array,
    categories: Array,
    message: String,
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

const selectedComputer = ref("");

const filteredComputers = computed(() => {
    if (!selectedComputer.value) {
        return props.computers;
    }
    return props.computers.filter(
        (category) => category.fk_category_computer == selectedComputer.value
    );
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <Head title="Compu-Commerce" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <h2
                        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
                    >
                        Compu-Commerce
                    </h2>
                    <div class="flex lg:justify-center lg:col-start-2">
                        <img
                            src="../../../public/computador_logo.png"
                            width="120"
                            height="auto"
                        />
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('computers.index')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Panel de control
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Ingresar
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Registrarse
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <!-- Category Filter -->
                            <div class="mb-4 flex items-center">
                                <label
                                    for="category-filter"
                                    class="mr-2 text-gray-700 dark:text-gray-300"
                                    >Filtrar por categoria:</label
                                >
                                <select
                                    id="category-filter"
                                    v-model="selectedComputer"
                                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                >
                                    <option value="">
                                        Todas las categorias
                                    </option>
                                    <option
                                        v-for="category in categories"
                                        :key="category.category_id"
                                        :value="category.category_id"
                                    >
                                        {{ category.category_name }}
                                    </option>
                                </select>
                            </div>

                            <!-- Flash Message -->
                            <div
                                v-if="message"
                                class="mb-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 px-4 py-3 rounded relative"
                                role="alert"
                            >
                                <span class="block sm:inline">{{
                                    message
                                }}</span>
                            </div>

                            <div
                                class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                            >
                                <div class="p-6">
                                    <div
                                        v-if="filteredComputers.length === 0"
                                        class="text-center py-4 text-gray-600 dark:text-gray-400"
                                    >
                                        No hay computadores.
                                    </div>
                                    <div v-else class="overflow-x-auto">
                                        <table
                                            class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                                        >
                                            <thead
                                                class="bg-gray-50 dark:bg-gray-700"
                                            >
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        ID
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        Marca
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        Modelo
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        Precio
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        Memoria RAM
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        Laptop
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        Categoria
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider"
                                                    >
                                                        Acción
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700"
                                            >
                                                <tr
                                                    v-for="Computer in filteredComputers"
                                                    :key="Computer.slug"
                                                >
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                                                    >
                                                        {{
                                                            Computer.computer_id
                                                        }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white"
                                                    >
                                                        {{
                                                            Computer.computer_brand
                                                        }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                                                    >
                                                        {{
                                                            Computer.computer_model
                                                        }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                                                    >
                                                        ${{
                                                            Computer.computer_price
                                                        }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                                                    >
                                                        {{
                                                            Computer.computer_ram_size
                                                        }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                                                    >
                                                        {{
                                                            Computer.computer_is_laptop
                                                                ? "Si"
                                                                : "No"
                                                        }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400"
                                                    >
                                                        {{
                                                            Computer.category
                                                                ?.category_name
                                                        }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                                                    >
                                                        <div>
                                                            <!-- <Link
                                                                href="#"
                                                                class="text-green-600 hover:text-green-900"
                                                            >
                                                                Comprar
                                                            </Link> -->
                                                            <Link
                                                                href="#"
                                                                class="text-green-600 hover:text-green-900"
                                                                @click.prevent="
                                                                    comprar(
                                                                        Computer.slug
                                                                    )
                                                                "
                                                            >
                                                                Comprar
                                                            </Link>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </footer>
            </div>
        </div>
    </div>
</template>
