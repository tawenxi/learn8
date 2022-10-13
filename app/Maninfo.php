<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workman;
use App\Gongyang;
use App\TransferOrder;
use Xiaobopang\Pinyin\Pinyin;


class Maninfo extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public $appends = ['isin2022'];

    public function getIsin2022Attribute()
        {
            $pinyin = new Pinyin();
            $py_name = $pinyin->transformWithoutTone($this->attributes['name']);
            $res = Workman::where('npy',$py_name)
                   ->where('unitname','like',"%".$this->attributes['danwei']."%")
                   ->exists();
            $res = $res?Workman::where('npy',$py_name)
                   ->where('unitname','like',"%".$this->attributes['danwei']."%")->first()->ifonwork:'否';
            return $res;
        }
    public function getIsingongyangAttribute()
        {
            $pinyin = new Pinyin();
            $py_name = $pinyin->transformWithoutTone($this->attributes['name']);
            $res = Gongyang::where('npy',$py_name)
                   ->where('unitname','like',"%".$this->attributes['danwei']."%")
                   ->exists();
            $res = $res?Gongyang::where('npy',$py_name)
                   ->where('unitname','like',"%".$this->attributes['danwei']."%")->first()->type:'否';
            return $res;
        }

    public function istransfer() {

        if (TransferOrder::where('personname',$this->name)->exists()) {
            return '是';
        }
        return '无';   
    }
}
