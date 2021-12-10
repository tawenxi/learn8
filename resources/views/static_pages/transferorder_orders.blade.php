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
    <a class="btn btn btn-success" href='/transfer'>汇总</a>

    <a class="btn btn btn-success" href='/transferlist'>列表</a>
    <a class="btn btn btn-success" href='/transferorders'>介绍信信息</a>
    <a class="btn btn btn-success" href='/transfer/枚江'>搜索</a>
    <a class="btn btn btn-success" href='/transfer/行政/调动'>行政调动</a>
    <a class="btn btn btn-success" href='/transfer/行政/新增'>行政新增</a>
    <a class="btn btn btn-success" href='/transfer/事业/调动'>事业调动</a>
    <a class="btn btn btn-success" href='/transfer/事业/新增'>事业新增</a>
    <a class="btn btn btn-success" href='/transfer/县直'>县直</a>

      </tr>

 <h1 class="title" align="middle">所有介绍信</h1>
 <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单号</th>
      <th>姓名</th>
      <th>金额</th>

      <th>调出单位</th>
      <th>调入单位</th>


      <th>工资1</th>
      <th>工资2</th>
      <th>类别</th>





      </tr>
    </thead>

    <tbody class='table-hover'>

       <tr class="table-success">
        
 

      <td colspan="7" align="middle"></td>
      



      





    </tr>

      @foreach ($results as $k=>$result)

          @if ($result['newamount'] < 0)
    <tr class="table-danger">
    @else
    <tr>
    @endif
        
 
      <td>{{$result['orderid']}}</td>
      
      <td>{{$result['personname']}}</td>
      <td>{{$result['total']}}</td>


      <td>{{$result['from']}}</td>
      <td>{{$result['to']}}</td>

      <td>{{$result['salary1']}}</td>
      <td>{{$result['salary2']}}</td>

      <td>{{$result['ordertype']}}</td>


      





    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
