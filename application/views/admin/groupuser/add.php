<!-- head -->

<div id="addGroupUser" style="display:none;">

    <section class="content-header">
        <h1>
            Thêm mới nhóm người dùng
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-body">
                    <form id="formAddGroupUser" class="form">
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
                                        <input type="text" class="form-control" id="nameGroup"
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
                                        <input type="text" class="form-control" id="description"
                                               value="" name="description" placeholder="Nhập ghi chú">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-md-6 col-sm-9 col-xs-12">
                                        <button class="btn bg-purple">
                                            Thêm mới
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        $("#formAddGroupUser").validate({
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
                addGroupUser()
                return false;
            }
        });

    });
</script>