<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrinkOrder extends Model
{
    use HasFactory;

    protected $table = 'drink_orders';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'name', 'quantity'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

}
