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
    <link href="http://kenwheeler.github.io/slick/slick/slick.css" rel="stylesheet"/>
    <link href="http://kenwheeler.github.io/slick/slick/slick-theme.css" rel="stylesheet"/>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @yield('css')
</head>
<body>

    {{-- header --}}
    <header>
      {{-- @include('layouts.menu') --}}
      @include('layouts._menu')
    </header>

    {{-- Content --}}
    <main>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </main>
    {{-- footer --}}
    <footer>
        @include('layouts.footer')
    </footer>


    {{-- scripts --}}
    {{-- fontawesome --}}
    <script src="https://kit.fontawesome.com/d7cd3ef488.js" crossorigin="anonymous"></script>
    {{-- myscript --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>



