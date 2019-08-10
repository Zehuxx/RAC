@extends('layouts.app')

@section('body class', 'sidebar-fixed  sidebar-lg-show breadcrumb-fixed')

@section('navbar')
    {{-- controles para el sidebar --}}
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    {{-- controles para el login --}}
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img class="img-avatar" src="{{asset('img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-bell-o"></i> Updates
                    <span class="badge badge-info">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> Messages
                    <span class="badge badge-success">42</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-shield"></i> Lock Account
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-lock"></i> Logout
                </a>
            </div>
        </li>
    </ul>
@endsection

@section('body')
    <!-- side bar left -->
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                @yield('sidebar elements')
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
    <!-- ./side bar left -->

    <main class="main">

        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            @yield('route')
        </ol>

        <!-- contenedores centrales -->
        <div class="container-fluid">
            <div class="animated fadeIn">
                <!-- /.card-->
                @yield('cards') {{-- Seccion para mostrar el contenido --}}
            </div>

            <!-- /.mapa-->

        </div>
            @yield('div_principal') {{-- Seccion para mostrar el contenido --}}
        </div>
        <!-- contenedores centrales -->
    </main>
        <!-- ./main -->
@endsection



