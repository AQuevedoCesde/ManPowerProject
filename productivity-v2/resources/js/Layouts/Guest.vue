<script setup>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';

const date = new Date();
</script>

<template>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
        >
            <a
                href="https://manpowergroupcolombia.co/"
                target="_blank"
                class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white"
            >
                <img
                    class="max-w-xs"
                    src="https://documentosmanpowergroup.s3.amazonaws.com/images/manpowergroup-logo.png"
                    alt="logomanpowergroup"
                />
            </a>
            <div
                class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700"
            >
                <slot />
            </div>
            <footer class="text-center text-xs mt-5">
                <span class="apple-link"
                    >© {{ date.getFullYear() }} +Productivos V2.0 | Todos los
                    derechos reservados.</span
                >
                <br />
                <strong
                    >We Power the Future, One Line of Code at a Time.</strong
                >
                <div class="by">
                    Powered by
                    <a
                        class="font-medium text-primary-600 hover:underline dark:text-primary-500"
                        href="https://manpowergroupcolombia.co/"
                        >ManpowerGroup.</a
                    >
                </div>
            </footer>
        </div>
    </section>

    <!-- <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    >
        <div>
            <Link href="/">
                <BreezeApplicationLogo
                    class="w-20 h-20 fill-current text-gray-500"
                />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div> -->
</template>
