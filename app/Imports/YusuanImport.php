<?php

namespace App\Imports;

use App\Yusuan;
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

class YusuanImport implements ToModel, WithProgressBar,WithStartRow, WithHeadingRow
{
    use Importable;
    
    public function model(array $row)
    {

        return new Yusuan([
            'danwei'=>$row['单位'],

            'zaizhirenshu'=>$row['在职人数'],
            'lixiurenshu'=>$row['离休人数'],
            'tuixiurenshu'=>$row['退休人数'],
            'renyuanheji'=>$row['人员合计'],
            'cheliangshu'=>$row['车辆数'],
            'jingfeibokuan'=>$row['经费拨款'],
            'feishui'=>$row['非税成本补偿'],
            'jibenzhichuheji'=>$row['基本支出合计'],
            'gongzifuli'=>$row['工资福利支出'],
            'shangpinfuwu'=>$row['商品服务支出'],
            'duigerenjiatingbuzhu'=>$row['对个人家庭补助'],
            'jibengzi'=>$row['基本工资'],
            'jinbutie'=>$row['规范性津补贴'],
            'jixiaogongzi'=>$row['绩效工资'],
            'gangweijintie'=>$row['岗位津贴'],

            'gaowenjintie'=>$row['高温津贴'],
            'xiangzhenbutie'=>$row['乡镇工作补贴'],

            'bianyuandiqujinbutie'=>$row['边远地区津补贴'],
            'nianzongyicixingjiangjin'=>$row['年终一次性奖金'],

            'shehuibaoxian'=>$row['社会保险缴费'],
            'yiliaobaoxian'=>$row['医疗保险'],
            'shiyebaoxian'=>$row['失业保险'],
            'gongshangbaoxian'=>$row['工伤保险'],
           
            'qitashehuijiaofei'=>$row['其他社保缴费'],
            'zhiyenianjin'=>$row['职业年金'],
            'zhufanggongjijin'=>$row['住房公积金'],
            'qitagongzifuli'=>$row['其他工资福利'],
            'qunuanfei'=>$row['取暖费'],
            'gonghuijingfei'=>$row['工会经费'],
            'gongwujiaotongbutie'=>$row['公务交通补贴'],
            'jiangwenfei'=>$row['降温费'],
            'qitashangpinfuwuzhichu'=>$row['其他商品和服务支出'],
            'yishubuzhu'=>$row['遗属补助'],
            'dushengzinvfumujianglijin'=>$row['独生子女父母奖励金'],
            'dushengzinvfumujianglifei'=>$row['独生子女父母奖励费'],
            'funvweishengfei'=>$row['妇女卫生费'],

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
