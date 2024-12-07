<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repairorder extends Model
{
    protected $fillable = 
    [
    'name',
    'tel',
    'plate',
    'zone',
    'year',
    'model',
    'make',
    'chasis',
    'km',
    'user_id',
    'car_id',
    'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
}
