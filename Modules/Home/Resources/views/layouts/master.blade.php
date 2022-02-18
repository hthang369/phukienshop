<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        @include('home::partial.google')
        <title>@yield('header_title', data_get($infoSettings, 'info.web_name'))</title>
        @include('home::partial.seo-meta')
        @include('home::partial.link')
        @stack('styles')
        @stack('script_gg')
    </head>
    <body>
        @stack('no_script')

        <section>
            @include('home::partial.header')

            <section class="d-block container-xl">
                <div class="row">
                    @include('home::partial.left')

                    <div id="iContent" class="col-md-9 col-sm-9 col-12 mt-2 pl-0 pr-0">
                        <x-card bodyClass="p-0">
                            @include('home::partial.menuside')
                        </x-card>
                        <div class="card mt-2">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>

            @include('home::partial.footer')

            @include('home::partial.back_to_top')
        </section>

        <script src="{{ asset('public/js/app.js') }}"></script>
        <script src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('public/js/main.js') }}"></script>
        @stack('scripts')
    </body>
</html>
