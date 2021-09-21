<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'stock', 'price'
    ];

    public function sales(){
        return $this->hasMany('App\Sale');
    }
}
