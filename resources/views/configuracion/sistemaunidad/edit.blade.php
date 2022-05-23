@extends('layouts.plantilla')

@section('title')
    Unidad
@endsection
@section('action')
    <a href="{{route('sistema-unidad.index')}}" class="hover:underline ">unidad</a>
@endsection

@section('content')
    @livewire('configuracion.sistema-unidad.lw-edit',["id"=>$id])
@endsection