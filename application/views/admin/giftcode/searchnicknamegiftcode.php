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
                Tìm kiếm giftcode
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="error">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Giftcode</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="form-control select2 select2-hidden-accessible" id="typeDate"
                                                name="typeDate" style="width: 100%;">
                                            <option value="0">Ngày tạo</option>
                                            <option value="1">Ngày dùng</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Loại Giftcode</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <select class="form-control select2 select2-hidden-accessible" id="typeGC"
                                                name="priceGC" style="width: 100%;">
                                            <option value="0">Chưa dùng</option>
                                            <option value="1">Đã dùng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Từ ngày:</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" value="<?php echo $fromDate ?>"
                                                   class="form-control pull-right datetimepicker" id="fromDate">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Đến ngày:</label>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" value="<?php echo $toDate ?>"
                                                   class="form-control pull-right datetimepicker" id="toDate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row text-center">
                                    <input type="button" id="searchData" value="Tìm kiếm" class="btn btn-success">
                                </div
                            </div>
                        </div>

                        <div class="box-body  table-responsive no-padding">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Giftcode</td>
                                            <td>Nickname</td>
                                            <td>Mệnh giá</td>
                                            <td>Trạng thái</td>
                                            <td>Thời gian xuất</td>
                                            <td>Thời gian nhập</td>
                                            <td>Thời gian hết hạn</td>
                                            <td>Mã code</td>
                                            <td>Chiến dịch</td>
                                        </tr>
                                        </thead>
                                        <tbody id="result">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-center">
                                <ul id="pagination-data" class="pagination-sm"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<script>
    $(document).ready(function () {
        initDateTimePicker()
    })
    $('#searchData').click(function (e) {
        searchDataListGiftcode();

    });
</script>