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
