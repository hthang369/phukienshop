<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', '@Master Layout'))</title>

       <link rel="stylesheet" href="{{ asset('public/css/adminlte.min.css') }}">
       <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">
       <link rel="stylesheet" href="{{ asset('public/css/admin.css') }}">
       <link rel="stylesheet" href="{{ asset('public/css/multiple-select.min.css') }}">
       <link rel="stylesheet" href="{{ asset('public/css/multiple-select-bootstrap.min.css') }}">
        @stack('styles')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed dark-mode">
        <section class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
              <img class="animation__shake" src="{{ asset('public/images/logo/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>

            <div class="fixed-top w-25 mt-3" id="popupToast"></div>

            @include('admin::partial.header')

            @include('admin::partial.sidebar')

            @include('admin::partial.content')

            @include('admin::partial.footer')

            @include('bootstrap::components.modal.container')
        </section>

        <script src="{{ asset('public/js/app.js') }}"></script>
        <script src="{{ asset('public/js/multiple-select.min.js') }}"></script>
        <script src="{{ asset('public/js/adminlte.js') }}"></script>
        <script src="{{ asset('public/js/data-grid.js') }}"></script>
        @stack('scripts')
        @yield('scripts_content')
    </body>
</html>
