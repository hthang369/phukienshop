<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('home::partial.google')
        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('header_title', data_get($infoSettings, 'info.web_name'))</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset("storage/images/".data_get($infoSettings, 'home.web_favicon')) }}">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/home_app.css') }}" rel="stylesheet">
        @stack('styles')
        @stack('script_gg')
    </head>
    <body>
        @stack('no_script')

        <section>
            @include('home::partial.header')

            @yield('content')

            @include('home::partial.right')

            @include('home::partial.footer')

            @include('home::partial.back_to_top')
        </section>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/data-grid.js') }}"></script>
        @stack('scripts')
    </body>
</html>
