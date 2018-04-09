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
        <a href="#"><b>Admin</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>
        <label class="control-label" for="inputError" id="validate-text"></label>

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
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo public_url() ?>/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo public_url() ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo public_url() ?>/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.md5.js" type="text/javascript"></script>
<script src="<?php echo public_url() ?>/js/common.js"></script>
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
            if ($("#param_username").val() == "") {
                errorThongBao("Bạn chưa nhập tên đăng nhập");
                return false;
            }
            if ($("#param_password").val() == "") {
                errorThongBao("Bạn chưa nhập mật khẩu");
                return false;
            }
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('login/loginODP')?>",
                data: {
                    username: $("#param_username").val(),
                    password: $.md5($("#param_password").val())
                },
                dataType: 'json',
                success: function (res) {

                    if (res == 1) {
                        var baseurl = "<?php print admin_url(); ?>";
                        window.location.href = baseurl;
                    } else if (res == 2) {
                        errorThongBao("Tài khoản không phải là admin hoặc đại lý");
                    }
                    else if (res == 3) {
                        errorThongBao("Số điện thoại chưa được đăng ký");
                    }
                    else if (res == 4) {
                        errorThongBao("AccessToken hết hạn");
                    }
                    else if (res == 5) {
                        errorThongBao("Mật khẩu không chính xác");
                    }
                    else if (res == 6) {
                        errorThongBao("Yêu cầu cập nhật số điện thoại");
                    }
                    else if (res == 7) {
                        errorThongBao("Tài khoản bị khóa đăng nhập");
                    } else if (res == 8) {
                        errorThongBao("Hệ thống gián đoạn");
                    }
                }, error: function (xhr) {
                    errorRequest(xhr.readyState, xhr.status,xhr.responseText);

                },timeout:timeOutApi
            });
        }
    });
    $("#login").click(function () {
        console.log(checkStatus("aA"));
        if ($("#param_password").val() == "" && $("#param_username").val() == "") {
            errorThongBao("Bạn chưa nhập tên đăng nhập và mật khẩu");
            return false;
        }
        if ($("#param_username").val() == "") {
            errorThongBao("Bạn chưa nhập tên đăng nhập");
            return false;
        }
        if ($("#param_password").val() == "") {
            errorThongBao("Bạn chưa nhập mật khẩu");
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('login/loginODP')?>",
            data: {
                username: $("#param_username").val(),
                password: $.md5($("#param_password").val())
            },
            dataType: 'json',
            success: function (res) {
                if (res == 1) {
                    var baseurl = "<?php print admin_url(); ?>";
                    window.location.href = baseurl;
                } else if (res == 2) {
                    errorThongBao("Tài khoản không phải là admin hoặc đại lý");
                }
                else if (res == 3) {
                    errorThongBao("Số điện thoại chưa được đăng ký");
                }
                else if (res == 4) {
                    errorThongBao("AccessToken hết hạn");
                }
                else if (res == 5) {
                    errorThongBao("Mật khẩu không chính xác");
                }
                else if (res == 6) {
                    errorThongBao("Yêu cầu cập nhật số điện thoại");
                }
                else if (res == 7) {
                    errorThongBao("Tài khoản bị khóa đăng nhập");
                } else if (res == 8) {
                    errorThongBao("Hệ thống gián đoạn");
                }
            }, error: function (xhr) {

                errorRequest(xhr.readyState, xhr.status,xhr.responseText);

            },timeout:timeOutApi
        });
    })

    $("#getodp").click(function () {
        $.ajax({
            type: "GET",
            url: "http://104.199.205.65:8081/api?c=131&nn=" + $("#nickname").val(),
            crossDomain: true,
            contentType: "application/x-www-form-urlencoded",
            async: false,
            dataType: 'json',
            processData: false,
            cache: false,
            success: function (result) {
                if (result == 0) {
                    alert("Bạn lấy mã odp thành công")
                } else if (result == 1) {
                    alert("Lỗi hệ thống")
                } else if (result == 2) {
                    alert("Nickname không tồn tại")
                } else if (result == 4) {
                    alert("Bạn chưa đăng ký bảo mật trên trang vinplay.com")
                } else if (result == 5) {
                    alert("Bạn đã lấy odp rồi, gửi tin nhắn để lấy lại")
                }

            }
        });
    });
    $("#getreodp").click(function () {
        alert("Mời bạn soạn tin nhắn VIN ODP gửi 8079 để lấy lại ODP")
    })

    $("#loginodp").click(function () {
        if ($("#odplogin").val() == "") {
            alert("Bạn chưa nhập ODP");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('login/loginODP')?>",
            data: {
                nickname: $("#nickname").val(),
                otp: $("#odplogin").val()
            },
            dataType: 'json',
            success: function (res) {
                if (res == 0) {

                    var baseurl = "<?php print admin_url(); ?>";
                    window.location.href = baseurl;
                }
                else if (res == 88) {
                    alert("Tài khoản không được phân quyền");
                }
                else if (res == 1) {
                    alert("Lỗi hệ thống")
                }
                else if (res == 2) {
                    alert("Nickname không tồn tại")
                } else if (res == 4) {
                    alert("Bạn chưa đăng ký bảo mật trên trang vinplay.com")
                }
                else if (res == 5) {
                    alert("ODP sai")
                } else if (res == 6) {
                    alert("ODP hết hạn")
                }
            }

        });
    })


</script>
