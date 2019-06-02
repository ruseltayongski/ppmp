<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/dist/css/skins/_all-skins.min.css') }}">
    @if(isset(Request::segments()[1]))
        @if(Request::segments()[0].'/'.Request::segments()[1] == 'admin/home' || Request::segments()[0].'/'.Request::segments()[1] == 'user/home')
            <!-- Morris chart -->
                <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/morris.js/morris.css') }}">
        @endif
    @endif
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- lobibox -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/plugin/Lobibox new/css/lobibox.css') }}" />

    <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/google.css') }}">


    @yield('css')
    <style>
        body {
            background: url('{{ asset('public/img/backdrop.png') }}'), -webkit-gradient(radial, center center, 0, center center, 460, from(#ccc), to(#ddd));
        }
        .loading {
            opacity:0.4;
            background:#ccc url('{{ asset('public/img/spin.gif')}}') no-repeat center;
            position:fixed;
            width:100%;
            height:100%;
            top:0px;
            left:0px;
            z-index:999999999;
            display: none;
        }
        .title-info{
            color: #F39C2B;
        }
        .title-desc{
            color: #FFFFFF;
        }
        #footer {
            background-color: #F3F3F3;
            padding-top: 10px;
            padding-bottom: 0px;
            position:fixed;
            bottom:0;
            width:100%;
        }

    </style>
</head>
    <body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="header" style="background-color:#2F4054;padding:10px;">
            <div class="col-md-4">
                <strong class="title-info">Welcome,</strong> <strong class="title-desc">{{ strtoupper(Auth::user()->lname.', '.Auth::user()->fname) }}</strong>
            </div>
            <div class="col-md-4">
                <strong class="title-info">Section:</strong>
                <strong class="title-desc">
                {{ \App\Section::find(Auth::user()->section)->description }}
                </strong>
            </div>
            <div class="col-md-4">
                <strong class="title-info">Date:</strong> <strong class="title-desc">{{ date('M d, Y') }}</strong>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="header" style="background-color:#00CC99;padding:10px;">
            <div class="container">
                <img src="{{ asset('public/img/banner_ppmp.png') }}" class="img-responsive" />
            </div>
        </div>
        @include('layouts.navbar-nav')
    </nav>
    <div class="{{ Request::segments()[0].'/'.Request::segments()[1] == 'ppmp/list' ? 'container-fluid' : 'container' }}">
        <div class="loading"></div>
        @yield('content')
        <div class="clearfix"></div>
    </div> <!-- /container -->


    <!-- /.content-wrapper -->

    @if(Request::segments()[0].'/'.Request::segments()[1] == 'ppmp/list')
        <footer id="footer">
            <div class="container">
                <a class="btn btn-app">
                    <i class="fa fa-edit"></i> Edit
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-play"></i> Play
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-repeat"></i> Repeat
                </a>
                <a class="btn btn-app">
                    <i class="fa fa-pause"></i> Pause
                </a>
                <button class="btn btn-app" type="submit">
                    <i class="fa fa-save"></i> Save
                </button>
                <a class="btn btn-app">
                    <span class="badge bg-yellow">3</span>
                    <i class="fa fa-bullhorn"></i> Notifications
                </a>
                <a class="btn btn-app">
                    <span class="badge bg-green">300</span>
                    <i class="fa fa-barcode"></i> Products
                </a>
                <a class="btn btn-app">
                    <span class="badge bg-purple">891</span>
                    <i class="fa fa-users"></i> Users
                </a>
            </div>
        </footer>
    @else
        <footer id="footer">
            <div class="container">
                <b>Version</b> 2.0
                <strong>Copyright &copy; 2019 <a href="http://www.ro7.doh.gov.ph/">DOH-RO7</a>.</strong> All rights
                reserved.
            </div>
        </footer>
    @endif


    <!-- jQuery 3 -->
    <script src="{{ asset('public/adminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/adminLTE/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('public/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('public/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/adminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/adminLTE/dist/js/adminlte.min.js') }}"></script>
    @if(isset(Request::segments()[1]))
        @if(Request::segments()[0].'/'.Request::segments()[1] == 'admin/home' || Request::segments()[0].'/'.Request::segments()[1] == 'user/home')
            <!-- Morris.js charts -->
            <script src="{{ asset('public/adminLTE/bower_components/raphael/raphael.min.js') }}"></script>
            <script src="{{ asset('public/adminLTE/bower_components/morris.js/morris.min.js') }}"></script>
            <!-- Sparkline -->
            <script src="{{ asset('public/adminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
            <!-- jvectormap -->
            <script src="{{ asset('public/adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
            <script src="{{ asset('public/adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
            <!-- jQuery Knob Chart -->
            <script src="{{ asset('public/adminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
            <!-- daterangepicker -->
            <script src="{{ asset('public/adminLTE/bower_components/moment/min/moment.min.js') }}"></script>
            <script src="{{ asset('public/adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
            <!-- datepicker -->
            <script src="{{ asset('public/adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="{{ asset('public/adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="{{ asset('public/adminLTE/dist/js/pages/dashboard.js') }}"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="{{ asset('public/adminLTE/dist/js/demo.js') }}"></script>
        @endif
    @endif
    <!-- lobibox -->
    <script src="{{ asset('public/plugin/Lobibox new/js/Lobibox.js') }}"></script>

    @if(Request::segments()[0].'/'.Request::segments()[1] == 'ppmp/list')
    <!-- page specific plugin scripts ACE-->
    <script src="{{ asset('public/assets/js/jquery-2.1.4.min.js') }}"></script>
    <!-- page specific plugin scripts -->
    <script src="{{ asset('public/assets/js/jquery-ui.min.js') }}"></script>
    @endif


    @section('js')
    @show

    </body>
</html>