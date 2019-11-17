<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    @include('frontend.components.meta')
  </head>
  <body>
    <div id="app">
      @include('frontend.components.header')
      @yield('content')
      @include('frontend.components.footer')
    </div>
  </body>
</html>
