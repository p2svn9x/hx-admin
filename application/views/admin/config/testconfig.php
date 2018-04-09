<div class="content-wrapper">
    <?php if ($admin_info->Status == "A" || $admin_info->Status == "C"): ?>
        <section class="content-header">
            <h1>
                Sửa config <span style="color: #0000FF"><?php echo $plat ?></span>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">
                        <input type="hidden" id="configpf" value="<?php echo $plat ?>">
                        <input type="hidden" id="nmconfig" value="<?php echo $namecf ?>">
                        <input type="hidden" id="idconfig" value="<?php echo $id ?>">
                        <label id="validate-text"></label>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label>Tên config:</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="text" class="form-control" id="txtnameconfig">
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label>Version config:</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="text" class="form-control" id="txtversionconfig">
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label>Platform config:</label>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <select id="txtplatform" disabled="true" class="form-control">
                                            <?php  foreach($data as $da):?>
                                                <option value="<?php echo $da->platform ?>" <?php if($da->platform == $plat ){ echo 'selected';} ?>><?php echo $da->platform ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-1 col-xs-12">
                                        <input type="button" id="search_tran" value="Sửa config" class="btn btn-success">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea id="myTextArea" cols=100 rows=30
                                                  style="color: #0000ff;font-size: 20px"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <p style="color: #0000ff">Bạn sửa config thành công</p>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                                   aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
                            </div>
                            <div class="text-center">
                                <ul id="pagination-demo" class="pagination-sm"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="content-header">
            <h1>
                Bạn không được phân quyền
            </h1>
        </section>
    <?php endif; ?>
</div>
<script>

    $("#search_tran").click(function () {

        var data = $("#myTextArea").val();

        var myJSONString = data.replace(/\n/g, ' ').replace(/\t/g, ' ').replace(/  +/g, "");
        if (isValidJSON(myJSONString) == false) {
            errorThongBao("Không phải dữ liệu json");
            return false;

        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('confignew/successeditajax')?>",
            data: {
                idconfig: $("#idconfig").val(),
                valueconfig: myJSONString,
                versionconfig: $("#txtversionconfig").val(),
                configpf: $("#configpf").val()
            }, dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#validate-text").html("");
                if (result == 0) {
                    $("#bsModal3").modal("show");
                } else {
                    errorThongBao("Bạn cập nhật dữ liệu không thành công !!")
                }

            }, error: function (xhr) {
                window.location = '<?php echo admin_url('login') ?>';
            }

        });

    });
    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('confignew/editajax')?>",
            data: {
                configpf: $("#configpf").val(),
                nmconfig: $("#nmconfig").val()
            },
            dataType: 'json',
            success: function (result) {

                $("#txtnameconfig").val(result[0].name);
                $("#txtversionconfig").val(result[0].version);
                $("#txtplatform").val(result[0].platform);
                var obj = JSON.parse(result[0].value);
                var str = JSON.stringify(obj, undefined, 40);
                document.getElementById('myTextArea').innerHTML = str;
            }, error: function (xhr) {

                errorRequest(xhr.readyState, xhr.status, xhr.responseText);

            }, timeout: timeOutApi
        })


    });

    function isValidJSON(string) {
        try {
            JSON.parse(string);
        } catch (e) {
            return false;
        }

        return true;
    }
</script>