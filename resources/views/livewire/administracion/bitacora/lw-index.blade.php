<div>
    @if ($autenticado)
        @livewire('administracion.bitacora.lw-show')
    @else
        <div class="mt-16 flex flex-col items-center justify-center ">
            <div class="flex flex-col  shadow-md px-4 sm:px-6 md:px-8 lg:px-10 py-8 rounded-3xl w-50 max-w-md">
                <div class="mt-4 self-center text-xl sm:text-sm text-gray-800">
                    Ingrese sus credenciales para acceder a la bitacora del sistema
                </div>

                <div class="mt-10">
                    <div class="flex flex-col mb-6">
                        <label for="password" class="mb-1 text-xs sm:text-sm tracking-wide text-gray-600">Clave de
                            ingreso:</label>
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
                            <input type="password" required wire:model.defer="password" autocomplete="current-password"
                                class="text-sm  placeholder-gray-500  pl-10  pr-4   rounded-2xl border border-gray-400  w-full py-2 focus:outline-none focus:border-blue-400 "
                                placeholder="Ingrese la clave de acceso" />
                        </div>
                        <x-jet-validation-errors class="mb-4" />
                        @if ($error)
                            <div class="text-red-500 text-xs italic">
                                Credenciales incorrectas...
                            </div>
                        @endif
                    </div>
                    <div class="flex w-full">
                        <button wire:click='autenticar()' id="btn-bitacora"
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
                </div>
            </div>
        </div>
    @endif
    <script>
        //click enter y presionar el boton btn-bitacora
        document.addEventListener('keyup', function(e) {
            if (e.keyCode === 13) {
                document.getElementById('btn-bitacora').click();
            }
        });
    </script>
</div>
