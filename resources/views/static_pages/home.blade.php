@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br><br><br><br>

 <h1 class="title" align="middle"> {{$keyword}}</h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
   
      <th>编号</th>
      <th>时间</th>
      <th>文号</th>
      <th>标题</th>
      <th>单位</th>
      <th>状态</th>
      <th>收发文</th>
      <th>文件要素</th>
      <th>文件</th>
      <th>记录</th>
      <th>处理</th>
      <th>承办人</th>
      </tr>
    </thead>

    <tbody class='table-hover'>
      @foreach ($results as $k=>$result)
      <tr class=''>
        
 
 
   <td>{{$result->docid}}</td>
      <td>{{$result->shijian}}</td>
      <td>{{$result->wenhao}}</td>
      <td class="">{{$result->biaoti}}</td>
      <td>{{$result->danwei}}</td>
      <td>{{$result->zhuangtai}}</td>
      <td>{{$result->leixing}}</td>
      <td><a href="{{$result->Docinfolink}}" rel=noreferre target="_blank">素</a></td>
      <td><a href="{{$result->Doclink}}" rel=noreferre target="_blank">文</a></td>
      <td><a href="{{$result->Dochistory}}" rel=noreferre target="_blank">录</a></td>
      <td><a href="{{$result->Dochander}}" rel=noreferre target="_blank">处</a></td>
      <td>{{$result->chengbanren}}</td>
    </tr>
       @endforeach 

       
</table>

{{ $results->links() }}



      
      </div>

    </div>
 
@stop
