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

 <h1 class="title" align="middle"> </h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg table-dark">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单位</th>
      <th>金额</th>
      <th>明细</th>
      <th>明 1细</th>



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class='success'>
        
 
      @foreach ($results as $k1=>$result)
      <tr class=''>
        

 
      <td> <a href="/transfer/{{$k1}}">{{$k1}}</a></td>
       <td>{{$result->sum('newamount')}}</td>
       <td>

           @foreach ($result as $k=>$res)
           {{$res->newzhaiyao }} <br><br>
           @endforeach 
       </td>

        @if(App\Organization::where('unit',$k1)->first())

       <td>{{App\Organization::where('unit',$k1)->first()->office}}</td>
  

       @else
       <td></td>

       @endif



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
