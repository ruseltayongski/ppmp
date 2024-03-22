<?php

function conn()
{
    $serverName = "LAMBORGHINI\VEEAMSQL2016";
    //$serverName = "192.168.110.45,80";
    $database = "fmisdummy";
    $uid = "sa";
    $pwd = "D0h7_1T";

    try{
        $conn = new PDO("sqlsrv:server=$serverName ; Database = $database", $uid, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $err) {
        echo "<h3>Can't connect to database server address $serverName</h3>";
        exit();
    }
    return $conn;
}

function queryAllotment($div_desc,$class){
    $pdo = conn();
    $query = 'SELECT * FROM FundSource WHERE RespoId = ? AND AllotmentClassId = ?';

    try
    {
        $st = $pdo->prepare($query);
        $st->execute(array($div_desc, $class));;
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}

function queryRespoCenter(){
    $pdo = conn();
    $query = 'SELECT * FROM RespoCenter';

    try
    {
        $st = $pdo->prepare($query);
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}

function queryAllotmentClass(){
    $pdo = conn();
    $query = 'SELECT * FROM AllotmentClass';

    try
    {
        $st = $pdo->prepare($query);
        $st->execute();
        $row = $st->fetchAll(PDO::FETCH_OBJ);
    }catch(PDOException $ex){
        echo $ex->getMessage();
        exit();
    }
    return $row;
}

//$budget = queryAllotment($div,$class);
$allotment = queryAllotmentClass();
?>
@extends('layouts.app')
<style>
    :root {
        --card-line-height: 1.2em;
        --card-padding: 1em;
        --card-radius: 0.5em;
        --color-green: #558309;
        --color-gray: #e2ebf6;
        --color-dark-gray: #c4d1e1;
        --radio-border-width: 2px;
        --radio-size: 1.5em;
    }

    modal-body {
        background-color: #f2f8ff;
        color: #263238;
        font-family: 'Noto Sans', sans-serif;
        margin: 0;
        padding: 2em 6vw;
    }

    .grid {
        display: grid;
        grid-gap: var(--card-padding);
        margin: 0 auto;
        max-width: 60em;
        padding: 0;

    @media (min-width: 42em) {
        grid-template-columns: repeat(3, 1fr);
    }
    }

    .card {
        background-color: #fff;
        border-radius: var(--card-radius);
        position: relative;

    /*&:hover {*/
         /*box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);*/
     /*}*/
    /*}*/

    .radio {
        font-size: inherit;
        margin: 0;
        position: absolute;
        right: calc(var(--card-padding) + var(--radio-border-width));
        top: calc(var(--card-padding) + var(--radio-border-width));
    }

    @supports(-webkit-appearance: none) or (-moz-appearance: none) {
        .radio {
            -webkit-appearance: none;
            -moz-appearance: none;
            background: #fff;
            border: var(--radio-border-width) solid var(--color-gray);
            border-radius: 50%;
            cursor: pointer;
            height: var(--radio-size);
            outline: none;
            transition:
                    background 0.2s ease-out,
                    border-color 0.2s ease-out;
            width: var(--radio-size);

    &::after {
         border: var(--radio-border-width) solid #fff;
         border-top: 0;
         border-left: 0;
         content: '';
         display: block;
         height: 0.75rem;
         left: 25%;
         position: absolute;
         top: 50%;
         transform:
                 rotate(45deg)
                 translate(-50%, -50%);
         width: 0.375rem;
     }

    &:checked {
         background: var(--color-green);
         border-color: var(--color-green);
     }
    }

    .card:hover .radio {
        border-color: var(--color-dark-gray);

    &:checked {
         border-color: var(--color-green);
     }
    }
    }

    .plan-details {
        border: var(--radio-border-width) solid var(--color-gray);
        border-radius: var(--card-radius);
        cursor: pointer;
        display: flex;
        flex-direction: column;
        padding: var(--card-padding);
        transition: border-color 0.2s ease-out;
    }

    /*.card:hover .plan-details {*/
        /*border-color: var(--color-dark-gray);*/
    /*}*/

    .radio:checked ~ .plan-details {
        border-color: var(--color-green);
    }

    .radio:focus ~ .plan-details {
        box-shadow: 0 0 0 2px var(--color-dark-gray);
    }

    .radio:disabled ~ .plan-details {
        color: var(--color-dark-gray);
        cursor: default;
    }

    .radio:disabled ~ .plan-details .plan-type {
        color: var(--color-dark-gray);
    }

    /*.card:hover .radio:disabled ~ .plan-details {*/
        /*border-color: var(--color-gray);*/
        /*box-shadow: none;*/
    /*}*/

    /*.card:hover .radio:disabled {*/
        /*border-color: var(--color-gray);*/
    /*}*/

    .plan-type {
        color: var(--color-green);
        font-size: 1.5rem;
        font-weight: bold;
        line-height: 1em;
    }
</style>
@section('content')
    <title>Manage | Budget Allotment</title>
    <div class="box">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1 style="font-weight: bold">
                <div class="tabs">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="#tab1">National Expenditures Program</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab2">GAA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab3">SAA</a>
                        </li>
                        <!-- Add more tabs as needed -->
                    </ul>
                </div>
                {{--<div class="tab-content">--}}
                    {{--<div id="tab1" class="tab-item">SAMPLE</div>--}}
                    {{--<div id="tab2" class="tab-item"></div>--}}
                    {{--<div id="tab3" class="tab-item"></div>--}}
                {{--</div>--}}
            </h1><br>
            <div>
                <ol class="breadcrumb form-inline my-2 my-lg-0">
                    <form action="{{ asset('program/search') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="search" class="form-control" name="keyword" placeholder="Title/Acronym" style="width:25%;">
                        <select class="form-control" name="allotment_id" data-placeholder="Allotment Class" style="width:25%;">
                            <option value="0" selected>Select Allotment Class</option>
                            @foreach($allotment_c as $row)
                                <option value="{{ $row->Id }}">{{ $row->Allotment_Class }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="div_id" data-placeholder="Division" style="width:25%;">
                            <option value="0" selected>Select division</option>
                            @foreach($divisions as $div)
                                <option value="{{ $div->id }}">{{ $div->description }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>
                            <span style="font-weight: bold"> FILTER</span>
                        </button>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_new">
                            <span style="font-weight: bold"> ADD ALLOCATION </span>
                        </button>
                    </form>
                </ol>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <section class="col-lg-12">
                    <form action="{{ asset('budget/add') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="add_new">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1ab7ea; fill-opacity:1">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" style="color: whitesmoke"> Add Allocation </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="box-body">
                                            <label> Choose Fund Source: </label>
                                            <div class="grid" onchange="chooseSource()">
                                                <label class="card">
                                                    <input name="plan" class="radio" type="radio" value="nep" checked>
                                                    <span class="plan-details">
                                                    <span class="plan-type">National Expenditures Program</span>
                                                    </span>
                                                </label>
                                                <label class="card">
                                                    <input name="plan" class="radio" type="radio" value="gaa">
                                                    <span class="plan-details">
                                                    <span class="plan-type">General Appropriations Act</span>
                                                    </span>
                                                </label>
                                                <label class="card">
                                                    <input name="plan" class="radio" type="radio" value="saa">
                                                    <span class="plan-details">
                                                    <span class="plan-type">Sub-Allotment Advice</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-group" id="nep">
                                                <label>NEP: </label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group" style="width: 100%;">
                                                           <input type="text" class="form-control" id="nep_title" name="nep_title" value="" placeholder="Input Fund Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group" style="width: 100%;">
                                                            <input type="number" class="form-control" id="nep_amt" name="nep_amt" value="" placeholder="Input Fund Amount"  required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="saa">
                                                <label>SAA: </label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group" style="width: 100%;">
                                                            <input type="text" class="form-control" id="saa_title" name="saa" value="" placeholder="Input Fund Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group" style="width: 100%;">
                                                            <input type="number" class="form-control" id="saa_amt" name="saa_amt" value="" placeholder="Input Fund Amount" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="fundSource">
                                                <label>Fund Source: </label>
                                                <select class="js-example-basic-single" name="fund_source" id="fund_source" data-placeholder="Select Fund Source" style="width: 100%;" required>
                                                    @foreach($budget as $row)
                                                    <option value="">Select Fund Source</option>
                                                    <option value="{{ $row->FundSourceId }}" data-custom="{{ $row->Beginning_balance }}"> {{ $row->FundSourceTitle }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" value="{{ $row->Beginning_balance }}" id="fund">
                                            </div>
                                            <div class="form-group" id="allotment_class">
                                                <label>Select Allotment Class: </label>
                                                <select class="js-example-basic-single" name="allotment_id" id="allotment_id" data-placeholder="Select Allotment Class" style="width: 100%;" required>
                                                    <option value="" selected>Select Allotment Class</option>
                                                    @foreach($allotment_c as $row)
                                                        <option value="{{ $row->Id }}">{{ $row->Allotment_Class }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-check" onchange="getRadio()">
                                            <p>Please select your option:</p>
                                              <input type="radio" id="option" name="option" value="section">
                                              <label for="section">Section</label><br>
                                              <input type="radio" id="option" name="option" value="expense">
                                              <label for="expense">Expense</label><br>
                                            </div>
                                            <div class="section" id="section" onload="">
                                                <div class="row">
                                                    <div class="section_allotted_body_add">
                                                        <div class="col-md-6">
                                                            <label> Section </label>
                                                            <select class="js-example-basic-single" name="section_id[]" id="sec"  data-placeholder="Select Section" style="width: 100%;" required>
                                                                <option value="">Select Section</option>
                                                                @foreach($sections as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Amount </label>
                                                            <input type="number" class="form-control" name="section_amt[]" id="sec_amount" placeholder="Enter the amount to allocate" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="AppendAllottedSection(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
                                            </div>
                                            <br>
                                            <div class="form-group" id="expenses">
                                                <div class="row">
                                                    <div class="expense_allotted_body_add">
                                                        <div class="col-md-6">
                                                            <label> Expenses </label>
                                                            <select class="js-example-basic-single" name="expense_id[]" id="exp" data-placeholder="Select Expense" style="width: 100%;" required>
                                                                <option value="">Select Expense</option>
                                                                @foreach($expenses as $row)
                                                                    <option value="{{ $row->id }}">{{ $row->description }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label> Amount </label>
                                                            <input type="number" class="form-control" name="expense_amt[]" id="exp_amount" placeholder="Enter the amount to allocate" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" onclick="AppendAllottedExpense(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" id="checkAmount"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    </form>

                    <form action="{{ asset('budget/update') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal fade" id="program_edit">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: cornflowerblue; color: whitesmoke;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h3 class="modal-title"> Allocations </h3>
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

                    <div class=tab-content">
                        <!-- /.box-header -->
                        <div class="box-body no-padding table-responsive float-left">
                            <table class="table table-condensed" data-pagination="true" ><!-- data-toggle="table" -->
                                <tr>
                                    <th><h3>Fund Source Title</h3></th>
                                    <th><h3>Beginning Balance</h3></th>
                                    {{--<th><h3>Section/Expense Alloted</h3></th>--}}
                                    <th><h3>Allocated</h3></th>
                                    <th><h3>Remaining Balance</h3></th>
                                    <th><h3>Option</h3></th>
                                </tr>
                                {{--<tr id="tab1" class="tab-item"></tr>--}}
                                {{--<tr id="tab2" class="tab-item" ></tr>--}}
                                {{--<tr id="tab3" class="tab-item"></tr>--}}
                                <tbody id="tab1">
                                <!-- Empty tbody where new rows will be inserted -->
                                </tbody>
                                <tbody id="tab2">
                                <!-- Empty tbody where new rows will be inserted -->
                                </tbody>
                                <tbody id="tab3">
                                <!-- Empty tbody where new rows will be inserted -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $('.select2').select2();
        @if(session()->has('msg'))
        Lobibox.notify('info',{
            msg:"<?php echo session()->get('msg'); ?>",
            size: 'mini',
            rounded: true
        });
        @endif

        function DeleteProgram(program_id){
            $(".program_id_delete").val(program_id);
        }

        function AppendAllottedSection(ok){
            if(ok){
                $(".section_allotted_body_add").append('@include('budget.section_alloted_append')');
                $('.js-example-basic-single').select2();
                AllocatedRemove('');
            }
        }

        function AppendAllottedExpense(ok){
            if(ok){
                $(".expense_allotted_body_add").append('@include('budget.expense_alloted_append')');
                $('.js-example-basic-single').select2();
                AllocatedRemove('');
            }
        }

        function AllocatedRemove(data){
        if(data){
        console.log(data.parent().parent().parent().parent().remove());
            }
        }

        $('.js-example-basic-single').select2();

        function getRadio() {
            var radio = document.querySelector("input[name=option]:checked").value;
            //console.log(radio);
            //document.getElementById("output").innerHTML = "You selected: " + value;

            if(radio == "section"){
                $("#expenses").hide();
                $("#exp").removeAttr("required");
                $("#exp_amount").removeAttr("required");
                $("#section").show();
            }else{
                $("#expenses").show();
                $("#section").hide();
                $("#sec").removeAttr("required");
                $("#sec_amount").removeAttr("required");
            }
            return radio;
        }

        function chooseSource() {
            var value = document.querySelector("input[name=plan]:checked").value;
            console.log(value);

            if(value == "gaa") {
                $("#fundSource").show();
                $("#saa").hide();
                $("#nep").hide();
                $("#saa_amt").removeAttr("required");
                $("#saa_title").removeAttr("required");
                $("#nep_amt").removeAttr("required");
                $("#nep_title").removeAttr("required");
            }
            else if(value == "saa"){
                $("#fundSource").hide();
                $("#fund_source").removeAttr("required");
                $("#saa").show();
                $("#nep").hide();
                $("#nep_amt").removeAttr("required");
                $("#nep_title").removeAttr("required");
            }
            else {
                $("#fundSource").hide();
                $("#fund_source").removeAttr("required");
                $("#nep").show();
                $("#saa").hide();
                $("#saa_amt").removeAttr("required");
                $("#saa_title").removeAttr("required");
            }
        }

        {{--function checkAmount(){--}}
            var type = document.querySelector("input[name=plan]:checked").value;
            //getRadio(e);
//            console.log(getRadio());

            $(document).ready(function () {
                event.preventDefault();
                $("#allotment_class").on("click", function () {
                    // Get the input element value
                    const inputValue = $("#nep_amt").val();
                    console.log(inputValue);
                        $("#checkAmount").on('click', function () {
                            if (type == "nep") {
                                const exp = $("#exp_amount").val();
                                const sec = $("#sec_amount").val();
                                console.log(sec);
                                if(sec != 0) {
                                    if (sec > inputValue) {
                                        Lobibox.alert('error',
                                            {
                                                title: "WARNING",
                                                msg: "Your allocation is greater than the budget given pls check"
                                            });
                                    }
                                    else {
                                        location.href = '{{ asset('budget/add') }}';
                                    }
                                }else if (exp > inputValue) {
                                    Lobibox.alert('error',
                                        {
                                            title: "WARNING",
                                            msg: "Please set a program first"
                                        });
                                }
                                else {
                                    location.href = '{{ asset('budget/add') }}';
                                }
                            }
                        })
                    });
                });

        $(document).ready(function() {
            // Handle click event on tab links
            $('.nav-tabs a').on('click', function(event) {
                event.preventDefault();
                var tabId = $(this).attr('href').substring(1); // Get the tab ID from the href attribute
                console.log(tabId);
                loadTabContent(tabId); // Load the tab content using Ajax
            });

            function loadTabContent(tabId) {
                var baseUrl = 'http://localhost/ppmp';
                var endpoint = 'tabs';
                var url = baseUrl+'/'+endpoint;
                $.ajax({
                    url: url, // Replace with the URL to your server-side route to fetch the tab content
                    method: 'get', // Replace with the appropriate HTTP method (GET, POST, etc.)
                    data: {tabId: tabId},
                    success: function (tabContent) {

                        if (tabContent && tabContent.length) {
                            const arrayLength = tabContent.length;
                            console.log(arrayLength);
                            // Access the array elements
                            const dataContainer = $('#' + tabId);

                            dataContainer.empty();
                            $('#' + tabId).html(tabContent);
                            showTab(tabId);

                            // Loop through the response data
                            for (var i = 0; i < tabContent.length; i++) {
                                var item = tabContent[i];
                                if(tabId == "tab3") {
                                    var divContent = "<tr><td>" + item.Suballotment_title + "</td><td>" + item.Suballotment_title + "</td><td>"+ item.Suballotment_title +"</td><td>"+ item.Suballotment_title +"</td><td><button  data-toggle='modal' data-target='#program_edit' onclick='editNep(" + item.SuballotmentId + "," + item.remaining_bal + ")' >Edit</button></td></tr>";
                                }else
                                    if(tabId == "tab2"){
                                    var divContent = "<tr><td>" + item.FundSourceId + "</td><td>" + item.FundSourceTitle + "</td><td>"+ item.Beginning_balance +"</td><td>"+ item.Suballotment_title +"</td><td><button  data-toggle='modal' data-target='#program_edit' onclick='editNep(" + item.id + "," + item.remaining_bal + ")' >Edit</button></td></tr>";
                                }else {
                                        var divContent = "<tr><td>" + item.nep_title + "</td>" +
                                            "<td>" + item.beginning_bal  + "</td>" +
//                                            "<td>" + item.section_id + "</td>" +
                                            "<td>"+ item.remaining_bal +"</td>" +
                                            "<td>"+ item.remaining_bal +"</td>"+
//                                                        "<td><button onclick=EditProgram.call(,rem)>Edit</button></td></tr>";
                                            "<td><button  data-toggle='modal' data-target='#program_edit' onclick='editNep(" + item.id + ", " + item.remaining_bal + ")' >Edit</button></td></tr>"
                                    }

                                // Append the new div to the container
                                $('#'+tabId).append(divContent);
                                showTab(tabId);
                           }
                        }else
                            console.log('Empty or invalid response.');

                    },
                    error: function(error) {
                        console.error('Error loading tab content:', error);
                    }
                });
            }

            function showTab(tabId) {
                //$('.tab-item').removeClass('active'); // Hide all tab items
                $('#'+tabId).addClass('active'); // Show the selected tab item
                if(tabId == "tab1"){
                    $('#tab2').hide(); // Show the selected tab item
                    $('#tab3').hide(); // Show the selected tab item
                    $('#tab1').show(); // Show the selected tab item
                }else if(tabId == "tab2") {
                    $('#tab1').hide(); // Show the selected tab item
                    $('#tab3').hide(); // Show the selected tab item
                    $('#tab2').show(); // Show the selected tab item
                }else {
                    $('#tab1').hide(); // Show the selected tab item
                    $('#tab2').hide(); // Show the selected tab item
                    $('#tab3').show(); // Show the selected tab item
                }

            }

            var tabs = $('.nav-tabs a');
            if($('.nav-tabs a.active').length === 0) {
                tabs.first().click();
            }
        });

        function EditProgram(prog_id,bal){
            var url = "<?php echo asset('budget/updateExpense');?>";
            var json = {
                "program_id" : prog_id,
                "bal" : bal,
                "_token" : "<?php echo csrf_token(); ?>"
            };

            // Show loading message or perform any other necessary actions
            $(".program_edit_body").html("Please wait...");

            // Make the AJAX request
            $.post(url, json, function(result){
                // Update the content of program_edit_body with the result
                $(".program_edit_body").html(result);

                // You can also hide the loading message or perform other actions here
            });
        }

        function editNep(nep_id,bal){
            var url = "<?php echo asset('budget/updateExpense');?>";
            var json = {
                "nep_id" : nep_id,
                "bal" : bal,
                "_token" : "<?php echo csrf_token(); ?>"
            };

            $(".program_edit_body").html("Please wait...");
            $.post(url, json, function(result){
                $(".program_edit_body").html(result);
            });
        }

    </script>
@endsection