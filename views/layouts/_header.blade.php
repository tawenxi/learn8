<header class="navbar navbar-fixed-top navbar-inverse">
  <meta name="referrer" content="never">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
     <!--  <div  class="navbar-header">财政局预算测算</div> -->
       <a class="navbar-header navbar-brand" href="#">财政局预算测算</a>
      <nav>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
            <li><a href="">用户列表</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->name }} <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="">个人中心</a></li>
                <li><a href="">编辑资料</a></li>
                <li class="divider"></li>
                <li>
                  <a id="logout" href="#">
                    <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>
          @else
            <li><a href="">帮助</a></li>
            <li><a href="">登录</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>
