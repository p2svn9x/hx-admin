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
                Khóa chat
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-body">
                        <form id="formBlockChat" class="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Nickname</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nhập nickname bị khóa chat">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Số ngày khóa chat:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="dayBlock" name="dayBlock"
                                                   placeholder="Nhập số ngày khóa chat">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="submit" class="btn bg-purple" value="Khóa Chat">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<script>
    $(function () {
        $("#formBlockChat").validate({
            errorClass: "validateError",
            ignore: [],
            debug: false,
            rules: {
                nickname: {
                    required: true
                },
                dayBlock: {
                    required: true,
                    number: true,

                },
            },
            // Specify the validation error messages
            messages: {
                nickname: "Vui lòng nhập nickname bị khóa",
                dayBlock: {
                    required: "Vui lòng nhập số ngày khóa chat",
                    number: "Số ngày khóa chat phải là số",
                },

            },
            submitHandler: function (form) {
                blockChat();
            }
        })
        ;

    });

</script>
