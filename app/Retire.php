<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retire extends Model
{
    protected $fillable  = ['unitid','unitname','unittype','personid','personname','certificateid','sex','worktime','retirestime','bankid','amount'];
    public $timestamps = false;
    public $casts = ['amount'=>'float'];
}
