@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br>
        <br>


 <h1 class="title" align="middle"> </h1>
 <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
      <th>股室</th>
      <th>单位</th>
      
      <th>明细</th>
      <th>调动</th>
      <th>增资</th>
      <th>增加</th>
      <th>减少</th>
      <th>其中退休</th>
      <th>其中新增供养</th>





      </tr>
    </thead>

    <tbody class='table-hover'>
     <tr class="table-success">
      <td colspan="3" class="middle">合计</td>
      <td>
      {{$results->flatMap(function ($item, $key) {return $item->transfers;})->sum('newamount')}}
      </td>
      <td>
      {{$results->flatMap(function ($item, $key) {return $item->adjusts;})->sum('amount')}}
    </td>


      <td>
        {{$results->flatMap(function ($item, $key) {return $item->transfers;})->filter(function($v){return $v['newamount']>0;})->count()}}
      </td>
      <td>
        {{$results->flatMap(function ($item, $key) {return $item->transfers;})->filter(function($v){return $v['newamount']<0;})->count()}}
      </td>

      <td>
        {{$results->flatMap(function ($item, $key) {return $item->transfers;})->filter(function($v){return $v['newamount']<0 AND strstr($v['zhaiyao'],'退休');})->count()}}
      </td>
      <td>
       {{$results->flatMap(function ($item, $key) {return $item->transfers;})->filter(function($v){return $v['newamount']>0 AND strstr($v['from'],'20');})->count()}}
      </td>

     </tr>
        
 
      @foreach ($results as $k1=>$result)
      <tr class=''>
        

 
      <td> {{$result->office}}</td>
       <td><a href="/transfer/{{$result->unit}}">{{$result->unit}}</a></td>
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

       <td><font color="green">{{$result->transfers->filter(function($v){return $v['newamount']>0;})->count()}}</font></td>
       <td><font color="red">{{$result->transfers->filter(function($v){return $v['newamount']<0;})->count()}}</font></td>
      <td><font color="blue">{{$result->transfers->filter(function($v){return $v['newamount']<0 AND strstr($v['zhaiyao'],'退休');})->count()}}</font></td>
      <td><font color="blue">{{$result->transfers->filter(function($v){return $v['newamount']>0 AND strstr($v['from'],'20');})->count()}}</font></td>


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
