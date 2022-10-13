@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> {{$keyword}}</h1>
 <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>单位编号</th>
      <th>单位名称</th>

      </tr>
    </thead>

    <tbody class='table-hover'>
      @foreach ($results as $k=>$result)
      <tr class=''>
        
 
 
   <td>{{$result->unitid}}</td>
      <td>{{$result->unitname}}</td>



    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
