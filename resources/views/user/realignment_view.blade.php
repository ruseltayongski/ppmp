@extends('layouts.app')

@section('content')
    <title>ALL WFP REALIGNMENTS</title>

<?php

    $division_id = Auth::user()->division;

?>

    <div class="box box-primary">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <table class="table table-striped" style="font-size: 11pt;">
                        <tr>
                            <th>Realignment No. </th>
                            <th>From</th>
                            <th>To</th>
                            <th>Division</th>
                            <th>Section</th>
                        </tr>


                        @foreach ($realignments as $realignment)
                            <tr>
                                <td>{{$realignment->id}}</td>
                                <td>{{$realignment->expense_from}}</td>
                                <td>{{$realignment->expense_to}}</td>
                                <td>{{$realignment->division_id}}</td>
                                <td>{{$realignment->section_id}}</td>
                            </tr>

                        @endforeach

                    </table>


                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @if(session()->has('error'))
        Lobibox.notify('error', {
            title: '',
            msg: "<?php echo session()->get('error'); ?>",
            size: 'mini',
            rounded: false
        });

        @endif
    </script>
@endsection
