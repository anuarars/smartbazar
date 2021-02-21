<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['name'];

    public function emailable()
    {
        return $this->morphTo();
    }
}
