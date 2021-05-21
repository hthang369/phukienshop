<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="referrer" content="strict-origin"/>

    <title>Laka Management - @yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FONT AWESOME -->
{{--    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="http://fortawesome.github.io/Font-Awesome/3.2.1/assets/font-awesome/css/font-awesome.css">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- CSS -->
    @section('bootstrap-css')
        @component('components.bootstrap-css')

        @endcomponent
    @show
    <style>
        #page-container {
            position: relative;
            min-height: 100vh;
            display: block;
            overflow: auto;
        }

        .container {
            position: relative;
            min-height: 100vh;
            display: block;
            overflow: auto;
        }

        .footer {

            /*clear: both;*/
            /*position: relative;*/
            /*height: 200px;*/
            /*margin-top: -200px;*/
            /*margin-top: -200px;*/

            position:fixed;
            bottom:0;
        }

        #main-container{
            min-height: 800px;
        }

        .required:after {
            content:" *";
            color: red;
            font-weight: bold;
        }
        @yield('style')
    </style>
</head>
<body>

<div id="page-container">
    <!-- Navbar -->
@section('navbar')
    @component('components.system-admin.navbar')

    @endcomponent
@show


<!-- Dialog confirm delete -->
    @section('dialog_confirm_delete')
        @component('common.dialog_confirm_delete')

        @endcomponent
    @show

    <div id="main-container" class="container-fluid m-0 pl-0">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-2 pr-0">
                @section('sidebar')
                    @component('components.system-admin.sidebar')

                    @endcomponent
                @show
            </div>
            <!-- Main content -->
            <div class="col-lg-10 px-0">
                <div class="mt-2 container-fluid">
                    @if (session('messCommon'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('messCommon') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('errorCommon'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('errorCommon') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @section('footer')
        @component('components.system-admin.footer')

        @endcomponent
    @show

<!-- Script -->
    @section('script')
        @component('components.bootstrap-script')

        @endcomponent
    @show

</div>

</body>
</html>
