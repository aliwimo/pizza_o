<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index() {

        // get drinks
        if (Session::has('drinks')) {
            $drinks_quantity = Session::get('drinks');
            $drinks_ids = array_keys($drinks_quantity);
            $drinks = Drink::whereIn('id', $drinks_ids)->get();
        } else {
            $drinks_quantity = null;
            $drinks = null;
        }
        // git pizzas
        if (Session::has('pizzas')) {
            $pizzas = Session::get('pizzas');
        } else {
            $pizzas = null;
        }
        return view('cart.index')->with('drinks', $drinks)->with('quantity', $drinks_quantity)->with('pizzas', $pizzas);
    }

    public function add(Request $request, $category, $id) {
        if ($category === 'drink') {
            $this->add_drink($id);
        } else if($category === 'pizza') {
            $this->add_pizza($request);
        }
        return redirect(route('cart.index'));
    }

    public function remove(Request $request, $category, $id) {
        if ($category === 'drink') {
            $this->remove_drink($id);
        } else if($category === 'pizza') {
            $this->remove_pizza($id);
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

    public function remove_drink($id) {
        $drinks_array = Session::get('drinks');
        unset($drinks_array["$id"]);
        Session::put('drinks', $drinks_array);
        Session::save();
    }

    public function remove_pizza($id) {
        $pizzas_array = Session::get('pizzas');
        unset($pizzas_array["$id"]);
        Session::put('pizzas', $pizzas_array);
        Session::save();
    }

    public function flush() {
        Session::flush();
        return redirect(route('drink.index'));
    }
}

