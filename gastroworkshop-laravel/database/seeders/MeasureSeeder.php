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
            ['id' => 5,'name' => 'cup'],
            ['id' => 10,'name' => 'milliliter'],
            ['id' => 11,'name' => 'gram'],
            ['id' => 12,'name' => 'kilogram'],
            ['id' => 13,'name' => 'liter'],
            ['id' => 14,'name' => 'milliliter'],
            ['id' => 15,'name' => 'to taste'],
            ['id' => 16,'name' => 'pinch'],
            ['id' => 17,'name' => 'piece'],
            ['id' => 18,'name' => 'handful'],
            ['id' => 19,'name' => 'dash'],
            ['id' => 20,'name' => 'slice'],
            ['id' => 21,'name' => 'pack'],
            ['id' => 22,'name' => 'sprig'],
        ]);
    }
}
