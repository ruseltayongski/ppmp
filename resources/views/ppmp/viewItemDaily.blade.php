@extends('layouts.app')

@section('content')
    <title>Item|List</title>
    <div class="box">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="font-weight: bold">
                 ITEMS <i class="fa fa-pencil fa-fw"></i>
            </h1>
            <ol class="breadcrumb form-inline my-2 my-lg-0">
            </ol><br>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <section class="col-lg-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body no-padding table-responsive float-left">
                            <table class="table table-condensed" data-pagination="true" ><!-- data-toggle="table" -->
                                <tr>
                                    <th>Description</th>
                                    <th>Yearly Reference</th>
                                    <th>Division ID</th>
                                    <th>Section ID</th>
                                    <th>Unit Cost</th>
                                    <th>Estimated Budget</th>
                                    <th>Jan</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Apr</th>
                                    <th>May</th>
                                    <th>June</th>
                                    <th>July</th>
                                    <th>August</th>
                                    <th>September</th>
                                    <th>October</th>
                                    <th>November</th>
                                    <th>December</th>
                                </tr>
                                @foreach($items as $row)
                                    <tr>
                                        <td>{{ $row->description }}</td>
                                        <td>{{ $row->yearly_ref_id }}</td>
                                        <td>{{ $row->division_id }}</td>
                                        <td>{{ $row->section_id }}</td>
                                        <td>{{ $row->unit_cost }}</td>
                                        <td>{{ $row->estimated_budget }}</td>
                                        <td>{{ $row->jan }}</td>
                                        <td>{{ $row->feb }}</td>
                                        <td>{{ $row->mar }}</td>
                                        <td>{{ $row->apr }}</td>
                                        <td>{{ $row->may }}</td>
                                        <td>{{ $row->jun }}</td>
                                        <td>{{ $row->jul }}</td>
                                        <td>{{ $row->aug }}</td>
                                        <td>{{ $row->sept }}</td>
                                        <td>{{ $row->oct }}</td>
                                        <td>{{ $row->nov }}</td>
                                        <td>{{ $row->dec }}</td>

                                        <td>
                                            {{--<button type="button" class="btn btn-default pull-right" data-toggle="modal" data-unique_id='$row->unique_id' data-item_id='$row->id' data-item_description='$row->description' style='cursor: pointer;' onclick='deleteItem($(this))'>--}}
                                                {{--<i class="fa fa-trash"></i>--}}
                                            {{--</button>--}}
                                            <span class='badge bg-red' data-unique_id='{{ $row->unique_id }}' data-item_id='{{ $row->id }}' data-item_description='{{ $row->description }}' style='cursor: pointer;' onclick='deleteItem($(this))'><i class='fa fa-remove'></i> REMOVE</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div style="text-align: right;">
                            {!! $items->links() !!}
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

        function DeleteProgram(id){
            $(".program_id_delete").val(id);
        }

        function deleteItem(element){
            console.log(element.data('unique_id'));
            console.log(element.data('item_id'));
            Lobibox.confirm({
                title: 'Confirmation',
                msg: "Are you sure you want to delete this "+element.data('item_description')+" ?",
                callback: function ($this, type, ev) {
                    if(type == 'yes'){
                        if(element.data('unique_id'))
                            $("."+element.data('unique_id')).remove();
                        else if(element.data('item_id'))
                            $("."+element.data('item_id')).remove();

                        var url = "<?php echo asset('ppmp/delete') ?>";
                        var json = {
                            "unique_id" : element.data('unique_id'),
                            "item_id" : element.data('item_id'),
                            "_token" : "<?php echo csrf_token(); ?>",
                        };
                        $.post(url,json,function(result){
                            console.log(result);
                        });
                        Lobibox.notify('error', {
                            title: '',
                            msg: "Successfully Deleted!",
                            size: 'mini',
                            rounded: true
                        });
                    }
                }
            });
        }
    </script>
@endsection