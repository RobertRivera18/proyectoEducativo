<div class="mb-4">
    {!! Form::label('name', 'Nombre del Post', ['class' => 'font-bold']) !!}
    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1
    rounded-lg'.($errors->has('name')?'
    border-red-600':'')]) !!}
    @error('name')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>


<div class="mb-4">
    {!! Form::label('slug', 'Slug del Post', ['class' => 'font-bold']) !!}
    {!! Form::text('slug', null, ['readonly'=>'readonly','class' => 'form-input block w-full mt-1
    rounded-lg'.($errors->has('slug')?' border-red-600':'')]) !!}
    @error('slug')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('extract', 'Extracto del Post', ['class' => 'font-bold']) !!}
    {!! Form::textarea('extract', null, ['class' => 'form-input block w-full mt-1
    rounded-lg'.($errors->has('extract')?' border-red-600':'')]) !!}
    @error('extract')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('body', 'Cuerpo del Post', ['class' => 'font-bold']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-input block w-full mt-1
    rounded-lg'.($errors->has('body')?' border-red-600':'')]) !!}
    @error('body')
    <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-2 gap-4 mb-2">
    <div>
        {!! Form::label('category_id', 'Categoria:', ['class' => 'font-bold']) !!}
        {!! Form::select('category_id', $categories, null, [
        'class' => 'form-input block w-full mt-1
        rounded-lg',
        ]) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Niveles:', ['class' => 'font-bold']) !!}
        {!! Form::select('level_id', $levels, null, [
        'class' => 'form-input block w-full mt-1
        rounded-lg',
        ]) !!}
    </div>
   
</div>

<div class="grid grid-cols-2 gap-4 mb-2">
<div class="form group">
    <p class="font-bold">Etiquetas</p>
    @foreach ($tags as $tag)
    <label class="mr-2">
        {!! Form::checkbox('tags[]', $tag->id, null, ['class' => 'rounded-full']) !!}
        {{$tag->name}}
    </label>
    @endforeach 
  @error('tags')
<strong class="text-xs text-red-600">{{$message}}</strong>
@enderror
</div>


<div class="form-group">
    <p class="font-bold">Tipo de Publicacion</p>
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
</div>





<h1 class="mt-8 mb-2 text-lg font-bold">Imagen del Post</h1>
<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($post->image)
        <img id="picture" class="w-full h-64 object-cover object-center"
            src="{{ Storage::url($post->image->url) }}" alt="">
        @else
        <img id="picture" class="w-full h-64 object-cover object-center rounded-lg"
            src="https://images.pexels.com/photos/6517091/pexels-photo-6517091.jpeg?auto=compress&cs=tinysrgb&w=600"
            alt="">
        @endisset
    </figure>
    <div>
        <p class="mb-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum
            consequatur
            neque enim ex illo sint atque</p>
        {!! Form::file('file', ['class' => 'form-input w-full rounded-lg'.($errors->has('file')?'
        border-red-600':''),'id'=>'file','accept'=>'image/*']) !!}
        @error('file')
        <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
    <div>
        
    </div>
</div>