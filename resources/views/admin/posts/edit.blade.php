@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Post</h1>
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
        {!! Form::model($post,['route'=>['admin.posts.update',$post],'autocomplete'=>'off','files'=>true, 'method'=>'put']) !!}
        

        @include('admin.posts.partials.form')
          
        {!! Form::submit('Actualizar Post', ['class'=>'btn btn-success']) !!}
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