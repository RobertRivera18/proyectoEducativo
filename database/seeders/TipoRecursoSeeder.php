<?php

namespace Database\Seeders;

use App\Models\TipoRecurso;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoRecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoRecurso::create([
            'name'=>'Post'
        ]);

        TipoRecurso::create([
            'name'=>'App'
        ]);
    }
}
