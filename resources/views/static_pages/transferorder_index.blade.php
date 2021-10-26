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

 <h1 class="title" align="middle">{{$keyword}}-----{{$results->count()}}条</h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg table-dark">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单号</th>
      <th>单位</th>
      <th>金额</th>
      <th>姓名</th>


      <th>基本工资</th>
      <th>津补贴</th>
      <th>摘要</th>





      </tr>
    </thead>

    <tbody class='table-hover'>

       <tr class='success'>
        
 

      <td colspan="7" align="middle">{{$results->sum('newamount')}}</td>
      



      





    </tr>

      @foreach ($results as $k=>$result)

          @if ($result['newamount'] < 0)
    <tr class='danger'>
    @else
    <tr>
    @endif
        
 
      <td>{{$result['orderid']}}</td>
      
      <td>{{$result['unit']}}</td>

      <td>{{$result['newamount']}}</td>
      <td>{{$result['personname']}}</td>

      <td>{{$result['jbgz']}}</td>
      <td>{{$result['jbt']}}</td>

      <td>{{$result['newzhaiyao']}}</td>

      





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
