<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Organization;
use App\TransferAccount;
use App\Adjust;

class Office extends Model
{
    public $timestamps = false;
    protected $guarded = [];


    public function organizations()
    {
        return $this->hasMany(Organization::class,'office', 'office');
    }

    public function transfers()
    {
        return $this->hasMany(TransferAccount::class,'office', 'office');
    }

    public function adjusts()
    {
        return $this->hasMany(Adjust::class,'office', 'office');
    }
}
