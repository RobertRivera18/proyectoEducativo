<div>
    <div class="flex flex-col max-w-xl p-8 shadow-sm rounded-xl lg:p-12 dark:bg-gray-900 dark:text-gray-100">
        <div class="flex flex-col w-full">
            <h2 class="text-xl font-semibold text-center">Reseña del Recurso Educativo</h2>
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-2 sm:gap-6 items-center">
                <div class="text-center text-yellow-400">
                    <p class="text-6xl font-bold">{{$post->reviews->count()}}</p>
                    <ul class="flex items-center space-x-1 text-xs justify-center">

                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                        <li>
                            <i class="fas fa-star text-yellow-400"></i>
                        </li>
                    </ul>
                    <p class="text-lg font-semibold">Valoraciones</p>
                </div>

                <ul class="col-span-1 sm:col-span-3">

                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:100%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                        </ul> 

                        @if ($post->reviews->count() > 0)
                            <span class="w-16">
                                {{($ratingsCount[5]*100)/$post->reviews->count()}}%
                            </span>
                            @else
                            0%
                            @endif
                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>

                        </ul>

                            @if ($post->reviews->count() > 0)
                            <span class="w-16">
                                {{($ratingsCount[4]*100)/$post->reviews->count()}}%
                            </span>
                            @else
                            0%
                            @endif
                         
                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                        </ul> 

                        @if ($post->reviews->count() > 0)
                            <span class="w-16">
                                {{($ratingsCount[3]*100)/$post->reviews->count()}}%
                            </span>
                            @else
                            0%
                            @endif
                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                        </ul> 

                        @if ($post->reviews->count() > 0)
                            <span class="w-16">
                                {{($ratingsCount[2]*100)/$post->reviews->count()}}%
                            </span>
                            @else
                            0%
                            @endif
                    </li>
                    <li class="flex items-center">
                        <div class="relative pt-1 flex-1">
                            <div class="overflow-hidden h-2 text-xs flex rounded bg-gray-300">
                                <div style="width:0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gray-500">
                                </div>
                            </div>
                        </div>
                        <ul class="flex items-center space-x-1 text-xs ml-4 mr-2">

                            <li>
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                            <li>
                                <i class="fas fa-star text-gray-600"></i>
                            </li>
                        </ul> 

                        @if ($post->reviews->count() > 0)
                            <span class="w-16">
                                {{($ratingsCount[1]*100)/$post->reviews->count()}}%
                            </span>
                            @else
                            0%
                            @endif
                    </li>

                </ul>
            </div>

        </div>
    </div>
    @auth()
    @can('valued', $post)
    @livewire('calification-resource',['post'=>$post])
    @else
    <div class="flex p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-100" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Info</span>
        <div>
            Usted ya ha valorado este recurso!.
        </div>
    </div>

    @endcan
    @endauth
    <div class="card bg-white shadow-lg mb-12 rounded-lg px-6 py-4 mt-4">
        <div class="card-body">
            <p class="text-bold mb-2">{{$post->reviews->count()}} valoraciones</p>
            @foreach($post->reviews as $review)
            <article class="flex mb-4 text-gray-800">
                <figure class="mr-4">
                    <img class="h-9 w-9 object-cover rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}"
                        alt="">
                </figure>

                <div class="card flex-1">
                    <div class="card-body bg-gray-100 px-2 py-2 rounded-lg">
                        <div class="flex justify-between">
                            <p class="text-basic"><b>{{$review->user->name}}</b></p>
                            <p class="text-xs"><b>{{$review->created_at->diffForHumans()}}</b></p>

                        </div>

                        <div class="flex flex-wrap items-center space-x-2">
                            <ul class="flex text-sm items-center">
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$review->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$review->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$review->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$review->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$review->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
                            </ul>
                        </div>
                        {{$review->comment}}

                    </div>

                </div>


            </article>

            @endforeach
        </div>
    </div>
</div>