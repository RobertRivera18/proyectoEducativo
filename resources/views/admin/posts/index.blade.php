@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<a class="btn btn-primary float-right" href="{{route('admin.posts.create')}}">Crear Nuevo Post</a>
<h1>Listado de Posts</h1>
@stop

@section('content')

@if(session('danger'))
<div class="alert alert-danger">
    <strong>{{session('danger')}}</strong>
</div>
@endif
@livewire('admin.posts-index')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop