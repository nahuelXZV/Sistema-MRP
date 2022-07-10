@extends('layouts.plantilla')

@section('title')
    Detalles Reportes
@endsection

@section('action')
    <a href="{{ route('pedidos.details', $dp) }}" class="hover:underline ">Detalle reporte</a>
@endsection

@section('content')
    @livewire('produccion.manufactura.lw-reporte-show', ['id' => $id])
@endsection
