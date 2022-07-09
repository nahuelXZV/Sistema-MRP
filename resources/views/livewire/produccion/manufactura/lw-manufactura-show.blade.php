<div>
    @if ($bandera)
        <x-header-multi>
            <h6 class="font-medium leading-tight text-base"></h6>
            <div
                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start border-t border-gray-200 rounded-b-md">
                <button type="button" wire:click="verificar()" wire:loading.attr="disabled"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Verificar</button>

            </div>
        </x-header-multi>
    @endif
    @if ($error)
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mt-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $mensaje }}</span>
        </div>
    @endif

    <div class="modal-body relative p-4 ">
        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4 mt-4">Detalles</h6>
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                    Nombre producto</label>
                <input type="text" wire:model="datos.nombre" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>

            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Estado</label>
                <input type="text" wire:model="datos.estado" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                    Cantidad total</label>
                <input type="text" wire:model="datos.cantidad" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>

            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                    Faltante </label>
                <input type="text" wire:model="datos.faltante" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>

            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">
                    Fabricado </label>
                <input type="text" wire:model="datos.fabricado" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>

        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Lista de procesos</h6>
        <x-table>
            <table class="min-w-full">
                @if ($procesos->count())
                    <thead class="border-b bg-gray-800 ">
                        <tr class="">
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Proceso
                            </th>
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Descripcion
                            </th>
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procesos as $proceso)
                            <tr class="bg-white border-b">
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $proceso->proceso->nombre }}
                                </td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ substr($proceso->proceso->descripcion, 0, 100) }}</td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <div class="inline-flex" role="group">
                                            <a
                                                class="m-1 inline-block px-4 py-1.5 bg-red-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <span>Sin lista de procesos...</span>
                @endif
            </table>
        </x-table>

        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start border-t border-gray-200 rounded-b-md">

            @if ($manufactura->estado == 'Sin iniciar')
                <button type="button" wire:click="iniciar()" wire:loading.attr="disabled"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Iniciar</button>
            @endif
            @if ($botton == true && $manufactura->estado != 'Sin iniciar')
                <button type="button" wire:click="siguiente()" wire:loading.attr="disabled"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Siguiente</button>
            @endif

        </div>

    </div>

</div>
