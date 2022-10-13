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

<table class="table table-bordered  border-danger table-striped table-hover table-condensed table-lg"
  id="testTable"
  data-toggle="table"
  data-search="true"
  data-search-highlight="true"
  data-sticky-header="true">
    
    <thead class="header table-dark">  
    </thead>
    <tbody class='table-hover'>
      @foreach ($results as $ki=>$unit)
          <tr class="table border-primary">
            <td>{{$loop->index+1}}</td>    
            <td><a href="/transfer/{{$ki}}">{{$ki}}</a></td>
            <td>{{$unit->filter(function($value){return $value->type =='在职';})->count()}}</td>
            <td>{{$unit->filter(function($value){return $value->type =='退休';})->count()}}</td>
            <td>{{$unit->filter(function($value){return $value->type =='离休';})->count()}}</td>
            <td>{{$unit->count()}}</td>
          </tr>
       @endforeach 
        
           <thead class="header table-dark">
      <tr class='bg-warning sticky-sm-top header'>
      <th>单 号</th>
      <th>单 位</th>
      <th>在职</th><th>退休</th><th>离休</th><th>合计</th>
      </tr>
      
    </thead>
  </tbody>
</table>
      </div>
    </div>
@stop
