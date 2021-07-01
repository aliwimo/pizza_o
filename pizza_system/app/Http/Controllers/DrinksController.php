<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinksController extends Controller
{
    public function index() {
        $drinks = Drink::all();
        return view('drink.index')->with('drinks', $drinks);
    }

    public function create() {
        return view('drink.create');
    }

    public function store(Request $request) {
        $drink = Drink::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        return redirect(route('drink.index'));
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $drink = Drink::find($id);
        return view('drink.edit')->with('drink', $drink);
    }

    public function update(Request $request, $id) {
        Drink::where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
            ]);

        return redirect(route('drink.index'));
    }

    public function destroy($id) {
        Drink::where('id', $id)->first()->delete();
        return redirect(route('drink.index'));
    }
}
