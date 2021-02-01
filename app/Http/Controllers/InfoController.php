<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function delivery(){
        return view('pages.delivery');
    }
}
