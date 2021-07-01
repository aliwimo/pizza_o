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


// ingredients routes
Route::resource('/ingredient', IngredientsController::class);

// drinks routes
Route::resource('/drink', DrinksController::class);

// pizza routes
Route::get("/pizza", [PizzasController::class, "index"])->name('pizza.index');
Route::get("/pizza/create", [PizzasController::class, "create"])->name('pizza.create');
Route::post("/pizza", [PizzasController::class, "store"])->name('pizza.store');

// drink order routes
Route::get('/drink_order', [DrinkOrdersController::class, 'index'])->name('drink_order.index');
Route::get('/drink_order/create', [DrinkOrdersController::class, 'create'])->name('drink_order.create');
Route::post('/drink_order', [DrinkOrdersController::class, 'store'])->name('drink_order.store');

