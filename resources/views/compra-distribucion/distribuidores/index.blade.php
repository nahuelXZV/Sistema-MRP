@extends('layouts.plantilla')

@section('title')
    Distribuidores
@endsection

@section('action')
    <a href="{{ route('distribuidores.index') }}" class="hover:underline ">Distribuidores</a>
@endsection

@section('content')
    @livewire('compra-distribucion.distribuidor.lw-index')
@endsection
