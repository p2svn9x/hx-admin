<!-- head -->

<!-- head -->

<div class="content-wrapper">
    <?php if ($role == false): ?>
        <section class="content-header">
            <h1>
                Bạn không được phân quyền
            </h1>
        </section>

    <?php else: ?>
        <?php if ($list != null) : ?>
            <section class="content-header">
                <h1>
                    Danh sách nhóm người dùng
                </h1>
                <ol class="breadcrumb">
                    <a href="<?php echo admin_url('groupuser/add') ?>" class="btn btn-block bg-purple">Thêm mới</a>
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
                                            <th>Tên Nhóm</th>
                                            <th>Ghi chú</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction">
                                        <?php $stt = 1; ?>
                                        <?php foreach ($list as $row): ?>
                                            <tr>
                                                <td><?php echo $stt ?></td>
                                                <td><?php echo $row->Name ?></td>
                                                <td><?php echo $row->Description ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo admin_url('groupuser/edit/' . $row->Id) ?>"
                                                       title="Chỉnh sửa" class="btn btn-success">
                                                       <span class="glyphicon glyphicon-edit">
                                                        </span>
                                                    </a>
                                                    <a href="<?php echo admin_url('groupuser/delete/' . $row->Id) ?>"
                                                       title="Xóa"
                                                       class="btn btn-danger verify_action">
                                                        <span class="glyphicon glyphicon-remove">
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $stt++; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif ?>
        <?php if ($list == null): ?>
            <section class="content-header">
                <h1>
                    Bạn không được phân quyền
                </h1>
            </section>
        <?php endif ?>
    <?php endif; ?>
</div>

<script>
    $('a.verify_action').click(function () {
        if (!confirm('Bạn chắc chắn muốn xóa ?')) {
            return false;
        }
    });
</script>

