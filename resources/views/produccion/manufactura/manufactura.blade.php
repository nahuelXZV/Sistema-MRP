@extends('layouts.plantilla')

@section('title')
    Manufactura
@endsection

@section('action')
    <a href="{{ route('pedidos.details', $detalleP->detallePedido->pedido_id) }}" class="hover:underline ">Detalle MPS</a>
@endsection

@section('content')
    @livewire('produccion.manufactura.lw-manufactura-show', ['id' => $id, 'idP' => $idP])
@endsection
