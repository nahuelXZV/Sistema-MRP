<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">
            Añadir Sistema de Unidades 
        </h6>
    </x-header-multi>
    <div class="modal-body relative p-8 bg-gray-100 rounded-xl shadow-lg mt-8 ">
        <form action="" class="flex flex-col space-y-4">
            <div>
                <label for="" class="text-sm font-bold">Nombre</label>
                <input type="text" placeholder="Ingrese el nombre del sistema de unidad" wire:model.defer='nombre' class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2" >
                <x-jet-input-error for="nombre" />
            </div>
            <div>
                <label for="" class="text-sm font-bold">Abreviatura</label>
                <input type="text" placeholder="Ingrese la abreviatura del sistema de unidad" wire:model.defer='abreviatura' class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2" >
                <x-jet-input-error for="abreviatura" />
            </div>
            <div>
                <button wire:click='store' class="bg-gray-800  text-white font-bold px-6 py-4 rounded-lg text-sm ">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
