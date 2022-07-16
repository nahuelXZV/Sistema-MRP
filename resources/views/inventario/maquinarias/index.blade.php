@extends('layouts.plantilla')

@section('title')
    Maquinarias
@endsection

@section('action')
    <a href="{{ route('maquinarias.index') }}" class="hover:underline ">Maquinarias</a>
@endsection

@section('content')
    @livewire('inventario.maquinaria.lw-index')
@endsection
