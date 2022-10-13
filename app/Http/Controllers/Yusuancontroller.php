<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yusuan;
use App\Yusuanman;

use App\Workman;

class Yusuancontroller extends Controller
{
    public function compare($keyword,$amount=0) {
        

        $results_2021 = Yusuan::where('danwei', 'like', "%$keyword%")->first();
        $res_sys_2021 = Yusuanman::where('unit', 'like', "%$keyword%")->get();

        $haha = Workman::where('unitname', 'like', "%$keyword%")->get();
        
        return view('static_pages.yusuan_compare',compact('results_2021','res_sys_2021','keyword','haha','amount'));
        
            
            
    }
}
