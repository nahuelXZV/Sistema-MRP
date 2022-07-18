 <div>
     <x-header-multi>
         <h6 class="font-medium leading-tight text-base">Añadir Maquinaria</h6>
     </x-header-multi>
     <div class="modal-body relative p-4 ">

         <div class="grid grid-cols-2 gap-4">
             <div class="form-group mb-6">
                 <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nombre </label>
                 <input type="text" wire:model.defer="maquinaria.nombre" name='nombre'
                     class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                     placeholder="Nombre de la maquinaria">
                 <x-jet-input-error for="maquinaria.nombre" />
             </div>
             <div class="form-group mb-6">
                 <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Marca</label>
                 <input type="text" wire:model.defer="maquinaria.marca" name='marca'
                     class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                     placeholder="Marca">
                 <x-jet-input-error for="maquinaria.marca" />
             </div>
         </div>
         <div class="grid grid-cols-1 gap-4">
             <div class="form-group mb-6">
                 <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Descripción*</label>
                 <textarea name="descripcion" id="" cols="30" rows="5"
                     wire:model.defer="maquinaria.descripcion" placeholder="Descripción"
                     class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
                 <x-jet-input-error for="maquinaria.descripcion" />
             </div>
         </div>
         <div
             class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start p-4 border-t border-gray-200 rounded-b-md">
             <a type="button" href="{{ route('maquinarias.index') }}"
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
