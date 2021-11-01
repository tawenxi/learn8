@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

  <h1 class="title" align="middle"> {{$keyword}} -- {{$results->count()}}人</h1>
 <h1 class="title" align="middle">  <{{$results->filter(function($v){return $v->ifonwork=='2-在职人员'; })->count()}}人在职>
  <{{$results->filter(function($v){return $v->ifonwork=='3-退休人员'; })->count()}}人退休><font color="red"></font></h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg table-dark">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
    <th>单位</th>
      <th>姓名</th>
      <th>基本工资</th>
      <th>津补贴</th>
      <th>绩效工资</th>
      <th>奖金</th>

      <th>养老保险</th>
      <th>公积金</th>
      <th class="danger">医保</th>
      <th>失业</th>
      <th>工伤</th>
      <th class="danger">年金</th>

      <th>车补</th>
      <th>乡镇补</th>

      <th>降温费</th>
      <th>取暖费</th>
   

      <th>年度工会</th>
      <th>办公费</th>

      <th>合计</th>



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class='success'>
        
 
      <td>合计</td>
       <td></td>

       <td>{{$results->sum('jbgz2')}}</td>
      <td>{{$results->sum('jbt2')}}</td>

      <td>{{$results->sum('performancepay2')}}</td>


      <td>{{$results->sum('bonus')}}</td>
      <td>{{round($results->sum('ylbx2'),0)}}</td>

      <th>{{round($results->sum('gjj2'))}}</th>
      <th>{{round($results->sum('yb'),0)}}</th>
      <th>{{round($results->sum('sb'),0)}}</th>
      <th>{{round($results->sum('gb'),0)}}</th>
      <th>{{round($results->sum('nj'),0)}}</th>
      
      


      <td>{{$results->sum('cb')}}</td>
      <td>{{$results->sum('xb')}}</td>

      <td>{{$results->sum('jwf')}}</td>
      <td>{{$results->sum('qrf')}}</td>
    

      <td>{{round($results->sum('ghjf'))}}</td>
      <td>{{$results->sum('bgf')}}</td>

      <td>{{round($results->sum('total'))}}</td>
  




    </tr>
      @foreach ($results as $k=>$result)
      <tr class=''>
        
 
 <td>{{$result->unitname}}</td>
      <td>{{$result->personname}}</td>
      <td>{{$result->jbgz2}}<br></br>{{$result->jbgz}}</td>
      <td>{{$result->jbt2}}<br></br>{{$result->jbt}}</td>
      <td>{{$result->performancepay2}}</td>
      <td>{{$result->bonus}}</td>

      <td>{{round($result->ylbx2)}}</td>
      <td>{{$result->gjj2}}</td>
      <td>{{round($result->yb),0}}</td>

      <td>{{$result->sb}}</td>
      <td>{{round($result->gb,0)}}</td>
      <td>{{round($result->nj,0)}}</td>
    

      <td>{{$result->cb}}</td>
      <td>{{$result->xb}}</td>
      <td>{{$result->jwf}}</td>
      <td>{{$result->qrf}}</td>
     

      <td>{{round($result->ghjf)}}</td>
      <td>{{$result->bgf}}</td>

      <td>{{round($result->total,0)}}</td>




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
