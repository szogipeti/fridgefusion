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
            #Spinach and Artichoke Dip
            ['recipe_id' => 1, 'ingredient_id' => 1, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 2, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 3, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 7, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 37, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 4, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 8, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 6, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 1, 'ingredient_id' => 5, 'measure_id' => 15, 'quantity' => null],

            #Stuffed mushrooms
            ['recipe_id' => 2, 'ingredient_id' => 10, 'measure_id' => 17, 'quantity' => 5],
            ['recipe_id' => 2, 'ingredient_id' => 12, 'measure_id' => 11, 'quantity' => 125],
            ['recipe_id' => 2, 'ingredient_id' => 11, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 2, 'ingredient_id' => 7, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 2, 'ingredient_id' => 13, 'measure_id' => 1, 'quantity' => 4],
            ['recipe_id' => 2, 'ingredient_id' => 14, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 2, 'ingredient_id' => 15, 'measure_id' => 11, 'quantity' => 50],

            #Bruschetta
            ['recipe_id' => 3, 'ingredient_id' => 19, 'measure_id' => 1, 'quantity' => 4],
            ['recipe_id' => 3, 'ingredient_id' => 7, 'measure_id' => 15, 'quantity' => 4],
            ['recipe_id' => 3, 'ingredient_id' => 16, 'measure_id' => 17, 'quantity' => 4],
            ['recipe_id' => 3, 'ingredient_id' => 17, 'measure_id' => 17, 'quantity' => 0.25],
            ['recipe_id' => 3, 'ingredient_id' => 20, 'measure_id' => 5, 'quantity' => 2],
            ['recipe_id' => 3, 'ingredient_id' => 21, 'measure_id' => 1, 'quantity' => 1],
            ['recipe_id' => 3, 'ingredient_id' => 18, 'measure_id' => 2, 'quantity' => null],
            ['recipe_id' => 3, 'ingredient_id' => 22, 'measure_id' => 16, 'quantity' => 1],

            #Deviled Eggs
            ['recipe_id' => 4, 'ingredient_id' => 23, 'measure_id' => 17, 'quantity' => 6],
            ['recipe_id' => 4, 'ingredient_id' => 3, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 4, 'ingredient_id' => 27, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 4, 'ingredient_id' => 24, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 4, 'ingredient_id' => 9, 'measure_id' => 2, 'quantity' => 0.125],
            ['recipe_id' => 4, 'ingredient_id' => 25, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 4, 'ingredient_id' => 26, 'measure_id' => 15, 'quantity' => null],

            #Baked Brie
            ['recipe_id' => 5, 'ingredient_id' => 28, 'measure_id' => 11, 'quantity' => 370],
            ['recipe_id' => 5, 'ingredient_id' => 29, 'measure_id' => 2, 'quantity' => 0.5],
            ['recipe_id' => 5, 'ingredient_id' => 30, 'measure_id' => 2, 'quantity' => 0.5],
            ['recipe_id' => 5, 'ingredient_id' => 31, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 5, 'ingredient_id' => 46, 'measure_id' => 15, 'quantity' => null],

            #Buffalo Wings
            ['recipe_id' => 5, 'ingredient_id' => 32, 'measure_id' => 11, 'quantity' => 900],
            ['recipe_id' => 5, 'ingredient_id' => 33, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 5, 'ingredient_id' => 34, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 5, 'ingredient_id' => 21, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 5, 'ingredient_id' => 25, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 5, 'ingredient_id' => 35, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 5, 'ingredient_id' => 31, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 5, 'ingredient_id' => 36, 'measure_id' => 1, 'quantity' => 4],
        ]);
    }
}
