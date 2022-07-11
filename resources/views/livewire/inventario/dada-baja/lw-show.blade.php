<div>
   
    <div class="modal-body relative p-4 ">
        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4 mt-4">Detalles dado de Baja</h6>


        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Fecha</label>
                <input type="date" wire:model="baja.fecha" name='fecha' readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Hora</label>
                    <input type="text" wire:model="baja.hora" name='fecha' readonly
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                </div>
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Motivo</label>
                <input type="text" wire:model="baja.motivo" readonly
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Descripcion</label>
                <textarea name="baja.descripcion" id="" cols="30" rows="5" wire:model.defer="baja.descripcion"
                    placeholder="Descripción"
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
            </div>
    
        </div>

    


        <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Lista de productos</h6>
        <x-table>
            <table class="min-w-full">
                @if ($detallesBajaProducto->count())
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
                        @foreach ($detallesBajaProducto as $detalle)
                            <tr class="bg-white border-b">
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $detalle->producto->nombre }}</td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $detalle->producto->color }}</td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $detalle->producto->tamaño }}</td>
                                <td class="text-center text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $detalle->producto->peso }}</td>
                                <td class="text-center text-sm text-black font-light px-6 py-4 whitespace-nowrap">
                                    {{ $detalle->cantidad }}</td>
                                
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

