@extends('layouts.plantilla')

@section('title')
    Pedidos
@endsection

@section('action')
    <a href="{{ route('pedidos.index') }}" class="hover:underline ">Pedidos</a>
@endsection

@section('content')
    @livewire('compra-distribucion.pedidos.lw-create')
@endsection
