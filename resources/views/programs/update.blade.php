<input type="hidden" value="{{ $program->id }}" name="program_id">

<div class="form-group">
    <label >Description</label>
    <input type="text" class="form-control" value="{{ $program->description }}" name="description" required>
</div>

<div class="form-group">
    <label >Acronym</label>
    <input type="text" class="form-control" value="{{ $program->acronym }}" name="acronym" required>
</div>

<div class="form-group">
    <div class="row">
        <div class="section_allotted_body_add">
            <div class="col-md-6">
                <label >Division</label>
                <input type="hidden" name="division_id" value="{{ $div_id }}">
                <input type="text" class="form-control" value="{{ $div_desc }}" readonly="true">
            </div>
            <div class="col-md-6">
                <label >Section</label>
                <select class="form-control" name="section_id" style="width: 100%;" required>
                    @foreach($sections as $sec)
                        @if($sec->id == $program->section_id)
                            <option value="{{ $sec->id }}" selected>{{ $sec->description }}</option>
                        @else
                            <option value="{{ $sec->id }}">{{ $sec->description }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label >Budget Allotment</label>
    <input type="number" class="form-control" name="budget" min="0" value="{{ $program->budget_allotment }}">
</div>

<div class="form-group">
    <label >Fund Source</label>
    <input type="text" class="form-control" value="{{ $program->fund_source }}" name="fund_source">
</div>

<div class="form-group">
    <label >Expense ID</label>
    <input type="text" class="form-control" value="{{ $program->expense_id }}" name="expense_id">
</div>
