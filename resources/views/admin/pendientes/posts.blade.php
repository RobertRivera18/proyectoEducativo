@extends('adminlte::page')

@section('title', 'CoursePlatForm')

@section('content_header')
<h1> Posts Pendientes de Aprobación</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{session('info')}}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{session('error')}}
  </div>
@endif
<div class="card">
  <div class="card-body">
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Autor</th>
                  <th>Categoria</th>
                  <th></th>
              </tr>
          </thead>

          <tbody>
              @foreach ($posts as $post)
                  <tr>
                      <td>{{$post->id}}</td>
                      <td>{{$post->name}}</td>
                      <td><i class="fa fa-user"></i> {{$post->user->name}}</td>
                      <td>{{$post->category->name}}</td>
                      <td>
                          <a href="{{route('admin.posts.show',$post)}}" class="btn btn-primary" href="">Revisar</a>
                      </td>
                      <td></td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>
  <div class="card-footer">
      {{$posts->links('vendor.pagination.bootstrap-4')}}
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop