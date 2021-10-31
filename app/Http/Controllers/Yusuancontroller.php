<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Yusuancontroller extends Controller
{
    public function compare($keyword) {

        $results = Workman::where('danwei', 'like', "%$keyword%")->orderBy('salary1','desc')->get();



    }
}
