<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">Nota de compra</h6>
    </x-header-multi>
    <div class="modal-body relative p-4 ">
        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Codigo</label>
                <input type="text" wire:model.defer="nota.id" name='nombre' readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="">

            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Fecha</label>
                <input type="text" wire:model.defer="nota.fecha" name='fecha' readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="">

            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Hora</label>
                <input type="text" wire:model.defer="nota.hora" name='hora' readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="">

            </div>
        </div>

    </div>

    <!--Detalle de nota de venta -->

    <div class="container-fluid flex">
        <x-header-multi>
            <h6 class="font-medium leading-tight text-base">Detalle Nota Compra</h6>
            <div class="m-1 flex flex-row text-right">
                <a type="button" href="{{ route('nota-compra.add', $nota['id']) }}"
                    class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Nuevo
                </a>
            </div>
        </x-header-multi>
    </div>
    <x-table>
        <table class="min-w-full text-center">
            @if ($detalles->count())
                <thead class="border-b bg-gray-800 ">
                    <tr>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Codigo
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Id Materia
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Cantidad
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Costo
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalles as $detalle)
                        <tr class="bg-white border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $detalle->id }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $detalle->materia_primas_id}}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $detalle->cantidad }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $detalle->costo }}</td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="inline-flex" role="group">
                                        <button type="button" wire:click='delete({{ $detalle->id }} )'
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
                <span>No hay resultados...</span>
            @endif
        </table>
    </x-table>
</div>
