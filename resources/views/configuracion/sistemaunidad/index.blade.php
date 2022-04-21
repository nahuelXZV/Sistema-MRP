@extends('layouts.plantilla')

@section('title')
    Unidad
@endsection
@section('action')
    <a href="/sistema-unidad" class="hover:underline ">Unidades</a>
@endsection

@section('content')
    @livewire('configuracion.sistema-unidad.index')
@endsection
