<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '财政局预算测算') - 财政局预算测算</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
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
  </body>
</html>
