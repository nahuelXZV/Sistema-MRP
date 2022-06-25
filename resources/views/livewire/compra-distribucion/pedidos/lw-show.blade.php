<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base"></h6>
        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start border-t border-gray-200 rounded-b-md">
            <button type="button" wire:click="continuar" wire:loading.attr="disabled"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                Continuar</button>
            <a type="button" href="{{ route('pedidos.edit', $pedido->id) }}"
                class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                Editar</a>
        </div>
    </x-header-multi>

    <div class="modal-body relative p-4 ">
        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4 mt-4">Detalles del pedido</h6>
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Cliente</label>
                <input type="text" wire:model="datos.cliente" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>

            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Estado</label>
                <input type="text" wire:model="datos.estado" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Fecha</label>
                <input type="date" wire:model="datos.fecha" name='fecha' readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Hora</label>
                    <input type="text" wire:model="datos.hora" name='fecha' readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
            </div>
        </div>
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Descripcion</label>
            <textarea name="datos.descripcion" id="" cols="30" rows="5" wire:model.defer="datos.descripcion"
                placeholder="Descripción"
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
        </div>


        <!--    -->
        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Detalles de envio</h6>
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Distribudiora</label>
                <input type="text" wire:model="datos.distribuidor" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Dirección</label>
                <input type="text" wire:model="datos.direccion" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
        </div>


        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Lista de productos</h6>
        <x-table>
            <table class="min-w-full">
                @if ($dpedidos->count())
                    <thead class="border-b bg-gray-800 ">
                        <tr class="">
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Nombre
                            </th>
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Color
                            </th>
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Tamaño
                            </th>
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Peso
                            </th>
                            <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                                Cantidad
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dpedidos as $dproducto)
                            <tr class="bg-white border-b">
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $dproducto->producto->nombre }}</td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $dproducto->producto->color }}</td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $dproducto->producto->tamaño }}</td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $dproducto->producto->peso }}</td>
                                <td class="text-center text-sm text-black font-light px-6 py-4 whitespace-nowrap">
                                    {{ $dproducto->cantidad }}</td>
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
