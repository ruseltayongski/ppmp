<title>Section</title>
@extends('layouts.app')

@section('content')
    <div class="box center-block" style="width: 50%">
        <div >
            <div class="box-header">
                <h3 class="box-title">Section Division</h3>
            </div>
            <div class="panel-body">
                <form action="{{ asset('user/division/update') }}" method="POST">
                    {{ csrf_field() }}
                    <ul class="list-group">
                        <li class="list-group-item">
                            <select name="division" id="" class="form-control" required>
                                <option value="">Please select division</option>
                                @foreach($division as $div)
                                    <option value="{{ $div->id }}">{{ $div->description }}</option>
                                @endforeach
                            </select>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                    <button class="btn btn-success pull-right" type="submit"><i class="fa fa-send"></i> Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection