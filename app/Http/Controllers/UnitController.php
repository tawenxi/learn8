<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitController extends Controller
{
    public function index($keyword) {
        $results = Unit::where('unitid', 'like', "%$keyword%")
        ->Orwhere('unitname', 'like', "%$keyword%")
        ->get();

        return view('static_pages.unit',compact('results','keyword'));
    }
}
