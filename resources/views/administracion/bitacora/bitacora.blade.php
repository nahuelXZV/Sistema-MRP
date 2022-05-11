@extends('layouts.plantilla')

@section('title')
    Bitacora
@endsection

@section('action')
    <a href="{{ route('bitacora.index') }}" class="hover:underline ">Bitacora</a>
@endsection

@section('content')
    @livewire('administracion.bitacora.lw-index')
@endsection
