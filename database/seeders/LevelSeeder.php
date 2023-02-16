<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name'=>'Nivel Básico'
         ]);
 
         Level::create([
             'name'=>'Nivel Intermedio'
          ]);
 
          Level::create([
             'name'=>'Nivel Avanzado'
          ]);
    }
}
