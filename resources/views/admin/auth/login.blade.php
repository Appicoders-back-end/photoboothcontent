<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('admin_assets')}}/img/favicon.html">
    <title>Photo Booth Content - Login</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('admin_assets')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('admin_assets')}}/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('admin_assets')}}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->
    <link href="{{asset('admin_assets')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('admin_assets')}}/css/style-responsive.css" rel="stylesheet"/>
</head>
<body class="login-body">
<div class="container">
    <form class="form-signin" method="post" action="{{route('admin.do_login')}}">
        {{csrf_field()}}
        <h2 class="form-signin-heading">Photo Booth Content Admin</h2>
        <div class="login-wrap">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" placeholder="Email">
            @if (isset($errors) && $errors->has('email'))
                <p class="help-block">
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </p>
            @endif

            <label for="password" class="mt-2">Password</label>
            <input id="password" type="password" name="password" class="form-control" placeholder="Password">
            @if (isset($errors) && $errors->has('password'))
                <p class="help-block">
                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                </p>
            @endif

            @if(session()->has('error'))
                <p class="text-danger m-1 text-center">
                    <strong>{{ htmlentities(Session::get('error')) }}</strong>
                </p>
            @endif
            {{--<label class="checkbox">
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>--}}
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
        </div>
    </form>

    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Forgot Password ?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Enter your e-mail address below to reset your password.</p>
                    <input type="text" name="reset_email" placeholder="Email" autocomplete="off"
                           class="form-control placeholder-no-fix">

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                    <button class="btn btn-success" type="button">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{asset('admin_assets')}}/js/jquery.js"></script>
<script src="{{asset('admin_assets')}}/js/bootstrap.bundle.min.js"></script>
</body>
</html>
