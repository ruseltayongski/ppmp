<?php
    use Illuminate\Support\Facades\Session;
?>
@extends('layouts.app')

@section('content')
    <title>Dashboard</title>
    <div class="col-md-9">
        <div class="box">
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
        <div class="box">
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