<?php

namespace Tests\Unit;

use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecipeApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function setUp():void{
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_get_all_recipe()
    {

        $recipes = RecipeResource::collection(Recipe::all());
        $recipe = $recipes->collection->first();
        $response = $this->getJson('api/recipes');
        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json
                    ->has('data', $recipes->count())
                    ->has('data.0', fn(AssertableJson $json) =>
                        $json
                            ->where('id', 1)
                            ->where('name', $recipe['name'])
                            ->whereType('method', 'array')
                            ->where('category', $recipe['category'])
                            ->where('publisher', $recipe['publisher'])
                            ->where('image', $recipe['image'])
                            ->where('total_time', $recipe['total_time'])
                            ->where('serving', $recipe['serving'])
                            ->whereType('ingredients', 'array')
                            ->etc()
                    )
            );

    }
    public function test_get_recipe(){
        $recipe = new RecipeResource(Recipe::findOrFail(1));
        $response = $this->getJson('api/recipes/1');
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json
                ->has('data', fn(AssertableJson $json) =>
                $json
                    ->where('id', 1)
                    ->where('name', $recipe['name'])
                    ->whereType('method', 'array')
                    ->where('category', $recipe['category'])
                    ->where('publisher', $recipe['publisher'])
                    ->where('image', $recipe['image'])
                    ->where('total_time', $recipe['total_time'])
                    ->where('serving', $recipe['serving'])
                    ->whereType('ingredients', 'array')
                )
            );
    }

    private function createRecipeBody(){
        return [
            "name" => "Alma",
            "method" => [
                "1. Preheat oven to 350 degrees. Spray a small (4 \u2013 5 cup) baking dish with non-stick cooking spray.",
                "2. In a mixing bowl stir together cream cheese, sour cream, mayonnaise, garlic, parmesan, mozzarella and pepper.",
                "3. Stir in artichokes and spinach.",
                "4. Spread mixture evenly into prepared baking dish.",
                "5. Bake in preheated oven until heated through and melty, about 20 minutes.",
                "6. Serve warm."
            ],
            "category" => "Appetizer",
            "publisher" => "Gastroworkshop",
            "image" => "1.jpg",
            "total_time" => 35,
            "serving" => 4,
            "ingredients" => [
                [
                    "ingredient_id" => 1,
                    "measure_id" => 15,
                    "quantity" => 0
                ]
            ]
        ];
    }

    public function test_create_recipe(){
        $response = $this->postJson('/api/recipes', $this->createRecipeBody());

        $response
            ->assertStatus(201)
            ->assertJsonPath('data.name', 'Alma');
        $recipes = Recipe::all();
        $this->assertModelExists($recipes->firstWhere('name', 'Alma'));
    }

    public function test_update_recipe(){
        $response = $this->putJson('/api/recipes/1', $this->createRecipeBody());

        $response
            ->assertStatus(200)
            ->assertJsonPath('data.name', 'Alma');
        $recipes = Recipe::all();
        $firstRecipe = $recipes->first();
        $this->assertEquals('Alma', $firstRecipe['name']);
    }

    public function test_delete_recipe(){
        $recipe = Recipe::findOrFail(1);
        $response = $this->delete('api/recipes/1');
        $response->assertStatus(200);
        $this->assertModelMissing($recipe);
    }
}
