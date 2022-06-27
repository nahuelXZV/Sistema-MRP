@extends('layouts.plantilla')

@section('title')
    Procesos
@endsection

@section('action')
    <a href="{{ route('procesos.index') }}" class="hover:underline ">Procesos de producción</a>
@endsection

@section('content')
    @livewire('produccion.procesos.lw-procesos-index')
@endsection
