<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = array();
        $ingredients[0] = ['name' => 'Tomato', 'price' => '2'];
        $ingredients[0] = ['name' => 'Onion', 'price' => '2'];
        $ingredients[1] = ['name' => 'Cheese', 'price' => '8'];
        $ingredients[2] = ['name' => 'Mushroom', 'price' => '10'];
        $ingredients[3] = ['name' => 'Pepper', 'price' => '3.5'];
        $ingredients[4] = ['name' => 'Shrimp', 'price' => '14'];
        $ingredients[5] = ['name' => 'Sausage', 'price' => '9'];

        for ($i = 0; $i < count($ingredients); $i++) {
            DB::table('ingredients')->insert([
                'name' => $ingredients[$i]['name'],
                'price' => $ingredients[$i]['price'],
            ]);
        }
    }
}
