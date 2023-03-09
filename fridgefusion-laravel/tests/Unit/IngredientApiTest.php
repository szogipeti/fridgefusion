<?php

namespace Tests\Unit;

use App\Http\Resources\IngredientResource;
use App\Models\Ingredient;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IngredientApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_get_all_ingredient()
    {

        $ingredients = IngredientResource::collection(Ingredient::all());
        $ingredient = $ingredients->collection->first();
        $response = $this->getJson('api/ingredients');
        $response
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data', $ingredients->count())
                ->has('data.0', fn(AssertableJson $json) => $json
                    ->where('id', 1)
                    ->where('name', $ingredient['name'])
                    ->whereType('category', 'array')
                    ->whereType('validMeasures', 'array')
                    ->etc()
                )
            );

    }

    public function test_get_ingredient()
    {
        $ingredient = new IngredientResource(Ingredient::findOrFail(1));
        $response = $this->getJson('api/ingredients/1');
        $response
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data', fn(AssertableJson $json) => $json
                    ->where('id', 1)
                    ->where('name', $ingredient['name'])
                    ->whereType('category', 'array')
                    ->whereType('validMeasures', 'array')
                )
            );
    }
}
