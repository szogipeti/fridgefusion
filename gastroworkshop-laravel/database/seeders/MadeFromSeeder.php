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
            ['recipe_id' => 6, 'ingredient_id' => 32, 'measure_id' => 11, 'quantity' => 900],
            ['recipe_id' => 6, 'ingredient_id' => 33, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 6, 'ingredient_id' => 34, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 6, 'ingredient_id' => 21, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 6, 'ingredient_id' => 25, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 6, 'ingredient_id' => 35, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 6, 'ingredient_id' => 31, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 6, 'ingredient_id' => 36, 'measure_id' => 1, 'quantity' => 4],

            #Guacamole
            ['recipe_id' => 7, 'ingredient_id' => 38, 'measure_id' => 17, 'quantity' => 3],
            ['recipe_id' => 7, 'ingredient_id' => 39, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 7, 'ingredient_id' => 9, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 7, 'ingredient_id' => 16, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 7, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 0.5],
            ['recipe_id' => 7, 'ingredient_id' => 41, 'measure_id' => 1, 'quantity' => 3],
            ['recipe_id' => 7, 'ingredient_id' => 7, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 7, 'ingredient_id' => 42, 'measure_id' => 16, 'quantity' => 1],

            #Hummus
            ['recipe_id' => 8, 'ingredient_id' => 43, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 8, 'ingredient_id' => 44, 'measure_id' => 14, 'quantity' => 60],
            ['recipe_id' => 8, 'ingredient_id' => 7, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 8, 'ingredient_id' => 174, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 8, 'ingredient_id' => 47, 'measure_id' => 1, 'quantity' => 3],
            ['recipe_id' => 8, 'ingredient_id' => 48, 'measure_id' => 1, 'quantity' => 1],

            #Shrimp Cocktail
            ['recipe_id' => 9, 'ingredient_id' => 50, 'measure_id' => 11, 'quantity' => 900],
            ['recipe_id' => 9, 'ingredient_id' => 44, 'measure_id' => 5, 'quantity' => 6],
            ['recipe_id' => 9, 'ingredient_id' => 21, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 9, 'ingredient_id' => 51, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 9, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 0.5],
            ['recipe_id' => 9, 'ingredient_id' => 52, 'measure_id' => 1, 'quantity' => 1],
            ['recipe_id' => 9, 'ingredient_id' => 174, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 9, 'ingredient_id' => 53, 'measure_id' => 11, 'quantity' => 900],
            ['recipe_id' => 9, 'ingredient_id' => 54, 'measure_id' => 5, 'quantity' => 0.5],
            ['recipe_id' => 9, 'ingredient_id' => 55, 'measure_id' => 5, 'quantity' => 0.5],
            ['recipe_id' => 9, 'ingredient_id' => 49, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 9, 'ingredient_id' => 45, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 9, 'ingredient_id' => 56, 'measure_id' => 1, 'quantity' => 1],
            ['recipe_id' => 9, 'ingredient_id' => 57, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 9, 'ingredient_id' => 35, 'measure_id' => 19, 'quantity' => 2],
            ['recipe_id' => 9, 'ingredient_id' => 58, 'measure_id' => 2, 'quantity' => 0.25],

            #Caprese salad
            ['recipe_id' => 10, 'ingredient_id' => 20, 'measure_id' => 5, 'quantity' => 2],
            ['recipe_id' => 10, 'ingredient_id' => 16, 'measure_id' => 17, 'quantity' => 3],
            ['recipe_id' => 10, 'ingredient_id' => 4, 'measure_id' => 11, 'quantity' => 340],
            ['recipe_id' => 10, 'ingredient_id' => 17, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 10, 'ingredient_id' => 48, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 10, 'ingredient_id' => 21, 'measure_id' => 15, 'quantity' => null],

            #Tomato soup
            ['recipe_id' => 11, 'ingredient_id' => 16, 'measure_id' => 12, 'quantity' => 1],
            ['recipe_id' => 11, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 11, 'ingredient_id' => 59, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 11, 'ingredient_id' => 74, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 11, 'ingredient_id' => 48, 'measure_id' => 2, 'quantity' => 2],
            ['recipe_id' => 11, 'ingredient_id' => 61, 'measure_id' => 2, 'quantity' => 2],
            ['recipe_id' => 11, 'ingredient_id' => 51, 'measure_id' => 16, 'quantity' => 1],
            ['recipe_id' => 11, 'ingredient_id' => 62, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 11, 'ingredient_id' => 80, 'measure_id' => 13, 'quantity' => 1.2],

            #Chicken Noodle Soup
            ['recipe_id' => 12, 'ingredient_id' => 64, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 12, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 12, 'ingredient_id' => 59, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 12, 'ingredient_id' => 65, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 12, 'ingredient_id' => 7, 'measure_id' => 17, 'quantity' => 3],
            ['recipe_id' => 12, 'ingredient_id' => 175, 'measure_id' => 5, 'quantity' => 8],
            ['recipe_id' => 12, 'ingredient_id' => 62, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 12, 'ingredient_id' => 21, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 12, 'ingredient_id' => 66, 'measure_id' => 12, 'quantity' => 1.1],
            ['recipe_id' => 12, 'ingredient_id' => 67, 'measure_id' => 5, 'quantity' => 2.5],
            ['recipe_id' => 12, 'ingredient_id' => 68, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 12, 'ingredient_id' => 69, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 12, 'ingredient_id' => 45, 'measure_id' => 1, 'quantity' => 1],

            #French onion soup
            ['recipe_id' => 13, 'ingredient_id' => 36, 'measure_id' => 11, 'quantity' => 50],
            ['recipe_id' => 13, 'ingredient_id' => 48, 'measure_id' => 1, 'quantity' => 1],
            ['recipe_id' => 13, 'ingredient_id' => 40, 'measure_id' => 12, 'quantity' => 1],
            ['recipe_id' => 13, 'ingredient_id' => 51, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 13, 'ingredient_id' => 7, 'measure_id' => 17, 'quantity' => 4],
            ['recipe_id' => 13, 'ingredient_id' => 70, 'measure_id' => 2, 'quantity' => 2],
            ['recipe_id' => 13, 'ingredient_id' => 71, 'measure_id' => 10, 'quantity' => 250],
            ['recipe_id' => 13, 'ingredient_id' => 119, 'measure_id' => 13, 'quantity' => 1.3],
            ['recipe_id' => 13, 'ingredient_id' => 22, 'measure_id' => 20, 'quantity' => 6],
            ['recipe_id' => 13, 'ingredient_id' => 73, 'measure_id' => 11, 'quantity' => 140],

            #Minestrone soup
            ['recipe_id' => 14, 'ingredient_id' => 48, 'measure_id' => 1, 'quantity' => 3],
            ['recipe_id' => 14, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 14, 'ingredient_id' => 74, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 14, 'ingredient_id' => 59, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 14, 'ingredient_id' => 75, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 14, 'ingredient_id' => 76, 'measure_id' => 11, 'quantity' => 70],
            ['recipe_id' => 14, 'ingredient_id' => 7, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 14, 'ingredient_id' => 77, 'measure_id' => 2, 'quantity' => 0.5],
            ['recipe_id' => 14, 'ingredient_id' => 78, 'measure_id' => 11, 'quantity' => 400],
            ['recipe_id' => 14, 'ingredient_id' => 16, 'measure_id' => 11, 'quantity' => 400],
            ['recipe_id' => 14, 'ingredient_id' => 61, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 14, 'ingredient_id' => 80, 'measure_id' => 13, 'quantity' => 1.2],
            ['recipe_id' => 14, 'ingredient_id' => 62, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 14, 'ingredient_id' => 81, 'measure_id' => 11, 'quantity' => 70],
            ['recipe_id' => 14, 'ingredient_id' => 82, 'measure_id' => 11, 'quantity' => 100],
            ['recipe_id' => 14, 'ingredient_id' => 17, 'measure_id' => 18, 'quantity' => null],
            ['recipe_id' => 14, 'ingredient_id' => 37, 'measure_id' => 15, 'quantity' => null],

            #Cream of Broccoli Soup
            ['recipe_id' => 15, 'ingredient_id' => 64, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 15, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 15, 'ingredient_id' => 84, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 15, 'ingredient_id' => 85, 'measure_id' => 5, 'quantity' => 4],
            ['recipe_id' => 15, 'ingredient_id' => 86, 'measure_id' => 11, 'quantity' => 450],
            ['recipe_id' => 15, 'ingredient_id' => 87, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 15, 'ingredient_id' => 88, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 15, 'ingredient_id' => 79, 'measure_id' => 15, 'quantity' => null],

            #Clam Chowder
            ['recipe_id' => 16, 'ingredient_id' => 89, 'measure_id' => 5, 'quantity' => 2],
            ['recipe_id' => 16, 'ingredient_id' => 59, 'measure_id' => 5, 'quantity' => 1],
            ['recipe_id' => 16, 'ingredient_id' => 60, 'measure_id' => 5, 'quantity' => 1],
            ['recipe_id' => 16, 'ingredient_id' => 40, 'measure_id' => 5, 'quantity' => 1],
            ['recipe_id' => 16, 'ingredient_id' => 90, 'measure_id' => 11, 'quantity' => 185],
            ['recipe_id' => 16, 'ingredient_id' => 36, 'measure_id' => 5, 'quantity' => 0.75],
            ['recipe_id' => 16, 'ingredient_id' => 84, 'measure_id' => 5, 'quantity' => 0.75],
            ['recipe_id' => 16, 'ingredient_id' => 91, 'measure_id' => 13, 'quantity' => 1],
            ['recipe_id' => 16, 'ingredient_id' => 92, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 16, 'ingredient_id' => 9, 'measure_id' => 2, 'quantity' => 1.5],
            ['recipe_id' => 16, 'ingredient_id' => 25, 'measure_id' => 15, 'quantity' => null],

            #Split Pea Soup
            ['recipe_id' => 17, 'ingredient_id' => 93, 'measure_id' => 5, 'quantity' => 0.5],
            ['recipe_id' => 17, 'ingredient_id' => 44, 'measure_id' => 5, 'quantity' => 8],
            ['recipe_id' => 17, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 17, 'ingredient_id' => 60, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 17, 'ingredient_id' => 8, 'measure_id' => 2, 'quantity' => 0.25],
            ['recipe_id' => 17, 'ingredient_id' => 94, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 17, 'ingredient_id' => 59, 'measure_id' => 17, 'quantity' => 3],

            #Gazpacho
            ['recipe_id' => 18, 'ingredient_id' => 16, 'measure_id' => 11, 'quantity' => 900],
            ['recipe_id' => 18, 'ingredient_id' => 95, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 18, 'ingredient_id' => 96, 'measure_id' => 17, 'quantity' => 0.5],
            ['recipe_id' => 18, 'ingredient_id' => 7, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 18, 'ingredient_id' => 92, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 18, 'ingredient_id' => 44, 'measure_id' => 5, 'quantity' => 0.5],
            ['recipe_id' => 18, 'ingredient_id' => 19, 'measure_id' => 5, 'quantity' => 0.33],
            ['recipe_id' => 18, 'ingredient_id' => 21, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 18, 'ingredient_id' => 79, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 18, 'ingredient_id' => 98, 'measure_id' => 20, 'quantity' => 2],
            ['recipe_id' => 18, 'ingredient_id' => 17, 'measure_id' => 1, 'quantity' => 2],

            #Lentil Soup
            ['recipe_id' => 19, 'ingredient_id' => 48, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 19, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 19, 'ingredient_id' => 59, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 19, 'ingredient_id' => 60, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 19, 'ingredient_id' => 7, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 19, 'ingredient_id' => 62, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 19, 'ingredient_id' => 77, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 19, 'ingredient_id' => 17, 'measure_id' => 2, 'quantity' => 1],
            ['recipe_id' => 19, 'ingredient_id' => 99, 'measure_id' => 5, 'quantity' => 2],
            ['recipe_id' => 19, 'ingredient_id' => 44, 'measure_id' => 5, 'quantity' => 8],
            ['recipe_id' => 19, 'ingredient_id' => 16, 'measure_id' => 11, 'quantity' => 410],
            ['recipe_id' => 19, 'ingredient_id' => 5, 'measure_id' => 5, 'quantity' => 0.5],
            ['recipe_id' => 19, 'ingredient_id' => 176, 'measure_id' => 2, 'quantity' => 2],
            ['recipe_id' => 19, 'ingredient_id' => 9, 'measure_id' => 15, 'quantity' => null],
            ['recipe_id' => 19, 'ingredient_id' => 79, 'measure_id' => 15, 'quantity' => null],

            #Beef Stew
            ['recipe_id' => 20, 'ingredient_id' => 84, 'measure_id' => 5, 'quantity' => 0.25],
            ['recipe_id' => 20, 'ingredient_id' => 79, 'measure_id' => 2, 'quantity' => 0.25],
            ['recipe_id' => 20, 'ingredient_id' => 101, 'measure_id' => 11, 'quantity' => 450],
            ['recipe_id' => 20, 'ingredient_id' => 33, 'measure_id' => 2, 'quantity' => 5],
            ['recipe_id' => 20, 'ingredient_id' => 92, 'measure_id' => 1, 'quantity' => 2],
            ['recipe_id' => 20, 'ingredient_id' => 102, 'measure_id' => 5, 'quantity' => 1],
            ['recipe_id' => 20, 'ingredient_id' => 102, 'measure_id' => 5, 'quantity' => 3.5],
            ['recipe_id' => 20, 'ingredient_id' => 62, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 20, 'ingredient_id' => 40, 'measure_id' => 17, 'quantity' => 1],
            ['recipe_id' => 20, 'ingredient_id' => 59, 'measure_id' => 17, 'quantity' => 5],
            ['recipe_id' => 20, 'ingredient_id' => 89, 'measure_id' => 17, 'quantity' => 2],
            ['recipe_id' => 20, 'ingredient_id' => 9, 'measure_id' => 2, 'quantity' => 2],
        ]);
    }
}
