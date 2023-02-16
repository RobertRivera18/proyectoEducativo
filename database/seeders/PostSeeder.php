<?php

namespace Database\Seeders;

use App\Models\Goal;
use App\Models\Post;
use App\Models\Image;
use App\Models\Review;
use App\Models\Requirement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(100)->create();
        foreach ($posts as $post) {
            Review::factory(5)->create([
                'post_id'=>$post->id
            ]);
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class
            ]);
            $post->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
            Goal::factory(4)->create([
                'post_id' => $post->id
             ]);

             Requirement::factory(4)->create([
                'post_id' => $post->id
             ]);
             
        }
    }
}
