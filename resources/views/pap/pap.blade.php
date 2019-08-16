@extends('layouts.app')

@section('content')
    <title>Pap|List</title>
    <div class="box">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                PAP
                <small>Control panel</small>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#add_new">
                    Add New
                </button>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> PAP</a></li>
                <li class="active">Home</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <section class="col-lg-12">
                    <form action="{{ asset('pap/add') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="add_new">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label >Code</label>
                                                <input type="text" class="form-control" name="code" required>
                                            </div>
                                            <div class="form-group">
                                                <label >PAP</label>
                                                <select name="pap" class="form-control" required>
                                                    <option value="Regular Allotment">Regular Allotment</option>
                                                    <option value="Sub Allotment">Sub Allotment</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Description</label>
                                                <input type="text" class="form-control" name="description" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Amount</label>
                                                <input type="number" class="form-control" name="amount" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Section Allotted</label>
                                                <div class="row">
                                                    <div class="section_allotted_body_add">
                                                        <div class="col-md-6">
                                                            <select class="form-control select2" name="section_id[]" data-placeholder="Select a State" onclick="" style="width: 100%;" required>
                                                                @foreach(\App\Section::get() as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="number" class="form-control" name="section_amount[]" placeholder="Enter the amount to allocate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="button" onclick="AppendAllottedSection(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
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
                    <form action="{{ asset('pap/edit_save') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Default Modal</h4>
                                    </div>
                                    <div class="modal-body pap_edit_body">
                                        <p>One fine body&hellip;</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" onclick="CheckBalance()" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>

                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tr>
                                    <th>Code</th>
                                    <th>PAP</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Section allotted</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                @foreach(\App\Pap::get() as $row)
                                <tr>
                                    <td>{{ $row->code }}</td>
                                    <td>{{ $row->pap }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>
                                        <span class="badge bg-blue" style="font-size:20pt;"> <i class="fa fa-paypal"></i> {{ $row->amount }}</span>
                                    </td>
                                    <td>
                                        @foreach(\App\PapSection::select("section.description as section","papsection.amount")->join("dts.section","section.id","=","papsection.section_id")->where("pap_id","=",$row->id)->get() as $papsection)
                                            <li>{{ $papsection->section }} <span class='badge bg-green'>{{ $papsection->amount }}</span></li>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                        <span class="badge bg-red">55%</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-default" onclick="EditPap({{ $row->id }})">
                                            <i class="fa fa-pencil"></i>
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
        $('.select2').select2();
        @if(session()->has('pap_add'))
        Lobibox.notify('info',{
            msg:"<?php echo session()->get('pap_add'); ?>"
        });
        @endif

        function AppendAllottedSection(ok){
            if(ok){
                $(".section_allotted_body_add").append('@include('pap.section_allotted_append')');
                $('.select2').select2();
                AllocatedRemove('');
            }
        }

        function EditPap(pap_id){
            var url = "<?php echo asset('pap/edit') ?>";
            var json = {
                "pap_id" : pap_id,
                "_token" : "<?php echo csrf_token(); ?>"
            };
            $(".pap_edit_body").html("Please wait..");
            $.post(url,json,function(result){
                AppendAllottedSection(false);
                $(".pap_edit_body").html(result);
            });
        }

        function AllocatedRemove(data){
            if(data){
                console.log(data.parent().parent().parent().parent().remove());
            }
        }


    </script>
@endsection