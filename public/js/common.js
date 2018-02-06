/**
 * Created by B150M on 9/14/2017.
 */


function sendRequest(url, params, callback, errorcallback) {
    $.ajax({
        type: "POST",
        url: url,
        data: params,
        dataType: 'json',
        success: function (result) {
            callback(result);
        }, error: function (xhr, textStatus, errorThrown) {
            errorcallback(xhr, textStatus, errorThrown);
        }, timeout: 60000
    });
}

function errorRequest(readyState,status){
    $("#spinner").hide();
    $("#validate-text").css("color","red");
    if (readyState == 4 && status == 200) {
        $("#validate-text").html("Không kết nối được api");
    }
    if (readyState == 4 && status == 404) {
        $("#validate-text").html("Không tồn tại controller");
    }
    if (readyState == 0 && status == 0) {
        $("#validate-text").html("Hệ thống gián đoán vui lòng đợi");
    }
}

function nullRequest(){
    $('#pagination-demo').css("display", "none");
    $("#resultsearch").html("Không tìm thấy kết quả");
    $('#logaction').html("");
}
function errorThongBao(txt){
    $("#spinner").hide();
    $("#validate-text").css("color","red");
    $("#validate-text").html(txt);

}
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}