<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Yusuanman;
use App\TransferOrder;

class Workman extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = 'certificateid';
    public $incrementing = false;

    public $calculateTime = 12;

    public $qrf = 240;
   
    public $XZBZ_unit = ['乡人民政府','镇人民政府','卫生院','敬老院','遂川县上坑中心学校','遂川县正人中学','遂川县上海警备区希望小学','遂川县珠田中学','遂川县珠田中心小学','遂川县大坑中学','遂川县大坑中心小学','遂川县雩田中学','遂川县雩田三中','遂川县雩田中心小学','遂川县横岭志强希望学校','遂川县巾石中学','遂川县巾石中心小学','遂川县左安中学','遂川县左安中心小学','遂川县扬芬中心小学','遂川县黄坑中学','遂川县黄坑中心小学','遂川县汤湖中学','遂川县汤湖阳光希望小学','遂川县高坪中学','遂川县高坪北京西站小学','遂川县江铃希望学校','遂川县扬芬中学','遂川县大汾中学','遂川县大汾中心小学','遂川县滁洲中心学校','遂川县深圳格瑞特希望学校','遂川县草林中学','遂川县草林中心小学','遂川县禾源中学','遂川县禾源中心小学','遂川县南江中学','遂川县南江中心小学','遂川县堆前中学','遂川县堆子前平安希望小学','遂川县西溪中学','遂川县西溪中心小学','遂川县衙前中学','遂川县衙前中心小学','遂川县新江中学','遂川县新江中心小学','遂川县五斗江中学','遂川县五斗江中心小学','遂川县双桥中心学校','遂川县枚江中学','遂川县枚江中心小学','遂川县碧洲中学','遂川县碧洲中心小学','遂川县戴家埔中学','遂川县戴家埔中心小学','遂川县淋洋中心学校','遂川县遂兴幼儿园','遂川县思源幼儿园','遂川县第一工业园区幼儿园','大汾镇中心幼儿园','遂川县南江乡中心幼儿园','草林镇中心幼儿园','遂川县衙前镇中心幼儿园'];


    public function GCBZBZ()  //公车补助标准
    {
        if (strstr($this->attributes['type'],'公务员') AND strstr($this->attributes['ifonwork'],'2')) {
            if (strstr($this->attributes['class'],'10')) {
                return 550;
            }
            if (strstr($this->attributes['class'],'9')) {
                return 600;
            } else {
                return 500;
            }
        } else {
            return 0;
        }

        
    }  
    public function XZBZBZ()  //乡镇补助标准
    {
        foreach ($this->XZBZ_unit as $unit) {
            if (strstr($this->attributes['unitname'], $unit)) {
                return 300;
            } 
        }

        return 0;
        
    }

    public function getCbAttribute()  //办公费
    {
        return $this->GCBZBZ() * 12;
    }

    public function getJwfAttribute()  //降温费
    {
        if (strstr($this->attributes['ifonwork'],'2')) {
            return 800;
        }
        return 0;
    }
    public function getXbAttribute()  //办公费
    {
        return $this->XZBZBZ() * 12;
    }
    public function getBgfAttribute()  //办公费
    {
        if (strstr($this->attributes['type'],'公务员') AND strstr($this->attributes['ifonwork'],'2')) {
            return 5000;
        }
        if (strstr($this->attributes['type'],'管理') AND strstr($this->attributes['ifonwork'],'2')) {
            return 4500;
        }
        if (strstr($this->attributes['type'],'技术') AND strstr($this->attributes['ifonwork'],'2')) {
            return 4500;
        }
        if (strstr($this->attributes['ifonwork'],'2')) {
            return 4500;
        }
        return 0;
    }

    public function getJbgz2Attribute()  //年度基本工资工资总额
    {
        $temp = $this->attributes['salary1'] + $this->attributes['salary2'];
        return $temp*12;
    }

    public function getJbgzAttribute()  //基本工资
    {
        $temp = $this->attributes['salary1'] + $this->attributes['salary2'];
        return $temp;
    }

    public function getJbtAttribute()  //津补贴
    {
        $temp = $this->attributes['allowance']  - $this->GCBZBZ();
        return $temp;
    }
    public function getRawjbtAttribute()  //津补贴
    {
        $temp = $this->attributes['allowance']  + $this->attributes['performancepay'];
        return $temp;
    }

    public function getJbt2Attribute()  //年度津补贴
    {
        $temp = $this->attributes['allowance']  - $this->GCBZBZ();
        return $temp*12;
    }
    public function getRcgzAttribute()  //年度工资总额+社保16%+公积金12%
    {
        $temp = ($this->attributes['salary1'] + $this->attributes['salary2'] + $this->jbt + $this->attributes['performancepay']) * $this->calculateTime * 1.28;
        return $temp;
    }
    public function getYlbx2Attribute()  //年度工资总额+社保16%+公积金12%
    {
        $temp = ($this->attributes['salary1'] + $this->attributes['salary2'] + $this->jbt + $this->attributes['performancepay']) * $this->calculateTime * 0.16;
        return $temp;
    }
    public function getGjj2Attribute()  //年度工资总额+社保16%+公积金12%
    {
        $temp = $this->jishu2 * 0.12;
        return $temp;
    }

    public function getBonusAttribute()   //年终奖
    {
        $temp = $this->attributes['salary1'] + $this->attributes['salary2'];
        return $temp;
    }
    public function getBonus2Attribute()   //年终奖
    {
        $temp = $this->attributes['salary1'] + $this->attributes['salary2'];
        return $temp;
    }
    public function getGhjfAttribute()  // 年度工会经费
    {
         $temp = ($this->attributes['salary1'] + $this->attributes['salary2'] + $this->jbt + $this->attributes['performancepay']) * $this->calculateTime * 0.02 * 0.6;
         return $temp;
    }

    public function getGcbzAttribute()  //年度公车
    {
        $temp = (strstr($this->attributes['type'], 1)) ? $this->GCBZBZ : 0;
        return $temp * $this->calculateTime;
    }

    public function getJishu2Attribute()  //年度基本工资+津补贴
    {
        $temp = $this->jbgz+$this->jbt+$this->performancepay;
        return $temp * 12;
    }
    public function getTotal2Attribute()  //总和
    {
        return "{$this->jbgz2}+{$this->jbt2}+{$this->performancepay2}+{$this->bonus}+{$this->ylbx2}+{$this->gjj2}+{$this->yb}+{$this->sb}+{$this->gb}+{$this->nj}+{$this->cb}+{$this->xb}+{$this->jwf}+{$this->qrf}+{$this->ghjf}+{$this->bgf};";
         
    }
    public function getTotalAttribute()  //总和
    {

        $temp = $this->jbgz2+$this->jbt2+$this->performancepay2+$this->ylbx2+$this->gjj2+$this->yb+$this->sb+$this->gb+$this->nj+$this->cb+$this->xb+$this->jwf+$this->qrf+$this->ghjf+$this->bgf+$this->bonus;
        return $temp;
    }
    public function getPerformancepay2Attribute()
    {
        return $this->attributes['performancepay']*12;
    }
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = strtolower($value);
    }
    public function getYbAttribute()  //医保
    {
        if (strstr($this->attributes['ifonwork'],'2')) {
            return $this->jishu2*0.068;
        }
        return $this->jishu2*0.06;
    }
    public function getSbAttribute()  //失业
    {
        if (strstr($this->attributes['ifonwork'],'2')) {
            return $this->jishu2*0.005;
        }
        return 0;
    }
    public function getGbAttribute()  //伤保
    {
        if (strstr($this->attributes['ifonwork'],'2')) {
            return $this->jishu2*0.0016;
        }
        return 0;
    }
    public function getNjAttribute()  //职业年金
    {
        if (strstr($this->attributes['ifonwork'],'2')) {
            return $this->jishu2*0.08;
        }
        return 0;
    }

    public function getAllowanceAttribute()  //年度津补贴
    {
        $temp = $this->attributes['allowance'] - $this->GCBZBZ();
        return $temp*12;
    }

    public function getDanweiAttribute()  //单位全称
    {
        $temp = substr($this->attributes['unitname'], 7);
        return $temp;
    }
    public function getPersonnameAttribute()  //单位全称
    {
        $temp = str_replace(' ', '', $this->attributes['personname']);
        return $temp;
    }


    public function has($key)
    {
        if ($key) {
            if (Yusuanman::where('unit','like',"%$key%")->where('name',$this->personname)->exists()) {
                return 'T';
            } else {
                return 'F';
            }
        }
        return "";
    }



    public function istransfer($key)
    {
        if ($key) {
            if (TransferOrder::where('personname',$this->personname)->exists()) {
                return 'Y';
            } else {
                return 'N';
            }
        }
        return "";
    }
}
