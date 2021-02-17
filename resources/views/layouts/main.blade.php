<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Slik slider --}}
    {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> --}}
    <link href="http://kenwheeler.github.io/slick/slick/slick.css" rel="stylesheet"/>
    <link href="http://kenwheeler.github.io/slick/slick/slick-theme.css" rel="stylesheet"/>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @yield('css')
</head>
<body>

    {{-- header --}}
    <header>
      @include('layouts.menu')

    </header>

    {{-- Content --}}
    <div class="container">


            <div class="content">
              @yield('content')
            </div>
    </div>










    {{-- footer --}}
    <footer>
        @include('layouts.footer')
    </footer>

    {{-- scripts --}}
    {{-- bootstrap --}}

    {{-- bootstrap --}}

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>



