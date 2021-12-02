@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br>
        <br>


 <h1 class="title" align="middle"> </h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg table-dark">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
      <th>股室</th>
      <th>单位</th>
      
      <th>明细</th>
      <th>调动</th>
      <th>增资</th>
      <th>减少</th>





      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class='success'>
        
 
      @foreach ($results as $k1=>$result)
      <tr class=''>
        

 
      <td> {{$result->office}}</td>
       <td>{{$result->unit}}</td>
       <td>
        @foreach($result->transfers as $k=>$v)
        {{$v->zhaiyao}}@@
        @endforeach
        @foreach($result->adjusts as $k=>$v)
        {{$v->zhaiyao}}@@
        @endforeach

       </td>


       <td>{{$result->transfers->sum('newamount')}}</td>
       <td>{{$result->adjusts->sum('amount')}}</td>

 


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
