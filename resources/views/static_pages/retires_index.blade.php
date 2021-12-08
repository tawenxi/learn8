@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> {{$keyword}}</h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单位编号</th>
      <th>单位名称</th>
      <th>姓名</th>
      <th>身份证号码</th>
      <th>退休日期</th>

      <th>银行账号</th>
      <th>金额2</th>
      </tr>
    </thead>

    <tbody class='table-hover'>
      <tr class="success middle"><td colspan="7" >{{$results->sum('amount')}}-{{$results->count()}}</td></tr>
      @foreach ($results as $k=>$result)
      <tr class=''>
        
 
 
   <td>{{$result->unitid}}</td>
      <td>{{$result->unitname}}</td>
      <td>{{$result->personname}}</td>
      <td class="">{{$result->certificateid}}</td>
      <td>{{$result->retirestime}}</td>
      <td>{{$result->bankid}}</td>
      <td>{{$result->amount}}</td>

    </tr>
       @endforeach 

       
</table>

{{ $results->links() }}



      
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          、
        </section>
        <section class="stats">
         、
        </section>
      </aside>
    </div>
 
@stop
