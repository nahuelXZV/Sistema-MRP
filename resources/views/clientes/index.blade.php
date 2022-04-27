@extends('layouts.plantilla')

@section('title')
    Clientes
@endsection
@section('action')
@endsection

@section('content')
@foreach ($clientes as $cliente)
<h1>{{$cliente->nombre}}</h1>
@endforeach

@endsection