<div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ isset($information->picture) ? 'http://49.157.74.3/pis'.'/public/upload_picture/picture/'.$information->picture : 'http://49.157.74.3/pis'.'/public/upload_picture/unknown.png' }}" alt="User profile picture">

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

    <?php
    $yearly_reference = Session::get('yearly_reference');

    $query1 = DB::table('nep_allocation')
//        ->select('nep_id', 'section_id', 'utilized')
        ->where('section_id', '=', Auth::user()->section)
        ->where('yearly_ref_id',"=", $yearly_reference)
        ->where("level","=","admin")
        ->get();

    //must replace with the actual saa
    $query2 = DB::table('saa')
//        ->select('saa_no', 'section_id',)
        ->where('section_id', '=', Auth::user()->section)
        ->where('yearly_ref_id',"=", $yearly_reference);
        //->where("status","=","admin");

//    $result = $query2->union($query1)->get();

    ?>
    @foreach($query1 as $title)
        {{--<div class="col-md-3">--}}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Budget Allotment</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <strong><i class="fa fa-paypal margin-r-5"></i>
                        <?php
                                $desc = \App\Nep:: where('id',"=",$title->nep_id)
                                    ->first();
                                if($desc){
                                    echo $desc->nep_title;
                                }else{
                                    echo $title->saa_no;
                                }
                        ?>
                    </strong><br>

                    <form id="multiple_charge" action='{{ asset('user/home').'/'.Auth::user()->section.$title->nep_id }}' method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="charge" value="{{ $title->nep_id }}">
                        Beginning Balance: <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Beginning Balance">{{ $title->beginning_bal }}</span><br>
                        Remaining Balance: <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Remaining Balance"> Not yet calculated </span>
                        {{--Section : <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Remaining Balance">{{$section_id = 28}}</span>--}}
                        <button id="save" type="submit" class="btn btn-block btn-primary btn-xs" style="margin-top:10px;">Check PPMP</button>
                        <button id="btnsave" type="submit" class="btn btn-block btn-danger btn-xs" name="save" style="margin-top:10px;">Realign</button>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        {{--</div>--}}
    @endforeach
    <!-- /.box -->
</div>