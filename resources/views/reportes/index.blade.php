@extends('layouts.plantilla')

@section('title')
    Reportes
@endsection

@section('action')
    <a href="{{ route('reporte.index') }}" class="hover:underline ">Reportes</a>
@endsection

@section('content')
    @livewire('reporte.lw-create')
@endsection
