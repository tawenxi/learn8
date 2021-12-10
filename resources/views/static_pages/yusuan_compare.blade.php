@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

  <h1 class="title" align="middle"> {{$keyword}}
    <br>
    @if($amount)
      测算基数{{$amount}}
    @endif
  </h1>
 <h1 class="title" align="middle"> </h1>
 <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
      <th>{{$results_2021->danwei}}</th>
    
      <th>在职</th>
      <th>离休</th>
      <th>退休</th>
      <th>人员合计</th>
      <th>车辆</th>
      <th>单位</th>


      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
      <td>2021年数据</td>
        
      <td>{{$results_2021->zaizhirenshu}}</td>
      <td>{{$results_2021->lixiurenshu}}</td>
      <td>{{$results_2021->tuixiurenshu}}</td>
      
      <td>{{$results_2021->renyuanheji}}</td>
      <td>{{$results_2021->sheliangshu}}</td>
      <td>@foreach($res_sys_2021->pluck('unit')->unique() as $k=>$v)
              <a href="/findman/{{$v}}">{{$v}}</a>
               <a href="/workman/{{$keyword}}">{{$keyword}}</a>

          @endforeach

      </td>
    


    </tr>


       
</table>


<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
      <th>基本支出合计</th>
    <th>计算基数</th>
      <th>工资福利支出</th>
      <th>商品服务支出</th>
      <th>对个人家庭补助</th>



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
     
        
      <td>{{$results_2021->jibenzhichuheji}}</td>
      <td><font color="red">{{$results_2021->jibengzi+$results_2021->jinbutie+$results_2021->jixiaogongzi}}</font></td>

      <td>{{$results_2021->gongzifuli}}</td>
      <td>{{$results_2021->shangpinfuwu}}</td>
      
      <td>{{$results_2021->duigerenjiatingbuzhu}}</td>
   
    


    </tr>


       
</table>

<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
      <th>年度</th>

      <th>基本工资</th>
    
      <th>津补贴</th>
      <th>绩效工资</th>
      <th>岗位津贴</th>
      <th>高温津贴</th>
      <th>乡镇补贴</th>
      <th>边远地区补助</th>
      <th>年终奖励</th>



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-danger">
     
        <td>2021年数据</td>
      <td>{{$results_2021->jibengzi}}</td>
      <td>{{$results_2021->jinbutie}}</td>
      <td >{{$results_2021->jixiaogongzi}}</td>
      
      <td>{{$results_2021->gangweijintie}}</td>
      <td>{{$results_2021->gaowenjintie}}</td>
   
      <td>{{$results_2021->xiangzhenbutie}}</td>
      <td>{{$results_2021->bianyuandiqujinbutie}}</td>
      <td>{{$results_2021->nianzongyicixingjiangjin}}</td>

    


    </tr>

   <tr class="table-danger">
     
        <td>2022年预算</td>
      <td>{{$haha->sum('jbgz2')}}</td>
      <td>{{$haha->sum('allowance')}}</td>
      <td >{{$haha->sum('performancepay2')}}</td>
      
      <td></td>
      <td>{{$haha->sum('jwf')}}</td>
   
      <td></td>
      <td></td>
      <td>{{$haha->sum('bonus2')}}</td>

    


    </tr>
       
</table>  


<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
        <th>年度</th>
      <th>社会保险(16%)</th>
    
      <th>医疗保险(在职6.8%-退休6%)</th>
      <th>失业保险(0.5%)</th>
      <th>工伤保险(0.16%)</th>
      <th>其他社会缴费</th>
      <th>职业年金(8%)</th>
      <th>住房公积金(12%)</th>

      <th>其他工资福利</th>




      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
     
        <td>2021年数据</td>
        
      <td>{{$results_2021->shehuibaoxian}}</td>
      <td>{{$results_2021->yiliaobaoxian}}</td>

      <td>{{$results_2021->shiyebaoxian}}</td>
      <td>{{$results_2021->gongshangbaoxian}}</td>
      
      <td>{{$results_2021->qitashehuijiaofei}}</td>
      <td>{{$results_2021->zhiyenianjin}}</td>
   
      <td>{{$results_2021->zhufanggongjijin}}</td>
      <td>{{$results_2021->qitagongzifuli}}</td>
      

    </tr>

    <tr class="table-success">  
      <td>2022年预算</td>
      <td>{{$haha->sum('ylbx2')}}</td>
      <td>{{$haha->sum('yb')}}</td>
      <td>{{$haha->sum('sb')}}</td>
      <td>{{$haha->sum('gb')}}</td>  
      <td></td>
      <td>{{$haha->sum('nj')}}</td>
      <td>{{$haha->sum('gjj2')}}</td>
      <td>{{$results_2021->qitagongzifuli}}</td>
    </tr>
      @if($amount)
    <tr class='info'>  
      <td>根据基数{{$amount}}测算</td>
      <td>{{$amount*0.16}}</td>
      <td>{{$amount*0.068}}</td>
      <td>{{$amount*0.005}}</td>
      <td>{{$amount*0.0016}}</td>  
      <td></td>
      <td></td>
      <td>{{$amount*0.12}}</td>
      <td></td>
    </tr>
      @endif 
</table>  


<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
        <th>年度</th>
      <th>取暖费</th>
    
      <th>工会经费</th>
      <th>公车补贴</th>
      <th>降温费</th>
      <th>其他商品服务支出</th>







      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
     
        <td>2021年数据</td>
      <td>{{$results_2021->qunuanfei}}</td>
      <td>{{$results_2021->gonghuijingfei}}</td>
      
      <td>{{$results_2021->gongwujiaotongbutie}}</td>
      <td>{{$results_2021->jiangwenfei}}</td>
      
      <td>{{$results_2021->qitashangpinfuwuzhichu}}</td>
      

    </tr>

            <tr class="table-success">
     
        <td>2022年预算</td>
      <td>{{$haha->sum('qrf')}}</td>
      <td>{{$haha->sum('ghjf')}}</td>
      
      <td></td>
      <td></td>
      
      <td></td>
    </tr>


          @if($amount)
    <tr class='info'>  
      <td>根据基数{{$amount}}测算</td>
      <td></td>
      <td>{{$amount*0.6*0.02}}</td>
      <td></td>
      <td></td>  
      <td></td>

    </tr>
      @endif 
       
</table>  


<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
        <th>年度</th>
      <th>遗属补助</th>
    
      <th>独生子女父母奖励金</th>
      <th>独生子女父母奖励费</th>
      <th>妇女卫生费</th>

      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
     <td>2021年数据</td>
        
      <td>{{$results_2021->yishubuzhu}}</td>
      <td>{{$results_2021->dushengzinvfumujianglijin}}</td>
      
      <td>{{$results_2021->dushengzinvfumujianglifei}}</td>
      <td>{{$results_2021->funvweishengfei}}</td>
      
     
      

    </tr>


       
</table>  
      </div>

    </div>
 
@stop
