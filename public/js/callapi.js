function loginAdmin() {
    $(".loader").show();
    $.ajax({
        type: "GET",
        url: baseUrl + "login/loginODP",
        data: {
            username: $("#param_username").val(),
            password: $("#param_password").val()
        },
        dataType: 'json',
        success: function (res) {
            if (res == "0") {
                window.location.href = baseUrl;
            } else {
                errorThongBao(res)
            }
        }, error: function (xhr) {
            errorThongBao(xhr.responseText);

        }, timeout: timeOutApi
    });
}


function logCcu() {
    axios.post(baseUrl + "api/reportTotal")
        .then(function (response) {
            // handle success
            var ccu = [];
            var time = [];
            getData(response.data.napthe, response.data.muathe, response.data.nru);
            console.log(response.data);
            $.each(response.data.data, function (i, item) {
                ccu.push(item.ccu);
                time.push(convertDate(item.date))
            });
            chartCcu(ccu, time);
        })
        .catch(function (error) {
            // handle error
            errorThongBao(error)
        })
        .finally(function () {
            // always executed
        });
}


function addGroupUser() {
    var name = $('#nameGroup').val();
    var des = $('#description').val();
    axios.get(baseUrl + "groupuser/add?name=" + name + '&description=' + des)
        .then(function (response) {
            location.href = baseUrl + 'groupuser'
        })
        .catch(function (error) {
            // handle error
            errorThongBao(error)
        })
        .finally(function () {
            // always executed
        });
}

function getListUser() {
    axios.get(baseUrl + "groupuser/listGroup")
        .then(function (response) {
            var rs = "";
            var stt = 1;
            $.each(response.data, function (index, value) {
                rs += itemGroupUser(stt, value.Name, value.Description, value.Id);
                stt++;
            });
            $("#result").html(rs);
        })
        .catch(function (error) {
            // handle error
            errorThongBao(error)
        })
        .finally(function () {
            // always executed
        });
}


function deleteGroup(id) {
    if (!confirm('Bạn có chắc chắn muốn xóa?')) {
        return false;
    } else {
        axios.get(baseUrl + "groupuser/delete?id=" + id)
            .then(function (response) {
                location.href = baseUrl + 'groupuser'
            })
            .catch(function (error) {
                // handle error
                errorThongBao(error)
            })
            .finally(function () {
                // always executed
            });
    }

}

function editGroupUser(id) {
    var name = $('#nameEditGroup').val();
    var des = $('#descriptionEdit').val();
    axios.get(baseUrl + "groupuser/edit?id=" + id + "&name=" + name + "&des=" + des)
        .then(function (response) {
            location.href = baseUrl + 'groupuser'
        })
        .catch(function (error) {
            // handle error
            errorThongBao(error)
        })
        .finally(function () {
            // always executed
        });
}

function addGiftcode() {
    var typeGC = $("#typeGC").val();
    var amountGC = $("#amountGC").val();
    var expiryDateGC = $("#expiryDateGC").val();
    var priceGC = $("#priceGC").val();
    var otpGC = $("#otpGC").val();
    var campainGC = $("#campainGC").val();
    $('#btnConfirmAddGiftcode').attr("disabled", true);
    axios.get(baseUrl + "api/addGiftCode?typeGC=" + typeGC + "&amountGC=" + amountGC + "&expiryDateGC=" + expiryDateGC+"&priceGC=" + priceGC+"&otpGC=" + otpGC+"&campainGC=" + campainGC,{timeout:timeOutApi})
        .then(function (response) {
            if (response.data === "0") {
                successThongBaoPopup("Bạn Xuất Giftcode thành công")
                setTimeout(function () {
                    $('#modalAddGiftcode').modal('hide');
                    location.href = baseUrl + 'giftcode/addGiftcode'
                }, 1000);

            }else{
                errorThongBaoPopup(response.data)
            }
            setTimeout(function () {
                $('#btnConfirmAddGiftcode').removeAttr("disabled");
            }, 1000);
        })
        .catch(function (error) {
            // handle error
            errorThongBaoPopup(error)
            setTimeout(function () {
                $('#btnConfirmAddGiftcode').removeAttr("disabled");
            }, 1000);
        })
        .finally(function () {
            // always executed
        });

}

