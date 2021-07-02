<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {

        $drinks_quantity = null;
        $drinks = null;
        $pizzas = null;

        // get drinks
        if (Session::has('drinks')) {
            $drinks_quantity = Session::get('drinks');
            $drinks_ids = array_keys($drinks_quantity);
            $drinks = Drink::whereIn('id', $drinks_ids)->get();
        }

        // git pizzas
        if (Session::has('pizzas')) {
            $pizzas = Session::get('pizzas');
        }

        return view('cart.index')->with('drinks', $drinks)->with('quantity', $drinks_quantity)->with('pizzas', $pizzas);
    }

    public function add(Request $request, $category, $id) {
        if ($category === 'drinks') {
            $this->add_drink($id);
        } else if($category === 'pizzas') {
            $this->add_pizza($request);
        }
        return redirect(route('cart.index'));
    }

    public function add_drink($id) {
        if (Session::has('drinks')) {
            $drinks_array = Session::get('drinks');
            if (isset($drinks_array["$id"]))
                $drinks_array["$id"]++;
            else
                $drinks_array["$id"] = 1;
            Session::put('drinks', $drinks_array);
            Session::save();

        } else {
            Session::put('drinks', [$id => 1]);
            Session::save();
        }
    }

    public function add_pizza(Request $request) {
        // generate a temperoray id for the pizza to use it when remove from cart
        $id = substr(md5(rand(10000, 99999)), 0, 5);
        $pizza = [
            'id' => $id,
            'size' => $request->input('size'),
            'quantity' => $request->input('quantity'),
            'ingredients' => $request->input('ingredients'),
        ];

        if (Session::has('pizzas')) {
            $pizzas_array = Session::get('pizzas');
            $pizzas_array["$id"] = $pizza;
            Session::put('pizzas', $pizzas_array);
            Session::save();
        } else {
            Session::put('pizzas', [$id => $pizza]);
            Session::save();
        }
    }

    public function remove($category, $id) {
        $items = Session::get($category);
        unset($items["$id"]);
        if (count($items) == 0) {
            Session::forget($category);
        } else {
            Session::put($category, $items);
            Session::save();
        }
        return redirect(route('cart.index'));
    }

    public function empty_cart() {
        Session::forget('drinks');
        Session::forget('pizzas');
        return redirect(route('cart.index'));
    }
}

