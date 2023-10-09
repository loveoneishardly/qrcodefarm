<!DOCTYPE html>
<html>
    <head>
        <title>Kiểm tra thông tin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
        <link href="lib/css/app_style.css" rel="stylesheet"/>
        <script src="lib/js/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    </head>
    <style type="text/css">
        #top-up {
            font-size: 2.5rem;
            cursor: pointer;
            position: fixed;
            z-index: 9999;
            color:#004993;
            bottom: 20px;
            right: 15px;
            display: none;
        }
        #top-up:hover {
            color: #333
        }
        body {
            font-family: "Open Sans", sans-serif;
            height: 100vh;
            background: url("lib/images/bg_body_top.gif") 50% fixed;
            background-size: cover;
        }
        .w3-row-padding {
            background: url("lib/images/bg_ft.png") no-repeat 50% fixed !important;
            background-size: cover !important;
        }
        header {
            position: fixed;
            top: 0;
            width: 100%;
        }
        .w3-display-right {
            position: fixed !important;
        }
        .w3-row-padding{
            margin-top: 30px
        }
        #check_kiemtrathontin{
            color: #FFF;
            background: #004F9E;
            cursor: pointer;
            border: none;
            padding: 5px;
            font-weight: bold;
            font-size: 15px;
        }
        #check_capnhatthongtin{
            color: #FFF;
            background: #004F9E;
            cursor: pointer;
            border: none;
            padding: 5px;
            font-weight: bold;
            font-size: 15px;
            margin-top: 10px;
        }
        #check_chonvungcapnhat{
            color: #FFF;
            background: #004F9E;
            cursor: pointer;
            border: none;
            padding: 5px;
            font-weight: bold;
            font-size: 15px;
            margin-top: 10px;
        }
    </style>
