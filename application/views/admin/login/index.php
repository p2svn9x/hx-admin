<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HenXui Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo public_url() ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo public_url() ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo public_url() ?>/plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="<?php echo public_url() ?>/dist/css/normalize.min.css">
    <link href="<?php echo public_url() ?>/dist/css/style-loader.css" rel="stylesheet"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<input type="hidden" id="username">
<input type="hidden" id="nickname">
<input type="hidden" id="iduser">

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin Boa.Club</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="loader" style="display: none"></div>
        <div class="error"></div>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input class="form-control" placeholder="Tên đăng nhập" type="text" id="param_username" name="username">

            </div>
            <div class="form-group has-feedback">
                <input type="password" id="param_password" name="password" class="form-control" placeholder="Mật khẩu">

            </div>
            <div class="row">
                <div class="col-xs-7">
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                    <input type="button" class="btn btn-block bg-purple" value="Đăng nhập" id="login">
                </div>
                <!-- /.col -->
            </div>
        </form>


    </div>

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script>var baseUrl= "<?php echo admin_url()?>"</script>
<script src="<?php echo public_url() ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo public_url() ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo public_url() ?>/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.md5.js" type="text/javascript"></script>
<script src="<?php echo public_url() ?>/js/common.js"></script>
<script src="<?php echo public_url() ?>/js/callapi.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
<script>


    $('#param_password').keyup(function (e) {
        var enterKey = 13;

        if (e.which == enterKey) {
            if ($("#param_password").val() == "" && $("#param_username").val() == "") {

                errorThongBao("Bạn chưa nhập tên đăng nhập và mật khẩu");
                return false;
            }
            else if ($("#param_username").val() == "") {
                errorThongBao("Bạn chưa nhập tên đăng nhập");
                return false;
            }
            else if ($("#param_password").val() == "") {
                errorThongBao("Bạn chưa nhập mật khẩu");
                return false;
            }else{
                loginAdmin();
            }

        }
    });
    $("#login").click(function () {
        if ($("#param_password").val() == "" && $("#param_username").val() == "") {
            errorThongBao("Bạn chưa nhập tên đăng nhập và mật khẩu");
            $("#param_username").focus();
        }
        else if ($("#param_username").val() == "") {
            errorThongBao("Bạn chưa nhập tên đăng nhập");
            $("#param_username").focus();
        }
        else if ($("#param_password").val() == "") {
            errorThongBao("Bạn chưa nhập mật khẩu");
            $("#param_password").focus();
        }else {
            loginAdmin();
        }
    })




</script>
