<section>
    <h1 class="text-2xl font-bold">METAS DEL CURSO</h1>
    <hr class="mt-2 mb-6">
    @foreach($post->goals as $item)
    <article class="card mb-4 shadow-md">
        <div class="card-body bg-gray-100 rounded-lg text-gray-600 px-5 py-6 shadow-md">
            @if ($goal->id==$item->id)
            <form wire:submit.prevent="update">
                <input wire:model="goal.name" class="form-input w-full rounded-lg">
                @error('goal.name')
                <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
            </form>
            @else
            <header class="flex justify-between">
                <h1>{{$item->name}}</h1>
                <div>
                    <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                    <i wire:click="destroy({{$item}})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                </div>
            </header>
            @endif
        </div>
    </article>
    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100 rounded-lg text-gray-600 px-5 py-6">
           <form wire:submit.prevent="store">
            <input wire:model="name" class=" text-sm form-input w-full rounded-lg" placeholder="Agregar el nombre de la meta">
                
            @error('name')
                <span class="text-xs text-red-500">{{$message}}</span>
            @enderror

            <div class="flex justify-end mt-2">
                <button type="submit" class="py-1 px-2 inline-flex font-bold text-white bg-blue-500
                rounded-lg">Agregar Meta</button>
            </div>
           </form>
        </div>
    </article>
</section>