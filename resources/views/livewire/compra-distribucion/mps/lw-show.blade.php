<div>
    @if ($bandera)
        @if ($botton == 'Verificar')
            <x-header-multi>
                <h6 class="font-medium leading-tight text-base"></h6>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start border-t border-gray-200 rounded-b-md">
                    <button type="button" wire:click="verificar" wire:loading.attr="disabled"
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
            <h6 class="leading-tight uppercase text-base font-bold text-black mb-4 mt-4">Detalles MPS</h6>
            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Fecha</label>
                    <input type="text" wire:model="datos.fecha" readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>

                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Tipo</label>
                    <input type="text" wire:model="datos.tipo" readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
            </div>

            <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Lista de produccion</h6>
            <x-table>
                <table class="min-w-full">
                    @if ($estados->count())
                        <thead class="border-b bg-gray-800 ">
                            <tr class="">
                                <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                    Nombre
                                </th>
                                <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                    Cantidad total
                                </th>
                                <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                    Cantidad en stock
                                </th>
                                <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                    Cantidad faltante
                                </th>
                                <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                    Estado
                                </th>
                                <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($estados as $estado)
                                <tr class="bg-white border-b">
                                    <td
                                        class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $estado->detallePedido->producto->nombre }}
                                    </td>
                                    <td
                                        class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $estado->cantidad_total }}</td>
                                    <td
                                        class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $estado->cantidad_stock }}</td>

                                    <td class="text-center text-sm text-black font-light px-6 py-4 whitespace-nowrap">
                                        {{ $estado->cantidad_total - $estado->cantidad_stock }}</td>
                                    <td
                                        class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{ $estado->estado }}</td>
                                    <td
                                        class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-center">
                                            <div class="inline-flex" role="group">
                                                <a
                                                    class="m-1 inline-block px-4 py-1.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @else
                        <span>Sin lista de producción...</span>
                    @endif
                </table>
            </x-table>
        </div>
    @else
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative mt-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">Sin un MPS creado.</span>
        </div>
    @endif
</div>
