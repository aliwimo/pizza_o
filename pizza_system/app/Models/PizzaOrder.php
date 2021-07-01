<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaOrder extends Model
{
    use HasFactory;
    protected $table = 'pizza_orders';
    protected $primaryKey = 'id';
    protected $fillable = ['pizza_id', 'order_id', 'quantity'];

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
