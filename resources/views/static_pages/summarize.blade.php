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
    <a class="btn btn btn-primary" href='/gongyang/{{$keyword}}'>供养人员</a>

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
          @elseif (!$result['personname'])
          <tr class="table-warning border-primary">
          @else
          <tr>
          @endif
          <td>{{$result['orderid']}}</td>
          <td>{{$result['unit']}}</td>
          <td >{{$result['newamount']??$result['amount']}}</td>
          <td style="width: 70px;">
            <a href="/findman/{{$result['personname']}}">{{$result['personname']}}
            </a></td>
          <td>{{$result['newzhaiyao']??$result['zhaiyao']}}</td>
          <td>{{$result['office']}}</td>
          </tr>
          @endforeach 
          <tr class="table-success border-primary"><td>单位 汇总</td>
            <td>{{$ki}}</td>
            <td colspan="6" align="middle">{{$unit->sum(function($val){return $val['newamount']??$val['amount'];})}}</td>

          </tr>
       @endforeach 
          <tr class="table-primary border-primary"><td>汇总</td>
            <td></td>
            <td colspan="6" align="middle">{{$results->flatten()->sum(function($val){return $val['newamount']??$val['amount'];})}}</td>

          </tr>
           <thead class="header table-dark">
      <tr class='bg-warning sticky-sm-top header'>
        <th>单 号</th>
        <th>单 位</th>
        <th>金 额</th> 
        <th style="width: 70px;">姓     名</th>
        <th>摘  s要</th>
        <th>股 室</th>
      </tr>
    </thead>
</table>    
      </div>
    </div>
 
@stop
