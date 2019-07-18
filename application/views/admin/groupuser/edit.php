<!-- head -->

<div id="editGroupUser" style="display:none;">

    <section class="content-header">
        <h1>
            Cập nhật nhóm người dùng
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-body">
                    <form id="formEditGroupUser" class="form">
                        <div class="box-body">
                            <div class="form-group" style="float: right">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <a href="<?php echo admin_url('groupuser') ?>" class="btn btn-danger">
                                                        <span class="glyphicon glyphicon-remove">
                                                        </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <label for="exampleInputEmail1">Tên nhóm:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="nameEditGroup"
                                               value="" name="nameGroup" placeholder="Nhập tên nhóm người dùng">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                        <label for="exampleInputEmail1">Ghi chú:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" id="descriptionEdit"
                                               value="" name="description" placeholder="Nhập ghi chú">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                        <a style="color: blue;font-weight: 600;font-size: 18px" onclick="redirectPageRoleGroup()">
                                            Phân quyền
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                        <button class="btn bg-purple">
                                            Cập nhật
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="idGroup">
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        $("#formEditGroupUser").validate({
            errorClass: "validateError",
            ignore: [],
            debug: false,
            rules: {
                nameGroup: {
                    required: true
                },
            },
            // Specify the validation error messages
            messages: {
                nameGroup: "Vui lòng nhập tên nhóm người dùng",
            },
            submitHandler: function (form) {
                var id = $("#idGroup").val();
                editGroupUser(id)
                return false;
            }
        });

    });
</script>