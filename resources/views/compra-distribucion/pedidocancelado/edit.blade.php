@extends('layouts.plantilla')

@section('title')
    Pedido Cancelado
@endsection

@section('action')
    <a href="{{route('pedido-cancelado.index')}}" class="hover:underline ">Pedido Cancelado</a>
@endsection

@section('content')
 @livewire('compra-distribucion.pedido-cancelado.lw-edit',["id"=>$id])
@endsection