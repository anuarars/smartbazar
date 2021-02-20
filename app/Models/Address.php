<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['city', 'home', 'street', 'unit', 'postcode'];

    public function addressable()
    {
        return $this->morphTo();
    }
}