@extends('layouts.default')

@section('content')

    <div class="row">
      <div class="col-md-15 ">
        <section class="status_form">
        
        </section>
        <br>
        <br>
        <br>
  

 <h1 align="middle"> 目录 </h1>
<table class="table table-bordered table-striped table-hover table-condensed table-lg ">
    <caption><center>{{ date("Y-m-d H:i:s") }}</center></caption>
    <thead>
      <tr class='bg-primary'>
      <th>摘要</th>
      <th>链接</th>
      <th>作用</th>
      </tr>
    </thead>
    <tbody class='table-hover'>

        <tr class='info'>
            <td><a href="/status/">预算调整资金明细</a></td>
            <td>/status/</td>
            <td>预算调整资金明细</td>
        </tr>
        <tr class='info'>
            <td><a href="/summarize/泉江镇人民政府">预算调整总表</a></td>
            <td>/summarize/</td>
            <td>预算调整总表</td>
        </tr>

        <tr class='info'>
            <td><a href="/transferlist3/">预算调整人数明细
</a></td>
            <td>/transferlist3/</td>
            <td>预算调整人数明细</td>

            </tr>  
        <tr class='info'>
            <td><a href="/gongyanginfo/财政局">供养人员信息</a></td>
            <td>/gongyanginfo/</td>
            <td>供养人员信息</td>
        </tr> 

        <tr class='info'>
            <td><a href="/maninfo/0/民政局">人员对比</a></td>
            <td>/maninfo/1/</td>
            <td>人员对比</td>
        </tr> 

<tr class='info'>
            <td><a href="/transfer">概览调动数据</a></td>
            <td>/transfer</td>
            <td>概览调动数据</td>
        </tr>

        <tr class='info'>
            <td><a href="/transfer/左安">调动数据清单</a></td>
            <td>/transfer/{keyword}</td>
            <td>调动数据清单</td>
        </tr>
        <tr class='info'>
            <td><a href="/transferorders">所有介绍信</a></td>
            <td>/transferorders/{keyword}</td>
            <td>所有介绍信</td>
        </tr>

            <tr class="table-success">
            <td><a href="/retires/财政局">退休人员查询</a></td>
            <td>/retires/{keyword}</td>
            <td>退休人员查询</td>

            </tr>   
            <tr class="table-success">
            <td><a href="retiresexport">退休人员导出</a></td>
            <td>retiresexport</td>
            <td>退休人员导出</td>

            </tr>    
            </tr>   
            <tr class="table-success">
            <td><a href="/unit/财政局">单位查询</a></td>
            <td>/unit/{keyword}</td>
            <td>单位查询</td>
        </tr>
            <tr class='info'>
            <td><a href="/village/左安">行政村查询查询</a></td>
            <td>/village/{keyword}</td>
            <td>行政村查询</td>
        </tr>

            </tr>   
        <tr class="table-danger">
            <td><a href="/workman/财政局">预算数据测算</a></td>
            <td>/workman/{keyword}</td>
            <td>导入人员数据</td>
        </tr>
        <tr class="table-danger">
            <td><a href="/workman">概览预算测算数据</a></td>
            <td>/workman</td>
            <td>概览预算测算数据</td>
        </tr>
        

        <tr class="table-danger">
            <td><a href="/findman/mutiman">找到重复预算人员</a></td>
            <td>/unit/{keyword}</td>
            <td>找到重复预算人员</td>
        </tr>
        <tr class="table-danger">
            <td><a href="/findman/刘小勇">搜索去年的预算人员</a></td>
            <td>/findman/{keyword}</td>
            <td>搜索去年的预算人员</td>
        </tr>

        <tr class='info'>
            <td><a href="/adjust">调整数据清单</a></td>
            <td>/adjust</td>
            <td>调整数据清单</td>
        </tr>
        <tr class='info'>
            <td><a href="/adjustlist">概览调整数据</a></td>
            <td>/adjustlist</td>
            <td>概览调整数据</td>
        </tr>
        <tr class='info'>
            <td><a href="/adjustorder/左安">搜索调整数据</a></td>
            <td>/adjustorder/{keyword}</td>
            <td>搜索调整数据</td>
        </tr>

            </tr>   
    </tbody>        
       
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
