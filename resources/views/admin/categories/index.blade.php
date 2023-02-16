@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
@can('admin.categories.create')
<a class="btn btn-secondary float-right rounded-pill" href="{{route('admin.categories.create')}}">Agregar Categoria</a>
@endcan
<h1>Lista de Categorias</h1>
@stop

@section('content')

@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong  class="text-sm">{{session('info')}}</strong> 
</div>
@elseif(session('danger'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong  class="text-sm">{{session('danger')}}</strong> 
</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td width="10px">
                        @can('admin.categories.edit')
                        <a class="btn btn-outline-primary btn-sm rounded-pill"
                        href="{{route('admin.categories.edit',$category)}}">Editar</a>
                        @endcan
                    </td>
                    <td width="10px">

                        @can('admin.categories.destroy')
                        <form action="{{route('admin.categories.destroy',$category)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">Eliminar</button>
                        </form>
                        @endcan
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop