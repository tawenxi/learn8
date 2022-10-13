<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\TransferAccount;

class ListExport implements FromView
{
    public function view(): View
    {
        return view('static_pages.transferorder_list', [
            'results' => TransferAccount::all()->groupBy('unit')
        ]);
    }
}