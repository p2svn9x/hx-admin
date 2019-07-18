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
                Thêm giftcode
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-body">
                        <form id="formAddGiftcode" class="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Mã Code</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="typeGC" name="typeGC"
                                                   maxlength="3" placeholder="Mã code chỉ bao gồm 3 ký tự chữ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Số lượng:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="amountGC" name="amountGC"
                                                   placeholder="Nhập số lượng giftcode">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Hạn sử dụng:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="expiryDateGC"
                                                   name="expiryDateGC" placeholder="Nhập hạn sử dụng giftcode">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Chiến dịch tạo Code:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="campainGC" name="campainGC"
                                                   placeholder="Nhập chiến dịch tạo code">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Mệnh giá:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <select class="form-control select2 select2-hidden-accessible" id="priceGC"
                                                    name="priceGC" style="width: 100%;">
                                                <option value="">Chọn mệnh giá</option>
                                                <option value="10000">10K</option>
                                                <option value="20000">20K</option>
                                                <option value="50000">50K</option>
                                                <option value="100000">100K</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                            <label for="exampleInputEmail1">Mã OTP:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" id="otpGC" name="otpGC"
                                                   maxlength="6"
                                                   placeholder="Nhập OTP">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-md-6 col-sm-9 col-xs-12">
                                            <input type="submit" class="btn bg-purple" value="Tạo Giftcode">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php $this->load->view('admin/common/modal') ?>
    <?php endif; ?>
</div>
<script>
    $(function () {
        $("#formAddGiftcode").validate({
            errorClass: "validateError",
            ignore: [],
            debug: false,
            rules: {
                typeGC: {
                    required: true
                },
                amountGC: {
                    required: true,
                    number: true,
                    max: 100,

                },
                expiryDateGC: {
                    required: true,
                    number: true,
                },
                priceGC: {
                    required: true
                },
                otpGC: {
                    required: true
                },
            },
            // Specify the validation error messages
            messages: {
                typeGC: "Vui lòng nhập mã Code chỉ bao gồm 3 kí tự chữ",
                amountGC: {
                    required: "Vui lòng nhập số lượng Giftcode",
                    number: "Số lượng Giftcode phải là số",
                    max: "Số lượng Giftcode tối đa là 100",
                },

                expiryDateGC: {
                    required: "Vui lòng nhập giới hạn ngày sử dụng Giftcode",
                    number: "Giới hạn ngày sử dụng Gftcode phải là số",
                },
                priceGC: "Vui lòng nhập mệnh giá Giftcode",
                otpGC: "Vui lòng nhập Mã OTP",
            },
            submitHandler: function (form) {
                var price = $("#priceGC").val();
                var amount = $("#amountGC").val();
                    openModalAddGiftcode(price,amount);
                }
        })
        ;

    });

</script>
