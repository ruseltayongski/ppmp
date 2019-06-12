<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ str_replace('ppmp','pis',asset('')).'public/upload_picture/picture/'.$information->picture }}" onerror="this.onerror=null;this.src='{{ str_replace('ppmp','pis',asset('')).'public/upload_picture/picture/uknown.png' }}' " alt="User profile picture">

            <h3 class="profile-username text-center">{{ strtoupper($information->fname.' '.$information->lname) }}</h3>

            <p class="text-muted text-center">
                <?php
                    $section = \App\Section::find(Auth::user()->section);
                    if(isset($section)){
                        echo $section->description;
                    } else {
                        echo 'NO SECTION';
                    }
                ?>
            </p>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Budget Allotment</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @foreach(Session::get('charge_to') as $charge)
            <strong><i class="fa fa-paypal margin-r-5"></i> {{ $charge->description }}</strong><br>
            Beginning Balance: <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Beginning Balance">{{ $charge->beginning_balance }}</span>
            Remaining Balance: <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Remaining Balance">{{ $charge->remaining_balance }}</span>
            <a href="{{ asset('ppmp/list').'/'.$charge->id }}" type="button" class="btn btn-block btn-primary btn-xs" style="margin-top:10px;">Check PPMP</a>
            @endforeach
        </div>
        <!-- /.box-body -->
    </div>


    <!-- /.box -->
</div>