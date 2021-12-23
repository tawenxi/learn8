<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function session($year) 
    {

        switch ($year) {
            case '2022':
                $_SESSION['ND'] = '2022';
                break;
            case '2021':
                $_SESSION['ND'] = '2021';
                break;  
 
            default:
                $_SESSION['ND'] = '2022';
                break;
        }
        
        return back();
    }
}
