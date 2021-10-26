<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Retire;

class RetiresPerUnitSheet implements FromQuery, WithTitle
{
    private $unitname;

    public function __construct(string $unitname)
    {
        $this->unitname = $unitname;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return Retire::query()->where('unitname', $this->unitname);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->unitname;
    }
}