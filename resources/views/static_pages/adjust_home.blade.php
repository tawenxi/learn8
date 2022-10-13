@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br>
        <br>
        <br>


 <h1 class="title" align="middle"> 增资  调 整表 </h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单位</th>
      <th>金额</th>
      <th>明细</th>



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
        
 
      @foreach ($results as $k=>$result)
      <tr class=''>
        

 
      <td> <a href="/transfer/{{$k}}">{{$k}}</a></td>
       <td><center>{{$result->sum('amount')}}</center></td>
       <td>

           @foreach ($result as $k=>$res)
           {{$res->zhaiyao }}
           <button class=" btn btn-success btn-sm">{{$res->organization->office }}</button> <br>
           @endforeach 
       </td>




    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
