@extends('layouts.app')

@section('content')
    <title>WFP|REALIGNMENT</title>

<?php

    $division_id = Auth::user()->division;

?>

    <div class="box box-primary">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <table class="table table-striped" style="font-size: 11pt;">
                        <tr>
                            <th>Expense</th>
                            <th>Amount</th>
                        </tr>


                        @foreach ($expenses as $expense)
                            <tr>
                        <td>{{$expense->description}}</td>
                            @if($division_id == "4")
                        <td>{{$expense->chief_lhsd}}</td>
                            @else
                         <td>{{$expense->chief_msd}}</td>
                           </tr>
                            @endif

                        @endforeach

                    </table>


                        <div>

                            <a href="" class="btn btn-sm btn-info" data-toggle="modal"  data-target="#Modal">
                                <i class="fa fa-pencil"> </i>  REALIGN
                            </a>
                        </div>

                            <div class="modal fade" id="Modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Realign WFP</h4>
                                            <div class="row">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                            </div>
                                        </div>
                                        <form id="realignment_form" action="{{ route('realignment')}}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            {{ method_field('PATCH') }}
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            From:
                                                            <select name="select_from" required id="select_from" class="chosen-select form-control" data-link="{{ asset('/get/from') }}">
                                                                <option value="" selected disabled> Select Expense </option>
                                                                @foreach($expenses as $a)
                                                                    <option value="{{ $a->id }}">{{ $a->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            To:
                                                            <select name="select_to" required id="select_to" class="chosen-select form-control" data-link="{{ asset('/get/to') }}">
                                                                <option value="" selected disabled>Select Expense</option>
                                                                @foreach($expenses as $a)
                                                                    <option value="{{ $a->id }}">{{ $a->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-12"> Amount
                                                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" id="submit" class="btn btn-primary" name="submit"> Submit </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
