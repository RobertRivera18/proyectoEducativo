<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Level;
use App\Models\Subject;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\LevelSeeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/posts');
        Storage::makeDirectory('public/posts');
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(TipoRecursoSeeder::class);
        Category::factory(3)->create();
        Subject::factory(5)->create();      
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
       
    }
}
