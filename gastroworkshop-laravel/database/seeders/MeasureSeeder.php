<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("measures")->insert([
            ['id' => 1,'name' => 'tablespoon'],
            ['id' => 2,'name' => 'teaspoon'],
            ['id' => 3,'name' => 'ounce'],
            ['id' => 4,'name' => 'fluid ounce'],
            ['id' => 5,'name' => 'cup'],
            ['id' => 6,'name' => 'quart'],
            ['id' => 7,'name' => 'pint'],
            ['id' => 8,'name' => 'gallon'],
            ['id' => 9,'name' => 'pound'],
            ['id' => 10,'name' => 'milliliter'],
            ['id' => 11,'name' => 'grams'],
            ['id' => 12,'name' => 'kilogram'],
            ['id' => 13,'name' => 'liter'],
            ['id' => 14,'name' => 'milliliter'],
            ['id' => 15,'name' => 'to taste'],
            ['id' => 16,'name' => 'pinch'],
            ['id' => 17,'name' => 'piece'],
            ['id' => 18,'name' => 'handful'],
            ['id' => 19,'name' => 'dash'],
            ['id' => 20,'name' => 'slice']
        ]);
    }
}
