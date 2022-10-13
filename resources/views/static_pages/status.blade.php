@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> {{$_SESSION['ND']}}年预算调整汇总表 </h1>

 <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
 


<table class="table table-bordered  border-danger table-striped table-hover table-condensed table-lg"


  
  id="testTable"
  data-toggle="table"
  data-search="true"
  data-search-highlight="true"
  data-sticky-header="true">
    
    <thead class="header table-dark">
      <tr class='bg-warning sticky-sm-top header'>
   
      <th>股室</th>
      <th>单位</th>
      <th>调动变动</th>
      <th>增资变动</th>
      <th>丧抚费</th>
      <th>职 业年金</th>

      <th>合计</th>
      <th>报刊费</th>
      <th>扣费后</th>
      <th>+</th>
      <th>-</th>
            
          </thead>

          <tbody class='table-hover'>
            </tr>

             <tr class="table-success table-bordered border-danger">
              <td>合计</td><td>合计</td>
              <td>{{$aa = $results->sum(function ($payment) {return $payment->transfers->sum('newamount');})}}</td>
              <td>{{$bb = $results->sum(function ($payment) {return $payment->adjusts->reject(function($v){return strstr($v->orderid,'丧') OR strstr($v->orderid,'职');})->sum('amount');})}}</td>

      <td>
      {{$cc = $results->sum(function ($payment) {return $payment->adjusts->filter(function($v){return strstr($v->orderid,'丧');})->sum('amount');})}}
      </td>

      <td>
      {{$dd = $results->sum(function ($payment) {return $payment->adjusts->filter(function($v){return strstr($v->orderid,'职');})->sum('amount');})}}
      </td>



              <td>{{$aa+$bb + $cc + $dd}}</td>
              <td>{{$ee = $results->sum(function ($result) {return ($result->paperfee->amount??0);})}}</td>
              <td>{{$aa+$bb + $cc + $dd-$ee}}</td>
              <td>
              {{$jia = $results->sum(function ($payment) {return $payment->transfers->filter(function($v){return $v->newamount>0;})->count();})}}
              </td>
              <td>
                {{$jian = $results->sum(function ($payment) {return $payment->transfers->filter(function($v){return $v->newamount<0;})->count();})}}
              </td>

             </tr>

            @foreach ($offices as $k=>$office)
                @foreach($office->organizations as $key=>$organization)
                    <tr class=''>
                      
                  
                    <td>{{$organization->office}}</td>
                    <td><a href="/summarize/{{$organization->unit}}">{{$organization->unit}}</a></td>
                    <td> <a href="/transfer/{{$organization->unit}}">{{$amount1 = $organization->transfers->sum('newamount')}}</a> </td>
                    <td> <a href="/adjustorder/-{{$organization->unit}}">{{$amount2 = $organization->adjusts->reject(function($v){return strstr($v->orderid,'丧') OR strstr($v->orderid,'职');})->sum('amount')}}</a> </td>

                    <td><a href="/adjustorder/丧+{{$organization->unit}}">
                      {{$amount8 = $organization->adjusts->filter(function($v){return strstr($v->orderid,'丧') ;})->sum('amount')}}
                    </a></td>

                    <td><a href="/adjustorder/职+{{$organization->unit}}">
                      {{$amount9 = $organization->adjusts->filter(function($v){return strstr($v->orderid,'职') ;})->sum('amount')}}
                    </a></td>

                    <td>{{$amount1 + $amount2 +$amount8 +$amount9}}</td>

                    <td>{{$amount3 = $organization->paperfee->amount??'0'}}</td>
                    <td>{{$amount1 + $amount2 +$amount8 +$amount9-$amount3}}</td>
                    <td ><button class="btn btn-success btn-sm">{{$organization->transfers->filter(function($v){return $v->newamount>0;})->count()}}</button></td>
                    <td ><button class="btn btn-danger btn-sm">{{$organization->transfers->filter(function($v){return $v->newamount<0;})->count()}}</button></td>
                  </tr>
                @endforeach
                      <tr class="table-success">
                
         
                    <td>{{$office->office}}</td>
                    <td>汇总</td>
                    <td>{{$a = $office->transfers->sum(function ($transfer) {return $transfer->newamount;})}}</td>
                    <td>{{$b = $office->adjusts->reject(function($v){return strstr($v->orderid,'丧') OR strstr($v->orderid,'职');})->sum(function ($adjust) {return $adjust->amount;})}}</td>

             

                    <td>{{$c = $office->adjusts->filter(function($v){return strstr($v->orderid,'丧');})->sum(function ($adjust) {return $adjust->amount;})}}</td>

                    <td>{{$d = $office->adjusts->filter(function($v){return strstr($v->orderid,'职');})->sum(function ($adjust) {return $adjust->amount;})}}</td>



                    <td>{{$a+$b + $c + $d}}</td>
                    <td>{{$e = $office->organizations->sum(function ($organization) {return ($organization->paperfee->amount??0);})}}</td>
                    <td>{{$a+$b + $c + $d-$e}}</td>

                    <td>
                      {{$office->transfers->filter(function($v){return $v->newamount>0;})->count()}}
                    </td>
                    <td>
                      {{$office->transfers->filter(function($v){return $v->newamount<0;})->count()}}
                    </td>

                   </tr>
            @endforeach 


             <tr class="table-primary">
              <td>合计</td><td>合计</td>
              <td>{{$aa}}</td>
              <td>{{$bb}}</td>
              <td>{{$cc}}</td>
              <td>{{$dd}}</td>
              <td>{{$aa+$bb + $cc + $dd}}</td>
              <td>{{$ee}}</td>
              <td>{{$aa+$bb + $cc + $dd-$ee}}</td>
              <td>{{$jia}}</td><td>{{$jian}}</td>
             </tr>
                 <thead>
           
    </thead>
    </tbody>
    </table>
       
     



      
      </div>

    </div>
 
@stop
