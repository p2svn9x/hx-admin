<div class="content-wrapper">
    <?php if ($admin_info->Status == "A"): ?>
        <section class="content-header">
            <h1>
                Thêm mới menu
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-body">
                        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Tên menu:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control" id="param_name"
                                                   value="<?php echo set_value('name') ?>" name="name">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('name') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Số thứ tự:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control"
                                                   value="<?php echo set_value('param') ?>" id="param_param"
                                                   name="param">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('param') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Đường dẫn:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control"
                                                   value="<?php echo set_value('link') ?>" id="param_link" name="link">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('link') ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Danh mục cha:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <?php echo $list; ?>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Tài khoản:</label>
                                        </div>
                                        <div class="col-xs-4 col-md-2">
                                            <input type="checkbox" id="tkthuong" name="isThuong" value="0"> Tài khoản
                                            thường
                                            <input type="hidden" name="displaytkthuong" id="displaytkthuong" value="">
                                        </div>
                                        <div class="col-xs-4 col-md-2">
                                            <input type="checkbox" id="tksuper" name="isSuper" value="0"> Super Admin
                                            <input type="hidden" name="displaytksuper" id="displaytksuper" value="">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <?php echo form_error('isSuper') ?>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Hiển thị:</label>
                                        </div>
                                        <div class="col-xs-3 col-md-2">
                                            <input type="checkbox" id="status" name="Status" checked="checked">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="submit" class="btn btn-success" value="Thêm mới">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
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
    $(document).ready(function () {
        $("#displaytkthuong").val($('#tkthuong').val());
        $("#displaytksuper").val($('#tksuper').val());
    });
    $('#tkthuong').on('change', function () {
        this.value = this.checked ? 1 : 0;
        $("#displaytkthuong").val(this.value);
    }).change();
    $('#tksuper').on('change', function () {
        this.value = this.checked ? 1 : 0;
        $("#displaytksuper").val(this.value);
    }).change();
</script>