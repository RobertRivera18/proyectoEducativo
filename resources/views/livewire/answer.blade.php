<div class="pl-16">
   <button wire:click="$set('answer_created.open',true)">
    <i class="fas fa-reply"></i>

    Responder
   </button>
   @if($answer_created['open'])
    <div class="flex">
        <figure class="mr-4">
            <img class="h-12 w-12 rounded-full object-cover object-center "
                src="{{ auth()->user()->profile_photo_url }}" alt="">
        </figure>
        <form class="flex-1" wire:submit.prevent="store()">
            {{-- <textarea wire:model="answer_created.body"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" placeholder="Escriba su respuesta"></textarea> --}}

                
              <x-balloon-editor wire:model="answer_created.body" :focus="true"/>

               <x-jet-input-error for="answer_created.body" class="mt-1" /> 
            <div class="flex justify-end mt-2">
                <x-jet-danger-button class="mr-2" wire:click="$set('answer_created.open',false)">
                    Cancelar
                </x-jet-danger-button>

                <x-jet-button>
                   Responder
                </x-jet-button>
            </div>

        </form>
    </div>
    
   @endif

   @if($question->answers()->count())
    <div class="mt-2">
        <button class="font-semibold text-blue-500" wire:click="show_answers">
            @if ($this->cant < $this->question->answers()->count())
            Mostrar Respuestas
            @else
            Ocultar respuestas 
            @endif
            
        </button>
    </div>
   @endif
   
   <ul class="space-y-6 mt-4">
    @foreach($this->answers as $answer)
    <li wire:key="answer-{{$answer->id}}">
        <div class="flex">
            <figure class="mr-4">
                <img class="h-12 w-12 rounded-full object-cover object-center"
                    src="{{$answer->user->profile_photo_url}}" alt="">
            </figure>
            <div class="flex-1">
                <p class="font-semibold">
                    {{$answer->user->name}}
                    <span class="text-sm font-normal">
                        {{$answer->created_at->diffForHumans()}}
                    </span>
                </p>

                @if($answer->id==$answer_edit['id'])
                <form wire:submit.prevent="update">
                    {{-- <textarea wire:model="answer_edit.body"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full"></textarea> --}}
                                
              <x-balloon-editor wire:model="answer_edit.body" :focus="true"/>

                        <x-jet-input-error for="answer_edit.body" class="mt-1" />
                    <div class="flex justify-end">
                        <x-jet-danger-button class="mr-2" wire:click="cancel">
                            Cancelar
                        </x-jet-danger-button>

                        <x-jet-button>
                            Actualizar
                        </x-jet-button>
                    </div>

                </form>
                @else
                <p>{!!$answer->body!!}</p>
                <button wire:click="$set('answer_to_answer.id',{{$answer->id}})">
                    <i class="fas fa-reply"></i>
            
                    Responder
                   </button>
                @endif
            </div>

            <div class="ml-6">
                <x-jet-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-jet-dropdown-link class="cursor-pointer" wire:click="edit({{$answer->id}})">
                            Editar
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link class="cursor-pointer" wire:click="destroy({{$answer->id}})">
                            Eliminar
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            </div>
        </div>

          @if($answer_to_answer['id']==$answer->id)
        <div class="flex mt-4">
            <figure class="mr-4">
                <img class="h-12 w-12 rounded-full object-cover object-center"
                    src="{{$answer->user->profile_photo_url}}" alt="">
            </figure>
            <div class="flex-1">
                <form wire:submit.prevent="answer_to_answer_store">
                    {{-- <textarea wire:model="answer_to_answer.body"
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full" placeholder="Escriba una 1respuesta"></textarea> --}}

                        <x-balloon-editor wire:model="answer_to_answer.body" :focus="true"/>
        
                    <div class="flex justify-end mt-2">
                        <x-jet-danger-button class="mr-2" wire:click="$set('answer_to_answer.id',null)">
                            Cancelar
                        </x-jet-danger-button>
        
                        <x-jet-button>
                           Responder
                        </x-jet-button>
                    </div>
        
                </form>
            </div>
        </div>
        @endif
    </li>
    @endforeach
   </ul>
</div>
