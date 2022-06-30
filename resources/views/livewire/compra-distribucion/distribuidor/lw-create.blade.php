 <div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">Añadir Distribuidor</h6>
    </x-header-multi>
    <div class="modal-body relative p-4 ">

        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nombre</label>
                <input type="text" wire:model.defer="distribuidor.nombre" name='nombre'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="nombre empresa">
                <x-jet-input-error for="distribuidor.nombre" />
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Telefono</label>
                <input type="text" wire:model.defer="distribuidor.telefono" name='telefono'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="telefono">
                <x-jet-input-error for="distribuidor.telefono" />
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Direccion</label>
                <input type="text" wire:model.defer="distribuidor.direccion" name='direccion'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="direccion">
                <x-jet-input-error for="distribuidor.direccion" />
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Email</label>
                <input type="email" wire:model.defer="distribuidor.email" name='email'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="email">
                <x-jet-input-error for="distribuidor.email" />
            </div>

            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Tipo</label>
                <input type="text" wire:model.defer="distribuidor.tipo" name='tipo'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="tipo">
                <x-jet-input-error for="distribuidor.tipo" />
            </div>

            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Medio de Transporte</label>
                <input type="text" wire:model.defer="distribuidor.medio_transporte" name='medio_transporte'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="medio_transporte">
                <x-jet-input-error for="distribuidor.medio_transporte" />
            </div>
            
        </div>
       

        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start p-4 border-t border-gray-200 rounded-b-md">
            <a type="button" href="{{route('distribuidores.index')}}"
                class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">Cerrar</a>
            <button type="button" wire:click="limpiar" wire:loading.attr="disabled"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                Limpiar</button>
            <button type="button" wire:click="add()" wire:loading.attr="disabled"
                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                Guardar</button>
        </div>
    </div>
</div> 

