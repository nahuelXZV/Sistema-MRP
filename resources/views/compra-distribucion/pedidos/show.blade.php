@extends('layouts.plantilla')

@section('title')
    Pedidos
@endsection

@section('action')
    <a href="{{ route('pedidos.index') }}" class="hover:underline ">Pedidos</a>
@endsection

@section('content')
    <ul class="nav nav-pills flex flex-col md:flex-row flex-wrap list-none pl-0 mb-4 mt-4" id="pills-tab3" role="tablist">
        <li class="nav-item" role="presentation">
            <button type="button"
                class="nav-link block font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 active"
                id="pills-home-tab3" data-bs-toggle="pill" data-bs-target="#pills-home3" role="tab"
                aria-controls="pills-home3" aria-selected="true">
                Detalles
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button"
                class="nav-link block @if ($mps == null) disabled @endif font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 "
                id="pills-profile-tab3" data-bs-toggle="pill" data-bs-target="#pills-profile3" role="tab"
                aria-controls="pills-profile3" aria-selected="false">
                Detalles MPS
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button"
                class="nav-link block  @if ($rep == null) disabled @endif font-medium text-xs leading-tight uppercase rounded px-6 py-3 my-2 md:mr-2 focus:outline-none focus:ring-0 "
                id="pills-contact-tab3" data-bs-toggle="pill" data-bs-target="#pills-contact3" role="tab"
                aria-controls="pills-contact4" aria-selected="false">
                Reportes
            </button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent3">
        <div class="tab-pane fade show active" id="pills-home3" role="tabpanel" aria-labelledby="pills-home-tab3">
            @livewire('compra-distribucion.pedidos.lw-show', ['id' => $id])
        </div>
        <div class="tab-pane fade" id="pills-profile3" role="tabpanel" aria-labelledby="pills-profile-tab3">
            @livewire('compra-distribucion.mps.lw-show', ['id' => $id])
        </div>
        <div class="tab-pane fade" id="pills-contact4" role="tabpanel" aria-labelledby="pills-contact-tab3">
            @livewire('compra-distribucion.mps.lw-report', ['id' => $id])
        </div>
    </div>
@endsection
