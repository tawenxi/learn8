<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\Organization;

class UnitController extends Controller
{
    public function index($keyword) {
        $results = Unit::where('unitid', 'like', "%$keyword%")
        ->Orwhere('unitname', 'like', "%$keyword%")
        ->get();

        return view('static_pages.unit',compact('results','keyword'));
    }

    public function organization($keyword=-1) {

        if ($keyword == -1) {
            $results = Organization::all();
        } else {
            $results = Organization::where('unit', 'like', "%$keyword%")
            ->Orwhere('office', 'like', "%$keyword%")
            ->get();
        }

        return view('static_pages.organization',compact('results','keyword'));
    }
}
