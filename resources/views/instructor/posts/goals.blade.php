<x-instructor-layout :post="$post">
   
      <div>
         @livewire('instructor.posts-goals',['post'=>$post],key('posts-goals'.$post->id))
      </div>
      <div>
            @livewire('instructor.posts-requirements',['post'=>$post],key('posts-requirements'.$post->id))
         </div>

</x-instructor-layout>