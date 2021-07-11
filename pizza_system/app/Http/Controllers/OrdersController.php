<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function store(Request $request) {
        // get pizzas
        if (Session::has('pizzas')) {
            $this->store_pizza();
        }

        // get drinks
        if (Session::has('drinks')) {
            $this->store_drink();
        }
    }

    public function store_pizza() {
        $pizzas = Session::get('pizzas');
        dd($pizzas);
    }

    public function store_drink() {
        $drinks = Session::get('drinks');
        dd($drinks);
    }

}
