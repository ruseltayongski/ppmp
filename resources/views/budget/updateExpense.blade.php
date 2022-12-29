@if(Auth::user()->user_priv == 1)
    <input type="hidden" value="{{ $title->FundSourceId }}" name="fund_id">
        <div style="font-weight: bold; font-size: xx-large">
            {{ $title->FundSourceTitle }} {{ number_format($bal, 2, '.', ',') }}
        </div>
    @else
    <input type="hidden" value="{{ $program->section_id }}" name="fund_id">
    <input type="hidden" value="{{ $program_id }}" name="program_id">
    <div style="font-weight: bold; font-size: xx-large; font-family:Cambria;">
        <label>Alloted : </label> {{ number_format($bal, 2, '.', ',') }}
        <label> Fund Source: </label> {{ $fund }}
        <input type="hidden" value="{{ $fund }}" name="fund">
    </div>
@endif
@if(Auth::user()->user_priv == 1)
<div class="box">
    <!-- /.box-header -->
    @if(empty($program))
        <div style="font-size: xx-large" >NO DATA! PLEASE CLICK ADD ALLOCATION</div>
    @elseif($program->expense_id == null)
    <div class="form-group">
        <label >Section</label>
        <div class="row">
            <div class="section_allotted_body_add">
                <?php $count=0; ?>
                @foreach(\App\Budget::where("fundSource_id","=",$title->FundSourceId)
                ->where("level","=","admin")
                ->whereNull("expense_id")
                ->get() as $papsection)
                    <div>
                        <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                            <select class="js-example-basic-single" name="section_id[]" data-placeholder="Select a State" onclick="" style="width: 100%;" required>
                                @foreach(\App\Section::get() as $sec)
                                    @if($sec->id != $papsection->section_id)
                                        <option value="{{ $sec->id }}">{{ $sec->description }}</option>
                                    @else
                                        <option value="{{ $sec->id }}" selected>{{ $sec->description }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                            <div class="input-group">
                                <input type="number" class="form-control" name="section_amt[]" value="{{ $papsection->utilized }}" placeholder="Enter the amount to allocate">
                                <span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span>
                            </div>
                        </div>
                    </div>
                    <?php $count++; ?>
                @endforeach
            </div>
        </div>
        <br>
        <button type="button" onclick="AppendAllottedSection(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
    </div>
    {{--@elseif($program->expense_id != null)--}}
        <div class="form-group">
            <label>Expense</label>
            <div class="row">
                <div class="expense_allotted_body_add">
                    <?php $count=0; ?>
                    @foreach(\App\Budget::where("fundSource_id","=",$title->FundSourceId)
                    ->where("level","=","admin")
                    ->wherenotnull("expense_id")
                    ->get() as $expense)
                        <div>
                            <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                                <select class="js-example-basic-single" name="expense_id[]" id="check" data-placeholder="Select a State" onclick="" style="width: 100%;" required>
                                    @foreach(\App\Expense::get() as $exp)
                                        @if($exp->id != $expense->expense_id)
                                            <option value="{{ $exp->id }}">{{ $exp->description }}</option>
                                        @else
                                            <option value="{{ $exp->id }}" selected>{{ $exp->description }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="expense_amt[]" value="{{ $expense->utilized }}" placeholder="Enter the amount to allocate">
                                    <span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span>
                                </div>
                            </div>
                        </div>
                        <?php $count++; ?>
                    @endforeach
                </div>
            </div>
            <br>
            <button type="button" onclick="AppendAllottedExpense(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
        </div>
    @endif
    <!-- /.box-body -->
</div>
@else
    <div class="form-group">
        <label>Expense</label>
        <div class="row">
            <div class="expense_allotted_body_add">
            @if(Auth::user()->section == 29 && Auth::user()->section == 28 )
                <?php $count=0; ?>
                    @foreach(\App\Budget::where("program_id","=",$program_id)
                        ->whereNotNull('section_id')
                        ->whereNotNull('expense_id')
                        ->get() as $expense)
                        <div>
                            <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                                <select class="js-example-basic-single" name="expense_id[]" id="check" data-placeholder="Select a State" onclick="" style="width: 100%;" required>
                                    @foreach(\App\Expense::get() as $exp)
                                        @if($exp->id != $expense->expense_id)
                                            <option value="{{ $exp->id }}">{{ $exp->description }}</option>
                                        @else
                                            <option value="{{ $exp->id }}" selected>{{ $exp->description }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="expense_amt[]" value="{{ $expense->utilized }}" placeholder="Enter the amount to allocate">
                                    <span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span>
                                </div>
                            </div>
                        </div>
                        <?php $count++; ?>
                    @endforeach
                @else
                    <?php $count=0; ?>
                    @foreach(\App\Budget::where("section_id","=",Auth::user()->section)
                        ->whereNotNull('expense_id')
                        ->where('fundSource_id',"=",$fund)
                        ->get() as $expense)
                        <div>
                            <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                                <select class="js-example-basic-single" name="expense_id[]" id="check" data-placeholder="Select a State" onclick="" style="width: 100%;" required>
                                    @foreach(\App\Expense::get() as $exp)
                                        @if($exp->id != $expense->expense_id)
                                            <option value="{{ $exp->id }}">{{ $exp->description }}</option>
                                        @else
                                            <option value="{{ $exp->id }}" selected>{{ $exp->description }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="expense_amt[]" value="{{ $expense->utilized }}" placeholder="Enter the amount to allocate">
                                    <span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span>
                                </div>
                            </div>
                        </div>
                        <?php $count++; ?>
                    @endforeach
                @endif
            </div>
        </div>
        <br>
        <button type="button" onclick="AppendAllottedExpense(true)" class="btn-xs btn-primary pull-right"><i class="fa fa-plus"></i> add new</button>
    </div>
@endif
<script>
    $("#check").click(function(){
        console.log()
    });

    $('.js-example-basic-single').select2();
</script>

