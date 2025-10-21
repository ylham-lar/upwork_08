<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upwork</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body class="bg-light">
@include('client.app.nav')
@yield('content')
</body>

</html>


{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <title>@yield('title')</title>--}}
{{--    <link rel="icon" href="{{ asset('img/favicon.ico') }}">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/bootstrap-icons.min.css') }}" rel="stylesheet">--}}
{{--    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--@yield('content')--}}
{{--@include('client.app.nav')--}}
{{--</body>--}}
{{--</html>--}}






