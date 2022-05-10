@extends('layouts.plantilla')

@section('title')
    Productos
@endsection

@section('action')
    <a href="{{ route('clientes.index') }}" class="hover:underline ">Cliente</a>
@endsection

@section('content')
@livewire('cliente.lw-create')
@endsection
