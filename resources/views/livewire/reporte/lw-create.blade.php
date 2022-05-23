<div>

    <x-header-multi>
        <h6 class="font-medium leading-tight text-base text-black">Gestionar de reportes</h6>
    </x-header-multi>

    <div class="modal-body relative p-4 ">

        <form action="{{ route('reporte.index') }}" method="POST">
            @csrf

            <h6 class=" leading-tight uppercase text-base font-bold text-black mb-4 mt-4">Datos del reporte</h6>

            <div class="grid grid-cols-2 gap-4">
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Nombre del
                        reporte*</label>
                    <input type="text" wire:model.defer="datos.nombre" name='nombre'
                        class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        placeholder="Nombre del reporte">
                    <x-jet-input-error for="nombre" />
                </div>

                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Contenido del
                        reporte*</label>
                    <select wire:model='datos.modelo' name='modelo'
                        class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label=".form-select-sm example">
                        <option selected value="">Selecciona el contenido del reporte</option>
                        @foreach ($modelos as $model)
                            <option value="{{ $model['id'] }}">{{ $model['Modelo'] }}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="modelo" />
                </div>

            </div>
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Tipo de
                        reporte*</label>
                    <select wire:model='tipo' name='contenido'
                        class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label=".form-select-sm example">
                        <option value="defecto" selected>Por defecto</option>
                        <option value="personalizada">Personalizada</option>
                    </select>
                    <x-jet-input-error for="contenido" />
                </div>

                <div class="form-group mb-6">
                    <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Extensión del
                        reporte*</label>
                    <select wire:model='extension' name='extension'
                        class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label=".form-select-sm example">
                        <option selected value="">Selecciona un tipo de archivo</option>
                        <option value="pdf">PDF</option>
                        <option value="xlsx">EXCEL</option>
                        <option value="csv">CSV</option>
                        <option value="tsv">TSV</option>
                        <option value="ods">SAO</option>
                        <option value="xls">XLS</option>
                        <option value="html">HTML</option>
                    </select>
                    <x-jet-input-error for="extension" />
                </div>
            </div>


            <!--Filtros -->
            @if ($tipo == 'personalizada')
                <div class="bg-gray-100 p-3">
                    <h6 class="leading-tight uppercase text-base font-bold text-black mb-4">Filtros del reporte</h6>

                    @if (count($atributosM) > 0)
                        <div class="grid grid-cols-1 gap-4">
                            <div class="form-group mb-6  grid grid-cols-1 md:grid-cols-3">
                                <label for="exampleInputEmail2"
                                    class="col-span-1 md:col-span-3 form-label inline-block mb-2 text-gray-700">Seleccione
                                    los atributos:</label>
                                @foreach ($atributosM as $key => $atributo)
                                    <label class="w-72 uppercase font-normal text-sm">
                                        <input wire:model='atributos' id="atributos" type="checkbox"
                                            value="{{ $atributo }}" name="atributos[]">
                                        {{ $IU[$key] }}
                                    </label>
                                @endforeach
                                <x-jet-input-error for="atributos" />
                            </div>
                        </div>
                    @endif

                    <div class="grid grid-cols-3 gap-4">
                        <div class="col-span-1  mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Selecciona el
                                atributo de busqueda:</label>
                            <select wire:model='datos.atributo' name='filtro'
                                class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona una modelo de reporte</option>
                                @foreach ($atributos as $key => $atributo)
                                    <option value="{{ $atributo }}">{{ $IU[$key] }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="filtro" />
                        </div>
                        <div class="col-span-2 mb-6 ">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Escriba
                                lo que desea buscar:</label>
                            <input type="text" wire:model.defer="datos.buscar" name='buscar'
                                class="form-control block  w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300  rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="Escriba lo que desea buscar...">
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-4">
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2"
                                class="form-label inline-block mb-2 text-gray-700">Ordenar:</label>
                            <select wire:model='datos.order' name='order'
                                class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona un orden</option>
                                <option value="asc">Ascendente</option>
                                <option value="desc">Descendente</option>
                            </select>
                            <x-jet-input-error for="order" />
                        </div>
                        <div class="form-group mb-6">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Ordenar
                                por:</label>
                            <select wire:model='datos.orderBy' name='orderBy'
                                class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona un atributo</option>
                                @foreach ($atributos as $key => $atributo)
                                    <option value="{{ $atributo }}"> {{ $IU[$key] }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="orderBy" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2" class="form-label inline-block mb-2 text-gray-700">Cantidad
                                de registros:</label>
                            <select wire:model='datos.cantidad' name='cantidad'
                                class="form-select appearance-none h-9 block w-full px-2 py-1 text-sm    font-normal    text-gray-700    bg-white bg-clip-padding bg-no-repeat    border border-solid border-gray-300    rounded    transition    ease-in-out    m-0    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                aria-label=".form-select-sm example">
                                <option selected value="">Selecciona una cantidad</option>
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="1000">1000</option>
                                <option value="all">Todo</option>
                            </select>
                            <x-jet-input-error for="cantidad" />
                        </div>
                    </div>
                </div>
            @endif


            <div
                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-start p-4 border-t border-gray-200 rounded-b-md">
                <button type="button" wire:click="limpiar" wire:loading.attr="disabled"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Limpiar</button>
                <button type="submit"
                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                    Descargar</button>

            </div>
        </form>


    </div>
</div>
