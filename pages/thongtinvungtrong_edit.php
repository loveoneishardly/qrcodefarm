<!DOCTYPE html>
<html>
    <head>
        <title>Cập nhật vùng trồng</title>
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
        #capnhatthongtinvungtrong{
            color: #FFF;
            background: #004F9E;
            cursor: pointer;
            border: none;
            padding: 5px;
            font-weight: bold;
            font-size: 15px;
        }
        .w3-row-padding{
            margin-top: 50px
        }
    </style>
<body>
    <header>
        <div class="w3-container w3-green">
            <h1>CẬP NHẬT VÙNG TRỒNG</h1>
        </div>
    </header>
    <div class="w3-container w3-display-right">
        <input  type="button" value="CẬP NHẬT" id="capnhatthongtinvungtrong" /><br>
        <span style="color:red;font-weight: bold;">(*) là bắt buộc</span>
    </div>
    <div class="w3-row-padding">
        <div class="w3-col">
            <h2>I. Thông Tin Chung</h2>
            <?php
                $data_info1 = json_decode($responeupdateInfo,true);
                if (isset($data_info1["status"]) &&  $data_info1["status"]== false) {
                    echo '<p><b style="color:red;">Chưa có thông tin</b></p>';
                } else {
                    $data1 = json_decode($responeupdateAPI,true);
                    if (isset($data1["status"]) &&  $data1["status"]== false) {
                        echo '<p><b style="color:red;">Chưa có thông tin</b></p>';
                    } else {
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
                        }
                    }
                }
            ?>
        </div>
        <div class="w3-col">
            <h2>II. Thông Tin Sản Xuất</h2>
            <?php
                function convertdate($arr){
                    if ($arr == ""){
                        return "";
                    } else {
                        $d_arr = explode("/", $arr);
                        $date = $d_arr[2]."-".$d_arr[1]."-".$d_arr[0];
                        return $date;
                    }
                };
                function check_len_day($day){
                    if (strlen($day) == 1) {
                        return "0".$day;
                    } else {
                        return $day;
                    }
                };
                $current_year = date("Y");
                $data_info2 = json_decode($responeupdateInfo,true);
                if (isset($data_info2["status"]) &&  $data_info2["status"]== false) {
                    echo '<p><b style="color:red;">Chưa có thông tin</b></p>';
                } else {
                    $data2 = json_decode($responeupdateAPI,true);
                    if (isset($data2["status"]) &&  $data2["status"]== false) {
                        echo '<p><b style="color:red;">Chưa có thông tin</b></p>';
                    } else {
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
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa02"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa03"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa04"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa05"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa06"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa07"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa08"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa09"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa10"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa11"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuGieoSa12"])){
                                $gieosa_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuGieoSa12"]).'/12'.'/'.$current_year;
                            }
                            if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa01"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa02"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa03"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa04"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa05"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa06"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa07"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa08"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa09"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa10"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa11"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa12"])){
                                $gieosa_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongGieoSa12"]).'/12'.'/'.$current_year;
                            }
                            if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa01"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa02"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa03"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa04"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa05"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa06"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa07"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa08"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa09"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa10"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa11"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa12"])){
                                $gieosa_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanGieoSa12"]).'/12'.'/'.$current_year;
                            }
                            if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa01"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa02"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa03"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa04"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa05"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa06"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa07"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa08"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa09"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa10"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa11"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa12"])){
                                $gieosa_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeGieoSa12"]).'/12'.'/'.$current_year;
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Hè Thu: <input type="date" class="w3-input" id="thoivu_hethu" value="'.convertdate($gieosa_hethu).'" /></p>';
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thu Đông: <input type="date" class="w3-input" id="thoivu_thudong" value="'.convertdate($gieosa_thudong).'" /></p>';
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Đông Xuân: <input type="date" class="w3-input" id="thoivu_dongxuan" value="'.convertdate($gieosa_dongxuan).'" /></p>';
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Xuân Hè	: <input type="date" class="w3-input" id="thoivu_xuanhe" value="'.convertdate($gieosa_xuanhe).'" /></p>';
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
                                echo '<p class="c-title3">+ Tổng số lần bón phân: <input type = "text" class="w3-input" id="phanbon_tongphanbon" value="'.$data2["object"]["kyThuatBonPhan"]["soLanBonPhan"].'" /> lần</p>';
                            } else {
                                echo '<p class="c-title3">+ Tổng số lần bón phân: <input type = "text" class="w3-input" id="phanbon_tongphanbon" value="" /> lần</p>';
                            }
                            $vusanxuat = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["vuSanXuat"])){
                                $vusanxuat = $data2["object"]["kyThuatBonPhan"]["vuSanXuat"];
                            }
                            echo '<p class="c-title3">+ Vụ sản xuất: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="phanbon_vusanxuat">
                                    <option selected>'.$vusanxuat.'</option>
                                    <option>----------------------------</option>
                                    <option>Đông Xuân</option>
                                    <option>Hè Thu</option>
                                    <option>Thu Đông</option>
                                </select></p>';
                            $donvibon = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["donViBon"])){
                                $donvibon = $data2["object"]["kyThuatBonPhan"]["donViBon"];
                            }
                            echo '<p class="c-title3">+ Đơn vị bón: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="phanbon_donvibon">
                                    <option selected>'.$donvibon.'</option>
                                    <option>----------------------------</option>
                                    <option>kg/ha</option>
                                    <option>kg/công</option>
                                    <option>kg/1000m2</option>
                                </select></p>';
                            $thuchiencongviec = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["aiBonPhan"])){
                                $thuchiencongviec = $data2["object"]["kyThuatBonPhan"]["aiBonPhan"];
                            }
                            echo '<p class="c-title3">+ Thực hiện công việc: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="phanbon_thuchiencongviec">
                                    <option selected>'.$thuchiencongviec.'</option>
                                    <option>----------------------------</option>
                                    <option>Tự thực hiện</option>
                                    <option>Thuê mướn lao động</option>
                                </select></p>';
                            $congcuthuchien = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["congCuPhTien"])){
                                $congcuthuchien = $data2["object"]["kyThuatBonPhan"]["congCuPhTien"];
                            }
                            echo '<p class="c-title3">+ Công cụ, phương tiện: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="phanbon_congcu">
                                    <option selected>'.$congcuthuchien.'</option>
                                    <option>----------------------------</option>
                                    <option>Bón phân thủ công</option>
                                    <option>Bình phung động cơ</option>
                                    <option>Thiết bị điều khiển</option>
                                    <option>Bón phân thủ công; Bình phung động cơ</option>
                                    <option>Bón phân thủ công; Thiết bị điều khiển</option>
                                    <option>Bình phung động cơ; Thiết bị điều khiển</option>
                                    <option>Bón phân thủ công; Bình phung động cơ; Thiết bị điều khiển</option>
                                </select></p>';
                            echo '<p class="c-title3">+ Chi tiết các đợt bón phân:</p>';
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân hữu cơ: '.$data2["object"]["kyThuatBonPhan"]["pHCTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân hữu cơ: </p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_huuco_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["pHCBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_huuco_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["pHCLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["pHCLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["pHCLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["pHCLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["pHCLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_huuco_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pHCNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_huuco_note" value="'.$data2["object"]["kyThuatBonPhan"]["pHCNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_huuco_note" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân cải tạo đất: '.$data2["object"]["kyThuatBonPhan"]["pCTDTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân cải tạo đất: </p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["pCTDBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["pCTDLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["pCTDLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["pCTDLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["pCTDLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["pCTDLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_caitaodat_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pCTDNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_caitaodat_note" value="'.$data2["object"]["kyThuatBonPhan"]["pCTDNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_caitaodat_note" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Urê: '.$data2["object"]["kyThuatBonPhan"]["ureTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Urê: </p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_ure_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["ureBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_ure_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_ure_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["ureLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_ure_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_ure_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["ureLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_ure_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_ure_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["ureLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_ure_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_ure_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["ureLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_ure_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_ure_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["ureLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_ure_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["ureNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_ure_note" value="'.$data2["object"]["kyThuatBonPhan"]["ureNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_ure_note" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Lân: '.$data2["object"]["kyThuatBonPhan"]["pLanTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Lân: </p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_lan_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["pLanBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_lan_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_lan_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["pLanLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_lan_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_lan_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["pLanLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_lan_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_lan_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["pLanLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_lan_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_lan_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["pLanLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_lan_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_lan_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["pLanLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_lan_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pLanNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_lan_note" value="'.$data2["object"]["kyThuatBonPhan"]["pLanNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_lan_note" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Kali: '.$data2["object"]["kyThuatBonPhan"]["pkaliTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân Kali: </p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_kali_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["pkaliBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_kali_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_kali_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["pkaliLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_kali_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_kali_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["pkaliLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_kali_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_kali_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["pkaliLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_kali_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_kali_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["pkaliLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_kali_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_kali_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["pkaliLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_kali_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pkaliNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_kali_note" value="'.$data2["object"]["kyThuatBonPhan"]["pkaliNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_kali_note" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân DAP: '.$data2["object"]["kyThuatBonPhan"]["pdapTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân DAP: </p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_dap_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["pdapBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_dap_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_dap_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["pdapLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_dap_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_dap_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["pdapLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_dap_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_dap_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["pdapLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_dap_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_dap_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["pdapLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_dap_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_dap_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["pdapLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_dap_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["pdapNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_dap_note" value="'.$data2["object"]["kyThuatBonPhan"]["pdapNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_dap_note" value="" /></p>';
                            }
                            $tenphanNPK = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["tenPhanNPK"])){
                                $tenphanNPK = $data2["object"]["kyThuatBonPhan"]["tenPhanNPK"];
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phNpkTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân NPK: tên phân NPK: <input type = "text" class="w3-input" id="phanbon_npk_tenphan" value="'.$tenphanNPK.'" /> : '.$data2["object"]["kyThuatBonPhan"]["phNpkTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân NPK: tên phân NPK: <input type = "text" class="w3-input" id="phanbon_npk_tenphan" value="'.$tenphanNPK.'" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phNpkBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_npk_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["phNpkBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_npk_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_npk_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["nhNpkLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_npk_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_npk_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["nhNpkLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_npk_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_npk_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["nhNpkLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_npk_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_npk_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["nhNpkLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_npk_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_npk_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["nhNpkLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_npk_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phNpkTNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_npk_note" value="'.$data2["object"]["kyThuatBonPhan"]["phNpkTNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_npk_note" value="" /></p>';
                            }
                            $tenphankhac = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["tenPhKhac"])){
                                $tenphankhac = $data2["object"]["kyThuatBonPhan"]["tenPhKhac"];
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân khác: tên phân khác: <input type = "text" class="w3-input" id="phanbon_khac_tenphan" value="'.$tenphankhac.'" /> : '.$data2["object"]["kyThuatBonPhan"]["phKhacTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân khác: tên phân khác: <input type = "text" class="w3-input" id="phanbon_khac_tenphan" value="'.$tenphankhac.'" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_khac_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["phKhacBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_khac_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_khac_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["phKhacLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_khac_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_khac_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["phKhacLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_khac_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_khac_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["phKhacLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_khac_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_khac_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["phKhacLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_khac_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_khac_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["phKhacLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_khac_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phKhacNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_khac_note" value="'.$data2["object"]["kyThuatBonPhan"]["phKhacNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_khac_note" value="" /></p>';
                            }
                            $tenphanbonla = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["tenPhBL"])){
                                $tenphanbonla = $data2["object"]["kyThuatBonPhan"]["tenPhBL"];
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLTong"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân bón lá: tên phân bón lá: <input type = "text" class="w3-input" id="phanbon_phanbonla_tenphan" value="'.$tenphanbonla.'" /> : '.$data2["object"]["kyThuatBonPhan"]["phBLTong"].'</p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phân bón lá: tên phân bón lá: <input type = "text" class="w3-input" id="phanbon_phanbonla_tenphan" value="'.$tenphanbonla.'" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLBonLot"])) {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlot" value="'.$data2["object"]["kyThuatBonPhan"]["phBLBonLot"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Bón lót: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlot" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLLan1"])) {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan1" value="'.$data2["object"]["kyThuatBonPhan"]["phBLLan1"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 1: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLLan2"])) {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan2" value="'.$data2["object"]["kyThuatBonPhan"]["phBLLan2"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 2: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLLan3"])) {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan3" value="'.$data2["object"]["kyThuatBonPhan"]["phBLLan3"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 3: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLLan4"])) {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan4" value="'.$data2["object"]["kyThuatBonPhan"]["phBLLan4"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 4: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLLan5"])) {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan5" value="'.$data2["object"]["kyThuatBonPhan"]["phBLLan5"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Lần 5: <input type = "text" class="w3-input" id="phanbon_phanbonla_bonlan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["phBLNote"])) {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_phanbonla_note" value="'.$data2["object"]["kyThuatBonPhan"]["phBLNote"].' " /></p>';
                            } else {
                                echo '<p class="c-title6"></i>• Chú thích: <input type = "text" class="w3-input" id="phanbon_phanbonla_note" value="" /></p>';
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
                            $solan_truocbv="";$soluong_truocbv="";$solan_truco="";$soluong_truco="";$solan_trusau="";$soluong_trusau="";$solan_truray="";$soluong_truray="";$solan_trubenh="";$soluong_trubenh="";
                            $solan_trusautruray="";$soluong_trusautruray="";$solan_trusautrubenh="";$soluong_trusautrubenh="";$solan_truraytrubenh="";$soluong_truraytrubenh="";$solan_trusautruraytrubenh="";$soluong_trusautruraytrubenh="";$solan_bvtv_lancuoi="";$soluong_bvtv_lancuoi="";
                            if (isset($data2["object"]["thuocBVTV"]["thBV"])){
                                $solan_truocbv = $data2["object"]["thuocBVTV"]["thBV"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thBVNote"])){
                                $soluong_truocbv = $data2["object"]["thuocBVTV"]["thBVNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ ốc Bươu Vàng: <input type="text" class="w3-input" id="thuocbvtv_solanphun_buouvang" value="'.$solan_truocbv.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_buouvang" value = "'.$soluong_truocbv.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thTruCo"])){
                                $solan_truco = $data2["object"]["thuocBVTV"]["thTruCo"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thTruCoNote"])){
                                $soluong_truco = $data2["object"]["thuocBVTV"]["thTruCoNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ cỏ: <input type="text" class="w3-input" id="thuocbvtv_solanphun_truco" value="'.$solan_truco.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_truco" value = "'.$soluong_truco.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thTruSau"])){
                                $solan_trusau = $data2["object"]["thuocBVTV"]["thTruSau"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thTruSauNote"])){
                                $soluong_trusau = $data2["object"]["thuocBVTV"]["thTruSauNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ sâu: <input type="text" class="w3-input" id="thuocbvtv_solanphun_trusau" value="'.$solan_trusau.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_trusau" value = "'.$soluong_trusau.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thTruRay"])){
                                $solan_truray = $data2["object"]["thuocBVTV"]["thTruRay"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thTruRayNote"])){
                                $soluong_truray = $data2["object"]["thuocBVTV"]["thTruRayNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ rầy: <input type="text" class="w3-input" id="thuocbvtv_solanphun_truray" value="'.$solan_truray.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_truray" value = "'.$soluong_truray.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thTrBenh"])){
                                $solan_trubenh = $data2["object"]["thuocBVTV"]["thTrBenh"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thTrBenhNote"])){
                                $soluong_trubenh = $data2["object"]["thuocBVTV"]["thTrBenhNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thuốc trừ bệnh: <input type="text" class="w3-input" id="thuocbvtv_solanphun_trubenh" value="'.$solan_trubenh.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_trubenh" value = "'.$soluong_trubenh.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thSauRay"])){
                                $solan_trusautruray = $data2["object"]["thuocBVTV"]["thSauRay"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thSauRayNote"])){
                                $soluong_trusautruray = $data2["object"]["thuocBVTV"]["thSauRayNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ sâu, trừ rầy): <input type="text" class="w3-input" id="thuocbvtv_solanphun_trusautruray" value="'.$solan_trusautruray.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_trusautruray" value = "'.$soluong_trusautruray.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thSauBenh"])){
                                $solan_trusautrubenh = $data2["object"]["thuocBVTV"]["thSauBenh"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thSauBenhNote"])){
                                $soluong_trusautrubenh = $data2["object"]["thuocBVTV"]["thSauBenhNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ sâu, trừ bệnh): <input type="text" class="w3-input" id="thuocbvtv_solanphun_trusautrubenh" value="'.$solan_trusautrubenh.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_trusautrubenh" value = "'.$soluong_trusautrubenh.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thRayBenh"])){
                                $solan_truraytrubenh = $data2["object"]["thuocBVTV"]["thRayBenh"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thRayBenhNote"])){
                                $soluong_truraytrubenh = $data2["object"]["thuocBVTV"]["thRayBenhNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ rầy, trừ bệnh): <input type="text" class="w3-input" id="thuocbvtv_solanphun_truraytrubenh" value="'.$solan_truraytrubenh.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_truraytrubenh" value = "'.$soluong_truraytrubenh.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["thSauRayBenh"])){
                                $solan_trusautruraytrubenh = $data2["object"]["thuocBVTV"]["thSauRayBenh"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thSauRayBenhNote"])){
                                $soluong_trusautruraytrubenh = $data2["object"]["thuocBVTV"]["thSauRayBenhNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phối hợp thuốc( trừ sâu, trừ rầy, trừ bệnh): <input type="text" class="w3-input" id="thuocbvtv_solanphun_trusautruraytrubenh" value="'.$solan_trusautruraytrubenh.'" />  Lần/vụ, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_trusautruraytrubenh" value = "'.$soluong_trusautruraytrubenh.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["bvtvLanCuoi"])){
                                $solan_bvtv_lancuoi = $data2["object"]["thuocBVTV"]["bvtvLanCuoi"];
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvtvLanCuoiNote"])){
                                $soluong_bvtv_lancuoi = $data2["object"]["thuocBVTV"]["bvtvLanCuoiNote"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thời điểm sử dụng thuốc BVTV lần cuối (ngày trước thu hoạch): <input type="text" class="w3-input" id="thuocbvtv_solanphun_lancuoi" value="'.$solan_bvtv_lancuoi.'" />   Lần, phun  <input type = "text" class="w3-input" id="thuocbvtv_soluong_lancuoi" value = "'.$soluong_bvtv_lancuoi.'" />  lít/lần/ha</p>';
                            if (isset($data2["object"]["thuocBVTV"]["phunDinhKy"]) && $data2["object"]["thuocBVTV"]["phunDinhKy"] == 1){
                                echo '<p class="c-title3">+ Phun định kỳ: <select class="w3-select" id="thuocbvtv_phundinhky">
                                    <option selected value = "1">Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Phun định kỳ: <select class="w3-select" id="thuocbvtv_phundinhky">
                                    <option selected value = "0">Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["thGianPhun"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thời gian phun: <input type="date" class="w3-input" id="thuocbvtv_phundinhky_thoigianphun" value="'.$data2["object"]["thuocBVTV"]["thGianPhun"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thời gian phun: <input type="date" class="w3-input" id="thuocbvtv_phundinhky_thoigianphun" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["LyDoPhun"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lý do phun: <input type="text" class="w3-input" id="thuocbvtv_phundinhky_lydophun" value="'.$data2["object"]["thuocBVTV"]["LyDoPhun"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lý do phun: <input type="text" class="w3-input" id="thuocbvtv_phundinhky_lydophun" value="" /></p>';
                            }
                            echo '<p class="c-title3">+ Phun theo thời điểm: </p>';
                            if (isset($data2["object"]["thuocBVTV"]["phunLan01"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 1: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan1" value="'.$data2["object"]["thuocBVTV"]["phunLan01"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 1: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan1" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan02"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 2: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan2" value="'.$data2["object"]["thuocBVTV"]["phunLan02"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 2: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan2" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan03"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 3: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan3" value="'.$data2["object"]["thuocBVTV"]["phunLan03"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 3: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan3" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan04"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 4: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan4" value="'.$data2["object"]["thuocBVTV"]["phunLan04"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 4: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan4" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan05"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 5: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan5" value="'.$data2["object"]["thuocBVTV"]["phunLan05"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 5: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan5" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan06"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 6: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan6" value="'.$data2["object"]["thuocBVTV"]["phunLan06"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 6: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan6" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan07"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 7: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan7" value="'.$data2["object"]["thuocBVTV"]["phunLan07"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 7: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan7" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan08"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 8: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan8" value="'.$data2["object"]["thuocBVTV"]["phunLan08"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 8: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan8" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan09"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 9: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan9" value="'.$data2["object"]["thuocBVTV"]["phunLan09"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 9: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan9" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunLan10"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 10: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan10" value="'.$data2["object"]["thuocBVTV"]["phunLan10"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Lần 10: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lan10" value="" /></p>';
                            }

                            if (isset($data2["object"]["thuocBVTV"]["lyDoPhunLucNay"])){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i>Lý do phun: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lydophun" value="'.$data2["object"]["thuocBVTV"]["lyDoPhunLucNay"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i>Lý do phun: <input type="text" class="w3-input" id="thuocbvtv_phunthoidiem_lydophun" value="" /></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["phunThKhi"])){
                                echo '<p class="c-title3">+ Phun thuốc khi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thuocbvtv_phunthuockhi">
                                    <option selected>'.$data2["object"]["thuocBVTV"]["phunThKhi"].'</option>
                                    <option>----------------------------</option>
                                    <option>Có sâu</option>
                                    <option>Có rầy</option>
                                    <option>Có bệnh</option>
                                    <option>Có sâu; Có rầy</option>
                                    <option>Có sâu; Có bệnh</option>
                                    <option>Có rầy; Có bệnh</option>
                                    <option>Có sâu; Có rầy; Có bệnh</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Phun thuốc khi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thuocbvtv_phunthuockhi">
                                    <option selected> </option>
                                    <option>----------------------------</option>
                                    <option>Có sâu</option>
                                    <option>Có rầy</option>
                                    <option>Có bệnh</option>
                                    <option>Có sâu; Có rầy</option>
                                    <option>Có sâu; Có bệnh</option>
                                    <option>Có rầy; Có bệnh</option>
                                    <option>Có sâu; Có rầy; Có bệnh</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["aiPhunTh"])){
                                echo '<p class="c-title3">+ Thực hiện công việc: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thuocbvtv_thuchiencongviec">
                                    <option selected>'.$data2["object"]["thuocBVTV"]["aiPhunTh"].'</option>
                                    <option>----------------------------</option>
                                    <option>Tự thực hiện</option>
                                    <option>Thuê mướn lao động</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Thực hiện công việc: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thuocbvtv_thuchiencongviec">
                                    <option selected>Ai p</option>
                                    <option>----------------------------</option>
                                    <option>Tự thực hiện</option>
                                    <option>Thuê mướn lao động</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["congCuPhun"])){
                                echo '<p class="c-title3">+ Phương tiện thực hiện: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thuocbvtv_phuongtien">
                                    <option selected>'.$data2["object"]["thuocBVTV"]["congCuPhun"].'</option>
                                    <option>----------------------------</option>
                                    <option>Bình phun thủ công</option>
                                    <option>Bình phun tự động</option>
                                    <option>Thiết bị điều khiển (Drone)</option>
                                    <option>Bình phun thủ công; Bình phun tự động</option>
                                    <option>Bình phun thủ công; Thiết bị điều khiển (Drone)</option>
                                    <option>Bình phun tự động; Thiết bị điều khiển (Drone)</option>
                                    <option>Bình phun thủ công; Bình phun tự động; Thiết bị điều khiển (Drone)</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Phương tiện thực hiện: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thuocbvtv_phuongtien">
                                    <option selected></option>
                                    <option>----------------------------</option>
                                    <option>Bình phun thủ công</option>
                                    <option>Bình phun tự động</option>
                                    <option>Thiết bị điều khiển (Drone)</option>
                                    <option>Bình phun thủ công; Bình phun tự động</option>
                                    <option>Bình phun thủ công; Thiết bị điều khiển (Drone)</option>
                                    <option>Bình phun tự động; Thiết bị điều khiển (Drone)</option>
                                    <option>Bình phun thủ công; Bình phun tự động; Thiết bị điều khiển (Drone)</option>
                                </select></p>';
                            }
                            echo '<p class="c-title1">5. Thu hoạch:</p>';
                            $thuhoach_hethu = "";$thuhoach_thudong = "";$thuhoach_dongxuan = "";$thuhoach_xuanhe = "";
                            if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach01"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach02"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach03"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach04"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach05"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach06"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach07"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach08"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach09"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach10"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach11"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["heThuThuHoach12"])){
                                $thuhoach_hethu = check_len_day($data2["object"]["thoiVuCanhTac"]["heThuThuHoach12"]).'/12'.'/'.$current_year;
                            }
                            if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach01"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach02"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach03"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach04"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach05"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach06"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach07"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach08"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach09"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach10"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach11"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach12"])){
                                $thuhoach_thudong = check_len_day($data2["object"]["thoiVuCanhTac"]["thuDongThuHoach12"]).'/12'.'/'.$current_year;
                            }
                            if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach01"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach02"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach03"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach04"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach05"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach06"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach07"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach08"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach09"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach10"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach11"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach12"])){
                                $thuhoach_dongxuan = check_len_day($data2["object"]["thoiVuCanhTac"]["dongXuanThuHoach12"]).'/12'.'/'.$current_year;
                            }
                            if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach01"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach01"]).'/01'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach02"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach02"]).'/02'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach03"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach03"]).'/03'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach04"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach04"]).'/04'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach05"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach05"]).'/05'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach06"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach06"]).'/06'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach07"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach07"]).'/07'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach08"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach08"]).'/08'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach09"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach09"]).'/09'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach10"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach10"]).'/10'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach11"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach11"]).'/11'.'/'.$current_year;
                            } else if(isset($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach12"])){
                                $thuhoach_xuanhe = check_len_day($data2["object"]["thoiVuCanhTac"]["xuanHeThuHoach12"]).'/12'.'/'.$current_year;
                            }
                            echo '<p class="c-title3">+ Thời gian thu hoạch vụ sản xuất: </p>';
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Hè Thu: <input type="date" class="w3-input" id="thuhoach_hethu" value="'.convertdate($thuhoach_hethu).'" /></p>';
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thu Đông: <input type="date" class="w3-input" id="thuhoach_thudong" value="'.convertdate($thuhoach_thudong).'" /></p>';
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Đông Xuân: <input type="date" class="w3-input" id="thuhoach_dongxuan" value="'.convertdate($thuhoach_dongxuan).'" /></p>';
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Xuân Hè	: <input type="date" class="w3-input" id="thuhoach_xuanhe" value="'.convertdate($thuhoach_xuanhe).'" /></p>';
                            if (isset($data2["object"]["hieuQuaKinhTe"]["luaNsBq"])){
                                echo '<p class="c-title3">+ Năng suất bình quân: <input type="text" class="w3-input" id="nangsuatbinhquan" value="'.$data2["object"]["hieuQuaKinhTe"]["luaNsBq"].'" /> kg/ha</p>';
                            } else {
                                
                                echo '<p class="c-title3">+ Năng suất bình quân: <input type="text" class="w3-input" id="nangsuatbinhquan" value="" /></p>';
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
    <div title="Về đầu trang" id="top-up">
    <i class="fas fa-arrow-circle-up"></i></div>
    <script>
        var offset = 50;
        var duration = 500;
        function check_number(numberphone){
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if (vnf_regex.test(numberphone) == false){
                return 0;
            } else {
                return 1;
            }
        }
        $(function(){
            $(window).scroll(function () {
                if ($(this).scrollTop() > offset)
                $('#top-up').fadeIn(duration);else
                $('#top-up').fadeOut(duration);
            });
            $('#top-up').click(function () {
                $('body,html').animate({scrollTop: 0}, duration);
            });
            $("#capnhatthongtinvungtrong").click(function(){
                var sodienthoai = '0' + <?php echo $_GET['SODIENTHOAI'] ?>;
                var thoivu_hethu = $("#thoivu_hethu").val();
                var thoivu_thudong = $("#thoivu_thudong").val();
                var thoivu_dongxuan =$("#thoivu_dongxuan").val();
                var thoivu_xuanhe = $("#thoivu_xuanhe").val();
                var phanbon_tongphanbon = $("#phanbon_tongphanbon").val();
                var phanbon_vusanxuat = $("#phanbon_vusanxuat option:selected").text();
                var phanbon_donvibon = $("#phanbon_donvibon option:selected").text();
                var phanbon_thuchiencongviec = $("#phanbon_thuchiencongviec option:selected").text();
                var phanbon_congcu = $("#phanbon_congcu option:selected").text();
                var phanbon_huuco_bonlot = $("#phanbon_huuco_bonlot").val();
                var phanbon_huuco_bonlan1 = $("#phanbon_huuco_bonlan1").val();
                var phanbon_huuco_bonlan2 = $("#phanbon_huuco_bonlan2").val();
                var phanbon_huuco_bonlan3 = $("#phanbon_huuco_bonlan3").val();
                var phanbon_huuco_bonlan4 = $("#phanbon_huuco_bonlan4").val();
                var phanbon_huuco_bonlan5 = $("#phanbon_huuco_bonlan5").val();
                var phanbon_huuco_note = $("#phanbon_huuco_note").val();
                var phanbon_caitaodat_bonlot = $("#phanbon_caitaodat_bonlot").val();
                var phanbon_caitaodat_bonlan1 = $("#phanbon_caitaodat_bonlan1").val();
                var phanbon_caitaodat_bonlan2 = $("#phanbon_caitaodat_bonlan2").val();
                var phanbon_caitaodat_bonlan3 = $("#phanbon_caitaodat_bonlan3").val();
                var phanbon_caitaodat_bonlan4 = $("#phanbon_caitaodat_bonlan4").val();
                var phanbon_caitaodat_bonlan5 = $("#phanbon_caitaodat_bonlan5").val();
                var phanbon_caitaodat_note = $("#phanbon_caitaodat_note").val();
                var phanbon_ure_bonlot = $("#phanbon_ure_bonlot").val();
                var phanbon_ure_bonlan1 = $("#phanbon_ure_bonlan1").val();
                var phanbon_ure_bonlan2 = $("#phanbon_ure_bonlan2").val();
                var phanbon_ure_bonlan3 = $("#phanbon_ure_bonlan3").val();
                var phanbon_ure_bonlan4 = $("#phanbon_ure_bonlan4").val();
                var phanbon_ure_bonlan5 = $("#phanbon_ure_bonlan5").val();
                var phanbon_ure_note = $("#phanbon_ure_note").val();
                var phanbon_lan_bonlot = $("#phanbon_lan_bonlot").val();
                var phanbon_lan_bonlan1 = $("#phanbon_lan_bonlan1").val();
                var phanbon_lan_bonlan2 = $("#phanbon_lan_bonlan2").val();
                var phanbon_lan_bonlan3 = $("#phanbon_lan_bonlan3").val();
                var phanbon_lan_bonlan4 = $("#phanbon_lan_bonlan4").val();
                var phanbon_lan_bonlan5 = $("#phanbon_lan_bonlan5").val();
                var phanbon_lan_note = $("#phanbon_lan_note").val();
                var phanbon_kali_bonlot = $("#phanbon_kali_bonlot").val();
                var phanbon_kali_bonlan1 = $("#phanbon_kali_bonlan1").val();
                var phanbon_kali_bonlan2 = $("#phanbon_kali_bonlan2").val();
                var phanbon_kali_bonlan3 = $("#phanbon_kali_bonlan3").val();
                var phanbon_kali_bonlan4 = $("#phanbon_kali_bonlan4").val();
                var phanbon_kali_bonlan5 = $("#phanbon_kali_bonlan5").val();
                var phanbon_kali_note = $("#phanbon_kali_note").val();
                var phanbon_dap_bonlot = $("#phanbon_dap_bonlot").val();
                var phanbon_dap_bonlan1 = $("#phanbon_dap_bonlan1").val();
                var phanbon_dap_bonlan2 = $("#phanbon_dap_bonlan2").val();
                var phanbon_dap_bonlan3 = $("#phanbon_dap_bonlan3").val();
                var phanbon_dap_bonlan4 = $("#phanbon_dap_bonlan4").val();
                var phanbon_dap_bonlan5 = $("#phanbon_dap_bonlan5").val();
                var phanbon_dap_note = $("#phanbon_dap_note").val();
                var phanbon_npk_tenphan = $("#phanbon_npk_tenphan").val();
                var phanbon_npk_bonlot = $("#phanbon_npk_bonlot").val();
                var phanbon_npk_bonlan1 = $("#phanbon_npk_bonlan1").val();
                var phanbon_npk_bonlan2 = $("#phanbon_npk_bonlan2").val();
                var phanbon_npk_bonlan3 = $("#phanbon_npk_bonlan3").val();
                var phanbon_npk_bonlan4 = $("#phanbon_npk_bonlan4").val();
                var phanbon_npk_bonlan5 = $("#phanbon_npk_bonlan5").val();
                var phanbon_npk_note = $("#phanbon_npk_note").val();
                var phanbon_khac_tenphan = $("#phanbon_khac_tenphan").val();
                var phanbon_khac_bonlot = $("#phanbon_khac_bonlot").val();
                var phanbon_khac_bonlan1 = $("#phanbon_khac_bonlan1").val();
                var phanbon_khac_bonlan2 = $("#phanbon_khac_bonlan2").val();
                var phanbon_khac_bonlan3 = $("#phanbon_khac_bonlan3").val();
                var phanbon_khac_bonlan4 = $("#phanbon_khac_bonlan4").val();
                var phanbon_khac_bonlan5 = $("#phanbon_khac_bonlan5").val();
                var phanbon_khac_note = $("#phanbon_khac_note").val();
                var phanbon_phanbonla_tenphan = $("#phanbon_phanbonla_tenphan").val();
                var phanbon_phanbonla_bonlot = $("#phanbon_phanbonla_bonlot").val();
                var phanbon_phanbonla_bonlan1 = $("#phanbon_phanbonla_bonlan1").val();
                var phanbon_phanbonla_bonlan2 = $("#phanbon_phanbonla_bonlan2").val();
                var phanbon_phanbonla_bonlan3 = $("#phanbon_phanbonla_bonlan3").val();
                var phanbon_phanbonla_bonlan4 = $("#phanbon_phanbonla_bonlan4").val();
                var phanbon_phanbonla_bonlan5 = $("#phanbon_phanbonla_bonlan5").val();
                var phanbon_phanbonla_note = $("#phanbon_phanbonla_note").val();
                var thuocbvtv_solanphun_buouvang = $("#thuocbvtv_solanphun_buouvang").val();
                var thuocbvtv_soluong_buouvang = $("#thuocbvtv_soluong_buouvang").val();
                var thuocbvtv_solanphun_truco = $("#thuocbvtv_solanphun_truco").val();
                var thuocbvtv_soluong_truco = $("#thuocbvtv_soluong_truco").val();
                var thuocbvtv_solanphun_trusau = $("#thuocbvtv_solanphun_trusau").val();
                var thuocbvtv_soluong_trusau = $("#thuocbvtv_soluong_trusau").val();
                var thuocbvtv_solanphun_truray = $("#thuocbvtv_solanphun_truray").val();
                var thuocbvtv_soluong_truray = $("#thuocbvtv_soluong_truray").val();
                var thuocbvtv_solanphun_trubenh = $("#thuocbvtv_solanphun_trubenh").val();
                var thuocbvtv_soluong_trubenh = $("#thuocbvtv_soluong_trubenh").val();
                var thuocbvtv_solanphun_trusautruray = $("#thuocbvtv_solanphun_trusautruray").val();
                var thuocbvtv_soluong_trusautruray = $("#thuocbvtv_soluong_trusautruray").val();
                var thuocbvtv_solanphun_trusautrubenh = $("#thuocbvtv_solanphun_trusautrubenh").val();
                var thuocbvtv_soluong_trusautrubenh = $("#thuocbvtv_soluong_trusautrubenh").val();
                var thuocbvtv_solanphun_truraytrubenh = $("#thuocbvtv_solanphun_truraytrubenh").val();
                var thuocbvtv_soluong_truraytrubenh = $("#thuocbvtv_soluong_truraytrubenh").val();
                var thuocbvtv_solanphun_trusautruraytrubenh = $("#thuocbvtv_solanphun_trusautruraytrubenh").val();
                var thuocbvtv_soluong_trusautruraytrubenh = $("#thuocbvtv_soluong_trusautruraytrubenh").val();
                var thuocbvtv_solanphun_lancuoi = $("#thuocbvtv_solanphun_lancuoi").val();
                var thuocbvtv_soluong_lancuoi = $("#thuocbvtv_soluong_lancuoi").val();
                var thuocbvtv_phundinhky = $("#thuocbvtv_phundinhky").val();
                var thuocbvtv_phundinhky_thoigianphun = $("#thuocbvtv_phundinhky_thoigianphun").val();
                var thuocbvtv_phundinhky_lydophun = $("#thuocbvtv_phundinhky_lydophun").val();
                var thuocbvtv_phunthoidiem_lan1 = $("#thuocbvtv_phunthoidiem_lan1").val();
                var thuocbvtv_phunthoidiem_lan2 = $("#thuocbvtv_phunthoidiem_lan2").val();
                var thuocbvtv_phunthoidiem_lan3 = $("#thuocbvtv_phunthoidiem_lan3").val();
                var thuocbvtv_phunthoidiem_lan4 = $("#thuocbvtv_phunthoidiem_lan4").val();
                var thuocbvtv_phunthoidiem_lan5 = $("#thuocbvtv_phunthoidiem_lan5").val();
                var thuocbvtv_phunthoidiem_lan6 = $("#thuocbvtv_phunthoidiem_lan6").val();
                var thuocbvtv_phunthoidiem_lan7 = $("#thuocbvtv_phunthoidiem_lan7").val();
                var thuocbvtv_phunthoidiem_lan8 = $("#thuocbvtv_phunthoidiem_lan8").val();
                var thuocbvtv_phunthoidiem_lan9 = $("#thuocbvtv_phunthoidiem_lan9").val();
                var thuocbvtv_phunthoidiem_lan10 = $("#thuocbvtv_phunthoidiem_lan10").val();
                var thuocbvtv_phunthoidiem_lydophun = $("#thuocbvtv_phunthoidiem_lydophun").val();
                var thuocbvtv_phunthuockhi = $("#thuocbvtv_phunthuockhi option:selected").text();
                var thuocbvtv_thuchiencongviec = $("#thuocbvtv_thuchiencongviec option:selected").text();
                var thuocbvtv_phuongtien = $("#thuocbvtv_phuongtien option:selected").text();
                var thuhoach_hethu = $("#thuhoach_hethu").val();
                var thuhoach_thudong = $("#thuhoach_thudong").val();
                var thuhoach_dongxuan = $("#thuhoach_dongxuan").val();
                var thuhoach_xuanhe = $("#thuhoach_xuanhe").val();
                var nangsuatbinhquan = $("#nangsuatbinhquan").val();
                if(check_number(sodienthoai) == 0){
                    alert("Không có thông tin! Vui lòng kiểm tra lại!");
                } else if (phanbon_vusanxuat == "") {
                    alert("Phân bón và kỹ thuật bón phân -> Vụ sản xuất đang trống");
                    document.getElementById("phanbon_vusanxuat").focus();
                } else if (phanbon_donvibon == ""){
                    alert("Phân bón và kỹ thuật bón phân -> Đơn vị bón đang trống");
                    document.getElementById("phanbon_donvibon").focus();
                } else if (phanbon_thuchiencongviec == ""){
                    alert("Phân bón và kỹ thuật bón phân -> Thực hiện công việc đang trống");
                    document.getElementById("phanbon_thuchiencongviec").focus();
                } else if (phanbon_congcu == ""){
                    alert("Phân bón và kỹ thuật bón phân -> Công cụ, phương tiện đang trống");
                    document.getElementById("phanbon_congcu").focus();
                } else if (thuocbvtv_phunthuockhi == ""){
                    alert("Sử dụng thuốc BVTV -> Phun thuốc khi đang trống");
                    document.getElementById("thuocbvtv_phunthuockhi").focus();
                } else if (thuocbvtv_thuchiencongviec == ""){
                    alert("Sử dụng thuốc BVTV -> Thực hiện công việc đang trống");
                    document.getElementById("thuocbvtv_thuchiencongviec").focus();
                } else if (thuocbvtv_phuongtien == ""){
                    alert("Sử dụng thuốc BVTV -> Công cụ, phương tiện đang trống");
                    document.getElementById("thuocbvtv_phuongtien").focus();
                } else {
                    $.ajax({
                        type: 'POST',
                        url: 'go',
                        data: {
                            for: "_suathongtinvungtrong",
                            sodienthoai: sodienthoai,
                            thoivu_hethu: thoivu_hethu,
                            thoivu_thudong: thoivu_thudong,
                            thoivu_dongxuan: thoivu_dongxuan,
                            thoivu_xuanhe: thoivu_xuanhe,
                            phanbon_tongphanbon: phanbon_tongphanbon,
                            phanbon_vusanxuat: phanbon_vusanxuat,
                            phanbon_donvibon: phanbon_donvibon,
                            phanbon_thuchiencongviec: phanbon_thuchiencongviec,
                            phanbon_congcu: phanbon_congcu,
                            phanbon_huuco_bonlot: phanbon_huuco_bonlot,
                            phanbon_huuco_bonlan1: phanbon_huuco_bonlan1,
                            phanbon_huuco_bonlan2: phanbon_huuco_bonlan2,
                            phanbon_huuco_bonlan3: phanbon_huuco_bonlan3,
                            phanbon_huuco_bonlan4: phanbon_huuco_bonlan4,
                            phanbon_huuco_bonlan5: phanbon_huuco_bonlan5,
                            phanbon_huuco_note: phanbon_huuco_note,
                            phanbon_caitaodat_bonlot: phanbon_caitaodat_bonlot,
                            phanbon_caitaodat_bonlan1: phanbon_caitaodat_bonlan1,
                            phanbon_caitaodat_bonlan2: phanbon_caitaodat_bonlan2,
                            phanbon_caitaodat_bonlan3: phanbon_caitaodat_bonlan3,
                            phanbon_caitaodat_bonlan4: phanbon_caitaodat_bonlan4,
                            phanbon_caitaodat_bonlan5: phanbon_caitaodat_bonlan5,
                            phanbon_caitaodat_note: phanbon_caitaodat_note,
                            phanbon_ure_bonlot: phanbon_ure_bonlot,
                            phanbon_ure_bonlan1: phanbon_ure_bonlan1,
                            phanbon_ure_bonlan2: phanbon_ure_bonlan2,
                            phanbon_ure_bonlan3: phanbon_ure_bonlan3,
                            phanbon_ure_bonlan4: phanbon_ure_bonlan4,
                            phanbon_ure_bonlan5: phanbon_ure_bonlan5,
                            phanbon_ure_note: phanbon_ure_note,
                            phanbon_lan_bonlot: phanbon_lan_bonlot,
                            phanbon_lan_bonlan1: phanbon_lan_bonlan1,
                            phanbon_lan_bonlan2: phanbon_lan_bonlan2,
                            phanbon_lan_bonlan3: phanbon_lan_bonlan3,
                            phanbon_lan_bonlan4: phanbon_lan_bonlan4,
                            phanbon_lan_bonlan5: phanbon_lan_bonlan5,
                            phanbon_lan_note: phanbon_lan_note,
                            phanbon_kali_bonlot: phanbon_kali_bonlot,
                            phanbon_kali_bonlan1: phanbon_kali_bonlan1,
                            phanbon_kali_bonlan2: phanbon_kali_bonlan2,
                            phanbon_kali_bonlan3: phanbon_kali_bonlan3,
                            phanbon_kali_bonlan4: phanbon_kali_bonlan4,
                            phanbon_kali_bonlan5: phanbon_kali_bonlan5,
                            phanbon_kali_note: phanbon_kali_note,
                            phanbon_dap_bonlot: phanbon_dap_bonlot,
                            phanbon_dap_bonlan1: phanbon_dap_bonlan1,
                            phanbon_dap_bonlan2: phanbon_dap_bonlan2,
                            phanbon_dap_bonlan3: phanbon_dap_bonlan3,
                            phanbon_dap_bonlan4: phanbon_dap_bonlan4,
                            phanbon_dap_bonlan5: phanbon_dap_bonlan5,
                            phanbon_dap_note: phanbon_dap_note,
                            phanbon_npk_tenphan: phanbon_npk_tenphan,
                            phanbon_npk_bonlot: phanbon_npk_bonlot,
                            phanbon_npk_bonlan1: phanbon_npk_bonlan1,
                            phanbon_npk_bonlan2: phanbon_npk_bonlan2,
                            phanbon_npk_bonlan3: phanbon_npk_bonlan3,
                            phanbon_npk_bonlan4: phanbon_npk_bonlan4,
                            phanbon_npk_bonlan5: phanbon_npk_bonlan5,
                            phanbon_npk_note: phanbon_npk_note,
                            phanbon_khac_tenphan: phanbon_khac_tenphan,
                            phanbon_khac_bonlot: phanbon_khac_bonlot,
                            phanbon_khac_bonlan1: phanbon_khac_bonlan1,
                            phanbon_khac_bonlan2: phanbon_khac_bonlan2,
                            phanbon_khac_bonlan3: phanbon_khac_bonlan3,
                            phanbon_khac_bonlan4: phanbon_khac_bonlan4,
                            phanbon_khac_bonlan5: phanbon_khac_bonlan5,
                            phanbon_khac_note: phanbon_khac_note,
                            phanbon_phanbonla_tenphan: phanbon_phanbonla_tenphan,
                            phanbon_phanbonla_bonlot: phanbon_phanbonla_bonlot,
                            phanbon_phanbonla_bonlan1: phanbon_phanbonla_bonlan1,
                            phanbon_phanbonla_bonlan2: phanbon_phanbonla_bonlan2,
                            phanbon_phanbonla_bonlan3: phanbon_phanbonla_bonlan3,
                            phanbon_phanbonla_bonlan4: phanbon_phanbonla_bonlan4,
                            phanbon_phanbonla_bonlan5: phanbon_phanbonla_bonlan5,
                            phanbon_phanbonla_note: phanbon_phanbonla_note,
                            thuocbvtv_solanphun_buouvang: thuocbvtv_solanphun_buouvang,
                            thuocbvtv_soluong_buouvang: thuocbvtv_soluong_buouvang,
                            thuocbvtv_solanphun_truco: thuocbvtv_solanphun_truco,
                            thuocbvtv_soluong_truco: thuocbvtv_soluong_truco,
                            thuocbvtv_solanphun_trusau: thuocbvtv_solanphun_trusau,
                            thuocbvtv_soluong_trusau: thuocbvtv_soluong_trusau,
                            thuocbvtv_solanphun_truray: thuocbvtv_solanphun_truray,
                            thuocbvtv_soluong_truray: thuocbvtv_soluong_truray,
                            thuocbvtv_solanphun_trubenh: thuocbvtv_solanphun_trubenh,
                            thuocbvtv_soluong_trubenh: thuocbvtv_soluong_trubenh,
                            thuocbvtv_solanphun_trusautruray: thuocbvtv_solanphun_trusautruray,
                            thuocbvtv_soluong_trusautruray: thuocbvtv_soluong_trusautruray,
                            thuocbvtv_solanphun_trusautrubenh: thuocbvtv_solanphun_trusautrubenh,
                            thuocbvtv_soluong_trusautrubenh: thuocbvtv_soluong_trusautrubenh,
                            thuocbvtv_solanphun_truraytrubenh: thuocbvtv_solanphun_truraytrubenh,
                            thuocbvtv_soluong_truraytrubenh: thuocbvtv_soluong_truraytrubenh,
                            thuocbvtv_solanphun_trusautruraytrubenh: thuocbvtv_solanphun_trusautruraytrubenh,
                            thuocbvtv_soluong_trusautruraytrubenh: thuocbvtv_soluong_trusautruraytrubenh,
                            thuocbvtv_solanphun_lancuoi: thuocbvtv_solanphun_lancuoi,
                            thuocbvtv_soluong_lancuoi: thuocbvtv_soluong_lancuoi,
                            thuocbvtv_phundinhky: thuocbvtv_phundinhky,
                            thuocbvtv_phundinhky_thoigianphun: thuocbvtv_phundinhky_thoigianphun,
                            thuocbvtv_phundinhky_lydophun: thuocbvtv_phundinhky_lydophun,
                            thuocbvtv_phunthoidiem_lan1: thuocbvtv_phunthoidiem_lan1,
                            thuocbvtv_phunthoidiem_lan2: thuocbvtv_phunthoidiem_lan2,
                            thuocbvtv_phunthoidiem_lan3: thuocbvtv_phunthoidiem_lan3,
                            thuocbvtv_phunthoidiem_lan4: thuocbvtv_phunthoidiem_lan4,
                            thuocbvtv_phunthoidiem_lan5: thuocbvtv_phunthoidiem_lan5,
                            thuocbvtv_phunthoidiem_lan6: thuocbvtv_phunthoidiem_lan6,
                            thuocbvtv_phunthoidiem_lan7: thuocbvtv_phunthoidiem_lan7,
                            thuocbvtv_phunthoidiem_lan8: thuocbvtv_phunthoidiem_lan8,
                            thuocbvtv_phunthoidiem_lan9: thuocbvtv_phunthoidiem_lan9,
                            thuocbvtv_phunthoidiem_lan10: thuocbvtv_phunthoidiem_lan10,
                            thuocbvtv_phunthoidiem_lydophun: thuocbvtv_phunthoidiem_lydophun,
                            thuocbvtv_phunthuockhi: thuocbvtv_phunthuockhi,
                            thuocbvtv_thuchiencongviec: thuocbvtv_thuchiencongviec,
                            thuocbvtv_phuongtien: thuocbvtv_phuongtien,
                            thuhoach_hethu: thuhoach_hethu,
                            thuhoach_thudong: thuhoach_thudong,
                            thuhoach_dongxuan: thuhoach_dongxuan,
                            thuhoach_xuanhe: thuhoach_xuanhe,
                            nangsuatbinhquan: nangsuatbinhquan,
                            key: "Vnpt@123"
                        }
                    }).done(function(data){
                        var jsonData = JSON.parse(data);   
                        if (jsonData.code == 200){
                            alert("Cập nhật thành công!");
                        } else {
                            alert("Cập nhật thất bại!");
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>