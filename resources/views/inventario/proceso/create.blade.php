@extends('layouts.plantilla')

@section('title')
    Nuevo Proceso de producto
@endsection

@section('action')
    <a href="{{ route('productos.show', $id) }}" class="hover:underline ">Producto</a>
@endsection

@section('content')
    @livewire('inventario.procesos.lw-create', ['id' => $id])
@endsection
