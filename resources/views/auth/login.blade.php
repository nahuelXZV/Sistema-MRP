<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <div class="flex flex-col  bg-white  shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-3xl w-50 max-w-md">
            <div class="font-medium self-center text-xl sm:text-3xl text-gray-800">
                Bienvenido de nuevo
            </div>
            <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
                Ingrese sus credenciales para acceder a su cuenta
            </div>

            <x-jet-validation-errors class="mb-4" />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="mt-10">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col mb-5">
                        <label for="email" class="mb-1 text-xs tracking-wide text-gray-600">Correo eletrónico:</label>

                        <div class="relative">
                            <div
                                class="inline-flex items-center justify-center absolute   left-0   top-0    h-full     w-10  text-gray-400    ">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </span>
                            </div>

                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                class="text-sm placeholder-gray-500 pl-10 pr-4 rounded-2xl border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                                placeholder="Enter your email" />

                        </div>
                    </div>
                    <div class="flex flex-col mb-6">
                        <label for="password"
                            class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Contraseña:</label>
                        <div class="relative">
                            <div
                                class="inline-flex items-center justify-center absolute left-0   top-0  h-full  w-10 text-gray-400  ">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </div>

                            <input id="password" type="password" name="password" required
                                autocomplete="current-password"
                                class="text-sm  placeholder-gray-500  pl-10  pr-4   rounded-2xl border border-gray-400  w-full py-2 focus:outline-none focus:border-blue-400 "
                                placeholder="Enter your password" />
                        </div>
                    </div>

                    <div class="flex w-full">
                        <button type="submit"
                            class="flex mt-2 items-center justify-center focus:outline-none text-white text-sm  sm:text-base bg-blue-500 hover:bg-blue-600   rounded-2xl   py-2  w-full transition  duration-150 ease-in">
                            <span class="mr-2 uppercase">Entrar</span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
