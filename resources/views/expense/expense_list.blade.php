@extends('layouts.app')

@section('content')
    <title>Expense|List</title>
    <div class="box">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">PPMP</h3>

                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Status</th>
                    </tr>
                    @foreach($expense as $row)
                    <tr>
                        <td>{{ $row->code }}</td>
                        <td>{{ $row->description }}</td>
                        <td><span class="label label-primary">Approved</span></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection