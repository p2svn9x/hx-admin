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
    axios.post(baseUrl+"Api/reportTotal")
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
            console.log(error);
        })
        .finally(function () {
            // always executed
        });
}
