@extends('layouts.plantilla')

@section('title')
    Empresas
@endsection

@section('action')
    <a href="{{ route('empresas.index') }}" class="hover:underline ">Empresas</a>
@endsection

@section('content')
    @livewire('configuracion.empresa.lw-create')
@endsection
