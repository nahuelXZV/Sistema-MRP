@extends('layouts.plantilla')

@section('title')
    Cliente
@endsection

@section('action')
    <a href="{{ route('clientes.index') }}" class="hover:underline ">Clientes</a>
@endsection

@section('content')
    @livewire('cliente.lw-index')
@endsection