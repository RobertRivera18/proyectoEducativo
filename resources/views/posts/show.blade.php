<x-app-layout>
    <div class="max-w-7xl mx-auto px-2 sm:px-12 lg:px-8 py-8 p-4">

        <h1 class="text-2xl font-bold text-gray-600">{{$post->name}}</h1>
        <div class="mb-2">
            @foreach($post->tags as $tag )
            <a href="{{route('posts.tag',$tag)}}">
                <span
                    class="bg-indigo-100 text-indigo-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">
                    {{$tag->name}}
                </span>
            </a>
            @endforeach
        </div>
        

        <ul class="flex items-center text-sm mb-3 ">
            <p class="ml-2 mr-2 font-bold text-base">Calificacion del Recursos Educativo:
                <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$post->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
            <p class="text-2xl font-bold"></p><a class="hover:underline text-indigo-600 mr-2" href="">({{$post->rating}}
                calificaciones)</a>
        </ul>

        <div class="text-base text-gray-500 mb-2 text-justify">
            {!!$post->extract!!}

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido Principal --}}
            <div class="lg:col-span-2">
                <figure class="bg-yellow-400 rounded-lg overflow-hidden">
                    @if($post->image)
                    <img class="aspect-[16/9] w-full object-cover object-center"
                        src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                    <img class="aspect-[16/9] w-full object-cover object-center"
                        src="{{asset('img/home/imagenDefault.jpeg')}}" alt="">
                    @endif
                </figure>

                @if($post->resource)
                @livewire('download-resources')
                @endif
                <div class="bg-white shadow-lg mb-8 rounded-lg card-body px-6 py-4 mt-2">
                    <h1 class="font-bold text-xl mb-2">¿Cuando usar este recurso?</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse($post->goals as $goal)
                        <li class=" flex text-gray-900 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                                </path>
                            </svg>
                            {{$goal->name}}
                        </li>
                        @empty
                        <li class="flex text-gray-900 text-base"><i class="fa fa-times text-xl mr-2 text-red-500"></i>
                            Este posts no tiene asignado metas</li>
                        @endforelse

                    </ul>
                </div>

                <h1 class="text-2xl font-bold">Descripcion</h1>
                <hr class="mb-2">
                <div class="text-base text-gray-800  text-justify mx-4">
                    <p class="text-justify">{!!$post->body!!}</p>
                </div>

                <section class=" mt-4 mb-8">
                    <h1 class="font-bold text-2xl">Requisitos</h1>
                    <ul class="list-disc list-inside">
                        @forelse($post->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                        @empty
                        <li class="flex text-gray-900 text-base"><i class="fa fa-times text-xl mr-2 text-red-500"></i>
                            Este posts no tiene asignado Requerimientos</li>
                        @endforelse
                    </ul>
                </section>

                @livewire('reviews-post',['post'=>$post])
            
                @livewire('question',['model'=>$post])
            </div>
            {{-- Contenido Relacionado --}}
            <aside class="lg:block">
                <div class="order-1 lg:order-2 mb-15">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-4">
                        <div class="flex justify-content-around">
                            <img class="h-12 w-12 object-cover rounded-full shadow-lg"
                                src="{{$post->user->profile_photo_url}}">
                            <div class="ml-4">
                                <h1 class="font-bold text-gray-500 text-lg">Escrito por.{{$post->user->name}}</h1>
                                <a class="text-blue-400 text-xs " href="">{{'@'.Str::slug($post->user->name,'')}}</a>
                                <p class="font-bold text-lg mb-1">Detalle del Post:</p>
                                <ul class="space-y-1">
                                    <li>
                                        <i class="fas fa-comments inline-block w-6"></i>{{$post->reviews->count()}}
                                        reseñas
                                    </li>
                                    <li>
                                        <i class="fa fa-bookmark inline-block w-6"></i>Categoria:
                                        {{$post->category->name}}
                                    </li>
                                    <li><i class="far fa-calendar-alt inline-block w-6"></i> Fecha de Creacion:
                                        {{$post->created_at->format('d/m/y')}}
                                    </li>
                                    <li><i class="far fa-calendar-alt inline-block w-6"></i> Última actualización:
                                        {{$post->updated_at->format('d/m/y')}}
                                    </li>
                                    <li>
                                        <i class="fas fa-star inline-block w-6"></i> Calificación: {{$post->rating}}
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h3 class=" mt-8 text-lg text-gray-700 mb-2 font-bold">Quizas te podria Interesar<h3>
                            @foreach($similares as $similar )
                            <article class="flex mb-2 bg-white shadow-lg rounded-lg card-body px-6 py-4">
                                @if($similar->image)
                                <img class=" bg-gray-700 h-32 w-40 object-cover object-center"
                                    src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                <img class="h-32 w-40 object-cover object-center"
                                    src="{{asset('img/home/imagenDefault.jpeg')}}" alt="">
                                @endif

                                <div class="ml-3">
                                    <h1><a class="font-bold text-gray-500 mb-3"
                                            href="{{route('apps.show',$similar)}}">{{Str::limit($similar->name,
                                            40)}}</a>
                                    </h1>

                                    <div class="flex items-center mb-2">
                                        <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                            src="{{$similar->user->profile_photo_url}}" alt="">
                                        <p class="text-gray-700 text-sm ml-2">{{$similar->user->name}}</p>
                                    </div>
                                    <p class="text-sm"><i
                                            class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}
                                    </p>
                                    <ul class="flex text-sm mb-3">
                                        <li class="mr-1"><i
                                                class="fas fa-star text-{{$similar->rating>=1 ? 'yellow': 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1"><i
                                                class="fas fa-star text-{{$similar->rating>=2 ? 'yellow': 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1"><i
                                                class="fas fa-star text-{{$similar->rating>=3 ? 'yellow': 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1"><i
                                                class="fas fa-star text-{{$similar->rating>=4 ? 'yellow': 'gray'}}-400"></i>
                                        </li>
                                        <li class="mr-1"><i
                                                class="fas fa-star text-{{$similar->rating==5 ? 'yellow': 'gray'}}-400"></i>
                                        </li>

                                    </ul>
                                </div>
                            </article>

                            @endforeach
            </aside>
        
        </div>
    </div>

    <x-footer />
</x-app-layout>



