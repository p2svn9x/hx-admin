/**
 * Created by B150M on 9/14/2017.
 */

var timeOutApi = 10000;

function errorThongBao(text) {

   // $(".loader").css("display", "none");
    $('.error').addClass('alert alert-danger').html(text);

    setTimeout(function () {
        $('.error').removeClass('alert alert-danger').html('');
    }, 1000);

}



function successThongBao(text) {

   // $(".loader").css("display", "none");
    $('.error').addClass('alert alert-success').html(text);

    setTimeout(function () {
        $('.error').removeClass('alert alert-success').html('');
    }, 1000);

}

function errorThongBaoPopup(text) {

   // $(".loader").css("display", "none");
    $('.errorModal').addClass('alert alert-danger').html(text);

    setTimeout(function () {
        $('.errorModal').removeClass('alert alert-danger').html('');
    }, 1000);

}


function successThongBaoPopup(text) {

   // $(".loader").css("display", "none");
    $('.errorModal').addClass('alert alert-success').html(text);

    setTimeout(function () {
        $('.errorModal').removeClass('alert alert-success').html('');
    }, 1000);

}
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}

function convertDate(data) {

    var date = new Date(data);
    var day = date.getDate();
    if (day < 10) {
        day = '0' + day.toString()
    }
    var month = date.getMonth() + 1;
    if (month < 10) {
        month = '0' + month.toString()
    }
    var year = date.getFullYear();
    var hour = date.getHours();
    if (hour < 10) {
        hour = '0' + hour.toString()
    }
    var minit = date.getMinutes();
    if (minit < 10) {
        minit = '0' + minit.toString()
    }
    var second = date.getSeconds();
    if (second < 10) {
        second = '0' + second.toString()
    }

    var timeNow = day + '/' + month + '/' + year + " " + hour + ':' + minit + ':' + second

    return timeNow
}

function getData(sumRecharge, sumCashOut, nru) {
    $('#sum-recharge').html(commaSeparateNumber(sumRecharge) + ' VNĐ');
    $('#sum-cashout').html(commaSeparateNumber(sumCashOut) + ' VNĐ');
    $('#sum-nru').html(commaSeparateNumber(nru));
}

function chartCcu(ccu, timeLabel) {
    $('#ccuChart').highcharts({
        title: {
            text: 'Tổng CCU',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        chart: {
            zoomType: 'x',
        },
        rangeSelector: {
            selected: 1
        },
        xAxis: {
            categories: timeLabel
        },

        yAxis: {
            title: {
                text: 'ccu'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            },

            ]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'CCU',
            data: ccu
        }],

    });
}

function showPageAddGroupUser() {
    $("#addGroupUser").css("display", "block");
    $("#groupUser").css("display", "none");
}

function showPageEditGroupUser(name, des, id) {
    $("#editGroupUser").css("display", "block");
    $("#groupUser").css("display", "none");
    $("#nameEditGroup").val(name);
    $("#descriptionEdit").val(des);
    $("#idGroup").val(id);

}

function redirectPageRoleGroup() {
    var id = $("#idGroup").val();
    alert(baseUrl+"groupuser/role/"+parseInt(id));
    location.href = baseUrl+"groupuser/role/"+parseInt(id)
}

function itemGroupUser(stt, name, des, id) {
    var rs = "";
    rs += "<tr>";
    rs += "<td  class=\"text-center\">" + stt + "</td>";
    rs += "<td>" + name + "</td>";
    rs += "<td>" + des + "</td>";
    rs += "<td class='text-center'>" +
        "<a title='Chỉnh sửa' class='btn btn-success' onclick=\"showPageEditGroupUser('" + name + "','" + des + "','" + id + "');\"><span class='glyphicon glyphicon-edit'></span></a>" + "     " +
        "<a title='Xóa' class='btn btn-danger' onclick='deleteGroup(" + id + ")'><span class='glyphicon glyphicon-remove' ></span></a>" +
        "</td>"
    rs += "</tr>";
    return rs;

}

function openModalAddGiftcode(price, amount) {
    $('#modalAddGiftcode').modal('show');
    $('#amoutGiftcode').html(amount)
    $('#priceGiftcode').html(commaSeparateNumber(price));

}

function initDateTimePicker() {
    $('.datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY HH:mm:ss',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        }
    });
}


function getTimestamp(date) {
    var arrDateTime = date.split(" ");
    var arrDate = arrDateTime[0].split('/')
    var newDate = arrDate[1].toString() + '/' + arrDate[0] + '/' + arrDate[2] + ' ' + arrDateTime[1]
    var timeStamp = (new Date(newDate)).getTime()
    return timeStamp;

}

function itemListGiftcode(stt, giftcode, nickname, pricegc, status, timecreate, timeuser,timeexprate,code,campain) {
    var rs = "";
    rs += "<tr>";
    rs += "<td >" + stt + "</td>";
    rs += "<td>" + giftcode + "</td>";
    if (nickname == null) {
        rs += "<td>" + "" + "</td>";
    } else {
        rs += "<td>" + nickname + "</td>";
    }

    rs += "<td>" + commaSeparateNumber(pricegc) + "</td>";
    if (status == 0) {
        rs += "<td>" + "Chưa dùng" + "</td>";
    } else {
        rs += "<td>" + "Đã dùng" + "</td>";
    }
    rs += "<td>" + convertDate(timecreate) + "</td>";
    if (timeuser == 0) {
        rs += "<td>" + "" + "</td>";
    } else {
        rs += "<td>" + convertDate(timeuser) + "</td>";
    }

    rs += "<td>" + convertDate(timeexprate) + "</td>";
    rs += "<td>" + code + "</td>";
    rs += "<td>" + campain + "</td>";
    rs += "</tr>";
    return rs;
}




