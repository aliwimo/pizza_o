<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrinkSeeder extends Seeder
{




    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $drinks = array();
        $drinks[0] = ['name' => 'Pepsi Cola 220ml', 'price' => '3.5'];
        $drinks[1] = ['name' => 'Fanta 220ml', 'price' => '3.5'];
        $drinks[2] = ['name' => 'Miranda 220ml', 'price' => '3.5'];
        $drinks[3] = ['name' => 'Coca Cola 220ml', 'price' => '3.5'];
        $drinks[4] = ['name' => 'Water 350ml', 'price' => '2'];
        $drinks[5] = ['name' => 'Cappy 220ml', 'price' => '3'];

        for ($i = 0; $i < count($drinks); $i++) {
            DB::table('drinks')->insert([
                'name' => $drinks[$i]['name'],
                'price' => $drinks[$i]['price'],
            ]);
        }
    }
}