<body onload="checkCookie()">
    <header>
        <div class="w3-container w3-green">
            <h1>CẬP NHẬT VÙNG TRỒNG</h1>
        </div>
        <input type="hidden" id="check_keytracuu" name="check_keytracuu" />
        <div class="w3-row-padding">
            <div class="w3-col">
                <span id="check_info_sodienthoai" style="display:none">
                    <input class="w3-input" type="text" placeholder="Nhập số điện thoại" id="check_sodienthoai" id="check_sodienthoai" />
                </span><br>
                <span id="check_info_thongtinvungtrong" align="center" style="display:none">
                    <select class="w3-select" id="check_ketquakiemtra"></select >
                </span><br>
                <span id="check_button_capnhat" align="center" style="display:none">
                    <input  type="button" value="CẬP NHẬT THÔNG TIN" id="check_kiemtrathontin" />
                </span>
                <span id="check_button_choncapnhat" align="center" style="display:none">
                    <input  type="button" value="CHỌN VÙNG TRỒNG CẬP NHẬT" id="check_chonvungcapnhat" />
                </span>
                <span align="center" style="">
                    <input  type="button" value="xóa dữ liệu" id="xoacookie" />
                    <input  type="button" value="lấy IP" id="layip" onclick="ip_local()" />
                </span>
            </div>
            Your IP: <span id="ip" style="font-weight: bold;"></span>
        </div>
    </header>
    <script>
        function ip_local() {
            $.getJSON("https://api.ipify.org?format=json", function(data) {
                console.log(data.ip);
            });
        }
        function createCookie(cname, cvalue, exdays) {
            const d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        function getCookie(cname) {
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
        function checkCookie() {
            let cookie_val = getCookie("QRCODEFARM");
            if (cookie_val != "") {
                $.ajax({
                    type: 'POST',
                    url: 'go',
                    data: {
                        for: "_laythongtin",
                        sodienthoai: cookie_val
                    }
                }).done(function(ret){
                    var j_data = JSON.parse(ret);
                    $("#check_keytracuu").val(j_data.keytracuu);
                    if (j_data.result.length == 1) {
                        window.location.href = "go?check=_capnhatthongtin&madinhdanh=" + j_data.result[0].MAVUNGTRONG + "&SODIENTHOAI=" + cookie_val + "&key=" + j_data.keytracuu;
                    } else if (j_data.result.length >= 2) {
                        document.getElementById('check_info_sodienthoai').style.display = "none";
                        document.getElementById('check_button_capnhat').style.display = "none";
                        document.getElementById('check_info_thongtinvungtrong').style.display = "block";
                        document.getElementById('check_button_choncapnhat').style.display = "block";
                        $.each(j_data.result, function (i) {
                            $("<option value='" + j_data.result[i].MAVUNGTRONG + "'>" + j_data.result[i].TENNONGHO + "</option>").appendTo("#check_ketquakiemtra");
                        });
                    } else {
                        alert("Chưa có thông tin! Vui lòng kiểm tra lại!");
                        document.getElementById('check_info_sodienthoai').style.display = "block";
                        document.getElementById('check_button_capnhat').style.display = "block";
                    }
                });
                console.log(cookie_val);
            } else {
                document.getElementById('check_info_sodienthoai').style.display = "block";
                document.getElementById('check_button_capnhat').style.display = "block";
            }
        }
        function change_captcha(){
			$('#captchaimg').attr('src', '../manage/lib/captcha.php');
		}
        function check_number(numberphone){
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (vnf_regex.test(numberphone) == false){
                return 0;
            } else {
                return 1;
            }
        }
        $(function(){
            $("#check_kiemtrathontin").click(function(){
                var sodienthoai = $("#check_sodienthoai").val();
                if (!sodienthoai) {
                    alert("Chưa nhập số điện thoại!");
                } else {
                    if (check_number(sodienthoai) == 0) {
                        alert("Số điện thoại chưa đúng! Vui lòng kiểm tra lại!");
                    } else {
                        $.ajax({
                            type: 'POST',
                            url: 'go',
                            data: {
                                for: "_laythongtin",
                                sodienthoai: sodienthoai
                            }
                        }).done(function(ret){
                            var j_data = JSON.parse(ret);
                            $("#check_keytracuu").val(j_data.keytracuu);
                            if (j_data.result.length == 1) {
                                createCookie('QRCODEFARM', sodienthoai, 3650);
                                window.location.href = "go?check=_capnhatthongtin&madinhdanh=" + j_data.result[0].MAVUNGTRONG + "&SODIENTHOAI=" + sodienthoai + "&key=" + j_data.keytracuu;
                            } else if (j_data.result.length >= 2) {
                                createCookie('QRCODEFARM', sodienthoai, 3650);
                                document.getElementById('check_info_sodienthoai').style.display = "none";
                                document.getElementById('check_button_capnhat').style.display = "none";
                                document.getElementById('check_info_thongtinvungtrong').style.display = "block";
                                document.getElementById('check_button_choncapnhat').style.display = "block";
                                $.each(j_data.result, function (i) {
                                    $("<option value='" + j_data.result[i].MAVUNGTRONG + "'>" + j_data.result[i].TENNONGHO + "</option>").appendTo("#check_ketquakiemtra");
                                });
                            } else {
                                alert("Chưa có thông tin! Vui lòng kiểm tra lại!");
                            }
                        });
                    }
                }  
            });
            $("#check_chonvungcapnhat").click(function(){
                var sodienthoai = getCookie("QRCODEFARM");
                var madinhdanhvungtrong = $("#check_ketquakiemtra").val();
                var keytracuu = $("#check_keytracuu").val();
                window.location.href = "go?check=_capnhatthongtin&madinhdanh=" + madinhdanhvungtrong + "&SODIENTHOAI=" + sodienthoai + "&key=" + keytracuu;
            });
            $("#xoacookie").click(function(){
                var name = "QRCODEFARM";
                document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                alert("ok");
            });
        });
    </script>
</body>
</html>