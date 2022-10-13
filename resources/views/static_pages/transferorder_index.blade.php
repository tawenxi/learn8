@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>

        <br>
        <br>
        <br>
                      <tr class='bg-primary'>
    <a class="btn btn btn-success" href='/transfer'>汇 总</a>

    <a class="btn btn btn-success" href='/transferlist'>列表</a>
    <a class="btn btn btn-success" href='/transferorders'>介绍信信息</a>
    <a class="btn btn btn-success" href='/transfer/枚江'>搜索</a>
    <a class="btn btn btn-success" href='/transfer/行政/调动'>行政调动</a>
    <a class="btn btn btn-success" href='/transfer/行政/新增'>行政新增</a>
    <a class="btn btn btn-success" href='/transfer/事业/调动'>事业调动</a>
    <a class="btn btn btn-success" href='/transfer/事业/新增'>事业新增</a>
    <a class="btn btn btn-success" href='/transfer/县直'>县直</a>
      </tr>

<h1 class="title" align="middle"><a href="/adjustorder/{{$keyword}}">{{$keyword}}</a>-----{{$results->flatten()->count()}}条----<br>
  加{{$results->flatten()->filter(function($v){return $v['newamount']>0;})->count()}}减
  {{$results->flatten()->filter(function($v){return $v['newamount']<0;})->count()}}</h1>
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
       <tr class="table-success border-primary">
      <td colspan="8" align="middle"><center>{{$results->flatten()->sum('newamount')}}</center></td>
    </tr>

      @foreach ($results as $ki=>$unit)
        @foreach ($unit as $k=>$result)

          @if ($result['newamount'] < 0)
          <tr class="table-danger border-primary">
          @else
          <tr>
          @endif
        
     
          <td>{{$result['orderid']}}</td>
          
          <td>{{$result['unit']}}</td>

          <td >{{$result['newamount']}}</td>
          <td style="width: 70px;"><a href="/findman/{{$result['personname']}}">{{$result['personname']}}</a></td>

          <td>{{$result['jbgz']}}</td>
          <td>{{$result['jbt']}}</td>

          <td>{{$result['newzhaiyao']}}</td>
          <td>{{$result['office']}}</td>
          </tr>
          @endforeach 
          <tr class="table-success border-primary"><td>单位 汇总</td>
            <td>{{$ki}}</td>
            <td colspan="6" align="middle">{{$unit->sum('newamount')}}</td>

          </tr>
       @endforeach 
          <tr class="table-primary border-primary"><td>汇总</td>
            <td></td>
            <td colspan="6" align="middle">{{$results->flatten()->sum('newamount')}}</td>

          </tr>
           <thead class="header table-dark">
      <tr class='bg-warning sticky-sm-top header'>
   
      <th>单 号</th>
      <th>单 位</th>
      <th>金额</th>
      <th>姓名</th>
      <th>基本工资</th>
      <th>津 补 贴</th>
      <th>摘要</th>
      <th>股 室</th>
      </tr>
      
    </thead>
</table>





      
      </div>

    </div>
 
@stop
