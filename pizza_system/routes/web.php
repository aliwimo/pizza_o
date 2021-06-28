<?php

use App\Http\Controllers\DrinksController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\PizzasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/ingredient', IngredientsController::class);
Route::resource('/drinks', DrinksController::class);
Route::get("/pizza", [PizzasController::class, "index"])->name("pizza_make");
Route::get("/pizza/list", [PizzasController::class, "list"])->name("pizza_list");
Route::post("/pizza", [PizzasController::class, "store"])->name("pizza_store");
