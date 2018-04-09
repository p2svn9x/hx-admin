<div class="content-wrapper">
    <?php if ($role == false): ?>
        <section class="content-header">
            <h1>
                Bạn không được phân quyền
            </h1>
        </section>

    <?php else: ?>
        <section class="content-header">
            <h1>
                Quản lý người dùng
            </h1>
            <ol class="breadcrumb">
                <a href="<?php echo admin_url('admin/add') ?>" class="btn btn-block bg-purple">Thêm mới</a>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Username</th>
                                        <th>Nickname</th>
                                        <th>Nhóm</th>
                                        <th>Hành động</th>

                                    </tr>
                                    </thead>
                                    <tbody id="logaction">
                                    <?php $i = 1; ?>
                                    <?php foreach ($list as $row): ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>
                                                <?php echo $row->UserName ?>
                                            </td>
                                            <td>
                                                <?php echo $row->FullName ?>
                                            </td>
                                            <td>
                                                <?php echo $row->Name ?>
                                            </td>
                                            <td class="option">
                                                <a href="<?php echo admin_url('admin/edit/' . $row->ID) ?>"
                                                   title="Chỉnh sửa"
                                                   class="tipS ">
                                                    <img
                                                        src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                                                </a>
                                                <a href="<?php echo admin_url('admin/delete/' . $row->ID . '/' . $row->FullName) ?>"
                                                   title="Xóa"
                                                   class="tipS verify_action">
                                                    <img
                                                        src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


</div>
<script>
    $('a.verify_action').click(function () {
        if (!confirm('Bạn chắc chắn muốn xóa ?')) {
            return false;
        }
    });
</script>