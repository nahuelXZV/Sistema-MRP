@extends('layouts.plantilla')

@section('title')
    Roles
@endsection

@section('action')
    <a href="{{route('roles.index')}}" class="hover:underline ">Roles</a>
@endsection

@section('content')
    @livewire('administracion.rol.lw-index')
@endsection