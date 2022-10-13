<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransferOrder extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    //public $ghjfroi = 0.6;
    //public $sbroi = 1.28;
    //public $calculateTime = 12;



    public $XZBZ_unit = ['乡人民政府','镇人民政府','卫生院','敬老院','上坑中心学校','正人中学','上海警备区希望小学','珠田中学','珠田中心小学','大坑中学','大坑中心小学','雩田中学','雩田三中','雩田中心小学','横岭志强希望学校','巾石中学','巾石中心小学','左安中学','左安中心小学','扬芬中心小学','黄坑中学','黄坑中心小学','汤湖中学','汤湖阳光希望小学','高坪中学','高坪北京西站小学','江铃希望学校','扬芬中学','大汾中学','大汾中心小学','滁洲中心学校','深圳格瑞特希望学校','草林中学','草林中心小学','禾源中学','禾源中心小学','南江中学','南江中心小学','堆前中学','堆子前平安希望小学','西溪中学','西溪中心小学','衙前中学','衙前中心小学','新江中学','新江中心小学','五斗江中学','五斗江中心小学','双桥中心学校','枚江中学','枚江中心小学','碧洲中学','碧洲中心小学','戴家埔中学','戴家埔中心小学','淋洋中心学校','遂兴幼儿园','思源幼儿园','第一工业园区幼儿园','大汾镇中心幼儿园','南江乡中心幼儿园','草林镇中心幼儿园','衙前镇中心幼儿园','泉江','雩田','碧洲','草林','堆子前','左安','高坪','大汾','衙前','禾源','汤湖','枚江','珠田','巾石','大坑','双桥','新江','五斗江','西溪','南江','黄坑','戴家埔','营盘圩',];
    public function getJwfAttribute()  //降温费
    {
        if (Str::contains($this->attributes['from'], ['医院', '卫生院','妇保']) OR 
            Str::contains($this->attributes['to'], ['医院', '卫生院','妇保院'])) {
                return 0;
        }

        $money = ($this->CalculateTime-3) * 200;
        return ($money >800) ? 800 :(($money < 0) ? 0 :$money);
    }
    public function getQRFAttribute()  //取暖费
    {

        if ($this->ordertype == '退休') {
                return 0;
        }

        if (Str::contains($this->attributes['from'], ['医院', '卫生院','妇保']) OR 
            Str::contains($this->attributes['to'], ['医院', '卫生院','妇保院'])) {
                return 0;
        }
        return 240;
    }
    public function getYbfAttribute()  //医保费
    {
        if ($this->ordertype == '退休') {
                return 0;
        }

        return ($this->jbgz+$this->jinbutie)*$this->CalculateTime*0.068;
    }

    public function getCalculateTimeAttribute()  //办公费
    {
        $enddate = (substr($this->attributes['orderid'],1,4)+1).'-1-1';
        $carbon = carbon::parse ($enddate); // 格式化一个时间日期字符串为 carbon 对象
   

        return  Carbon::parse($this->startdate)->diffInMonths ($carbon, false);
    }

    public function GCBZBZ()  //公车补助标准
    {
        if ($this->attributes['gcbz']) {
            return $this->attributes['gcbz'];
        }
        if (strstr($this->attributes['persontype'],'公务员')) {
            if (strstr($this->attributes['description'],'有公车')) {
                return 0;
            } else {
                return 500;
            }
        } else {
            return 0;
        }

        
    }  
    public function XZBZBZ()  //乡镇补助标准
    {
        if (strstr($this->attributes['persontype'],'退休')) {
                return 0;
            }
        if (Str::contains($this->attributes['from'], ['医院', '卫生院']) OR 
            Str::contains($this->attributes['to'], ['医院', '卫生院'])) {
                return 0;
        }
        foreach ($this->XZBZ_unit as $unit) {
            if (strstr($this->attributes['to'], $unit)) {
                //dump($unit);
                return 300;
            } 
        }
        return 0;
        
    }

    public function getCbAttribute()  //年度车补
    {
        return $this->GCBZBZ() * $this->CalculateTime;
    }
    public function getXbAttribute()  //年度乡补
    {
        return $this->XZBZBZ() * $this->CalculateTime;
    }
    public function getBgfAttribute()  //办公费
    {

        if (Str::contains($this->attributes['from'], ['医院', '卫生院'])) {
            return 0;
        }

        if (Str::contains($this->attributes['to'], ['医院', '卫生院'])) {
            return 0;
        }

        if (strstr($this->attributes['persontype'],'公务员')) {
            return 5000;
        }
        if (strstr($this->attributes['persontype'],'事业')) {
            return 4500;
        }
        if (strstr($this->attributes['persontype'],'退休')) {
            return 4500;
        }

    }
    public function getJbgzAttribute()  //基本工资
    {
        $temp = $this->attributes['salary1'] + $this->attributes['salary2'] + $this->attributes['salary3'] + $this->attributes['practicesalary'] + $this->attributes['othersalary'];
        if (Str::contains($this->attributes['to'], ['人民医院','中医院','妇保院']) OR
            Str::contains($this->attributes['from'], ['人民医院','中医院','妇保院'])) {
            return $temp*0.5;
        }
        return $temp;
    }
    public function getJinbutieAttribute()  //津补贴
    {
        if (Str::contains($this->attributes['to'], ['人民医院','中医院','妇保院']) OR
            Str::contains($this->attributes['from'], ['人民医院','中医院','妇保院']) ) {
            return $this->attributes['jinbutie']*0.4;
        }
        if (Str::contains($this->attributes['to'], '卫生院') OR
            Str::contains($this->attributes['from'], '卫生院')) {
            return $this->attributes['jinbutie']*0.8;
        }
        
        return $this->attributes['jinbutie'];
    }
    public function getYearAttribute()  //年度
    {
        $temp = substr($this->attributes['orderid'],1,4);
        return $temp;
    }

    
    public function getJbtAttribute()  //年度津补贴
    {
        $temp = $this->jinbutie;
        return $this->getamount($temp);
    }

    public function getRcgzAttribute()  //年度工资总额+社保16%+公积金12%
    {
        $roi = 1.28;
        if (Str::contains($this->attributes['from'], ['医院', '卫生院']) OR 
            Str::contains($this->attributes['to'], ['医院', '卫生院'])) {
            $roi = 1.16;
        }

        $temp = ($this->Jbgz + $this->jbt) *$roi;
        return round($temp,0);
    }

    public function getBonusAttribute()   //年终奖
    {
        if ($this->attributes['jinbutie']<1900) {
            return 0;
        } else {
            return $this->getJbgzAttribute();
        }
    }
    public function getGhjfroiAttribute()  // 年度工会经费
    {
        if (Str::contains($this->attributes['from'], ['医院', '卫生院']) OR 
            Str::contains($this->attributes['to'], ['医院', '卫生院'])) {
            return 0;
        }
        return 0.6;
    }

    public function getGhjfAttribute()  // 年度工会经费分摊率
    {
        $roi = 0.6;
        if (Str::contains($this->attributes['from'], ['医院', '卫生院']) OR 
            Str::contains($this->attributes['to'], ['医院', '卫生院'])) {
            $roi = 0;
        }
        $temp = ($this->jbgz + $this->jbt) * 0.02 * $roi;
        return round($this->getamount($temp),0);
    }

    public function getSbroiAttribute()  // 年度社保公积金分摊率
    {
        if (Str::contains($this->attributes['from'], ['医院', '卫生院']) OR 
            Str::contains($this->attributes['to'], ['医院', '卫生院'])) {
            return 1.16;
        }
        return 1.28;
    }

    public function getTotalAttribute()  //总和
    {
        if (!$this->jbgz) {
            return 0;
        }

        $temp = $this->bonus+($this->jbgz+$this->jinbutie)*$this->CalculateTime*$this->sbroi+($this->jbgz+$this->jinbutie)*$this->CalculateTime*0.02*$this->ghjfroi+$this->Jwf+$this->QRF+($this->GCBZBZ()+$this->XZBZBZ()) * $this->CalculateTime +$this->Bgf/12*$this->CalculateTime +$this->ybf;
        return round($temp,0);
    }


    public function cut($amount) {
        return $amount/12*$this->CalculateTime;
    }
    public function getamount($amount) {
        return $amount*$this->CalculateTime;
    }


    public function zhaiyao() {
        

        return "[{$this->orderid}][{$this->personname}][{$this->ordertype}]{$this->from}→{$this->to}($this->startdate)<{$this->bonus}+({$this->jbgz}+{$this->jinbutie})*{$this->CalculateTime}*{$this->sbroi}+({$this->jbgz}+{$this->jinbutie})*{$this->CalculateTime}*0.02*{$this->ghjfroi}+{$this->jwf}+{$this->QRF}+({$this->GCBZBZ()}+{$this->XZBZBZ()}) * {$this->CalculateTime} +{$this->Bgf}/12*{$this->CalculateTime}+{$this->ybf}={$this->total}>";
    }
}
