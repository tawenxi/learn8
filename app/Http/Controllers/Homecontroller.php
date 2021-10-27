<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yusuanman;

class Homecontroller extends Controller
{
    public function findman($keyword) {
        $results = Yusuanman::where('unit', 'like', "%$keyword%")
            ->Orwhere('education', 'like', "%$keyword%")
            ->Orwhere('name', 'like', "%$keyword%")
            ->Orwhere('certificateid', 'like', "%$keyword%")
            ->get();
           
        return view('static_pages.yusuanman_findman',compact('results','keyword'));

    }
}
