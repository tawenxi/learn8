<?php

namespace App\Imports;

use App\Retire;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;

use Maatwebsite\Excel\Concerns\WithProgressBar;

class RetiresImport implements ToModel, WithChunkReading, WithBatchInserts, WithProgressBar
{

    use Importable;
    public function mapping(): array
    {
        return [
            'unitid'  => 'A1',
            'unitname' => 'B1',
            'unittype' => 'C1',
            'personid' => 'D1',
            'personname' => 'E1',
            'certificateid' => 'F1',
            'sex' => 'G1',
            'worktime' => 'H1',

            'retirestime' => 'I1',
            'bankid' => 'J1',
            'amount' => 'K1'
        ];
    }
    
    public function model(array $row)
    {
        return new Retire([
            'unitid' => $row[0],
            'unitname' => $row[1],
            'unittype' => $row[2],
            'personid' => $row[3],
            'personname' => $row[4],
            'certificateid' => $row[5],
            'sex' => $row[6],
            'worktime' => $row[8],
            'retirestime' => $row[9],
            'bankid' => $row[13],
            'amount' => $row[16],
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
