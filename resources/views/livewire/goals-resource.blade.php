<div>
        @foreach($post->goals as $goal)
        <article class="card">
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <input wire:model="goal.name" class="form-input w-100">
                    @error('goal.name')
                         <span class="text-danger">{{$message}}</span>
                    @enderror
                </form> 
                <header class="d-flex justify-content-between">
                    <h5>{{$goal->name}}</h5>
                    <div>
                    <i wire:click="edit({{$goal}})"class="fas fa-edit text-primary cursor-pointer"></i>
                    <i wire:click="destroy({{$goal}})"class="fas fa-trash text-danger"></i>
                </div>
                </header>       
            </div>
        </article>
        @endforeach

        <article class="card">
            <div class="card-body">
             <form wire:submit.prevent="store">
                <input wire:model="name" class="form-input w-100" placeholder="Agregar nombre de la meta">
                <div class="justify-content-end mt-2">
                    <button type="submit" class="btn btn-primary">Agregar Meta</button>
                </div>
             </form>
            </div>
        </article>
    </div>
