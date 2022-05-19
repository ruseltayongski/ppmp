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

function queryAllotment($div_desc){
    $pdo = conn();
    $query = 'SELECT * FROM FundSource WHERE RespoId = ?';

    try
    {
        $st = $pdo->prepare($query);
        $st->execute(array($div_desc));;
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


$respo = queryRespoCenter();

if($div == 6) {
    $div = 1;
}else if ($div == 4) {
    $div = 2;
}else if ($div == 5) {
    $div = 4;
}
$budget = queryAllotment($div);
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
            </h1>
            <ol class="breadcrumb form-inline my-2 my-lg-0">
                <form action="{{ asset('program/search') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="search" class="form-control" name="keyword" placeholder="Title/Acronym" style="width:30%;">
                    <select class="form-control" name="allotment_id" data-placeholder="Allotment Class" style="width:25%;">
                        <option value="0" selected>Select Allotment Class</option>
                        @foreach($allotment as $row)
                            <option value="{{ $row->Id }}">{{ $row->Allotment_Class }}</option>
                        @endforeach
                    </select>
                    <select class="form-control" name="div_id" data-placeholder="Division" style="width:25%;">
                        <option value="0" selected>Select division</option>
                        @foreach($divisions as $div)
                            <option value="{{ $div->id }}">{{ $div->description }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> FILTER</button>
                </form>
            </ol><br/>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <section class="col-lg-12">
                    <form action="{{ asset('program/add') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="add_new">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Add Program</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label >Description</label>
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Acronym</label>
                                                <input type="text" class="form-control" name="acronym" required>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="section_allotted_body_add">
                                                        <div class="col-md-6">
                                                            <label >Division</label>
                                                            <input type="hidden" name="division_id" value="">
                                                            <input type="text" class="form-control" value="" readonly="true">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label >Section</label>
                                                            <select class="form-control" name="section_id" data-placeholder="Select a Section" style="width: 100%;" required>
                                                                <option value="">---</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
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

                    <form action="{{ asset('program/update') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="program_edit">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Update Program</h4>
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
                                    <th>Code</th>
                                    <th>Fund Source Title</th>
                                    <th>Beginning Balance</th>
                                    <th>Remaining Balance</th>
                                </tr>
                                @foreach($budget as $row)
                                    <tr>
                                        <td>{{ $row->FundSourceTitleCode }}</td>
                                        <td style="font-weight: bold">{{ $row->FundSourceTitle }}</td>
                                        <td>{{ number_format($row->Beginning_balance,2) }}</td>
                                        <td>{{ number_format($row->Remaining_balance,2) }}</td>

                                        <td>
                                            <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#program_edit" onclick="EditProgram({{ $row->FundSourceId }})">
                                                <i class="fa fa-money"></i>
                                            </button>
                                            <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#program_delete" onclick="DeleteProgram({{ $row->FundSourceId }})">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div style="text-align: right;">
                            {{--{!! $divisions->links() !!}--}}
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
        @if(session()->has('program_notif'))
        Lobibox.notify('info',{
            msg:"<?php echo session()->get('program_notif'); ?>",
            size: 'mini',
            rounded: true
        });
        @endif

        function EditProgram(prog_id){
            var url = "<?php echo asset('program/edit');?>";
            var json = {
                "program_id" : prog_id,
                "_token" : "<?php echo csrf_token(); ?>"
            };

            $(".program_edit_body").html("Please wait...");
            $.post(url, json, function(result){
                $(".program_edit_body").html(result);
            });
        }

        function DeleteProgram(program_id){
            $(".program_id_delete").val(program_id);
        }
    </script>
@endsection