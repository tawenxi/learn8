@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> {{$keyword}}--{{$results->count()}}条</h1>
 @if ($filtered)
 <h5 class="title" align="middle">
 @foreach ($filtered as $k=>$f)
  <font align="middle" color="red">{{$f}}  </font>
    @endforeach
    未找到
 </h5>  
@endif
<caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered  border-danger table-striped table-hover table-condensed table-lg"
  id="testTable"
  data-toggle="table"
  data-search="true"
  data-search-highlight="true"
  data-sticky-header="true">
    <thead class="header table-dark">    
    </thead>
    <tbody class='table-hover'>
  @foreach ($results as $k=>$result)
    @if ($result['formation'] == '0303-自收自支事业')
    <tr class="table-danger">
    @else
    <tr>
    @endif
      <th>{{$loop->index+1}}</th>
   <td><a href="/summarize/{{$result->name}}" target="_blank">{{$result->name}}</a></td>
      <td>{{$result->danwei}}</td>
      <td><a href="/workman/{{$result->name}}" target="_blank">{{$result->isin2022}}</a></td>
      <td><a href="/gongyang/{{$result->name}}" target="_blank">{{$result->isingongyang}}</a></td>
      <td>{{$result->istransfer()}}</td>
    </tr>
  @endforeach 
    <thead class="header table-dark">
      <tr class='bg-warning sticky-sm-top header'>
   
      <th>id</th>
      <th>姓名</th>
      <th>单位</th>
      <th>2022年预算</th>
      <th>2022年5月份</th>
      <th>2022年是否调动</th>
      </tr>
    </thead>
</table>     
      </div>

    </div>
 
@stop
