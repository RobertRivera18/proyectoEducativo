@props(['post'])
<article class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:gap-6">
    <figure>
        <a href="{{route('posts.show',$post)}}">
            @if ($post->image)
            <img class="aspect-[16/9] w-full object-cover object-center rounded-md"
                src="{{Storage::url($post->image->url)}}">
                @else
                <img class="aspect-[16/9] w-full object-cover object-center" src="https://cdn.pixabay.com/photo/2022/06/22/10/47/cheetah-7277665_960_720.jpg" alt="">
                @endif
        </a>
    </figure>
    <div>
        <h1 class="text-xl font-semibold">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>
        <hr class="my-1">
        <div class="mb-2">
            @foreach($post->tags as $tag )
            <a href="{{route('posts.tag',$tag)}}">
                <span
                    class="bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded border-indigo-400">
                    {{$tag->name}}
                </span>
            </a>
            @endforeach
        </div>

        <div class="flex items-center mb-2">
            <a href="" class="flex items-center">
                <figure class="mr-2">
                    <img class="h-8 w-8 rounded-full object-cover"
                        src="{{$post->user->profile_photo_url}}">
                </figure>
                <p class="text-sm mr-2">{{$post->user->name}}</p>
            </a>
            <p class="text-sm ">
                {{$post->created_at->format('d/m/y')}}
            </p>
        </div>
        <ul class="flex text-sm">
            <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
            <li class="mr-1"><i class="fas fa-star text-{{$post->rating==5 ? 'yellow': 'gray'}}-400"></i></li>
        </ul>
        <p class="italic">{{Str::limit($post->extract ,100)}}</p>
        <p class="text-justify">{{Str::limit($post->body ,400)}}</p>
        
        <div class="mt-4 flex justify-between items-center">
            <a href="{{route('posts.show',$post)}}"
                class="text-sm block text-center mt-4 bg-gray-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg">Leer más</a>
            <span class="flex items-center">
                <i class="far fa-comment-alt mr-2"></i>
                {{$post->reviews->count()}}
            </span>
        </div>
    </div>
</article>