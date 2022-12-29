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
                <div class="plot" id="pie-placeholder" style="height: 300px;"></div>
            </div>
        </div>
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
        </div>

        <!-- /.box -->
    </div>
    @include('admin.admin_sidebar')
@endsection
@section('js')
    <script>
        function Excel(){
            var url = "<?php echo asset('excel');?>";

            $.post(url,function(result){
            });
        }
    </script>
@endsection

