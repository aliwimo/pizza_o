<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function store(Request $request) {
        // get pizzas
        if (Session::has('pizzas')) {
            $pizzas = Session::get('pizzas');
            // dd($pizzas);
        }

        // get drinks
        if (Session::has('drinks')) {
            $drinks = Session::get('drinks');
            dd($drinks);
        }
    }

}
