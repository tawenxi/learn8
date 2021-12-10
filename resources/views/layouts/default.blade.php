<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '财政局预算测算') - 财政局预算测算</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/sticky-header/bootstrap-table-sticky-header.min.css">
     
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="offset-md-0 col-md-12">
        @include('shared.messages')
        @yield('content')
        <!-- @include('layouts._footer') -->
        
      </div>
    </div>

    <script src="/js/app.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
   
   
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.19.1/dist/extensions/sticky-header/bootstrap-table-sticky-header.min.js"></script>
  </body>
</html>
