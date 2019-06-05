<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Trang chủ
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền nạp</span>
                        <span class="info-box-number" id="sum-recharge">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng tiền rút</span>
                        <span class="info-box-number" id="sum-cashout">0</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">NRU</span>
                        <span class="info-box-number" id="sum-nru">760</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tổng phế game</span>
                        <span class="info-box-number" id="sum-fee">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">CCU</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <div id="ccuChart" style="height: 400px; margin: 0 auto"></div>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        console.log(convertDate(1559322000000))
        axios.post("<?php echo admin_url('Api/reportTotal')?>")
            .then(function (response) {
                // handle success
                var ccu = [];
                var time = [];
                getData(response.data.napthe, response.data.muathe, response.data.nru, 0);
                console.log(response.data);
                $.each(response.data.data, function (i, item) {
                    ccu.push(item.ccu);
                    time.push(convertDate(item.date))
                });
                chartCcu(ccu, time);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .finally(function () {
                // always executed
            });

    })


    function getData(sumRecharge, sumCashOut, nru, sumFee) {
        $('#sum-recharge').html(commaSeparateNumber(sumRecharge) + ' VNĐ');
        $('#sum-cashout').html(commaSeparateNumber(sumCashOut) + ' VNĐ');
        $('#sum-nru').html(commaSeparateNumber(nru));
        $('#sum-fee').html(commaSeparateNumber(sumFee));
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

</script>

