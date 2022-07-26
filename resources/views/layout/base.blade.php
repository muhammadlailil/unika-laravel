<!doctype html>
<html lang="en">
  <head>
    @include('layout.css')
  </head>
  <body>
    @include('layout.navbar')
    
    @yield('content')

    @include('layout.footer')
    @include('layout.js')
  </body>
</html>