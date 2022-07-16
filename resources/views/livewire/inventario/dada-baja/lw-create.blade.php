<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">Añadir Nota Salida</h6>
    </x-header-multi>
    <div class="modal-body relative p-4 ">


        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Fecha*</label>
                <input type="date" wire:model.defer="baja.fecha" name='fecha'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Fecha">
                <x-jet-input-error for="baja.fecha" />
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">motivo*</label>
                <input type="text" wire:model.defer="baja.motivo" name='baja.motivo'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="motivo">
                <x-jet-input-error for="baja.motivo" />
            </div>
        </div>
        <div class="form-group mb-6">
            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Descripcion*</label>
            <textarea name="baja.descripcion" id="" cols="30" rows="5" wire:model.defer="baja.descripcion"
                placeholder="Descripción"
                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
            <x-jet-input-error for="baja.descripcion" />
        </div>

        {{-- Lista de productos --}}


    </div>


    <div class="bg-gray-100 p-3">
        @if (isset($error))
        <div class="alert alert-danger">
            <strong>{{ $error }}</strong>
        </div>
        @endif
        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Añadir productos</h6>
        <div class="grid grid-cols-5 gap-4">
            <div class="form-group col-span-2 mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Producto*</label>
                <select wire:model.defer='producto.producto_id' name='producto.producto_id'
                    class="form-select appearance-none   h-9   block    w-full    px-2    py-1    text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    aria-label=".form-select-sm example">
                    <option selected>Selecciona un producto</option>
                    @foreach ($products as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="producto.producto_id" />
            </div>
            <div class="form-group col-span-2 mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Cantidad*</label>
                <input type="number" wire:model.defer="producto.cantidad" name='producto.cantidad' min="1"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="01.00">
                <x-jet-input-error for="producto.cantidad" />
            </div>

            <div class="grid grid-cols-1   gap-4 place-content-center place-items-center">
                <div>
                    <button type="button" wire:click="limpiar" wire:loading.attr="disabled"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                        Limpiar</button>
                    <button type="button" wire:click="addProducto()" wire:loading.attr="disabled"
                        class="self-center px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                        Añadir</button>
                </div>
            </div>
        </div>

        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Lista de productos</h6>
        <x-table>
            <table class="min-w-full">
                @if (count($detalles))
                <thead class="border-b bg-gray-800 ">
                    <tr class="">
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Nombre
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Cantidad
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $det)
                            <tr class="bg-white border-b">
                                <td
                                    class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $det['nombre'] }}
                                </td>
                                <td
                                    class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $det['cantidad'] }}
                                </td>
                                <td
                                    class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <div class="inline-flex" role="group">
                                            <button type="button" wire:click='delete({{ $det['id'] }} )'
                                                class="m-1 inline-block px-4 py-1.5 bg-red-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                                <x-delete> </x-delete>
                                            </button>
                                        </div>
                                    </div>
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

    <div
        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start p-4 border-t border-gray-200 rounded-b-md">
        <a type="button" href="{{ route('pedidos.index') }}"
            class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Cerrar</a>

        <button type="button" wire:click="finalizar()" wire:loading.attr="disabled"
            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
            Finalizar</button>
    </div>
</div>
