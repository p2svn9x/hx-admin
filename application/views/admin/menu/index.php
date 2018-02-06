<!-- head -->

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
                Danh sách menu
            </h1>
            <ol class="breadcrumb">
                <a href="<?php echo admin_url('menu/add') ?>" class="btn btn-block btn-success">Thêm mới</a>
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
                                        <th>Tên Menu</th>
                                        <th>Thứ tự</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="logaction">
                                    <?php echo $list; ?>
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

