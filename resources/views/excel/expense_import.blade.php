@extends('layouts.app')

@section('content')
    <title>Expense|List</title>
    <div class="box">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Expense
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <section class="col-lg-12">
                    <div class="form-group">
                        <form action="{{ asset('item/import/msd') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile" name="import_file"><br>
                            <button class="btn btn-primary">Import File</button>

                        </form>
                    </div>
                </section>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        @if(session()->has('itemAdd'))
        Lobibox.notify('info',{
            msg:"<?php echo session()->get('itemAdd'); ?>"
        });
        @endif
    </script>
@endsection