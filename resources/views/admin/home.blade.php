<?php
use Illuminate\Support\Facades\Session;
?>
@extends('layouts.app')

@section('js')
    <script type="text/javascript">
        $(function () {
            var data1 = [
                [10, 10], [20, 20], [30, 30], [40, 40], [50, 50]
            ];

            var options = {
                series:{
                    bars:{show: true}
                },
                bars:{
                    horizontal:true,
                    barWidth:6
                },
                grid:{
                    backgroundColor: { colors: ["#919191", "#141414"] }
                }
            };

            $.plot($("#bar-chart"), [data1], options );

        });
    </script>
@endsection

@section('content')

    <title>Dashboard</title>
    <div class="col-md-9">
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
        <div class="box box-primary">
            <!-- interactive chart -->
            <div class="box-header">
                <i class="fa fa-bar-chart-o"></i>
                <h3 class="box-title">Interactive Area Chart</h3>
            </div>
            <div class="box-body">
                <div id="interactive" style="height: 300px;"></div>
            </div>
        </div>
        <!-- /.box -->
    </div>
    @include('admin.admin_sidebar')
@endsection

