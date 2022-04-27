@extends('layouts.plantilla')

@section('title')
    Materia Prima
@endsection

@section('action')
    <a href="{{route('materia-prima.index')}}" class="hover:underline ">Materia Prima</a>
@endsection

@section('content')
    @livewire('inventario.materia-prima.lw-materia-prima-create')
@endsection