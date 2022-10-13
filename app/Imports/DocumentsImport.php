<?php

namespace App\Imports;

use App\Document;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\WithProgressBar;

class DocumentsImport implements ToModel, WithChunkReading, WithBatchInserts, WithProgressBar
{

    use Importable;
    public function mapping(): array
    {
        return [
            'bianhao'  => 'A1',
            'shijian' => 'B1',
            'danwei' => 'C1',
            'wenhao' => 'D1',
            'biaoti' => 'E1',
            'zhuangtai' => 'F1',
            'leixing' => 'G1',
            'docid' => 'H1',
        ];
    }
    
    public function model(array $row)
    {
        return new Document([
            'bianhao' => $row[0],
            'shijian' => $row[1],
            'danwei' => $row[2],
            'wenhao' => $row[3],
            'biaoti' => $row[4],
            'zhuangtai' => $row[5],
            'leixing' => $row[6],
            'docid' => $row[7]
        ]);
    }



    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
    
}
