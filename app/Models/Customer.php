<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name','tel'];

    public function cars(){
        $this->hasMany(Car::class);
    }
}
