<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $table = 'pizzas';
    protected $primaryKey = 'id';
    protected $fillable = ['size', 'price'];

    public function pizzaIngredients() {
        return $this->hasMany(PizzaIngredient::class);
    }

}
