@extends('layouts.plantilla')

@section('title')
    Categoria
@endsection

@section('action')
    <a href="{{route('categoria-prima.index')}}" class="hover:underline ">Categoria</a>
@endsection

@section('content')
    @livewire('configuracion.categoria-prima.lw-categoria-prima-edit',["id"=>$id])
@endsection