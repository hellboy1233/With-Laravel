<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>Login</title>
    <!-- Bootstrap CSS-->
    <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                            {{Config::get('constant.SITE_NAME')}}
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{route('admin.auth')}}" method="post">
                            {{@csrf_field()}}
                            <div id="maint" class="maint">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <span style="color:red">{{session('err')}}</span>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            </div>
                            <input type="hidden" value="0" name="login_value" id="login_value">
                                
                            </form>
                            
                        </div>
                        <div class="login-register" style="display:none;">
                            <form action="{{route('admin.auth')}}" method="post">
                            {{@csrf_field()}}
                            
                            <div id="mainp" class="mainp" >
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="cpassword" name="cpassword" placeholder="Password">
                                </div>
                                <span style="color:red">{{session('err')}}</span>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Register</button>
                            </div>
                            <input type="hidden" value="1" name="login_value" id="login_value">
                                
                            </form>
                            
                        </div>
                        <div style="text-align:center;">or</div>
                                <div style="text-align:center;" class="ancht" ><a href="javascript:void(0)" onclick="register_admin()" >register</a></div>
                                <div style="text-align:center; display:none;" class="anchp" ><a href="javascript:void(0)" onclick="jikkkmn" >signin</a></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    
    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->