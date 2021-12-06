<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yusuanman;
use App\Adjust;
use App\Village;
use App\Organization;
use App\Office;
use App\TransferAccount;


class Homecontroller extends Controller
{
    public $offices = ['预算股','农业股','经建办','','企业股','资金核算股','综合计划股'];


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
        $query = Adjust::query();
        if (strstr($keyword,'+')) {
            $condition = explode('+',$keyword);
            $results = $query->where('orderid','like',"%$condition[0]%")->where('unit','like',"%$condition[1]%")->get();
        } elseif(strstr($keyword,'-')) {
            $keyword = str_replace('-','',$keyword);
            $results = $query->where('unit', 'like', "%$keyword%")
            ->Orwhere('name', 'like', "%$keyword%")
            ->Orwhere('zhaiyao', 'like', "%$keyword%")
            ->get()->reject(function($v){return strstr($v->orderid,'丧') OR strstr($v->orderid,'职');});

        } else {
            $results = $query->where('unit', 'like', "%$keyword%")
            ->Orwhere('name', 'like', "%$keyword%")
            ->Orwhere('zhaiyao', 'like', "%$keyword%")
            ->Orwhere('office', 'like', "%$keyword%")
            ->orderby('unit')
            ->get();
        }
        $results = $results->groupBy('unit');
        return view('static_pages.adjust_order',compact('results','keyword'));
    }
    public function adjustlist(){
        $results = Adjust::all()->groupBy('unit')->sortByDesc(function ($value, $key) {
    return $value->sum('amount');
});

        //dd($results);
        return view('static_pages.adjustlist',compact('results'));
    }


    public function village($keyword=-1)
    {
        if ($keyword == -1) {
            $results = Village::all();
        } else {
            $results = Village::where('name', 'like', "%$keyword%")
            ->Orwhere('belongto', 'like', "%$keyword%")
            ->Orwhere('class', 'like', "%$keyword%")
            ->get();
            
        }
        
        return view('static_pages.village',compact('results','keyword'));
    
    }


    public function status2() {
        //return 1;
        $results = Organization::wherein('office',$this->offices)->get();
        $payments = Office::wherein('office',$this->offices)->get();
        
        return view('static_pages.status2',compact('results','payments'));   
    }


    public function status() {
   
        $results = Organization::with(['transfers', 'adjusts'])->wherein('office',$this->offices)->get();
        $offices = Office::with(['organizations.transfers','organizations.adjusts','transfers', 'adjusts'])->wherein('office',$this->offices)->get();
        
        return view('static_pages.status',compact('results','offices'));   
    }
}
