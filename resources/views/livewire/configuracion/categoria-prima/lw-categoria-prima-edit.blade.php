<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">
            Editar categoria de materias primas
        </h6>
    </x-header-multi>
    <div class="modal-body relative p-4 ">
        <div>
            <label for="">Nombre</label>
            <input type="text" wire:model.defer='nombre' class="form-control text-base" >
            <x-jet-input-error for="nombre" />
        </div>
        <div>
            <label for="">Descripcion</label>
            <textarea type="text" wire:model.defer='descripcion' class="form-control text-base" >
            </textarea>
            <x-jet-input-error for="descripcion" />
        </div>
        <div>
            <button wire:click='guardar'>
                Guardar
            </button>
        </div>
    </div>
</div>

