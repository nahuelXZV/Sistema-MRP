 @extends('layouts.plantilla')

@section('title')
    Proveedor
@endsection

@section('action')
    <a href="{{route('proveedor.index')}}" class="hover:underline ">Proveedor</a>
@endsection

@section('content')
 @livewire('compra-distribucion.proveedor.lw-create')
@endsection

