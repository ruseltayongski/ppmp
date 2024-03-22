@extends('layouts.app')
@section('content')
   <style>
        .ui-autocomplete
        {
            font-weight: bold;
            background-color: white;
            width: 20%;
        }
        .ui-menu-item {
            cursor: pointer;
            margin-top: 2%;
        }
        .mytooltip .mytext {
            visibility: hidden;
            width: 140px;
            background-color: #00CC99;
            color: #fff;
            z-index: 1;
            top: -5px;
            right: 110%;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
        }
        .mytooltip {
            position: relative;
            display: inline-block;
        }
        .mytooltip:hover .mytext {
            visibility: visible;
        }
        #no-border{
            border: none;
        }
        #readonly {
            border:1px solid #00CC99;
        }
        /* TOOLTIP TOP */
        .tooltip_top {
            position: relative;
            display: inline-block;
        }
        .tooltip_top .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #00CC99;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;
        }
        .tooltip_top:hover .tooltiptext {
            visibility: visible;
        }
        .pagination{
            margin: 0;
            padding: 0;
            margin-left: 2%;
        }

        :root {
            --card-line-height: 1.2em;
            --card-padding: 2em;
            --card-radius: 0.5em;
            --color-green: #558309;
            --color-gray: #e2ebf6;
            --color-dark-gray: #c4d1e1;
            --radio-border-width: 2px;
            --radio-size: 1.4em;
        }

        body {
            background-color: #f2f8ff;
            color: #263238;
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
            /*padding: 2em 6vw;*/
        }

        .card {
            /*background-color: #926d8d;*/
            border-radius: var(--card-radius);
            position: relative;
            opacity: 1.0;
            padding-top: 1em;
        }

        .plan-type {
            color: var(--color-green);
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1em;
        }

        .plan-details {
            /*border: var(--radio-border-width) solid var(--color-gray);*/
            /*border-radius: var(--card-radius);*/
            cursor: pointer;
            display: flex;
            /*flex-direction: column;*/
            /*align-items: flex-start;*/
            padding: 1.0em;
            transition: border-color 0.2s ease-out;
        }

        .tdcard {
            border: var(--radio-border-width) solid var(--color-gray);
            border-radius: var(--card-radius);
            padding-bottom: 0.8em;
            padding-right: 0.5em;
            transition: border-color 0.2s ease-out;
        }

        /*.clearfix {*/
        /*display: block;*/
        /*clear: both;*/
        /*}*/

        .widget-user-header {
            padding: 10px 15px !important;
        }
        .widget-user-2 .widget-user-username {
            margin-top: 5px;
            margin-bottom: 0px;
            font-size: 22px;
            font-weight: 300;
        }

    </style>

    <title>PPMP|DASHBOARD</title>

    <?php
    //$section_id = Auth::user()->section;
    $division_id = Auth::user()->division;
    $yearly_reference = Session::get('yearly_reference');
    $ppmp_status = session::get('ppmp_status');
    $user = Session::get('auth');
    //$section = session::get('section_id');

    $desc = \App\Section::select('description')
        ->where('id',"=", $section)
        ->first();
    ?>
    @if($yearly_reference != 4)
        @endif
    @if(session::get('admin'))
        <div class="alert alert-info">
            <div class="text-info" style="color: black">
                <i class="fa fa-info"></i> You are logged in as: {{$desc->description}}
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-9">
        <div class="col-md-12">
            <div class="box box-primary col">
                <h3 class="box-title">&nbspInteractive Area Chart</h3>
            <div class="box-body">
                <div class="chart" id="bar-chart" style="height: 300px; width:100%; padding: 2em;"></div>
            </div>
            </div>
        </div>
            <div class="col-md-12" style="padding: 1em;">
                <div class="box box-primary">
                <p class="text-center">
                    <strong></strong>
                </p>
                <div class="progress-group" style="padding: 0.5em">
                    Add Products to Cart
                    <span class="float-right"><b>160</b>/200</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                    </div>
                </div>

                <div class="progress-group" style="padding: 0.5em">
                    Complete Purchase
                    <span class="float-right"><b>310</b>/400</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                    </div>
                </div>

                <div class="progress-group" style="padding: 0.5em">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="float-right"><b>480</b>/800</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                    </div>
                </div>

                <div class="progress-group" style="padding: 0.5em">
                    Send Inquiries
                    <span class="float-right"><b>250</b>/500</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                    </div>
                </div>
                    <button class="btn btn-primary">Import data</button>
                    <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
                </div>
            </div>
        </div>
        @include('user.user_sidebar')
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/adminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('public/adminLTE/bower_components/Flot/excanvas.js') }}"></script>
    <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('public/adminLTE/bower_components/chart.js/Chart.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            var data1 = [
                [10, 10], [20, 20], [30, 30], [40, 40], [50, 50]
            ];

            var options = {
                series:{
                    bars:{show: false},
                },
                bars:{
                    vertical:false,
                    barWidth:6
                },
                grid:{
                    backgroundColor: { colors: ["#FFFFFF", "#98c2d9"] }
                }
            };

            $.plot($(".chart"), [data1], options );

        });
    </script>
@endsection