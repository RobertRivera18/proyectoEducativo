<x-instructor-layout :post="$post">
    <h1 class="text-xl font-bold">INFORMACIÓN DEL POST</h1>
                        <hr class="mt-2 mb-6">
                        {!! Form::model($post, ['route' => ['instructor.posts.update', $post], 'method' => 'put', 'files' => true]) !!}
        
                        @include('instructor.posts.partials.form')
                        <div class="flex justify-end">
                            {!! Form::submit('Actualizar Información', [
                            'class' => 'py-2 px-2 inline-flex font-bold text-white bg-blue-500
                            rounded-lg cursor-pointer',
                            ]) !!}
                            
                        </div>
                        {!! Form::close() !!}
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/form.js')}}"></script>
    </x-slot>
</x-instructor-layout>
