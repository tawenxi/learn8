@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>

        <br><br><br>
        <h1 class="title" align="middle">增资 调 整 单</h1>
        <br>
       <tr class='bg-primary'>

      </tr>

 <h1 class="title" align="middle">{{$keyword}}-----{{$results->flatten()->count()}}条</h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单号</th>
      <th>单位</th>
      <th>姓名</th>

      <th>金额</th>
      <th>摘 要</th>
    
      </tr>
    </thead>
    <tbody class='table-hover'>
       <tr class="table-warning">
      <td colspan="5" align="middle">{{$results->flatten()->sum('amount')}}</td>
    </tr>
    @foreach ($results as $ki=>$unit)
    @foreach ($unit as $k=>$result)
    <tr>
      <td width="8%">{{$result['orderid']}}</td>
      
      <td width="10%">{{$result['unit']}}</td>

      <td width="10%">{{$result['name']}}</td>
      <td width="10%">{{$result['amount']}}</td>

      <td width="300">{{$result['zhaiyao']}}</td>
    </tr>
       @endforeach 

                <tr class="table-success"><td>单位汇总</td>
            <td>{{$ki}}</td>
            <td colspan="3" align="middle">{{$unit->sum('amount')}}</td>

          </tr>
    @endforeach
          <tr class="table-primary"><td>汇总</td>
            <td></td>
            <td colspan="3" align="middle">{{$results->flatten()->sum('amount')}}</td>

          </tr>
       
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
