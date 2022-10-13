<?php

namespace App\Imports;

use App\Gongyang;
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

class GongyangImport implements ToModel, WithProgressBar,WithStartRow, WithHeadingRow
{
    use Importable;
    
    public function model(array $row)
    {

        if(Gongyang::where('id',$row["身份证号码"])->exists()) 
        {
            Gongyang::where('id',$row["身份证号码"])->delete();
        }
        return new Gongyang([
           'unitname' => $row['单位名称'],
           'personname' => $row['姓名'],
           'sex' => $row["性别"],
           'type' => $row["人员类别"],
           'ifonwork' => $row["在职人员属性"],
           'shenfen' => $row['人员身份'],
           'zhiwu' => $row['职务（职称）'],
           'ifonsalary' => $row['是否财政统发工资'],
           'xueli' => $row["学历"],
           'birthday' => $row["出生日期"],
           'workday' => $row["参加工作时间"],
           'jibengz' => $row["基本工资"],
           'jinbutie' => $row["国家规定津补贴"],
           'id' => $row["身份证号码"]

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
