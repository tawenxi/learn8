@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> {{$keyword}}--{{$results->count()}}条</h1>

  <h1 class="title" align="middle">  <{{$results->filter(function($v){return $v->formation=='0101-行政' OR $v->formation=='0102-政法' OR $v->formation=='02-参照公务员管理的事业编制'; })->count()}}公务员>  <{{$results->filter(function($v){return $v->formation=='0301-全额事业' OR $v->formation=='0304-机关工勤'; })->count()}}全拨><{{$results->filter(function($v){return $v->formation=='0302-差额事业'; })->count()}}差拨><{{$results->filter(function($v){return $v->formation=='0303-自收自支事业'; })->count()}}自收自支></h1>

<caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   <th>id</th>
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


                  <tr class="table-success">


      <td></td>
      <td></td>
      <td>{{($results->sum('salary2')+$results->sum('salary1'))*12}}</td>
       <td></td>
      <td></td>
      <td></td>
      <td>{{$results->sum('salary1')}}</td>

      <th>{{round($results->sum('salary2'))}}</th>
      <th>{{round($results->sum('jishudengjigz'),0)}}</th>
      <th>{{round($results->sum('practicesalary'),0)}}</th>
      <th>{{round($results->sum('teachsalary'),0)}}</th>
      <th>{{round($results->sum('allowance'),0)}}</th>




      <td>{{$results->sum('performancepay')}}</td>
      <td>{{$results->sum('specialsalary')}}</td>

      <td>{{$results->sum('othersalary')}}</td>
      <td></td>







    </tr>
      @foreach ($results as $k=>$result)


    @if ($result['formation'] == '0303-自收自支事业')
    <tr class="table-danger">
    @else
    <tr>
    @endif


      <th>{{$loop->index+1}}</th>
   <td>{{$result->name}}</td>
      <td>{{$result->unit}}</td>
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
