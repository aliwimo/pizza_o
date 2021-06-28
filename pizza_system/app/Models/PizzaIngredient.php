<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaIngredient extends Model
{
    use HasFactory;

    protected $table = 'pizza_ingredients';
    protected $primaryKey = 'id';
    protected $fillable = ['pizza_id', 'name'];

    public function pizza() {
        return $this->belongsTo(Pizza::class);
    }
}
