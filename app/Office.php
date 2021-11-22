<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Organization;

class Office extends Model
{
    public $timestamps = false;
    protected $guarded = [];


    public function organizations()
    {
        return $this->hasMany(Organization::class,'office', 'office');
    }
}
