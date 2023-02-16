@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<h1>Editar Categoria</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong  class="text-sm">{{session('info')}}</strong> 
</div>

@endif
<div class=" card ">
    <div class="card-body">
        {!! Form::model($category,['route' => ['admin.categories.update', $category],'method'=>'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null,['class'=>'form-control','placeholder'=>'Ingresa el nombre de la categoria'])
            !!}
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('slug', 'slug') !!}
            {!! Form::text('slug', null,['class'=>'form-control','placeholder'=>'Ingresa el slug de la
            categoria','readonly']) !!}
            @error('slug')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        {!! Form::submit('Actualizar Categoria',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
@section('css')
@endsection

@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"> </script>
<script>
    $(document).ready( function() {
  $("#name").stringToSlug({
    setEvents: 'keyup keydown blur',
    getPut: '#slug',
    space: '-'
  });
})
</script>
@endsection