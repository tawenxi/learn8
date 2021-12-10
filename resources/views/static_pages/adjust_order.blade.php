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
<table class="table table-bordered table-striped border-primary table-hover table-condensed table-lg"
  id="testTable"
  data-toggle="table"
  data-search="true"
  data-search-highlight="true"
  data-sticky-header="true">
    
    <thead class="header table-dark">
   

    
   
    </thead>
    <tbody class='table-hover'>
       <tr class="table-warning border-primary">
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

                <tr class="border-primary table-success"><td>单位汇总</td>
            <td>{{$ki}}</td>
            <td colspan="3" align="middle">{{$unit->sum('amount')}}</td>

          </tr>
    @endforeach
          <tr class="border-primary table-primary"><td>汇总</td>
            <td></td>
            <td colspan="3" align="middle">{{$results->flatten()->sum('amount')}}</td>

          </tr>
           <thead>
      <tr class='bg-warning'>
   
      <th>单号</th>
      <th>单位</th>
      <th>姓名</th>

      <th>金额</th>
      <th>摘 要</th>
    
      </tr>
    </thead>
</table>
   
      </div>

    </div>
 
@stop
