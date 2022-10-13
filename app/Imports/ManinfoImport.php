<?php

namespace App\Imports;

use App\Maninfo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ManinfoImport implements ToModel,WithStartRow, WithHeadingRow
{
    use Importable;
    
    public function model(array $row)
    {

        return new Maninfo([
            'danwei'=>$row['单位'],

            'name'=>$row['姓名'],
            'excel'=>'yes',
            

        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }

    public function startRow(): int
    {
        return 2;
    }


}
