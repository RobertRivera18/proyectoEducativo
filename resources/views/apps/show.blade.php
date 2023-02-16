<x-app-layout>
    <section class="bg-stone-500 py-12 mb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure class="">

                @if($app->image)
                <img class="aspect-[16/9] w-full object-cover object-center"
                    src="{{Storage::url($app->image->url)}}" alt="">
                @else
                <img class="aspect-[16/9] w-full object-cover object-center"
                    src="{{asset('img/home/imagenDefault.jpeg')}}" alt="">
                @endif
            </figure>

            <div>
                <h1 class="text-white text-2xl">{{$app->name}}</h1>
                <h2 class="text-basic mb-3 text-justify">{!!$app->extract!!}</h2>
                <p class="text-sm mt-2 mb-2">
                    @foreach($app->tags as $tag )
                    <a href="{{route('posts.tag',$tag)}}"
                        class="hover:bg-{{$tag->color}}-200 text-{{$tag->color}}-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded  border border-{{$tag->color}}-400 bg-{{$tag->color}}-100 text-black rounded-full">{{$tag->name}}</a>
                    @endforeach
                </p>
                {{-- <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$app->level->name}}</p> --}}
                <p class="text-white"><i class="fa fa-bookmark"></i> Categoria:{{$app->category->name}}</p>
                <div class="flex items-center mt-2 cursor-pointer" wire:click="completed">
                    @if($app->rating)
                    <i class="fas fa-star text-2xl text-yellow-600"></i>
                    <ul class="flex text-sm mb-3 items-center">
                        <p class="ml-2 mr-2 font-bold text-base">Calificacion de la Herramienta Educativa:
                        <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                        <li class="mr-1"><i class="fas fa-star text-{{$app->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
                        <p class="text-3xl font-bold">{{$app->rating}}</p>
                    </ul>
                    @else
                    <i class="fas fa-star text-2xl text-gray-600"></i>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card bg-white shadow-lg mb-6 rounded-lg">
                <div class="card-body px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">Esta App es ideal para?</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse($app->goals as $goal)
                        <li class=" flex text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        {{$goal->name}}</li>
                        @empty
                        <li class="flex text-gray-900 text-base"><i class="fa fa-times text-xl mr-2 text-red-500"></i> Este posts no tiene asignado metas</li>
                        @endforelse
                    </ul>
                </div>
            </section>
            <section>
                <h1 class="text-3xl font-bold">Descripcion</h1>
                <div class="text-gray-700 text-base text-justify">
                    {!!$app->body!!}
                </div>
            </section>
            <div class="flex flex-col max-w-xl p-8 shadow-sm rounded-xl lg:p-12 dark:bg-gray-900 dark:text-gray-100">
                <div class="flex flex-col w-full">
                    <h2 class="text-3xl font-semibold text-center">Reseña del recurso Educativo</h2>
                    <div class="flex flex-wrap items-center mt-2 mb-1 space-x-2">
                        <ul class="flex text-sm mb-3 items-center">
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
                            <span class="text-lg font-bold">{{$app->rating}} de 5</span>
                        </ul>
                       
                    </div>
                    <p class="text-sm dark:text-gray-400">861 global ratings</p>
                    <div class="flex flex-col mt-4">
                        <div class="flex items-center space-x-1">
                            <span class="flex-shrink-0 w-12 text-sm">5 star</span>
                            <div class="flex-1 h-4 overflow-hidden rounded-sm dark:bg-gray-700">
                                <div class="bg-yellow-300 h-4 w-5/6"></div>
                            </div>
                            <span class="flex-shrink-0 w-12 text-sm text-right">83%</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="flex-shrink-0 w-12 text-sm">4 star</span>
                            <div class="flex-1 h-4 overflow-hidden rounded-sm dark:bg-gray-700">
                                <div class="bg-yellow-300 h-4 w-4/6"></div>
                            </div>
                            <span class="flex-shrink-0 w-12 text-sm text-right">67%</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="flex-shrink-0 w-12 text-sm">3 star</span>
                            <div class="flex-1 h-4 overflow-hidden rounded-sm dark:bg-gray-700">
                                <div class="bg-yellow-300 h-4 w-3/6"></div>
                            </div>
                            <span class="flex-shrink-0 w-12 text-sm text-right">50%</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="flex-shrink-0 w-12 text-sm">2 star</span>
                            <div class="flex-1 h-4 overflow-hidden rounded-sm dark:bg-gray-700">
                                <div class="bg-yellow-300 h-4 w-2/6"></div>
                            </div>
                            <span class="flex-shrink-0 w-12 text-sm text-right">33%</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <span class="flex-shrink-0 w-12 text-sm">1 star</span>
                            <div class="flex-1 h-4 overflow-hidden rounded-sm dark:bg-gray-700">
                                <div class="bg-yellow-300 h-4 w-1/6"></div>
                            </div>
                            <span class="flex-shrink-0 w-12 text-sm text-right">17%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card bg-white shadow-lg mb-12 rounded-lg mb-4">
                <div class="card-body px-6 py-4">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$app->user->profile_photo_url}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Escrito por.{{$app->user->name}}</h1>
                            <a class="text-blue-400 text-xs " href="">{{'@'.Str::slug($app->user->name,'')}}</a>
                            <p class="font-bold text-lg mb-1">Detalle de la Aplicacion:</p>
                            <ul class="space-y-1">
                                <li>
                                    <i class="fas fa-comments inline-block w-6"></i>{{$app->reviews->count()}} reseñas
                                </li>
                                <li><i class="far fa-calendar-alt inline-block w-6"></i> Fecha de Creacion:
                                    {{$app->created_at->format('d/m/y')}}
                                </li>
                                <li><i class="far fa-calendar-alt inline-block w-6"></i> Última actualización:
                                    {{$app->updated_at->format('d/m/y')}}
                                </li>
                                <li>
                                    <i class="fas fa-star inline-block w-6"></i> Calificación: {{$app->rating}}
                                </li>
                            </ul>
                        </div>
                        
                    </div>

                    
                </div>
            </section>

            <aside class="hidden lg:block bg-white shadow-lg mb-12 rounded-lg card-body px-6 py-4">
                @foreach($similares as $similar )
                <article class="flex mb-6">
                    <img class="bg-gray-700 h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}" alt="">
                    <div class="ml-3">
                        <h1><a class="font-bold text-gray-500 mb-3" href="{{route('apps.show',$similar)}}">{{Str::limit($similar->name, 40)}}</a></h1>

                        <div class="flex items-center mb-2">
                            <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->user->profile_photo_url}}" alt="">
                            <p class="text-gray-700 text-sm ml-2">{{$similar->user->name}}</p>
                        </div>
                        <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p>
                        <ul class="flex text-sm mb-3">
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$app->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
                    
                        </ul>
                    </div>
                </article>
                @endforeach
            </aside>
          
        </div>
        
    </div>
   
    
</x-app-layout>
