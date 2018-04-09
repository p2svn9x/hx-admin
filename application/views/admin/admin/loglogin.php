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
            Log login admin
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">
    <?php if (empty($list)): ?>
        <label id="resultsearch" style="color: red;"><?php echo "Không tìm thấy kết quả"; ?></label>
    <?php endif; ?>


    <div class="box-body">
        <form class="list_filter form" action="<?php echo admin_url('actionadmin/loglogin') ?>" method="post">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <label for="exampleInputEmail1">Từ ngày:</label>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' value="<?php echo $this->input->post('toDate') ?>" class="form-control"
                                   id="toDate" name="toDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <label for="exampleInputEmail1">Đến ngày:</label>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">

                        <div class='input-group date' id='datetimepicker2'>
                            <input type='text' value="<?php echo $this->input->post('fromDate') ?>" class="form-control"
                                   id="fromDate" name="fromDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <label for="exampleInputEmail1">Username:</label>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtusername" value="<?php echo $this->input->post('username') ?>" name="username">
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <label for="exampleInputEmail1">Nickname:</label>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtnickname" value="<?php echo $this->input->post('nickname') ?>" name="nickname">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <label for="exampleInputEmail1">Ip:</label>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <input type="text" class="form-control"
                               id="txtip" value="<?php echo $this->input->post('txtip') ?>" name="txtip">
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <label for="exampleInputEmail1">Trạng thái:</label>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <select id="ststatus" name="ststatus" class="form-control">

                            <option value="0" <?php if ($this->input->post('ststatus') == "0") {
                                echo "selected";
                            } ?>>Thành công
                            </option>
                            <option value="1" <?php if ($this->input->post('ststatus') == "1") {
                                echo "selected";
                            } ?>>Thất bại
                            </option>
                        </select>
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <input type="submit" id="search_tran" value="Tìm kiếm" class="btn bg-purple">
                    </div>
                </div>
            </div>

        </form>
    </div>

    <div class="box-body  table-responsive no-padding">
        <?php $this->load->view('admin/message', $this->data); ?>
        <?php $this->load->view('admin/error', $this->data); ?>
        <div class="row">
            <div class="col-sm-12">
                <table id="checkAll" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Username</td>
                        <td>Nickname</td>
                        <td>Ip</td>
                        <td>Thiết bị</td>
                        <td>Mô tả</td>
                        <td>Trạng thái</td>
                        <td>Tool</td>
                        <td>Ngày tạo</td>
                    </tr>
                    </thead>
                    <tbody id="logdongbang">
                    <?php $stt = 1; ?>
                    <?php foreach ($list as $row): ?>
                        <tr class="row_<?php echo $row->id ?>">
                            <td><?php echo $stt ?></td>
                            <td>
                                <?php echo $row->username ?>
                            </td>
                            <td style="word-break: break-all;">
                                <?php echo $row->nickname ?>
                            </td>
                            <td>
                                <?php echo $row->ip ?>
                            </td>
                            <td>
                                <?php echo $row->agent ?>
                            </td>
                            <td>
                                <?php echo $row->action ?>
                            </td>
                            <td>
                                <?php if ($row->status == 0): ?>
                                    <?php echo "Thành công" ?>
                                <?php elseif ($row->status == 1): ?>
                                    <?php echo "Thất bại" ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo $row->tool ?>
                            </td>
                            <td>
                                <?php echo $row->createdate ?>
                            </td>
                        </tr>
                        <?php $stt++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>
        <div class="pagination">
            <div id="pagination"></div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </section>
<?php endif; ?>
</div>


<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });
    $(document).ready(function () {

        Pagging();

    });
    function Pagging() {
        var items = $("#checkAll #logdongbang tr");
        var numItems = items.length;
        console.log(numItems);
        $("#num").html(numItems);
        var perPage = 50;
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