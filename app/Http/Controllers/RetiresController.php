<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Retire;
use App\Exports\RetireExport;
use Maatwebsite\Excel\Facades\Excel;

class RetiresController extends Controller
{
    function index ($keyword)
    {
            
        $results = Retire::where('unitid', 'like', "%$keyword%")
        ->Orwhere('unitname', 'like', "%$keyword%")
        ->Orwhere('personname', 'like', "%$keyword%")
        ->Orwhere('certificateid', 'like', "%$keyword%")
        ->Orwhere('retirestime', 'like', "%$keyword%")
        ->OrderBy('retirestime','desc')
        //->get();
        ->paginate(1000);
        //$test = Document::first()->biaoti;
        //dd($result->first());
        return view('static_pages.retires_index',compact('results','keyword'));
    }

    function export ()
    {
        // return Excel::download(new RetireExport, 'users.xlsx');
        //return (new RetireExport)->download('invoices.xlsx');
        Excel::store(new RetireExport, 'ddddd.xlsx');

    }


}
