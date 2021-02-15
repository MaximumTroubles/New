<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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
        <div class="row">
            <div class="col-md-3">
              @section('sidebar')
                @include('store.parts._list-categories')
              @show
            </div>
            <div class="col-md-9">
              @yield('content') 
            </div>
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

    

