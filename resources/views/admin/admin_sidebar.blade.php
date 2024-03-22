<html>
<head>
    <style>
        #dataContainer {
            position: absolute;
            background-color: #000000;
            padding: 10px;
            /*display: none;*/
        }

        .hidden {
            display: none;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Your script code goes here
            var hoverButton = document.getElementById('hover');
            var dataContainer = document.getElementById('dataContainer');

            hoverButton.addEventListener('mouseover', function () {
                dataContainer.style.display = 'block';
                console.log("mouseover");
            });

            hoverButton.addEventListener('mouseout', function () {
                dataContainer.style.display = 'none';
                console.log("mouseout");
            });
        });
    </script>
</head>
<body>
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
        $nep = $con->getNep();
        ?>
        <div class="box-body">
            @if(count($nep) > 4)
                @foreach($nep as $charge)
                    <a id="hover" href="{{ asset('ppmp/list').'/'.$charge->id }}"><ul><i class="fas fa-square"></i> {{ $charge->nep_title }}</ul></a>
                    <div id="dataContainer" class="hidden">
                        <!-- Data to be displayed on hover -->
                        <p>This is the data to be displayed on hover.</p>
                    </div>
                @endforeach
            @else
                @foreach($nep as $charge)
                    <strong><i class="fa fa-paypal margin-r-5"></i> {{ $charge->nep_title }}</strong><br>
                    Beginning Balance: <span data-toggle="tooltip" title="" class="badge bg-green" data-original-title="Beginning Balance">{{ $charge->beginning_bal }}</span><br>
                    Remaining Balance: <span data-toggle="tooltip" title="" class="badge bg-red" data-original-title="Remaining Balance">{{ $charge->remaining_bal }}</span>
                    <a href="{{ asset('ppmp/list').'/'.$charge->id }}" type="button" class="btn btn-block btn-primary btn-xs" style="margin-top:10px;">Check PPMP</a>
                @endforeach
            @endif

        </div>
        <!-- /.box-body -->
    </div>


    <!-- /.box -->
</div>
</body>
</html>