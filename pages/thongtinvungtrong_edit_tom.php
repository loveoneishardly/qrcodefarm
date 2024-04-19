<!DOCTYPE html>
<html>
    <head>
        <title>Cập nhật vùng nuôi tôm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
        <link href="lib/css/app_style.css" rel="stylesheet"/>
        <script src="lib/js/jquery-1.11.1.min.js"></script>
        <script src="lib/js/cute-alert.js"></script>
        <script src="lib/js/warning.js?v=5"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <link href="lib/css/style.css" rel="stylesheet">
        
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
        #capnhatthongtinvungtrong_tom{
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
        #tooltip {
    display: none;
    position: absolute;
    padding: 5px;
    background-color: black;
    color: white;
    border-radius: 5px;
    z-index: 1000; /* Đảm bảo tooltip hiển thị trên các phần tử khác */
}
    </style>
<body>
    <header>
        <div class="w3-container w3-green">
            <h1>CẬP NHẬT VÙNG NUÔI TÔM</h1>
        </div>
    </header>
    <div class="w3-container w3-display-right">
        <input  type="button" value="CẬP NHẬT" id="capnhatthongtinvungtrong_tom" /><br>
        <span style="color:red;font-weight: bold;">(*) là bắt buộc</span>
    </div>
    <div id="tooltip" style="display: none; position: absolute; padding: 5px; background-color: black; color: white; border-radius: 5px;">Tooltip</div>

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
                            $thongtinsanpham = "";
                            if (isset($data1["object"]["thongTinSanXuat"]["doiTuongSxTom"])){
                                $thongtinsanpham = $data1["object"]["thongTinSanXuat"]["doiTuongSxTom"];
                            }
                            echo '<p><b>4. Thông tin sản phẩm:</b> <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_thongtinsp">
                                    <option selected>'.$thongtinsanpham.'</option>
                                    <option>----------------------------</option>
                                    <option>Tôm sú</option>
                                    <option>Tôm thẻ chân trắng</option>
                                    <option>Tôm khác</option>
                                </select></p>';
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
                            if (isset($data2["object"]["thongTinChung"]["dienTichTom"])){
                                echo '<p class="c-title5">- Diện tích canh tác: <input type = "text" class="w3-input" id="thongtinchung_dientich" value="'.$data2["object"]["thongTinChung"]["dienTichTom"].'" /> ha</p>'; 
                            } else {
                                echo '<p class="c-title5">- Diện tích canh tác: <input type = "text" class="w3-input" id="thongtinchung_dientich" value="" /> ha</p>';
                            }
                            if (isset($data2["object"]["thongTinChung"]["dienTichTomSu"])){
                                echo '<p class="c-title3">+ Tôm sú: <input type = "text" class="w3-input" id="thongtinchung_dientichtomsu" value="'.$data2["object"]["thongTinChung"]["dienTichTomSu"].'" /> ha</p>'; 
                            } else {
                                echo '<p class="c-title3">+ Tôm sú: <input type = "text" class="w3-input" id="thongtinchung_dientichtomsu" value="" /> ha</p>';
                            }
                            if (isset($data2["object"]["thongTinChung"]["dienTichTomTct"])){
                                echo '<p class="c-title3">+ Tôm TCT: <input type = "text" class="w3-input" id="thongtinchung_dientichtomtct" value="'.$data2["object"]["thongTinChung"]["dienTichTomTct"].'" /> ha</p>'; 
                            } else {
                                echo '<p class="c-title3">+ Tôm TCT: <input type = "text" class="w3-input" id="thongtinchung_dientichtomtct" value="" /> ha</p>';
                            }
                            $tom_loaihinhsx = "";
                            if (isset($data1["object"]["thongTinSanXuat"]["loaiHinhSxTom"])){
                                $tom_loaihinhsx = $data1["object"]["thongTinSanXuat"]["loaiHinhSxTom"];
                            }
                            echo '<p class="c-title5">- Loại hình sản xuất: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thongtinchung_loaihinhsxtom">
                                    <option selected>'.$tom_loaihinhsx.'</option>
                                    <option>----------------------------</option>
                                    <option>Quảng canh</option>
                                    <option>Quảng canh cải tiến</option>
                                    <option>Thâm canh</option>
                                    <option>Bán thâm canh</option>
                                    <option>Khác</option>
                                </select></p>';
                            echo '<p class="c-title5">- Loại đất sản xuất:</p>';
                            $tom_loaidat = "";
                            if (isset($data1["object"]["thongTinSanXuat"]["loaiDatTom"])){
                                $tom_loaidat = $data1["object"]["thongTinSanXuat"]["loaiDatTom"];
                            }
                            echo '<p class="c-title3">+ Loại đất: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thongtinchung_loaidatsx">
                                    <option selected>'.$tom_loaidat.'</option>
                                    <option>----------------------------</option>
                                    <option>Phù sa</option>
                                    <option>Mặn</option>
                                    <option>Phèn</option>
                                </select></p>';
                            $tom_sacaudat = "";
                            if (isset($data1["object"]["thongTinSanXuat"]["saCauDatTom"])){
                                $tom_sacaudat = $data1["object"]["thongTinSanXuat"]["saCauDatTom"];
                            }
                            echo '<p class="c-title3">+ Sa cấu đất: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="thongtinchung_sacaudat">
                                    <option selected>'.$tom_sacaudat.'</option>
                                    <option>----------------------------</option>
                                    <option>Thịt</option>
                                    <option>Sét</option>
                                    <option>Cát</option>
                                    <option>Thịt pha cát</option>
                                </select></p>';
                            if (isset($data2["object"]["thongTinSanXuat"]["doPhTrungBinh"])){
                                echo '<p class="c-title3">+ Độ PH trung bình: <input type = "text" class="w3-input" id="thongtinchung_dophtrungbinh" value="'.$data2["object"]["thongTinSanXuat"]["doPhTrungBinh"].'" /> </p>'; 
                            } else {
                                echo '<p class="c-title3">+ Độ PH trung bình: <input type = "text" class="w3-input" id="thongtinchung_dophtrungbinh" value="" /> </p>';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["aoTomSau"])){
                                echo '<p class="c-title3">+ Ao sâu: <input type = "text" class="w3-input" id="thongtinchung_aotomsau" value="'.$data2["object"]["thongTinSanXuat"]["aoTomSau"].'" /> (m)</p>'; 
                            } else {
                                echo '<p class="c-title3">+ Ao sâu: <input type = "text" class="w3-input" id="thongtinchung_aotomsau" value="" /> (m)</p>';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["tenVuTom"])){
                                echo '<p class="c-title5">- Vụ tôm: <input type = "text" class="w3-input" id="thongtinchung_vutom" value="'.$data2["object"]["thongTinSanXuat"]["tenVuTom"].'" /> Từ tháng: <input type = "text" class="w3-input" id="thongtinchung_tuthang" value="'.$data2["object"]["thongTinSanXuat"]["thangBatDauVuTom"].'" /> đến tháng: <input type = "text" class="w3-input" id="thongtinchung_denthang" value="'.$data2["object"]["thongTinSanXuat"]["thangKetThucVuTom"].'" /></p>'; 
                            } else {
                                echo '<p class="c-title5">- Vụ tôm: <input type = "text" class="w3-input" id="thongtinchung_vutom" value="" /> Từ tháng <input type = "text" class="w3-input" id="thongtinchung_tuthang" value="" /> đến tháng <input type = "text" class="w3-input" id="thongtinchung_denthang" value="" /> </p>';
                            }
                            echo '<p class="c-title1">3. Khu vực sản xuất: </p>';
                            echo '<p class="c-title5">- Tên khu vực sản xuất: '.$data_info1[0]["KV_TEN"].'</p>';
                            echo '<p class="c-title5">- Tên Kế hoạch sản xuất: '.$data_info1[0]["KV_KEHOACH"].'</p>';
                            echo '<p class="c-title1">4. Nhật ký sản xuất:</p>';
                            echo '<p class="c-title2">&#9658; Đầu tư trang thiết bị</p>';
                            $tom_danquat = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["danQuatNuoiTom"])){
                                $tom_danquat = $data1["object"]["hoatDongSanXuat"]["danQuatNuoiTom"];
                            }
                            echo '<p class="c-title3">+ Dàn quạt: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_danquat">
                                    <option selected>'.$tom_danquat.'</option>
                                    <option>----------------------------</option>
                                    <option>Mua mới</option>
                                    <option>Tái sử dụng</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            $tom_mayphongdien = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["mayDuPhongDien"])){
                                $tom_mayphongdien = $data1["object"]["hoatDongSanXuat"]["mayDuPhongDien"];
                            }
                            echo '<p class="c-title3">+ Máy dự phòng thay thế điện: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_mayphongdien">
                                    <option selected>'.$tom_mayphongdien.'</option>
                                    <option>----------------------------</option>
                                    <option>Mua mới</option>
                                    <option>Tái sử dụng</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            $tom_daydien = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["thietBiDayDien"])){
                                $tom_daydien = $data1["object"]["hoatDongSanXuat"]["thietBiDayDien"];
                            }
                            echo '<p class="c-title3">+ Dây điện: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_daydien">
                                    <option selected>'.$tom_daydien.'</option>
                                    <option>----------------------------</option>
                                    <option>Mua mới</option>
                                    <option>Tái sử dụng</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            $tom_denchieusang = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["denChieuSang"])){
                                $tom_denchieusang = $data1["object"]["hoatDongSanXuat"]["denChieuSang"];
                            }
                            echo '<p class="c-title3">+ Đèn chiếu sáng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_denchieusang">
                                    <option selected>'.$tom_denchieusang.'</option>
                                    <option>----------------------------</option>
                                    <option>Mua mới</option>
                                    <option>Tái sử dụng</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            $tom_maybomnuoc = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["mayBomNuoc"])){
                                $tom_maybomnuoc = $data1["object"]["hoatDongSanXuat"]["mayBomNuoc"];
                            }
                            echo '<p class="c-title3">+ Máy bơm nước: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_maybomnuoc">
                                    <option selected>'.$tom_maybomnuoc.'</option>
                                    <option>----------------------------</option>
                                    <option>Mua mới</option>
                                    <option>Tái sử dụng</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            $tom_tuilocnuoc = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["tuiLocNuoc"])){
                                $tom_tuilocnuoc = $data1["object"]["hoatDongSanXuat"]["tuiLocNuoc"];
                            }
                            echo '<p class="c-title3">+ Túi lọc nước: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_tuilocnuoc">
                                    <option selected>'.$tom_tuilocnuoc.'</option>
                                    <option>----------------------------</option>
                                    <option>Mua mới</option>
                                    <option>Tái sử dụng</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            $tom_congxanuoc = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["congCapXaNuoc"])){
                                $tom_congxanuoc = $data1["object"]["hoatDongSanXuat"]["congCapXaNuoc"];
                            }
                            echo '<p class="c-title3">+ Cống cấp, xả nước: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_congxanuoc">
                                    <option selected>'.$tom_congxanuoc.'</option>
                                    <option>----------------------------</option>
                                    <option>Mua mới</option>
                                    <option>Tái sử dụng</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            if (isset($data2["object"]["hoatDongSanXuat"]["thietBiKhac"])) {
                                echo '<p class="c-title3">+ Khác: <input type = "text" class="w3-input" id="tom_thietbi_khac" value="'.$data2["object"]["hoatDongSanXuat"]["thietBiKhac"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Khác: <input type = "text" class="w3-input" id="tom_thietbi_khac" value="" /></p>';
                            }
                            echo '<p class="c-title2">&#9658; Cải tạo ao</p>';
                            $tom_caitaocongtrinh = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["caiTaoCongTrinh"])){
                                $tom_caitaocongtrinh = $data1["object"]["hoatDongSanXuat"]["caiTaoCongTrinh"];
                            }
                            if ($tom_caitaocongtrinh == "1"){
                                echo '<p class="c-title3">+ Cải tạo công trình: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_caitaocongtrinh">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Cải tạo công trình: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_caitaocongtrinh">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_senvetao = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["senVetAo"])){
                                $tom_senvetao = $data1["object"]["hoatDongSanXuat"]["senVetAo"];
                            }
                            if ($tom_senvetao == "1"){
                                echo '<p class="c-title3">+ Sên vét ao: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_senvetao">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Sên vét ao: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_senvetao">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_lotbatbobatday = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["lotBatBoBatDay"])){
                                $tom_lotbatbobatday = $data1["object"]["hoatDongSanXuat"]["lotBatBoBatDay"];
                            }
                            if ($tom_lotbatbobatday == "1"){
                                echo '<p class="c-title3">+ Lót bạt bờ, bạt đáy: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_lotbatbobatday">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Lót bạt bờ, bạt đáy: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_lotbatbobatday">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_giacobobao = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["giaCoBoBao"])){
                                $tom_giacobobao = $data1["object"]["hoatDongSanXuat"]["giaCoBoBao"];
                            }
                            if ($tom_giacobobao == "1"){
                                echo '<p class="c-title3">+ Gia cố bờ bao:: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_giacobobao">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Gia cố bờ bao: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_giacobobao">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_bonvoi = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["bonVoi"])){
                                $tom_bonvoi = $data1["object"]["hoatDongSanXuat"]["bonVoi"];
                            }
                            if ($tom_bonvoi == "1"){
                                echo '<p class="c-title3">+ Bón vôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_bonvoi">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Bón vôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_bonvoi">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["lieuLuongBonVoi"])) {
                                echo '<p class="c-title3"> Liều lượng: <input type = "text" class="w3-input" id="tom_lieuluongbonvoi" value="'.$data2["object"]["hoatDongSanXuat"]["lieuLuongBonVoi"].'" /> kg/m<sup>2</sup></p>';
                            } else {
                                echo '<p class="c-title3"> Liều lượng: <input type = "text" class="w3-input" id="tom_lieuluongbonvoi" value="" /> kg/m<sup>2</sup></p>';
                            }

                            $tom_phoimattrang = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["phoiMatTrang"])){
                                $tom_phoimattrang = $data1["object"]["hoatDongSanXuat"]["phoiMatTrang"];
                            }
                            if ($tom_phoimattrang == "1"){
                                echo '<p class="c-title3">+ Phơi mặt trảng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_phoimattrang">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Phơi mặt trảng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_phoimattrang">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phoiBaoNhieuNgay"])) {
                                echo '<p class="c-title3"> Bao nhiêu ngày: <input type = "text" class="w3-input" id="tom_phoingay" value="'.$data2["object"]["hoatDongSanXuat"]["phoiBaoNhieuNgay"].'" /> ngày</p>';
                            } else {
                                echo '<p class="c-title3"> Bao nhiêu ngày: <input type = "text" class="w3-input" id="tom_phoingay" value="" /> ngày</p>';
                            }
                            echo '<p class="c-title2">&#9658; Xử lý nước</p>';
                            $tom_xulynuoc = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["xuLyNuoc"])){
                                $tom_xulynuoc = $data1["object"]["hoatDongSanXuat"]["xuLyNuoc"];
                            }
                            if ($tom_xulynuoc == "1"){
                                echo '<p class="c-title3">+ <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xulynuoc">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xulynuoc">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $dt_thoigian = "";$dt_tenthuoc = "";$dt_lieuluong = "";$dt_cachbon = "";$dt_hieuqua = "";
                            $dk_thoigian = "";$dk_tenthuoc = "";$dk_lieuluong = "";$dk_cachbon = "";$dk_hieuqua = "";
                            $gmn_thoigian = "";$gmn_tenthuoc = "";$gmn_lieuluong = "";$gmn_cachbon = "";$gmn_hieuqua = "";
                            $cvs_thoigian = "";$cvs_tenthuoc = "";$cvs_lieuluong = "";$cvs_cachbon = "";$cvs_hieuqua = "";
                            $kh_thoigian = "";$kh_tenthuoc = "";$kh_lieuluong = "";$kh_cachbon = "";$kh_hieuqua = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietTapThoiGian"])) {
                                $dt_thoigian = $data2["object"]["hoatDongSanXuat"]["dietTapThoiGian"];
                            } else {
                                $dt_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietTapTenThuoc"])) {
                                $dt_tenthuoc = $data2["object"]["hoatDongSanXuat"]["dietTapTenThuoc"];
                            } else {
                                $dt_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietTapLieuLuong"])) {
                                $dt_lieuluong = $data2["object"]["hoatDongSanXuat"]["dietTapLieuLuong"];
                            } else {
                                $dt_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietTapCachBon"])) {
                                $dt_cachbon = $data2["object"]["hoatDongSanXuat"]["dietTapCachBon"];
                            } else {
                                $dt_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietTapHieuQua"])) {
                                $dt_hieuqua = $data2["object"]["hoatDongSanXuat"]["dietTapHieuQua"];
                            } else {
                                $dt_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietkhuanThoiGian"])) {
                                $dk_thoigian = $data2["object"]["hoatDongSanXuat"]["dietkhuanThoiGian"];
                            } else {
                                $dk_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietkhuanTenThuoc"])) {
                                $dk_tenthuoc = $data2["object"]["hoatDongSanXuat"]["dietkhuanTenThuoc"];
                            } else {
                                $dk_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietkhuanLieuLuong"])) {
                                $dk_lieuluong = $data2["object"]["hoatDongSanXuat"]["dietkhuanLieuLuong"];
                            } else {
                                $dk_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietkhuanCachBon"])) {
                                $dk_cachbon = $data2["object"]["hoatDongSanXuat"]["dietkhuanCachBon"];
                            } else {
                                $dk_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["dietkhuanHieuQua"])) {
                                $dk_hieuqua = $data2["object"]["hoatDongSanXuat"]["dietkhuanHieuQua"];
                            } else {
                                $dk_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["gaymaunuocThoiGian"])) {
                                $gmn_thoigian = $data2["object"]["hoatDongSanXuat"]["gaymaunuocThoiGian"];
                            } else {
                                $gmn_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["gaymaunuocTenThuoc"])) {
                                $gmn_tenthuoc = $data2["object"]["hoatDongSanXuat"]["dietkhuanTenThuoc"];
                            } else {
                                $gmn_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["gaymaunuocLieuLuong"])) {
                                $gmn_lieuluong = $data2["object"]["hoatDongSanXuat"]["gaymaunuocLieuLuong"];
                            } else {
                                $gmn_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["gaymaunuocCachBon"])) {
                                $gmn_cachbon = $data2["object"]["hoatDongSanXuat"]["gaymaunuocnCachBon"];
                            } else {
                                $gmn_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["gaymaunuocHieuQua"])) {
                                $gmn_hieuqua = $data2["object"]["hoatDongSanXuat"]["gaymaunuocHieuQua"];
                            } else {
                                $gmn_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["cayvisinhThoiGian"])) {
                                $cvs_thoigian = $data2["object"]["hoatDongSanXuat"]["cayvisinhThoiGian"];
                            } else {
                                $cvs_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["cayvisinhTenThuoc"])) {
                                $cvs_tenthuoc = $data2["object"]["hoatDongSanXuat"]["cayvisinhTenThuoc"];
                            } else {
                                $cvs_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["cayvisinhLieuLuong"])) {
                                $cvs_lieuluong = $data2["object"]["hoatDongSanXuat"]["cayvisinhLieuLuong"];
                            } else {
                                $cvs_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["cayvisinhCachBon"])) {
                                $cvs_cachbon = $data2["object"]["hoatDongSanXuat"]["cayvisinhCachBon"];
                            } else {
                                $cvs_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["cayvisinhHieuQua"])) {
                                $cvs_hieuqua = $data2["object"]["hoatDongSanXuat"]["cayvisinhHieuQua"];
                            } else {
                                $cvs_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["xulykhacThoiGian"])) {
                                $kh_thoigian = $data2["object"]["hoatDongSanXuat"]["xulykhacThoiGian"];
                            } else {
                                $kh_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["xulykhaTenThuoc"])) {
                                $kh_tenthuoc = $data2["object"]["hoatDongSanXuat"]["xulykhaTenThuoc"];
                            } else {
                                $kh_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["xulykhaLieuLuong"])) {
                                $kh_lieuluong = $data2["object"]["hoatDongSanXuat"]["xulykhaLieuLuong"];
                            } else {
                                $kh_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["xulykhaCachBon"])) {
                                $kh_cachbon = $data2["object"]["hoatDongSanXuat"]["xulykhaCachBon"];
                            } else {
                                $kh_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["xulykhacHieuQua"])) {
                                $kh_hieuqua = $data2["object"]["hoatDongSanXuat"]["xulykhacHieuQua"];
                            } else {
                                $kh_hieuqua = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Công việc</td>
                                    <td>Thời gian</td>
                                    <td>Tên thuốc</td>
                                    <td>Liều lượng</td>
                                    <td>Cách bón</td>
                                    <td>Hiệu quả</td>
                                </tr>
                                <tr>
                                    <td>Diệt tạp</td>
                                    <td><input type = "text" class="w3-input" id="tom_dt_thoigian" value = "'.$dt_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dt_tenthuoc" value = "'.$dt_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dt_lieuluong" value = "'.$dt_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dt_cachbon" value = "'.$dt_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dt_hieuqua" value = "'.$dt_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Diệt khuẩn</td>
                                    <td><input type = "text" class="w3-input" id="tom_dk_thoigian" value = "'.$dk_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dk_tenthuoc" value = "'.$dk_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dk_lieuluong" value = "'.$dk_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dk_cachbon" value = "'.$dk_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dk_hieuqua" value = "'.$dk_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Gây màu nước</td>
                                    <td><input type = "text" class="w3-input" id="tom_gmn_thoigian" value = "'.$gmn_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_gmn_tenthuoc" value = "'.$gmn_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_gmn_lieuluong" value = "'.$gmn_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_gmn_cachbon" value = "'.$gmn_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_gmn_hieuqua" value = "'.$gmn_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Cấy vi sinh</td>
                                    <td><input type = "text" class="w3-input" id="tom_cvs_thoigian" value = "'.$cvs_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cvs_tenthuoc" value = "'.$cvs_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cvs_lieuluong" value = "'.$cvs_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cvs_cachbon" value = "'.$cvs_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cvs_hieuqua" value = "'.$cvs_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Xử lý khác</td>
                                    <td><input type = "text" class="w3-input" id="tom_kh_thoigian" value = "'.$kh_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_kh_tenthuoc" value = "'.$kh_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_kh_lieuluong" value = "'.$kh_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_kh_cachbon" value = "'.$kh_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_kh_hieuqua" value = "'.$kh_hieuqua.'" /></td>
                                </tr>
                            </table>';
                            if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraYeuToMoiTruong"])) {
                                echo '<p class="c-title3">+ Kiểm tra các yếu tố môi trường: <input type = "text" class="w3-input" id="tom_yeutomt" value = "'.$data2["object"]["hoatDongSanXuat"]["kiemTraYeuToMoiTruong"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Kiểm tra các yếu tố môi trường: <input type = "text" class="w3-input" id="tom_yeutomt" value = "" /> </p>';
                            }
                            echo '<p class="c-title2">&#9658; Chọn giống và cách xử lý giống</p>';
                            if (isset($data2["object"]["hoatDongSanXuat"]["giongTomGanNhat"])) {
                                echo '<p class="c-title3">+ Giống tôm được nuôi gần nhất: <input type = "text" class="w3-input" id="tom_gionggannhat" value = "'.$data2["object"]["hoatDongSanXuat"]["giongTomGanNhat"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Giống tôm được nuôi gần nhất: <input type = "text" class="w3-input" id="tom_gionggannhat" value = "" /> </p>';
                            }
                            $tom_nguongoctom = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["nguonGocTom"])){
                                $tom_nguongoctom = $data1["object"]["hoatDongSanXuat"]["nguonGocTom"];
                            }
                            echo '<p class="c-title3">+ Nguồn gốc giống: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_nguongoctom">
                                    <option selected>'.$tom_nguongoctom.'</option>
                                    <option>----------------------------</option>
                                    <option>Tự sản xuất</option>
                                    <option>Mua trong tỉnh</option>
                                    <option>Mua ngoài tỉnh</option>
                                </select></p>';
                            $tom_giayxacnhangiong = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["giayXacNhanNguonGocTom"])) {
                                $tom_giayxacnhangiong = $data2["object"]["hoatDongSanXuat"]["giayXacNhanNguonGocTom"];
                            }
                            if ($tom_giayxacnhangiong == "1"){
                                echo '<p class="c-title3">+ Giấy xác nhận nguồn gốc tôm giống: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_giayxacnhangiong">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Giấy xác nhận nguồn gốc tôm giống: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_giayxacnhangiong">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["matDoTha"])) {
                                echo '<p class="c-title3">+ Mật độ thả: <input type = "text" class="w3-input" id="tom_matdotha" value = "'.$data2["object"]["hoatDongSanXuat"]["matDoTha"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Mật độ thả: <input type = "text" class="w3-input" id="tom_matdotha" value = "" /> </p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["thoiGianThaTom"])) {
                                echo '<p class="c-title3">+ Thời gian thả tôm: <input type = "text" class="w3-input" id="tom_thoigiantha" value = "'.$data2["object"]["hoatDongSanXuat"]["thoiGianThaTom"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Thời gian thả tôm: <input type = "text" class="w3-input" id="tom_thoigiantha" value = "" /> </p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["huongTha"])) {
                                echo '<p class="c-title3">+ Hướng thả: <input type = "text" class="w3-input" id="tom_huongtha" value = "'.$data2["object"]["hoatDongSanXuat"]["huongTha"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Hướng thả: <input type = "text" class="w3-input" id="tom_huongtha" value = "" /> </p>';
                            }
                            echo '<p class="c-title2">&#9658; Giám sát sức khỏe</p>';
                            $tom_uonggieo = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["uongGieo"])) {
                                $tom_uonggieo = $data2["object"]["hoatDongSanXuat"]["uongGieo"];
                            }
                            if ($tom_uonggieo == "1"){
                                echo '<p class="c-title3">+ Ương gièo trước khi thả nuôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_uonggieo">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Ương gièo trước khi thả nuôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_uonggieo">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_sdthuocnguabenh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["suDungThuocNguaBenh"])) {
                                $tom_sdthuocnguabenh = $data2["object"]["hoatDongSanXuat"]["suDungThuocNguaBenh"];
                            }
                            if ($tom_sdthuocnguabenh == "1"){
                                echo '<p class="c-title3">+ Sử dụng thuốc ngừa bệnh: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_sdthuocnguabenh">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Sử dụng thuốc ngừa bệnh: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_sdthuocnguabenh">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_sthuocsovoitruocday = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["soVoiTruocDay"])) {
                                $tom_sthuocsovoitruocday = $data2["object"]["hoatDongSanXuat"]["soVoiTruocDay"];
                            }
                            echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> So với trước đây: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_sthuocsovoitruocday">
                                    <option selected>'.$tom_sthuocsovoitruocday.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            $tom_sdmenvisinh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["suDungMenViSinh"])) {
                                $tom_sdmenvisinh = $data2["object"]["hoatDongSanXuat"]["suDungMenViSinh"];
                            }
                            if ($tom_sdmenvisinh == "1"){
                                echo '<p class="c-title3">+ Sử dụng men vi sinh định kỳ: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_sdmenvisinh">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Sử dụng men vi sinh định kỳ: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_sdmenvisinh">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_kiemtramt = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraMoiTruong"])) {
                                $tom_kiemtramt = $data2["object"]["hoatDongSanXuat"]["kiemTraMoiTruong"];
                            }
                            if ($tom_kiemtramt == "1"){
                                echo '<p class="c-title3">+ Kiểm tra môi trường nuôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_kiemtramt">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Kiểm tra môi trường nuôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_kiemtramt">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_quanlynuocmt = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanLyNuocNuoiTom"])) {
                                $tom_quanlynuocmt = $data2["object"]["hoatDongSanXuat"]["quanLyNuocNuoiTom"];
                            }
                            if ($tom_quanlynuocmt == "1"){
                                echo '<p class="c-title3">+ Quản lý nước trong suốt quá trình nuôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_quanlynuocmt">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Quản lý nước trong suốt quá trình nuôi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_quanlynuocmt">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            echo '<p class="c-title2">&#9658; Quản lý sức khoẻ Bổ sung thêm bệnh EMS</p>';
                            $tom_dichbenhems = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["tinhHinhDichBenhEMS"])) {
                                $tom_dichbenhems = $data2["object"]["hoatDongSanXuat"]["tinhHinhDichBenhEMS"];
                            }
                            echo '<p class="c-title3">+ Tình hình dịch bệnh so với trước đây: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_dichbenhems">
                                    <option selected>'.$tom_dichbenhems.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            $tom_soaobibenh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["soAoBiBenh"])) {
                                $tom_soaobibenh = $data2["object"]["hoatDongSanXuat"]["soAoBiBenh"];
                            }
                            echo '<p class="c-title3">+ Số ao bị bệnh: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_soaobibenh">
                                    <option selected>'.$tom_soaobibenh.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            echo '<p class="c-title3">+ Các loại bệnh xuất hiện trong ao nuôi: </p>';
                            $tom_benhdomtrang = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhDomTrang"])) {
                                $tom_benhdomtrang = $data2["object"]["hoatDongSanXuat"]["benhDomTrang"];
                            }
                            if ($tom_benhdomtrang == "1"){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đốm trắng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhdomtrang">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đốm trắng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhdomtrang">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_benhdomtrang_sosanh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhDomTrangSoSanh"])) {
                                $tom_benhdomtrang_sosanh = $data2["object"]["hoatDongSanXuat"]["benhDomTrangSoSanh"];
                            }
                            echo '<p class="c-title4"> <select class="w3-select" id="tom_benhdomtrang_sosanh">
                                    <option selected>'.$tom_benhdomtrang_sosanh.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            $tom_benhdauvang = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhDauVang"])) {
                                $tom_benhdauvang = $data2["object"]["hoatDongSanXuat"]["benhDauVang"];
                            }
                            if ($tom_benhdauvang == "1"){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đầu vàng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhdauvang">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đầu vàng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhdauvang">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_benhdauvang_sosanh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhDauVangSoSanh"])) {
                                $tom_benhdauvang_sosanh = $data2["object"]["hoatDongSanXuat"]["benhDauVangSoSanh"];
                            }
                            echo '<p class="c-title4"> <select class="w3-select" id="tom_benhdauvang_sosanh">
                                    <option selected>'.$tom_benhdauvang_sosanh.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            $tom_benhIHHNV = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhIHHnv"])) {
                                $tom_benhIHHNV = $data2["object"]["hoatDongSanXuat"]["benhIHHnv"];
                            }
                            if ($tom_benhIHHNV == "1"){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IHHNV (hoại tử dưới vỏ và cơ quan tạo máu): <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhIHHNV">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IHHNV (hoại tử dưới vỏ và cơ quan tạo máu): <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhIHHNV">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_benhIHHNV_sosanh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhIHHnvSoSanh"])) {
                                $tom_benhIHHNV_sosanh = $data2["object"]["hoatDongSanXuat"]["benhIHHnvSoSanh"];
                            }
                            echo '<p class="c-title4"> <select class="w3-select" id="tom_benhIHHNV_sosanh">
                                    <option selected>'.$tom_benhIHHNV_sosanh.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            $tom_benhphantrang = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhPhanTrang"])) {
                                $tom_benhphantrang = $data2["object"]["hoatDongSanXuat"]["benhPhanTrang"];
                            }
                            if ($tom_benhphantrang == "1"){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh phân trắng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhphantrang">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh phân trắng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhphantrang">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_benhphantrang_sosanh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhPhanTrangSoSanh"])) {
                                $tom_benhphantrang_sosanh = $data2["object"]["hoatDongSanXuat"]["benhPhanTrangSoSanh"];
                            }
                            echo '<p class="c-title4"> <select class="w3-select" id="tom_benhphantrang_sosanh">
                                    <option selected>'.$tom_benhphantrang_sosanh.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            $tom_benhIMNV = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhIMNV"])) {
                                $tom_benhIMNV = $data2["object"]["hoatDongSanXuat"]["benhIMNV"];
                            }
                            if ($tom_benhIMNV == "1"){
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IMNV (hoại tử cơ): <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhIMNV">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IMNV (hoại tử cơ): <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_benhIMNV">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_benhIMNV_sosanh = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["benhIMNVSoSanh"])) {
                                $tom_benhIMNV_sosanh = $data2["object"]["hoatDongSanXuat"]["benhIMNVSoSanh"];
                            }
                            echo '<p class="c-title4"> <select class="w3-select" id="tom_benhIMNV_sosanh">
                                    <option selected>'.$tom_benhIMNV_sosanh.'</option>
                                    <option>----------------------------</option>
                                    <option>Tăng</option>
                                    <option>Giảm</option>
                                </select></p>';
                            $tom_vibaotutrung = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["viBaoTuTrung"])) {
                                $tom_vibaotutrung = $data2["object"]["hoatDongSanXuat"]["viBaoTuTrung"];
                            }
                            if ($tom_vibaotutrung == "1"){
                                echo '<p class="c-title3">+ Vi bào tử trùng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_vibaotutrung">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Vi bào tử trùng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_vibaotutrung">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["thoiGianXuatHien"])) {
                                echo '<p class="c-title3">+ Thời gian xuất hiện: <input type = "text" class="w3-input" id="tom_vibao_thoigian" value="'.$data2["object"]["hoatDongSanXuat"]["thoiGianXuatHien"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Thời gian xuất hiện: <input type = "text" class="w3-input" id="tom_vibao_thoigian" value="" /> </p>';
                            }
                            $tom_xlaokhichetnhieu = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["coXuLyAoKhiChetNhieu"])) {
                                $tom_xlaokhichetnhieu = $data2["object"]["hoatDongSanXuat"]["coXuLyAoKhiChetNhieu"];
                            }
                            if ($tom_xlaokhichetnhieu == "1"){
                                echo '<p class="c-title3">+ Vi bào tử trùng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xlaokhichetnhieu">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Vi bào tử trùng: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xlaokhichetnhieu">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["php"])) {
                                echo '<p class="c-title3">+ PHP: <input type = "text" class="w3-input" id="tom_xuly_php" value="'.$data2["object"]["hoatDongSanXuat"]["php"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ PHP: <input type = "text" class="w3-input" id="tom_xuly_php" value="" /> </p>';
                            }
                            echo '<p class="c-title3">+ Phòng trị bệnh </p>';
                            $domtrang_thoigian = "";$domtrang_tenthuoc = "";$domtrang_lieuluong = "";$domtrang_cachbon = "";$domtrang_hieuqua = "";
                            $dauvang_thoigian = "";$dauvang_tenthuoc = "";$dauvang_lieuluong = "";$dauvang_cachbon = "";$dauvang_hieuqua = "";
                            $ihhnv_thoigian = "";$ihhnv_tenthuoc = "";$ihhnv_lieuluong = "";$ihhnv_cachbon = "";$ihhnv_hieuqua = "";
                            $phantrang_thoigian = "";$phantrang_tenthuoc = "";$phantrang_lieuluong = "";$phantrang_cachbon = "";$phantrang_hieuqua = "";
                            $imnv_thoigian = "";$imnv_tenthuoc = "";$imnv_lieuluong = "";$imnv_cachbon = "";$imnv_hieuqua = "";
                            $vbtt_thoigian = "";$vbtt_tenthuoc = "";$vbtt_lieuluong = "";$vbtt_cachbon = "";$vbtt_hieuqua = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdomtrangthoigian"])) {
                                $domtrang_thoigian = $data2["object"]["hoatDongSanXuat"]["phongtribenhdomtrangthoigian"];
                            } else {
                                $domtrang_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdomtrangphuongphap"])) {
                                $domtrang_tenthuoc = $data2["object"]["hoatDongSanXuat"]["phongtribenhdomtrangphuongphap"];
                            } else {
                                $domtrang_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdomtranglieuluong"])) {
                                $domtrang_lieuluong = $data2["object"]["hoatDongSanXuat"]["phongtribenhdomtranglieuluong"];
                            } else {
                                $domtrang_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdomtrangcachbon"])) {
                                $domtrang_cachbon = $data2["object"]["hoatDongSanXuat"]["phongtribenhdomtrangcachbon"];
                            } else {
                                $domtrang_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdomtranghieuqua"])) {
                                $domtrang_hieuqua = $data2["object"]["hoatDongSanXuat"]["phongtribenhdomtranghieuqua"];
                            } else {
                                $domtrang_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdauvangthoigian"])) {
                                $dauvang_thoigian = $data2["object"]["hoatDongSanXuat"]["phongtribenhdauvangthoigian"];
                            } else {
                                $dauvang_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdauvangphuongphap"])) {
                                $dauvang_tenthuoc = $data2["object"]["hoatDongSanXuat"]["phongtribenhdauvangphuongphap"];
                            } else {
                                $dauvang_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdauvanglieuluong"])) {
                                $dauvang_lieuluong = $data2["object"]["hoatDongSanXuat"]["phongtribenhdauvanglieuluong"];
                            } else {
                                $dauvang_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdauvangcachbon"])) {
                                $dauvang_cachbon = $data2["object"]["hoatDongSanXuat"]["phongtribenhdauvangcachbon"];
                            } else {
                                $dauvang_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhdauvanghieuqua"])) {
                                $dauvang_hieuqua = $data2["object"]["hoatDongSanXuat"]["phongtribenhdauvanghieuqua"];
                            } else {
                                $dauvang_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVthoigian"])) {
                                $ihhnv_thoigian = $data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVthoigian"];
                            } else {
                                $ihhnv_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVphuongphap"])) {
                                $ihhnv_tenthuoc = $data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVphuongphap"];
                            } else {
                                $ihhnv_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVlieuluong"])) {
                                $ihhnv_lieuluong = $data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVlieuluong"];
                            } else {
                                $ihhnv_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVcachbon"])) {
                                $ihhnv_cachbon = $data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVcachbon"];
                            } else {
                                $ihhnv_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVhieuqua"])) {
                                $ihhnv_hieuqua = $data2["object"]["hoatDongSanXuat"]["phongtribenhIHHNVhieuqua"];
                            } else {
                                $ihhnv_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhphantrangthoigian"])) {
                                $phantrang_thoigian = $data2["object"]["hoatDongSanXuat"]["phongtribenhphantrangthoigian"];
                            } else {
                                $phantrang_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhphantrangphuongphap"])) {
                                $phantrang_tenthuoc = $data2["object"]["hoatDongSanXuat"]["phongtribenhphantrangphuongphap"];
                            } else {
                                $phantrang_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhphantranglieuluong"])) {
                                $phantrang_lieuluong = $data2["object"]["hoatDongSanXuat"]["phongtribenhphantranglieuluong"];
                            } else {
                                $phantrang_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhphantrangcachbon"])) {
                                $phantrang_cachbon = $data2["object"]["hoatDongSanXuat"]["phongtribenhphantrangcachbon"];
                            } else {
                                $phantrang_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhphantranghieuqua"])) {
                                $phantrang_hieuqua = $data2["object"]["hoatDongSanXuat"]["phongtribenhphantranghieuqua"];
                            } else {
                                $phantrang_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVthoigian"])) {
                                $imnv_thoigian = $data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVthoigian"];
                            } else {
                                $imnv_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVphuongphap"])) {
                                $imnv_tenthuoc = $data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVphuongphap"];
                            } else {
                                $imnv_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVlieuluong"])) {
                                $imnv_lieuluong = $data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVlieuluong"];
                            } else {
                                $imnv_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVcachbon"])) {
                                $imnv_cachbon = $data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVcachbon"];
                            } else {
                                $imnv_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVhieuqua"])) {
                                $imnv_hieuqua = $data2["object"]["hoatDongSanXuat"]["phongtribenhIMNVhieuqua"];
                            } else {
                                $imnv_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrungthoigian"])) {
                                $vbtt_thoigian = $data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrungthoigian"];
                            } else {
                                $vbtt_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrungphuongphap"])) {
                                $vbtt_tenthuoc = $data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrungphuongphap"];
                            } else {
                                $vbtt_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrunglieuluong"])) {
                                $vbtt_lieuluong = $data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrunglieuluong"];
                            } else {
                                $vbtt_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrungcachbon"])) {
                                $vbtt_cachbon = $data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrungcachbon"];
                            } else {
                                $vbtt_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrunghieuqua"])) {
                                $vbtt_hieuqua = $data2["object"]["hoatDongSanXuat"]["phongtribenhvibaotutrunghieuqua"];
                            } else {
                                $vbtt_hieuqua = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Loại bệnh</td>
                                    <td>Thời gian</td>
                                    <td>Tên thuốc/ Phương pháp xử lý</td>
                                    <td>Liều lượng</td>
                                    <td>Cách bón</td>
                                    <td>Hiệu quả</td>
                                </tr>
                                <tr>
                                    <td>Bệnh đốm trắng</td>
                                    <td><input type = "text" class="w3-input" id="tom_domtrang_thoigian" value = "'.$domtrang_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_domtrang_tenthuoc" value = "'.$domtrang_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_domtrang_lieuluong" value = "'.$domtrang_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_domtrang_cachbon" value = "'.$domtrang_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_domtrang_hieuqua" value = "'.$domtrang_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Bệnh đầu vàng</td>
                                    <td><input type = "text" class="w3-input" id="tom_dauvang_thoigian" value = "'.$dauvang_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dauvang_tenthuoc" value = "'.$dauvang_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dauvang_lieuluong" value = "'.$dauvang_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dauvang_cachbon" value = "'.$dauvang_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dauvang_hieuqua" value = "'.$dauvang_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Bệnh IHHNV (hoại tử dưới vỏ và cơ quan tạo máu)</td>
                                    <td><input type = "text" class="w3-input" id="tom_ihhnv_thoigian" value = "'.$ihhnv_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_ihhnv_tenthuoc" value = "'.$ihhnv_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_ihhnv_lieuluong" value = "'.$ihhnv_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_ihhnv_cachbon" value = "'.$ihhnv_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_ihhnv_hieuqua" value = "'.$ihhnv_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Bệnh phân trắng</td>
                                    <td><input type = "text" class="w3-input" id="tom_phantrang_thoigian" value = "'.$phantrang_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_phantrang_tenthuoc" value = "'.$phantrang_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_phantrang_lieuluong" value = "'.$phantrang_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_phantrang_cachbon" value = "'.$phantrang_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_phantrang_hieuqua" value = "'.$phantrang_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Bệnh IMNV (hoại tử cơ)</td>
                                    <td><input type = "text" class="w3-input" id="tom_imnv_thoigian" value = "'.$imnv_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_imnv_tenthuoc" value = "'.$imnv_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_imnv_lieuluong" value = "'.$imnv_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_imnv_cachbon" value = "'.$imnv_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_imnv_hieuqua" value = "'.$imnv_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Vi bào tử trùng</td>
                                    <td><input type = "text" class="w3-input" id="tom_vbtt_thoigian" value = "'.$vbtt_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_vbtt_tenthuoc" value = "'.$vbtt_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_vbtt_lieuluong" value = "'.$vbtt_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_vbtt_cachbon" value = "'.$vbtt_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_vbtt_hieuqua" value = "'.$vbtt_hieuqua.'" /></td>
                                </tr>
                            </table>';
                            echo '<p class="c-title2">&#9658; Thức ăn</p>';
                            $tom_cachchoan = "";
                            if (isset($data1["object"]["hoatDongSanXuat"]["cachChoTomAn"])){
                                $tom_cachchoan = $data1["object"]["hoatDongSanXuat"]["cachChoTomAn"];
                            }
                            echo '<p class="c-title3">+ Cách cho ăn: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_cachchoan">
                                    <option selected>'.$tom_cachchoan.'</option>
                                    <option>----------------------------</option>
                                    <option>Thủ công</option>
                                    <option>Tự động</option>
                                    <option>Cả hai</option>
                                </select></p>';
                            if (isset($data2["object"]["hoatDongSanXuat"]["soLanChoAn"])){
                                echo '<p class="c-title3">+ Số lần cho ăn: <input type = "text" class="w3-input" id="tom_solanchoan" value="'.$data2["object"]["hoatDongSanXuat"]["soLanChoAn"].'" /> lần/ngày</p>';
                            } else {
                                echo '<p class="c-title3">+ Số lần cho ăn: <input type = "text" class="w3-input" id="tom_solanchoan" value="" /> lần/ngày </p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["soSangAn"])){
                                echo '<p class="c-title3">+ Số sang ăn: <input type = "text" class="w3-input" id="tom_sosangan" value="'.$data2["object"]["hoatDongSanXuat"]["soSangAn"].'" /> cái </p>';
                            } else {
                                echo '<p class="c-title3">+ Số sang ăn: <input type = "text" class="w3-input" id="tom_sosangan" value="" /> cái </p>';
                            }
                            $tom_phoitromthucan = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["coTronThucAnKhac"])) {
                                $tom_phoitromthucan = $data2["object"]["hoatDongSanXuat"]["coTronThucAnKhac"];
                            }
                            if ($tom_phoitromthucan == "1"){
                                echo '<p class="c-title3">+ Phối trộn các thành phần khác vào thức ăn: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_phoitromthucan">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Phối trộn các thành phần khác vào thức ăn: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_phoitromthucan">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $thucan_ten1 = "";$thucan_thoigian1 = "";$thucan_lieuluong1 = "";$thucan_cachbon1 = "";$thucan_hieuqua1 = "";
                            $thucan_ten2 = "";$thucan_thoigian2 = "";$thucan_lieuluong2 = "";$thucan_cachbon2 = "";$thucan_hieuqua2 = "";
                            $thucan_ten3 = "";$thucan_thoigian3 = "";$thucan_lieuluong3 = "";$thucan_cachbon3 = "";$thucan_hieuqua3 = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomTenThuoc01"])) {
                                $thucan_ten1 = $data2["object"]["hoatDongSanXuat"]["tomTenThuoc01"];
                            } else {
                                $thucan_ten1 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomThoiGian01"])) {
                                $thucan_thoigian1 = $data2["object"]["hoatDongSanXuat"]["tomThoiGian01"];
                            } else {
                                $thucan_thoigian1 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomLieuLuong01"])) {
                                $thucan_lieuluong1 = $data2["object"]["hoatDongSanXuat"]["tomLieuLuong01"];
                            } else {
                                $thucan_lieuluong1 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomCachBon01"])) {
                                $thucan_cachbon1 = $data2["object"]["hoatDongSanXuat"]["tomCachBon01"];
                            } else {
                                $thucan_cachbon1 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomHieuQua01"])) {
                                $thucan_hieuqua1 = $data2["object"]["hoatDongSanXuat"]["tomHieuQua01"];
                            } else {
                                $thucan_hieuqua1 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomTenThuoc02"])) {
                                $thucan_ten2 = $data2["object"]["hoatDongSanXuat"]["tomTenThuoc02"];
                            } else {
                                $thucan_ten2 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomThoiGian02"])) {
                                $thucan_thoigian2 = $data2["object"]["hoatDongSanXuat"]["tomThoiGian02"];
                            } else {
                                $thucan_thoigian2 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomLieuLuong02"])) {
                                $thucan_lieuluong2 = $data2["object"]["hoatDongSanXuat"]["tomLieuLuong02"];
                            } else {
                                $thucan_lieuluong2 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomCachBon02"])) {
                                $thucan_cachbon2 = $data2["object"]["hoatDongSanXuat"]["tomCachBon02"];
                            } else {
                                $thucan_cachbon2 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomHieuQua02"])) {
                                $thucan_hieuqua2 = $data2["object"]["hoatDongSanXuat"]["tomHieuQua02"];
                            } else {
                                $thucan_hieuqua2 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomTenThuoc03"])) {
                                $thucan_ten3 = $data2["object"]["hoatDongSanXuat"]["tomTenThuoc03"];
                            } else {
                                $thucan_ten3 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomThoiGian03"])) {
                                $thucan_thoigian3 = $data2["object"]["hoatDongSanXuat"]["tomThoiGian03"];
                            } else {
                                $thucan_thoigian3 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomLieuLuong03"])) {
                                $thucan_lieuluong3 = $data2["object"]["hoatDongSanXuat"]["tomLieuLuong03"];
                            } else {
                                $thucan_lieuluong3 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomCachBon03"])) {
                                $thucan_cachbon3 = $data2["object"]["hoatDongSanXuat"]["tomCachBon03"];
                            } else {
                                $thucan_cachbon3 = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tomHieuQua03"])) {
                                $thucan_hieuqua3 = $data2["object"]["hoatDongSanXuat"]["tomHieuQua03"];
                            } else {
                                $thucan_hieuqua3 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Tên thuốc</td>
                                    <td>Thời gian</td>
                                    <td>Liều lượng</td>
                                    <td>Cách bón</td>
                                    <td>Hiệu quả</td>
                                </tr>
                                <tr>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_ten1" value = "'.$thucan_ten1.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_thoigian1" value = "'.$thucan_thoigian1.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_lieuluong1" value = "'.$thucan_lieuluong1.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_cachbon1" value = "'.$thucan_cachbon1.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_hieuqua1" value = "'.$thucan_hieuqua1.'" /></td>
                                </tr>
                                <tr>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_ten2" value = "'.$thucan_ten2.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_thoigian2" value = "'.$thucan_thoigian2.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_lieuluong2" value = "'.$thucan_lieuluong2.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_cachbon2" value = "'.$thucan_cachbon2.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_hieuqua2" value = "'.$thucan_hieuqua2.'" /></td>
                                </tr>
                                <tr>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_ten3" value = "'.$thucan_ten3.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_thoigian3" value = "'.$thucan_thoigian3.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_lieuluong3" value = "'.$thucan_lieuluong3.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_cachbon3" value = "'.$thucan_cachbon3.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_thucan_hieuqua3" value = "'.$thucan_hieuqua3.'" /></td>
                                </tr>
                            </table>';
                            echo '<p class="c-title2">&#9658; Quản lý môi trường ao nuôi</p>';
                            $tom_ktdoph = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraPhTrongAo"])) {
                                $tom_ktdoph = $data2["object"]["hoatDongSanXuat"]["kiemTraPhTrongAo"];
                            }
                            if ($tom_ktdoph == "1"){
                                echo '<p class="c-title3">+ Kiểm tra độ pH trong ao: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_ktdoph">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Kiểm tra độ pH trong ao: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_ktdoph">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraPh"])) {
                                echo '<p class="c-title3">Số lần <input type = "text" class="w3-input" id="tom_ktdoph_solan" value = "'.$data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraPh"].'" /> lần/ngày</p>';
                            } else {
                                echo '<p class="c-title3">Số lần: <input type = "text" class="w3-input" id="tom_ktdoph_solan" value = "" /> lần/ngày</p>';
                            }
                            $tom_ktdokiem = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraKiemTrongAo"])) {
                                $tom_ktdokiem = $data2["object"]["hoatDongSanXuat"]["kiemTraKiemTrongAo"];
                            }
                            if ($tom_ktdokiem == "1"){
                                echo '<p class="c-title3">+ Kiểm tra độ kiềm trong ao: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_ktdokiem">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Kiểm tra độ kiềm trong ao: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_ktdokiem">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraKiem"])) {
                                echo '<p class="c-title3">Số lần <input type = "text" class="w3-input" id="tom_ktdokiem_solan" value = "'.$data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraKiem"].'" /> lần/ngày</p>';
                            } else {
                                echo '<p class="c-title3">Số lần: <input type = "text" class="w3-input" id="tom_ktdokiem_solan" value = "" /> lần/ngày</p>';
                            }
                            $tom_duytridokiem = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["duyTriDoKiem"])) {
                                $tom_duytridokiem = $data2["object"]["hoatDongSanXuat"]["duyTriDoKiem"];
                            }
                            if ($tom_duytridokiem == "1"){
                                echo '<p class="c-title3">+ Duy trì độ kiềm: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_duytridokiem">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Duy trì độ kiềm: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_duytridokiem">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $dokiem_thoigian = "";$dokiem_tenthuoc = "";$dokiem_lieuluong = "";$dokiem_cachbon = "";$dokiem_hieuqua = "";
                            $bskhoang_thoigian = "";$bskhoang_tenthuoc = "";$bskhoang_lieuluong = "";$bskhoang_cachbon = "";$bskhoang_hieuqua = "";
                            $cayvisinh_thoigian = "";$cayvisinh_tenthuoc = "";$cayvisinh_lieuluong = "";$cayvisinh_cachbon = "";$cayvisinh_hieuqua = "";
                            $cpsinhhoc_thoigian = "";$cpsinhhoc_tenthuoc = "";$cpsinhhoc_lieuluong = "";$cpsinhhoc_cachbon = "";$cpsinhhoc_hieuqua = "";
                            $dinhduong_thoigian = "";$dinhduong_tenthuoc = "";$dinhduong_lieuluong = "";$dinhduong_cachbon = "";$dinhduong_hieuqua = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemthoigian"])) {
                                $dokiem_thoigian = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemthoigian"];
                            } else {
                                $dokiem_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemtenthuoc"])) {
                                $dokiem_tenthuoc = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemtenthuoc"];
                            } else {
                                $dokiem_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemlieuluong"])) {
                                $dokiem_lieuluong = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemlieuluong"];
                            } else {
                                $dokiem_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemcachbon"])) {
                                $dokiem_cachbon = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemcachbon"];
                            } else {
                                $dokiem_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemhieuqua"])) {
                                $dokiem_hieuqua = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongduytridokiemhieuqua"];
                            } else {
                                $dokiem_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoangthoigian"])) {
                                $bskhoang_thoigian = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoangthoigian"];
                            } else {
                                $bskhoang_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoangtenthuoc"])) {
                                $bskhoang_tenthuoc = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoangtenthuoc"];
                            } else {
                                $bskhoang_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoanglieuluong"])) {
                                $bskhoang_lieuluong = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoanglieuluong"];
                            } else {
                                $bskhoang_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoangcachbon"])) {
                                $bskhoang_cachbon = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoangcachbon"];
                            } else {
                                $bskhoang_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoanghieuqua"])) {
                                $bskhoang_hieuqua = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongbosungkhoanghieuqua"];
                            } else {
                                $bskhoang_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhthoigian"])) {
                                $cayvisinh_thoigian = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhthoigian"];
                            } else {
                                $cayvisinh_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhtenthuoc"])) {
                                $cayvisinh_tenthuoc = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhtenthuoc"];
                            } else {
                                $cayvisinh_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhlieuluong"])) {
                                $cayvisinh_lieuluong = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhlieuluong"];
                            } else {
                                $cayvisinh_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhcachbon"])) {
                                $cayvisinh_cachbon = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhcachbon"];
                            } else {
                                $cayvisinh_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhhieuqua"])) {
                                $cayvisinh_hieuqua = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongcayvisinhhieuqua"];
                            } else {
                                $cayvisinh_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhocthoigian"])) {
                                $cpsinhhoc_thoigian = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhocthoigian"];
                            } else {
                                $cpsinhhoc_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhoctenthuoc"])) {
                                $cpsinhhoc_tenthuoc = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhoctenthuoc"];
                            } else {
                                $cpsinhhoc_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhoclieuluong"])) {
                                $cpsinhhoc_lieuluong = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhoclieuluong"];
                            } else {
                                $cpsinhhoc_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhoccachbon"])) {
                                $cpsinhhoc_cachbon = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhoccachbon"];
                            } else {
                                $cpsinhhoc_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhochieuqua"])) {
                                $cpsinhhoc_hieuqua = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongchephamsinhhochieuqua"];
                            } else {
                                $cpsinhhoc_hieuqua = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoathoigian"])) {
                                $dinhduong_thoigian = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoathoigian"];
                            } else {
                                $dinhduong_thoigian = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoatenthuoc"])) {
                                $dinhduong_tenthuoc = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoatenthuoc"];
                            } else {
                                $dinhduong_tenthuoc = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoalieuluong"])) {
                                $dinhduong_lieuluong = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoalieuluong"];
                            } else {
                                $dinhduong_lieuluong = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoacachbon"])) {
                                $dinhduong_cachbon = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoacachbon"];
                            } else {
                                $dinhduong_cachbon = '...';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoahieuqua"])) {
                                $dinhduong_hieuqua = $data2["object"]["hoatDongSanXuat"]["quanlymoitruongdinhduongmentieuhoahieuqua"];
                            } else {
                                $dinhduong_hieuqua = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Công việc</td>
                                    <td>Thời gian</td>
                                    <td>Tên thuốc</td>
                                    <td>Liều lượng</td>
                                    <td>Cách bón</td>
                                    <td>Hiệu quả</td>
                                </tr>
                                <tr>
                                    <td>Duy trì độ kiềm </td>
                                    <td><input type = "text" class="w3-input" id="tom_dokiem_thoigian" value = "'.$dokiem_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dokiem_tenthuoc" value = "'.$dokiem_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dokiem_lieuluong" value = "'.$dokiem_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dokiem_cachbon" value = "'.$dokiem_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dokiem_hieuqua" value = "'.$dokiem_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Bổ sung khoáng</td>
                                    <td><input type = "text" class="w3-input" id="tom_bskhoang_thoigian" value = "'.$bskhoang_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_bskhoang_tenthuoc" value = "'.$bskhoang_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_bskhoang_lieuluong" value = "'.$bskhoang_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_bskhoang_cachbon" value = "'.$bskhoang_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_bskhoang_hieuqua" value = "'.$bskhoang_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Cấy vi sinh</td>
                                    <td><input type = "text" class="w3-input" id="tom_cayvisinh_thoigian" value = "'.$cayvisinh_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cayvisinh_tenthuoc" value = "'.$cayvisinh_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cayvisinh_lieuluong" value = "'.$cayvisinh_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cayvisinh_cachbon" value = "'.$cayvisinh_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cayvisinh_hieuqua" value = "'.$cayvisinh_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Chế phẩm sinh học</td>
                                    <td><input type = "text" class="w3-input" id="tom_cpsinhhoc_thoigian" value = "'.$cpsinhhoc_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cpsinhhoc_tenthuoc" value = "'.$cpsinhhoc_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cpsinhhoc_lieuluong" value = "'.$cpsinhhoc_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cpsinhhoc_cachbon" value = "'.$cpsinhhoc_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_cpsinhhoc_hieuqua" value = "'.$cpsinhhoc_hieuqua.'" /></td>
                                </tr>
                                <tr>
                                    <td>Dinh dưỡng, men tiêu hoá</td>
                                    <td><input type = "text" class="w3-input" id="tom_dinhduong_thoigian" value = "'.$dinhduong_thoigian.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dinhduong_tenthuoc" value = "'.$dinhduong_tenthuoc.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dinhduong_lieuluong" value = "'.$dinhduong_lieuluong.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dinhduong_cachbon" value = "'.$dinhduong_cachbon.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dinhduong_hieuqua" value = "'.$dinhduong_hieuqua.'" /></td>
                                </tr>
                            </table>';
                            echo '<p class="c-title2">&#9658; Quản lý xả thải</p>';
                            $tom_xatructiep = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["xaTrucTiep"])) {
                                $tom_xatructiep = $data2["object"]["hoatDongSanXuat"]["xaTrucTiep"];
                            }
                            if ($tom_xatructiep == "1"){
                                echo '<p class="c-title3">+ Xả trực tiếp ra ngoài: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xatructiep">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Xả trực tiếp ra ngoài: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xatructiep">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $tom_xltruocthai = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["xuLyTruocKhiThai"])) {
                                $tom_xltruocthai = $data2["object"]["hoatDongSanXuat"]["xuLyTruocKhiThai"];
                            }
                            if ($tom_xltruocthai == "1"){
                                echo '<p class="c-title3">+ Xử lý nước thải trước khi xả ra ngoài: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xltruocthai">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Xử lý nước thải trước khi xả ra ngoài: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xltruocthai">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phPhapXuLyTruocKhiThai"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: <input type = "text" class="w3-input" id="tom_xltruocthai_pp" value = "'.$data2["object"]["hoatDongSanXuat"]["phPhapXuLyTruocKhiThai"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: <input type = "text" class="w3-input" id="tom_xltruocthai_pp" value = "" /> </p>';
                            }
                            $tom_xlbunthai = "";
                            if (isset($data2["object"]["hoatDongSanXuat"]["xuLyBunThai"])) {
                                $tom_xlbunthai = $data2["object"]["hoatDongSanXuat"]["xuLyBunThai"];
                            }
                            if ($tom_xlbunthai == "1"){
                                echo '<p class="c-title3">+ Xử lý bùn thải: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xlbunthai">
                                    <option value = "1" selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Xử lý bùn thải: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_xlbunthai">
                                    <option value = "0" selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["hoatDongSanXuat"]["phPhapXuLyBunThai"])) {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: <input type = "text" class="w3-input" id="tom_xlbunthai_pp" value = "'.$data2["object"]["hoatDongSanXuat"]["phPhapXuLyBunThai"].'" /></p>';
                            } else {
                                echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: <input type = "text" class="w3-input" id="tom_xlbunthai_pp" value = "" /> </p>';
                            }
                            echo '<p class="c-title1">5. Thu hoạch:</p>';
                            if (isset($data2["object"]["thuHoach"]["thGianThaNuoiThuHoach"])){
                                echo '<p class="c-title3">+ Thời gian từ khi thả nuôi đến khi thu hoạch (ngày hay tháng): <input type = "text" class="w3-input" id="tom_nuoithuhoach" value = "'.$data2["object"]["thuHoach"]["thGianThaNuoiThuHoach"].'" /> </p>';
                            } else {
                                echo '<p class="c-title3">+ Thời gian từ khi thả nuôi đến khi thu hoạch( ngày hay tháng): <input type = "text" class="w3-input" id="tom_nuoithuhoach" value = "" /> </p>';
                            }
                            if (isset($data2["object"]["thuHoach"]["soLanThuHoach"])){
                                echo '<p class="c-title3">+ Số lần thu hoạch( lần): <input type = "text" class="w3-input" id="tom_thuhoach_solan" value = "'.$data2["object"]["thuHoach"]["soLanThuHoach"].'" /> </p>';
                            } else {
                                echo '<p class="c-title3">+ Số lần thu hoạch( lần): <input type = "text" class="w3-input" id="tom_thuhoach_solan" value = "" /> </p>';
                            }
                            if (isset($data2["object"]["thuHoach"]["trgLgTieuChuan"])){
                                echo '<p class="c-title3">+ Phân loại và tỷ lệ trọng lượng của tôm: Trọng lượng tôm bao nhiêu thì đạt tiêu chuẩn: <input type = "text" class="w3-input" id="tom_thuhoach_trongluong" value = "'.$data2["object"]["thuHoach"]["trgLgTieuChuan"].'" /> kg/ha</p>';
                            } else {
                                echo '<p class="c-title3">+ Phân loại và tỷ lệ trọng lượng của tôm: Trọng lượng tôm bao nhiêu thì đạt tiêu chuẩn: <input type = "text" class="w3-input" id="tom_thuhoach_trongluong" value = "" /> </p>';
                            }
                            echo '<p class="c-title3">+ Năng suất (tấn/ao/vụ):</p>';
                            if (isset($data2["object"]["thuHoach"]["nangSuatTomMuaThuan"])){
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="tom_nsmuathuan" value = "'.$data2["object"]["thuHoach"]["nangSuatTomMuaThuan"].'" /></p>';
                            } else {
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="tom_nsmuathuan" value = "" /> </p>';
                            }
                            if (isset($data2["object"]["thuHoach"]["nangSuatTomMuaNghich"])){
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="tom_nsmuanghich" value = "'.$data2["object"]["thuHoach"]["nangSuatTomMuaNghich"].'" /></p>';
                            } else {
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="tom_nsmuanghich" value = "" /> </p>';
                            }
                            echo '<p class="c-title3">+ Sản lượng( tấn/năm): </p>';
                            if (isset($data2["object"]["thuHoach"]["sanLuongTomMuaThuan"])){
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="tom_slmuathuan" value = "'.$data2["object"]["thuHoach"]["sanLuongTomMuaThuan"].'" /></p>';
                            } else {
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="tom_slmuathuan" value = "" /> </p>';
                            }
                            if (isset($data2["object"]["thuHoach"]["sanLuongTomMuaNghich"])){
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="tom_slmuanghich" value = "'.$data2["object"]["thuHoach"]["sanLuongTomMuaNghich"].'" /></p>';
                            } else {
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="tom_slmuanghich" value = "" /> </p>';
                            }
                            echo '<p class="c-title3">+ Giá bán (đồng/kg) theo từng loại theo từng tháng trong năm? </p>';
                            $gial1t1 = "";$gial1t2 = "";$gial1t3 = "";$gial1t4 = "";$gial1t5 = "";$gial1t6 = "";$gial1t7 = "";$gial1t8 = "";$gial1t9 = "";$gial1t10 = "";$gial1t11 = "";$gial1t12 = "";
                            $gial2t1 = "";$gial2t2 = "";$gial2t3 = "";$gial2t4 = "";$gial2t5 = "";$gial2t6 = "";$gial2t7 = "";$gial2t8 = "";$gial2t9 = "";$gial2t10 = "";$gial2t11 = "";$gial2t12 = "";
                            $gial3t1 = "";$gial3t2 = "";$gial3t3 = "";$gial3t4 = "";$gial3t5 = "";$gial3t6 = "";$gial3t7 = "";$gial3t8 = "";$gial3t9 = "";$gial3t10 = "";$gial3t11 = "";$gial3t12 = "";
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang1"])) {
                                $gial1t1 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang1"];
                            } else {
                                $gial1t1 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang2"])) {
                                $gial1t2 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang2"];
                            } else {
                                $gial1t2 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang3"])) {
                                $gial1t3 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang3"];
                            } else {
                                $gial1t3 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang4"])) {
                                $gial1t4 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang4"];
                            } else {
                                $gial1t4 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang5"])) {
                                $gial1t5 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang5"];
                            } else {
                                $gial1t5 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang6"])) {
                                $gial1t6 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang6"];
                            } else {
                                $gial1t6 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang7"])) {
                                $gial1t7 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang7"];
                            } else {
                                $gial1t7 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang8"])) {
                                $gial1t8 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang8"];
                            } else {
                                $gial1t8 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang9"])) {
                                $gial1t9 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang9"];
                            } else {
                                $gial1t9 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang10"])) {
                                $gial1t10 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang10"];
                            } else {
                                $gial1t10 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang11"])) {
                                $gial1t11 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang11"];
                            } else {
                                $gial1t11 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize1thang12"])) {
                                $gial1t12 = $data2["object"]["thuHoach"]["thuhoachgiabansize1thang12"];
                            } else {
                                $gial1t12 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang1"])) {
                                $gial2t1 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang1"];
                            } else {
                                $gial2t1 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang2"])) {
                                $gial2t2 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang2"];
                            } else {
                                $gial2t2 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang3"])) {
                                $gial2t3 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang3"];
                            } else {
                                $gial2t3 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang4"])) {
                                $gial2t4 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang4"];
                            } else {
                                $gial2t4 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang5"])) {
                                $gial2t5 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang5"];
                            } else {
                                $gial2t5 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang6"])) {
                                $gial2t6 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang6"];
                            } else {
                                $gial2t6 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang7"])) {
                                $gial2t7 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang7"];
                            } else {
                                $gial2t7 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang8"])) {
                                $gial2t8 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang8"];
                            } else {
                                $gial2t8 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang9"])) {
                                $gial2t9 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang9"];
                            } else {
                                $gial2t9 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang10"])) {
                                $gial2t10 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang10"];
                            } else {
                                $gial2t10 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang11"])) {
                                $gial2t11 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang11"];
                            } else {
                                $gial2t11 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize2thang12"])) {
                                $gial2t12 = $data2["object"]["thuHoach"]["thuhoachgiabansize2thang12"];
                            } else {
                                $gial2t12 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang1"])) {
                                $gial3t1 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang1"];
                            } else {
                                $gial3t1 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang2"])) {
                                $gial3t2 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang2"];
                            } else {
                                $gial3t2 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang3"])) {
                                $gial3t3 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang3"];
                            } else {
                                $gial3t3 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang4"])) {
                                $gial3t4 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang4"];
                            } else {
                                $gial3t4 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang5"])) {
                                $gial3t5 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang5"];
                            } else {
                                $gial3t5 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang6"])) {
                                $gial3t6 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang6"];
                            } else {
                                $gial3t6 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang7"])) {
                                $gial3t7 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang7"];
                            } else {
                                $gial3t7 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang8"])) {
                                $gial3t8 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang8"];
                            } else {
                                $gial3t8 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang9"])) {
                                $gial3t9 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang9"];
                            } else {
                                $gial3t9 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang10"])) {
                                $gial3t10 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang10"];
                            } else {
                                $gial3t10 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang11"])) {
                                $gial3t11 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang11"];
                            } else {
                                $gial3t11 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["thuhoachgiabansize3thang12"])) {
                                $gial3t12 = $data2["object"]["thuHoach"]["thuhoachgiabansize3thang12"];
                            } else {
                                $gial3t12 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Tháng</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>Size 1</td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t1" value = "'.$gial1t1.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t2" value = "'.$gial1t2.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t3" value = "'.$gial1t3.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t4" value = "'.$gial1t4.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t5" value = "'.$gial1t5.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t6" value = "'.$gial1t6.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t7" value = "'.$gial1t7.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t8" value = "'.$gial1t8.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t9" value = "'.$gial1t9.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t10" value = "'.$gial1t10.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t11" value = "'.$gial1t11.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l1t12" value = "'.$gial1t12.'" /></td>
                                </tr>
                                <tr>
                                    <td>Size 2</td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t1" value = "'.$gial2t1.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t2" value = "'.$gial2t2.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t3" value = "'.$gial2t3.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t4" value = "'.$gial2t4.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t5" value = "'.$gial2t5.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t6" value = "'.$gial2t6.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t7" value = "'.$gial2t7.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t8" value = "'.$gial2t8.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t9" value = "'.$gial2t9.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t10" value = "'.$gial2t10.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t11" value = "'.$gial2t11.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l2t12" value = "'.$gial2t12.'" /></td>
                                </tr>
                                <tr>
                                    <td>Size 3</td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t1" value = "'.$gial3t1.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t2" value = "'.$gial3t2.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t3" value = "'.$gial3t3.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t4" value = "'.$gial3t4.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t5" value = "'.$gial3t5.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t6" value = "'.$gial3t6.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t7" value = "'.$gial3t7.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t8" value = "'.$gial3t8.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t9" value = "'.$gial3t9.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t10" value = "'.$gial3t10.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t11" value = "'.$gial3t11.'" /></td>
                                    <td><input type = "text" class="w3-input" id="tom_dongia_l3t12" value = "'.$gial3t12.'" /></td>
                                </tr>
                            </table>';
                            echo '<p class="c-title1">6. Thị trường tiêu thụ</p>';
                            $tom_thitruongtieuthu = "";
                            if (isset($data1["object"]["thiTruongTieuThu"]["tieuThuTom"])){
                                $tom_thitruongtieuthu = $data1["object"]["thiTruongTieuThu"]["tieuThuTom"];
                            }
                            echo '<p class="c-title3">+ <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="tom_thitruongtieuthu">
                                    <option selected>'.$tom_thitruongtieuthu.'</option>
                                    <option>----------------------------</option>
                                    <option>Trong tỉnh</option>
                                    <option>Ngoài tỉnh</option>
                                    <option>Trong tỉnh; Ngoài tỉnh</option>
                                </select></p>';
                            if (isset($data2["object"]["thiTruongTieuThu"]["ngoaiTinhTieuThuTom"])){
                                echo '<p class="c-title3">+ Thị trường ngoài tỉnh( tỉnh, khu vực nào)? <input type = "text" class="w3-input" id="tom_thitruongtieuthu_ngoaitinh" value = "'.$data2["object"]["thiTruongTieuThu"]["ngoaiTinhTieuThuTom"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Thị trường ngoài tỉnh( tỉnh, khu vực nào)? <input type = "text" class="w3-input" id="tom_thitruongtieuthu_ngoaitinh" value = "" /> </p>';
                            }
                            if (isset($data2["object"]["thiTruongTieuThu"]["ngoaiNuocTieuThuTom"])){
                                echo '<p class="c-title3">+ Thị trường xuất khẩu( quốc gia, khu vực nào)? <input type = "text" class="w3-input" id="tom_thitruongtieuthu_xuatkhau" value = "'.$data2["object"]["thiTruongTieuThu"]["ngoaiNuocTieuThuTom"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Thị trường xuất khẩu( quốc gia, khu vực nào)? <input type = "text" class="w3-input" id="tom_thitruongtieuthu_xuatkhau" value = "" /> </p>';
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
        function showTooltip(event) {
            var tooltip = document.getElementById('tooltip');
            var input = event.target;

            tooltip.textContent = input.value; // Hiển thị giá trị của input trong tooltip
            tooltip.style.display = 'block'; // Hiển thị tooltip
            tooltip.style.left = event.pageX + 'px'; // Đặt vị trí theo tọa độ X của chuột
            tooltip.style.top = (event.pageY + 20) + 'px'; // Đặt vị trí theo tọa độ Y của chuột, cộng thêm khoảng cách để không che input
        }

        // Ẩn tooltip khi click ra ngoài
        function hideTooltip(event) {
            var tooltip = document.getElementById('tooltip');
            if (!event.target.classList.contains('w3-input')) {
                tooltip.style.display = 'none'; // Ẩn tooltip
            }
        }
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
            document.querySelectorAll('.w3-input').forEach(function(input) {
                input.addEventListener('click', showTooltip);
            });

            document.addEventListener('click', hideTooltip);
            $(window).scroll(function () {
                if ($(this).scrollTop() > offset)
                $('#top-up').fadeIn(duration);else
                $('#top-up').fadeOut(duration);
            });
            $('#top-up').click(function () {
                $('body,html').animate({scrollTop: 0}, duration);
            });
            
            $("#capnhatthongtinvungtrong_tom").click(function(){
                var sodienthoai = '0' + <?php echo $_GET['SODIENTHOAI'] ?>;
                var madinhdanh = <?php echo "'".$_GET['madinhdanh']."'" ?>;
                var tom_thongtinsp = $("#tom_thongtinsp option:selected").text();
                var thongtinchung_dientich = $("#thongtinchung_dientich").val();
                var thongtinchung_dientichtomsu = $("#thongtinchung_dientichtomsu").val();
                var thongtinchung_dientichtomtct = $("#thongtinchung_dientichtomtct").val();
                var thongtinchung_loaihinhsxtom = $("#thongtinchung_loaihinhsxtom option:selected").text();
                var thongtinchung_loaidatsx = $("#thongtinchung_loaidatsx option:selected").text();
                var thongtinchung_sacaudat = $("#thongtinchung_sacaudat option:selected").text();
                var thongtinchung_dophtrungbinh = $("#thongtinchung_dophtrungbinh").val();
                var thongtinchung_aotomsau = $("#thongtinchung_aotomsau").val();
                var thongtinchung_vutom = $("#thongtinchung_vutom").val();
                var tom_danquat = $("#tom_danquat option:selected").text();
                var tom_mayphongdien = $("#tom_mayphongdien option:selected").text();
                var tom_daydien = $("#tom_daydien option:selected").text();
                var tom_denchieusang = $("#tom_denchieusang option:selected").text();
                var tom_maybomnuoc = $("#tom_maybomnuoc option:selected").text();
                var tom_tuilocnuoc = $("#tom_tuilocnuoc option:selected").text();
                var tom_congxanuoc = $("#tom_congxanuoc option:selected").text();
                var tom_thietbi_khac = $("#tom_thietbi_khac").val();
                var tom_caitaocongtrinh = $("#tom_caitaocongtrinh").val();
                var tom_senvetao = $("#tom_senvetao").val();
                var tom_lotbatbobatday = $("#tom_lotbatbobatday").val();
                var tom_giacobobao = $("#tom_giacobobao").val();
                var tom_bonvoi = $("#tom_bonvoi").val();
                var tom_lieuluongbonvoi = $("#tom_lieuluongbonvoi").val();
                var tom_phoimattrang = $("#tom_phoimattrang").val();
                var tom_phoingay = $("#tom_phoingay").val();
                var tom_xulynuoc = $("#tom_xulynuoc").val();
                var tom_dt_thoigian = $("#tom_dt_thoigian").val();
                var tom_dt_tenthuoc = $("#tom_dt_tenthuoc").val();
                var tom_dt_lieuluong = $("#tom_dt_lieuluong").val();
                var tom_dt_cachbon = $("#tom_dt_cachbon").val();
                var tom_dt_hieuqua = $("#tom_dt_hieuqua").val();
                var tom_dk_thoigian = $("#tom_dk_thoigian").val();
                var tom_dk_tenthuoc = $("#tom_dk_tenthuoc").val();
                var tom_dk_lieuluong = $("#tom_dk_lieuluong").val();
                var tom_dk_cachbon = $("#tom_dk_cachbon").val();
                var tom_dk_hieuqua = $("#tom_dk_hieuqua").val();
                var tom_gmn_thoigian = $("#tom_gmn_thoigian").val();
                var tom_gmn_tenthuoc = $("#tom_gmn_tenthuoc").val();
                var tom_gmn_lieuluong = $("#tom_gmn_lieuluong").val();
                var tom_gmn_cachbon = $("#tom_gmn_cachbon").val();
                var tom_gmn_hieuqua = $("#tom_gmn_hieuqua").val();
                var tom_cvs_thoigian = $("#tom_cvs_thoigian").val();
                var tom_cvs_tenthuoc = $("#tom_cvs_tenthuoc").val();
                var tom_cvs_lieuluong = $("#tom_cvs_lieuluong").val();
                var tom_cvs_cachbon = $("#tom_cvs_cachbon").val();
                var tom_cvs_hieuqua = $("#tom_cvs_hieuqua").val();
                var tom_kh_thoigian = $("#tom_kh_thoigian").val();
                var tom_kh_tenthuoc = $("#tom_kh_tenthuoc").val();
                var tom_kh_lieuluong = $("#tom_kh_lieuluong").val();
                var tom_kh_cachbon = $("#tom_kh_cachbon").val();
                var tom_kh_hieuqua = $("#tom_kh_hieuqua").val();
                var tom_yeutomt = $("#tom_yeutomt").val();
                var tom_gionggannhat = $("#tom_gionggannhat").val();
                var tom_nguongoctom = $("#tom_nguongoctom option:selected").text();
                var tom_giayxacnhangiong = $("#tom_giayxacnhangiong").val();
                var tom_matdotha = $("#tom_matdotha").val();
                var tom_thoigiantha = $("#tom_thoigiantha").val();
                var tom_huongtha = $("#tom_huongtha").val();
                var tom_uonggieo = $("#tom_uonggieo").val();
                var tom_sdthuocnguabenh = $("#tom_sdthuocnguabenh").val();
                var tom_sthuocsovoitruocday = $("#tom_sthuocsovoitruocday").val();
                var tom_sdmenvisinh = $("#tom_sdmenvisinh").val();
                var tom_kiemtramt = $("#tom_kiemtramt").val();
                var tom_quanlynuocmt = $("#tom_quanlynuocmt").val();
                var tom_dichbenhems = $("#tom_dichbenhems option:selected").text();
                var tom_soaobibenh = $("#tom_soaobibenh option:selected").text();
                var tom_benhdomtrang = $("#tom_benhdomtrang").val();
                var tom_benhdomtrang_sosanh = $("#tom_benhdomtrang_sosanh option:selected").text();
                var tom_benhdauvang = $("#tom_benhdauvang").val();
                var tom_benhdauvang_sosanh = $("#tom_benhdauvang_sosanh option:selected").text();
                var tom_benhIHHNV = $("#tom_benhIHHNV").val();
                var tom_benhIHHNV_sosanh = $("#tom_benhIHHNV_sosanh option:selected").text();
                var tom_benhphantrang = $("#tom_benhphantrang").val();
                var tom_benhphantrang_sosanh = $("#tom_benhphantrang_sosanh option:selected").text();
                var tom_benhIMNV = $("#tom_benhIMNV").val();
                var tom_benhIMNV_sosanh = $("#tom_benhIMNV_sosanh option:selected").text();
                var tom_vibaotutrung = $("#tom_vibaotutrung").val();
                var tom_vibao_thoigian = $("#tom_vibao_thoigian").val();
                var tom_xlaokhichetnhieu = $("#tom_xlaokhichetnhieu").val();
                var tom_xuly_php = $("#tom_xuly_php").val();
                var tom_domtrang_thoigian = $("#tom_domtrang_thoigian").val();
                var tom_domtrang_tenthuoc = $("#tom_domtrang_tenthuoc").val();
                var tom_domtrang_lieuluong = $("#tom_domtrang_lieuluong").val();
                var tom_domtrang_cachbon = $("#tom_domtrang_cachbon").val();
                var tom_domtrang_hieuqua = $("#tom_domtrang_hieuqua").val();
                var tom_dauvang_thoigian = $("#tom_dauvang_thoigian").val();
                var tom_dauvang_tenthuoc = $("#tom_dauvang_tenthuoc").val();
                var tom_dauvang_lieuluong = $("#tom_dauvang_lieuluong").val();
                var tom_dauvang_cachbon = $("#tom_dauvang_cachbon").val();
                var tom_dauvang_hieuqua = $("#tom_dauvang_hieuqua").val();
                var tom_ihhnv_thoigian = $("#tom_ihhnv_thoigian").val();
                var tom_ihhnv_tenthuoc = $("#tom_ihhnv_tenthuoc").val();
                var tom_ihhnv_lieuluong = $("#tom_ihhnv_lieuluong").val();
                var tom_ihhnv_cachbon = $("#tom_ihhnv_cachbon").val();
                var tom_ihhnv_hieuqua = $("#tom_ihhnv_hieuqua").val();
                var tom_phantrang_thoigian = $("#tom_phantrang_thoigian").val();
                var tom_phantrang_tenthuoc = $("#tom_phantrang_tenthuoc").val();
                var tom_phantrang_lieuluong = $("#tom_phantrang_lieuluong").val();
                var tom_phantrang_cachbon = $("#tom_phantrang_cachbon").val();
                var tom_phantrang_hieuqua = $("#tom_phantrang_hieuqua").val();
                var tom_imnv_thoigian = $("#tom_imnv_thoigian").val();
                var tom_imnv_tenthuoc = $("#tom_imnv_tenthuoc").val();
                var tom_imnv_lieuluong = $("#tom_imnv_lieuluong").val();
                var tom_imnv_cachbon = $("#tom_imnv_cachbon").val();
                var tom_imnv_hieuqua = $("#tom_imnv_hieuqua").val();
                var tom_vbtt_thoigian = $("#tom_vbtt_thoigian").val();
                var tom_vbtt_tenthuoc = $("#tom_vbtt_tenthuoc").val();
                var tom_vbtt_lieuluong = $("#tom_vbtt_lieuluong").val();
                var tom_vbtt_cachbon = $("#tom_vbtt_cachbon").val();
                var tom_vbtt_hieuqua = $("#tom_vbtt_hieuqua").val();
                var tom_cachchoan = $("#tom_cachchoan option:selected").text();
                var tom_solanchoan = $("#tom_solanchoan").val();
                var tom_sosangan = $("#tom_sosangan").val();
                var tom_phoitromthucan = $("#tom_phoitromthucan").val();
                var tom_thucan_ten1 = $("#tom_thucan_ten1").val();
                var tom_thucan_thoigian1 = $("#tom_thucan_thoigian1").val();
                var tom_thucan_lieuluong1 = $("#tom_thucan_lieuluong1").val();
                var tom_thucan_cachbon1 = $("#tom_thucan_cachbon1").val();
                var tom_thucan_hieuqua1 = $("#tom_thucan_hieuqua1").val();
                var tom_thucan_ten2 = $("#tom_thucan_ten2").val();
                var tom_thucan_thoigian2 = $("#tom_thucan_thoigian2").val();
                var tom_thucan_lieuluong2 = $("#tom_thucan_lieuluong2").val();
                var tom_thucan_cachbon2 = $("#tom_thucan_cachbon2").val();
                var tom_thucan_hieuqua2 = $("#tom_thucan_hieuqua2").val();
                var tom_thucan_ten3 = $("#tom_thucan_ten3").val();
                var tom_thucan_thoigian3 = $("#tom_thucan_thoigian3").val();
                var tom_thucan_lieuluong3 = $("#tom_thucan_lieuluong3").val();
                var tom_thucan_cachbon3 = $("#tom_thucan_cachbon3").val();
                var tom_thucan_hieuqua3 = $("#tom_thucan_hieuqua3").val();
                var tom_ktdoph = $("#tom_ktdoph").val();
                var tom_ktdoph_solan = $("#tom_ktdoph_solan").val();
                var tom_ktdokiem = $("#tom_ktdokiem").val();
                var tom_ktdokiem_solan = $("#tom_ktdokiem_solan").val();
                var tom_duytridokiem = $("#tom_duytridokiem").val();
                var tom_dokiem_thoigian = $("#tom_dokiem_thoigian").val();
                var tom_dokiem_tenthuoc = $("#tom_dokiem_tenthuoc").val();
                var tom_dokiem_lieuluong = $("#tom_dokiem_lieuluong").val();
                var tom_dokiem_cachbon = $("#tom_dokiem_cachbon").val();
                var tom_dokiem_hieuqua = $("#tom_dokiem_hieuqua").val();
                var tom_bskhoang_thoigian = $("#tom_bskhoang_thoigian").val();
                var tom_bskhoang_tenthuoc = $("#tom_bskhoang_tenthuoc").val();
                var tom_bskhoang_lieuluong = $("#tom_bskhoang_lieuluong").val();
                var tom_bskhoang_cachbon = $("#tom_bskhoang_cachbon").val();
                var tom_bskhoang_hieuqua = $("#tom_bskhoang_hieuqua").val();
                var tom_cayvisinh_thoigian = $("#tom_cayvisinh_thoigian").val();
                var tom_cayvisinh_tenthuoc = $("#tom_cayvisinh_tenthuoc").val();
                var tom_cayvisinh_lieuluong = $("#tom_cayvisinh_lieuluong").val();
                var tom_cayvisinh_cachbon = $("#tom_cayvisinh_cachbon").val();
                var tom_cayvisinh_hieuqua = $("#tom_cayvisinh_hieuqua").val();
                var tom_cpsinhhoc_thoigian = $("#tom_cpsinhhoc_thoigian").val();
                var tom_cpsinhhoc_tenthuoc = $("#tom_cpsinhhoc_tenthuoc").val();
                var tom_cpsinhhoc_lieuluong = $("#tom_cpsinhhoc_lieuluong").val();
                var tom_cpsinhhoc_cachbon = $("#tom_cpsinhhoc_cachbon").val();
                var tom_cpsinhhoc_hieuqua = $("#tom_cpsinhhoc_hieuqua").val();
                var tom_dinhduong_thoigian = $("#tom_dinhduong_thoigian").val();
                var tom_dinhduong_tenthuoc = $("#tom_dinhduong_tenthuoc").val();
                var tom_dinhduong_lieuluong = $("#tom_dinhduong_lieuluong").val();
                var tom_dinhduong_cachbon = $("#tom_dinhduong_cachbon").val();
                var tom_dinhduong_hieuqua = $("#tom_dinhduong_hieuqua").val();
                var tom_xatructiep = $("#tom_xatructiep").val();
                var tom_xltruocthai = $("#tom_xltruocthai").val();
                var tom_xltruocthai_pp = $("#tom_xltruocthai_pp").val();
                var tom_xlbunthai = $("#tom_xlbunthai").val();
                var tom_xlbunthai_pp = $("#tom_xlbunthai_pp").val();
                var tom_nuoithuhoach = $("#tom_nuoithuhoach").val();
                var tom_thuhoach_solan = $("#tom_thuhoach_solan").val();
                var tom_thuhoach_trongluong = $("#tom_thuhoach_trongluong").val();
                var tom_nsmuathuan = $("#tom_nsmuathuan").val();
                var tom_nsmuanghich = $("#tom_nsmuanghich").val();
                var tom_slmuathuan = $("#tom_slmuathuan").val();
                var tom_slmuanghich = $("#tom_slmuanghich").val();
                var tom_dongia_l1t1 = $("#tom_dongia_l1t1").val();
                var tom_dongia_l1t2 = $("#tom_dongia_l1t2").val();
                var tom_dongia_l1t3 = $("#tom_dongia_l1t3").val();
                var tom_dongia_l1t4 = $("#tom_dongia_l1t4").val();
                var tom_dongia_l1t5 = $("#tom_dongia_l1t5").val();
                var tom_dongia_l1t6 = $("#tom_dongia_l1t6").val();
                var tom_dongia_l1t7 = $("#tom_dongia_l1t7").val();
                var tom_dongia_l1t8 = $("#tom_dongia_l1t8").val();
                var tom_dongia_l1t9 = $("#tom_dongia_l1t9").val();
                var tom_dongia_l1t10 = $("#tom_dongia_l1t10").val();
                var tom_dongia_l1t11 = $("#tom_dongia_l1t11").val();
                var tom_dongia_l1t12 = $("#tom_dongia_l1t12").val();
                var tom_dongia_l2t1 = $("#tom_dongia_l2t1").val();
                var tom_dongia_l2t2 = $("#tom_dongia_l2t2").val();
                var tom_dongia_l2t3 = $("#tom_dongia_l2t3").val();
                var tom_dongia_l2t4 = $("#tom_dongia_l2t4").val();
                var tom_dongia_l2t5 = $("#tom_dongia_l2t5").val();
                var tom_dongia_l2t6 = $("#tom_dongia_l2t6").val();
                var tom_dongia_l2t7 = $("#tom_dongia_l2t7").val();
                var tom_dongia_l2t8 = $("#tom_dongia_l2t8").val();
                var tom_dongia_l2t9 = $("#tom_dongia_l2t9").val();
                var tom_dongia_l2t10 = $("#tom_dongia_l2t10").val();
                var tom_dongia_l2t11 = $("#tom_dongia_l2t11").val();
                var tom_dongia_l2t12 = $("#tom_dongia_l2t12").val();
                var tom_dongia_l3t1 = $("#tom_dongia_l3t1").val();
                var tom_dongia_l3t2 = $("#tom_dongia_l3t2").val();
                var tom_dongia_l3t3 = $("#tom_dongia_l3t3").val();
                var tom_dongia_l3t4 = $("#tom_dongia_l3t4").val();
                var tom_dongia_l3t5 = $("#tom_dongia_l3t5").val();
                var tom_dongia_l3t6 = $("#tom_dongia_l3t6").val();
                var tom_dongia_l3t7 = $("#tom_dongia_l3t7").val();
                var tom_dongia_l3t8 = $("#tom_dongia_l3t8").val();
                var tom_dongia_l3t9 = $("#tom_dongia_l3t9").val();
                var tom_dongia_l3t10 = $("#tom_dongia_l3t10").val();
                var tom_dongia_l3t11 = $("#tom_dongia_l3t11").val();
                var tom_dongia_l3t12 = $("#tom_dongia_l3t12").val();
                var tom_thitruongtieuthu = $("#tom_thitruongtieuthu option:selected").text();
                var tom_thitruongtieuthu_ngoaitinh = $("#tom_thitruongtieuthu_ngoaitinh").val();
                var tom_thitruongtieuthu_xuatkhau = $("#tom_thitruongtieuthu_xuatkhau").val();
                if(check_number(sodienthoai) == 0){
                    alert("Không có thông tin! Vui lòng kiểm tra lại!");
                } else {
                    $.ajax({
                        type: 'POST',
                        url: 'go',
                        data: {
                            for: "_suathongtinvungtrong_tom",
                            sodienthoai: sodienthoai,
                            madinhdanh : madinhdanh,
                            tom_thongtinsp : tom_thongtinsp,
                            thongtinchung_dientich : thongtinchung_dientich,
                            thongtinchung_dientichtomsu : thongtinchung_dientichtomsu,
                            thongtinchung_dientichtomtct : thongtinchung_dientichtomtct,
                            thongtinchung_loaihinhsxtom : thongtinchung_loaihinhsxtom,
                            thongtinchung_loaidatsx : thongtinchung_loaidatsx,
                            thongtinchung_sacaudat : thongtinchung_sacaudat,
                            thongtinchung_dophtrungbinh : thongtinchung_dophtrungbinh,
                            thongtinchung_aotomsau : thongtinchung_aotomsau,
                            thongtinchung_vutom : thongtinchung_vutom,
                            tom_danquat : tom_danquat,
                            tom_mayphongdien : tom_mayphongdien,
                            tom_daydien : tom_daydien,
                            tom_denchieusang : tom_denchieusang,
                            tom_maybomnuoc : tom_maybomnuoc,
                            tom_tuilocnuoc : tom_tuilocnuoc,
                            tom_congxanuoc : tom_congxanuoc,
                            tom_thietbi_khac : tom_thietbi_khac,
                            tom_caitaocongtrinh : tom_caitaocongtrinh,
                            tom_senvetao : tom_senvetao,
                            tom_lotbatbobatday : tom_lotbatbobatday,
                            tom_giacobobao : tom_giacobobao,
                            tom_bonvoi : tom_bonvoi,
                            tom_lieuluongbonvoi : tom_lieuluongbonvoi,
                            tom_phoimattrang : tom_phoimattrang,
                            tom_phoingay : tom_phoingay,
                            tom_xulynuoc : tom_xulynuoc,
                            tom_dt_thoigian : tom_dt_thoigian,
                            tom_dt_tenthuoc : tom_dt_tenthuoc,
                            tom_dt_lieuluong : tom_dt_lieuluong,
                            tom_dt_cachbon : tom_dt_cachbon,
                            tom_dt_hieuqua : tom_dt_hieuqua,
                            tom_dk_thoigian : tom_dk_thoigian,
                            tom_dk_tenthuoc : tom_dk_tenthuoc,
                            tom_dk_lieuluong : tom_dk_lieuluong,
                            tom_dk_cachbon : tom_dk_cachbon,
                            tom_dk_hieuqua : tom_dk_hieuqua,
                            tom_gmn_thoigian : tom_gmn_thoigian,
                            tom_gmn_tenthuoc : tom_gmn_tenthuoc,
                            tom_gmn_lieuluong : tom_gmn_lieuluong,
                            tom_gmn_cachbon : tom_gmn_cachbon,
                            tom_gmn_hieuqua : tom_gmn_hieuqua,
                            tom_cvs_thoigian : tom_cvs_thoigian,
                            tom_cvs_tenthuoc : tom_cvs_tenthuoc,
                            tom_cvs_lieuluong : tom_cvs_lieuluong,
                            tom_cvs_cachbon : tom_cvs_cachbon,
                            tom_cvs_hieuqua : tom_cvs_hieuqua,
                            tom_kh_thoigian : tom_kh_thoigian,
                            tom_kh_tenthuoc : tom_kh_tenthuoc,
                            tom_kh_lieuluong : tom_kh_lieuluong,
                            tom_kh_cachbon : tom_kh_cachbon,
                            tom_kh_hieuqua : tom_kh_hieuqua,
                            tom_yeutomt : tom_yeutomt,
                            tom_gionggannhat : tom_gionggannhat,
                            tom_nguongoctom : tom_nguongoctom,
                            tom_giayxacnhangiong : tom_giayxacnhangiong,
                            tom_matdotha : tom_matdotha,
                            tom_thoigiantha : tom_thoigiantha,
                            tom_huongtha : tom_huongtha,
                            tom_uonggieo : tom_uonggieo,
                            tom_sdthuocnguabenh : tom_sdthuocnguabenh,
                            tom_sthuocsovoitruocday : tom_sthuocsovoitruocday,
                            tom_sdmenvisinh : tom_sdmenvisinh,
                            tom_kiemtramt : tom_kiemtramt,
                            tom_quanlynuocmt : tom_quanlynuocmt,
                            tom_dichbenhems : tom_dichbenhems,
                            tom_soaobibenh : tom_soaobibenh,
                            tom_benhdomtrang : tom_benhdomtrang,
                            tom_benhdomtrang_sosanh : tom_benhdomtrang_sosanh,
                            tom_benhdauvang : tom_benhdauvang,
                            tom_benhdauvang_sosanh : tom_benhdauvang_sosanh,
                            tom_benhIHHNV : tom_benhIHHNV,
                            tom_benhIHHNV_sosanh : tom_benhIHHNV_sosanh,
                            tom_benhphantrang : tom_benhphantrang,
                            tom_benhphantrang_sosanh : tom_benhphantrang_sosanh,
                            tom_benhIMNV : tom_benhIMNV,
                            tom_benhIMNV_sosanh : tom_benhIMNV_sosanh,
                            tom_vibaotutrung : tom_vibaotutrung,
                            tom_vibao_thoigian : tom_vibao_thoigian,
                            tom_xlaokhichetnhieu : tom_xlaokhichetnhieu,
                            tom_xuly_php : tom_xuly_php,
                            tom_domtrang_thoigian : tom_domtrang_thoigian,
                            tom_domtrang_tenthuoc : tom_domtrang_tenthuoc,
                            tom_domtrang_lieuluong : tom_domtrang_lieuluong,
                            tom_domtrang_cachbon : tom_domtrang_cachbon,
                            tom_domtrang_hieuqua : tom_domtrang_hieuqua,
                            tom_dauvang_thoigian : tom_dauvang_thoigian,
                            tom_dauvang_tenthuoc : tom_dauvang_tenthuoc,
                            tom_dauvang_lieuluong : tom_dauvang_lieuluong,
                            tom_dauvang_cachbon : tom_dauvang_cachbon,
                            tom_dauvang_hieuqua : tom_dauvang_hieuqua,
                            tom_ihhnv_thoigian : tom_ihhnv_thoigian,
                            tom_ihhnv_tenthuoc : tom_ihhnv_tenthuoc,
                            tom_ihhnv_lieuluong : tom_ihhnv_lieuluong,
                            tom_ihhnv_cachbon : tom_ihhnv_cachbon,
                            tom_ihhnv_hieuqua : tom_ihhnv_hieuqua,
                            tom_phantrang_thoigian : tom_phantrang_thoigian,
                            tom_phantrang_tenthuoc : tom_phantrang_tenthuoc,
                            tom_phantrang_lieuluong : tom_phantrang_lieuluong,
                            tom_phantrang_cachbon : tom_phantrang_cachbon,
                            tom_phantrang_hieuqua : tom_phantrang_hieuqua,
                            tom_imnv_thoigian : tom_imnv_thoigian,
                            tom_imnv_tenthuoc : tom_imnv_tenthuoc,
                            tom_imnv_lieuluong : tom_imnv_lieuluong,
                            tom_imnv_cachbon : tom_imnv_cachbon,
                            tom_imnv_hieuqua : tom_imnv_hieuqua,
                            tom_vbtt_thoigian : tom_vbtt_thoigian,
                            tom_vbtt_tenthuoc : tom_vbtt_tenthuoc,
                            tom_vbtt_lieuluong : tom_vbtt_lieuluong,
                            tom_vbtt_cachbon : tom_vbtt_cachbon,
                            tom_vbtt_hieuqua : tom_vbtt_hieuqua,
                            tom_cachchoan : tom_cachchoan,
                            tom_solanchoan : tom_solanchoan,
                            tom_sosangan : tom_sosangan,
                            tom_phoitromthucan : tom_phoitromthucan,
                            tom_thucan_ten1 : tom_thucan_ten1,
                            tom_thucan_thoigian1 : tom_thucan_thoigian1,
                            tom_thucan_lieuluong1 : tom_thucan_lieuluong1,
                            tom_thucan_cachbon1 : tom_thucan_cachbon1,
                            tom_thucan_hieuqua1 : tom_thucan_hieuqua1,
                            tom_thucan_ten2 : tom_thucan_ten2,
                            tom_thucan_thoigian2 : tom_thucan_thoigian2,
                            tom_thucan_lieuluong2 : tom_thucan_lieuluong2,
                            tom_thucan_cachbon2 : tom_thucan_cachbon2,
                            tom_thucan_hieuqua2 : tom_thucan_hieuqua2,
                            tom_thucan_ten3 : tom_thucan_ten3,
                            tom_thucan_thoigian3 : tom_thucan_thoigian3,
                            tom_thucan_lieuluong3 : tom_thucan_lieuluong3,
                            tom_thucan_cachbon3 : tom_thucan_cachbon3,
                            tom_thucan_hieuqua3 : tom_thucan_hieuqua3,
                            tom_ktdoph : tom_ktdoph,
                            tom_ktdoph_solan : tom_ktdoph_solan,
                            tom_ktdokiem : tom_ktdokiem,
                            tom_ktdokiem_solan : tom_ktdokiem_solan,
                            tom_duytridokiem : tom_duytridokiem,
                            tom_dokiem_thoigian : tom_dokiem_thoigian,
                            tom_dokiem_tenthuoc : tom_dokiem_tenthuoc,
                            tom_dokiem_lieuluong : tom_dokiem_lieuluong,
                            tom_dokiem_cachbon : tom_dokiem_cachbon,
                            tom_dokiem_hieuqua : tom_dokiem_hieuqua,
                            tom_bskhoang_thoigian : tom_bskhoang_thoigian,
                            tom_bskhoang_tenthuoc : tom_bskhoang_tenthuoc,
                            tom_bskhoang_lieuluong : tom_bskhoang_lieuluong,
                            tom_bskhoang_cachbon : tom_bskhoang_cachbon,
                            tom_bskhoang_hieuqua : tom_bskhoang_hieuqua,
                            tom_cayvisinh_thoigian : tom_cayvisinh_thoigian,
                            tom_cayvisinh_tenthuoc : tom_cayvisinh_tenthuoc,
                            tom_cayvisinh_lieuluong : tom_cayvisinh_lieuluong,
                            tom_cayvisinh_cachbon : tom_cayvisinh_cachbon,
                            tom_cayvisinh_hieuqua : tom_cayvisinh_hieuqua,
                            tom_cpsinhhoc_thoigian : tom_cpsinhhoc_thoigian,
                            tom_cpsinhhoc_tenthuoc : tom_cpsinhhoc_tenthuoc,
                            tom_cpsinhhoc_lieuluong : tom_cpsinhhoc_lieuluong,
                            tom_cpsinhhoc_cachbon : tom_cpsinhhoc_cachbon,
                            tom_cpsinhhoc_hieuqua : tom_cpsinhhoc_hieuqua,
                            tom_dinhduong_thoigian : tom_dinhduong_thoigian,
                            tom_dinhduong_tenthuoc : tom_dinhduong_tenthuoc,
                            tom_dinhduong_lieuluong : tom_dinhduong_lieuluong,
                            tom_dinhduong_cachbon : tom_dinhduong_cachbon,
                            tom_dinhduong_hieuqua : tom_dinhduong_hieuqua,
                            tom_xatructiep : tom_xatructiep,
                            tom_xltruocthai : tom_xltruocthai,
                            tom_xltruocthai_pp : tom_xltruocthai_pp,
                            tom_xlbunthai : tom_xlbunthai,
                            tom_xlbunthai_pp : tom_xlbunthai_pp,
                            tom_nuoithuhoach : tom_nuoithuhoach,
                            tom_thuhoach_solan : tom_thuhoach_solan,
                            tom_thuhoach_trongluong : tom_thuhoach_trongluong,
                            tom_nsmuathuan : tom_nsmuathuan,
                            tom_nsmuanghich : tom_nsmuanghich,
                            tom_slmuathuan : tom_slmuathuan,
                            tom_slmuanghich : tom_slmuanghich,
                            tom_dongia_l1t1 : tom_dongia_l1t1,
                            tom_dongia_l1t2 : tom_dongia_l1t2,
                            tom_dongia_l1t3 : tom_dongia_l1t3,
                            tom_dongia_l1t4 : tom_dongia_l1t4,
                            tom_dongia_l1t5 : tom_dongia_l1t5,
                            tom_dongia_l1t6 : tom_dongia_l1t6,
                            tom_dongia_l1t7 : tom_dongia_l1t7,
                            tom_dongia_l1t8 : tom_dongia_l1t8,
                            tom_dongia_l1t9 : tom_dongia_l1t9,
                            tom_dongia_l1t10 : tom_dongia_l1t10,
                            tom_dongia_l1t11 : tom_dongia_l1t11,
                            tom_dongia_l1t12 : tom_dongia_l1t12,
                            tom_dongia_l2t1 : tom_dongia_l2t1,
                            tom_dongia_l2t2 : tom_dongia_l2t2,
                            tom_dongia_l2t3 : tom_dongia_l2t3,
                            tom_dongia_l2t4 : tom_dongia_l2t4,
                            tom_dongia_l2t5 : tom_dongia_l2t5,
                            tom_dongia_l2t6 : tom_dongia_l2t6,
                            tom_dongia_l2t7 : tom_dongia_l2t7,
                            tom_dongia_l2t8 : tom_dongia_l2t8,
                            tom_dongia_l2t9 : tom_dongia_l2t9,
                            tom_dongia_l2t10 : tom_dongia_l2t10,
                            tom_dongia_l2t11 : tom_dongia_l2t11,
                            tom_dongia_l2t12 : tom_dongia_l2t12,
                            tom_dongia_l3t1 : tom_dongia_l3t1,
                            tom_dongia_l3t2 : tom_dongia_l3t2,
                            tom_dongia_l3t3 : tom_dongia_l3t3,
                            tom_dongia_l3t4 : tom_dongia_l3t4,
                            tom_dongia_l3t5 : tom_dongia_l3t5,
                            tom_dongia_l3t6 : tom_dongia_l3t6,
                            tom_dongia_l3t7 : tom_dongia_l3t7,
                            tom_dongia_l3t8 : tom_dongia_l3t8,
                            tom_dongia_l3t9 : tom_dongia_l3t9,
                            tom_dongia_l3t10 : tom_dongia_l3t10,
                            tom_dongia_l3t11 : tom_dongia_l3t11,
                            tom_dongia_l3t12 : tom_dongia_l3t12,
                            tom_thitruongtieuthu : tom_thitruongtieuthu,
                            tom_thitruongtieuthu_ngoaitinh : tom_thitruongtieuthu_ngoaitinh,
                            tom_thitruongtieuthu_xuatkhau : tom_thitruongtieuthu_xuatkhau,
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