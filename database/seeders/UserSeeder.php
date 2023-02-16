<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Robert Rivera Castañeda',
            'email'=>'rxrc1819@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name'=>'Diana Torres',
            'email'=>'dianatorres@gmail.com',
            'password'=> bcrypt('12345678')
        ])->assignRole('blogger');
        User::factory(9)->create();
    }
}
