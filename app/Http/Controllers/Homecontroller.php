<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yusuanman;
use App\Adjust;
use App\Village;
use App\Organization;
use App\Office;
use App\TransferAccount;
use App\Gongyang;
use App\Maninfo;
use App\Imports\ManinfoImport;
use Xiaobopang\Pinyin\Pinyin;
use Maatwebsite\Excel\Facades\Excel;


class Homecontroller extends Controller
{
    public $offices;

    public function __construct(){
        $this->offices = Office::all()->pluck('office');
    }

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

    public function gongyang($keyword) {

        $results = Gongyang::where('personname', 'like',"%$keyword%")
            ->Orwhere('unitname', 'like',"%$keyword%")
            ->orderby('unitname','desc')
            ->get();

            //dd($results->count());
            return view('static_pages.gongyang',compact('results','keyword'));
    }

    public function summarize($keyword) {
        $results1 =TransferAccount::where('orderid', 'like', "%$keyword%")
        ->Orwhere('personname', 'like', "%$keyword%")
        ->Orwhere('unit', 'like', "%$keyword%")
        ->Orwhere('ordertype', 'like', "%$keyword%")
        ->Orwhere('office', 'like', "%$keyword%")
        ->orderby('unit')
        ->get()->groupBy('unit');

        $results2 = Adjust::where('unit', 'like', "%$keyword%")
        ->Orwhere('name', 'like', "%$keyword%")
        ->Orwhere('zhaiyao', 'like', "%$keyword%")
        ->Orwhere('office', 'like', "%$keyword%")
        ->orderby('unit')
        ->get()->groupBy('unit');
        $results = $results1->mergeRecursive($results2)->flatten()->groupBy('unit');
        return view('static_pages.summarize',compact('results','keyword'));
    }


    public function gongyanginfo($keyword) {

        $results = Gongyang::where('unitname', 'like', "%$keyword%")
        ->Orwhere('personname', 'like', "%$keyword%")
        ->get()->groupby('unitname');

           //dd($results->count());
        return view('static_pages.gongyanginfo',compact('results','keyword'));
    }

    public function maninfo($keyword=NULL,$excel=0) {
        $filtered = [];
        if ($excel) {
            $array = Excel::toCollection(new ManinfoImport, base_path('\excel\maninfo\maninfo.xls'))->first()->pluck('姓名')->toarray();
           //dd($array);
            $results = Maninfo::wherein('name',$array)->get();
            $collection = collect($array);
            $filtered = $collection->diff($results->pluck('name')->toarray());
           
            
        } else {
        $results = Maninfo::where('name', 'like', "%$keyword%")
            ->Orwhere('danwei', 'like', "%$keyword%")
            ->get();
        }
       
        return view('static_pages.maninfo',compact('results','keyword','filtered'));
    }
}
