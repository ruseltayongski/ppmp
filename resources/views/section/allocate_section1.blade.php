<?php

function conn()
{
    $serverName = "LAMBORGHINI\VEEAMSQL2016";
    //$serverName = "192.168.110.45,80";
    $database = "fmisdummy";
    $uid = "sa";
    $pwd = "D0h7_1T";

    try{
        $conn = new PDO("sqlsrv:server=$serverName ; Database = $database", $uid, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $err) {
        echo "<h3>Can't connect to database server address $serverName</h3>";
        exit();
    }
    return $conn;
}

function queryAllotment($div_desc,$class){
    $pdo = conn();
    $query = 'SELECT * FROM FundSource WHERE RespoId = ? AND AllotmentClassId = ?';

    try
    {
        $st = $pdo->prepare($query);
        $st->execute(array($div_desc, $class));;
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}

function queryRespoCenter(){
    $pdo = conn();
    $query = 'SELECT * FROM RespoCenter';

    try
    {
        $st = $pdo->prepare($query);
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}

function queryAllotmentClass(){
    $pdo = conn();
    $query = 'SELECT * FROM AllotmentClass';

    try
    {
        $st = $pdo->prepare($query);
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}

//$budget = queryAllotment($div,$class);
$allotment = queryAllotmentClass();
$yearly_reference = Session::get('yearly_reference');
?>
@extends('layouts.app')
<style>
    :root {
        --card-line-height: 1.2em;
        --card-padding: 1em;
        --card-radius: 0.5em;
        --color-green: #558309;
        --color-gray: #e2ebf6;
        --color-dark-gray: #c4d1e1;
        --radio-border-width: 2px;
        --radio-size: 1.5em;
    }

    modal-body {
        background-color: #f2f8ff;
        color: #263238;
        font-family: 'Noto Sans', sans-serif;
        margin: 0;
        padding: 2em 6vw;
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

    /*&:hover {*/
    /*box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);*/
    /*}*/
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
            transition:
                    background 0.2s ease-out,
                    border-color 0.2s ease-out;
            width: var(--radio-size);

    &::after {
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

    &:checked {
         background: var(--color-green);
         border-color: var(--color-green);
     }
    }

    .card:hover .radio {
        border-color: var(--color-dark-gray);

    &:checked {
         border-color: var(--color-green);
     }
    }
    }

    .plan-details {
        border: var(--radio-border-width) solid var(--color-gray);
        border-radius: var(--card-radius);
        cursor: pointer;
        display: flex;
        flex-direction: column;
        padding: var(--card-padding);
        transition: border-color 0.2s ease-out;
    }

    /*.card:hover .plan-details {*/
    /*border-color: var(--color-dark-gray);*/
    /*}*/

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

    /*.card:hover .radio:disabled ~ .plan-details {*/
    /*border-color: var(--color-gray);*/
    /*box-shadow: none;*/
    /*}*/

    /*.card:hover .radio:disabled {*/
    /*border-color: var(--color-gray);*/
    /*}*/

    .plan-type {
        color: var(--color-green);
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1em;
    }
</style>
@section('content')
    <title>Manage | Budget Allotment</title>
    <div class="box">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="font-weight: bold">
                ALLOTMENT <i class="fa fa-clone" aria-hidden="true"></i>
            </h1><br>
            <div>
                <ol class="breadcrumb form-inline my-2 my-lg-0">
                    <form action="{{ asset('program/search') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="search" class="form-control" name="keyword" placeholder="Title/Acronym" style="width:25%;">
                        <select class="form-control" name="allotment_id" data-placeholder="Allotment Class" style="width:25%;">
                            <option value="0" selected>Select Allotment Class</option>
                            @foreach($allotment_c as $row)
                                <option value="{{ $row->Id }}">{{ $row->Allotment_Class }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="div_id" data-placeholder="Division" style="width:25%;">
                            <option value="0" selected>Select division</option>
                            @foreach($divisions as $div)
                                <option value="{{ $div->id }}">{{ $div->description }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>
                            <span style="font-weight: bold"> FILTER</span>
                        </button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_new">
                            <span style="font-weight: bold"> ADD ALLOCATION </span>
                        </button>
                    </form>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <section class="col-lg-12">
                    <form action="{{ asset('budget/addProgram') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="add_new">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" style="font-weight: bold">Add Allocation</h4>
                                    </div>
                                    <?php
                                    foreach($charge as $row)
                                    ?>
                                    <div class="modal-body">
                                        {{--<div class="box-body">--}}
                                        {{--</div>--}}
                                        @if(empty($row))
                                            <div style="font-size: xx-large" >pls contact administrator</div>
                                        @elseif(count($charge) > 1)
                                            <div class="form-group" id="charging">
                                                <label>Fund charge: </label>
                                                <select class="js-example-basic-single" name="charge" id="charge" data-placeholder="Select Charge" style="width: 100%;" required>
                                                    @foreach($charge as $nep_data)
                                                        <?php
//                                                        $saa_title = \App\Saa::select('saa_no','id')
//                                                            ->where('saa_no',"=", $nep_data->saa_no)->first();

                                                        $charging = \App\Nep::select('nep_title','id')
                                                            ->where('id',"=", $nep_data->nep_id)->first();

                                                        $molli = $charging->nep_title;
                                                        $_id = $charging->id;
//                                                        if($charging) {
//
//                                                        }else {
//                                                            $molli = $saa_title->saa_no;
//                                                            $_id = $saa_title->id;
//                                                        }
                                                        ?>
                                                        <option value="">Select Charge</option>
                                                        <option value="{{ $_id }}"> {{ $molli.$charging->section_id }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input id="chargeData" type="text" class="form-control data" name="section_id" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group" style="width: 100%;">
                                                        <input id="chargeAMount" type="number" class="form-control" name="section_amt" value="" placeholder="Enter the amount to allocate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Allotment</label>
                                                @php
                                                    if(empty($row)){
                                                        echo "0";
                                                    }
                                                    $row->section_id;
                                                @endphp
                                                @if($row->section_id == 28 || $row->section_id == 29 )
                                                <div class="row">
                                                    <div class="program_allotted_body_add">
                                                        <div class="col-md-6">
                                                            <select class="form-control select2" name="program_id[]" id="check" data-placeholder="Select a Program" onclick="" style="width: 100%;" required>
                                                                @foreach(\App\Program::get() as $prog)
                                                                    @if($row->section_id == $prog->section_id)
                                                                        <option value="{{ $prog->id }}">{{ $prog->description }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group" style="width: 100%;">
                                                                <input type="number" class="form-control" name="program_amt[]" value="" placeholder="Enter the amount to allocate">
                                                                <span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" onclick="AppendAllottedProgram(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
                                                </div>
                                                    @else
                                                    <div class="row">
                                                        <div class="expense_allotted_body_add">
                                                            <div class="col-md-6">
                                                                <select class="form-control select2" name="expense_id[]" id="check" data-placeholder="Select an expense" onclick="" style="width: 100%;" required>
                                                                    @foreach(\App\Expense::get() as $exp)
                                                                        {{--@if($row->expense_id == $exp->id)--}}
                                                                            <option value="{{ $exp->id }}">{{ $exp->description }}</option>
                                                                        {{--@endif--}}
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group" style="width: 100%;">
                                                                    <input type="number" class="form-control" name="expense_amt[]" value="" placeholder="Enter the amount to allocate">
                                                                    <span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" onclick="AppendAllottedProgram(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
                                                    </div>
                                                @endif
                                            </div>
                                        @else
                                            <div class="form-group" id="gaa">
                                                <label >Section Allotted</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group" style="width: 100%;">
                                                            @foreach(\App\Section::get() as $sec)
                                                                @if(isset($sec))
                                                                    @if(Auth::user()->section == $sec->id)
                                                                        {{--<option value="{{ $sec->id }}" readonly>{{ $sec->description }}</option>--}}
                                                                        <input type="text" class="form-control" name="section_id" value="{{ $sec->description }}" readonly>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group" style="width: 100%;">
                                                            <input type="number" class="form-control" name="section_amt" value="{{ $row->utilized }}" placeholder="Enter the amount to allocate">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="expense_allotted_body_add">
                                                    <div class="col-md-6">
                                                        <select class="form-control select2" name="expense_id[]" id="check" data-placeholder="Select an expense" onclick="" style="width: 100%;" required>
                                                            @foreach(\App\Expense::get() as $exp)
                                                                {{--@if($row->expense_id == $exp->id)--}}
                                                                <option value="{{ $exp->id }}">{{ $exp->description }}</option>
                                                                {{--@endif--}}
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group" style="width: 100%;">
                                                            <input type="number" class="form-control" name="expense_amt[]" value="" placeholder="Enter the amount to allocate">
                                                            <span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="AppendAllottedProgram(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->


            <form action="{{ asset('budget/updateS') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal fade" id="program_edit">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" style="font-weight: bold">Budget Allotment</h4>
                            </div>
                            <div class="modal-body program_edit_body">
                                inside modal-body
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>

            <form action="{{ asset('program/delete') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal modal-danger sm fade" id="program_delete">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body">
                                <input type="hidden" value="" name="program_id_delete" class="program_id_delete">
                                <strong>Are you sure you want to delete?</strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-outline"><i class="fa fa-trash"></i> Yes</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </form>
            <div class=tab-content">
                <!-- /.box-header -->
                <div class="box-body no-padding table-responsive float-left">
                    <table class="table table-condensed" data-pagination="true" ><!-- data-toggle="table" -->
                        <th>Budget Title</th>
                        <th>Beginning Balance</th>
                        <th>Options</th>
                        @foreach($nep_alloc as $row)
                            <tr>
                                <?php
                                    $nep = \App\Nep::find($row->nep_id)->nep_title;
                                ?>
                                <td>{{ $nep }}</td>
                            </tr>
                        <tr class="tr"></tr>
                            <?php
                            $desc = \App\Program::find($row->program_id)->description;
                            ?>
                            <td>{{ $desc }}</td>
                                <td class="td"> {{$row->utilized}}</td>
                                <td class="td"><button  data-toggle='modal' data-target='#program_edit' onclick='editNep(" + item.id + ", " + item.remaining_bal + ")' >Edit</button></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
@section('js')
    <script>
        function EditSection(prog_id,prog,bal,fund){
            var url = "<?php echo asset('budget/updateExpense');?>";
            var json = {
                "program_id" : prog_id,
                "prog" : prog,
                "bal" : bal,
                "fund" : fund,
                "_token" : "<?php echo csrf_token(); ?>"
            };

            $(".program_edit_body").html("Please wait...");
            $.post(url, json, function(result){
                $(".program_edit_body").html(result);
            });
        }

        $('.select2').select2();
        @if(session()->has('msg'))
        Lobibox.notify('info',{
            msg:"<?php echo session()->get('msg'); ?>",
            size: 'mini',
            rounded: true
        });
        @endif

        function DeleteProgram(program_id){
            $(".program_id_delete").val(program_id);
        }

        function AllocatedRemove(data){
            if(data){
                console.log(data.parent().parent().parent().parent().remove());
            }
        }

        $("#hide").click(function(){
            $("#section").hide();
            $("#sec").removeAttr("required");
            $("#sec_amount").removeAttr("required");

        });

        $("#show").click(function(){
            $("#section").show();
        });

        $("#hide_exp").click(function(){
            $("#expenses").hide();
            $("#exp").removeAttr("required");
            $("#exp_amount").removeAttr("required");
        });

        $("#show_exp").click(function(){
            $("#expenses").show();
        });

        $('.js-example-basic-single').select2();

        function myFunction() {
            var x = document.getElementById("myInput").value;
            document.getElementById("demo").innerHTML = "You wrote: " + x;
        }

        function AppendAllottedProgram(ok){
            if(ok){
                $(".program_allotted_body_add").append('@include('budget.program_alloted_append')');
                $('.js-example-basic-single').select2();
                AllocatedRemove('');
            }
        }

        function AppendAllottedSection(ok){
            if(ok){
                $(".section_allotted_body_add").append('@include('budget.section_alloted_append')');
                $('.js-example-basic-single').select2();
                AllocatedRemove('');
            }
        }

        function AppendAllottedExpense(ok){
            if(ok){
                $(".expense_allotted_body_add").append('@include('budget.expense_alloted_append')');
                $('.js-example-basic-single').select2();
                AllocatedRemove('');
            }
        }

        function getRadio() {
            var value = document.querySelector("input[name=plan]:checked").value;
            //console.log(value);
            //document.getElementById("output").innerHTML = "You selected: " + value;

            if(value == "gaa"){
                console.log("joy");
                $("#saa").hide();
                $("#gaa").show();
            }else{
                $("#saa").show();
                $("#gaa").hide();
            }
        }

        $(document).ready(function () {
             $("#charge").on("change", function () {

                // Get the dropdown element by its ID
                var dropdown = document.getElementById("charge")

                // Get the selected value
                var selectedValue = dropdown.options[dropdown.selectedIndex].value;

                // Log the selected value to the console
                console.log(selectedValue);
                 var url = "<?php echo asset('section/getId');?>";
                 var json = {
                 "charging": selectedValue,
                 "_token" : "<?php echo csrf_token(); ?>"
                 };

                 $("#chargeData, #chargeAMount").html("Please wait...");
                 $.post(url, json, function(result){
                 //$("#chargeData").html(result);
                     if(result.utilized) {
                         const utilized = parseInt(result.utilized);
                         document.getElementById("chargeAMount").value = utilized;
                     }
                     if(result.nep_title) {
                         jsonString =  JSON.stringify(result.nep_title).replace(/"/g, '');
                         document.getElementById("chargeData").value = jsonString;
                     }
                     else if(result.saa_no){
                         jsonString =  JSON.stringify(result.saa_no).replace(/"/g, '');
                         document.getElementById("chargeData").value = jsonString;

                     } else {
                         // Handle unexpected response
                         showError("Invalid response data.");
                     }
                 })
                     .fail(function(jqXHR, textStatus, errorThrown) {
                         // Error handling for AJAX request
                         showError("Request failed: " + textStatus + ", " + errorThrown);
                     });

                 function showError(message) {
                     // Handle and display errors
                     console.error(message);
                     // You can display the error message to the user in an element if needed.
                 }

                 });
             })

    </script>
@endsection