<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workman;

class WorkmanController extends Controller
{
    public function index ($keyword, $key='') {


        $results = Workman::where('unitname', 'like', "%$keyword%")->orWhere('personname', 'like', "%$keyword%")->orderBy('salary1','desc')->get();
        //dd($results->first()->has($key));

        return view('static_pages.workman_index',compact('results','keyword','key'));


    }

    public function home () {


        $Workmen = Workman::all();

        $results = $Workmen->groupBy('unitname');

        //dd($results);

        return view('static_pages.workman_home',compact('results'));


    }
}
