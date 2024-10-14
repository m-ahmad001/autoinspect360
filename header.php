<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js" defer></script>
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/assets/favicon.png">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header mx-auto py-4 fixed top-0 left-0 right-0 bg-white z-50" x-data="{ mobileNavOpen: false }">
        <div class="container px-4 mx-auto">
            <nav class="flex justify-between items-center">
                <a class="text-gray-600 text-2xl leading-none" href="<?php echo home_url(); ?>">
                    <img class="h-14"
                        src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/logos/360Logo.svg"
                        alt="logo" width="auto">
                </a>
                <div class="lg:hidden">
                    <button x-on:click="mobileNavOpen = !mobileNavOpen"
                        class="block text-indigo-500 hover:text-indigo-500 focus:outline-none">
                        <svg class="h-4 w-4" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Mobile menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                        </svg>
                    </button>
                </div>
                <ul class="hidden lg:flex ml-auto mr-10 items-center w-auto space-x-8">
                    <li><a class="text-sm hover:text-indigo-700 font-medium cursor-pointer"
                            onclick="scrollToSection('where-to-find-vin')">Where to Find VIN</a></li>
                    <li><a class="text-sm hover:text-indigo-700 font-medium cursor-pointer"
                            onclick="scrollToSection('pricing-section')">Pricing</a></li>
                    <li><a class="text-sm hover:text-indigo-700 font-medium cursor-pointer"
                            onclick="scrollToSection('testimonials')">Testimonials</a></li>
                </ul>
                <a class="hidden lg:block px-5 py-3 text-sm font-semibold text-indigo-500 hover:text-white hover:bg-indigo-500 border border-indigo-500 hover:border-indigo-600 rounded transition duration-200"
                    href="https://autoinspect360.com/contact-us">Contact Us</a>
            </nav>

            <div :class="{'block': mobileNavOpen, 'hidden': !mobileNavOpen}"
                class="hidden fixed top-0 left-0 bottom-0 w-5/6 max-w-sm z-50">
                <div x-on:click="mobileNavOpen = !mobileNavOpen" class="fixed inset-0 bg-gray-800 opacity-25"></div>
                <nav class="relative flex flex-col py-6 px-6 w-full h-full bg-white border-r overflow-y-auto">
                    <div class="flex items-center mb-12">
                        <a class="mr-auto text-2xl font-semibold leading-none" href="#">
                            <img class="h-8"
                                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/logos/plain-indigo.svg"
                                alt="" width="auto">
                        </a>
                        <button x-on:click="mobileNavOpen = !mobileNavOpen">
                            <svg class="h-6 w-6 cursor-pointer hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <ul>
                        <li class="mb-1"><a
                                class="block p-4 text-sm font-semibold hover:bg-indigo-50 hover:text-indigo-500 rounded"
                                onclick="scrollToSection('where-to-find-vin'); mobileNavOpen = false;">Where to Find
                                VIN</a></li>
                        <li class="mb-1"><a
                                class="block p-4 text-sm font-semibold hover:bg-indigo-50 hover:text-indigo-500 rounded"
                                onclick="scrollToSection('pricing-section'); mobileNavOpen = false;">Pricing</a></li>
                        <li class="mb-1"><a
                                class="block p-4 text-sm font-semibold hover:bg-indigo-50 hover:text-indigo-500 rounded"
                                onclick="scrollToSection('testimonials'); mobileNavOpen = false;">Testimonials</a></li>
                    </ul>
                    <div class="mt-auto pt-6">
                        <a class="block px-5 py-3 text-sm text-center font-semibold text-indigo-500 hover:text-white hover:bg-indigo-500 border border-indigo-500 hover:border-indigo-600 rounded transition duration-200"
                            href="https://autoinspect360.com/contact-us">Contact Us</a>
                    </div>
                    <p class="mt-6 mb-4 text-sm text-center text-gray-500">
                        <span>© 2024 AutoInspect360.</span>
                    </p>
                </nav>
            </div>
        </div>
    </header>

    <script>
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                const headerHeight = document.querySelector('.site-header').offsetHeight;
                const sectionPosition = section.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                window.scrollTo({
                    top: sectionPosition,
                    behavior: 'smooth'
                });
            }
        }
    </script>