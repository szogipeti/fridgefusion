<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecipeResource;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RecipeRequest;

class RecipeController extends Controller
{
    private function convertToModelArray($resourceRecipe){
        return [
            'name' => $resourceRecipe['name'],
            'method' => Arr::join($resourceRecipe['method'], ';'),
            'category' => $resourceRecipe['category'],
            'publisher' =>  $resourceRecipe['publisher'],
            'image' =>  $resourceRecipe['image'],
            'total_time' =>  $resourceRecipe['total_time'],
            'serving' =>  $resourceRecipe['serving']
        ];
    }

    private function insertIngredientsToMadeFromTable($ingredients, $recipeId){
        foreach ($ingredients as $ingredient){
            DB::table('made_from')->insert([
                'recipe_id' => $recipeId,
                'ingredient_id' => $ingredient['ingredient_id'],
                'measure_id' => $ingredient['measure_id'],
                'quantity' => $ingredient['quantity']
            ]);
        }
    }

    private function deleteMadeFromConnections($recipeId){
        DB::table('made_from')->where('recipe_id', '=', $recipeId)->delete();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecipeResource::collection(Recipe::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
        $validated = $request->validated();
        $recipe = Recipe::create($this->convertToModelArray($validated));
        $this->insertIngredientsToMadeFromTable($validated['ingredients'], $recipe['id']);
        return new RecipeResource($recipe);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        return new RecipeResource(Recipe::findOrfail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, $id)
    {
        $validated = $request->validated();
        $recipe = Recipe::findOrFail($id);
        $newRecipe = $this->convertToModelArray($validated);
        $this->deleteMadeFromConnections($recipe['id']);
        $this->insertIngredientsToMadeFromTable($validated['ingredients'], $recipe['id']);
        $recipe->update($newRecipe);
        return new RecipeResource($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrfail($id);
        $this->deleteMadeFromConnections($recipe['id']);
        Recipe::findOrfail($id)->delete();
    }
}
