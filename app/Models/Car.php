<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['plate','zone','year','model','make','chasis','customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
