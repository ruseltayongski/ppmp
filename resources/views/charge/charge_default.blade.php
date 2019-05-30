@extends('layouts.app')

@section('content')
    <div class="box center-block" style="width: 50%">
        <div >
            <div class="box-header">
                <h3 class="box-title">SAA</h3>
            </div>
            <div class="panel-body">
                <form action="{{ asset('charge/add') }}" method="POST">
                    {{ csrf_field() }}
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input type="text" class="form-control" name="description" placeholder="Please enter your saa" required>
                            <div class="clearfix"></div>
                        </li>
                        <li class="list-group-item">
                            <input type="number" class="form-control" name="beginning_balance" placeholder="Please enter the beginning balance of saa" required>
                            <div class="clearfix"></div>
                        </li>
                        <li class="list-group-item">
                            <input type="date" class="form-control" name="datein" placeholder="Please enter the amount of saa" required>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-send"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection