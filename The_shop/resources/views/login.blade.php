<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="CSS/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>

<body>
<div class="main">
        <form action="" method="POST" class="form" id="form-2">
            @csrf
            <h3 class="heading">Đăng nhập</h3>
            <p class="desc">Để tiến hành tham gia hệ thống</p>

            <div class="spacer"></div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" rules="required|email" type="text" placeholder="VD: email@domain.com" class="form-control">
                <span class="form-message"></span>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" rule="required|min:6" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
                <small class="text-muted ml-2 password">
                    <a href="">Quên mật khẩu?</a>
                </small>
            </div>

            <button class="form-submit">Đăng nhập</button>
        </form>

    </div>

    <script src="JS/validator.js"></script>
    <script>
        Validator({
            form: '#form-2',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#fullname', 'Vui lòng nhập họ tên đầy đủ của bạn'),
                Validator.isEmail('#email'),
                Validator.minLength('#password', 6),
            ],
        });
    </script>
    
</body>

</html> -->



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Admin</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #DE6262;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

        .login-block{
            float:left;
            width:100%;
        }
        .form{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
        .login-sec{padding: 50px 30px; position:relative;}
        .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
        .login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
        .btn-login{background: #DE6262; color:#fff; font-weight:600; margin-left: 180px}
        #login .container #login-row #login-column #login-box {
            /*margin-top: 120px;*/
            max-width: 600px;
            height: 320px;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div id="login" class="login-block">
        <h1 class="text-center text-white pt-5" style="margin-top: 40px; margin-bottom: 20px">Welcome to W-Break</h1>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 login-sec">
                        <form id="login-form" class="form" action="" method="post">
                            @csrf
                            <h2 class="text-center text-info ">Login</h2>
                            <div class="form-group">
                                <label for="username" class="text-info">Username:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember_me" type="checkbox"></span></label><br> -->
                                <input type="submit" name="submit" class="btn btn-md btn-login" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>






