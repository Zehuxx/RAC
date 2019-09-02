<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.15
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
        <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
        <!-- Icons-->
        <link rel="icon" type="image/ico" href="./img/imagen.png" sizes="any" />

        <link href="{{ asset('css/fw/coreui-icons.min.css')}}" rel="stylesheet">
        {{-- <link href="css/fw/flag-icon.min.css" rel="stylesheet"> --}}
        <link href="{{ asset('css/fw/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/fw/simple-line-icons.css')}}" rel="stylesheet">
        <!-- Main styles for this application-->
        <link href="{{ asset('css/fw/style.css')}}" rel="stylesheet">
        <link href="{{ asset('css/pace.min.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        
        <link href="{{ asset('css/table.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
        @yield('css');
        <!-- Global site tag (gtag.js) - Google Analytics-->
        {{-- <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script> --}}
        <script>
          window.dataLayer = window.dataLayer || [];

          function gtag() {
            dataLayer.push(arguments);
          }
          gtag('js', new Date());
          // Shared ID
          gtag('config', 'UA-118965717-3');
          // Bootstrap ID
          gtag('config', 'UA-118965717-5');
        </script>
    </head>
    {{-- <body class="app header-fixed"> --}}
    <body class="app header-fixed @yield('body class')">
        <header class="app-header navbar">
            {{-- logo de la empresa --}}
            <a class="navbar-brand" href="{{route('home')}}">
                {{--<img class="navbar-brand-full" src="{{asset('img/brand/RAC.svg')}}" width="89" height="25" alt="RAC">
                <img class="navbar-brand-minimized" src="{{asset('img/brand/sygnet.svg')}}" width="30" height="30" alt="CoreUI Logo">--}}
                <span class="navbar-brand-full" style="font-family: Lobster, cursive; font-size:2.5rem;">RAC</span>
                <span class="navbar-brand-minimized" style="font-family: Lobster, cursive; font-size:1.5rem;">RAC</span>
            </a>

            @yield('navbar')
        </header>

        <div class="app-body" style="margin-top: 34px">
            @yield('body')
        </div>


    <!-- CoreUI and necessary plugins-->
        <script src="{{ asset('js/fw/jquery.min.js')}}"></script>
        <script src="{{ asset('js/fw/popper.min.js')}}"></script>
        <script src="{{ asset('js/fw/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/fw/pace.min.js')}}"></script>
        <script src="{{ asset('js/fw/perfect-scrollbar.min.js')}}"></script>
        <script src="{{ asset('js/fw/coreui.min.js')}}"></script>
        <!-- Plugins and scripts required by this view
        <script src="{{ asset('js/fw/Chart.min.js')}}"></script>-->
        <script src="{{ asset('js/fw/custom-tooltips.min.js')}}"></script>
        <!-- <script src="{{ asset('js/main.js')}}"></script>-->
        <script src="{{asset('js/sweetalert2.min.js')}}"></script>
        @yield('js')

    </body>
</html>
