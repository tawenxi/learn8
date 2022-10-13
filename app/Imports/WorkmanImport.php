<?php

namespace App\Imports;

use App\Workman;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class WorkmanImport implements ToModel, WithProgressBar,WithStartRow, WithHeadingRow
{
    use Importable;
    
    public function model(array $row)
    {

        if(Workman::where('certificateid',$row["证件号码"])->exists()) 
        {
            Workman::where('certificateid',$row["证件号码"])->delete();
        }
        return new Workman([
           'unitname' => $row['单位'],
           'personname' => $row['姓名'],
           'ifonwork' => $row["人员类别"],
           'certificateid' => $row["证件号码"],
           'sex' => $row["性别"],
           'salary1' => str_replace(',', '', $row['职务（岗位）工资']),
           'salary2' => str_replace(',', '', $row['级别（技术等级、薪级）工资']),
           'allowance' => str_replace(',', '', $row['地方出台津补贴']),
           'performancepay' => str_replace(',', '', $row["绩效工资"]),
           'type' => $row["人员身份"],
           'ifonsalary' => $row["是否工资统发"],
           'startworktime' => $row["参加工作时间"],
           'class' => $row["职务"],
        ]);
    }
    public function headingRow(): int
    {
        return 4;
    }

    public function startRow(): int
    {
        return 6;
    }


}
