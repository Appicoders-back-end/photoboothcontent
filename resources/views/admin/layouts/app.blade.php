<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{asset('admin_assets')}}/img/favicon.html">
    <title>Admin - Photo Booth Management</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin_assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('admin_assets')}}/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admin_assets')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('admin_assets')}}/css/owl.carousel.css" type="text/css">
    <!--dynamic table-->
    <link href="{{asset('admin_assets')}}/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="{{asset('admin_assets')}}/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admin_assets')}}/assets/data-tables/DT_bootstrap.css" />

    <!-- datetime picker -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets')}}/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin_assets')}}/assets\select2\css\select2.min.css" />

    <!--right slidebar-->
    <link href="{{asset('admin_assets')}}/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{asset('admin_assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('admin_assets')}}/css/style-responsive.css" rel="stylesheet"/>
    <style>
    </style>
    @yield('style')
</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="{{url('/')}}" class="logo">PhotoBooth <span>Marketing</span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- notification dropdown start-->
                {{-- @if(auth()->user()->role == \App\Models\User::User) --}}
                {{-- @endif--}}
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>

        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="img/avatar1_small.jpg">
                        <span class="username">{{auth()->user()->name ?? 'N/A'}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit"><i class="fa fa-key"></i>Log Out</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    @include('admin.layouts.menu')
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        @yield('content')
    </section>
    <!--main content end-->

    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('admin_assets')}}/js/jquery.js"></script>
<script src="{{asset('admin_assets')}}/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="{{asset('admin_assets')}}/js/bootstrap.bundle.min.js"></script>
<script src="assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<script class="include" type="text/javascript" src="{{asset('admin_assets')}}/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="{{asset('admin_assets')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{asset('admin_assets')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{asset('admin_assets')}}/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="{{asset('admin_assets')}}/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="{{asset('admin_assets')}}/js/owl.carousel.js"></script>
<script src="{{asset('admin_assets')}}/js/jquery.customSelect.min.js"></script>

<!-- js datetime picker -->
<script src="{{asset('admin_assets')}}/assets\select2\js\select2.min.js"></script>
<script src="{{asset('admin_assets')}}/js/pickers/init-datetime-picker.js"></script>
<script type="text/javascript" src="{{asset('admin_assets')}}/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script type="text/javascript" language="javascript" src="{{asset('admin_assets')}}/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{asset('admin_assets')}}/assets/data-tables/DT_bootstrap.js"></script>

<script src="{{asset('admin_assets')}}/js/respond.min.js"></script>

<!--right slidebar-->
<script src="{{asset('admin_assets')}}/js/slidebars.min.js"></script>

<!--common script for all pages-->
<script src="{{asset('admin_assets')}}/js/common-scripts.js"></script>
{{--<script src="{{asset('admin_assets')}}/js/count.js"></script>--}}

<!--dynamic table initialization -->
<script src="{{asset('admin_assets')}}/js/dynamic_table_init.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
@yield('script')
</body>

<!-- Mirrored from thevectorlab.net/flatlab-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 May 2020 19:25:40 GMT -->
</html>
