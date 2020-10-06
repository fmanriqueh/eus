<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Simple CMS" />
        <meta name="author" content="Sheikh Heera" />
        <link rel="shortcut icon" href="{{ asset('favicon.png') }}" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>@yield('title')</title>
        
        <!-- Scripts -->
        <script src={{ asset('js/app.js') }} defer></script>
        <script src={{ asset('js/header.js') }} defer></script>
        <script src={{ asset('js/footer.js') }} defer></script>

        <script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>

        <!-- Styles -->
        <link href={{ asset('css/app.css') }} rel="stylesheet">
        <link href={{ asset('css/header.css') }} rel="stylesheet">
        <link href={{ asset('css/footer.css') }} rel="stylesheet">

        <!-- JQuery -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        

    </head>    
    <body>        
        @include('layouts.header')
        <div class="body-container">
            <div class="container">
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </body>
</html>