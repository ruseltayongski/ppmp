<div><div class="col-md-6" style="margin-top: 2%"><select class="js-example-basic-single" name="section_id[]" data-placeholder="Select a State" onclick="" style="width: 100%;" required>@foreach(\App\Section::get() as $row)<option value="{{ $row->id }}">{{ $row->description }}</option>@endforeach</select></div><div class="col-md-6" style="margin-top: 2%"><div class="input-group"><input type="number" class="form-control" name="section_amt[]" placeholder="Enter the amount to allocate" required><span class="input-group-addon" style="cursor: pointer;color: #ff546c"><i class="fa fa-remove" onclick="AllocatedRemove($(this))"></i></span></div></div></div>