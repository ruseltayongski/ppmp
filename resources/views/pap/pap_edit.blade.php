<input type="hidden" value="{{ $pap->id }}" name="pap_id">
<div class="form-group">
    <label >Code</label>
    <input type="text" class="form-control" value="{{ $pap->code }}" name="code" required>
</div>
<div class="form-group">
    <label >PAP</label>
    <select name="pap" class="form-control" required>
        <option value="Regular Allotment">Regular Allotment</option>
        <option value="Sub Allotment">Sub Allotment</option>
    </select>
</div>
<div class="form-group">
    <label >Description</label>
    <input type="text" class="form-control" value="{{ $pap->description }}" name="description" required>
</div>
<div class="form-group">
    <label >Amount</label>
    <input type="number" class="form-control" value="{{ $pap->amount }}" name="amount" required>
</div>
<div class="form-group">
    <label >Section Allotted</label>
    <div class="row">
        <div class="section_allotted_body_add">
            <?php $count=0; ?>
            @foreach(\App\PapSection::where("pap_id","=",$pap->id)->get() as $papsection)
                <div>
                    <div class="col-md-6" <?php if($count > 0) echo "style='margin-top:2%'"; ?>>
                        <select class="form-control select2" name="section_id[]" data-placeholder="Select a State" onclick="" style="width: 100%;" required>
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
                            <input type="number" class="form-control" name="section_amount[]" value="{{ $papsection->amount }}" placeholder="Enter the amount to allocate">
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