@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle">{{$keyword}}--{{$results->count()}} 条</h1>
 <br>
 <h1 class="title" align="middle"><{{$results->filter(function($v){return $v->type=='在职'; })->count()}}在职>
 <{{$results->filter(function($v){return $v->type=='退休'; })->count()}}退休>
  <{{$results->filter(function($v){return $v->type=='离休'; })->count()}}离休>
 </h1>

  <h1 class="title" align="middle"> </h1>

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
      <th>人员类别</th>
      <th>身份</th>
      <th>职务</th>
      <th>是否财政统发</th>
      <th>学历</th>
      <th>基本工资</th>
      <th>津补贴</th>
      
      </tr>
    </thead>
    
  @foreach ($results as $k=>$result)


    @if ($result['type'] == '退休')
    <tr class="table-danger">
    @else
    <tr>
    @endif


      <th>{{$loop->index+1}}</th>
   <td>{{$result->personname}}</td>
      <td>{{$result->unitname}}</td>
      <td>{{substr($result->id,8,6)}}</td>
      <td class="">{{$result->sex}}</td>
      <td>{{$result->type}}</td>
      <td>{{$result->shenfen}}</td>
      <td>{{$result->zhiwu}}</td>
      <td>{{$result->ifonsalary}}</td>
      <td>{{$result->xueli}}</td>
      <td>{{$result->jibengz}}</td>
      <td>{{$result->jinbutie}}</td>
 




    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
