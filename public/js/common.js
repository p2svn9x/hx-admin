/**
 * Created by B150M on 9/14/2017.
 */

var timeOutApi = 10000;

function errorThongBao(text) {

    $(".loader").css("display", "none");
    $('.error').addClass('alert alert-danger').html(text);

    setTimeout(function () {
        $('.error').removeClass('alert alert-danger').html('');
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
    if(day<10){
        day = '0'+day.toString()
    }
    var month = date.getMonth() + 1;
    if(month<10){
        month = '0'+month.toString()
    }
    var year = date.getFullYear();
    var hour = date.getHours();
    if(hour<10){
        hour = '0'+hour.toString()
    }
    var minit = date.getMinutes();
    if(minit<10){
        minit = '0'+minit.toString()
    }
    var second = date.getSeconds();
    if(second<10){
        second = '0'+second.toString()
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
