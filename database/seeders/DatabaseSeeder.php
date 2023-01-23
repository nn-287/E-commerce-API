<?php

namespace Database\Seeders;

//use Database\Factories\ModelProductFactory;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\product;
use App\Models\review;
use Database\Factories\ModelProductFactory;
use Illuminate\Database\Seeder;


//use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\Product::factory(10)->create();

        \App\Models\Review::factory(10)->create();




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);





    }
}
