<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Organization;

class Adjust extends Model
{
    public $timestamps = true;
    protected $guarded = [];


    public function organization()
    {
        return $this->belongsTo(Organization::class,'unit','unit')->withDefault(function ($offcie, $Organizations) {
            $offcie->office = '未定义股室';
        });
    }
}
