<!DOCTYPE html>
<html lang="en">
    <head>
        <script type="text/javascript">
            var full_path = '<?= url('/') . '/'; ?>';
            var logged_in = '<?= (Auth()->guard('frontend')->guest()) ? true : false; ?>';
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="title" content="My Assignment">
        <meta name="keywords" content="My Assignment">
        <meta name="description" content="My Assignment">
        <meta property="og:title" content="My Assignment" />
        <meta property="og:description" content="My Assignment" />

        <title>{{ env('APP_NAME', 'My Assignment') }}</title>
        <link href="{{ URL::asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css" />
        <!--<link href="{{ URL::asset('public/frontend/css/datepicker.css') }}" rel="stylesheet" type="text/css" />-->
        <link href="{{ URL::asset('public/frontend/css/icofont.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/css/icofont.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/css/fonts/icomoon/style.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/css/custom.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('public/frontend/css/header-style.css') }}" rel="stylesheet" type="text/css" />
        
        <!-- style -->
        <link href="{{ URL::asset('public/frontend/css/datatables.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ URL::asset('public/backend/css/jquery-confirm.css') }}" />
        <link href="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.css') }}" rel="stylesheet" type="text/css" />


        @php
        $routeArray = app('request')->route()->getAction();
        $controllerAction = class_basename($routeArray['controller']);
        list($controller, $action) = explode('@', $controllerAction);
        @endphp
        @yield('css')
    </head>
    <body>
        
        <section class="body-wrappers">

        @include('partials.header')

        @yield('content')

        @include('partials.footer')

        </section>
        <!--<script src="{{ URL::asset('public/frontend/js/jquery.min.js') }}"></script>-->
        <script src="{{ URL::asset('public/frontend/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ URL::asset('public/frontend/js/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/js/jquery.sticky.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/js/main.js') }}" type="text/javascript"></script>
        <!-- navbar -->
        <script src="{{ URL::asset('public/frontend/js/select2.min.js') }}"></script>
        <script src="{{ URL::asset('public/frontend/js/datatables.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/js/slick.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/custom/iao-alert/iao-alert.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('public/frontend/custom/js/script.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ URL::asset('public/backend/js/jquery-confirm.js') }}"></script>

        <!------------------------------new more------------------------------------>

        <!------------------back to top-------------->
        <script>
            $(window).scroll(function() {
            var height = $(window).scrollTop();
            if (height > 100) {
                $('#back2Top').fadeIn();
            } else {
                $('#back2Top').fadeOut();
            }
            });
            $(document).ready(function() {
            $("#back2Top").click(function(event) {
                event.preventDefault();
                $("html, body").animate({
                scrollTop: 0
                }, "slow");
                return false;
            });
            });
        </script>
      <!------------------//back to top-------------->

        @yield('js')
        <!-- backtotop -->
        
        @if(Session::has('success'))
        <input type="hidden" id="success_msg" value="{{ Session::get('success') }}"/>

        <script>
            var success_msg = $('#success_msg').val();
            $.iaoAlert({
                type: "success",
                position: "bottom-right",
                mode: "dark",
                msg: success_msg,
                autoHide: true,
                alertTime: "9000",
                fadeTime: "1000",
                closeButton: true,
                fadeOnHover: true,
                zIndex: '9999'
            });
        </script>
        @endif
        @if(Session::has('error'))
        <input type="hidden" id="error_msg" value="{{ Session::get('error') }}"/>
        <script>
            var error_msg = $('#error_msg').val();
            $.iaoAlert({
                type: "error",
                position: "bottom-right",
                mode: "dark",
                msg: error_msg,
                autoHide: true,
                alertTime: "9000",
                fadeTime: "1000",
                closeButton: true,
                fadeOnHover: true,
                zIndex: '9999'
            });
        </script>
        @endif


        




    </body>
</html>