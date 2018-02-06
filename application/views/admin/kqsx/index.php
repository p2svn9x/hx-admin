<!-- head -->

<div class="content-wrapper">
    <!--    --><?php //if ($role == false): ?>
    <!--        <section class="content-header">-->
    <!--            <h1>-->
    <!--                Bạn không được phân quyền-->
    <!--            </h1>-->
    <!--        </section>-->
    <!---->
    <!--    --><?php //else: ?>
    <section class="content-header">
        <h1>
            Danh sách kqsx
        </h1>
        <ol class="breadcrumb">
            <a href="<?php echo admin_url('kqsx/add') ?>" class="btn btn-block btn-success">Thêm mới</a>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <h4 style="color: #0000ff">Cách soi cầu</h4>
                        <h5 class="text-sx">Hàng ngày sau 18h30 mình sẽ cập nhật kết quả và đưa ra dự đoán ngày hôm sau</h5>
                        <h5 class="text-sx">Các bạn phải đánh lộn vì mình ko thể dự đoán chính xác 100% , nếu trúng cả 2 thì tốt, còn trúng 1 là ngon rồi, vẫn có lãi</h5>
                        <h5 class="text-sx">Có những ngày mình sẽ đưa thêm 1 cặp số dựa vào 2 cặp số tổng hiệu mình đã sinh ra</h5>

                    </div>
                    <div class="box-body">

                        <form action="<?php echo admin_url('kqsx') ?>" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-1 col-sm-12 col-xs-12 control-label">Từ ngày:</label>

                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <div class="input-group date" id="datetimepicker1">
                                            <input type="text" class="form-control" id="fromDate" name="fromDate"
                                                   value="<?php echo $this->input->post('fromDate')?>"> <span
                                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                        </div>
                                    </div>
                                    <label class="col-md-1 col-sm-12 col-xs-12 control-label">Đến ngày:</label>

                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <div class="input-group date" id="datetimepicker2">
                                            <input type="text" class="form-control" id="toDate" name="toDate"
                                                   value="<?php echo $this->input->post('toDate') ?>"> <span
                                                class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-1 col-sm-12 col-xs-12 control-label">Trạng thái:</label>

                                    <div class="col-md-2 col-sm-12 col-xs-12">
                                        <input type="text" class="form-control" name="action"
                                               value="<?php echo $this->input->post('action') ?>">
                                    </div>
                                    <div class="col-md-1 col-sm-12 col-xs-12"><input type="submit" value="Tìm kiếm"
                                                                                     name="submit"
                                                                                     class="btn btn-primary pull-right"
                                                                                     id="search_tran"></div>
                                </div>
                            </div>
                        </form>
                        <?php $this->load->view('admin/message', $this->data); ?>
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th class="col-sm-3">Kết quả xổ số</th>
                                    <th>Kết quả tổng</th>
                                    <th>Dự đoán cầu tổng</th>
                                    <th>Dự đoán cầu hiệu</th>
                                    <th>Dự đoán cầu đơn tổng</th>
                                    <th>Dự đoán cầu đơn hiệu</th>
                                    <th>Trạng thái</th>
                                    <th>Thời gian</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody id="logaction">
                                <?php $stt = 1; ?>
                                <?php foreach ($list as $row): ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><?php echo $row->ketqua ?></td>
                                        <td><?php echo $row->ketquatong ?></td>
                                        <td><?php echo $row->tong ?></td>
                                        <td><?php echo $row->hieu ?></td>
                                        <td><?php echo $row->dontong ?></td>
                                        <td><?php echo $row->donhieu ?></td>
                                        <td><?php echo $row->status ?></td>
                                        <td><?php echo $row->creatdate ?></td>
                                        <td class="option">
                                            <a href="<?php echo admin_url('kqsx/edit/' . $row->id) ?>"
                                               title="Chỉnh sửa"
                                               class="tipS ">
                                                <img
                                                    src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                                            </a>

                                        </td>
                                    </tr>
                                    <?php $stt++; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div id="pagination" style="float: right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    --><?php //endif; ?>
</div>
<style>
    .text-sx{
        color: #008000;
        font-weight: 600;
    }
</style>
<script>

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
    $('a.verify_action').click(function () {
        if (!confirm('Bạn chắc chắn muốn xóa ?')) {
            return false;
        }
    });

    $(document).ready(function () {

        Pagging();

    });
    function Pagging() {
        var items = $("#example2 #logaction tr");
        var numItems = items.length;
        $("#num").html(numItems);
        var perPage = 20;
        // only show the first 2 (or "first per_page") items initially
        items.slice(perPage).hide();
        // now setup pagination
        $("#pagination").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function (pageNumber) { // this is where the magic happens
                // someone changed page, lets hide/show trs appropriately
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide() // first hide everything, then show for the new page
                    .slice(showFrom, showTo).show();
            }
        });
    }
</script>

