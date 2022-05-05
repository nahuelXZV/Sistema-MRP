@extends('layouts.plantilla')

@section('title')
    Productos-crear
@endsection

@section('action')
    <a href="{{ route('categoria_productos.index') }}" class="hover:underline ">Categorias de productos</a>
@endsection

@section('content')
    @livewire('categoria-producto.lw-create')
@endsection
