@extends('layouts.plantilla')

@section('title')
    Productos
@endsection

@section('action')
    <a href="{{ route('productos.index') }}" class="hover:underline ">Productos</a>
@endsection

@section('content')
    @livewire('inventario.producto.lw-edit',['id'=>$id])
@endsection
