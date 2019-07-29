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
            <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            @if(Session::get('charge_menu'))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> PPMP<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu">
                            <a href="#" data-toggle="dropdown"><i class="fa fa-database"></i> Manage</a>
                            <ul class="dropdown-menu">
                                @foreach(\App\Expense::get() as $expense)
                                    <li>
                                        <a href="{{ asset('ppmp/list').'/approve'.'/'.$expense->id }}"><i class="fa fa-sticky-note"></i> {{ $expense->description }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('FPDF/print/report.php') }}" target="_blank"><i class="fa fa-bar-chart"></i> Report</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bank"></i> Charge To<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('ppmp_manage') }}"><i class="fa fa-plus"></i> Add new</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('expense/list') }}"><i class="fa fa-rub"></i> Expense</a></li>
                <li><a href="{{ url('excel/import') }}"><i class="fa fa-file-excel-o"></i> Excel</a></li>
            @endif
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#trackDoc" data-toggle="modal"><i class="fa fa-commenting-o"></i> Feedback</a></li>
        </ul>
    </div><!--/.nav-collapse -->
</div>