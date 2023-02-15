<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MadeFromSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('made_from')->insert([
            ['recipe_id' => 2, 'ingredient_id' => 1, 'measure_id' => 11, 'quantity' => 50],
            ['recipe_id' => 2, 'ingredient_id' => 2, 'measure_id' => 11, 'quantity' => 50],
            ['recipe_id' => 2, 'ingredient_id' => 3, 'measure_id' => 11, 'quantity' => 50],
            ['recipe_id' => 2, 'ingredient_id' => 4, 'measure_id' => 11, 'quantity' => 50],
            ['recipe_id' => 2, 'ingredient_id' => 5, 'measure_id' => 11, 'quantity' => 50],
        ]);
    }
}
