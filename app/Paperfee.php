<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paperfee extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    public $casts = ['amount'=>'float'];
}
