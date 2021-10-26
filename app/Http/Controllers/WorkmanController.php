<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workman;

class WorkmanController extends Controller
{
    public function index ($keyword) {


        $results = Workman::where('unitname', 'like', "%$keyword%")->get();

        return view('static_pages.workman_index',compact('results','keyword'));


    }

    public function home () {


        $Workmen = Workman::all();

        $results = $Workmen->groupBy('unitname');

        //dd($results);

        return view('static_pages.workman_home',compact('results'));


    }
}
