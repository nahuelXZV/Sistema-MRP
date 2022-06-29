@extends('layouts.plantilla')

@section('title')
    Nota compra
@endsection

@section('action')
    <a href="{{route('nota-compra.index')}}" class="hover:underline ">Nota compra</a>
@endsection

@section('content')
 @livewire('compra-distribucion.nota-compra.lw-add',["id"=>$id])
@endsection