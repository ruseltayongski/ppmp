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
?>
@extends('layouts.app')

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
                    <form action="{{ asset('budget/add') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="add_new">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" style="font-weight: bold">Add Allocation</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label>Fund Source</label>
                                                <select class="js-example-basic-single" name="fund_source" data-placeholder="Select Fund Source" style="width: 100%;" required>
                                                    <option value="">Select Fund Source</option>
                                                    @foreach($budget as $row)
                                                        <option value="{{ $row->FundSourceId }}">{{ $row->FundSourceTitle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-check" onchange="getRadio()">
                                            <p>Please select your option:</p>
                                              <input type="radio" id="option" name="option" value="section">
                                              <label for="section">Section</label><br>
                                              <input type="radio" id="option" name="option" value="expense">
                                              <label for="expense">Expense</label><br>
                                            </div>
                                            <div class="section" id="section" onload="">
                                                <div class="row">
                                                    <div class="section_allotted_body_add">
                                                        <div class="col-md-6">
                                                            <label> Section </label>
                                                            <select class="js-example-basic-single" name="section_id[]" id="sec"  data-placeholder="Select Section" style="width: 100%;" required>
                                                                <option value="">Select Section</option>
                                                                @foreach($sections as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Amount </label>
                                                            <input type="number" class="form-control" name="section_amt[]" id="sec_amount" placeholder="Enter the amount to allocate" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="AppendAllottedSection(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
                                            </div>
                                            <br>
                                            <div class="form-group" id="expenses">
                                                <div class="row">
                                                    <div class="expense_allotted_body_add">
                                                        <div class="col-md-6">
                                                            <label> Expenses </label>
                                                            <select class="js-example-basic-single" name="expense_id[]" id="exp" data-placeholder="Select Expense" style="width: 100%;" required>
                                                                <option value="">Select Expense</option>
                                                                @foreach($expenses as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Amount </label>
                                                            <input type="number" class="form-control" name="expense_amt[]" id="exp_amount" placeholder="Enter the amount to allocate" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="AppendAllottedExpense(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>

                    <form action="{{ asset('budget/update') }}" method="POST">
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

                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body no-padding table-responsive float-left">
                            <table class="table table-condensed" data-pagination="true" ><!-- data-toggle="table" -->
                                <tr>
                                    <th>Fund Source Title</th>
                                    <th>Beginning Balance</th>
                                    <th>Section/Expense Alloted</th>
                                    <th>Allocated</th>
                                    <th>Remaining Balance</th>
                                    <th>Option</th>
                                </tr>
                                @foreach($budget as $row)
                                    <tr>
                                        <td style="font-weight: bold">{{ $row->FundSourceTitle }}</td>
                                        <td>{{ number_format($row->Beginning_balance,2) }}</td>
                                        <td>
                                            <?php $section_amount_total = 0; $expense_amount_total = 0; $section=""; $expense=""; ?>
                                            @foreach( \App\Budget::select("section.description as section","budget.utilized","budget.expense_id")
                                            ->join("dts.section","section.id","=","budget.section_id")
                                            ->where("fundSource_id","=",$row->FundSourceId)
                                            ->where("level","=","admin")
                                            ->get() as $papsection)
                                                <?php
                                                $section_amount_total += $papsection->utilized;
                                                $section=$papsection->section;
                                                $expense=$papsection->expense_id;
                                                ?>
                                                @if($papsection->section != null && $papsection->expense_id == null)
                                                <li>{{ $papsection->section }} <span class='badge bg-green'>{{ number_format($papsection->utilized, 2, '.', ',') }}</span></li>
                                                    @endif
                                            @endforeach
                                            <?php  $expense_amount_total = 0; $sec =""; $exp=""; ?>
                                            @foreach( \App\Budget::select("expense.description as expense","budget.utilized","budget.section_id")
                                            ->join("expense","expense.id","=","budget.expense_id")
                                            ->where("budget.fundSource_id","=",$row->FundSourceId)
                                            ->where("level","=","admin")
                                            ->get() as $expense)
                                                <?php
                                                $expense_amount_total += $expense->utilized;
                                                $sec = $expense->expense;
                                                $exp = $expense->section_id;
                                                ?>
                                                @if($expense->expense != null)
                                                <li>{{ $expense->expense }} <span class='badge bg-green'>{{ number_format($expense->utilized, 2, '.', ',') }}</span></li>
                                                    @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($section != null)
                                            <span class="progress-number"><b>Section:{{ number_format($section_amount_total, 2, '.', ',') }}</b></span><br>
                                                <div class="progress sm">
                                                    <div class="progress-bar progress-bar-red" style="width: {{ (($section_amount_total / $row->Beginning_balance) * 100).'%' }}"></div>
                                                </div>
                                            @endif
                                                @if($expense != null)
                                                <span class="progress-number"><b>Expense:{{ number_format($expense_amount_total, 2, '.', ',') }}</b></span>
                                                        <div class="progress sm">
                                                <div class="progress-bar progress-bar-red" style="width: {{ (($expense_amount_total / $row->Beginning_balance) * 100).'%' }}"> </div>
                                                    @endif
                                                </div>
                                        </td>
                                        <td> <?php
                                            if($expense_amount_total != null) {
                                                $rem = $row->Beginning_balance - $expense_amount_total;
                                            }else {
                                                $rem = $row->Beginning_balance - $section_amount_total;
                                            }
                                            ?>{{ number_format($rem, 2, '.', ',') }}</td>
                                        <td>
                                            <button type="button" id="exp" class="btn btn-default pull-right" data-toggle="modal" data-target="#program_edit" onclick="EditProgram({{ $row->FundSourceId }},{{ $rem }})">
                                                <i class="fa fa-pencil"> Edit </i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        function EditProgram(prog_id,bal){
            var url = "<?php echo asset('budget/updateExpense');?>";
            var json = {
                "program_id" : prog_id,
                "bal" : bal,
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

        function AllocatedRemove(data){
        if(data){
        console.log(data.parent().parent().parent().parent().remove());
            }
        }

        $('.js-example-basic-single').select2();

        function getRadio() {
            var value = document.querySelector("input[name=option]:checked").value;
            console.log(value);
            //document.getElementById("output").innerHTML = "You selected: " + value;

            if(value == "section"){
                console.log(value);
                $("#expenses").hide();
                $("#exp").removeAttr("required");
                $("#exp_amount").removeAttr("required");
                $("#section").show();
            }else{
                $("#expenses").show();
                $("#section").hide();
                $("#sec").removeAttr("required");
                $("#sec_amount").removeAttr("required");
            }
        }
    </script>
@endsection