@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> </h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg table-dark">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>股室</th>
      <th>单位</th>
      <th>调动变动</th>
      <th>增资变动</th>

      <th>合计</th>


      </tr>
    </thead>

    <tbody class='table-hover'>
      @foreach ($results as $k=>$result)
      <tr class=''>
        
 
      <td>{{$result->office}}</td>
      <td>{{$result->unit}}</td>
      <td> <a href="/transfer/{{$result->unit}}">{{$amount1 = $result->transfers->sum('newamount')}}</a> </td>
      <td> <a href="/adjustorder/{{$result->unit}}">{{$amount2 = $result->adjusts->sum('amount')}}</a> </td>
      <td>{{$amount1 + $amount2}}</td>



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
