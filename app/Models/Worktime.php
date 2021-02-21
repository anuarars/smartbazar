<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Worktime extends Model
{
    protected $fillable = ['company_id', 'weekday_id', 'start_time', 'end_time'];
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function weekday(){
        return $this->belongsTo(Weekday::class);
    }
}