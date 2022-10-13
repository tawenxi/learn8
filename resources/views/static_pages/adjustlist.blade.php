@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br>
        <br>
        <br>
  

 <h1 align="middle"> 增资调整 表 </h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单位</th>
      <th>金额</th>
      



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
        
 
      @foreach ($results as $k=>$result)
      <tr class=''>
        

 
      <td> <a href="/adjustorder/{{$k}}">{{$k}}</a></td>
       <td>{{$result->sum('amount')}}</td>





    </tr>
       @endforeach 

       
</table>





      
      </div>
      <aside class="col-md-4">
        <section class="user_info">
        
        </section>
        <section class="stats">
         
        </section>
      </aside>
    </div>
 
@stop
