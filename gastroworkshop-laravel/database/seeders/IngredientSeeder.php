<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("ingredients")->insert(
            [
			['id' => '1','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '2','name' => 'Sour cream','category' => 'Dairy','integer' => false],
			['id' => '3','name' => 'Mayonnaise','category' => 'Dairy','integer' => false],
			['id' => '4','name' => 'Mozzarella','category' => 'Dairy','integer' => false],
			['id' => '5','name' => 'Spinach','category' => 'Vegetable','integer' => true],
			['id' => '6','name' => 'Artichokes','category' => 'Vegetable','integer' => true],
			['id' => '7','name' => 'Garlic','category' => 'Seasoning','integer' => false],
			['id' => '8','name' => 'Pepper','category' => 'Seasoning','integer' => false],
			['id' => '9','name' => 'Salt','category' => 'Spice','integer' => false],
			['id' => '10','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '11','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '12','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '13','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '14','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '15','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '16','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '17','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '18','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '19','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '20','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '21','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '22','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '23','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '24','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '25','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '26','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '27','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '28','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '29','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '30','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '31','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '32','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '33','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '34','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
			['id' => '35','name' => 'Cream cheese','category' => 'Dairy','integer' => false],
            ]);
    }
}
