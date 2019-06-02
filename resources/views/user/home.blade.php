<?php
    use Illuminate\Support\Facades\Session;
?>
@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="box">
            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            SA # 9999999999
                            <small>DOH-99999</small>
                            <span data-toggle="tooltip" title="{{ $test }}" data-html="true" data-content="{{ $test }}" class="badge bg-yellow">3</span>
                        </h1>
                        <ol class="breadcrumb">
                            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </section><br>
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>1000000</h3>

                                <p>Beginning Balance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">SA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>1000000</h3>

                                <p>Remaining Balance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">SA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            SA # 9999999999
                            <small>DOH-99999</small>
                        </h1>
                    </section><br>
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>1000000</h3>

                                <p>Beginning Balance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">SA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>1000000</h3>

                                <p>Remaining Balance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">SA # 9999999999 <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                            </ul>
                            <div class="tab-content no-padding">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                            </div>
                        </div>
                        <!-- /.nav-tabs-custom -->

                    </section>

                    <section class="col-lg-12 connectedSortable">

                        <!-- solid sales graph -->
                        <div class="box box-solid bg-teal-gradient">
                            <div class="box-header">
                                <i class="fa fa-th"></i>

                                <h3 class="box-title">Sales Graph</h3>

                                <div class="box-tools pull-right">
                                    <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body border-radius-none">
                                <div class="chart" id="line-chart" style="height: 250px;"></div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer no-border">
                                <div class="row">
                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="knob-label">Mail-Orders</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                        <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="knob-label">Online</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-xs-4 text-center">
                                        <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                                               data-fgColor="#39CCCC">

                                        <div class="knob-label">In-Store</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->
                    </section>

                </div>
                <!-- /.row (main row) -->
            </section>
        </div>

        <!-- /.box -->
    </div>
    @include('sidebar')
@endsection

@section('js')
    <script>
        @if(Session::get('status'))
            Lobibox.notify('success',{
                msg:"<?php echo Session::get('status'); ?>"
            });
            <?php Session::put('status',null); ?>
        @endif
    </script>
@endsection