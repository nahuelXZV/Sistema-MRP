@extends('layouts.plantilla')

@section('title')
    Inicio
@endsection
@section('action')
    <a href="/" class="hover:underline ">Dashboard</a>
@endsection

@section('content')
    <a href="{{ route('reporte.index') }}"> Descargar PDF</a> <br>
    <a href="{{ route('reporte.excel') }}"> Descargar Excel</a>
@endsection
