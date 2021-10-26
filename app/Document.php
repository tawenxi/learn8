<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable  = ['bianhao','shijian','danwei','wenhao','biaoti','zhuangtai','leixing','docid','chengbanren'];
    public $timestamps = false;

    public function getDocinfolinkAttribute()
    {
    	$temp = 'http://10.177.9.37:81/suichuan/document/ifr_docinfo_info.jsp?NDOCSORTID=1&NDOCID='.$this->attributes['docid'].'&NPROCID=0&dir=0&subFrame=queryReceive&fwsw=1';
    	return $temp;
    }
    public function getDoclinkAttribute()
    {
    	$temp = 'http://10.177.9.37:81/suichuan/document/ifr_docinfo_file.jsp?NDOCID='.$this->attributes['docid'].'&NDOCSORTID=2&subFrame=doWaiting&NPROCID=19&showCPQB=&newCPQB=0';
    	return $temp;
    }

    public function getDochistoryAttribute()
    {
    	$temp = 'http://10.177.9.37:81/suichuan/document/ifr_docinfo_msg.jsp?NDOCID='.$this->attributes['docid'].'&NDOCSORTID=2&subFrame=doWaiting&NPROCID=19';
    	return $temp;
    }
    // public function getDochanderAttribute()
    // {
    // 	$temp = 'http://10.177.9.37:81/suichuan/document/ifr_worknode_shouwen.jsp?fwsw=1&NDOCID='.$this->attributes['docid'].'&NDOCSORTID=1&NPROCID=20&subFrame=doLogin&newCPQB=0&Page=0&nbfw=';
    // 	return $temp;
    // }

    public function getDochanderAttribute()
    {
    	$temp = 'http://10.177.9.37:81/suichuan/document/ifr_operation_form.jsp?NDOCSORTID=1&NDOCID='.$this->attributes['docid'].'&NPROCID=20&subFrame=doLogin&Page=0&dir=&newCPQB=&leaderId=0&nbfw=';
    	return $temp;
    }

}