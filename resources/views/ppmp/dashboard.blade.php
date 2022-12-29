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
        <h4 style="font-weight: bold">You are logged in as: {{$desc->description}}</h4>
    @endif
    <div class="row">
        @foreach($program_settings as $program_setting)
        @endforeach
        @if(Auth::user()->username == "201600256" && $ppmp_status == "program")
            <div style="padding-left: 10px; padding-right: 10px"><a class="btn-lg btn-success center-block col-sm-12" href="{{ url('FPDF/print/report_program.php?end_user_name=').$end_user_name.'&end_user_designation='.$end_user_designation.'&head_name='.$head->head_name.'&head_designation='.$head->designation.'&generate_level=division&division_id='.Auth::user()->division.'&section_id='.Auth::user()->section.'&ppmp_status='.$ppmp_status.'&yearly_reference='.$yearly_reference.'&program_id='.$program_setting->id}}" target="_blank">
                    <i class="fa fa-file-pdf-o"></i> Generate Report - Program
                </a></div>
        @endif
        <?php
        $expense_length = \App\Expense::select(DB::raw("length(description) as char_max"))->orderBy(DB::raw("length(description)"),"desc")->first()->char_max; //count the max character para dile maguba ang info-box-content
        $i = 0;
        ?>
        <div class="table-responsive">
            <table>
                @foreach($expenses as $expense)
                    @if($i == 0)
                        <tr>
                            @endif
                            <td class="tdcard">
                                @if($ppmp_status =="program")
                                    @php
                                        $program_count = \App\ProgramSetting::where('expense_id',"=",$expense->id)
                                            ->where('section_id',"=", $section)
                                            ->where('yearly_ref_id',"=", $yearly_reference)
                                            ->count();
                                    @endphp
                                    <div class="" onclick="redirectProgram({{ $program_count }},{{ $expense->id }})" style='cursor: pointer;'>
                                        @else
                                            <div class="" onclick="location.href='{{ asset('ppmp/list').'/'.$expense->id }}'" style='cursor: pointer;'>
                                                @endif
                                    <label class="card">
                                    <span class="plan-details">
                                    <span class="plan-type">
                                    {{ $expense->description }}
                                        <br><br><span class="h3">{{ count(\DB::connection('mysql')->select("call normal_tranche('$expense->id','$section','$yearly_reference','$ppmp_status')")) }}</span>
                                        @if($ppmp_status == "program")
                                            <br><br><span class=""> Program {{ $program_count }}</span>
                                        @endif
                                    </span>
                                    </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="hidden" name="ppmp_status" id="ppmp_status" value="{{$ppmp_status}}"/>
                                                <input type="hidden" name="yearly_reference" id="yearly_reference" value="{{$yearly_reference}}"/>
                                                @if($ppmp_status == "program")
                                                    <a href="" class="btn btn-md btn-info col-md-12" data-toggle="modal"  data-target="#Modal{{$expense->id}}">
                                                        SET PROGRAM
                                                    </a>
                                                @endif
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
                                                                <input type="hidden" name="user_id" value="{{Auth::user()->username}}"/>
                                                                <select class="js-example-basic-multiple" name="programs[]" multiple="multiple" id="sel" style="width: 100%">
                                                                    @foreach($programs as $a)
                                                                        <option value="{{ $a->id }}">{{ $a->description }}</option>
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
                                    </td>
                                <?php
                                    $i++;
                                    if ($i == 4) {
                                        echo '</tr><tr>';
                                        $i = 0;
                                    }
                                    ?>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
    @foreach($expenses as $expense)
        @foreach(\App\Budget::select("expense.description as expense","budget.utilized","budget.section_id")
        ->join("expense","expense.id","=","budget.expense_id")
        ->where("budget.expense_id","=",$expense->id)
        ->where("budget.division_id","=",$division_id)
        ->get() as $exp)
            <?php if(empty($exp->utilized))
                $expense_amount = 0;
            else
                $expense_amount= $exp->utilized
            ?>
        <div class="col-md-4">
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
                        if($count != 50){
                            $count++;
                            $string .= $temp[$i];
                        } else {
                            $count = 0;
                            $string .= "<br>";
                        }
                    }
                    ?>
                    <small>{!! $string !!}</small><br>
                    &nbsp;<small class="widget-user-desc badge bg-maroon" style="margin-left: 0px;">{{ $exp->utilized }}</small>
                </div>
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#"> {{ count(\DB::connection('mysql')->select("call normal_tranche('$expense->id','$section','$yearly_reference','$ppmp_status')")) }} <span class="pull-right badge bg-blue"><i class="fa fa-phone"></i> </span></a></li>
                        <li><a href="#" class="text-blue"> ADD PROGRAM <span class="pull-right badge bg-blue"></span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        @endforeach
    @endforeach
@endsection

@section('js')
    <script>
        Lobibox.confirm({
            msg: "Allocate Funds?",
            callback: function ($this, type, ev) {
                if(type == 'yes')
                    window.location.replace("{{ asset('section/allocate_sec') }}");
            }
        });

        function redirectProgram(program_count,expense_id) {
            if(program_count > 0)
                location.href='{{ asset('program/list').'/' }}'+expense_id;
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