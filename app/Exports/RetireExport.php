<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;



use App\Retire;

// class RetireExport implements FromCollection
class RetireExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithCustomValueBinder,FromView, WithMapping 
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Retire::all();
    // }



    public function view(): View
    {
        return view('exports.retires', [
            'Retires' => Retire::all()
        ]);
    }


    public function map($Retire): array
    {
        return [
            $Retire->personid,
            $Retire->personname,
        ];
    }

}
