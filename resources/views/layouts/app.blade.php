<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
  @include('inc.head')
  <body>
    @include('inc.header')
    <div class="content-wrapper">
      @yield('content')
    </div>
    @include('inc.footer')
  </body>
</html>
