@extends('adminlte::page')

@section('title', 'CoursePlatForm')

@section('content_header')
    <h1>Observaciones del Post:<strong>{{$post->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route'=>['admin.posts.reject',$post]]) !!}
            <div class="form-group">
            {!! Form::label('body', "Observaciones del Post") !!}
            {!! Form::textarea('body',null ) !!}

            @error('body')
                <strong class="text-danger text-xs">{{$message}}</strong>
            @enderror
        </div>
        {!! Form::submit("Rechazar Post", ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
       
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@stop