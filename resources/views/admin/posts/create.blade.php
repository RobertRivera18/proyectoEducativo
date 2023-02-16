@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<h4>Crear Nuevo Post</h4>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.posts.store','autocomplete'=>'off','files'=>true]) !!}
       
        @include('admin.posts.partials.form')

        {!! Form::submit('Crear Post', ['class'=>'btn btn-info']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')

<style>
    .image-wrapper {
        position: relative;
        padding-bottom: 52.25%;

    }

    .image-wrapper img {
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>

@endsection





@section('js')
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur'
            , getPut: '#slug'
            , space: '-'
        });
    })
    ClassicEditor
        .create(document.querySelector('#extract'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });

        $(document).ready(function(){

$('#file').change(function(e){

  let file= e.target.files[0];

  let reader= new FileReader();

  reader.onload= (event) => {

   $('#picture').attr('src', event.target.result)

  };

  reader.readAsDataURL(file);

})

});
</script>
@endsection