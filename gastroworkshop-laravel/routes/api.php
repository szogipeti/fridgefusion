<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

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

