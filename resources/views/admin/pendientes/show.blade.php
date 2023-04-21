<x-app-layout>
    <section class="bg-stone-500 py-12 mb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 gap-6 lg:grid-cols-2">
            <figure class="">
                @if($post->image)
                <img class="aspect-[16/9] w-full object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                @else
                <img class="w-full h-80 object-cover object-center rounded-lg"
                    src="https://images.pexels.com/photos/6517091/pexels-photo-6517091.jpeg?auto=compress&cs=tinysrgb&w=600"
                    alt="">
                @endif
            </figure>

            <div>
                <h1 class="text-white text-2xl">{{$post->name}}</h1>
                <h2 class="text-basic mb-2 text-justify">{!!$post->extract!!}</h2>
                {{-- <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$app->level->name}}</p> --}}
                <p class="text-white"><i class="fa fa-bookmark"></i> Categoria:{{$post->category->name}}</p>
                <div class="flex items-center mt-2 cursor-pointer" wire:click="completed">
                    @if($post->rating)
                    <i class="fas fa-star text-xl text-yellow-600"></i>
                    <ul class="flex text-sm mb-3 items-center">
                        <p class="ml-2 mr-2 font-bold text-base">Calificacion de la Herramienta Educativa:
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$post->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$post->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$post->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$post->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$post->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
                        <p class="text-2xl font-bold">{{$post->rating}}</p>
                    </ul>
                    @else
                    <i class="fas fa-star text-2xl text-gray-600"></i>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2" x-data="{open:true}" x-show="open">
           @if(session('info'))
           <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Ocurrio un Error!</strong>
            <span class="block sm:inline">{{session('info')}}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg x-on:click="open=false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
           @endif
        </div>

    <div class="order-2 lg:col-span-2 lg:order-1">
        <section class="card bg-white shadow-lg mb-6 rounded-lg">
            <div class="card-body px-6 py-4">
                <h1 class="font-bold text-xl mb-2">Lo que Aprenderas.</h1>
                <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                    @forelse($post->goals as $goal)
                    <li class=" flex text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-10 h-10">
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

        </section>
        <h1 class="text-2xl font-bold">Descripcion</h1>
            <div class="text-gray-700 text-base text-justify">
                {!!$post->body!!}
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
        
    </div>

    <div class="order-1 lg:order-2">
        <section class="card bg-white shadow-lg mb-12 rounded-lg ">
            <div class="card-body px-6 py-4">
                <div class="flex items-center">
                    <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$post->user->profile_photo_url}}">
                    <div class="ml-4">
                        <h1 class="font-bold text-gray-500 text-lg">Escrito por.{{$post->user->name}}</h1>
                        <a class="text-blue-400 text-xs " href="">{{'@'.Str::slug($post->user->name,'')}}</a>
                    </div>
                </div>
                <form action="{{route('admin.posts.approved',$post)}}" method="POST" class="mt-4">
                    @csrf
                    <button
                        class="block w-full  mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2"
                        type="submit">Aprobar Post</button>
                </form>
                <a class="block w-full  mt-4 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2" 
                href="{{route('admin.posts.observation',$post)}}">Observaciones del Post</a>
            </div>
        </section>
    </div>
    </div>
</x-app-layout>