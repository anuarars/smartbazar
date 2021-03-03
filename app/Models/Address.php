<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['name', 'city', 'home', 'street', 'unit'];

    public function addressable()
    {
        return $this->morphTo();
    }
}