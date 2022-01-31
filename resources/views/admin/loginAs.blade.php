<?php
$user = Session::get('auth');
$sections = \App\Section::select('id','description')
//    ->where('id','!=','63')
    ->where('division',$user->division)
    ->get();
?>
@extends('layouts.app')

@section('content')
    <style>
        .table-input tr td:first-child {
            background: #f5f5f5;
            text-align: right;
            vertical-align: middle;
            font-weight: bold;
            padding: 3px;
            width:30%;
        }
        .table-input tr td {
            border:1px solid #bbb !important;
        }
        label {
            padding: 0px !important;
        }
    </style>
    <div class="col-md-9">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3>{{ $title }}</h3>
            </div>
            <div class="box-body">
                <form method="POST" class="form-horizontal form-submit" id="hospitalForm" action="{{ asset('admin/login') }}">
                    {{ csrf_field() }}
                    <table class="table table-input table-bordered table-hover" border="1">
                        <tr class="has-group">
                            <td>Section :</td>
                            <td>
                                <select class="form-control select2" name="section_id" required>
                                    <option value="">Select Section...</option>
                                    @foreach($sections as $f)
                                        <option value="{{ $f->id }}">{{ $f->description }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-sign-in"></i> Login
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection

