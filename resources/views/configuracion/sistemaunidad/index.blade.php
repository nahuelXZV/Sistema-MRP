@extends('layouts.plantilla')

@section('title')
    Unidad
@endsection
@section('action')
    <a href="/" class="hover:underline ">Home</a>
@endsection

@section('content')
 @livewire('configuracion.sistema-unidad.index')
@endsection


