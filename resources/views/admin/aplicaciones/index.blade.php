@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<a class="btn btn-primary float-right" href="{{route('admin.apps.create')}}">Crear Nueva App</a>
    <h1>Listado de Aplicaciones Digitales</h1>
@stop

@section('content')
    @livewire('admin.app-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop