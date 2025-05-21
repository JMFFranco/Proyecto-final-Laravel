<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
</script>

<template>
    <div>
        <div
            class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700"
        >
            <ApplicationLogo class="block h-12 w-auto" />

            <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
                ¡Bienvenido a tu tienda de tecnología!
            </h1>

            <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
                Esta es tu plataforma de comercio electrónico especializada en
                la venta de computadores. Encuentra todo lo que necesitas para
                mejorar o renovar tu equipo tecnológico con productos de calidad
                y a los mejores precios.
            </p>
        </div>

        <div
            class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8"
        >
            <div>
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        class="size-6 stroke-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                        />
                    </svg>
                    <h2
                        class="ms-3 text-xl font-semibold text-gray-900 dark:text-white"
                    >
                        <a href="https://tailwindcss.com/"
                            >Productos tecnológicos</a
                        >
                    </h2>
                </div>

                <p
                    class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
                >
                    Navega por nuestras categorías de computadores de
                    escritorio, portátiles, Gamers, oficina, diseñador y mucho
                    más. Mantente al día con las últimas tendencias tecnológicas
                    y lleva tu experiencia al siguiente nivel.
                </p>
            </div>

            <div>
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        class="size-6 stroke-gray-400"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"
                        />
                    </svg>
                    <h2
                        class="ms-3 text-xl font-semibold text-gray-900 dark:text-white"
                    >
                        Gestión de usuarios
                    </h2>
                </div>

                <p
                    class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed"
                >
                    Nuestra plataforma permite a los usuarios registrarse,
                    iniciar sesión de forma segura y gestionar sus pedidos
                    fácilmente. También puedes administrar tus productos,
                    categorías y stock desde el panel de administración.
                </p>
            </div>
        </div>
    </div>
</template>
