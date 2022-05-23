<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">
            Editar Sistema de unidad
        </h6>
    </x-header-multi>
    <div class="modal-body relative p-8 bg-gray-100 rounded-xl shadow-lg mt-8 ">
        <form action="" class="flex flex-col space-y-4">
            <div>
                <label for="" class="text-sm font-bold">Nombre</label>
                <input type="text" placeholder="Ingrese el nombre de la categoria" wire:model.defer='nombre' class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2" >
                <x-jet-input-error for="nombre" />
            </div>
            <div>
                <label for="" class="text-sm font-bold">Descripcion</label>
                <input type="text" placeholder="Ingrese el nombre de la categoria" wire:model.defer='abreviatura' class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2" >
                <x-jet-input-error for="abreviatura" />
            </div>
            <div>
                <button type="button" wire:click="edit()" wire:loading.attr="disabled"
                class="inline-block px-6 py-2.5 bg-gray-800  text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                Guardar</button>
            </div>
        </form>
    </div>
</div>

