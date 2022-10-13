<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yusuanman extends Model
{
    public $table = 'yusuanmen';

    
    protected $casts = [
        'salary1' => 'integer',
        'salary2' => 'integer',
        'jishudengjigz' => 'integer',
        'practicesalary' => 'integer',
        'teachsalary' => 'integer',
        'allowance' => 'integer',
        'performancepay' => 'integer',
        'specialsalary' => 'integer',
        'othersalary' => 'integer',

    ];
}
