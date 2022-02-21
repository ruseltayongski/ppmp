<style>
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: -1px;
        -webkit-border-radius: 0 6px 6px 6px;
        -moz-border-radius: 0 6px 6px;
        border-radius: 0 6px 6px 6px;
    }

    .dropdown-submenu:hover>.dropdown-menu {
        display: block;
    }

    .dropdown-submenu>a:after {
        display: block;
        content: " ";
        float: right;
        width: 0;
        height: 0;
        border-color: transparent;
        border-style: solid;
        border-width: 5px 0 5px 5px;
        border-left-color: #ccc;
        margin-top: 5px;
        margin-right: -10px;
    }

    .dropdown-submenu:hover>a:after {
        border-left-color: #fff;
    }

    .dropdown-submenu.pull-left {
        float: none;
    }

    .dropdown-submenu.pull-left>.dropdown-menu {
        left: -100%;
        margin-left: 10px;
        -webkit-border-radius: 6px 0 6px 6px;
        -moz-border-radius: 6px 0 6px 6px;
        border-radius: 6px 0 6px 6px;
    }

</style>
<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <?php
                $section = Session::get('section_id');
            ?>
            @if(Session::get('admin') && $section)
                    <li style="font-family: verdana;"><a href="{{ asset('user/home/{section}') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                @elseif (Auth::user()->user_priv)
                    <li style="font-family: Verdana;"><a href="{{ asset('admin/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                @else
                    <li style="font-family: Verdana;"><a href="{{ asset('user/home/{section}') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            @endif
            <!--
            <li><a href="{{ asset('division/check1') }}"><i class="fa fa-dashboard"></i> LHSD CHECK</a></li>
            -->
            @if(Auth::user()->division == "6")
            <li style="font-family: Verdana;"><a href="{{ asset('public/ppmp_msd_2021.pdf') }}" download> <i class="fa fa-dashboard"></i> PPMP MSD 2021</a></li>
            @endif
            {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-dashboard"></i> Realignment</a>--}}
                {{--<ul class="dropdown-menu">--}}
                    {{--<li><a href="{{ asset('user/realignment') }}"><i class="fa fa-dashboard"></i> WFP </a></li>--}}
                    {{--<li><a href="{{ asset('user/realignment_view') }}"><i class="fa fa-dashboard"></i> ALL WFP REALIGNMENT </a></li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <!--
            <li><a href="{{ url('ppmp/list/search') }}"><i class="fa fa-database"></i> PPMP List</a></li>
            -->

            @if(Session::get('charge_menu'))
                @if(Auth::user()->user_priv)
                <li class="dropdown">
                    <a style="font-family: Verdana;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-dashboard"></i> PPMP CHECK </a>
                    <ul class="dropdown-menu">
                        <!-- PER DIVISION (ORIGINAL) -->
                        <li style="font-family: Verdana;"><a href="{{ asset('division/check') }}"><i class="fa fa-dashboard"></i> Division Check</a></li>
                        <!-- PER PROGRAM  -->
                        <li style="font-family: Verdana;"><a href="{{ asset('program/blade') }}"><i class="fa fa-dashboard"></i> Program Blade </a></li>
                    </ul>
                </li>
                <!-- LOG IN AS  -->
                <li><a href="{{ url('admin/login') }}"><i class="fa fa-dashboard"></i> Login As</a></li>
                <!-- EDITED FOR PROGRAMS  -->
                <li><a href="{{ url('program/home') }}"><i class="fa fa-dashboard"></i> Programs</a></li>
                <!--
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bank"></i> Charge To<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('ppmp_manage') }}"><i class="fa fa-plus"></i> Add new</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('expense/list') }}"><i class="fa fa-rub"></i> Expense</a></li>
                -->

                {{--<li><a href="{{ url('excel/import') }}"><i class="fa fa-file-excel-o"></i> Excel</a></li>--}}
                {{--<li><a href="{{ url('pap/home') }}"><i class="fa fa-file-excel-o"></i> PAP</a></li>--}}
                @endif
            @endif
                <li class="dropdown">
                    <a style="font-family: Verdana;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-dashboard"></i> Settings</a>
                    <ul class="dropdown-menu">
                        @if(Auth::user()->user_priv && !$section)
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                            @elseif(Session::get('admin') && $section)
                                <?php
                                $check_login_as = Session::get('auth');
                                ?>
                                <li><a href="{{ url('admin/account/return') }}"><i class="fa fa-user-secret"></i> <?php echo $check_login_as->user_priv == 1 ? 'Back as Admin' : 'Back as Agent'; ?></a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                            @else
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        @endif
                    </ul>
                </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <!--
            <li class="active"><a href="#trackDoc" data-toggle="modal"><i class="fa fa-commenting-o"></i> Feedback</a></li>
            -->
        </ul>
    </div><!--/.nav-collapse -->
</div>
