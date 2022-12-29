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

    @if(session::get('admin'))
        <div class="alert alert-info">
            <div class="text-info" style="color: black">
                <i class="fa fa-info"></i> You are logged in as: {{$desc->description}}
            </div>
        </div>
    @endif
    <?php
            $charging = \App\BudgetAllotment::select('FundSourceTitle')
            ->where('FundSourceId',"=", $charge )->first();
    ?>
    <div class="alert alert-info">
        <div class="text-info" style="color: black">
            <i class="fa fa-info" style="font-family: Verdana;"> {{ $charging->FundSourceTitle }} </i>
        </div>
    </div>
    <div class="row">
        @if($ppmp_status =="original")
        <div class="col-md-9">
            @else
                <div class="col-md-12">
                    @endif
            @if(count($expenses)>0)
                <?php
                $expense_length = \App\Expense::select(DB::raw("length(description) as char_max"))->orderBy(DB::raw("length(description)"),"desc")->first()->char_max; //count the max character para dile maguba ang info-box-content
                $c = 0;
                $count1 = 0;
                ?>
                @if($ppmp_status != "original")
                    @foreach($expenses as $expense)
                        <?php
                        if(Auth::user()->user_priv){
                            $sec = $section;
                        }
                        $sec = Auth::user()->section;
                        ?>
                        @foreach(\App\Budget::select("programs.description as program","expense.description as expense","budget.utilized","budget.section_id","budget.expense_id")
                        ->join("expense","expense.id","=","budget.expense_id")
                        ->join("programs","programs.id","=","budget.program_id")
                        ->where("budget.section_id","=",Auth::user()->section)
                        ->get() as $prog)

                            <?php
                            if(empty($prog->utilized))
                                $expense_amount = 0;
                            else
                                $expense_amount= $prog->utilized;
                            ?>
                        @endforeach
                        <div class="col-md-3">
                            <!-- Widget: user widget style 1 -->
                            <div class="box box-widget widget-user-2">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-header bg-blue-active">
                                    <?php
                                    $name = $expense->description;

                                    $temp = $name;
                                    $count = 0;
                                    $string = "";
                                    for($i=0;$i< $expense_length;$i++){
                                        if(!isset($temp[$i])){
                                            $temp .= " ";
                                        }
                                        if($count != $expense_length){
                                            $count++;
                                            $string .= $temp[$i];
                                        } else {
                                            $count = 0;
                                            $string .= " ";
                                        }
                                    }
                                    $string++;
                                    ?>
                                    @if($ppmp_status == "program")
                                        @php
                                            $program_count = \App\ProgramSetting::where('expense_id',"=",$expense->id)
                                                ->where('section_id',"=", $sec)
                                                ->where('yearly_ref_id',"=", $yearly_reference)
                                                ->count();
                                        @endphp
                                        <div class="" onclick="redirectProgram({{ $program_count }},{{ $expense->id }},{{ $charge }})">{!! $string !!}</div>
                                    @endif
                                </div>
                                <div class="box-footer no-padding">
                                    <ul class="nav nav-stacked">
                                        <li><a href="#"> {{ count(\DB::connection('mysql')->select("call normal_tranche('$expense->id','$section','$yearly_reference','$ppmp_status')")) }} <span class="pull-right badge bg-blue"></span></a></li>
                                        @if($ppmp_status == "program")
                                            <li><a href="#" class="text-blue" data-toggle="modal"  data-target="#Modal{{$expense->id}}"> ADD PROGRAM <span class="pull-right badge bg-blue"></span></a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="modal fade" id="Modal{{$expense->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h3 class="modal-title" id="exampleModalLabel">SET PROGRAM</h3>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <form id="program_form" action='{{ asset("/ppmp/set_program") }}' method="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="modal-body">
                                                    <div class="col-md-12">Select Program</div>
                                                    <input type="hidden" name="expense" id="exp" value="{{$expense->id}}"/>
                                                    <input type="hidden" name="section_id"  value="{{$section}}"/>
                                                    <input type="hidden" name="division_id"  value="{{$division_id}}"/>
                                                    <input type="hidden" name="charge"  value="{{$charge}}"/>
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->username}}"/>
                                                    <?php
                                                    $test = \App\Budget::select("programs.description as program","programs.id as id","budget.program_id","budget.section_id","budget.utilized","budget.beginning_bal")
                                                        ->join("programs","programs.id","=","budget.program_id")
                                                        ->where("budget.section_id","=",Auth::user()->section)
                                                        ->where("budget.level","=", "program")
                                                        ->get();
                                                    ?>
                                                    <select class="js-example-basic-multiple" name="programs[]" multiple="" id="sel" style="width: 100%">
                                                        @foreach($test as $a)
                                                            <option value="{{ $a->id }}">{{ $a->program }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button id="btnsave" type="submit" class="btn btn-primary" name="save">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $count1++;
                        ?>
                        <?php
                        $c++;
                        if($c == 4) {
                            echo '<div class="clearfix"></div>';
                            $c = 0;
                        }
                        ?>
                    @endforeach
                @else
                    @foreach($expenses as $expense)
                        <?php
                        if(Auth::user()->user_priv){
                            $sec = $section;
                        }
                        $sec = Auth::user()->section;
                        ?>
                        @foreach(\App\Budget::select("expense.description as expense","budget.utilized","budget.section_id")
                           ->join("expense","expense.id","=","budget.expense_id")
                           ->where("budget.expense_id","=",$expense->id)
                           ->where("budget.section_id","=",$sec)
                           ->where("budget.fundSource_id","=",$charge)
                           ->whereNotNull("budget.program_id")
                           ->get() as $exp)

                            <?php
                            if(empty($exp->utilized))
                                $expense_amount = 0;
                            else
                                $expense_amount= $exp->utilized
                            ?>
                            <div class="col-md-3">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user-2">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-blue-active">
                                        <?php
                                        $name = $expense->description;

                                        $temp = $name;
                                        $count = 0;
                                        $string = "";
                                        for($i=0;$i< $expense_length;$i++){
                                            if(!isset($temp[$i])){
                                                $temp .= " ";
                                            }
                                            if($count != $expense_length){
                                                $count++;
                                                $string .= $temp[$i];
                                            } else {
                                                $count = 0;
                                                $string .= " ";
                                            }
                                        }
                                        ?>
                                        <div class="" onclick="location.href='{{ asset('ppmp/list').'/'.$expense->id.$charge }}'" style='cursor: pointer;'>{!! $string !!}<small class="widget-user-desc badge bg-maroon" style="margin-left: 0px;">{{ $exp->utilized }}</small></div>
                                    </div>
                                    <div class="box-footer no-padding">
                                        <ul class="nav nav-stacked">
                                            <li><a href="#"> {{ count(\DB::connection('mysql')->select("call normal_tranche('$expense->id','$section','$yearly_reference','$ppmp_status')")) }} <span class="pull-right badge bg-blue"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif
            @else
                <div class="alert-section">
                    <div class="alert alert-warning">
                <span class="text-warning">
                    <i class="fa fa-warning"></i> No allocation!
                </span>
                    </div>
                </div>
            @endif
            @if($count1 <= 4)
                <div class="col-md-12">
                    <div class="box box-primary col">
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
                    </div>
                </div>
        </div>
        @endif
            @if($ppmp_status != "program")
                @include('user.user_sidebar')
                    @endif
    </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        Lobibox.confirm({
            msg: "Allocate Funds?",
            callback: function ($this, type, ev) {
                if(type == 'yes')
                    window.location.replace("{{ asset('section/allocate_section') }}");
            }
        });

        function redirectProgram(program_count,expense_id,charge) {
            if(program_count > 0)
                location.href='{{ asset('program/list').'/' }}'+expense_id+charge;
            else {
                Lobibox.alert('error',
                    {
                        title: "WARNING",
                        msg: "Please set a program first"
                    });
            }
        }
        $(document).ready(function() {
            var id = $('.js-example-basic-multiple').select2();
            console.log(id);
        });
    </script>
@endsection