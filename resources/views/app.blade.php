<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <title>NAP INFO</title>

    <!-- BEGIN CORE FRAMEWORK -->
    <link href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
    
    <link href="{{ URL::asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- END CORE FRAMEWORK -->

    <!-- BEGIN PLUGIN STYLES -->
    <link href="{{ URL::asset('assets/plugins/animate/animate.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/bootstrap-slider/css/slider.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/rickshaw/rickshaw.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}"
        rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/bootstrapValidator/bootstrapValidator.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/bootstrap-tokenfield/css/bootstrap-tokenfield.min.css') }}"
        rel="stylesheet" />
    <!-- END PLUGIN STYLES -->

    <!-- BEGIN THEME STYLES -->
    <link href="{{ URL::asset('assets/css/material.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/helpers.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/responsive.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/mystyle.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/print.css') }}" media="print" rel="stylesheet" />
    <!-- END THEME STYLES -->
    @yield('header_scripts')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="fixed-leftside fixed-header">
    <!-- BEGIN HEADER -->
    <header class="hidden-print">

        <span class="logo">NAP INFO</span>
        <nav class="navbar navbar-static-top">
            <a href="#" class="navbar-btn sidebar-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>
    <!-- END HEADER -->

    <div class="wrapper">
        <!-- BEGIN LEFTSIDE -->
        <div class="leftside hidden-print">
            <div class="sidebar">
                <!-- BEGIN RPOFILE -->
                <div class="nav-profile">

                    <div class="info">
                    </div>
                    <a href="{{url('auth/logout')}}" class="button"><i class="ion-log-out"></i></a>
                </div>
                <!-- END RPOFILE -->
                <!-- BEGIN NAV -->
                <div class="title">Version 1.0</div>
                <ul class="nav-sidebar">
                    <li class="">
                        <a href="#">
                            <i class="ion-home"></i> <span>Dashboard Sales</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Nav::isRoute('customer') }}">
                        <a class="nav-link" href="{{ route('customer') }}">
                            <i class="fas fa-fw fa-user"></i>
                            <span>{{ __('Customers') }}</span>
                        </a>
                    </li>


                </ul>


            </div>
        </div>

        @yield('content')
    </div><!-- /.wrapper -->
    <!-- END CONTENT -->

    <!-- BEGIN JAVASCRIPTS -->

    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ URL::asset('assets/plugins/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-tokenfield/bootstrap-tokenfield.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ URL::asset('assets/plugins/sweetalert/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/core.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- datepicker -->
    <script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"
        type="text/javascript"></script>

    <!-- counter -->
    <script src="{{ URL::asset('assets/plugins/jquery-countTo/jquery.countTo.js') }}" type="text/javascript"></script>

    <!-- datepicker -->
    <script src="{{ URL::asset('assets/plugins/datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript">
    </script>

    <!--validator-->
    <script src="{{ URL::asset('assets/plugins/bootstrapValidator/bootstrapValidator.min.js') }}"
        type="text/javascript"></script>

    {{-- @include('_jsVariables') --}}


    <!--Footer scripts-->
    @yield('footer_scripts')

    <!-- gymie -->
    <script src="{{ URL::asset('assets/js/gymie.js') }}" type="text/javascript"></script>

    @yield('footer_script_init')

    <!-- dashboard -->
    <script type="text/javascript">
    $(document).ready(function() {
        gymie.loadcounter();
        gymie.loadprogress();
        gymie.loaddatepicker();
        gymie.loaddaterangepicker();
        gymie.loadbsselect();
    });
    </script>

    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>