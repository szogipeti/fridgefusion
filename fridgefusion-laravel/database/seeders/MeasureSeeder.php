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
            ['id' => 1,'name' => 'tablespoon', 'standard_measure_id' => 14, 'conversion_rate' => 15],
            ['id' => 2,'name' => 'teaspoon', 'standard_measure_id' => 14, 'conversion_rate' => 5],
            ['id' => 5,'name' => 'cup', 'standard_measure_id' => 14, 'conversion_rate' => 250],
            ['id' => 11,'name' => 'gram', 'standard_measure_id' => 11, 'conversion_rate' => 1],
            ['id' => 12,'name' => 'kilogram', 'standard_measure_id' => 11, 'conversion_rate' => 1000],
            ['id' => 13,'name' => 'liter', 'standard_measure_id' => 14, 'conversion_rate' => 1000],
            ['id' => 14,'name' => 'milliliter', 'standard_measure_id' => 14, 'conversion_rate' => 1],
            ['id' => 15,'name' => 'to taste', 'standard_measure_id' => 15, 'conversion_rate' => 1],
            ['id' => 16,'name' => 'pinch', 'standard_measure_id' => 11, 'conversion_rate' => 0.36],
            ['id' => 17,'name' => 'piece', 'standard_measure_id' => 17, 'conversion_rate' => 1],
            ['id' => 18,'name' => 'handful', 'standard_measure_id' => 14, 'conversion_rate' => 125],
            ['id' => 19,'name' => 'dash', 'standard_measure_id' => 11, 'conversion_rate' => 0.72],
            ['id' => 20,'name' => 'slice', 'standard_measure_id' => 17, 'conversion_rate' => 0.1],
            ['id' => 21,'name' => 'pack', 'standard_measure_id' => 17, 'conversion_rate' => 6],
            ['id' => 22,'name' => 'sprig', 'standard_measure_id' => 17, 'conversion_rate' => 1],
        ]);
    }
}
