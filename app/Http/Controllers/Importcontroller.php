<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ManinfoImport;
use Maatwebsite\Excel\Facades\Excel;

class Importcontroller extends Controller
{
    public function index () {
        \DB::table('maninfos')->truncate();
        $maninfo = (new ManinfoImport)->import(base_path('\excel\maninfo\maninfo.xls'));



        

        dd($maninfo);
        
        return redirect('/')->with('success', 'All good!');
        return '导入成功！';
    }
}
