<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasureController;

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

Route::get('/measures', [IngredientController::class, 'index'])->name('measures.index');
Route::get('/measures/{id}', [IngredientController::class, 'show'])->whereNumber('id')->name('measures.show');
Route::post('/measures', [IngredientController::class, 'store'])->name('measures.store');
Route::put('/measures/{id}', [IngredientController::class, 'update'])->whereNumber('id')->name('measures.update');
Route::delete('/measures/{id}', [IngredientController::class, 'destroy'])->whereNumber('id')->name('measures.destroy');

Route::post('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');
Route::post('/register',[\App\Http\Controllers\AuthController::class,'register'])->name('auth.register');
