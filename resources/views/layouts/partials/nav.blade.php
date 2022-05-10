<header class="z-40 py-4  bg-gray-800">
    <div class="flex items-center justify-between h-8 px-6 mx-auto">
        <!-- Mobile hamburger -->
        <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
            @click="toggleSideMenu" aria-label="Menu">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
        </button>

        <!-- Search Input -->
        <div class="flex justify-center  mt-2 mr-4">
            <div class="relative flex w-full flex-wrap items-stretch mb-3">

            </div>
        </div>

        <ul class="flex items-center flex-shrink-0 space-x-6">
            <a href="{{ route('profile.show') }}"
                class="text-base font-normal text-white ">{{ auth()->user()->name }}</a>
            <li>
                <div class="dropdown relative">
                    <a class="dropdown-toggle flex items-center hidden-arrow" href="#" id="dropdownMenuButton2"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://mdbootstrap.com/img/new/avatars/2.jpg" class="rounded-full"
                            style="height: 40px; width: 40px" alt="" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 m-0 bg-clip-padding border-none left-auto right-0"
                        aria-labelledby="dropdownMenuButton2">
                        <li>
                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                href="{{ route('profile.show') }}">Perfil
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button
                                    class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                    type="submit">Salir &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                                    &nbsp</button>
                            </form>
                        </li>

                    </ul>
                </div>

            </li>
        </ul>
    </div>
</header>
