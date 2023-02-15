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
			['id' => '18','name' => 'Red pepper','category' => 'Vegetable'],
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
			['id' => '37','name' => 'Parmesan','category' => 'Dairy'],
			['id' => '38','name' => 'Avocado ','category' => 'Fruit'],
			['id' => '39','name' => 'Lime','category' => 'Fruit'],
			['id' => '40','name' => 'Onion','category' => 'Vegetable'],
			['id' => '41','name' => 'Cilantro','category' => 'Spice'],
			['id' => '42','name' => 'Cayenne pepper','category' => 'Spice'],
			['id' => '43','name' => 'Chickpeas','category' => 'Vegetable'],
			['id' => '44','name' => 'Water','category' => 'Liquid'],
			['id' => '45','name' => 'Lemon juice','category' => 'Liquid'],
			['id' => '46','name' => 'Sea salt','category' => 'Spice'],
			['id' => '47','name' => 'Tahini','category' => 'Spice'],
			['id' => '48','name' => 'Olive oil','category' => 'Oil'],
			['id' => '49','name' => 'Lemon zest','category' => 'Fruit'],
			['id' => '50','name' => 'Ice','category' => 'Ice'],
			['id' => '51','name' => 'Granulated sugar','category' => 'Sweetener'],
			['id' => '52','name' => 'Parsley','category' => 'Spice'],
			['id' => '53','name' => 'Shrimp','category' => 'Seafood'],
			['id' => '54','name' => 'Chili sauce','category' => 'sauce'],
			['id' => '55','name' => 'Ketchup','category' => 'sauce'],
			['id' => '56','name' => 'Horseradish','category' => 'Vegetable'],
			['id' => '57','name' => 'Worcestershire sauce','category' => 'sauce'],
			['id' => '58','name' => 'Celery salt','category' => 'Spice'],
			['id' => '59','name' => 'Carrot','category' => 'Vegetable'],
			['id' => '60','name' => 'Celery','category' => 'Vegetable'],
			['id' => '61','name' => 'Tomato purée','category' => 'Can'],
			['id' => '62','name' => 'Bay leafe','category' => 'Spice'],
			['id' => '63','name' => 'Stock-cube','category' => 'Spice'],
			['id' => '64','name' => 'Unsalted butter','category' => 'Dairy'],
			['id' => '65','name' => 'Celery ribs','category' => 'Vegetable'],
			['id' => '66','name' => 'Chicken breasts','category' => 'Meat'],
			['id' => '67','name' => 'Egg noodles','category' => 'Pasta'],
			['id' => '68','name' => 'Parsley leafe','category' => 'Spice'],
			['id' => '69','name' => 'Dill','category' => 'Spice'],
			['id' => '70','name' => 'Flour','category' => 'Grains'],
			['id' => '71','name' => 'White wine','category' => 'Wine'],
			['id' => '72','name' => 'Beef Stock-cube','category' => 'Spice'],
			['id' => '73','name' => 'Gruyère','category' => 'Dairy'],

            ]);
    }
}
