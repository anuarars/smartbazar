<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
}
