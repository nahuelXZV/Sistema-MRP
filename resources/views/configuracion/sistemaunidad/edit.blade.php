@extends('layouts.plantilla')

@section('title')
    Categoria
@endsection
@section('action')
    <a href="/sistema-unidad" class="hover:underline ">Unidades</a>
@endsection

@section('content')
    @livewire('configuracion.categoria-prima.lw-categoria-prima-edit',["id"=>$id])
@endsection