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
            Danh sách game config new
        </h1>
        <ol class="breadcrumb">
            <a href="<?php echo admin_url('confignew/add') ?>" class="btn btn-block bg-purple">Thêm mới</a>
        </ol>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="validate-text"></label>

    <div class="box-body  table-responsive no-padding">
        <?php $this->load->view('admin/message', $this->data); ?>
        <?php $this->load->view('admin/error', $this->data); ?>
        <div class="row">
            <div class="col-sm-12">
    <?php if($admin_info ->Status == "A" || $admin_info ->Status == "C"): ?>
                <table id="example2" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>Tên config</td>
                        <td>Platform</td>
                        <td>Hành động</td>
                    </tr>
                    </thead>
                    <tbody id="logaction">

                    </tbody>
                </table>
        <?php else: ?>
        <?php endif; ?>
            </div>
        </div>
        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
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
    function resultSearchTransction(id, name, platform) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + id + "</td>";
        rs += "<td>" + name + "</td>";
        rs += "<td>" + platform + "</td>";
        rs += "<td>"+ "<a href='<?php echo admin_url('confignew/edit') ?>"+"/"+name+"/"+platform+"/"+id+"'>" +"<img src='<?php echo public_url('admin') ?>/images/icons/color/edit.png'/>"+"</a>"+ "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('confignew/listconfigajax')?>",
            data: {
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $.each(result, function (index, value) {
                    result += resultSearchTransction(value.id, value.name,value.platform);
                });
                $('#logaction').html(result);

            }, error: function (xhr) {
                console.log(xhr);
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
