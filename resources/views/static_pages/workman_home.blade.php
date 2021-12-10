@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> </h1>
 <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单 位</th>
      <th>基本工资</th>
      <th>津补贴</th>
      <th>车补</th>
      <th>乡镇补</th>

      <th>降温费</th>
      <th>取暖费</th>
      <th>年度工资+社保</th>

      <th>年度工会</th>
      <th>办公费</th>

      <th>合计</th>



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
        
 
      @foreach ($results as $k=>$result)
      <tr class=''>
        

 
      <td> <a href="/workman/{{$k}}">{{$k}}</a></td>
       <td>{{$result->sum('jbgz')}}</td>
      <td>{{$result->sum('jbt')}}</td>
      

      <td>{{$result->sum('cb')}}</td>
      <td>{{$result->sum('xb')}}</td>
      <td>{{$result->sum('JWF')}}</td>
      <td>{{$result->sum('QNF')}}</td>
      <td>{{$result->sum('Rcgz')}}</td>

      <td>{{$result->sum('ghjf')}}</td>
      <td>{{$result->sum('bgf')}}</td>

      <td>{{$result->sum('total')}}</td>




    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
