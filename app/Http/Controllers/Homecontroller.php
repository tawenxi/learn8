<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yusuanman;
use App\Adjust;

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

    public function mutiman(){
        // Yusuanman::where('unit','like','%司法所%')->delete();
        $results = Yusuanman::get()->groupBy('certificateid')->filter(function($value,$key){
            return $value->count()>1;
        })->flatten();
        return view('static_pages.yusuanman_mutiman',compact('results'));
    }


    public function adjust(){
        $results = Adjust::all()->groupBy('unit');

        //dd($results);
        return view('static_pages.adjust_home',compact('results'));
    }
}
