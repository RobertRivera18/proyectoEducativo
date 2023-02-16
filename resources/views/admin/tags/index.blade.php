@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
@can('admin.tags.create')
<a class="btn btn-secondary float-right" href="{{route('admin.tags.create')}}">Nueva Etiqueta</a>
@endcan
<h4>Listado de Etiquetas</h4>
@stop

@section('content')

@if(session('delete'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong  class="text-sm">{{session('delete')}}</strong> 
</div>
@endif
<div class="card shadow p-3 mb-5 bg-white rounded">
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
                @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td width=10px>
                        @can('admin.tags.edit')
                        <a class="btn btn-outline-info btn-sm rounded-pill" href="{{route('admin.tags.edit', $tag)}}">Editar</a>
                        @endcan

                        
                    </td>
                    <td width=10px>
                        @can('admin.tags.destroy')

                        <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger btn-sm rounded-pill" type="submit">Eliminar</button>
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