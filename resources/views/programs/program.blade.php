@extends('layouts.app')

@section('content')
    <title>Programs|List</title>
    <div class="box">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                PROGRAMS
                &emsp;
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_new">
                    Add New
                </button>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Programs</a></li>
                <li class="active">Home</li>
            </ol>
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
                                                            <input type="hidden" name="division_id" value="<?php echo $div_id;?>">
                                                            <input type="text" class="form-control" value="<?php echo $div_desc;?>" readonly="true">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label >Section</label>
                                                            <select class="form-control" name="section_id" data-placeholder="Select a Section" style="width: 100%;" required>
                                                                @foreach($sections as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label >Budget Allotment</label>
                                                <input type="number" class="form-control" name="budget" min="0" placeholder="Enter the budget allotment.">
                                            </div>
                                            <div class="form-group">
                                                <label >Fund Source</label>
                                                <input type="text" class="form-control" name="fund_source">
                                            </div>
                                            <div class="form-group">
                                                <label >Expense ID</label>
                                                <input type="text" class="form-control" name="expense_id">
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
                        <div class="box-body no-padding table-responsive">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Description</th>
                                    <th>Acronym</th>
                                    <th>Division ID</th>
                                    <th>Section ID</th>
                                    <th>Budget Allotment</th>
                                    <th>Fund Source</th>
                                    <th>Expense ID</th>
                                </tr>
                                @foreach($programs as $row)
                                <tr>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->acronym }}</td>
                                    <td>{{ $row->division_id }}</td>
                                    <td>{{ $row->section_id }}</td>
                                    <td>
                                        <span class="badge bg-blue" style="font-size:12pt;"> <i class="fa fa-paypal"></i> {{ number_format($row->budget_allotment, 2, '.', ',') }}</span>
                                    </td>
                                    <td>{{ $row->fund_source }}</td>
                                    <td>{{ $row->expense_id }}</td>
                                    
                                    <td>
                                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#program_edit" onclick="EditProgram({{ $row->id }})">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#program_delete" onclick="DeleteProgram({{ $row->id }})">
                                            <i class="fa fa-trash"></i>
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