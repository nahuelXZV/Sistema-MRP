<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base">
            Editar materia prima
        </h6>
    </x-header-multi>
    <div class="modal-body relative p-8 bg-gray-100 rounded-xl shadow-lg mt-8 ">

        <div>
            <label for="" class="text-sm font-bold">Nombre</label>
            <input type="text" placeholder="Ingrese el nombre de la materia prima" wire:model.defer='materia.nombre'
                class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
            <x-jet-input-error for="materia.nombre" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Tipo</label>
            <input type="text" placeholder="Ingrese el tipo de la materia prima" wire:model.defer='materia.tipo'
                class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
            <x-jet-input-error for="materia.tipo" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Descripcion</label>
            <textarea type="text" wire:model.defer='materia.descripcion' placeholder="Ingrese una descripcion"
                class="form-control text-base  ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4  py-2 ">
                </textarea>
            <x-jet-input-error for="materia.descripcion" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Tamaño</label>
            <input type="text" placeholder="Ingrese el tamaño de la materia prima" wire:model.defer='materia.tamaño'
                class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
            <x-jet-input-error for="materia.tamaño" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Peso</label>
            <input type="text" placeholder="Ingrese el peso de la materia prima" wire:model.defer='materia.peso'
                class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
            <x-jet-input-error for="materia.peso" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Color</label>
            <input type="text" placeholder="Ingrese el color de la materia prima" wire:model.defer='materia.color'
                class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
            <x-jet-input-error for="materia.color" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Cantidad</label>
            <input type="number" placeholder="Cantidad" wire:model.defer='materia.cantidad'
                class="form-control text-base ring-1 
                ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
            <x-jet-input-error for="materia.cantidad" />
        </div>
        <div>
            <label for="" class="text-sm font-bold">Categoria</label>
            <select wire:model.defer='materia.idCategoriaMP' class="form-control text-base ring-1 
            ring-gray-100 w-full rounded-md outline-none focus:ring-2 focus:ring-blue-100 px-4 py-2">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="materia.idCategoriaMP" />
        </div>
        <br>
        <div>
            <button wire:click='guardar' class="bg-gray-800  text-white font-bold px-6 py-4 rounded-lg text-sm ">
                Guardar
            </button>
        </div>

    </div>
</div>
