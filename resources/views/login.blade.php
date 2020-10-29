<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PPMP | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/adminLTE/dist/css/AdminLTE.min.css') }}">
    <link rel="icon" href="{{ asset('public/img/favicon.png') }}">
    <!-- jQuery 3 -->
    <script src="{{ asset('public/adminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('public/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img src="{{ asset('public/img/doh.png') }}" style="width: 30%" />
        <br />
        <a href="#" style="font-weight:bolder;"><label style="font-size: 17pt;">PPMP v2.0</label></a>
    </div><!-- /.login-logo -->
    <form role="form" method="POST" action="">
        {{ csrf_field() }}
        <div class="login-box-body">
            @if(Session::has('ops'))
                <div class="has-feedback text-center alert-danger">
                    {{ Session::get('ops') }}
                </div><br>
            @endif
            <div class="form-group has-feedback {{ Session::has('ops') ? ' has-error' : '' }}">
                <input id="username" type="text" placeholder="Login ID" class="form-control" name="username" value="@if(Session::has('username')){{ Session::get('username') }}@endif">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ Session::has('ops') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="form-group">
                        <label style="cursor:pointer;">
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
            <strong class="center"><a href="{{ asset('public/ppmp_guide.xlsx') }}" download>PPMP GUIDE</a></strong><br>
            <!--
            <strong class="center"><a href="{{ asset('public/PPMP Fund Realignment Form.docx') }}" download>PPMP FUND REALIGNMENT</a></strong>
            -->
        </div><!-- /.login-box-body -->

    </form>

</div>

</body>
</html>
