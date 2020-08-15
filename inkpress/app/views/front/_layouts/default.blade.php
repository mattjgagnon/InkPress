<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')
 | {{ trans('site.name') }}</title>

    @include('front._partials.assets')
</head>
<body>

    @include('front._partials.navigation')

    <div class="container theme-showcase">
        @yield('main')
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

</body>
</html>
