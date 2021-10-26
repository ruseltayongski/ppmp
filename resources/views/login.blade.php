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

    @yield('css')
    <style>
        :root {
            --card-line-height: 1.2em;
            --card-padding: 2em;
            --card-radius: 0.5em;
            --color-green: #558309;
            --color-gray: #e2ebf6;
            --color-dark-gray: #c4d1e1;
            --radio-border-width: 2px;
            --radio-size: 1.4em;
        }

        body {
            background-color: #f2f8ff;
            color: #263238;
            font-family: 'Noto Sans', sans-serif;
            margin: 0;
            padding: 2em 6vw;
        }

        .grid {
            display: grid;
            grid-gap: var(--card-padding);
            margin: 0 auto;
            max-width: 60em;
            padding: 0;

        @media (min-width: 42em) {
            grid-template-columns: repeat(3, 1fr);
        }
        }

        .card {
            background-color: #fff;
            border-radius: var(--card-radius);
            position: relative;
            padding-bottom: 1.0em;
        }
        .card:hover {
             box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.15);
         }

        .radio {
            font-size: inherit;
            margin: 0;
            position: absolute;
            right: calc(var(--card-padding) + var(--radio-border-width));
            top: calc(var(--card-padding) + var(--radio-border-width));
        }

        @supports(-webkit-appearance: none) or (-moz-appearance: none) {
            .radio {
                -webkit-appearance: none;
                -moz-appearance: none;
                background: #fff;
                border: var(--radio-border-width) solid var(--color-gray);
                border-radius: 50%;
                cursor: pointer;
                height: var(--radio-size);
                outline: none;
                transition: background 0.2s ease-out,
                border-color 0.2s ease-out;
                width: var(--radio-size);
            }
        .radio:after {
             border: var(--radio-border-width) solid #fff;
             border-top: 0;
             border-left: 0;
             content: '';
             display: block;
             height: 0.75rem;
             left: 25%;
             position: absolute;
             top: 50%;
             transform:
                     rotate(45deg)
                     translate(-50%, -50%);
             width: 0.375rem;
         }

        .radio:checked {
             background: var(--color-green);
             border-color: var(--color-green);
         }
        }

        .card:hover .radio {
            border-color: var(--color-dark-gray);
        }

        .card:checked {
             border-color: var(--color-green);
         }



        .plan-details {
            border: var(--radio-border-width) solid var(--color-gray);
            border-radius: var(--card-radius);
            cursor: pointer;
            display: flex;
            flex-direction: column;
            padding: var(--card-padding);
            transition: border-color 0.2s ease-out;
        }

        .card:hover .plan-details {
            border-color: var(--color-dark-gray);
        }

        .radio:checked ~ .plan-details {
            border-color: var(--color-green);
        }

        .radio:focus ~ .plan-details {
            box-shadow: 0 0 0 2px var(--color-dark-gray);
        }

        .radio:disabled ~ .plan-details {
            color: var(--color-dark-gray);
            cursor: default;
        }

        .radio:disabled ~ .plan-details .plan-type {
            color: var(--color-dark-gray);
        }

        .card:hover .radio:disabled ~ .plan-details {
            border-color: var(--color-gray);
            box-shadow: none;
        }

        .card:hover .radio:disabled {
            border-color: var(--color-gray);
        }

        .plan-type {
            color: var(--color-green);
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1em;
        }

        .plan-cost {
            font-size: 2.5rem;
            font-weight: bold;
            padding: 0.5rem 0;
        }

        .slash {
            font-weight: normal;
        }

        .plan-cycle {
            font-size: 2rem;
            font-variant: none;
            border-bottom: none;
            cursor: inherit;
            text-decoration: none;
        }

        .hidden-visually {
            border: 0;
            clip: rect(0, 0, 0, 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            white-space: nowrap;
            width: 1px;
        }

    </style>
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
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" value="@if(Session::has('password')){{ Session::get('password') }}@endif">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
                <div class="form-group has-feedback">
                    <input id="text" type="text" class="form-control" name="yearly_ref" placeholder="Yearly Reference" value="@if(Session::has('yearly_ref')){{ Session::get('yearly_ref') }}@endif" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                </div>
                <div class="row clearfix">
                    <label class="card col-sm-6">
                        <input name="ppmp_status" class="radio" type="radio" value="original" checked>
                        <span class="hidden-visually">Pro - $50 per month, 5 team members, 500 GB per month, 5 concurrent builds</span>
                        <span class="plan-details" aria-hidden="true">
                        <span class="plan-type">Normal PPMP</span>
                        <span class="plan-cost">
                        </span></span>
                    </label>
                    <label class="card col-sm-6">
                        <input name="ppmp_status" class="radio" type="radio" value="program">
                        <span class="hidden-visually">Pro - $50 per month, 5 team members, 500 GB per month, 5 concurrent builds</span>
                        <span class="plan-details" aria-hidden="true">
                          <span class="plan-type">Program PPMP</span>
                          <span class="plan-cost">
                          </span></span>
                    </label>
                </div>

            <div class="row pt 3">
                <div class="col-xs-12">
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
