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

        #loader {
            position: absolute;
            left: 50%;
            top: 50%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #00CC99;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }

        #myDiv {
            display: none;
        }

    </style>
</head>
    <body onload="myFunction()">
    <div style="display:none;" id="myDiv" class="animate-bottom">
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

    @if(Request::segments()[0].'/'.Request::segments()[1] != 'ppmp/list')
        <footer id="footer">
            <div class="container">
                <b>Version</b> 2.0
                <strong>Copyright &copy; 2019 <a href="http://www.ro7.doh.gov.ph/">DOH-RO7</a>.</strong> All rights
                reserved.
            </div>
        </footer>
    @endif
    </div>
    <div id="loader"></div>

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

    @if(Request::segments()[0].'/'.Request::segments()[1] == 'ppmp/list')
    <!-- page specific plugin scripts ACE-->
    <script src="{{ asset('public/assets/js/jquery-2.1.4.min.js') }}"></script>
    <!-- page specific plugin scripts -->
    <script src="{{ asset('public/assets/js/jquery-ui.min.js') }}"></script>
    @endif
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('public/adminLTE/plugins/iCheck/icheck.min.js') }}"></script>


    @section('js')

    @show

    </body>
</html>
<script>

    function myFunction() {
        setTimeout(function(){
            showPage();

            @if(Request::segments()[0].'/'.Request::segments()[1] == 'admin/home' || Request::segments()[0].'/'.Request::segments()[1] == 'user/home')

            $(function () {
                /*
                 * Flot Interactive Chart
                 * -----------------------
                 */
                // We use an inline data source in the example, usually data would
                // be fetched from a server
                var data = [], totalPoints = 100

                function getRandomData() {

                    if (data.length > 0)
                        data = data.slice(1)

                    // Do a random walk
                    while (data.length < totalPoints) {

                        var prev = data.length > 0 ? data[data.length - 1] : 50,
                            y    = prev + Math.random() * 10 - 5

                        if (y < 0) {
                            y = 0
                        } else if (y > 100) {
                            y = 100
                        }

                        data.push(y)
                    }

                    // Zip the generated y values with the x values
                    var res = []
                    for (var i = 0; i < data.length; ++i) {
                        res.push([i, data[i]])
                    }

                    return res
                }

                var interactive_plot = $.plot('#interactive', [getRandomData()], {
                    grid  : {
                        borderColor: '#f3f3f3',
                        borderWidth: 1,
                        tickColor  : '#f3f3f3'
                    },
                    series: {
                        shadowSize: 0, // Drawing is faster without shadows
                        color     : '#3c8dbc'
                    },
                    lines : {
                        fill : true, //Converts the line chart to area chart
                        color: '#3c8dbc'
                    },
                    yaxis : {
                        min : 0,
                        max : 100,
                        show: true
                    },
                    xaxis : {
                        show: true
                    }
                })

                var updateInterval = 500 //Fetch data ever x milliseconds
                var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
                function update() {

                    interactive_plot.setData([getRandomData()])

                    // Since the axes don't change, we don't need to call plot.setupGrid()
                    interactive_plot.draw()
                    if (realtime === 'on')
                        setTimeout(update, updateInterval)
                }

                //INITIALIZE REALTIME DATA FETCHING
                if (realtime === 'on') {
                    update()
                }
                //REALTIME TOGGLE
                $('#realtime .btn').click(function () {
                    if ($(this).data('toggle') === 'on') {
                        realtime = 'on'
                    }
                    else {
                        realtime = 'off'
                    }
                    update()
                })
                /*
                 * END INTERACTIVE CHART
                 */

                /*
                 * LINE CHART
                 * ----------
                 */
                //LINE randomly generated data

                var sin = [], cos = []
                for (var i = 0; i < 14; i += 0.5) {
                    sin.push([i, Math.sin(i)])
                    cos.push([i, Math.cos(i)])
                }
                var line_data1 = {
                    data : sin,
                    color: '#3c8dbc'
                }
                var line_data2 = {
                    data : cos,
                    color: '#00c0ef'
                }
                $.plot('#line-chart', [line_data1, line_data2], {
                    grid  : {
                        hoverable  : true,
                        borderColor: '#f3f3f3',
                        borderWidth: 1,
                        tickColor  : '#f3f3f3'
                    },
                    series: {
                        shadowSize: 0,
                        lines     : {
                            show: true
                        },
                        points    : {
                            show: true
                        }
                    },
                    lines : {
                        fill : false,
                        color: ['#3c8dbc', '#f56954']
                    },
                    yaxis : {
                        show: true
                    },
                    xaxis : {
                        show: true
                    }
                })
                //Initialize tooltip on hover
                $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
                    position: 'absolute',
                    display : 'none',
                    opacity : 0.8
                }).appendTo('body')
                $('#line-chart').bind('plothover', function (event, pos, item) {

                    if (item) {
                        var x = item.datapoint[0].toFixed(2),
                            y = item.datapoint[1].toFixed(2)

                        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
                            .css({ top: item.pageY + 5, left: item.pageX + 5 })
                            .fadeIn(200)
                    } else {
                        $('#line-chart-tooltip').hide()
                    }

                })
                /* END LINE CHART */

                /*
                 * FULL WIDTH STATIC AREA CHART
                 * -----------------
                 */
                var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
                    [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
                    [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
                $.plot('#area-chart', [areaData], {
                    grid  : {
                        borderWidth: 0
                    },
                    series: {
                        shadowSize: 0, // Drawing is faster without shadows
                        color     : '#00c0ef'
                    },
                    lines : {
                        fill: true //Converts the line chart to area chart
                    },
                    yaxis : {
                        show: false
                    },
                    xaxis : {
                        show: false
                    }
                })

                /* END AREA CHART */

                /*
                 * BAR CHART
                 * ---------
                 */

                var bar_data = {
                    data : [
                        ['Jan', "<?php echo $item_qty->jan ?>"],
                        ['Feb', "<?php echo $item_qty->feb ?>"],
                        ['Mar', "<?php echo $item_qty->mar ?>"],
                        ['Apr', "<?php echo $item_qty->apr ?>"],
                        ['May', "<?php echo $item_qty->may ?>"],
                        ['Jun', "<?php echo $item_qty->jun ?>"],
                        ['Jul', "<?php echo $item_qty->jul ?>"],
                        ['Aug', "<?php echo $item_qty->aug ?>"],
                        ['Sep', "<?php echo $item_qty->sep ?>"],
                        ['Oct', "<?php echo $item_qty->oct ?>"],
                        ['Nov', "<?php echo $item_qty->nov ?>"],
                        ['Dec', "<?php echo $item_qty->dece ?>"]
                    ],
                    color: '#00CC99'
                }
                $.plot('#bar-chart', [bar_data], {
                    grid  : {
                        borderWidth: 1,
                        borderColor: '#f3f3f3',
                        tickColor  : '#f3f3f3'
                    },
                    series: {
                        bars: {
                            show    : true,
                            barWidth: 0.5,
                            align   : 'center'
                        }
                    },
                    xaxis : {
                        mode      : 'categories',
                        tickLength: 0
                    }
                })
                /* END BAR CHART */

                /*
                 * DONUT CHART
                 * -----------
                 */

                var donutData = [
                    { label: 'Series2', data: 30, color: '#3c8dbc' },
                    { label: 'Series3', data: 20, color: '#0073b7' },
                    { label: 'Series4', data: 50, color: '#00c0ef' }
                ]
                $.plot('#donut-chart', donutData, {
                    series: {
                        pie: {
                            show       : true,
                            radius     : 1,
                            innerRadius: 0.5,
                            label      : {
                                show     : true,
                                radius   : 2 / 3,
                                formatter: labelFormatter,
                                threshold: 0.1
                            }

                        }
                    },
                    legend: {
                        show: false
                    }
                })
                /*
                 * END DONUT CHART
                 */

            });

            /*
             * Custom Label formatter
             * ----------------------
             */
            function labelFormatter(label, series) {
                return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
                    + label
                    + '<br>'
                    + Math.round(series.percent) + '%</div>'
            }

            @endif

        },100);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>