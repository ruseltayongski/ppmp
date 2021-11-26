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

        .grid {
            display: grid;
            grid-gap: var(--card-padding);
            margin: 0 auto;
            max-width: 60em;
            padding: 0;

        @media (min-width: 42em) {
            grid-template-columns: repeat(3, 1fr);
        }
        }

        .card {
            background-color: #fff;
            border-radius: var(--card-radius);
            position: relative;
            padding-top: 1em;
        }
        /*.card:hover {*/
            /*box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);*/
        /*}*/

        .radio {
            font-size: inherit;
            margin: 0;
            position: absolute;
            right: calc(var(--card-padding) + var(--radio-border-width));
            top: calc(var(--card-padding) + var(--radio-border-width));
        }

        @supports(-webkit-appearance: none) or (-moz-appearance: none) {
            .radio {
                -webkit-appearance: none;
                -moz-appearance: none;
                background: #fff;
                border: var(--radio-border-width) solid var(--color-gray);
                border-radius: 50%;
                cursor: pointer;
                height: var(--radio-size);
                outline: none;
                transition: background 0.2s ease-out,
                border-color 0.2s ease-out;
                width: var(--radio-size);
            }
            .radio:after {
                border: var(--radio-border-width) solid #fff;
                border-top: 0;
                border-left: 0;
                content: '';
                display: block;
                height: 0.75rem;
                left: 25%;
                position: absolute;
                top: 50%;
                transform:
                        rotate(45deg)
                        translate(-50%, -50%);
                width: 0.375rem;
            }

            .radio:checked {
                background: var(--color-green);
                border-color: var(--color-green);
            }
        }

        .card:hover .radio {
            border-color: var(--color-dark-gray);
        }

        .card:checked {
            border-color: var(--color-green);
        }



        .plan-details {
            border: var(--radio-border-width) solid var(--color-gray);
            border-radius: var(--card-radius);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            padding: 0.8em;
            transition: border-color 0.2s ease-out;
        }

        .card:hover .plan-details {
            border-color: var(--color-dark-gray);
        }

        .radio:checked ~ .plan-details {
            border-color: var(--color-green);
        }

        .radio:focus ~ .plan-details {
            box-shadow: 0 0 0 2px var(--color-dark-gray);
        }

        .radio:disabled ~ .plan-details {
            color: var(--color-dark-gray);
            cursor: default;
        }

        .radio:disabled ~ .plan-details .plan-type {
            color: var(--color-dark-gray);
        }

        .card:hover .radio:disabled ~ .plan-details {
            border-color: var(--color-gray);
            box-shadow: none;
        }

        .card:hover .radio:disabled {
            border-color: var(--color-gray);
        }

        .plan-type {
            color: var(--color-green);
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1em;
        }

        /*.plan-cost {*/
            /*font-size: 2.5rem;*/
            /*font-weight: bold;*/
            /*padding: 0.5rem 0;*/
        /*}*/

        /*.slash {*/
            /*font-weight: normal;*/
        /*}*/

        /*.plan-cycle {*/
            /*font-size: 2rem;*/
            /*font-variant: none;*/
            /*border-bottom: none;*/
            /*cursor: inherit;*/
            /*text-decoration: none;*/
        /*}*/

        .hidden-visually {
            border: 0;
            clip: rect(0, 0, 0, 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }

        .h4 {
            font-weight: bold;
        }

        .modal-body {
            overflow: auto;
        }

    </style>
    <title>PPMP|DASHBOARD</title>

    <?php
    $section_id = Auth::user()->section;
    $division_id = Auth::user()->division;
    $yearly_reference = Session::get('yearly_reference');
    $ppmp_status = session::get('ppmp_status');
    ?>

    <div class="box box-primary">
        <div class="row" style="margin-bottom: 60px;">
            <div class="col-md-12">
                <div class="box-body">
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
                        ?>
                        @foreach($expenses as $expense)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                {{--//joyx--}}
                                <div class="info-box">
                                        @if($ppmp_status =="program")
                                            <?php
                                                $program_count = \App\ProgramSetting::where('expense_id',"=",$expense->id)
                                                    ->where('created_by',"=",Auth::user()->id)->count();
                                            ?>
                                            <div class="grid" onclick="redirectProgram({{ $program_count }},{{ $expense->id }})" style='cursor: pointer;'>
                                        @else
                                        <div class="grid" onclick="location.href='{{ asset('ppmp/list').'/'.$expense->id }}'" style='cursor: pointer;'>
                                        @endif
                                        <label class="card">
                                            <span class="plan-details">
                                                <span class="plan-type">
                                                    <?php
                                                    $temp = $expense->description;
                                                    $count = 0;
                                                    $string = "";
                                                    for($i=0;$i<$expense_length;$i++) {
                                                        if(!isset($temp[$i])){
                                                        $temp .= '.';
                                                        }
                                                        if($count != 23){
                                                        $count++;
                                                        $string .= $temp[$i];
                                                        } else {
                                                        $count = 0;
                                                        $string .= "";
                                                        }
                                                    }
                                                    echo $string;
                                                    ?>

                                                </span>
                                            <span class="h4">{{ count(\DB::connection('mysql')->select("call normal_tranche('$expense->id','$section_id','$yearly_reference','$ppmp_status')")) }}</span>
                                            @if($ppmp_status == "program")
                                                <span class=""> Program {{ $program_count }}</span>
                                            @endif
                                            </span>
                                        </label>
                                    </div>

                                    <div>
                                        <input type="hidden" name="ppmp_status" id="ppmp_status" value="{{$ppmp_status}}"/>
                                        <input type="hidden" name="yearly_reference" id="yearly_reference" value="{{$yearly_reference}}"/>
                                        @if($ppmp_status == "program" && Auth::user()->username != "201600256")
                                        <a href="" class="btn btn-md btn-info" data-toggle="modal"  data-target="#Modal{{$expense->id}}">
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
                                                                        {{--<div class="col-md-12">Select Program</div>--}}
                                                                        <input type="hidden" name="expense" id="exp" value="{{$expense->id}}"/>
                                                                        <input type="hidden" name="section_id"  value="{{$section_id}}"/>
                                                                        <input type="hidden" name="division_id"  value="{{$division_id}}"/>
                                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
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