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
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                @include('store.parts._cart')
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary clear-cart">Clear Cart</button>
            <a href="/checkout" class="btn btn-primary">Checkout</a>
            </div>
        </div>
        </div>
    </div>


    {{-- scripts --}}
    {{-- fontawesome --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d7cd3ef488.js" crossorigin="anonymous"></script>
    {{-- myscript --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>
</html>



