<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    public function email()
    {
        return $this->morphOne('App\Models\Email', 'emailable');
    }
}