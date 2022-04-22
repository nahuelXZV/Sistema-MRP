<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">
            Añadir categoria de materias primas
        </h6>
    </x-header-multi>
    <div class="modal-body relative p-8 bg-gray-100 rounded-xl shadow-lg mt-8 ">

        <div>
            <label for="" class="text-sm font-bold">Nombre</label>
            <input type="text" placeholder="Ingrese el nombre de la categoria" wire:model.defer='nombre'
                class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
            <x-jet-input-error for="nombre" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Descripcion</label>
            <textarea type="text" wire:model.defer='descripcion' placeholder="Ingrese una descripcion"
                class="form-control text-base  ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4  py-2 ">
                </textarea>
            <x-jet-input-error for="descripcion" />
        </div>
        <div>
            <button wire:click='guardar' class="bg-gray-800  text-white font-bold px-6 py-4 rounded-lg text-sm ">
                Guardar
            </button>
        </div>

    </div>
</div>
