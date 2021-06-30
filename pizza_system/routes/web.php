<?php

use App\Http\Controllers\DrinkOrdersController;
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

// for pizza order
Route::get("/pizza", [PizzasController::class, "index"]);
Route::get("/pizza/create", [PizzasController::class, "create"]);
Route::post("/pizza", [PizzasController::class, "store"]);

// for drinks order
Route::get('/drink_order', [DrinkOrdersController::class, 'index']);
Route::get('/drink_order/create', [DrinkOrdersController::class, 'create']);
Route::post('/drink_order', [DrinkOrdersController::class, 'store']);

