<header class="navbar navbar-dark bg-primary fixed-top">
  <div class="container">
    <div class="col-md-offset-0 col-md-12">
       <a class="navbar-header navbar-brand text-end" href="/status">财政局预算测算</a>
    

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