<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/user.js') }}" defer></script>
    
    <!-- TomTom -->
    <link  rel = 'stylesheet'  type = 'text/css'  href = ' https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps.css ' > 
    <script  src = "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js" > </script>
    <script  src = "https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/services/services-web.min.js" ></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.11/SearchBox-web.js"></script>
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.11/SearchBox.css'>
    
    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.14.0/maps/maps.css'>
    <link rel='stylesheet' type='text/css' href='../assets/ui-library/index.css'/>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Fontawsome -->
    <script defer src="~@fortawesome/fontawesome-free/scss/brands"></script>
    <script defer src="~@fortawesome/fontawesome-free/scss/regular"></script>
    <script defer src="~@fortawesome/fontawesome-free/scss/solid"></script>
    <script defer src="~@fortawesome/fontawesome-free/scss/fontawsome"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
   
            @include('partials.header')

            <main class="main-content">
                @yield('content')
            </main>

            @include('partials.footer')
            
    </div>
</body>
</html>
