@extends('layouts.plantilla')

@section('title')
    Manufactura Reporte
@endsection

@section('content')
    @livewire('produccion.manufactura.lw-reporte-create', ['id' => $id, 'idM' => $idM])
@endsection
