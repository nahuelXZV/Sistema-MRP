<div>
    <x-header-multi>
        <h6 class="text-base font-medium leading-tight"></h6>
        <div
            class="flex flex-wrap items-center justify-start flex-shrink-0 border-t border-gray-200 modal-footer rounded-b-md">
            @if ($botton != 'Ocultar')

                @if ($botton != 'OcultarV')
                    <button type="button" wire:click="continuar" wire:loading.attr="disabled"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                        {{ $botton }}</button>
                @endif
                <a type="button" href="{{ route('pedidos.edit', $pedido->id) }}"
                    class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Editar</a> 

            @endif

            <a href="{{ route('reporte.rdp', $pedido->id) }}"
                class="m-1 inline-block px-4 py-1.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
            </a>
        </div>
    </x-header-multi>
    <div class="relative p-4 modal-body ">
        <h6 class="mt-4 mb-4 text-base font-bold leading-tight text-black uppercase">Detalles del pedido</h6>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-6 form-group">
                <label for="exampleInputEmail2" class="inline-block mb-2 text-gray-700 form-label">Cliente</label>
                <input type="text" wire:model="datos.cliente" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>

            <div class="mb-6 form-group">
                <label for="exampleInputEmail2" class="inline-block mb-2 text-gray-700 form-label">Estado</label>
                <input type="text" wire:model="datos.estado" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="mb-6 form-group">
                <label for="exampleInputEmail2" class="inline-block mb-2 text-gray-700 form-label">Fecha</label>
                <input type="date" wire:model="datos.fecha" name='fecha' readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="mb-6 form-group">
                <div class="mb-6 form-group">
                    <label for="exampleInputEmail2" class="inline-block mb-2 text-gray-700 form-label">Hora</label>
                    <input type="text" wire:model="datos.hora" name='fecha' readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
            </div>
        </div>
        <div class="mb-6 form-group">
            <label for="exampleInputEmail2" class="inline-block mb-2 text-gray-700 form-label">Descripcion</label>
            <textarea name="datos.descripcion" id="" cols="30" rows="5" wire:model.defer="datos.descripcion"
                placeholder="Descripción"
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
        </div>


        <!--    -->
        <h6 class="mb-4 text-base font-bold leading-tight text-black uppercase">Detalles de envio</h6>
        <div class="grid grid-cols-2 gap-4">
            <div class="mb-6 form-group">
                <label for="exampleInputEmail2" class="inline-block mb-2 text-gray-700 form-label">Distribuidora</label>
                <input type="text" wire:model="datos.distribuidor" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="mb-6 form-group">
                <label for="exampleInputEmail2" class="inline-block mb-2 text-gray-700 form-label">Dirección</label>
                <input type="text" wire:model="datos.direccion" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>


        <h6 class="mb-4 text-base font-bold leading-tight text-black uppercase">Lista de productos</h6>
        <x-table>
            <table class="min-w-full">
                @if ($dpedidos->count())
                    <thead class="bg-gray-800 border-b ">
                        <tr class="">
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                                Color
                            </th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                                Tamaño
                            </th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                                Peso
                            </th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                                Estado
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dpedidos as $dproducto)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 text-sm font-light text-center text-gray-900 whitespace-nowrap">
                                    {{ $dproducto->producto->nombre }}</td>
                                <td class="px-6 py-4 text-sm font-light text-center text-gray-900 whitespace-nowrap">
                                    {{ $dproducto->producto->color }}</td>
                                <td class="px-6 py-4 text-sm font-light text-center text-gray-900 whitespace-nowrap">
                                    {{ $dproducto->producto->tamaño }}</td>
                                <td class="px-6 py-4 text-sm font-light text-center text-gray-900 whitespace-nowrap">
                                    {{ $dproducto->producto->peso }}</td>
                                <td class="px-6 py-4 text-sm font-light text-center text-black whitespace-nowrap">
                                    {{ $dproducto->cantidad }}</td>
                                <td class="px-6 py-4 text-sm font-light text-center text-black whitespace-nowrap">
                                    @if ($dproducto->estado)
                                        {{ $dproducto->estado }}
                                    @else
                                        Sin estado
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <span>Sin productos en la lista...</span>
                @endif
            </table>
        </x-table>
    </div>
</div>
