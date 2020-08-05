<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>Matrix Admin</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/matrix-login.css')}}" />
    <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" action="{{route('login')}}" method="post">
        @csrf
        <div class="control-group normal_text"> <h3><img src="{{asset('backend/img/logo.png')}}" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="email" placeholder="email" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-right"><button type="submit"  class="btn btn-success"> Login</button></span>
        </div>
    </form>
</div>

<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<script src="{{asset('backend/js/matrix.login.js')}}"></script>
</body>

</html>
