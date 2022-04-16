<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0"
class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>

<aside
class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto  bg-gray-900 dark:bg-gray-800 md:hidden"
x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
@keydown.escape="closeSideMenu">
<div>
    <div class="text-white">
        <div class="flex p-2  bg-gray-800">
            <div class="flex py-3 px-2 items-center">
                <p class="text-2xl text-green-500 font-semibold">SA</p <p class="ml-2 font-semibold italic">
                DASHBOARD</p>
            </div>
        </div>
        <div>
            <ul class="mt-6 leading-10">
                <li class="relative px-2 py-1 ">
                    <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                        href=" #">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="ml-4">DASHBOARD</span>
                    </a>
                </li>

                <li class="relative px-2 py-1" x-data="{ Open: false }">
                    <div class="inline-flex items-center justify-between w-full text-base font-semibold transition-colors duration-150 text-gray-500  hover:text-yellow-400 cursor-pointer"
                        x-on:click="Open = !Open">
                        <span
                            class="inline-flex items-center  text-sm font-semibold text-white hover:text-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                            </svg>
                            <span class="ml-4">ITEM</span>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" x-show="!Open"
                            class="ml-1  text-white w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" x-show="Open"
                            class="ml-1  text-white w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>

                    <div x-show.transition="Open" style="display:none;">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0"
                            x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl"
                            x-transition:leave-end="opacity-0 max-h-0"
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium  rounded-md shadow-inner  bg-green-400"
                            aria-label="submenu">

                            <li class="px-2 py-1 text-white transition-colors duration-150">
                                <div class="px-1 rounded-md">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>

                                        <a href="#"
                                            class="w-full ml-2  text-sm font-semibold text-white ">Item
                                            1</a>
                                    </div>
                                </div>
                            </li>

                            <li class="px-2 py-1 text-white transition-colors duration-150">
                                <div class="px-1 rounded-md">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                        </svg>

                                        <a href="#"
                                            class="w-full ml-2  text-sm font-semibold text-white ">Item
                                            2</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
</aside>