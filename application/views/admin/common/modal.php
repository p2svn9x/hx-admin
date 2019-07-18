<div class="modal fade" id="modalAddGiftcode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="errorModal"></div>
            </div>
            <div class="modal-body">
                <div>
                    <span style="color: red;font-size: 18px;font-weight: 600" id="titleConfirm">Bạn có chắc chắn muốn tạo: </span>
                    <span style="color: green;font-size: 18px;font-weight: 600" id="amoutGiftcode"></span>
                    <span style="color: red;font-size: 18px;font-weight: 600">  Giftcode</span>
                </div>
                <div>
                    <span style="color: red;font-size: 18px;font-weight: 600"> Mệnh giá: </span>
                    <span style="color: green;font-size: 18px;font-weight: 600" id="priceGiftcode"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" onclick="addGiftcode()"
                        id="btnConfirmAddGiftcode">Xác nhận
                </button>
            </div>
        </div>
    </div>
</div>