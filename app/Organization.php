<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;
use App\TransferAccount;
use App\Adjust;
use App\Paperfee;


class Organization extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function office()
    {
        return $this->belongsTo(Office::class,'office','office')->withDefault(function ($offcie, $Organizations) {
            $offcie->office = '未定义股室';
        });
    }


    public function transfers()
    {
        return $this->hasMany(TransferAccount::class,'unit', 'unit');
    }

    public function adjusts()
    {
        return $this->hasMany(Adjust::class,'unit', 'unit');
    }
    public function paperfee()
    {
        return $this->hasOne(Paperfee::class,'unit', 'unit');
    }

}
