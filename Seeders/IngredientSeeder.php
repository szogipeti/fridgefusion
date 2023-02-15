<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CsapattagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("Ingredient")->insert(
            [
			['id' => '1','name' => 'Cream cheese','category' => 'Dairy'],
			['id' => '2','name' => 'Sour cream','category' => 'Dairy'],			
			['id' => '3','name' => 'Mayonnaise','category' => 'Sauce'],
			['id' => '4','name' => 'Mozzarella','category' => 'Dairy'],
			['id' => '5','name' => 'Spinach','category' => 'Vegetable'],
			['id' => '6','name' => 'Artichokes','category' => 'Vegetable'],
			['id' => '7','name' => 'Garlic','category' => 'Spice'],
			['id' => '8','name' => 'Pepper','category' => 'Spice'],
			['id' => '9','name' => 'Salt','category' => 'Spice'],
			['id' => '10','name' => 'Mushroom','category' => 'Vegetable'],
			['id' => '11','name' => 'Shallot','category' => 'Vegetable'],
			['id' => '12','name' => 'Unsmoked bacon lardons','category' => 'Meat'],
			['id' => '13','name' => 'dried breadcrumbs','category' => 'Bakery'],
			['id' => '14','name' => 'Dried sage','category' => 'Spice'],
			['id' => '15','name' => 'Cheddar cheese','category' => 'Dairy'],
			['id' => '16','name' => 'Tomatoes','category' => 'Vegetable'],
			['id' => '17','name' => 'Basil','category' => 'Vegetable'],
			['id' => '18','name' => 'Crushed red pepper','category' => 'Vegetable'],
			['id' => '19','name' => 'Extra-virgin olive oil','category' => 'Oil'],
			['id' => '20','name' => 'Balsamic vinegar','category' => 'Vinegar'],
			['id' => '21','name' => 'Kosher salt','category' => 'Spice'],
			['id' => '22','name' => 'Baguette','category' => 'Bakery'],
			['id' => '23','name' => 'Egg','category' => 'Protein'],
			['id' => '24','name' => 'Yellow mustard','category' => 'Sauce'],
			['id' => '25','name' => 'Black pepper','category' => 'Spice'],
			['id' => '26','name' => 'Smoked Spanish paprika','category' => 'Spice'],
			['id' => '27','name' => 'white vinegar','category' => 'Vinegar'],
			['id' => '28','name' => 'Brie','category' => 'Dairy'],
			['id' => '29','name' => 'Thyme leafe','category' => 'Spice'],
			['id' => '30','name' => 'Rosemary leafe','category' => 'Spice'],
			['id' => '31','name' => 'Honey','category' => 'Sweetener'],
			['id' => '32','name' => 'Chicken wing','category' => 'Meat'],
			['id' => '33','name' => 'Vegetable oil','category' => 'Oil'],
			['id' => '34','name' => 'Garlic powder','category' => 'Spice'],
			['id' => '35','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '36','name' => 'Butter','category' => 'Dairy'],
			['id' => '37','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '38','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '39','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '40','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '41','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '42','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '43','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '44','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '45','name' => 'Hot sauce','category' => 'Sauce'],
			['id' => '46','name' => 'Hot sauce','category' => 'Sauce'],
			
            ]);
    }
}
