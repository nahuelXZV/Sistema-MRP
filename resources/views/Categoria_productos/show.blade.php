@extends('layouts.plantilla')

@section('title')
    Productos-Editar
@endsection

@section('action')
    <a href="{{ route('categoria_productos.index') }}" class="hover:underline ">Categorias de productos</a>
@endsection

@section('content')
    @livewire('categoria-producto.lw-show',['id'=>$id])
@endsection
