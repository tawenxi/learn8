<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransferOrder;
use App\TransferAccount;
use App\Organization;

class TransferController extends Controller
{

    public function index ($keyword)
    {
        
        $results =TransferAccount::where('orderid', 'like', "%$keyword%")
        ->Orwhere('personname', 'like', "%$keyword%")
        ->Orwhere('unit', 'like', "%$keyword%")
        ->Orwhere('ordertype', 'like', "%$keyword%")
        ->Orwhere('office', 'like', "%$keyword%")
        ->orderby('unit')
        ->get()->groupBy('unit');
        return view('static_pages.transferorder_index',compact('results','keyword'));
        
    }
    public function list ()
    {
        
        //$results = TransferAccount::where('ordertype','新增')->where('unit','like',"%行政%")->get()->groupBy('unit');
        $results = TransferAccount::all()->groupBy('unit');

        return view('static_pages.transferorder_list',compact('results'));
        
    }
    public function list2 ()
    {
        $results = Organization::all();

        //$transfers = TransferAccount::
        return view('static_pages.transferorder_list2',compact('results'));
        
    }
    public function list3 ()
    {
        $results = Organization::all();

        //$transfers = TransferAccount::
        return view('static_pages.transferorder_list3',compact('results'));
        
    }

    public function home ()
    {

        $results = TransferAccount::all()->groupBy('unit')->sortBy(function($v,$k){return $k;});

        //dd($results);
        return view('static_pages.transferorder_home',compact('results'));
        
    }

    public function shiye ($type)
    {
        $TransferAccount = TransferAccount::where('ordertype',$type)->get();


        $array = collect(['泉江事业','雩田事业','碧洲事业','草林事业','堆子前事业','左安事业','高坪事业','大汾事业','衙前事业','禾源事业','汤湖事业','枚江事业','珠田事业','巾石事业','大坑事业','双桥事业','新江事业','五斗江事业','西溪事业','南江事业','黄坑事业','戴家埔事业','营盘圩事业']);
        $results = $TransferAccount->groupBy('unit');
        $results = $results->filter(function($value,$key) use ($array) {
            return $array->contains($key);
        });
      
        return view('static_pages.transferorder_home',compact('results'));
        
    }

    public function xingzheng ($type)
    {
        $TransferAccount = TransferAccount::where('ordertype',$type)->get();
        $array = collect(['泉江行政','雩田行政','碧洲行政','草林行政','堆子前行政','左安行政','高坪行政','大汾行政','衙前行政','禾源行政','汤湖行政','枚江行政','珠田行政','巾石行政','大坑行政','双桥行政','新江行政','五斗江行政','西溪行政','南江行政','黄坑行政','戴家埔行政','营盘圩行政']);
        $results = $TransferAccount->groupBy('unit');
        $results = $results->filter(function($value,$key) use ($array) {
            return $array->contains($key);
        });      
        return view('static_pages.transferorder_home',compact('results'));
        
    }


    public function xianzhi ()
    {
        $TransferAccount = TransferAccount::all();


        $array = collect(['泉江行政','雩田行政','碧洲行政','草林行政','堆子前行政','左安行政','高坪行政','大汾行政','衙前行政','禾源行政','汤湖行政','枚江行政','珠田行政','巾石行政','大坑行政','双桥行政','新江行政','五斗江行政','西溪行政','南江行政','黄坑行政','戴家埔行政','营盘圩行政','泉江事业','雩田事业','碧洲事业','草林事业','堆子前事业','左安事业','高坪事业','大汾事业','衙前事业','禾源事业','汤湖事业','枚江事业','珠田事业','巾石事业','大坑事业','双桥事业','新江事业','五斗江事业','西溪事业','南江事业','黄坑事业','戴家埔事业','营盘圩事业']);
        $results = $TransferAccount->groupBy('unit');
        $results = $results->reject(function($value,$key) use ($array) {
            return $array->contains($key);
        });

      
        return view('static_pages.transferorder_home',compact('results'));
        
    }

    public function order(){
        $results = TransferOrder::all();
        return view('static_pages.transferorder_orders',compact('results'));
    }



}
