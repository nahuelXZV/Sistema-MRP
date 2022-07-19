@extends('layouts.plantilla')

@section('title')
    Categoria
@endsection

@section('action')
    <a href="{{ route('categoria_productos.index') }}" class="hover:underline ">Categoria Productos</a>
@endsection

@section('content')
    @livewire('categoria-producto.lw-index')
@endsection
