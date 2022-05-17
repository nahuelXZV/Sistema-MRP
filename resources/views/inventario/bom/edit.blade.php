@extends('layouts.plantilla')

@section('title')
    Nuevo BOM
@endsection

@section('action')
    <a href="{{ route('productos.show', $producto->id) }}" class="hover:underline ">Producto</a>
@endsection

@section('content')
    @livewire('inventario.bom-producto.lw-edit', ['id' => $producto->id, 'idbom' => $bom->id])
@endsection
