@extends('layouts.plantilla')

@section('title')
    Empresa
@endsection

@section('action')
    <a href="{{ route('empresas.index') }}" class="hover:underline ">Empresa</a>
@endsection

@section('content')
    @livewire('configuracion.empresa.lw-edit',['id'=>$id])
@endsection
