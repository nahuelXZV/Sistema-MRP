<div class="m-1">

    <x-header-table>
        <div class="flex flex-wrap container-fluid">
            <div class="m-1">
                <select wire:model='pagination'
                    class="w-32 px-3 py-1.5 text-base font-normal text-gray-700  bg-white  border border-solid border-gray-300 focus:border-blue-600">
                    <option selected value="10">Paginar</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="flex flex-row m-1">
                <input type="text" wire:model.defer='attribute'
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                                border border-solid border-gray-300 rounded transition ease-in-out m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                    id="exampleFormControlInput1" placeholder="Search.." />
                <button type="button" wire:click='render'
                    class="w-12 inline-block px-3 py-1.5 border-2 border-gray-700 text-black font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <button
                    class="w-12 inline-block px-3 py-1.5 border-2 border-gray-700 text-black font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                    type="button" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down"
                        class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                        </path>
                    </svg>
                </button>
                <ul class="absolute z-50 hidden float-left py-2 m-0 mt-1 text-base text-left list-none bg-white border-none rounded-lg shadow-lg dropdown-menu min-w-max bg-clip-padding"
                    aria-labelledby="dropdownMenuButton1">
                    <li>
                        <div class="ml-2 mr-6 form-check">
                            <input value='name' wire:model.defer="type"
                                class="w-4 h-4 mt-1 mr-2 align-top bg-white border border-gray-300 rounded-full appearance-none form-check-input checked:bg-blue-600 checked:border-blue-600"
                                type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="inline-block text-gray-800 form-check-label" for="flexRadioDefault1">
                                Nombre
                            </label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="flex container-fluid">
            <div class="flex flex-row m-1 text-right">
                <a type="button" href="{{ route('materia-prima.create') }}"
                    class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Nuevo
                </a>
                <button
                    class="w-12 inline-block px-3 py-1.5 border-2 border-gray-700 text-black font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                    type="button" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down"
                        class="w-4 h-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                    </svg>
                </button>
                <ul class="absolute z-50 hidden float-left py-2 m-0 mt-1 text-base text-left list-none bg-white border-none rounded-lg shadow-lg dropdown-menu min-w-max bg-clip-padding "
                    aria-labelledby="dropdownMenuButton1">
                    <h6
                        class="block w-full px-4 py-2 text-sm font-semibold text-gray-500 bg-transparent whitespace-nowrap ">
                        ORDENAR POR
                    </h6>
                    <li>
                        <p class="flex w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent dropdown-item whitespace-nowrap hover:bg-gray-100 "
                            wire:click="order('nombre')">
                            Nombre
                            <x-signo-table :type='$type' :direction='$direction' etiqueta='nombre'> </x-signo-table>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </x-header-table>

    <x-table>
        <table class="h-full min-w-full">
            @if ($materias->count())
                <thead class="bg-gray-800 border-b ">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                            Nombre
                            <x-signo-table :type='$type' :direction='$direction' etiqueta='nombre'> </x-signo-table>
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                            Tipo
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                            Tamaño
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                            Peso
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                            Color
                        </th>
                        </th>
                        <th scope="col" class="px-6 py-4 text-sm font-bold text-white">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($materias as $materia)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $materia->nombre }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $materia->tipo }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ substr($materia->tamaño, 0, 50) }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $materia->peso }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                {{ $materia->color }}
                            </td>
                            <td class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                <div class="flex items-center justify-center">
                                    <div class="inline-flex" role="group">
                                        <a href="{{ route('materia-prima.edit', $materia->id) }}"
                                            class="m-1 inline-block px-4 py-1.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                            <x-edit> </x-edit>
                                        </a>

                                        <button type="button" wire:click='delete({{ $materia->id }})'
                                            class="m-1 inline-block px-4 py-1.5 bg-red-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                            <x-delete> </x-delete>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            @else
                <span>No hay resultados...</span>
            @endif
        </table>
        <x-pagination :modelo='$materias'> </x-pagination>
    </x-table>
</div>
