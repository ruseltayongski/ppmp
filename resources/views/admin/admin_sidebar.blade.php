<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ isset($information->picture) ? 'http://49.157.74.3/pis'.'/public/upload_picture/picture/'.$information->picture : 'http://49.157.74.3/pis'.'/public/upload_picture/unknown.png' }}" alt="User profile picture">
        

            <h3 class="profile-username text-center">{{ strtoupper($information->fname.' '.$information->lname) }}</h3>

            <p class="text-muted text-center">{{ $information->section }}</p>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Budget Allotment</h3>
        </div>
        <!-- /.box-header -->
        <?php
            $con = new \App\Http\Controllers\BudgetController();
            $fmis = $con->getFMIS_data();
        ?>
        <div class="box-body">
            @foreach($fmis as $charge)
                <strong><i class="fa fa-paypal margin-r-5"></i> {{ $charge->FundSourceTitle }}</strong><br>
                Beginning Balance: <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Beginning Balance">{{ $charge->Beginning_balance }}</span><br>
                Remaining Balance: <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Remaining Balance">{{ $charge->Remaining_balance }}</span>
                <a href="{{ asset('ppmp/list').'/'.$charge->id }}" type="button" class="btn btn-block btn-primary btn-xs" style="margin-top:10px;">Check PPMP</a>
            @endforeach
        </div>
        <!-- /.box-body -->
    </div>


    <!-- /.box -->
</div>