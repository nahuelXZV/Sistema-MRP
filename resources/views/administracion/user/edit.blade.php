@extends('layouts.plantilla')

@section('title')
    Usuarios
@endsection

@section('action')
    <a href="{{route('usuarios.index')}}" class="hover:underline ">Usuarios</a>
@endsection

@section('content')
    @livewire('administracion.user.lw-edit',["id"=>$id])
@endsection