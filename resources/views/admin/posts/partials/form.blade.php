<div class="form-group">
    {!! Form::label('name','Nombre:') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingre el titulo del Post a publicar'])
    !!}
    @error('name')
    <span class="invalid-feedback d-block text-danger">{{$message}}</span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('slug','Slug:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'Slug del Post a publicar','readonly'])
    !!}

    @error('slug')
    <span class="invalid-feedback d-block text-danger">{{$message}}</span>
    @enderror
</div>

<div class="row">
    <div class="col-6">
        {!! Form::label('category_id','Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}

        @error('category_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-6">
        {!! Form::label('level_id','Nivel Educativo:') !!}
        {!! Form::select('level_id', $levels, null, ['class'=>'form-control']) !!}

        @error('level_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
<br>

<div class="form group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
    <label class="mr-2">
        {!! Form::checkbox('tags[]', $tag->id, null ) !!}
        {{$tag->name}}
    </label>
    @endforeach

    @error('tags')
    <br>
    <span class="invalid-feedback d-block text-danger">{{$message}}</span>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Status del Post</p>
    <label class="mr-2 text-secondary">
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>

    <label class="text-secondary">
        {!! Form::radio('status', 2) !!}
        Revision
    </label>

    <label class="text-secondary">
        {!! Form::radio('status', 3) !!}
        Publicado
    </label>

    @error('status')
    <br>
    <span class="invalid-feedback d-block text-danger">{{$message}}</span>
    @enderror
</div>


<div class="form-group">
    <p class="font-weight-bold">Tipo de Publicacion</p>
    <label class="mr-2 text-secondary">
        {!! Form::radio('tipo_recurso_id', 1, true) !!}
        Post Educativo
    </label>

    <label class="text-secondary">
        {!! Form::radio('tipo_recurso_id', 2) !!}
        App Educativa
    </label>

    @error('status')
    <br>
    <span class="invalid-feedback d-block text-danger">{{$message}}</span>
    @enderror
</div>

<div class="row">
    <div class="col mb-3">
        <div class="image-wrapper">
            @isset($post->image)
            <img id="picture" src="{{Storage::url($post->image->url)}}" alt="">
            @else
            <img id="picture" src="{{asset('img/home/apps.jpg')}}"
                alt="">
            @endisset
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen del Post') !!}
            {!! Form::file('file', ['class'=>"form-control-file rounded-lg",'accept'=>'image/*']) !!}
        </div>
        @error('file')
        <span class="text-danger">{{$message}}</span>
        @enderror
        <p>Ingresa una imagen para este Post</p>
    </div>
</div>



<div class="form-group">
    {!! Form::label('extract','Extracto del Post:') !!}
    {!! Form::textarea('extract', null, ['class'=>'form-control']) !!}
    @error('extract')
    <span class="invalid-feedback d-block text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body','Cuerpo del Post:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}

    @error('body')
    <span class="invalid-feedback d-block text-danger">{{$message}}</span>
    @enderror
</div>