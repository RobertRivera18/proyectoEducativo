<x-instructor-layout :post="$post">
    <h1 class="text-2xl font-bold">Observaciones del Curso</h1>
    <hr class="mt-2 mb-6">
          <div class="text-gray-500">
            {!!$post->observation->body!!}
          </div>
</x-instructor-layout>