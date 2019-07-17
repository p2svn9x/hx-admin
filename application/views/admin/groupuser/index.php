<!-- head -->

<!-- head -->

<div class="content-wrapper">
    <div id="groupUser">
        <?php if ($role == false): ?>
            <section class="content-header">
                <h1>
                    Bạn không được phân quyền
                </h1>
            </section>

        <?php else: ?>

            <section class="content-header">
                <h1>
                    Danh sách nhóm người dùng
                </h1>
                <ol class="breadcrumb">
                    <a onclick="showPageAddGroupUser()" class="btn btn-block bg-purple">Thêm mới</a>
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
                                            <th class="text-center">STT</th>
                                            <th>Tên Nhóm</th>
                                            <th>Ghi chú</th>
                                            <th class="text-center">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody id="result">

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

    <?php $this->load->view('admin/groupuser/add') ?>
</div>

<script>
    $('a.verify_action').click(function () {
        if (!confirm('Bạn chắc chắn muốn xóa ?')) {
            return false;
        }
    });

    $(function () {
       getListUser()

    });
</script>

