@extends('layouts.app')

@section('content')
    <title>Programs|List</title>
    <div class="box">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                PROGRAMS
            </h1>
            <ol class="breadcrumb form-inline my-2 my-lg-0">
                <form action="{{ asset('program/search') }}" method="POST">
                    {{ csrf_field() }} 
                    <input type="search" class="form-control" name="keyword" placeholder="Program Description/Acronym" style="width: 40%;">
                    <select class="form-control" name="div_id" data-placeholder="Division" style="width: 35%;">
                        <option value="0" selected>Select division</option>
                        @foreach($divisions as $div)
                            <option value="{{ $div->id }}">{{ $div->description }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> FILTER</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_new">
                        ADD NEW
                    </button>
                </form>
            </ol><br>
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
                                                            <input type="hidden" name="division_id" value="<?php echo $div_id;?>">
                                                            <input type="text" class="form-control" value="<?php echo $div_desc;?>" readonly="true">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label >Section</label>
                                                            <select class="form-control" name="section_id" data-placeholder="Select a Section" style="width: 100%;" required>
                                                                <option value="">---</option>
                                                                @foreach($sections as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                                @endforeach
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
                                    <th>Description</th>
                                    <th>Acronym</th>
                                    <th>Division ID</th>
                                    <th>Section ID</th>
                                </tr>
                                @foreach($programs as $row)
                                <tr>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->acronym }}</td>
                                    <td>{{ $row->division_id }}</td>
                                    <td>{{ $row->section_id }}</td>
                                    
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
                        <div style="text-align: right;">
                            {!! $programs->links() !!}
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