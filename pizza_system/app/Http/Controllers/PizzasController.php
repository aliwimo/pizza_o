<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\PizzaIngredient;
use Illuminate\Http\Request;

class PizzasController extends Controller
{
    public function index() {
        $ingredients = Ingredient::All();
        return view('pizza.index')->with('ingredients', $ingredients);
    }

    public function list() {
        $pizzas = Pizza::all();
        // dd($pizzas->pizzaIngredients);
        // dd($pizzas);
        return view('pizza.list')->with('pizzas', $pizzas);
    }

    public function store(Request $request) {
        // dd($request);
        // dd($request->input('ingredients')[1]);

        // calculating price
        $price = 0;
        for($i = 0; $i < count($request->input('ingredients')); $i++) {
            $item_price = Ingredient::select('price')
            ->where('name', $request->input('ingredients')[$i])
            ->get();
            $price += $item_price[0]->price;
        }

        $pizza_id = Pizza::insertGetId([
            'size' => $request->input('size'),
            'price' => $price,
            'amount' => $request->input('amount'),
        ]);


        for($i = 0; $i < count($request->input('ingredients')); $i++) {
            $pizza_ingredients = PizzaIngredient::create([
                'pizza_id' => $pizza_id,
                'name' => $request->input('ingredients')[$i],
            ]);
        }

        return redirect('/pizza/list');
    }
}
