<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '卫健委文件查询') - 卫健委文件查询</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts._header')

    <div class="container">
      <div class="col-md-offset-1 col-md-10">
        @include('shared.messages')
        @yield('content')
        <!-- @include('layouts._footer') -->
        
      </div>
    </div>

    <script src="/js/app.js"></script>
  </body>
</html>
