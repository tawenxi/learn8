<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferAccount extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public $villages = ['泉江','雩田','碧洲','草林','堆子前','左安','高坪','大汾','衙前','禾源','汤湖','枚江','珠田','巾石','大坑','双桥','新江','五斗江','西溪','南江','黄坑','戴家埔','营盘圩'];


    public function getAdjustedAmountAttribute()  // 调整乡镇补助
    {
        if ($this->isvillage($this->from) AND !$this->isvillage($this->to) AND $this->isvillage($this->unit)) {
            return (-300)*$this->attributes['month'];
        }

        if (!$this->isvillage($this->from) AND $this->isvillage($this->to) AND !$this->isvillage($this->unit)) {
            return 300*$this->attributes['month'];
        }

        return 0;
    }


    public function getNewAmountAttribute()  // 调整乡镇补助
    {
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
            return str_replace('>',"{$this->AdjustedAmount}",$this->attributes['zhaiyao']);
        }

        return $this->attributes['zhaiyao'];
    }

    public function isvillage($unit) {
        foreach ($this->villages as $key => $village) {
            if (strstr($unit, $village)) {
                return true;
            };
        }

        return false;
    }


}
