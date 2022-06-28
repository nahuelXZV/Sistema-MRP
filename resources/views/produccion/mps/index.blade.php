@extends('layouts.plantilla')

@section('title')
    MPS
@endsection

@section('action')
    <a href="{{ route('mps.index') }}" class="hover:underline ">MPS</a>
@endsection

@section('content')
    @livewire('compra-distribucion.mps.lw-index')
@endsection
