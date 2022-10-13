@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

  <h1 class="title" align="middle"> {{$keyword}} -- {{$renshu = $results->count()}}人</h1>
 <h1 class="title" align="middle">  <{{$zaizhi = $results->filter(function($v){return $v->ifonwork=='2-在职人员'; })->count()}}人在 职>
  <{{$results->filter(function($v){return $v->ifonwork=='3-退休人员'; })->count()}}人退休@><font color="red"></font>

  <{{$results->filter(function($v){return $v->sex=='2-女' AND $v->ifonwork=='2-在职人员'; })->count()}}女干部@>
    <{{$results->filter(function($v){return $v->type=='1-公务员' AND $v->ifonwork=='2-在职人员'; })->count()}}公务员@>
      <{{$results->filter(function($v){return $v->ifonwork=='2-在职人员'; })->count()-$results->filter(function($v){return $v->type=='1-公务员' AND $v->ifonwork=='2-在职人员'; })->count()}}事业@>

      <{{$results->filter(function($v){return $v->persontype=='92-遗属'; })->count()}}遗属补助@>

        <br>
        基本工资={{$results->sum('jbgz2')}} <br>

        公务员基本工资=

        {{$results->filter(function($v){return $v->type=='1-公务员' AND $v->ifonwork=='2-在职人员'; })->sum('jbgz2')}} <br>
        一次性奖金
        {{$results->filter(function($v){return $v->type=='1-公务员' AND $v->ifonwork=='2-在职人员'; })->sum('jbgz2')/12}}
        <br>
        事业基本工资=

        {{$results->sum('jbgz2') - $results->filter(function($v){return $v->type=='1-公务员' AND $v->ifonwork=='2-在职人员'; })->sum('jbgz2')}} <br>
        绩效工资=

        {{$results->filter(function($v){return $v->ifonwork=='2-在职人员'; })
        ->reject(function($v){return $v->type=='1-公务员'; })

        ->sum('rawjbt')*12}} + {{$results->sum('jbgz2')/12 - $results->filter(function($v){return $v->type=='1-公务员' AND $v->ifonwork=='2-在职人员'; })->sum('jbgz2')/12}}  = {{$results->filter(function($v){return $v->ifonwork=='2-在职人员'; })
        ->reject(function($v){return $v->type=='1-公务员'; })

        ->sum('rawjbt')*12 + $results->sum('jbgz2')/12 - $results->filter(function($v){return $v->type=='1-公务员' AND $v->ifonwork=='2-在职人员'; })->sum('jbgz2')/12}} <br>

        津补贴=

        {{$results->filter(function($v){return $v->ifonwork=='2-在职人员'; })
        ->filter(function($v){return $v->type=='1-公务员'; })

        ->sum('rawjbt')*12}} <br>

        公积金基数
        {{$gj = $results->sum('jbgz2') + $results->sum('rawjbt')*12 - request()->get('chebu')}}<br>
        工会经费
        {{round($gj*0.02*0.6)}}<br>
        公积金
        {{round($gj*0.12)}}<br>
        工伤
        {{round($gj*0.0016)}}<br>
        养老保险基数
        {{$yj = $results->sum('jbgz2') + $results->sum('rawjbt')*12 + $results->sum('jbgz2')/12 - request()->get('chebu')}}<br>
        养老保险
        {{$yj*0.16}}<br>
        高温津贴{{$zaizhi*800}}
        取暖费{{$renshu*240}}

  </h1>
  <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
        <th>loop</th>
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

      <th>合计</th><th>去年</th>



      </tr>
    </thead>

    <tbody class='table-hover'>
            <tr class="table-success">
        
    <td></td>
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
  
      <td></td>



    </tr>
      @foreach ($results as $k=>$result)
      <tr class=''>

        @if(strstr($result->type,'1-公务员') AND strstr($result->ifonwork,'在职'))
        <tr class="table-success">
        @elseif(strstr($result->ifonwork,'退休'))
        <tr class='info'>

        @else
        <tr class=''>
        @endif
        <td>{{$loop->index+1}}</td>
 
 <td>{{$result->unitname}}</td>
      <td>{{$result->personname}}</td>
      <td>{{$result->jbgz2}}<br></br>{{$result->salary1}}+{{$result->salary2}}</td>
      <td>{{$result->jbt2}}<br></br>{{$result->allowance/12}}</td>
      <td>{{$result->performancepay2}}<br>{{$result->performancepay}}</td>
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
      @if ($result->has($key) == 'F' AND $result->istransfer($key) == 'N')
      <td class="danger">

      @else
      <td class="">
      @endif
      <a href="/findman/{{$result->personname}}">{{$result->has($key)}}</a>
        <a href="/transfer/{{$result->personname}}">{{$result->istransfer($key)}}</a></td>



    </tr>
       @endforeach 

       
</table>





      
      </div>

    </div>
 
@stop
