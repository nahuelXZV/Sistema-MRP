@extends('layouts.plantilla')

@section('title')
    Dada Baja
@endsection

@section('action')
    <a href="{{ route('dada-baja.index') }}" class="hover:underline ">Dada de Baja</a>
@endsection

@section('content')
    @livewire('inventario.dada-baja.lw-index')
@endsection
