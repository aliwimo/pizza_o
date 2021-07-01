<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['address', 'status', 'price', 'order_time', 'deliver_time'];

    public function pizzaOrders() {
        return $this->hasMany(PizzaOrder::class);
    }

    public function drinkOrders() {
        return $this->hasMany(DrinkOrder::class);
    }
}
