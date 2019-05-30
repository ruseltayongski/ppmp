    <div class="col-md-3">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Welcome</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label>Account Name</label>
                    <input type="text" readonly class="form-control" value="{{ strtoupper(Auth::user()->lname.', '.Auth::user()->fname) }}" />
                </div>

                <div class="form-group">
                    <label>Division</label>
                    <input type="text" readonly class="form-control" value="MSD" />
                </div>

                <div class="form-group">
                    <label>Section</label>
                    <input type="text" readonly class="form-control" value="ICTU" />
                </div>
                <div class="form-group">
                    <a href="{{ asset('logout') }}" class="btn btn-success col-xs-12"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Other Links</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#" class="btn btn-warning col-xs-12">
                            <i class="fa fa-briefcase"></i> Manage PPMP
                        </a>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <a href="#feedback" data-toggle="modal" class="btn btn-info col-xs-12">
                            <i class="fa fa-envelope-o"></i> Send Us a Feedback
                        </a>
                        <div class="clearfix"></div>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="btn btn-success col-xs-12">
                            <i class="fa fa-video-camera"></i> Video Tutorial
                        </a>
                        <div class="clearfix"></div>
                    </li>
                </ul>
                <div class="form-group" style="margin-top:10px;">

                </div>
            </div>
        </div>
    </div>




