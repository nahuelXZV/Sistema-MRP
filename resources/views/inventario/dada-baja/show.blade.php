@extends('layouts.plantilla')

@section('title')
    Pedidos
@endsection

@section('action')
    <a href="{{ route('dada-baja.index') }}" class="hover:underline ">Dada de baja</a>
@endsection

@section('content')
    <div class="tab-content" id="pills-tabContent3">
        <div class="tab-pane fade show active" id="pills-home3" role="tabpanel" aria-labelledby="pills-home-tab3">
            @livewire('inventario.dada-baja.lw-show', ['id' => $id])
        </div>
    </div>
@endsection
