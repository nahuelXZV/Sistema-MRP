<div>
    <x-header-multi>
        <h6 class="font-medium leading-tight text-base"></h6>
        <a href="{{ route('reporte.rp') }}"
            class="m-1 inline-block px-4 py-1.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
        </a>
    </x-header-multi>

    <x-table>
        <table class="min-w-full">
            <thead class="border-b bg-gray-800 ">
                <tr>
                    <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                        Tipo de problema
                    </th>
                    <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                        Fecha
                    </th>
                    <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                        Descripcion
                    </th>
                    <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                        Estado
                    </th>
                    <th scope="col" class="text-sm font-bold text-white px-6 py-4">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportes as $reporte)
                    <tr class="bg-white border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $reporte->tipo_problema }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ substr($reporte->fecha, 0, 10) }}</td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ substr($reporte->descripcion, 0, 30) }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $reporte->estado }}</td>

                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center justify-center">
                                <div class="inline-flex" role="group">

                                    <a href="{{ route('manufactura.details', $reporte->id) }}"
                                        class="m-1 inline-block px-4 py-1.5 bg-blue-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-table>
</div>
