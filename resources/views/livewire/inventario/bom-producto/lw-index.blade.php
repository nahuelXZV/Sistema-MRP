<div class="m-1">
    <x-header-table>
        <div class="container-fluid flex flex-wrap">
            <div class="m-1">
                <select wire:model='pagination'
                    class="w-32 px-3 py-1.5 text-base font-normal text-gray-700  bg-white  border border-solid border-gray-300 focus:border-blue-600">
                    <option selected value="10">Paginar</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="m-1 flex flex-row">
                <input type="text" wire:model.defer='attribute'
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                            border border-solid border-gray-300 rounded transition ease-in-out m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none "
                    id="exampleFormControlInput1" placeholder="Search.." />
                <button type="button" wire:click='render()'
                    class="w-12 inline-block px-3 py-1.5 border-2 border-gray-700 text-black font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-auto" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <button
                    class="w-12 inline-block px-3 py-1.5 border-2 border-gray-700 text-black font-medium text-xs leading-normal uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                    type="button" id="dropdownMenuButton9" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down"
                        class="h-4 w-4 mx-auto" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path fill="currentColor"
                            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                        </path>
                    </svg>
                </button>
                <ul class=" dropdown-menu
                        min-w-max absolute bg-white text-base z-50 float-left py-2 list-none text-left
                        rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
                    aria-labelledby="dropdownMenuButton1">
                    <li>
                        <div class="form-check ml-2 mr-6">
                            <input wire:model.defer='type' value='nombre'
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600  mt-1 align-top  mr-2"
                                type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                Nombre
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check ml-2">
                            <input wire:model.defer='type' value='codigo'
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600  mt-1 align-top  mr-2"
                                type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                Codigo
                            </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check ml-2">
                            <input wire:model.defer='type' value='tipo'
                                class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600  mt-1 align-top  mr-2"
                                type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                                Tipo
                            </label>
                        </div>
                    </li>
            </div>
        </div>
        <div class="container-fluid flex">
            <div class="m-1 flex flex-row text-right">
                <a type="button" href="{{ route('bom.create', $producto->id) }}"
                    class="mr-2 inline-block px-6 py-2.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Nuevo
                </a>
            </div>
        </div>
    </x-header-table>

    <x-table>
        <table class="min-w-full">
            @if ($boms->count())
                <thead class="border-b bg-gray-800 ">
                    <tr>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Codigo
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Nombre
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Tipo
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Tama??o
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Color
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Cantidad
                        </th>
                        <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($boms as $bom)
                        <tr class="bg-white border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $bom->id }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $bom->materia_prima->nombre }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $bom->materia_prima->tipo }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ substr($bom->materia_prima->tama??o, 0, 50) }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $bom->materia_prima->color }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $bom->cantidad }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <div class="inline-flex" role="group">
                                    <a href="{{ route('bom.edit', [$producto->id, $bom->id]) }}"
                                        class="m-1 inline-block px-4 py-1.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        <x-edit> </x-edit>
                                    </a>
                                    <button type="button" wire:click='delete({{ $bom->id }} )'
                                        class="m-1 inline-block px-4 py-1.5 bg-red-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out">
                                        <x-delete> </x-delete>
                                    </button>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <span>No hay resultados...</span>
            @endif
        </table>
        <x-pagination :modelo='$boms'> </x-pagination>
    </x-table>
</div>
