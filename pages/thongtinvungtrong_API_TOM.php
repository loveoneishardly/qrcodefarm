<!DOCTYPE html>
<html>
    <head>
        <title>Định danh vùng trồng</title>
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
        #thongtinchung_api {
            margin-top: 50px !important;
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
    </style>
<body>
    <header>
        <div class="w3-container w3-green">
            <h1>ĐỊNH DANH VÙNG TRỒNG</h1>
        </div>
    </header>
    <div class="w3-row-padding">
        <div class="w3-col" id="thongtinchung_api">
            <h2>I. Thông Tin Chung</h2>
            <?php
                $data_info1 = json_decode($responeInfo,true);
                $data1 = json_decode($responeAPI,true);
                if ($data1["code"] == 200) {
                    echo '<p class="c-title1">1. Mã vùng trồng: '.$data_info1[0]["MAVUNGTRONG"].'</p>';
                    echo '<p class="c-title1">2. Nông hộ:</p>';
                    echo '<p class="c-title5">- Tên nông hộ: <b>'.$data1["object"]["thongTinChung"]["tenNguoiDaiDien"].'</b></p>';
                    echo '<p class="c-title5">- Địa chỉ: '.$data1["object"]["thongTinChung"]["diaChi"].'</p>';
                    echo '<p><b>3. Hợp tác xã: </b>'.$data_info1[0]["HOPTACXA"].' </p>';
                    if (isset($data2["object"]["giongVaXuLyGiong"]["tenGiong3VuGanNhat"])) {
                        echo '<p><b>4. Thông tin sản phẩm:</b> '.$data1["object"]["giongVaXuLyGiong"]["tenGiong3VuGanNhat"].'</p>';
                    } else {
                        echo '<p><b>4. Thông tin sản phẩm:</b> </p>';
                    }
                } else {
                    echo '<p><b style="color:red;">Chưa có thông tin</b></p>';
                }
            ?>
        </div>
        <div class="w3-col">
            <h2>II. Thông Tin Sản Xuất</h2>
            <?php
                $current_year = date("Y");
                $data2 = json_decode($responeAPI,true);
                $data_info2 = json_decode($responeInfo,true);
                if ($data2["code"] == 200) {
                    echo '<p><b>1. Ngày sản xuất:</b> '.$data2["object"]["thongTinKhaoSat"]["thoigianhoatdong"].'</p>';
                    echo '<p class="c-title1">2. Thông tin đất canh tác</p>';
                    if (isset($data2["object"]["thongTinChung"]["dienTichLuaHA"])){
                        echo '<p class="c-title5">- Diện tích canh tác: '.$data2["object"]["thongTinChung"]["dienTichLuaHA"].' ha</p>'; 
                    } else {
                        echo '<p class="c-title5">- Diện tích canh tác: ...... ha</p>';
                    }
                    echo '<p class="c-title5">- Loại đất sản xuất:</p>';
                    if (isset($data2["object"]["datCanhTac"]["loaiDatSanXuat"])) {
                        echo '<p class="c-title3">+ '.$data2["object"]["datCanhTac"]["loaiDatSanXuat"].'</p>';
                    }
                    echo '<p class="c-title3">+ Độ PH: </p>';
                    echo '<p class="c-title1">3. Khu vực sản xuất: </p>';
                    echo '<p class="c-title5">- Tên khu vực sản xuất: '.$data_info1[0]["KV_TEN"].'</p>';
                    echo '<p class="c-title5">- Tên Kế hoạch sản xuất: '.$data_info1[0]["KV_KEHOACH"].'</p>';
                    echo '<p class="c-title1">4. Nhật ký sản xuất:</p>';
                    echo '<p class="c-title2">&#9658; Chọn giống và cách xử lý giống</p>';
                    if (isset($data2["object"]["giongVaXuLyGiong"]["tenGiong3VuGanNhat"])) {
                        echo '<p class="c-title3">+ Tên giống: '.$data2["object"]["giongVaXuLyGiong"]["tenGiong3VuGanNhat"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Tên giống: </p>';
                    }
                    if (isset($data2["object"]["giongVaXuLyGiong"]["xuLyHatGiong"])) {
                        if ($data2["object"]["giongVaXuLyGiong"]["xuLyHatGiong"] == 1) {
                            echo '<p class="c-title3">+ Xử lý hạt giống: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Xử lý hạt giống: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Xử lý hạt giống:</p>';
                    }
                    if (isset($data2["object"]["giongVaXuLyGiong"]["capGiongLua"])) {
                        echo '<p class="c-title3">+ Cấp lúa giống: '.$data2["object"]["giongVaXuLyGiong"]["capGiongLua"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Cấp lúa giống:</p>';
                    }
                    if (isset($data2["object"]["giongVaXuLyGiong"]["chePham"])) {
                        echo '<p class="c-title3">+ Chế phẩm: '.$data2["object"]["giongVaXuLyGiong"]["chePham"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Chế phẩm: Không</p>';
                    }
                    if (isset($data2["object"]["giongVaXuLyGiong"]["mucDichXuLyGiong"])) {
                        echo '<p class="c-title3">+ Mục đích: '.$data2["object"]["giongVaXuLyGiong"]["mucDichXuLyGiong"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Mục đích:</p>';
                    }
                    echo '<p class="c-title2">&#9658; Kỹ thuật làm đất</p>';
                    if (isset($data2["object"]["kyThuatLamDat"]["datKhongCay"])) {
                        if ($data2["object"]["kyThuatLamDat"]["datKhongCay"] == 1) {
                            echo '<p class="c-title3">+ Cày phơi ải đất: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Cày phơi ải đất: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Cày phơi ải đất:</p>';
                    }
                    if (isset($data2["object"]["kyThuatLamDat"]["doSauDatXoi"])) {
                        echo '<p class="c-title3">+ Đất không cày, xới/trục rồi sạ, độ sâu lớp đất được xới: '.$data2["object"]["kyThuatLamDat"]["doSauDatXoi"].' cm</p>';
                    } else {
                        echo '<p class="c-title3">+ Đất không cày, xới/trục rồi sạ, độ sâu lớp đất được xới: ....... cm</p>';
                    }
                    
                    if (isset($data2["object"]["kyThuatLamDat"]["xuLyRomRa"])) {
                        echo '<p class="c-title3">+ Xử lý rơm rạ: '.$data2["object"]["kyThuatLamDat"]["xuLyRomRa"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Xử lý rơm rạ: </p>';
                    }
                    if (isset($data2["object"]["kyThuatLamDat"]["coDanhRanhKhong"])) {
                        if ($data2["object"]["kyThuatLamDat"]["coDanhRanhKhong"] == 1) {
                            echo '<p class="c-title3">+ Đánh rãnh nước: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Đánh rãnh nước: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Đánh rãnh nước:</p>';
                    }
                    $rongranh = "......."; $sauranh = "......."; $khoangcachranh = ".......";
                    if(isset($data2["object"]["kyThuatLamDat"]["rongRanh"])) {
                        $rongranh = $data2["object"]["kyThuatLamDat"]["rongRanh"];
                    }
                    if(isset($data2["object"]["kyThuatLamDat"]["sauRanh"])) {
                        $sauranh = $data2["object"]["kyThuatLamDat"]["sauRanh"];
                    }
                    if(isset($data2["object"]["kyThuatLamDat"]["khoangCachRanh"])) {
                        $khoangcachranh = $data2["object"]["kyThuatLamDat"]["khoangCachRanh"];
                    }
                    echo '<p class="c-title3">+ Chiểu rộng của rãnh: '.$rongranh.' cm, chiều sâu '.$sauranh.' cm, khoảng cách các rãnh '.$khoangcachranh.' m</p>';
                    echo '<p class="c-title2">&#9658; Phương pháp gieo xạ</p>';
                    if (isset($data2["object"]["phuongPhapGieoXa"]["saLanBangTay"])) {
                        if ($data2["object"]["phuongPhapGieoXa"]["saLanBangTay"] == 1) {
                            echo '<p class="c-title3">+ Sạ lan bằng tay: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Sạ lan bằng tay: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Sạ lan bằng tay:</p>';
                    }
                    $giongkgha = ".......";$giongkgcong = ".......";
                    if (isset($data2["object"]["phuongPhapGieoXa"]["LuongGiongKgHa"])) {
                        $giongkgha = $data2["object"]["phuongPhapGieoXa"]["LuongGiongKgHa"];
                    }
                    if (isset($data2["object"]["phuongPhapGieoXa"]["luongGiongKgCong"])) {
                        $giongkgcong = $data2["object"]["phuongPhapGieoXa"]["luongGiongKgCong"];
                    }
                    echo '<p class="c-title3">+ Lượng hạt giống được gieo sạ: '.$giongkgha.' kg/ha (hoặc '.$giongkgcong.' kg/công)</p>';
                    echo '<p class="c-title3">+ Thời gian gieo sạ vụ sản xuất: </p>';
                    $gieosa_hethu = "";$gieosa_thudong = "";$gieosa_dongxuan = "";$gieosa_xuanhe = "";
                    if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa01"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa02"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa03"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa04"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa05"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa06"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa07"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa08"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa09"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa10"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa11"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa12"])){
                        $gieosa_hethu = $data2["object"]["thoiVuCanhTac"]["heThuGieoSa12"].'/12'.'/'.$current_year;
                    }
                    if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa01"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa02"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa03"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa04"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa05"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa06"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa07"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa08"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa09"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa10"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa11"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa12"])){
                        $gieosa_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongGieoSa12"].'/12'.'/'.$current_year;
                    }
                    if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach01"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach02"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach03"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach04"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach05"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach06"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach07"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach08"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach09"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach10"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach11"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach12"])){
                        $gieosa_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach12"].'/12'.'/'.$current_year;
                    }
                    if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa01"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa02"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa03"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa04"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa05"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa06"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa07"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa08"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa09"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa10"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa11"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa12"])){
                        $gieosa_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa12"].'/12'.'/'.$current_year;
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Hè Thu: '.$gieosa_hethu.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thu Đông: '.$gieosa_thudong.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Đông Xuân: '.$gieosa_dongxuan.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Xuân Hè	: '.$gieosa_xuanhe.'</p>';
                    echo '<p class="c-title2">&#9658; Quản lý nước</p>';
                    if (isset($data2["object"]["nguonNuocTuoi"]["nguonNuocTuoi"])) {
                        echo '<p class="c-title3">+ Nguồn nước tưới: '.$data2["object"]["nguonNuocTuoi"]["nguonNuocTuoi"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Nguồn nước tưới: </p>';
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["chuDongTuoiTieu"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["chuDongTuoiTieu"] == 1) {
                            echo '<p class="c-title3">+ Chủ động nước tưới tiêu: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Chủ động nước tưới tiêu: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Chủ động nước tưới tiêu: Không</p>';
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["ruongDeBao"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["ruongDeBao"] == 1) {
                            echo '<p class="c-title3">+ Ruộng nằm trong khu vực đê bao: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Ruộng nằm trong khu vực đê bao: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Ruộng nằm trong khu vực đê bao:</p>';
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["tuoiTapTrung"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["tuoiTapTrung"] == 1) {
                            echo '<p class="c-title3">+ Ứng dụng bơm tưới nước tập trung: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Ứng dụng bơm tưới nước tập trung: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Ứng dụng bơm tưới nước tập trung:</p>';
                    }
                    $quanlynuoc = "";
                    if (isset($data2["object"]["nguonNuocTuoi"]["KQuanLyNuoc"])) {
                        $quanlynuoc = $data2["object"]["nguonNuocTuoi"]["KQuanLyNuoc"];
                    }
                    echo '<p class="c-title3">+ Chủ động điểu chỉnh mức nước, để tự nhiên từ đầu vụ đến cuối vụ: '.$quanlynuoc.'</p>';
                    echo '<p class="c-title3">+ Quản lý nước trên ruộng vào từng thời gian sinh trưởng của lúa: </p>';
                    $lamDat = "";$sanSua = "";$ocBuou = "";$truCo = "";$giaoSa = "";$bonLan1 = "";$bonLan2 = ""; $bL2DenDong = "";$nuoiDong = "";$troChin = "";$trThHo = "";
                    $lamDatNote = "";$sanSuaNote = "";$ocBuouNote = "";$truCoNote = "";$giaoSaNote = ""; $bonLan1Note = "";$bonLan2Note = "";$bL2DenDongNote = "";$nuoiDongNote = "";$troChinNote = "";$trThHoNote = "";
                    if (isset($data2["object"]["nguonNuocTuoi"]["lamDatNote"])) {
                        $lamDatNote = $data2["object"]["nguonNuocTuoi"]["lamDatNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["lamDat"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["lamDat"] == 1) {
                            $lamDat = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["lamDat"] == 2){
                            $lamDat = "Không có nước";
                        } else {
                            $lamDat = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["sanSuaNote"])) {
                        $sanSuaNote = $data2["object"]["nguonNuocTuoi"]["sanSuaNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["sanSua"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["sanSua"] == 1) {
                            $sanSua = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["sanSua"] == 2){
                            $sanSua = "Không có nước";
                        } else {
                            $sanSua = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["ocBuouNote"])) {
                        $ocBuouNote = $data2["object"]["nguonNuocTuoi"]["ocBuouNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["truOcBuou"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["truOcBuou"] == 1) {
                            $ocBuou = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["truOcBuou"] == 2){
                            $ocBuou = "Không có nước";
                        } else {
                            $ocBuou = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["truCoNote"])) {
                        $truCoNote = $data2["object"]["nguonNuocTuoi"]["truCoNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["truCo"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["truCo"] == 1) {
                            $truCo = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["truCo"] == 2){
                            $truCo = "Không có nước";
                        } else {
                            $truCo = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["giaoSaNote"])) {
                        $giaoSaNote = $data2["object"]["nguonNuocTuoi"]["giaoSaNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["gieoSa"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["gieoSa"] == 1) {
                            $giaoSa = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["gieoSa"] == 2){
                            $giaoSa = "Không có nước";
                        } else {
                            $giaoSa = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["bonLan1Note"])) {
                        $bonLan1Note = $data2["object"]["nguonNuocTuoi"]["bonLan1Note"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["bonLan1"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["bonLan1"] == 1) {
                            $bonLan1 = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["bonLan1"] == 2){
                            $bonLan1 = "Không có nước";
                        } else {
                            $bonLan1 = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["bonLan2Note"])) {
                        $bonLan2Note = $data2["object"]["nguonNuocTuoi"]["bonLan2Note"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["bonLan2"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["bonLan2"] == 1) {
                            $bonLan2 = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["bonLan2"] == 2){
                            $bonLan2 = "Không có nước";
                        } else {
                            $bonLan2 = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["bL2DenDongNote"])) {
                        $bL2DenDongNote = $data2["object"]["nguonNuocTuoi"]["bL2DenDongNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["bl2DenDong"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["bl2DenDong"] == 1) {
                            $bL2DenDong = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["bl2DenDong"] == 2){
                            $bL2DenDong = "Không có nước";
                        } else {
                            $bL2DenDong = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["nuoiDongNote"])) {
                        $nuoiDongNote = $data2["object"]["nguonNuocTuoi"]["nuoiDongNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["bonNuoiDong"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["bonNuoiDong"] == 1) {
                            $nuoiDong = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["bonNuoiDong"] == 2){
                            $nuoiDong = "Không có nước";
                        } else {
                            $nuoiDong = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["troChinNote"])) {
                        $troChinNote = $data2["object"]["nguonNuocTuoi"]["troChinNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["troChin"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["troChin"] == 1) {
                            $troChin = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["troChin"] == 2){
                            $troChin = "Không có nước";
                        } else {
                            $troChin = "Để tự nhiên";
                        }
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["trThHoNote"])) {
                        $trThHoNote = $data2["object"]["nguonNuocTuoi"]["trThHoNote"];
                    }
                    if (isset($data2["object"]["nguonNuocTuoi"]["truocThuHoach"])) {
                        if ($data2["object"]["nguonNuocTuoi"]["truocThuHoach"] == 1) {
                            $trThHo = "Có nước";
                        } else if ($data2["object"]["nguonNuocTuoi"]["truocThuHoach"] == 2){
                            $trThHo = "Không có nước";
                        } else {
                            $trThHo = "Để tự nhiên";
                        }
                    }
                    echo '<table class="w3-table-all" border="1">
                        <tr>
                            <td>TT</td>
                            <td>Thời điểm canh tác</td>
                            <td>Cách quản lý nước trên ruộng</td>
                            <td>Chú thích độ sâu mức nước trên ruộng( cm)</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Làm đất( cày, xới, bừa, trục)</td>
                            <td>'.$lamDat.'</td>
                            <td>'.$lamDatNote.'</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>San sửa mặt bằng đồng ruộng</td>
                            <td>'.$sanSua.'</td>
                            <td>'.$sanSuaNote.'</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Thời điểm sử dụng thuốc trừ ốc Bươu vàng</td>
                            <td>'.$ocBuou.'</td>
                            <td>'.$ocBuouNote.'</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Thời điểm sử dụng thuốc trừ cỏ</td>
                            <td>'.$truCo.'</td>
                            <td>'.$truCoNote.'</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Thời điểm gieo sạ</td>
                            <td>'.$giaoSa.'</td>
                            <td>'.$giaoSaNote.'</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Thời điểm bón phân lần 1 (7-10 ngày sau sạ)</td>
                            <td>'.$bonLan1.'</td>
                            <td>'.$bonLan1Note.'</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Thời điểm bón phân lần 2 (20-22 ngày sau sạ)</td>
                            <td>'.$bonLan2.'</td>
                            <td>'.$bonLan2Note.'</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Giai đoạn từ bón phân lần 2 đến bón nuôi đòng</td>
                            <td>'.$bL2DenDong.'</td>
                            <td>'.$bL2DenDongNote.'</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Thời điểm bón phân nuôi đòng</td>
                            <td>'.$nuoiDong.'</td>
                            <td>'.$nuoiDongNote.'</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Giai đoạn từ lúa có đòng đến trổ, chín</td>
                            <td>'.$troChin.'</td>
                            <td>'.$troChinNote.'</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Giai đoạn trước lúc thu hoạch (7-14 ngày)</td>
                            <td>'.$trThHo.'</td>
                            <td>'.$trThHoNote.'</td>
                        </tr>
                    </table>';
                    echo '<p class="c-title2">&#9658; Phân bón và kỹ thuật bón phân</p>';
                    if (isset($data2["object"]["kyThuatBonPhan"]["soLanBonPhan"])){
                        echo '<p class="c-title3">+ Tổng số lần bón phân: '.$data2["object"]["kyThuatBonPhan"]["soLanBonPhan"].' lần</p>';
                    } else {
                        echo '<p class="c-title3">+ Tổng số lần bón phân:...........lần</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["vuSanXuat"])){
                        echo '<p class="c-title3">+ Vụ sản xuất: '.$data2["object"]["kyThuatBonPhan"]["vuSanXuat"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Vụ sản xuất:</p>';
                    }
                    $donvibon = "";
                    if (isset($data2["object"]["kyThuatBonPhan"]["donViBon"])){
                        $donvibon = $data2["object"]["kyThuatBonPhan"]["donViBon"];
                    }
                    echo '<p class="c-title3">+ Đơn vị bón: '.$donvibon.'</p>';
                    if (isset($data2["object"]["kyThuatBonPhan"]["aiBonPhan"])){
                        echo '<p class="c-title3">+ Thực hiện công việc: '.$data2["object"]["kyThuatBonPhan"]["aiBonPhan"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Thực hiện công việc: </p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["congCuPhTien"])){
                        echo '<p class="c-title3">+ Công cụ, phương tiện: '.$data2["object"]["kyThuatBonPhan"]["congCuPhTien"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Công cụ, phương tiện: </p>';
                    }
                    
                    echo '<p class="c-title3">+ Chi tiết các đợt bón phân:</p>';
                    if (isset($data2["object"]["kyThuatBonPhan"]["phctong"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân hữu cơ: '.$data2["object"]["kyThuatBonPhan"]["phctong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["phcbonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["phcbonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phclan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["phclan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phclan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["phclan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phclan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["phclan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phclan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["phclan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phclan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["phclan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phcnote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["phcnote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân hữu cơ: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["pctdtong"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân cải tạo đất: '.$data2["object"]["kyThuatBonPhan"]["pctdtong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["pctdbonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["pctdbonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["pctdlan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["pctdlan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["pctdlan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["pctdlan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["pctdlan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pctdnote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["pctdnote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân cải tạo đất: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["ureTong"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Urê: '.$data2["object"]["kyThuatBonPhan"]["ureTong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["ureBonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["ureBonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }

                        if(isset($data2["object"]["kyThuatBonPhan"]["ureLan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["ureLan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["ureLan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["ureLan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["ureLan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["ureLan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["ureLan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["ureLan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["ureLan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["ureLan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["ureNote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["ureNote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Urê: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["planTong"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Lân: '.$data2["object"]["kyThuatBonPhan"]["planTong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanBonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["planBonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }

                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanLan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["planLan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanLan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["planLan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanLan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["planLan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanLan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["planLan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanLan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["planLan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanNote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["planNote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Lân: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["pkaliTong"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Kali: '.$data2["object"]["kyThuatBonPhan"]["pkaliTong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["pkaliBonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["pkaliBonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }

                        if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["pkaliLan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["pkaliLan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["pkaliLan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["pkaliLan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["pkaliLan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pLanNote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["pLanNote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Kali: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["pdapTong"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân DAP: '.$data2["object"]["kyThuatBonPhan"]["pdapTong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["pkaliBonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["pkaliBonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }

                        if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["pdapLan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["pdapLan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["pdapLan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["pdapLan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["pdapLan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["pdapNote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["pdapNote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân DAP: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["phNpkTong"])) {
                        $tenphanNPK = ".....";
                        if (isset($data2["object"]["kyThuatBonPhan"]["tenPhanNPK"])){
                            $tenphanNPK = $data2["object"]["kyThuatBonPhan"]["tenPhanNPK"];
                        }
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân NPK: '.$tenphanNPK.': '.$data2["object"]["kyThuatBonPhan"]["phNpkTong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["phNpkBonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["phNpkBonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }

                        if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["nhNpkLan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["nhNpkLan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["nhNpkLan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["nhNpkLan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["nhNpkLan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phNpkTNote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["phNpkTNote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân NPK: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["phKhacTong"])) {
                        $tenphankhac = ".....";
                        if (isset($data2["object"]["kyThuatBonPhan"]["tenPhKhac"])){
                            $tenphankhac = $data2["object"]["kyThuatBonPhan"]["tenPhKhac"];
                        }
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân khác: '.$tenphankhac.': '.$data2["object"]["kyThuatBonPhan"]["phKhacTong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["phKhacBonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["phKhacBonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }

                        if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["phKhacLan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["phKhacLan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["phKhacLan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["phKhacLan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["phKhacLan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phKhacNote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["phKhacNote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân khác: Không</p>';
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["phBLTong"])) {
                        $tenphanbonla = ".....";
                        if (isset($data2["object"]["kyThuatBonPhan"]["tenPhBL"])){
                            $tenphanbonla = $data2["object"]["kyThuatBonPhan"]["tenPhBL"];
                        }
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân bón lá: '.$tenphanbonla.': '.$data2["object"]["kyThuatBonPhan"]["phBLTong"].' '.$donvibon.'</p>';
                        if(isset($data2["object"]["kyThuatBonPhan"]["phBLBonLot"])){
                            echo '<p class="c-title6">• Bón lót: '.$data2["object"]["kyThuatBonPhan"]["phBLBonLot"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Bón lót: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan1"])){
                            echo '<p class="c-title6">• Lần 1: '.$data2["object"]["kyThuatBonPhan"]["phBLLan1"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 1: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan2"])){
                            echo '<p class="c-title6">• Lần 2: '.$data2["object"]["kyThuatBonPhan"]["phBLLan2"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 2: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan3"])){
                            echo '<p class="c-title6">• Lần 3: '.$data2["object"]["kyThuatBonPhan"]["phBLLan3"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 3: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan4"])){
                            echo '<p class="c-title6">• Lần 4: '.$data2["object"]["kyThuatBonPhan"]["phBLLan4"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 4: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan5"])){
                            echo '<p class="c-title6">• Lần 5: '.$data2["object"]["kyThuatBonPhan"]["phBLLan5"].' '.$donvibon.'</p>';
                        } else {
                            echo '<p class="c-title6">• Lần 5: Không</p>';
                        }
                        if(isset($data2["object"]["kyThuatBonPhan"]["phBLNote"])){
                            echo '<p class="c-title6">• Chú thích: '.$data2["object"]["kyThuatBonPhan"]["phBLNote"].'</p>';
                        } else {
                            echo '<p class="c-title6">• Chú thích: </p>';
                        }
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân bón lá: Không</p>';
                    }                
                    echo '<p class="c-title2">&#9658; Sử dụng thuốc BVTV</p>';
                    if (isset($data2["object"]["thuocBVTV"]["tongLanSDBvtv"])){
                        echo '<p class="c-title3">+ Tổng số lần sử dụng thuốc BVTV: '.$data2["object"]["thuocBVTV"]["tongLanSDBvtv"].' Lần/vụ</p>';
                    } else {
                        echo '<p class="c-title3">+ Tổng số lần sử dụng thuốc BVTV: ............ Lần/vụ</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["bvtvVuSx"])){
                        echo '<p class="c-title3">+ Vụ sản xuất: '.$data2["object"]["thuocBVTV"]["bvtvVuSx"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Vụ sản xuất: </p>';
                    }
                    echo '<p class="c-title3">+ Chi tiết sử dụng thuốc BVTV: </p>';
                    $solan_truocbv="........";$soluong_truocbv="........";$solan_truco="........";$soluong_truco="........";$solan_trusau="........";$soluong_trusau="........";$solan_truray="........";$soluong_truray="........";$solan_trubenh="........";$soluong_trubenh="........";
                    $solan_trusautruray="........";$soluong_trusautruray="........";$solan_trusautrubenh="........";$soluong_trusautrubenh="........";$solan_truraytrubenh="........";$soluong_truraytrubenh="........";$solan_trusautruraytrubenh="........";$soluong_trusautruraytrubenh="........";$solan_bvtv_lancuoi="........";$soluong_bvtv_lancuoi="........";
                    if (isset($data2["object"]["thuocBVTV"]["thBV"])){
                        $solan_truocbv = $data2["object"]["thuocBVTV"]["thBV"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thBVNote"])){
                        $soluong_truocbv = $data2["object"]["thuocBVTV"]["thBVNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ ốc Bươu Vàng: '.$solan_truocbv.' Lần/vụ, phun '.$soluong_truocbv.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thTruCo"])){
                        $solan_truco = $data2["object"]["thuocBVTV"]["thTruCo"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTruCoNote"])){
                        $soluong_truco = $data2["object"]["thuocBVTV"]["thTruCoNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ cỏ: '.$solan_truco.' Lần/vụ, phun '.$soluong_truco.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thTruSau"])){
                        $solan_trusau = $data2["object"]["thuocBVTV"]["thTruSau"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTruSauNote"])){
                        $soluong_trusau = $data2["object"]["thuocBVTV"]["thTruSauNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ sâu: '.$solan_trusau.' Lần/vụ, phun '.$soluong_trusau.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thTruRay"])){
                        $solan_truray = $data2["object"]["thuocBVTV"]["thTruRay"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTruRayNote"])){
                        $soluong_truray = $data2["object"]["thuocBVTV"]["thTruRayNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ rầy: '.$solan_truray.' Lần/vụ, phun '.$soluong_truray.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thTrBenh"])){
                        $solan_trubenh = $data2["object"]["thuocBVTV"]["thTrBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTrBenhNote"])){
                        $soluong_trubenh = $data2["object"]["thuocBVTV"]["thTrBenhNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ bệnh: '.$solan_trubenh.' Lần/vụ, phun '.$soluong_trubenh.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thSauRay"])){
                        $solan_trusautruray = $data2["object"]["thuocBVTV"]["thSauRay"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thSauRayNote"])){
                        $soluong_trusautruray = $data2["object"]["thuocBVTV"]["thSauRayNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ sâu, trừ rầy): '.$solan_trusautruray.' Lần/vụ, phun '.$soluong_trusautruray.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thSauBenh"])){
                        $solan_trusautrubenh = $data2["object"]["thuocBVTV"]["thSauBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thSauBenhNote"])){
                        $soluong_trusautrubenh = $data2["object"]["thuocBVTV"]["thSauBenhNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ sâu, trừ bệnh): '.$solan_trusautrubenh.' Lần/vụ, phun '.$soluong_trusautrubenh.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thRayBenh"])){
                        $solan_truraytrubenh = $data2["object"]["thuocBVTV"]["thRayBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thRayBenhNote"])){
                        $soluong_truraytrubenh = $data2["object"]["thuocBVTV"]["thRayBenhNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ rầy, trừ bệnh): '.$solan_truraytrubenh.' Lần/vụ, phun '.$soluong_truraytrubenh.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["thSauRayBenh"])){
                        $solan_trusautruraytrubenh = $data2["object"]["thuocBVTV"]["thSauRayBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thSauRayBenhNote"])){
                        $soluong_trusautruraytrubenh = $data2["object"]["thuocBVTV"]["thSauRayBenhNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ sâu, trừ rầy, trừ bệnh): '.$solan_trusautruraytrubenh.' Lần/vụ, phun '.$soluong_trusautruraytrubenh.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["bvtvLanCuoi"])){
                        $solan_bvtv_lancuoi = $data2["object"]["thuocBVTV"]["bvtvLanCuoi"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["bvtvLanCuoiNote"])){
                        $soluong_bvtv_lancuoi = $data2["object"]["thuocBVTV"]["bvtvLanCuoiNote"];
                    }
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thời điểm sử dụng thuốc BVTV lần cuối (ngày trước thu hoạch): '.$solan_bvtv_lancuoi.' Lần, phun '.$soluong_bvtv_lancuoi.' lít/lần/ha</p>';
                    if (isset($data2["object"]["thuocBVTV"]["phunDinhKy"]) && $data2["object"]["thuocBVTV"]["phunDinhKy"] == 1){
                        echo '<p class="c-title3">+ Phun định kỳ: Có</p>';
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thời gian phun: '.$data2["object"]["thuocBVTV"]["thGianPhun"].'</p>';
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lý do phun: '.$data2["object"]["thuocBVTV"]["LyDoPhun"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Phun định kỳ: Không</p>';
                    }
                    echo '<p class="c-title3">+ Phun theo thời điểm: </p>';
                    if (isset($data2["object"]["thuocBVTV"]["phunLan01"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 1: '.$data2["object"]["thuocBVTV"]["phunLan01"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 1: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan02"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 2: '.$data2["object"]["thuocBVTV"]["phunLan02"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 2: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan03"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 3: '.$data2["object"]["thuocBVTV"]["phunLan03"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 3: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan04"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 4: '.$data2["object"]["thuocBVTV"]["phunLan04"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 4: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan05"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 5: '.$data2["object"]["thuocBVTV"]["phunLan05"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 5: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan06"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 6: '.$data2["object"]["thuocBVTV"]["phunLan06"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 6: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan07"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 7: '.$data2["object"]["thuocBVTV"]["phunLan07"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 7: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan08"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 8: '.$data2["object"]["thuocBVTV"]["phunLan08"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 8: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan09"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 9: '.$data2["object"]["thuocBVTV"]["phunLan09"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 9: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunLan10"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 10: '.$data2["object"]["thuocBVTV"]["phunLan10"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 10: Không</p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["lyDoPhunLucNay"])){
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lý do phun: '.$data2["object"]["thuocBVTV"]["lyDoPhunLucNay"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lý do phun: </p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["phunThKhi"])){
                        echo '<p class="c-title3">+ Phun thuốc khi: '.$data2["object"]["thuocBVTV"]["phunThKhi"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Phun thuốc khi: </p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["aiPhunTh"])){
                        echo '<p class="c-title3">+ Thực hiện công việc: '.$data2["object"]["thuocBVTV"]["aiPhunTh"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Thực hiện công việc: </p>';
                    }
                    if (isset($data2["object"]["thuocBVTV"]["congCuPhun"])){
                        echo '<p class="c-title3">+ Phương tiện thực hiện: '.$data2["object"]["thuocBVTV"]["congCuPhun"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Phương tiện thực hiện: </p>';
                    }
                    echo '<p class="c-title1">5. Thu hoạch:</p>';
                    $thuhoach_hethu = "";$thuhoach_thudong = "";$thuhoach_dongxuan = "";$thuhoach_xuanhe = "";
                    if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach01"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach02"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach03"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach04"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach05"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach06"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach07"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach08"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach09"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach10"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach11"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach12"])){
                        $thuhoach_hethu = $data2["object"]["thoiVuCanhTac"]["heThuThuHoach12"].'/12'.'/'.$current_year;
                    }
                    if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach01"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach02"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach03"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach04"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach05"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach06"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach07"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach08"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach09"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach10"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach11"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach12"])){
                        $thuhoach_thudong = $data2["object"]["thoiVuCanhTac"]["thuDongThuHoach12"].'/12'.'/'.$current_year;
                    }
                    if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach01"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach02"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach03"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach04"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach05"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach06"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach07"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach08"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach09"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach10"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach11"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach12"])){
                        $thuhoach_dongxuan = $data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach12"].'/12'.'/'.$current_year;
                    }
                    if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach01"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach01"].'/01'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach02"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach02"].'/02'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach03"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach03"].'/03'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach04"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach04"].'/04'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach05"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach05"].'/05'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach06"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach06"].'/06'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach07"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach07"].'/07'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach08"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach08"].'/08'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach09"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach09"].'/09'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach10"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach10"].'/10'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach11"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach11"].'/11'.'/'.$current_year;
                    } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach12"])){
                        $thuhoach_xuanhe = $data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach12"].'/12'.'/'.$current_year;
                    }
                    echo '<p class="c-title3">+ Thời gian thu hoạch vụ sản xuất: </p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Hè Thu: '.$thuhoach_hethu.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thu Đông: '.$thuhoach_thudong.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Đông Xuân: '.$thuhoach_dongxuan.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Xuân Hè	: '.$thuhoach_xuanhe.'</p>';
                    if (isset($data2["object"]["hieuQuaKinhTe"]["luaNsBq"])){
                        echo '<p class="c-title3">+ Năng suất bình quân: '.$data2["object"]["hieuQuaKinhTe"]["luaNsBq"].' kg/ha</p>';
                    } else {
                        
                        echo '<p class="c-title3">+ Năng suất bình quân: </p>';
                    }
                } else {
                    echo '<p><b style="color:red;">Chưa có thông tin</b></p>';
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