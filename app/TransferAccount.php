<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Organization;

class TransferAccount extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public $casts = ['amount'=>'float'];

    public $villages = ['泉江','雩田','碧洲','草林','堆子前','左安','高坪','大汾','衙前','禾源','汤湖','枚江','珠田','巾石','大坑','双桥','新江','五斗江','西溪','南江','黄坑','戴家埔','营盘圩'];


    public function getAdjustedAmountAttribute()  // 调整乡镇补助
    {
        $_amount = 0;
        if ($this->isvillage($this->from) AND !$this->isvillage($this->to) AND $this->isvillage($this->unit)) {
            $_amount = (-300)*$this->attributes['month'];
        }

        if (!$this->isvillage($this->from) AND $this->isvillage($this->to) AND !$this->isvillage($this->unit)) {
            $_amount = 300*$this->attributes['month'];
        }

        if (strstr($this->description , '增加车补') AND $this->attributes['amount'] < 0) {
            $_amount = $_amount + 500*$this->attributes['month'];
        }
        if (strstr($this->description , '减少车补') AND $this->attributes['amount'] < 0) {
            
            $_amount = $_amount - 550*$this->attributes['month'];
        }

        return $_amount;
    }


    public function getNewAmountAttribute()  // 调整乡镇补助
    {
        if (strstr($this->description , '调出单位无预算') AND $this->attributes['amount'] < 0) {
            return 0;
        }
        if (!($this->jbgz+$this->jbt)) {
            return 0;
        }
        return $this->AdjustedAmount+$this->attributes['amount'];
    }

    public function getNewZhaiyaoAttribute()  // 调整乡镇补助
    {
        if (!($this->jbgz+$this->jbt)) {
            return "{$this->from}→{$this->to}";
        }
        if ($this->AdjustedAmount != 0) {
            return str_replace('>',"-({$this->AdjustedAmount})",$this->attributes['zhaiyao']);
        }

        return $this->attributes['zhaiyao'];
    }

    public function isvillage($unit) {
        if ($this->ordertype == '退休' OR $this->ordertype == '辞职') {
            return false;
        }
        foreach ($this->villages as $key => $village) {
            if (strstr($unit, $village)) {
                return true;
            };
        }

        return false;
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class,'offcie','offcie')->withDefault(function ($organization, $TransferAccount) {
            $organization->offcie = '未定义股室';
        });
    }


}
