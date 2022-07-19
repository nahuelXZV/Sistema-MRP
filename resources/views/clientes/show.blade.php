@extends('layouts.plantilla')

@section('title')
    Cliente
@endsection

@section('action')
    <a href="{{ route('clientes.index') }}" class="hover:underline ">Cliente</a>
@endsection

@section('content')
@livewire('cliente.lw-show',['id'=>$id])
@endsection
