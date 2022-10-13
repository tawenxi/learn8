<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '财政局预算测算') - 财政局预算测算</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-table.min.css">
    <link rel="stylesheet" href="/css/bootstrap-table-sticky-header.min.css">
     
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="offset-md-0 col-md-12">
        @include('shared.messages')
        @yield('content')
        @include('layouts._footer')
        
      </div>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap-table.min.js"></script>
    <script src="/js/bootstrap-table-sticky-header.min.js"></script>
  </body>
</html>
