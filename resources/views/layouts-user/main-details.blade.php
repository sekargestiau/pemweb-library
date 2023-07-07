<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts-user.head')
        <title>@yield('title')</title>
    </head>
  <body>
    <main>
        @include('layouts-user.header-details')
        @yield('container')
    </main>
    <footer>
        @include('layouts-user.footer-details')
    </footer>
  </body>
</html>