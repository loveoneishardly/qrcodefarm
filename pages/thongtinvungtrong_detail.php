<!DOCTYPE html>
<html>
    <head>
        <title>Định danh vùng trồng</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
        <link href="lib/css/app_style.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    </style>
<body>
    <div class="w3-container w3-green">
        <h1>ĐỊNH DANH VÙNG TRỒNG</h1> 
        <!--<p>Thông tin</p> -->
    </div>
    <div class="w3-row-padding">
        <div class="w3-col">
            <h2>I. Thông Tin Chung</h2>
            <?php
                foreach ($respone as $keytt) {
                    echo '<p class="c-title1">1. Mã vùng trồng: '.$keytt['MAVUNGTRONG'].'</p>';
                    echo '<p class="c-title1">2. Nông hộ:</p>';
                    echo '<p class="c-title5">- Tên nông hộ: <b>'.$keytt['TENNONGHO'].'</b></p>';
                    echo '<p class="c-title5">- Địa chỉ: '.$keytt['DIACHI'].'</p>';
                    echo '<p><b>3. Hợp tác xã:</b> '.$keytt['HOPTACXA'].'</p>';
                    echo '<p><b>4. Thông tin sản phẩm:</b> '.$keytt['SANPHAMTRONG'].'</p>';
                }
            ?>
        </div>
        <div class="w3-col">
            <h2>II. Thông Tin Sản Xuất</h2>
            <?php
                foreach ($respone as $keyttt) {
                    echo '<p><b>1. Ngày sản xuất:</b> '.$keyttt['NGAYSANXUAT'].'</p>';
                    echo '<p class="c-title1">2. Thông tin đất canh tác</p>';
                    echo '<p class="c-title5">- Diện tích canh tác: '.$keyttt['DAT_DIENTICH'].'</p>';
                    echo '<p class="c-title5">- Loại đất sản xuất:</p>';
                    echo '<p class="c-title3">+ Đất: '.$keyttt['DAT_LOAIDAT'].'</p>';
                    echo '<p class="c-title3">+ Độ PH: '.$keyttt['DAT_DOPH'].'</p>';
                    echo '<p class="c-title1">3. Khu vực sản xuất:</p>';
                    echo '<p class="c-title5">- Tên khu vực sản xuất: '.$keyttt['KV_TEN'].'</p>';
                    echo '<p class="c-title5">- Tên Kế hoạch sản xuất: '.$keyttt['KV_KEHOACH'].'</p>';
                    echo '<p class="c-title1">4. Nhật ký sản xuất:</p>';
                }
                foreach ($resnhatky1 as $keynk1) {
                    echo '<p class="c-title2">'.$keynk1['SUDUNGNHATKY'].'</p>';
                    echo $keynk1['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk1['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($resnhatky2 as $keynk2) {
                    echo '<p class="c-title2">'.$keynk2['SUDUNGNHATKY'].'</p>';
                    echo $keynk2['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk2['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($resnhatky3 as $keynk3) {
                    echo '<p class="c-title2">'.$keynk3['SUDUNGNHATKY'].'</p>';
                    echo $keynk3['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk3['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($resnhatky4 as $keynk4) {
                    echo '<p class="c-title2">'.$keynk4['SUDUNGNHATKY'].'</p>';
                    echo '<p class="c-title3"><b>+ Số lần bón phân: '.$keynk4['SOLANBONPHAN'].' lần</b></p>';
                    echo $keynk4['TENNHATKY'];
                }
                foreach ($resnhatky5 as $keynk5) {
                    echo '<p class="c-title2">'.$keynk5['SUDUNGNHATKY'].'</p>';
                    echo '<p class="c-title3"><b>+ Tổng số lần sử dụng: '.$keynk5['SOLANSUDUNGTHUOC'].' lần</b></p>';
                    echo '<p class="c-title3"><b>+ Phun thuốc định kỳ</b></p>';
                    echo $keynk5['TENNHATKY'];
                }
                foreach ($resnhatky6 as $keynk6) {
                    echo '<p class="c-title2">'.$keynk6['SUDUNGNHATKY'].'</p>';
                    echo $keynk6['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk6['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($resnhatky7 as $keynk7) {
                    echo '<p class="c-title2">'.$keynk7['SUDUNGNHATKY'].'</p>';
                    echo $keynk7['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk7['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($resnhatky8 as $keynk8) {
                    echo '<p class="c-title2">'.$keynk8['SUDUNGNHATKY'].'</p>';
                    echo $keynk8['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk8['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($resnhatky9 as $keynk9) {
                    echo '<p class="c-title2">'.$keynk9['SUDUNGNHATKY'].'</p>';
                    echo $keynk9['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk9['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($resnhatky10 as $keynk10) {
                    echo '<p class="c-title2">'.$keynk10['SUDUNGNHATKY'].'</p>';
                    echo $keynk10['TENNHATKY'];
                    echo '<p class="c-title3">+ Ngày thực hiện: '.$keynk10['NGAYTHUCHIENNHATKY'].'</p>';
                }
                foreach ($respone as $keytt) {
                    echo '<p class="c-title1">5. Thu hoạch:</p>';
                    echo '<p class="c-title5">- Ngày thu hoạch dự kiến: <b>'.$keytt['THUHOACH_NGAY'].'</b></p>';
                    echo '<p class="c-title5">- Sản lượng dự kiến: <b>'.$keytt['THUHOACH_SANLUONG'].'</b></p>';
                }
            ?>
        </div>
    </div>
    <div title="Về đầu trang" id="top-up">
    <i class="fas fa-arrow-circle-up"></i></div>
    <script>
        var offset = 50;
        var duration = 500;
        $(function(){
            $(window).scroll(function () {
                if ($(this).scrollTop() > offset)
                $('#top-up').fadeIn(duration);else
                $('#top-up').fadeOut(duration);
            });
            $('#top-up').click(function () {
                $('body,html').animate({scrollTop: 0}, duration);
            });
        });
    </script>
</body>
</html>