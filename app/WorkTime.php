<?php

namespace App;

use App\Models\Company;
use App\Models\Weekday;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function weekDay()
    {
        return $this->belongsTo(Weekday::class);
    }
}
