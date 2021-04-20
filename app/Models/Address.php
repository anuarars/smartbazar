<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['description'];

    public function addressable()
    {
        return $this->morphTo();
    }
}