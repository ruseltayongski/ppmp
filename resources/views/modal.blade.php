<div class="modal modal-default fade" id="modal-announcement">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <b>Reminder</b>
                </h4>
            </div>
            <div class="modal-body text-green">
                <ul style="font-size: 12pt;">
                    <?php
                        $section = \App\Section::find(Auth::user()->section);
                        if(isset($section)){
                            $section = $section->description;
                        } else {
                            $section = 'NO SECTION';
                        }

                        $division = \App\Division::find(Auth::user()->division);
                        if(isset($division)){
                            $division = $division->description;
                        } else {
                            $division = 'NO DIVISION';
                        }
                    ?>
                    <li>You're section and division are <b>{{ $section }}/{{ $division }}!!</b> Please check if it was correct because it will reflect in consolidating, if it was incorrect please contact the <b>IT UNIT(410)</b></li>
                    <li>If you type an item and it was suggested in the input and it was the same description, please choose the suggested item to prevent redundancy. Thank you!<br>
                        see the example below <i class="fa fa-hand-o-down"></i>
                    </li>
                </ul>
                <img class="img-responsive" src="{{ asset('public/img/suggest_item_sample.png') }}" alt="Photo">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-block btn-success btn-lg" data-dismiss="modal"><i class="fa fa-check"></i> Confirm</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>