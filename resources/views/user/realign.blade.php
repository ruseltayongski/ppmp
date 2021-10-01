
<form action="" method="POST" id="create">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $user->id }}" />
    <div class="modal-body">
        <table class="table table-hover table-form table-striped">
            <tr>
                <td class="col-sm-3"><label>Designation</label></td>
                <td class="col-sm-1">:</td>
                <td class="col-sm-8">
                    <select name="designation" required id="select_dis" class="chosen-select form-control" data-link="{{ asset('/get/section') }}">
                        <option value="" selected disabled>Select Designation</option>
                        @foreach($designation as $a)
                            <option {{ ($user->designation == $a->id ? 'selected' : '') }} value="{{ $a->id }}">{{ $a->description }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="col-sm-3"><label>Division</label></td>
                <td class="col-sm-1">:</td>
                <td class="col-sm-8">
                    <select name="division" required id="select_div" onchange="loadDivision(this);" class="chosen-select form-control" data-link="{{ asset('/get/section') }}">
                        <option value="" selected disabled>Select division</option>
                        @foreach($division as $d)
                            <option {{ ($user->division == $d->id ? 'selected' : '') }} value="{{ $d->id }}">{{ $d->description }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

        </table>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        <button type="submit" class="btn btn-success user_add" id="update_user" name="update" value="update"><i class="fa fa-send"></i>Update</button>
    </div>
</form>
<script>
    $('.chosen-select').chosen();
</script>
