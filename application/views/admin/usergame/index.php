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
                Danh sách tài khoản đăng ký
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="validate-text"></label>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Số điện thoại:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control"
                                               id="phone" value="<?php echo $this->input->post('phone') ?>"
                                               name="phone">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Loại tìm kiếm:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="typetimkiem" name="typetimkiem" class="form-control">
                                            <option value="0" <?php if ($this->input->post('typetimkiem') == "0") {
                                                echo "selected";
                                            } ?>>Tìm chính xác
                                            </option>
                                            <option value="1" <?php if ($this->input->post('typetimkiem') == "1") {
                                                echo "selected";
                                            } ?>>Tìm gần đúng
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Sắp xếp theo:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="fieldname" name="fieldname" class="form-control">
                                            <option value="">Chọn</option>
                                            <option value="gem" <?php if ($this->input->post('fieldname') == 'gem') {
                                                echo "selected";
                                            } ?>><?php echo $namegame ?></option>
                                            <option value="xu" <?php if ($this->input->post('fieldname') == 'xu') {
                                                echo "selected";
                                            } ?>>Xu
                                            </option>
                                            <option
                                                value="reward" <?php if ($this->input->post('fieldname') == 'reward') {
                                                echo "selected";
                                            } ?>>Reward
                                            </option>
                                            <option
                                                value="recharge" <?php if ($this->input->post('fieldname') == 'recharge') {
                                                echo "selected";
                                            } ?>>Nạp tiền
                                            </option>
                                            <option value="vip" <?php if ($this->input->post('fieldname') == 'vip') {
                                                echo "selected";
                                            } ?>>Vip
                                            </option>

                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Điều kiện:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="timkiemtheo" name="timkiemtheo" class="form-control">
                                            <option value="">Chọn</option>
                                            <option value="1" <?php if ($this->input->post('timkiemtheo') == 1) {
                                                echo "selected";
                                            } ?>>Tăng dần
                                            </option>
                                            <option value="2" <?php if ($this->input->post('timkiemtheo') == 2) {
                                                echo "selected";
                                            } ?> >Giảm dần
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="search_tran" value="Tìm kiếm" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <input type="hidden" value="<?php echo $admin_info->Status ?>" id="status">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Số điện thoại</td>
                                            <td>Số dư <?php echo $namegame ?></td>
                                            <td>Số dư xu</td>
                                            <td>Vip</td>
                                            <td>Tiền nạp</td>
                                            <td>Link ref</td>
                                            <td>Ngày tạo</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-center">
                                <ul id="pagination-demo" class="pagination-sm"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<script>

    function resultSearchTransction(stt, sdt, gem, xu, vip, recharge, ref, date,status) {

        var rs = "";

        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td><a  style = 'color:#0000FF' class='open' href='<?php echo admin_url('usergame/lockuser') ?>" + "/" + sdt + "/" + status + "'>" + sdt + "</a></td>";
        rs += "<td>" + commaSeparateNumber(gem) + "</td>";
        rs += "<td>" + commaSeparateNumber(xu) + "</td>";
        rs += "<td>" + commaSeparateNumber(vip) + "</td>";
        rs += "<td>" + commaSeparateNumber(recharge) + "</td>";
        rs += "<td>" + ref + "</td>";
        rs += "<td>" + moment.unix(date/1000).format("DD-MM-YYYY HH:mm:ss") + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        errorThongBao("Vui lòng ấn nút tìm kiếm");
    });
    $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/indexajax')?>",

            data: {

                phone: $("#phone").val(),
                fieldname: $("#fieldname").val(),
                timkiemtheo: $("#timkiemtheo").val(),
                typetimkiem: $("#typetimkiem").val(),
                pages: 1,

            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result == "") {
                    $('#pagination-demo').css("display", "none");
                    errorThongBao("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    errorThongBao("");

                    var stt = 1;
                    $.each(result, function (index, value) {
                        result += resultSearchTransction(stt, value.mobile, value.gem, value.xu, value.vip, value.recharge, value.refLink, value.createTime, value.status);
                        stt++
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('usergame/indexajax')?>",

                                    data: {
                                        phone: $("#phone").val(),
                                        fieldname: $("#fieldname").val(),
                                        timkiemtheo: $("#timkiemtheo").val(),
                                        typetimkiem: $("#typetimkiem").val(),
                                        pages: page,

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        errorThongBao("");
                                        $("#spinner").hide();
                                       var stt = 1;
                                        $.each(result, function (index, value) {
                                            result += resultSearchTransction(stt, value.mobile, value.gem, value.xu, value.vip, value.recharge, value.refLink, value.createTime, value.status);
                                            stt++
                                        });
                                        $('#logaction').html(result);
                                    }, error: function (xhr) {
                                        $('#logaction').html("");
                                        errorRequest(xhr.readyState, xhr.status, xhr.responseText);
                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });

                }
            }, error: function (xhr) {
                $('#logaction').html("");
                errorRequest(xhr.readyState, xhr.status, xhr.responseText);
            }, timeout: timeOutApi
        })

    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>