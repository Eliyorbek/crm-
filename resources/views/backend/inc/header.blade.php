<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop | Dashboard</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @livewireStyles

    <link rel="stylesheet" href="/back/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/back/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/back/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="/back/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/back/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/back/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/back/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="/back/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="/my.css">
    <link rel="stylesheet" href="/back/dist/css/adminlte.min.css">
</head>
<body class="hold-transition  sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="index3.html" class="nav-link">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::check())
                <div class="dropdown">
                    <button class="btn  d-flex align-items-center dropdown-toggle" type="button" style="height: 35px;" data-bs-toggle="dropdown" aria-expanded="false"><a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fa fa-user"></i>&nbsp; {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><a href="#" class="dropdown-item">
                                    <i class="fas fa-user-edit"></i> &nbsp;&nbsp;&nbsp;Profil settings
                                </a></a></li>
                        <li><a class="dropdown-item">
                                <form action="{{route('logout')}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn">
                                        <i class="fas fa-arrow-right"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout
                                    </button>
                                </form>
                            </a></li>
                    </ul>
                </div>

           @endif

        </ul>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <a href="{{route('admin')}}" class="brand-link">
            <img src="/eltosoft.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Eliyorbek Tojimatov</span>
        </a>

        <div class="sidebar mt-2">

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('admin')}}" class="nav-link">
                            <i class="nav-icon fas fa-home "></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('add.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Adminlar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('client.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Haridorlar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Kategoriyalar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('brend.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>Brendlar</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>
                                Ombor
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('product.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mahsulotlar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('supplier.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Yetkazib beruvchi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('product-income.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Keltirilganlik haqida</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Keltirilgan mahsulotlar haqida</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sotilgan mahsulotlar</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Sotilgan mahsulotlar haqida</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>

        </div>

    </aside>
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
