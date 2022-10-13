<?php

namespace App\Imports;

use App\Adjust;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class AdjustImport implements ToModel, WithProgressBar,WithStartRow,WithHeadingRow,WithCalculatedFormulas
{
    use Importable;
    
    public function model(array $row)
    {
        if ($row["金额"]) {
            return new Adjust([
               'orderid' => $row['单号'],
               'unit' => str_replace(" ", '',$row['单位']),
               'name' => $row["姓名"],
               'zhaiyao' => $row["摘要"],
               'year' => $row["年度"],
               'amount' => $row["金额"],
               'office' => \DB::table('organizations')->where('unit',$row['单位'])->value('office'),
            ]);
        }
        
    }
    public function headingRow(): int
    {
        return 2;
    }

    public function startRow(): int
    {
        return 3;
    }


}
