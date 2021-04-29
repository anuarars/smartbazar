<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $fillable = ['email'];
    
    // public function email()
    // {
    //     return $this->morphOne('App\Models\Email', 'emailable');
    // }
}