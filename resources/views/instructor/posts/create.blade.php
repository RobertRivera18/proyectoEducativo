<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="card">
            <div class="card-body bg-white rounded-lg text-gray-600 px-5 py-6">
                <h1 class="text-2xl font-bold">Crear Nuevo Post</h1>
                <hr class="mt-2 mb-6">
                
                {!! Form::open(['route'=>'instructor.posts.store','files'=> true,'autocomplete'=>'off']) !!}
                {!! Form::hidden('user_id',auth()->user()->id)!!}
                @include('instructor.posts.partials.form')


                <div class="flex justify-end mt-2">
                    {!! Form::submit('Crear Nuevo Post', ['class'=>'py-2 px-2 font-bold text-white bg-blue-500
                    rounded-lg cursor-pointer']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/form.js')}}"></script>
    </x-slot>
</x-app-layout>