<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yusuanman;
use App\Adjust;

class Homecontroller extends Controller
{


    public function home(){
        return view('static_pages.homepage');

    }
    public function findman($keyword) {
        if (strstr($keyword,'人民政府')) {
            $keyword = str_replace("人民政府", "", $keyword);

            $keyword1 = $keyword.'事业';
            $keyword2 = $keyword.'行政';

            $results = Yusuanman::where('unit', 'like',"%$keyword1%")
            ->Orwhere('unit', 'like',"%$keyword2%")
            ->orderby('formation','desc')
            ->get();

            //dd($results->count());
            return view('static_pages.yusuanman_findman',compact('results','keyword'));
        }

        

        $results = Yusuanman::where('unit', 'like', "%$keyword%")
            ->Orwhere('education', 'like', "%$keyword%")
            ->Orwhere('name', 'like', "%$keyword%")
            ->Orwhere('certificateid', 'like', "%$keyword%")
            ->orderby('formation','desc')
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

    public function adjustorder($keyword)
    {
        $results = Adjust::where('unit', 'like', "%$keyword%")
            ->Orwhere('name', 'like', "%$keyword%")
            ->Orwhere('zhaiyao', 'like', "%$keyword%")
            ->get();
        return view('static_pages.adjust_order',compact('results','keyword'));
    }
    public function adjustlist(){
        $results = Adjust::all()->groupBy('unit');

        //dd($results);
        return view('static_pages.adjustlist',compact('results'));
    }
}
