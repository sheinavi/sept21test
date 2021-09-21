<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer', 'product_id', 'price', 'quantity','cost_total'
    ];

    public function product(){
       return $this->belongsTo('App\Product');
    }
}
