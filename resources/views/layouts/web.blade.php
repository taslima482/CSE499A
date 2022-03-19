<!doctype html>
<html lang="zxx">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="{{ asset('assets/js/bd-location.js') }}"></script>


    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/boxicon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <title>Shikkha Britti</title>

    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">

    {{-- Custom Styles  --}}
    @yield('custom_styles')


    <style>

        /* .student_name{
            display: none;
        } */
        @media (max-width: 768px) {
            /*.navbar-area .other-option {*/
            /*    display: block;*/
            /*    background-color: #04112e;*/
            /*    text-align: center;*/
            /*}*/


            .signin-btn{
                color: #fff;
                font-family: catamaran, sans-serif;
                font-size: 16px;
                font-weight: 600;
                padding: 5px 20px;
                background: #fd1616;
                border-radius: 5px;
            }
            .signup-btn{
                color: #fff;
                font-family: catamaran, sans-serif;
                font-size: 16px;
                font-weight: 600;
                padding: 5px 20px;
                background: #fd1616;
                border-radius: 5px;
            }
            .navbar-area .other-option {
                /* display: block; */
                display: none;
                background-color: #04112e;
                text-align: center;
            }

            .student_name{
                display: block;
            }

            .navbar-expand-lg .navbar-nav {
                flex-direction: row;
                display: block;
            }
        }
    </style>


</head>

<body>

    {{-- <div class="loader-content">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- Navbar area  --}}
    @include('include.web.navbar')




    <!-- Content Space -->
    @yield('content')




    {{-- Footer Area  --}}
    @include('include.web.footer')

    <div class="top-btn">
        <i class='bx bx-chevrons-up bx-fade-up'></i>
    </div>



    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/js/contact-form-script.js')}}"></script>
    <script src="{{asset('assets/js/meanmenu.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/fontawesome.min.js')}}"></script>


    {{-- Custom js  --}}
    @yield('custom_js')
</body>


</html>
