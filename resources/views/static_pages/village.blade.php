@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle">
@if ($keyword)
 {{$keyword}}
@endif
---{{$results->count()}}
 </h1>
<caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
      <th>loop</th>
      <th>id</th>
      <th>编号</th>
      <th>村名</th>
      <th>乡镇</th>
      <th>级别</th>


      </tr>
    </thead>

    <tbody class='table-hover'>
      @foreach ($results as $k=>$result)
      <tr class=''>
        
 
      <td>{{$loop->index+1}}</td>
      <td>{{$result->id}}</td>
      <td>{{$result->villageid}}</td>
      <td>{{$result->name}}</td>
      <td class="">{{$result->belongto}}</td>
      <td>{{$result->class}}</td>


    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
