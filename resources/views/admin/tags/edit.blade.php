@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<h1>Editar Etiquetas</h1>
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

<div class="card">
    <div class="card-body">
     {!! Form::model($tag, ['route'=>['admin.tags.update',$tag], 'method'=>'put']) !!}
     @include('admin.tags.partial.form')
     {!! Form::submit('Actualizar Etiqueta', ['class'=>'btn btn-success']) !!}
     {!! Form::close() !!}
    </div>
</div>
@stop
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