@extends('layouts.plantilla')

@section('title')
    Categoria
@endsection
@section('action')
    <a href="/" class="hover:underline ">Home</a>
@endsection

@section('content')
 @livewire('configuracion.categoria-prima.lw-categoria-prima-index')
@endsection