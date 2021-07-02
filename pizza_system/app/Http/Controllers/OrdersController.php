<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function store(Request $request) {
        // git pizzas
        if (Session::has('pizzas')) {
            $pizzas = Session::get('pizzas');
            dd($pizzas);
        }

    }

}
