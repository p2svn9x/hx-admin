<!-- head -->
<div class="content-wrapper">
    <?php if ($admin_info->Status == "A"): ?>
        <section class="content-header">
            <h1>
                Cập nhật thông tin quản trị viên
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
                                            <label for="exampleInputEmail1">Username:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control" value="<?php echo $info->UserName ?>" readonly id="param_username" name="username">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('username') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Nickname:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="text" class="form-control" id="param_name" value="<?php echo $info->FullName ?>" readonly name="name">
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('name') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1">Nickname:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <select for="inputEmail3" class="form-control" id="selectchucnang" name="typeaccount">
                                                <option value="W" <?php if($info->Status == "W"){echo "selected";} ?>>Vận hành</option>
                                                <option value="LM" <?php if($info->Status == "LM"){echo "selected";} ?>>Leader Maketing</option>
                                                <option value="M" <?php if($info->Status == "M"){echo "selected";} ?>>Maketing</option>
                                                <option value="S" <?php if($info->Status == "S"){echo "selected";} ?>>Chăm sóc khách hàng</option>
                                                <option value="L" <?php if($info->Status == "L"){echo "selected";} ?>>Lãnh đạo</option>
                                                <option value="D" <?php if($info->Status == "D"){echo "selected";} ?>>Chăm sóc đại lý</option>
                                                <option value="Q" <?php if($info->Status == "Q"){echo "selected";} ?>>Quản lý chung</option>
                                                <option value="K" <?php if($info->Status == "K"){echo "selected";} ?>>Kế toán</option>
                                                <option value="C" <?php if($info->Status == "C"){echo "selected";} ?>>Developer</option>
                                                <option value="A" <?php if($info->Status == "A"){echo "selected";} ?>>Admin</option>

                                            </select>
                                        </div>
                                        <div class="col-xs-3 col-md-6">
                                            <label style="color: red"><?php echo form_error('typeaccount') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                            <label for="exampleInputEmail1" class="">Phân quyền:</label>
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <a href="<?php echo admin_url('admin/role/' . $info->ID) ?>" title="Phân quyền" style="color: #0000ff">
                                                Phân quyền
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-3 col-md-2">
                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <input type="submit" class="btn bg-purple" value="Cập nhật">
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
