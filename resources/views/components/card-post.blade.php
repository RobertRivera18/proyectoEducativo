@props(['post'])
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden ">

    @if ($post->image)
    <img class="w-full h-72 object-cover object-center bg-yellow-400" src="{{Storage::url($post->image->url)}}" alt="">

    @else
    <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2022/06/22/10/47/cheetah-7277665_960_720.jpg" alt="">

    @endif
    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
        </h1>
        <div class="text-gray-700 text-sm">
            {!!$post->extract!!}
        </div>
    </div>
    <div class="px-6 flex">
    <p class="text-sm mb-4">
        @foreach($post->tags as $tag )
        <a href="{{route('posts.tag',$tag)}}"
            class="inline-block px-3 h-5 bg-{{$tag->color}}-400 text-black rounded-full mb-2">{{$tag->name}}</a>
        @endforeach
    </p>

    <ul class="flex text-sm mb-3">
        <p class="ml-2 mr-2 font-bold text-base">Calificacion del Recursos Educativo:</p>
        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
        <li class="mr-1"><i class="fas fa-star text-{{$post->rating==5 ? 'yellow': 'gray'}}-400"></i></li>

    </ul>
</div>
    
    
</article>