function searchDataListGiftcode() {
    var typeDate = $('#typeDate').val()
    var typeGC = $('#typeGC').val()
    var fromDate = $('#fromDate').val()
    var toDate = $('#toDate').val();
    var fromTime = getTimestamp(fromDate);
    var toTime = getTimestamp(toDate);
    //$(".loader").css("display", "block");
    axios.get(baseUrl + 'api/listGiftcode?typeDate=' + typeDate + '&fromDate=' + fromTime + '&toDate=' + toTime + '&page=0'+'&typeGC=' + typeGC ,{timeout:timeOutApi})
        .then(function (response) {
            if (response.data === "1") {
                errorThongBao("Lỗi hệ thống. Vui lòng thử lại");
            } else if (response.data === "8") {
                errorThongBao("Lỗi xác thực. Vui lòng thử lại");
            } else if (response.data === "12") {
                errorThongBao("Lỗi tham số. Vui lòng thử lại");
            } else if (response.data === "36") {
                errorThongBao("Tài khoản không tồn tại");
            }
            else {
                //$(".loader").css("display", "none");
                var rs = "";
                var stt = 1;
                var oldpage = 0;
                var res = response.data.listCode;
                if (res != "") {
                    $.each(res, function (index, value) {
                        rs += itemListGiftcode(stt, value.gift_code, value.nickName, value.value, value.status, value.start_time, value.updateTime,value.end_time,value.code_type,value.campaign);
                        stt++;
                    });
                    $("#result").html(rs);
                    $('#pagination-data').css("display", "block");
                    $('#pagination-data').twbsPagination({
                        totalPages: 1000,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                clickPaginationListGC(typeDate, typeGC, fromTime,toTime, page - 1)
                            }
                            oldpage = page

                        }
                    });
                } else {
                    errorThongBao("Không có dữ liệu !!!");
                    $("#result").html("");
                    $('#pagination-data').css("display", "none");
                }
            }

        })
        .catch(function (error) {
            errorThongBao(error)
            $("#result").html("");
            $('#pagination-data').css("display", "none");
        })
        .finally(function () {
        });

}

function clickPaginationListGC(typeDate, typeGC, fromTime, toTime, page) {

    // $(".loader").css("display", "block");
    axios.get(baseUrl + 'api/listGiftcode?typeDate=' + typeDate + '&fromDate=' + fromTime + '&toDate=' + toTime + '&page='+page+'&typeGC=' + typeGC ,{timeout:timeOutApi})
        .then(function (response) {
            if (response.data === "1") {
                errorThongBao("Lỗi hệ thống. Vui lòng thử lại");
            } else if (response.data === "8") {
                errorThongBao("Lỗi xác thực. Vui lòng thử lại");
            } else if (response.data === "12") {
                errorThongBao("Lỗi tham số. Vui lòng thử lại");
            } else {
                //$(".loader").css("display", "none");
                var rs = "";
                var stt = 1;
                var res = response.data.listCode;
                if (res != "") {
                    $.each(res, function (index, value) {
                        rs += itemListGiftcode(stt, value.gift_code, value.nickName, value.value, value.status, value.start_time, value.updateTime,value.end_time,value.code_type,value.campaign);
                        stt++;
                    });
                    $("#result").html(rs);
                } else {
                    errorThongBao("Không có dữ liệu !!!");
                    $("#result").html("");

                }
            }

        })
        .catch(function (error) {
            errorThongBao(error)
        })
        .finally(function () {
        });
}

function blockChat() {
    var nickname = $("#nickname").val();
    var dayBlock = $("#dayBlock").val();
    axios.get(baseUrl + "api/blockChat?nickname=" + nickname + "&dayBlock=" + dayBlock,{timeout:timeOutApi})
        .then(function (response) {
            if (response.data === "0") {
                successThongBao("Bạn khóa chat thành công")
                setTimeout(function () {
                    location.href = baseUrl + 'usergame/blockChat'
                }, 1000);

            }else{
                errorThongBao(response.data)
            }
        })
        .catch(function (error) {
            // handle error
            errorThongBao(error)

        })
        .finally(function () {
            // always executed
        });
}

