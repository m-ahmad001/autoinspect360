<!DOCTYPE html>
<html lang="en" class="h-full">

<?php get_header(); ?>

<body class="antialiased bg-body text-body font-body h-full flex flex-col">
  <div class="flex-grow flex flex-col">


    <div class="flex-grow container mx-auto px-4 py-10 ">

      <!-- HERO -->
      <div class="flex flex-wrap items-center -mx-4 mt-10 lg:my-10 pb-10 lg:pb-16">

        <!-- Form Container -->
        <div class="w-full lg:w-1/2 px-4 mb-8 lg:mb-0">
          <p class="font-semibold mb-4 text-xl text-center md:text-left sm:text-sm text-gray-400">
            Are you worried about buying a used car?
          </p>
          <h1 class="text-3xl md:text-5xl font-bold mb-4 text-center md:text-left">
            Decode Your Vehicle's History with Ease
          </h1>

          <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex mb-4">
              <button class="bg-indigo-500 text-white px-6 py-3 rounded-l-md">
                by VIN
              </button>
              <button class="bg-gray-200 text-gray-700 px-6 py-3 rounded-r-md">
                by US License Plate
              </button>
            </div>
            <div class="flex flex-col sm:flex-row">
              <input type="text" placeholder="Enter VIN Number" id="vin-input"
                class="flex-grow p-3 border border-gray-400 rounded-md sm:rounded-r-none focus:outline-none focus:ring-2 focus:ring-indigo-500 mb-2 sm:mb-0" />
              <button id="check-vin-btn"
                class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-4 py-3 rounded-md sm:rounded-l-none text-sm sm:text-base">
                <span class="sm:inline">Check VIN</span>
              </button>
            </div>
            <div class="flex justify-between mt-4 text-sm text-gray-400">
              <a href="#" class="text-indigo-500 hover:underline">Where to find the VIN?</a>
              <div>
                <span class="text-gray-500">No VIN?</span>
                <a href="https://autoinspect360.com/wp-content/uploads/2024/09/vin_report_5YJ3E1EA7LF800340.pdf"
                  target="_blank" class="text-indigo-500 hover:underline ml-1">Get AutoInspect360 reports</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Image Container -->
        <div class="w-full lg:w-1/2 px-4">
          <img class="object-cover w-full rounded-xl"
            src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/hero.jpg" alt="" />
        </div>
      </div>


    </div>


    <!-- Button to scroll to the top -->
    <!-- <button class="block mt-10 lg:mt-20 mx-auto w-16 h-16 p-5 rounded-full bg-indigo-50 hover:bg-indigo-100">
      <svg class="mx-auto text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewbox="0 0 24 24"
        stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
      </svg>
    </button> -->

    <section class="py-20">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -m-4">
          <div class="w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-50 rounded-lg py-12">
              <img class="h-8 mx-auto"
                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/logos/clear-vin.png" alt="">
            </div>
          </div>
          <div class="w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-50 rounded-lg py-12">
              <img class="h-8 mx-auto"
                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/logos/nmvtis.jpeg" alt="">
            </div>
          </div>
          <div class="w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-50 rounded-lg py-12">
              <img class="h-8 px-3 mx-auto"
                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/logos/blackbook.png" alt="">
            </div>
          </div>
          <div class="w-1/2 lg:w-1/4 p-4">
            <div class="bg-gray-50 rounded-lg py-12">
              <img class="h-8 mx-auto"
                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/logos/national-highway.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-20 lg:mb-40 bg-indigo-500">
      <div class="relative container px-4 pb-32 mx-auto">
        <div class="max-w-xl lg:max-w-3xl mx-auto text-center mb-12 lg:mb-20">
          <span class="text-xs font-semibold text-indigo-50 uppercase">New Feature</span>
          <h2
            class="mt-2 mb-4 text-3xl leading-tight md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight text-white font-bold font-heading">
            Easy VIN Entry: Enter your VIN number effortlessly and quickly</h2>

          <!-- <a class="inline-block px-5 py-3 text-sm bg-white hover:bg-indigo-50 text-indigo-500 font-semibold border border-white rounded transition duration-200"
            href="#">Try Demo</a> -->
          <a href="https://autoinspect360.com/wp-content/uploads/2024/09/vin_report_5YJ3E1EA7LF800340.pdf"
            target="_blank"
            class="inline-block px-5 py-3 text-sm bg-white hover:bg-indigo-50 text-indigo-500 font-semibold border border-white rounded transition duration-200">
            Example VIN Report
          </a>
        </div>
        <div class="-mb-8 lg:-mb-64">
          <div class="flex flex-wrap -mx-4 -mb-8">
            <div class="w-full lg:w-1/3 px-4 mb-8">
              <div class="bg-white text-center p-6 rounded shadow-md">
                <span>
                  <svg class="w-12 h-12 mx-auto mb-3 text-indigo-500" viewbox="0 0 48 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M25.6 22.9C25.7 23 25.8 23 26 23H33C33.6 23 34 22.6 34 22C34 21.8 34 21.7 33.9 21.6L30.4 14.6C30.1 14.1 29.5 13.9 29 14.2C28.9 14.3 28.7 14.4 28.6 14.6L25.1 21.6C24.9 22 25.1 22.6 25.6 22.9ZM29.5 17.2L31.4 21H27.6L29.5 17.2ZM18.5 14C16 14 14 16 14 18.5C14 21 16 23 18.5 23C21 23 23 21 23 18.5C23 16 21 14 18.5 14ZM18.5 21C17.1 21 16 19.9 16 18.5C16 17.1 17.1 16 18.5 16C19.9 16 21 17.1 21 18.5C21 19.9 19.9 21 18.5 21ZM22.7 25.3C22.3 24.9 21.7 24.9 21.3 25.3L18.5 28.1L15.7 25.3C15.3 24.9 14.7 24.9 14.3 25.3C13.9 25.7 13.9 26.3 14.3 26.7L17.1 29.5L14.3 32.3C13.9 32.7 13.9 33.3 14.3 33.7C14.7 34.1 15.3 34.1 15.7 33.7L18.5 30.9L21.3 33.7C21.7 34.1 22.3 34.1 22.7 33.7C23.1 33.3 23.1 32.7 22.7 32.3L19.9 29.5L22.7 26.7C23.1 26.3 23.1 25.7 22.7 25.3ZM33 25H26C25.4 25 25 25.4 25 26V33C25 33.6 25.4 34 26 34H33C33.6 34 34 33.6 34 33V26C34 25.4 33.6 25 33 25ZM32 32H27V27H32V32Z"
                      fill="currentColor"></path>
                    <circle cx="24" cy="24" r="23.5" stroke="currentColor"></circle>
                  </svg>
                </span>
                <h3 class="mb-3 text-2xl font-bold font-heading">Secure Payment Process: Pay for your VIN report
                  securely</h3>
                <p class="text-lg text-gray-400 leading-loose">Failry assigning daily tasks to your employees</p>
              </div>
            </div>
            <div class="w-full lg:w-1/3 px-4 mb-8">
              <div class="bg-white text-center p-6 rounded shadow-md">
                <span>
                  <svg class="w-12 h-12 mx-auto mb-3 text-indigo-500" viewbox="0 0 48 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M25.6 22.9C25.7 23 25.8 23 26 23H33C33.6 23 34 22.6 34 22C34 21.8 34 21.7 33.9 21.6L30.4 14.6C30.1 14.1 29.5 13.9 29 14.2C28.9 14.3 28.7 14.4 28.6 14.6L25.1 21.6C24.9 22 25.1 22.6 25.6 22.9ZM29.5 17.2L31.4 21H27.6L29.5 17.2ZM18.5 14C16 14 14 16 14 18.5C14 21 16 23 18.5 23C21 23 23 21 23 18.5C23 16 21 14 18.5 14ZM18.5 21C17.1 21 16 19.9 16 18.5C16 17.1 17.1 16 18.5 16C19.9 16 21 17.1 21 18.5C21 19.9 19.9 21 18.5 21ZM22.7 25.3C22.3 24.9 21.7 24.9 21.3 25.3L18.5 28.1L15.7 25.3C15.3 24.9 14.7 24.9 14.3 25.3C13.9 25.7 13.9 26.3 14.3 26.7L17.1 29.5L14.3 32.3C13.9 32.7 13.9 33.3 14.3 33.7C14.7 34.1 15.3 34.1 15.7 33.7L18.5 30.9L21.3 33.7C21.7 34.1 22.3 34.1 22.7 33.7C23.1 33.3 23.1 32.7 22.7 32.3L19.9 29.5L22.7 26.7C23.1 26.3 23.1 25.7 22.7 25.3ZM33 25H26C25.4 25 25 25.4 25 26V33C25 33.6 25.4 34 26 34H33C33.6 34 34 33.6 34 33V26C34 25.4 33.6 25 33 25ZM32 32H27V27H32V32Z"
                      fill="currentColor"></path>
                    <circle cx="24" cy="24" r="23.5" stroke="currentColor"></circle>
                  </svg>
                </span>
                <h3 class="mb-3 text-2xl font-bold font-heading">Easy VIN Entry: Enter your VIN number effortlessly and
                  quickly</h3>
                <p class="text-lg text-gray-400 leading-loose">Team members will be up to date on the project</p>
              </div>
            </div>
            <div class="w-full lg:w-1/3 px-4 mb-8">
              <div class="bg-white text-center p-6 rounded shadow-md">
                <span>
                  <svg class="w-12 h-12 mx-auto mb-3 text-indigo-500" viewbox="0 0 48 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M25.6 22.9C25.7 23 25.8 23 26 23H33C33.6 23 34 22.6 34 22C34 21.8 34 21.7 33.9 21.6L30.4 14.6C30.1 14.1 29.5 13.9 29 14.2C28.9 14.3 28.7 14.4 28.6 14.6L25.1 21.6C24.9 22 25.1 22.6 25.6 22.9ZM29.5 17.2L31.4 21H27.6L29.5 17.2ZM18.5 14C16 14 14 16 14 18.5C14 21 16 23 18.5 23C21 23 23 21 23 18.5C23 16 21 14 18.5 14ZM18.5 21C17.1 21 16 19.9 16 18.5C16 17.1 17.1 16 18.5 16C19.9 16 21 17.1 21 18.5C21 19.9 19.9 21 18.5 21ZM22.7 25.3C22.3 24.9 21.7 24.9 21.3 25.3L18.5 28.1L15.7 25.3C15.3 24.9 14.7 24.9 14.3 25.3C13.9 25.7 13.9 26.3 14.3 26.7L17.1 29.5L14.3 32.3C13.9 32.7 13.9 33.3 14.3 33.7C14.7 34.1 15.3 34.1 15.7 33.7L18.5 30.9L21.3 33.7C21.7 34.1 22.3 34.1 22.7 33.7C23.1 33.3 23.1 32.7 22.7 32.3L19.9 29.5L22.7 26.7C23.1 26.3 23.1 25.7 22.7 25.3ZM33 25H26C25.4 25 25 25.4 25 26V33C25 33.6 25.4 34 26 34H33C33.6 34 34 33.6 34 33V26C34 25.4 33.6 25 33 25ZM32 32H27V27H32V32Z"
                      fill="currentColor"></path>
                    <circle cx="24" cy="24" r="23.5" stroke="currentColor"></circle>
                  </svg>
                </span>
                <h3 class="mb-3 text-2xl font-bold font-heading">Easy VIN Entry: Enter your VIN number effortlessly and
                  quickly</h3>
                <p class="text-lg text-gray-400 leading-loose">More interesting writings for your customers</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class=" mt-10 py-20 bg-gradient-to-r from-gray-50 to-gray-100">
      <div class="container px-4 mx-auto">
        <h2 class="mb-12 text-4xl font-bold text-center text-indigo-800">Our Comprehensive Services</h2>
        <div class="flex flex-wrap -mx-4">
          <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="relative overflow-hidden rounded-xl shadow-lg group">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/bike.jpg"
                alt="Bike Report"
                class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-110">
              <div
                class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-70 transition-opacity duration-300 group-hover:opacity-90">
              </div>
              <div
                class="absolute inset-0 flex flex-col justify-end p-6 text-white transform translate-y-8 transition-transform duration-300 group-hover:translate-y-0">
                <span
                  class="bg-indigo-500 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3 self-start">NEW</span>
                <h3 class="text-2xl font-semibold mb-2">Motorcycle VIN Check</h3>
                <p class="text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Uncover the
                  complete history of your motorcycle or scooter with our detailed report.</p>
                <a href="#"
                  class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform group-hover:-translate-y-1">Explore
                  Now</a>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="relative overflow-hidden rounded-xl shadow-lg group">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/car.jpg" alt="Car Report"
                class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-110">
              <div
                class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-70 transition-opacity duration-300 group-hover:opacity-90">
              </div>
              <div
                class="absolute inset-0 flex flex-col justify-end p-6 text-white transform translate-y-8 transition-transform duration-300 group-hover:translate-y-0">
                <span
                  class="bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3 self-start">POPULAR</span>
                <h3 class="text-2xl font-semibold mb-2">Car VIN Check</h3>
                <p class="text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Get
                  comprehensive vehicle history for cars, trucks, and SUVs with our in-depth analysis.</p>
                <a href="#"
                  class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform group-hover:-translate-y-1">Check
                  Now</a>
              </div>
            </div>
          </div>
          <div class="w-full md:w-1/3 px-4 mb-8">
            <div class="relative overflow-hidden rounded-xl shadow-lg group">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/van.jpg" alt="RV Report"
                class="w-full h-80 object-cover transition-transform duration-300 group-hover:scale-110">
              <div
                class="absolute inset-0 bg-gradient-to-b from-transparent to-black opacity-70 transition-opacity duration-300 group-hover:opacity-90">
              </div>
              <div
                class="absolute inset-0 flex flex-col justify-end p-6 text-white transform translate-y-8 transition-transform duration-300 group-hover:translate-y-0">
                <span
                  class="bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full mb-3 self-start">TRENDING</span>
                <h3 class="text-2xl font-semibold mb-2">Van & RV VIN Check</h3>
                <p class="text-sm mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Unveil the
                  complete history of vans and recreational vehicles with our detailed report.</p>
                <a href="#"
                  class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-300 ease-in-out transform group-hover:-translate-y-1">Discover
                  More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




    <section class="py-20">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap -mx-4">
          <div class="w-full lg:w-1/2 px-4">
            <div class="max-w-lg lg:mx-auto mb-10 lg:mb-0">
              <span class="text-xs font-semibold text-indigo-500 uppercase">
                How to run VIN check
              </span>
              <h2
                class="mt-2 mb-4 text-3xl leading-tight md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight font-bold font-heading">
                How Do I Run VIN Check?</h2>
              <!-- <p class="mb-8 text-base leading-relaxed lg:text-xl lg:leading-relaxed text-gray-500">Lorem ipsum dolor
                sit amet, consectetur adipiscing elit. Pellentesque massa nibh, pulvinar vitae aliquet nec, accumsan
                aliquet orci.</p> -->
              <!-- <a class="inline-block px-5 py-3 md:mr-3 mb-3 md:mb-0 text-sm bg-indigo-500 hover:bg-indigo-600 text-white font-semibold border border-indigo-500 hover:border-indigo-600 rounded transition duration-200"
                href="#">Action</a> -->
            </div>
          </div>
          <div class="w-full lg:w-1/2 px-4">
            <div class="flex flex-wrap px-2 py-6 md:px-8 md:py-12 bg-gray-50 rounded-lg">
              <div class="w-full md:w-1/2 lg:w-full flex items-start flex-col lg:flex-row px-4 mb-8 lg:mb-6">
                <span
                  class="mr-10 mb-4 lg:mb-0 flex-shrink-0 flex justify-center items-center w-12 h-12 rounded-full bg-indigo-500 text-white font-bold font-heading">1</span>
                <div class="max-w-xs">
                  <p class="text-lg text-gray-500 leading-loose font-sans">Look for the VIN</p>
                </div>
              </div>
              <div class="w-full md:w-1/2 lg:w-full flex items-start flex-col lg:flex-row px-4 mb-8 lg:mb-6">
                <span
                  class="mr-10 mb-4 lg:mb-0 flex-shrink-0 flex justify-center items-center w-12 h-12 rounded-full bg-indigo-500 text-white font-bold font-heading">2</span>
                <div class="max-w-xs">
                  <p class="text-lg text-gray-500 leading-loose">Start the VIN search</p>
                </div>
              </div>
              <div class="w-full md:w-1/2 lg:w-full flex items-start flex-col lg:flex-row px-4">
                <span
                  class="mr-10 mb-4 lg:mb-0 flex-shrink-0 flex justify-center items-center w-12 h-12 rounded-full bg-indigo-500 text-white font-bold font-heading">3</span>
                <div class="max-w-xs">
                  <p class="text-lg text-gray-500 leading-loose">Get the Vehicle History Report</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="where-to-find-vin">
      <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-center mb-8">Where to Find VIN Number</h2>
        <div class="w-full">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/where-to-find-vin.webp"
            alt="VIN Number Location" class="w-full h-auto rounded-lg shadow-sm">
        </div>
      </div>
    </section>

    <section class="py-20" x-data="{ pricing: '' }" x-init="pricing = $refs.pricing1.textContent">
      <div class="container px-4 mx-auto">
        <div class="max-w-xl lg:max-w-2xl mx-auto mb-12 text-center">
          <span class="text-xs font-semibold text-indigo-500 uppercase">Choose Your Plan</span>
          <h2
            class="mt-2 mb-4 text-3xl leading-tight md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight font-bold font-heading">
            Select the Best Plan That Fits Your Needs</h2>
          <p class="mb-8 text-base leading-relaxed lg:text-xl lg:leading-relaxed text-gray-500">Explore our
            comprehensive range of VIN Request Services designed to cater to your specific needs.</p>
          <!-- <a x-ref="pricing1" x-on:click.prevent="pricing = $refs.pricing1.textContent"
            class="mr-6 text-lg pb-2 border-b-4 border-indigo-500"
            :class="{ 'border-indigo-500': pricing == $refs.pricing1.textContent, 'border-transparent hover:border-indigo-500': pricing != $refs.pricing1.textContent }"
            href="#">Monthly</a><a x-ref="pricing2" x-on:click.prevent="pricing = $refs.pricing2.textContent"
            class="text-lg pb-2 border-b-4 border-transparent hover:border-indigo-500"
            :class="{ 'border-indigo-500': pricing == $refs.pricing2.textContent, 'border-transparent hover:border-indigo-500': pricing != $refs.pricing2.textContent }"
            href="#">Yearly</a> -->
        </div>
        <div class="flex flex-wrap items-center -mx-4 -mb-6 lg:mb-0" id="pricing-section">
          <div class="w-full lg:w-1/3 px-4 mb-6 lg:mb-0">
            <div class="p-6 md:p-12 bg-gray-50 rounded lg:text-center">
              <h3 class="text-2xl font-bold text-indigo-500">Basic</h3>
              <span class="inline-block mb-6 text-4xl md:text-6xl font-bold font-heading">$35</span>
              <ul class="mb-6 text-left text-lg">
                <li class="mb-2 flex items-center">
                  <svg class="mr-2 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <p>3 VIN Reports</p>
                </li>
                <li class="mb-2 flex items-center">
                  <svg class="mr-2 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <p>Basic vehicle history</p>
                </li>
              </ul>
              <a class="block w-full px-5 py-3 text-sm text-center bg-indigo-500 hover:bg-indigo-600 text-white font-semibold border border-indigo-500 hover:border-indigo-600 rounded transition duration-200 plan-button"
                href="javascript:void(0)" data-plan="basic">Select Plan</a>
            </div>
          </div>
          <div class="w-full lg:w-1/3 px-4 mb-6 lg:mb-0">
            <div class="p-6 md:p-12 bg-indigo-500 rounded lg:text-center">
              <h3 class="text-2xl font-bold text-gray-50">Gold</h3>
              <span class="inline-block mb-6 text-4xl md:text-6xl font-bold text-white">$45</span>
              <ul class="mb-6 text-left text-lg">
                <li class="mb-2 flex items-center">
                  <svg class="mr-2 w-6 h-6 text-indigo-100" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <p class="text-lg text-white">10 VIN Reports</p>
                </li>
                <li class="mb-2 flex items-center">
                  <svg class="mr-2 w-6 h-6 text-indigo-100" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <p class="text-lg text-white">Detailed vehicle history</p>
                </li>
              </ul>
              <a class="block w-full px-5 py-3 text-sm text-center bg-white hover:bg-indigo-50 text-indigo-500 font-semibold border border-white hover:border-indigo-50 rounded transition duration-200 plan-button"
                href="javascript:void(0)" data-plan="gold">Select Plan</a>
            </div>
          </div>
          <div class="w-full lg:w-1/3 px-4">
            <div class="p-6 md:p-12 bg-gray-50 rounded lg:text-center">
              <h3 class="text-2xl font-bold text-indigo-500">Platinum</h3>
              <span class="inline-block mb-6 text-4xl md:text-6xl font-bold font-heading">$55</span>
              <ul class="mb-6 text-left text-lg">
                <li class="mb-2 flex items-center">
                  <svg class="mr-2 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <p>20 VIN Reports</p>
                </li>
                <li class="mb-2 flex items-center">
                  <svg class="mr-2 w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <p>Comprehensive vehicle history</p>
                </li>
              </ul>
              <a class="block w-full px-5 py-3 text-sm text-center bg-indigo-500 hover:bg-indigo-600 text-white font-semibold border border-indigo-500 hover:border-indigo-600 rounded transition duration-200 plan-button"
                href="javascript:void(0)" data-plan="platinum">Select Plan</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-20">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap items-center -mx-4 -mb-8">
          <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8 text-center">
            <svg class="mx-auto mb-4 text-indigo-500" width="48" height="48" viewbox="0 0 48 48" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M25.6 22.9C25.7 23 25.8 23 26 23H33C33.6 23 34 22.6 34 22C34 21.8 34 21.7 33.9 21.6L30.4 14.6C30.1 14.1 29.5 13.9 29 14.2C28.9 14.3 28.7 14.4 28.6 14.6L25.1 21.6C24.9 22 25.1 22.6 25.6 22.9ZM29.5 17.2L31.4 21H27.6L29.5 17.2ZM18.5 14C16 14 14 16 14 18.5C14 21 16 23 18.5 23C21 23 23 21 23 18.5C23 16 21 14 18.5 14ZM18.5 21C17.1 21 16 19.9 16 18.5C16 17.1 17.1 16 18.5 16C19.9 16 21 17.1 21 18.5C21 19.9 19.9 21 18.5 21ZM22.7 25.3C22.3 24.9 21.7 24.9 21.3 25.3L18.5 28.1L15.7 25.3C15.3 24.9 14.7 24.9 14.3 25.3C13.9 25.7 13.9 26.3 14.3 26.7L17.1 29.5L14.3 32.3C13.9 32.7 13.9 33.3 14.3 33.7C14.7 34.1 15.3 34.1 15.7 33.7L18.5 30.9L21.3 33.7C21.7 34.1 22.3 34.1 22.7 33.7C23.1 33.3 23.1 32.7 22.7 32.3L19.9 29.5L22.7 26.7C23.1 26.3 23.1 25.7 22.7 25.3ZM33 25H26C25.4 25 25 25.4 25 26V33C25 33.6 25.4 34 26 34H33C33.6 34 34 33.6 34 33V26C34 25.4 33.6 25 33 25ZM32 32H27V27H32V32Z"
                fill="currentColor"></path>
              <circle cx="24" cy="24" r="23.5" stroke="currentColor"></circle>
            </svg>
            <h3 class="mb-2 text-2xl font-bold font-heading">3M+ Reports</h3>
            <p class="text-lg text-gray-500">Trusted vehicle checks</p>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8 text-center">
            <svg class="mx-auto mb-4 text-indigo-500" width="48" height="48" viewbox="0 0 48 48" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M25.6 22.9C25.7 23 25.8 23 26 23H33C33.6 23 34 22.6 34 22C34 21.8 34 21.7 33.9 21.6L30.4 14.6C30.1 14.1 29.5 13.9 29 14.2C28.9 14.3 28.7 14.4 28.6 14.6L25.1 21.6C24.9 22 25.1 22.6 25.6 22.9ZM29.5 17.2L31.4 21H27.6L29.5 17.2ZM18.5 14C16 14 14 16 14 18.5C14 21 16 23 18.5 23C21 23 23 21 23 18.5C23 16 21 14 18.5 14ZM18.5 21C17.1 21 16 19.9 16 18.5C16 17.1 17.1 16 18.5 16C19.9 16 21 17.1 21 18.5C21 19.9 19.9 21 18.5 21ZM22.7 25.3C22.3 24.9 21.7 24.9 21.3 25.3L18.5 28.1L15.7 25.3C15.3 24.9 14.7 24.9 14.3 25.3C13.9 25.7 13.9 26.3 14.3 26.7L17.1 29.5L14.3 32.3C13.9 32.7 13.9 33.3 14.3 33.7C14.7 34.1 15.3 34.1 15.7 33.7L18.5 30.9L21.3 33.7C21.7 34.1 22.3 34.1 22.7 33.7C23.1 33.3 23.1 32.7 22.7 32.3L19.9 29.5L22.7 26.7C23.1 26.3 23.1 25.7 22.7 25.3ZM33 25H26C25.4 25 25 25.4 25 26V33C25 33.6 25.4 34 26 34H33C33.6 34 34 33.6 34 33V26C34 25.4 33.6 25 33 25ZM32 32H27V27H32V32Z"
                fill="currentColor"></path>
              <circle cx="24" cy="24" r="23.5" stroke="currentColor"></circle>
            </svg>
            <h3 class="mb-2 text-2xl font-bold font-heading">99.8% Satisfaction</h3>
            <p class="text-lg text-gray-500">Highly rated service.

            </p>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8 text-center">
            <svg class="mx-auto mb-4 text-indigo-500" width="48" height="48" viewbox="0 0 48 48" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M25.6 22.9C25.7 23 25.8 23 26 23H33C33.6 23 34 22.6 34 22C34 21.8 34 21.7 33.9 21.6L30.4 14.6C30.1 14.1 29.5 13.9 29 14.2C28.9 14.3 28.7 14.4 28.6 14.6L25.1 21.6C24.9 22 25.1 22.6 25.6 22.9ZM29.5 17.2L31.4 21H27.6L29.5 17.2ZM18.5 14C16 14 14 16 14 18.5C14 21 16 23 18.5 23C21 23 23 21 23 18.5C23 16 21 14 18.5 14ZM18.5 21C17.1 21 16 19.9 16 18.5C16 17.1 17.1 16 18.5 16C19.9 16 21 17.1 21 18.5C21 19.9 19.9 21 18.5 21ZM22.7 25.3C22.3 24.9 21.7 24.9 21.3 25.3L18.5 28.1L15.7 25.3C15.3 24.9 14.7 24.9 14.3 25.3C13.9 25.7 13.9 26.3 14.3 26.7L17.1 29.5L14.3 32.3C13.9 32.7 13.9 33.3 14.3 33.7C14.7 34.1 15.3 34.1 15.7 33.7L18.5 30.9L21.3 33.7C21.7 34.1 22.3 34.1 22.7 33.7C23.1 33.3 23.1 32.7 22.7 32.3L19.9 29.5L22.7 26.7C23.1 26.3 23.1 25.7 22.7 25.3ZM33 25H26C25.4 25 25 25.4 25 26V33C25 33.6 25.4 34 26 34H33C33.6 34 34 33.6 34 33V26C34 25.4 33.6 25 33 25ZM32 32H27V27H32V32Z"
                fill="currentColor"></path>
              <circle cx="24" cy="24" r="23.5" stroke="currentColor"></circle>
            </svg>
            <h3 class="mb-2 text-2xl font-bold font-heading">1M+ Analyzed</h3>
            <p class="text-lg text-gray-500">Cars reviewed yearly.

            </p>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8 text-center">
            <svg class="mx-auto mb-4 text-indigo-500" width="48" height="48" viewbox="0 0 48 48" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M25.6 22.9C25.7 23 25.8 23 26 23H33C33.6 23 34 22.6 34 22C34 21.8 34 21.7 33.9 21.6L30.4 14.6C30.1 14.1 29.5 13.9 29 14.2C28.9 14.3 28.7 14.4 28.6 14.6L25.1 21.6C24.9 22 25.1 22.6 25.6 22.9ZM29.5 17.2L31.4 21H27.6L29.5 17.2ZM18.5 14C16 14 14 16 14 18.5C14 21 16 23 18.5 23C21 23 23 21 23 18.5C23 16 21 14 18.5 14ZM18.5 21C17.1 21 16 19.9 16 18.5C16 17.1 17.1 16 18.5 16C19.9 16 21 17.1 21 18.5C21 19.9 19.9 21 18.5 21ZM22.7 25.3C22.3 24.9 21.7 24.9 21.3 25.3L18.5 28.1L15.7 25.3C15.3 24.9 14.7 24.9 14.3 25.3C13.9 25.7 13.9 26.3 14.3 26.7L17.1 29.5L14.3 32.3C13.9 32.7 13.9 33.3 14.3 33.7C14.7 34.1 15.3 34.1 15.7 33.7L18.5 30.9L21.3 33.7C21.7 34.1 22.3 34.1 22.7 33.7C23.1 33.3 23.1 32.7 22.7 32.3L19.9 29.5L22.7 26.7C23.1 26.3 23.1 25.7 22.7 25.3ZM33 25H26C25.4 25 25 25.4 25 26V33C25 33.6 25.4 34 26 34H33C33.6 34 34 33.6 34 33V26C34 25.4 33.6 25 33 25ZM32 32H27V27H32V32Z"
                fill="currentColor"></path>
              <circle cx="24" cy="24" r="23.5" stroke="currentColor"></circle>
            </svg>
            <h3 class="mb-2 text-2xl font-bold font-heading">5+ Years</h3>
            <p class="text-lg text-gray-500">Proven industry experience.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonials" class="py-20">
      <div class="container px-4 mx-auto">
        <div class="max-w-3xl mx-auto mb-12 lg:mb-16 text-center">
          <span class="text-sm text-indigo-500 font-bold uppercase">
            Customer Testimonials
          </span>
          <h2
            class="mt-2 mb-4 text-3xl leading-tight md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight font-bold font-heading">
            Customer Testimonials</h2>
          <p class="text-lg text-gray-500 leading-loose">Discover how our service transformed their experience.</p>
        </div>
        <div class="flex flex-wrap items-center justify-around -m-4">
          <div class="w-full md:w-1/2 lg:w-1/3 p-4">
            <div class="bg-gray-50 p-6 rounded-lg">
              <p class="mb-8 text-base leading-relaxed lg:text-xl lg:leading-relaxed text-gray-500">The VIN report was
                incredibly detailed and accurate!</p>
              <img class="mb-2 h-12 w-12 object-cover rounded-full"
                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/indigo-500-avatar.png"
                alt="">
              <p class="text-2xl font-bold font-heading">John Doe</p>
              <p class="text-lg text-gray-400">CEO, Auto Insights</p>
            </div>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/3 p-4">
            <div class="bg-gray-50 p-6 rounded-lg">
              <p class="mb-8 text-base leading-relaxed lg:text-xl lg:leading-relaxed text-gray-500">I saved so much time
                with this service!</p>
              <img class="mb-2 h-12 w-12 object-cover rounded-full"
                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/indigo-500-avatar.png"
                alt="">
              <p class="text-2xl font-bold font-heading">Jane Smith</p>
              <p class="text-lg text-gray-400">Manager, Vehicle Hub</p>
            </div>
          </div>
          <div class="w-full md:w-1/2 lg:w-1/3 p-4">
            <div class="bg-gray-50 p-6 rounded-lg">
              <p class="mb-8 text-base leading-relaxed lg:text-xl lg:leading-relaxed text-gray-500">This is a must-have
                for any car buyer!</p>
              <img class="mb-2 h-12 w-12 object-cover rounded-full"
                src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/images/indigo-500-avatar.png"
                alt="">
              <p class="text-2xl font-bold font-heading">Emily Johnson</p>
              <p class="text-lg text-gray-400">Director, CarSmart</p>
            </div>
          </div>



        </div>
      </div>
    </section>

    <footer class="py-10">
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap items-center justify-between">
          <div class="w-full lg:w-1/5 mb-6 lg:mb-0">
            <a class="text-gray-600 text-2xl leading-none" href="#">
              <img class="h-8" src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/logos/360Logo.svg"
                alt="" width="auto">
            </a>
          </div>
          <div class="w-full lg:w-auto">
            <ul class="flex flex-wrap items-center">
              <!-- <li class="mb-4 md:mb-0 mx-4"><a class="text-sm hover:text-indigo-700 font-medium" href="#">About</a></li> -->
              <!-- <li class="mb-4 md:mb-0 mx-4"><a class="text-sm hover:text-indigo-700 font-medium" href="#">Company</a>
              </li>
              <li class="mb-4 md:mb-0 mx-4"><a class="text-sm hover:text-indigo-700 font-medium" href="#">Services</a>
              </li>
              <li class="mb-4 md:mb-0 mx-4"><a class="text-sm hover:text-indigo-700 font-medium"
                  href="#">Testimonials</a></li> -->
            </ul>
          </div>
        </div>
      </div>
      <div class="mt-16 mb-8 border-b"></div>
      <div class="container px-4 mx-auto">
        <div class="flex flex-wrap justify-between items-center">
          <p class="w-full lg:w-auto mt-4 lg:mt-0 order-last lg:order-first text-sm text-gray-500">All rights reserved.
            © 360AutoInspect.</p>
          <div class="order-first lg:order-last">
            <a class="inline-block mr-8" href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/socials/facebook.svg" alt="">
            </a>
            <a class="inline-block mr-8" href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/socials/twitter.svg" alt="">
            </a>
            <a class="inline-block mr-8" href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/socials/github.svg" alt="">
            </a>
            <a class="inline-block mr-8" href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/socials/instagram.svg" alt="">
            </a>
            <a class="inline-block" href="#">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/plain-assets/socials/linkedin.svg" alt="">
            </a>
          </div>
        </div>
      </div>
    </footer>
  </div>



  <script>

    document.addEventListener('DOMContentLoaded', function () {
      const vinInput = document.getElementById('vin-input');
      const checkVinBtn = document.getElementById('check-vin-btn');

      checkVinBtn.addEventListener('click', function () {
        const vin = vinInput.value.trim();
        if (vin) {
          // Scroll to pricing section
          const pricingSection = document.getElementById('pricing-section');
          if (pricingSection) {
            pricingSection.scrollIntoView({ behavior: 'smooth' });
          }
        }
      });

      // Add event listeners to plan buttons
      const planButtons = document.querySelectorAll('.plan-button');
      planButtons.forEach(button => {
        button.addEventListener('click', function (e) {
          e.preventDefault();
          const vin = vinInput.value.trim();
          console.log("🚀 ~ button.addEventListener ~ vin:", vin)
          const planName = this.getAttribute('data-plan');
          console.log("🚀 ~ button.addEventListener ~ planName:", planName)
          if (vin && planName) {
            // Navigate to checkout with VIN and plan name
            window.location.href = `/checkout/?vin=${encodeURIComponent(vin)}&package=${encodeURIComponent(planName)}`;
          }
        });
      });
    });
  </script>


</body>

</html>