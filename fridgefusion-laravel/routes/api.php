<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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

Route::controller(RecipeController::class)->group(function (){
    Route::get('/recipes', 'index')->name('recipes.index');
    Route::get('/recipes/{id}', 'show')->whereNumber('id')->name('recipes.show');
    Route::middleware(["auth:sanctum"])->post('/recipes', 'store')->name('recipes.store');
    Route::middleware(["auth:sanctum"])->put('/recipes/{id}', 'update')->whereNumber('id')->name('recipes.update');
    Route::middleware(["auth:sanctum"])->delete('/recipes/{id}', 'destroy')->whereNumber('id')->name('recipes.destroy');
});

Route::controller(IngredientController::class)->group(function (){
    Route::get('/ingredients', 'index')->name('ingredients.index');
    Route::get('/ingredients/{id}', 'show')->whereNumber('id')->name('ingredients.show');
});

Route::controller(MeasureController::class)->group(function (){
    Route::get('/measures', 'index')->name('measures.index');
    Route::get('/measures/{id}', 'show')->whereNumber('id')->name('measures.show');
});

Route::controller(AuthController::class)->group(function (){
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/register', 'register')->name('auth.register');
    Route::middleware(["auth:sanctum"])->get('/profile', 'profile')->name('auth.profile');
    Route::middleware(["auth:sanctum"])->post('/logout','logout')->name('auth.logout');
});

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
