<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\PizzaIngredient;
use Illuminate\Http\Request;

class PizzasController extends Controller
{
    public function index() {
        $pizzas = Pizza::all();
        return view('pizza.index')->with('pizzas', $pizzas);
    }

    public function create() {
        $ingredients = Ingredient::All();
        return view('pizza.create')->with('ingredients', $ingredients);
    }

    public function store(Request $request) {

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
        ]);


        for($i = 0; $i < count($request->input('ingredients')); $i++) {
            $pizza_ingredients = PizzaIngredient::create([
                'pizza_id' => $pizza_id,
                'name' => $request->input('ingredients')[$i],
            ]);
        }

        return redirect('/pizza');
    }
}
