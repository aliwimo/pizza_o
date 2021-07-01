<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use ingredients;

class IngredientsController extends Controller
{
    public function index() {
        $ingredients = Ingredient::all();
        return view('ingredient.index')->with('ingredients', $ingredients);
    }

    public function create() {
        return view('ingredient.create');
    }

    public function store(Request $request) {
        $ingredient = Ingredient::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        return redirect(route('ingredient.index'));
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $ingredient = Ingredient::find($id);
        return view('ingredient.edit')->with('ingredient', $ingredient);
    }

    public function update(Request $request, $id) {
        $ingredient = Ingredient::where('id', $id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);


        return redirect(route('ingredient.index'));
    }

    public function destroy($id) {
        Ingredient::where('id', $id)->first()->delete();
        return redirect(route('ingredient.index'));
    }
}
