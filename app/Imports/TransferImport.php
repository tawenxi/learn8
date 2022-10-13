<?php

namespace App\Imports;

use App\TransferOrder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


HeadingRowFormatter::default('none');
class TransferImport implements ToModel,WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
            return new TransferOrder([
               'orderid' => $row['单号'],
               'ordertype' => $row['单据类型'],
               'persontype' => $row["人员类别"],
               'personname' => $row["姓名"],

               'salary1' => str_replace(',', '', $row['职务（技术等级）工资']),
               'salary2' => str_replace(',', '', $row['级别（岗位）工资']),
               'salary3' => str_replace(',', '', $row['薪级工资']),
               'practicesalary' => str_replace(',', '', $row["见习工资"]),
               'othersalary' => str_replace(',', '', $row["教师护士工资"]),
               'jinbutie' => str_replace(',', '', $row["津补贴"]),
               'from' => str_replace(' ','',$row["from"]),
               'to' => str_replace(' ','',$row["to"]),

               'startdate' => $row["起算日期"],
               'gcbz' => $row["公车标准"],
               'description' => $row["备注"],

            ]);
             
        
    }

    public function headingRow(): int
    {
        return 1;
    }

}
