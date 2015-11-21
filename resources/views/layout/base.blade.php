<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}">
    <title>Laradmin</title>
    <link rel="stylesheet" href="{{ asset('vendor/laradmin/css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/laradmin/css/lib/bootstrap-theme.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('vendor/laradmin/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/laradmin/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/laradmin/js/laradmin.js') }}"></script>
</body>
</html>
