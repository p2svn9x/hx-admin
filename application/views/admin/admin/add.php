<!-- head -->
<div class="content-wrapper">
    <?php if ($admin_info->Status == "A"): ?>
        <section class="content-header">
            <h1>
                Thêm mới quản trị viên
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-body">

                        <!-- /.box-header -->
                        <!-- form start -->
                        <label class="control-label" for="inputError" id="errorstatus" style="color: red"></label>

                        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Nickname</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control" id="param_name"
                                                   placeholder="Nhập Nickname">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <input type="button" value="Tìm kiếm" name="submit" class="btn btn-success"
                                                   id="searchnickname">
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->


                        </form>

                        <div id="info_user" style="display: none">
                            <input type="hidden" name="username" id="username"
                                   value="">
                            <input type="hidden" name="nickname" id="nickname"
                                   value="">
                            <input type="hidden" name="iduser" id="iduser"
                                   value="">

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="inputEmail3" class="control-label">Tên đăng nhập:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <label for="inputEmail3" class="control-label"
                                                   style="color: #0000ff"
                                                   id="lblusername"></label>


                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2"><label class="control-label">Bộ phận:</label></div>


                                        <div class="col-xs-6 col-md-4">
                                            <select for="inputEmail3" id="selectchucnang" class="form-control">
                                                <option value="W">Vận hành</option>
                                                <option value="LM">Leader Maketing</option>
                                                <option value="M">Maketing</option>
                                                <option value="S">Chăm sóc khách hàng</option>
                                                <option value="L">Lãnh đạo</option>
                                                <option value="D">Chăm sóc đại lý</option>
                                                <option value="Q">Quản lý chung</option>
                                                <option value="K">Kế toán</option>
                                                <option value="C">Developer</option>
                                                <option value="A">Admin</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2"><label for="inputEmail3">Phân quyền:</label></div>

                                        <div class="col-xs-6 col-md-4">
                                            <select for="inputEmail3" id="selectrole" class="form-control">
                                                <option value="">Chọn</option>
                                                <?php foreach ($listrole as $row): ?>
                                                    <option
                                                        value="<?php echo $row->Id ?>"><?php echo $row->Name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2"><label for="inputEmail3"
                                                                     class="control-label">Setadmin:</label></div>


                                        <div class="col-xs-6 col-md-4">
                                            <input type="button" value="Thêm mới" class="btn btn-success" id="setadmin">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="content-header">
            <h1>
                Bạn không được phân quyền
            </h1>
        </section>
    <?php endif ?>
</div>
<script>
    $("#searchnickname").click(function () {
        if ($("#param_name").val() == "") {
            $("#info_user").css("display", "none");
            $("#errorstatus").html("Bạn chưa nhập nick name");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('admin/getinfoajax')?>",
            data: {
                nickname: $("#param_name").val()
            },
            dataType: 'json',
            success: function (result) {
                if (result.user != null) {
                    $("#info_user").css("display", "block");
                    $("#errorstatus").html("");
                    $("#lblusername").html(result.user.username);
                    $("#lblnickname").html(result.user.nickname);
                    $("#username").val(result.user.username);
                    $("#nickname").val(result.user.nickname);
                    $("#iduser").val(result.user.id);
                    $("#setadmin").val("Thêm mới");
                } else if (result.user == null) {
                    $("#errorstatus").html("Nick name đã được đăng ký hoặc không tồn tại");
                    $("#info_user").css("display", "none")
                }
            }
        })

    });

    $("#setadmin").click(function () {
        if ($("#selectrole").val() == "") {
            $("#errorstatus").html("Bạn chưa chọn nhóm phân quyền");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('admin/addadminajax')?>",
            dataType: 'json',
            data: {
                nickname: $("#nickname").val()
            },
            success: function (res) {
                if (res.errorCode == 0) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo admin_url(); ?>" + "/admin/addadmin",
                        dataType: 'json',
                        data: {
                            username: $("#username").val(),
                            nickname: $("#nickname").val(),
                            iduser: $("#iduser").val(),
                            role: $("#selectrole").val(),
                            chucnang: $("#selectchucnang").val()
                        },
                        success: function (response) {
                            if (response == 2) {
                                var baseurl = "<?php echo admin_url('admin') ?>";
                                window.location.href = baseurl;
                            } else if (response == 0) {
                                $("#errorstatus").html("Tài khoản đã tồn tại");
                            }

                        }
                    });

                } else if (res.errorCode == 1001) {
                    $("#errorstatus").html("Bạn thêm không thành công");
                }
            }
        });

    });
</script>