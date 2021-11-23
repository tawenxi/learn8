@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>

        <br><br><br>
        <h1 class="title" align="middle">增资调整 单</h1>
        <br>
       <tr class='bg-primary'>

      </tr>

 <h1 class="title" align="middle">{{$keyword}}-----{{$results->count()}}条</h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg table-dark">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单号</th>
      <th>单位</th>
      <th>姓名</th>

      <th>金额</th>
      <th>摘要</th>
    
      </tr>
    </thead>
    <tbody class='table-hover'>
       <tr class='success'>
      <td colspan="5" align="middle">{{$results->sum('amount')}}</td>
    </tr>
    @foreach ($results as $k=>$result)
    <tr>
      <td>{{$result['orderid']}}</td>
      
      <td>{{$result['unit']}}</td>

      <td>{{$result['name']}}</td>
      <td>{{$result['amount']}}</td>

      <td width="300">{{$result['zhaiyao']}}</td>
    </tr>
       @endforeach 

       
</table>
   
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
