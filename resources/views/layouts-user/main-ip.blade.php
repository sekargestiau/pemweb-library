<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts-user.head')
        <title>@yield('title')</title>
    </head>
  <body>
    <main>
        @include('layouts-user.header-ip')
        @yield('container')
    </main>
    <footer>
        @include('layouts-user.footer-ip')
    </footer>
  </body>
</html>