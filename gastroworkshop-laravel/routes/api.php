<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->whereNumber('id')->name('recipes.show');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->whereNumber('id')->name('recipes.update');
Route::delete('/recipes/{id}', [RecipeController::class, 'destroy'])->whereNumber('id')->name('recipes.destroy');

Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients.index');
Route::get('/ingredients/{id}', [IngredientController::class, 'show'])->whereNumber('id')->name('ingredients.show');
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::put('/ingredients/{id}', [IngredientController::class, 'update'])->whereNumber('id')->name('ingredients.update');
Route::delete('/ingredients/{id}', [IngredientController::class, 'destroy'])->whereNumber('id')->name('ingredients.destroy');
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/regist',[\App\Http\Controllers\AuthController::class,'regist'])->name('auth.login');
