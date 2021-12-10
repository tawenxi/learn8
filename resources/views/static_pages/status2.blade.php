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
   
      <th>股室</th>

      <th>调动变动</th>
      <th>增资变动</th>

      <th>合计</th>


      </tr>
    </thead>

    <tbody class='table-hover'>
      @foreach ($payments as $k=>$payment)
      <tr class=''>
        
 
      <td>{{$payment->office}}</td>
   
      <td> <a href="">{{$amount1 = $payment->transfers->sum('newamount')}}</a> </td>
      <td> <a href="">{{$amount2 = $payment->adjusts->sum('amount')}}</a> </td>
      <td>{{$amount1 + $amount2}}</td>



    </tr>
       @endforeach 
       <tr>
        <td>合计</td>
        <td>{{$a = $payments->sum(function ($payment) {return $payment->transfers->sum('newamount');})}}</td>
        <td>{{$b = $payments->sum(function ($payment) {return $payment->adjusts->sum('amount');})}}</td>
        <td>{{$a+$b}}</td>

       </tr>
       
</table>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>股室</th>
      <th>单位</th>
      <th>调动变动</th>
      <th>增资变动</th>
      <th>丧抚费</th>
      <th>职 业年金</th>

      <th>合计</th>
      <th>报刊费</th>
<th>扣费后</th>
      </tr>
    </thead>

    <tbody class='table-hover'>
      @foreach ($results as $k=>$result)
      <tr class=''>
        
 
      <td>{{$result->office}}</td>
      <td>{{$result->unit}}</td>
      <td> <a href="/transfer/{{$result->unit}}">{{$amount1 = $result->transfers->sum('newamount')}}</a> </td>
      <td> <a href="/adjustorder/-{{$result->unit}}">{{$amount2 = $result->adjusts->reject(function($v){return strstr($v->orderid,'丧') OR strstr($v->orderid,'职');})->sum('amount')}}</a> </td>

      <td><a href="/adjustorder/丧+{{$result->unit}}">
        {{$amount8 = $result->adjusts->filter(function($v){return strstr($v->orderid,'丧') ;})->sum('amount')}}
      </a></td>

      <td><a href="/adjustorder/职+{{$result->unit}}">
        {{$amount9 = $result->adjusts->filter(function($v){return strstr($v->orderid,'职') ;})->sum('amount')}}
      </a></td>

      <td>{{$amount1 + $amount2 +$amount8 +$amount9}}</td>

      <td>{{$amount3 = $result->paperfee->amount??'0'}}</td>
      <td>{{$amount1 + $amount2 +$amount8 +$amount9-$amount3}}</td>
    </tr>
       @endforeach 
       <tr>
        <td>合计</td><td>合计</td>
        <td>{{$a = $results->sum(function ($payment) {return $payment->transfers->sum('newamount');})}}</td>
        <td>{{$b = $results->sum(function ($payment) {return $payment->adjusts->reject(function($v){return strstr($v->orderid,'丧') OR strstr($v->orderid,'职');})->sum('amount');})}}</td>

<td>
{{$c = $results->sum(function ($payment) {return $payment->adjusts->filter(function($v){return strstr($v->orderid,'丧');})->sum('amount');})}}
</td>

<td>
{{$d = $results->sum(function ($payment) {return $payment->adjusts->filter(function($v){return strstr($v->orderid,'职');})->sum('amount');})}}
</td>



        <td>{{$a+$b + $c + $d}}</td>
        <td>{{$e = $results->sum(function ($result) {return ($result->paperfee->amount??0);})}}</td>
        <td>{{$a+$b + $c + $d-$e}}</td>

       </tr>
           <thead>
      <tr class='bg-primary'>
   
      <th>股室</th>
      <th>单位</th>
      <th>调动变动</th>
      <th>增资变动</th>
      <th>丧抚费</th>
      <th>职 业年金</th>

      <th>合计</th>
      <th>报刊费</th>
<th>扣费后</th>
      </tr>
    </thead>
</table>














      
      </div>

    </div>
 
@stop
