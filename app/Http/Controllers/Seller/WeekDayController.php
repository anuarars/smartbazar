<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\WorkTime;
use Illuminate\Http\Request;

class WeekDayController extends Controller
{

    /**
     * @param $id Company id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTimeOfCompany($id)
    {
        $work_times = request()->work_times;
        $counter = 0;
        foreach ($work_times as $time) {
            WorkTime::updateOrCreate(
                ['weekday_id' => $counter, 'company_id' => $id],
                ['start_time' => $time[0], 'end_time' => $time[1]]);
        }
        return redirect()->back();
    }
}
