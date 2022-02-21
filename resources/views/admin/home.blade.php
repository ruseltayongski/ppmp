<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.app')

@section('js')
    <script src="{{ asset('public/adminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('public/adminLTE/bower_components/Flot/excanvas.js') }}"></script>
    <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/adminLTE/bower_components/Flot/jquery.flot.pie.js') }}"></script>

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
                    backgroundColor: { colors: ["#FFFFFF", "#e3caca"] }
                }
            };

            $.plot($("#bar-chart"), [data1], options );

        });

        var data = [{
            label: "LHSD Chief",
            data: 150
        }, {
            label: "FHS",
            data: 100
        }, {
            label: "NON-COMMUNICABLE",
            data: 250
        }, {
            label: "COMMUNICABLE",
            data: 250
        }, {
            label: "MASU",
            data: 250
        }];

        var options1 = {
            series: {
                pie: {
                    show: true,
                    innerRadius: 0.5,
                    radius: 1
                }
            },
            grid: {
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                cssClass: "flotTip",
                content: "%s: %p.0%",
                defaultTheme: true
            }
        };

        $.plot($("#pie-placeholder"), data, options1);
    </script>
@endsection

@section('content')

    <title>Dashboard</title>
    <div class="col-md-9">
        <div class="box box-primary">
            <!-- interactive chart -->
            <div class="box-header">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Interactive Area Chart</h3>
            </div>
            <div class="box-body">
                <div id="pie-placeholder" style="height: 300px;"></div>
            </div>
        </div>
        <div class="box box-primary">
            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            <i class="fa fa-bar-chart-o"></i> Bar Chart
                            <small>DOH-99999</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </section>
                    <!-- Bar chart -->
                    <div class="box-body">
                    <div id="bar-chart" style="height: 300px;"></div>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.box -->
    </div>
    @include('admin.admin_sidebar')
@endsection

