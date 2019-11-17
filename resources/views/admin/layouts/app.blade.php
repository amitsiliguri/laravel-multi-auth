<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    @include('admin.components.links')
  </head>
  <body>
    <div id="app">
      @include('admin.components.header')
      <div class="container-fluid">
        @auth("admin")
        <div class="row">
          <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            @include('admin.components.sidebar')
          </nav>
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('content')
          </main>
        </div>
        @else
        <div class="row">
          <main role="main" class="col-12 px-4">
            @yield('content')
          </main>
        </div>
        @endauth
      </div>
      @include('admin.components.footer')
    </div>
  </body>
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</html>
