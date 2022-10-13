<header class="navbar navbar-dark bg-primary fixed-top">
  <div class="container">
    <div class="col-md-offset-0 col-md-12">
       <a class="navbar-header navbar-brand text-end" href="/">功能预览</a>
       <a class="navbar-header navbar-brand text-end" href="/status">总表</a>
@if (strstr(url()->full(),'findman'))

<a class="navbar-header navbar-brand text-end" href="/workman/{{request('keyword')}}">22年预算</a>
<a class="navbar-header navbar-brand text-end" href="/gongyang/{{request('keyword')}}">21年供养</a>
@endif    
@if (strstr(url()->full(),'workman'))
<a class="navbar-header navbar-brand text-end" href="/findman/{{request('keyword')}}">21年预算</a>
<a class="navbar-header navbar-brand text-end" href="/gongyang/{{request('keyword')}}">21年供养</a>
@endif  


@if (strstr(url()->full(),'gongyang'))
<a class="navbar-header navbar-brand text-end" href="/findman/{{request('keyword')}}">21年预算</a>
<a class="navbar-header navbar-brand text-end" href="/workman/{{request('keyword')}}">22年预算</a>
@endif  
<a class="navbar-header navbar-brand text-end" href="/transfer/{{request('keyword')}}">transfer</a>
@if (strstr(url()->full(),'transfer'))  
<a class="navbar-header navbar-brand text-end" href="/adjustorder/{{request('keyword')}}">adjustorder</a>
@endif 
@if (strstr(url()->full(),'adjustorder'))  
<a class="navbar-header navbar-brand text-end" href="/transfer/{{request('keyword')}}">transfer</a>
@endif 
      <!-- Example split danger button -->
      <div class="btn-group float-end">
        <button type="button" class="btn btn-primary">{{$_SESSION['ND']}}年度</button>
        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="visually">请选择年度</span>
        </button>
        <ul class="dropdown-menu">
          
          <li><a class="dropdown-item" href="#">请选择年度</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="/session/2021">2021年度</a></li>
          <li><a class="dropdown-item" href="/session/2022">2022年度</a></li>
          

        </ul>
      </div>

    </div>
  </div>
</header>