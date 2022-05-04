@extends('layouts.plantilla')

@section('title')
    Unidad
@endsection

@section('action')
    <a href="{{route('sistema-unidad.index')}}" class="hover:underline ">Unidades</a>
@endsection

@section('content')
 @livewire('configuracion.sistema-unidad.lw-sistema-unidad-index')
@endsection
