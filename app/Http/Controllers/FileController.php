<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;

class FileController extends Controller
{
    function index ($keyword)
    {

    	$results = Document::where('wenhao', 'like', "%$keyword%")
        ->Orwhere('biaoti', 'like', "%$keyword%")
        ->Orwhere('danwei', 'like', "%$keyword%")
        ->Orwhere('chengbanren', 'like', "%$keyword%")
        ->orderby('shijian','desc')
        ->paginate(100);
        //$test = Document::first()->biaoti;
        //dd($result->first());
    	return view('static_pages.home',compact('results','keyword'));
    }
}

