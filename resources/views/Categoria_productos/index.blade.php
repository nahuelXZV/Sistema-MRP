@extends('layouts.plantilla')

@section('title')
    Productos
@endsection

@section('action')
    <a href="{{ route('Categoria_producto.index') }}" class="hover:underline ">Categoria Productos</a>
@endsection

@section('content')
    @livewire('inventario.categoria_producto.lw-index')
@endsection
