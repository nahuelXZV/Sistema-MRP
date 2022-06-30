  <div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">Añadir Proveedor</h6>
    </x-header-multi>
    <div class="modal-body relative p-4 ">

        <div class="grid grid-cols-2 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nombre de Empresa</label>
                <input type="text" wire:model.defer="proveedor.nombre_empresa" name='nombre_empresa'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="nombre empresa">
                <x-jet-input-error for="proveedor.nombre_empresa" />
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Telefono</label>
                <input type="text" wire:model.defer="proveedor.telefono" name='telefono'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="telefono">
                <x-jet-input-error for="proveedor.telefono" />
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4">
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Direccion</label>
                <input type="text" wire:model.defer="proveedor.direccion" name='direccion'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="direccion">
                <x-jet-input-error for="proveedor.direccion" />
            </div>
            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">email</label>
                <input type="email" wire:model.defer="proveedor.email" name='email'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="email">
                <x-jet-input-error for="proveedor.email" />
            </div>

            <div class="form-group mb-6">
                <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Encargado</label>
                <input type="text" wire:model.defer="proveedor.encargado" name='encargado'
                    class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Encargado">
                <x-jet-input-error for="proveedor.encargado" />
            </div>
            
        </div>
       

        <div
            class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start p-4 border-t border-gray-200 rounded-b-md">
            <a type="button" href="{{ route('proveedor.index') }}"
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

