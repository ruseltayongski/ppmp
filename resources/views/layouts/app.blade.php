<!DOCTYPE html>
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
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/dist/css/skins/_all-skins.min.css') }}">
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
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/plugins/iCheck/all.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/google.css') }}">
    <!-- Fixed Header -->
    <link href="{{ asset('public/plugin/table-fixed-header/table-fixed-header.css') }}" rel="stylesheet">


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

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: rgba(38, 125, 61, 0.92);
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }
        #myBtn:hover {
            background-color: #555;
        }

        .modal-body{
            overflow: auto;
        }

    </style>
</head>
    <body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="header" style="background-color:#2F4054;padding:10px;">
            <div class="col-md-3">
                <strong class="title-info">Welcome,</strong> <strong class="title-desc">{{ strtoupper(Auth::user()->lname.', '.Auth::user()->fname) }}</strong>
            </div>
            <div class="col-md-3">
                <center>
                    <strong class="title-info">Section:</strong>
                    <strong class="title-desc">
                    <?php
                        $section = \App\Section::find(Auth::user()->section);
                        if(isset($section)){
                            echo $section->description;
                        } else {
                            echo 'NO SECTION';
                        }
                    ?>
                    </strong>
                </center>
            </div>
            <div class="col-md-3">
                <center>
                    <strong class="title-info">Division:</strong>
                    <strong class="title-desc">
                        <?php
                            $division = \App\Division::find(Auth::user()->division);
                            if(isset($division)){
                                echo $division->description;
                            } else {
                                echo 'NO DIVISION';
                            }
                        ?>
                    </strong>
                </center>
            </div>
            <div class="col-md-3">
                <div class="pull-right">
                    <strong class="title-info">Date:</strong> <strong class="title-desc">{{ date('M d, Y') }}</strong>
                </div>
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
    <div class="{{ in_array(Request::segments()[0].'/'.Request::segments()[1], array('ppmp/list','ppmp/search','user/home','division/check','division/check1'), true) ? 'container-fluid' : 'container' }}">
        <div class="loading"></div>
        @include('modal')
        @yield('content')
        <div class="clearfix"></div>
    </div> <!-- /container -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up"></i> Go Top</button>

    <!-- /.content-wrapper -->

    @if( !in_array(Request::segments()[0].'/'.Request::segments()[1], array('ppmp/list','ppmp/search','user/home'), true))
        <footer id="footer">
            <div class="container">
                <b>Version</b> 2.0
                <strong>Copyright &copy; {{ date('Y') }} <a href="http://www.ro7.doh.gov.ph/">DOH-RO7</a>.</strong> All rights
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
        @if(Request::segments()[0].'/'.Request::segments()[1] == 'admin/home')
            <!-- AdminLTE for demo purposes -->
            <script src="{{ asset('public/adminLTE/dist/js/demo.js') }}"></script>
            <!-- FLOT CHARTS -->
            <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.js') }}"></script>
            <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
            <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.resize.js') }}"></script>
            <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
            <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.pie.js') }}"></script>
            <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
            <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.categories.js') }}"></script>
        @endif
    @endif
    <!-- lobibox -->
    <script src="{{ asset('public/plugin/Lobibox new/js/Lobibox.js') }}"></script>

    <script>
        @if(session()->has('success'))
        Lobibox.notify('success', {
            title: '',
            msg: "<?php echo session()->get('success'); ?>",
            size: 'mini',
            rounded: true
        });
        <?php Session::forget('success'); ?>
        @endif

        //$('#modal-announcement').modal('show');
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            $('body,html').animate({
                scrollTop : 0 // Scroll to top of body
            }, 500);
        }
    </script>


    <!-- page specific plugin scripts ACE-->
    <script src="{{ asset('public/assets/js/jquery-2.1.4.min.js') }}"></script>
    <!-- page specific plugin scripts -->
    <script src="{{ asset('public/assets/js/jquery-ui.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('public/adminLTE/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('public/adminLTE/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- TABLE-HEADER-FIXED -->
    <script src="{{ asset('public/plugin/table-fixed-header/table-fixed-header.js') }}"></script>


    @section('js')

    @show

    </body>
</html>
