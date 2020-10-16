<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    <div id="app">
      @include('inc.navbar')
      @include('inc.managesidebar')
        <main class="working-area py-4">
            @yield('content')
            @include('inc.alerts')
        </main>
    </div>
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}">
      </script>
         <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
      @yield('script')

     
</body>
</html>
