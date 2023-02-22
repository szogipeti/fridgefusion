<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [ 'id' => 1, 'name' => 'Dairy' ],
            [ 'id' => 2, 'name' => 'Sauce' ],
            [ 'id' => 3, 'name' => 'Vegetable' ],
            [ 'id' => 4, 'name' => 'Spice' ],
            [ 'id' => 5, 'name' => 'Meat' ],
            [ 'id' => 6, 'name' => 'Bakery' ],
            [ 'id' => 7, 'name' => 'Oil' ],
            [ 'id' => 8, 'name' => 'Vinegar' ],
            [ 'id' => 9, 'name' => 'Protein' ],
            [ 'id' => 10, 'name' => 'Sweetener' ],
            [ 'id' => 11, 'name' => 'Fruit' ],
            [ 'id' => 12, 'name' => 'Liquid' ],
            [ 'id' => 13, 'name' => 'Ice' ],
            [ 'id' => 14, 'name' => 'Seafood' ],
            [ 'id' => 15, 'name' => 'Can' ],
            [ 'id' => 16, 'name' => 'Pasta' ],
            [ 'id' => 17, 'name' => 'Grain' ],
            [ 'id' => 18, 'name' => 'Other' ],
            [ 'id' => 19, 'name' => 'Wine' ],
            [ 'id' => 20, 'name' => 'Jar' ],
            [ 'id' => 21, 'name' => 'Flavor enhancer' ],
            [ 'id' => 22, 'name' => 'Leavening agent' ],
            [ 'id' => 23, 'name' => 'Seasoning' ],
            [ 'id' => 24, 'name' => 'Nut' ],
        ]);
    }
}
