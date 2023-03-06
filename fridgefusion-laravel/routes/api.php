<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\AuthController;

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

Route::controller(RecipeController::class)->group(function (){
    Route::get('/recipes', 'index')->name('recipes.index');
    Route::get('/recipes/{id}', 'show')->whereNumber('id')->name('recipes.show');
    Route::post('/recipes', 'store')->name('recipes.store');
    Route::put('/recipes/{id}', 'update')->whereNumber('id')->name('recipes.update');
    Route::delete('/recipes/{id}', 'destroy')->whereNumber('id')->name('recipes.destroy');
});

Route::controller(IngredientController::class)->group(function (){
    Route::get('/ingredients', 'index')->name('ingredients.index');
    Route::get('/ingredients/{id}', 'show')->whereNumber('id')->name('ingredients.show');
    Route::post('/ingredients', 'store')->name('ingredients.store');
    Route::put('/ingredients/{id}', 'update')->whereNumber('id')->name('ingredients.update');
    Route::delete('/ingredients/{id}', 'destroy')->whereNumber('id')->name('ingredients.destroy');
});

Route::controller(MeasureController::class)->group(function (){
    Route::get('/measures', 'index')->name('measures.index');
    Route::get('/measures/{id}', 'show')->whereNumber('id')->name('measures.show');
    Route::post('/measures', 'store')->name('measures.store');
    Route::put('/measures/{id}', 'update')->whereNumber('id')->name('measures.update');
    Route::delete('/measures/{id}', 'destroy')->whereNumber('id')->name('measures.destroy');
});

Route::controller(AuthController::class)->group(function (){
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/register', 'register')->name('auth.register');
    Route::middleware(["auth:sanctum"])->get('/profile', 'users')->name('auth.users');
    Route::middleware(["auth:sanctum"])->post('/logout','logout')->name('auth.logout');
});
