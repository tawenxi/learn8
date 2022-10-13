@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> </h1>
 <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>姓名</th>
      <th>单位</th>
      <th>证件号码</th>

      <th>性别</th>
      <th>经费形式</th>
      <th>职务（岗位）工资</th>
      <th>级别（薪级）工资</th>
      <th>技术等级工资</th>
      <th>试用期工资</th>
      <th>教护龄津贴</th>
      <th>规范性津补贴</th>
      <th>绩效工资</th>
      <th>特殊岗位津贴</th>
      <th>其他补贴</th>
      <th>年度</th>
      </tr>
    </thead>
    <tbody class='table-hover'>
      @foreach ($results as $k=>$result)
      <tr class=''>
   <td>{{$result->name}}</td>
      <td>{{substr($result->unit,7)}}</td>
      <td>{{substr($result->certificateid,8,6)}}</td>
      <td class="">{{$result->sex}}</td>
      <td>{{substr($result->moneytype,3,3)}}</td>
      <td>{{$result->salary1}}</td>
      <td>{{round($result->salary2)}}</td>
      <td>{{round($result->jishudengjigz)}}</td>
      <td>{{round($result->practicesalary)}}</td>
      <td>{{round($result->teachsalary)}}</td>
      <td>{{round($result->allowance)}}</td>
      <td>{{round($result->performancepay)}}</td>
      <td>{{round($result->specialsalary)}}</td>
      <td>{{round($result->othersalary)}}</td>
      <td>{{round($result->year)}}</td>




    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
