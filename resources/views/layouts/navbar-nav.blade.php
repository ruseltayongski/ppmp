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
            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>

            @if(!isset($charge_menu))
                <li><a href="{{ url('ppmp/list') }}"><i class="fa fa-briefcase"></i> Manage PPMP</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bank"></i> Charge To<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('ppmp_manage') }}"><i class="fa fa-plus"></i> Add new</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('expense/list') }}"><i class="fa fa-folder-open"></i> Expense</a></li>
                <li><a href="{{ url('excel/import') }}"><i class="fa fa-file-excel-o"></i> Excel</a></li>
            @endif
            <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#trackDoc" data-toggle="modal"><i class="fa fa-search"></i> Search</a></li>
        </ul>
    </div><!--/.nav-collapse -->
</div>