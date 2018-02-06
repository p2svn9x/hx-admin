<div class="content-wrapper">
    <?php if ($admin_info->Status == "A"): ?>
        <section class="content-header">
            <h1>
                Thêm mới kết quả sổ số
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
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="exampleInputEmail1">Kết quả:</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="param_kq"
                                                   value="<?php echo set_value('param_kq') ?>" name="param_kq"
                                                   placeholder="Bạn nhập đủ 27 giải cách nhau bởi dấu ,">
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label style="color: red"><?php echo form_error('param_kq') ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="exampleInputEmail1">Tổng:</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control"
                                                   value="<?php echo set_value('param_tong') ?>" id="param_tong"
                                                   name="param_tong" readonly>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label style="color: red"><?php echo form_error('param_tong') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="exampleInputEmail1">Dự đoán cầu tổng:</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control"
                                                   value="<?php echo set_value('param_ddtong') ?>" id="param_ddtong"
                                                   name="param_ddtong" readonly>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label style="color: red"><?php echo form_error('param_ddtong') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="exampleInputEmail1">Dự đoán cầu hiệu:</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control"
                                                   value="<?php echo set_value('param_ddhieu') ?>" id="param_ddhieu"
                                                   name="param_ddhieu" readonly>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label style="color: red"><?php echo form_error('param_ddhieu') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="exampleInputEmail1">Dự đoán cầu đơn tổng:</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control"
                                                   value="<?php echo set_value('param_dontong') ?>" id="param_dontong"
                                                   name="param_dontong" readonly>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label style="color: red"><?php echo form_error('param_dontong') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="exampleInputEmail1">Dự đoán cầu đơn hiệu:</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input type="text" class="form-control"
                                                   value="<?php echo set_value('param_donhieu') ?>" id="param_donhieu"
                                                   name="param_donhieu" readonly>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label style="color: red"><?php echo form_error('param_donhieu') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="exampleInputEmail1">Thời gian cập nhật giải:</label>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="input-group date" id="datetimepicker2">
                                                <input type="text" class="form-control" id="toDate" name="toDate"
                                                       value="<?php echo $time ?>"><span
                                                    class="input-group-addon">
                                                 <span class="glyphicon glyphicon-calendar"></span>
                                         </span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label style="color: red"><?php echo form_error('toDate') ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
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

    $(function () {
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });


    });
    $(document).ready(function () {

    });
    $('#param_kq').on('change', function () {
        if ($('#param_kq').val().split(',').length == 27) {
            $('#param_tong').val(add($('#param_kq').val()));
            $('#param_ddtong').val(addtong($('#param_tong').val()));
            $('#param_ddhieu').val(addhieu($('#param_tong').val()));
            $('#param_dontong').val(adddontong($('#param_tong').val()));
            $('#param_donhieu').val(adddonhieu($('#param_tong').val()));
        } else {
            alert("Bạn chưa nhập đủ giải");
        }
    }).change();
    function add(string) {
        string = string.split(',');                 //split into individual characters

        var sum = 0;                               //have a storage ready
        for (var i = 0; i < string.length; i++) {  //iterate through
            sum += parseInt(string[i], 10);         //convert from string to int
        }
        return sum;                                //return when done
    }

    function addtong(string) {

        var output = [],
            sNumber = string.toString();

        for (var i = 0, len = sNumber.length; i < len; i += 1) {
            output.push(+sNumber.charAt(i));
        }

        var str = parseInt(output[0].toString() + output[1].toString()) + parseInt(output[2].toString() + output[3].toString());
        if (str >= 100) {
            str = str % 100;
        }
        if(str<10){
            str = "0"+str.toString();
        }
        return str.toString() + ',' + reverse(str.toString());
    }

    function addhieu(string) {

        var output = [],
            sNumber = string.toString();

        for (var i = 0, len = sNumber.length; i < len; i += 1) {
            output.push(+sNumber.charAt(i));
        }

        var str = Math.abs(parseInt(output[0].toString() + output[1].toString()) - parseInt(output[2].toString() + output[3].toString()));
        if(str<10){
            str = "0"+str.toString();
        }

        return str.toString() + ',' + reverse(str.toString());
    }

    function adddontong(string) {

        var output = [],
            sNumber = string.toString();

        for (var i = 0, len = sNumber.length; i < len; i += 1) {
            output.push(+sNumber.charAt(i));
        }
        var str1 = output[0] + output[1];
        var str2 = output[2] + output[3];
        if (str2 >= 10) {
            str2 = str2 % 10;
        }
        var str = (parseInt(str1.toString() + str2.toString()));

        return str.toString() + ',' + reverse(str.toString());
    }
    function adddonhieu(string) {
        var output = [],
            sNumber = string.toString();
        for (var i = 0, len = sNumber.length; i < len; i += 1) {
            output.push(+sNumber.charAt(i));
        }
        var str1 = Math.abs(output[0] - output[1]);
        var str2 = Math.abs(output[2] - output[3]);
        var str = (parseInt(str1.toString() + str2.toString()));
        return str.toString() + ',' + reverse(str.toString());
    }

    function reverse(s) {
        var o = '';
        for (var i = s.length - 1; i >= 0; i--)
            o += s[i];
        return o;
    }
</script>