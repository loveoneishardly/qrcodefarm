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
            <h1>ĐỊNH DANH VÙNG TRỒNG Version 2</h1>
        </div>
    </header>
    <div class="w3-row-padding">
        <div class="w3-col" id="thongtinchung_api">
            <h4>1. Thông Tin Chung</h4>
            <?php
                $data_info1 = json_decode($responeInfo,true);
                $data1 = json_decode($responeAPI,true);
                $data2 = json_decode($responeAPI,true);
                $data_info2 = json_decode($responeInfo,true);
                if ($data1["code"] == 200 && $data2["code"] == 200) {
                    echo '<p class="c-title5">- Tên nông hộ: <b>'.$data1["object"]["thongTinChung"]["tenNguoiDaiDien"].'</b></p>';
                    echo '<p class="c-title5">- Địa chỉ: '.$data1["object"]["thongTinChung"]["diaChi"].'</p>';
                    if (isset($data2["object"]["thongTinChung"]["dienTichLuaHA"])){
                        echo '<p class="c-title5">- Diện tích canh tác: '.$data2["object"]["thongTinChung"]["dienTichLuaHA"].' ha</p>'; 
                    } else {
                        echo '<p class="c-title5">- Diện tích canh tác: ...... ha</p>';
                    }
                    echo '<p class="c-title5">- Hợp tác xã: '.$data_info1[0]["HOPTACXA"].'</p>';
                } else {
                    echo '<p><b style="color:red;">Chưa có thông tin</b></p>';
                }
            ?>
        </div>
        <div class="w3-col">
            <?php
                $current_year = date("Y");
                $data2 = json_decode($responeAPI,true);
                $data_info2 = json_decode($responeInfo,true);
                if ($data2["code"] == 200) {
                    echo '<h4>2. Thông tin về đất canh tác</h4>';
                    echo '<p class="c-title1">2.1. Loại đất sản xuất: </p>';
                    if (isset($data2["object"]["datCanhTac"]["loaiDatSanXuat"])) {
                        echo '<p class="c-title3">- '.$data2["object"]["datCanhTac"]["loaiDatSanXuat"].'</p>';
                    }
                    echo '<p class="c-title1">2.2. Thực trạng đồng ruộng: </p>';
                    echo '<p class="c-title3">- Có đầu tư san sửa mặt bằng đồng ruộng không?</p>';
                    echo '<h4>3. Thời vụ canh tác</h4>';
                    echo '<p class="c-title3">- Ngày gieo sạ: </p>';
                    echo '<h4>4. Kỹ thuật làm đất</h4>';
                    echo '<p class="c-title3">- Cày phơi ải đất: </p>';
                    echo '<p class="c-title3">- Biện pháp xử lý rơm rạ là gì? </p>';
                    echo '<p class="c-title3">- Sử dụng chế phẩm xủ lý rơm rạ: </p>';
                    echo '<p class="c-title3">Nếu có, loại chế phẩm sử dụng là gì? </p>';
                    echo '<h4>5. Giống và cách xử lý giống</h4>';
                    echo '<p class="c-title3">- Xử lý hạt giống: </p>';
                    echo '<h4>6. Phương pháp gieo xạ</h4>';
                    echo '<h4>7. Kỹ thuật bón phân</h4>';
                    $hc_lot = '';$hc_lan1 = '';$hc_lan2 = '';$hc_lan3 = '';$hc_lan4 = '';$hc_lan5 = '';$hc_cong = '';$hc_thoidiem = ' ';
                    $ctd_lot = '';$ctd_lan1 = '';$ctd_lan2 = '';$ctd_lan3 = '';$ctd_lan4 = '';$ctd_lan5 = '';$ctd_cong = '';$ctd_thoidiem = '';
                    $ure_lot = '';$ure_lan1 = '';$ure_lan2 = '';$ure_lan3 = '';$ure_lan4 = '';$ure_lan5 = '';$ure_cong = '';$ure_thoidiem = '';
                    $lan_lot = '';$lan_lan1 = '';$lan_lan2 = '';$lan_lan3 = '';$lan_lan4 = '';$lan_lan5 = '';$lan_cong = '';$lan_thoidiem = '';
                    $kali_lot = '';$kali_lan1 = '';$kali_lan2 = '';$kali_lan3 = '';$kali_lan4 = '';$kali_lan5 = '';$kali_cong = '';$kali_thoidiem = '';
                    $dap_lot = '';$dap_lan1 = '';$dap_lan2 = '';$dap_lan3 = '';$dap_lan4 = '';$dap_lan5 = '';$dap_cong = '';$dap_thoidiem = '';
                    $npk_ten = '.....';$npk_lot = '';$npk_lan1 = '';$npk_lan2 = '';$npk_lan3 = '';$npk_lan4 = '';$npk_lan5 = '';$npk_cong = '';$npk_thoidiem = '';
                    $khac_ten = '.....';$khac_lot = '';$khac_lan1 = '';$khac_lan2 = '';$khac_lan3 = '';$khac_lan4 = '';$khac_lan5 = '';$khac_cong = '';$khac_thoidiem = '';
                    $bonla_ten = '.....';$bonla_lot = '';$bonla_lan1 = '';$bonla_lan2 = '';$bonla_lan3 = '';$bonla_lan4 = '';$bonla_lan5 = '';$bonla_cong = '';$bonla_thoidiem = '';
                    $tongcong_lot = '';$tongcong_lan1 = '';$tongcong_lan2 = '';$tongcong_lan3 = '';$tongcong_lan4 = '';$tongcong_lan5 = '';$tongcong_cong = '';$tongcong_thoidiem = '';$vusanxuat = '';$donvibon = "";
                    if (isset($data2["object"]["kyThuatBonPhan"]["donViBon"])){
                        $donvibon = $data2["object"]["kyThuatBonPhan"]["donViBon"];
                    }
                    if (isset($data2["object"]["kyThuatBonPhan"]["vuSanXuat"])){
                        $vusanxuat = $data2["object"]["kyThuatBonPhan"]["vuSanXuat"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phcbonLot"])){
                       $hc_lot = $data2["object"]["kyThuatBonPhan"]["phcbonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phclan1"])){
                        $hc_lan1 = $data2["object"]["kyThuatBonPhan"]["phclan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phclan2"])){
                        $hc_lan2 = $data2["object"]["kyThuatBonPhan"]["phclan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phclan3"])){
                        $hc_lan3 = $data2["object"]["kyThuatBonPhan"]["phclan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phclan4"])){
                        $hc_lan4 = $data2["object"]["kyThuatBonPhan"]["phclan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phclan5"])){
                        $hc_lan5 = $data2["object"]["kyThuatBonPhan"]["phclan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phctong"])){
                        $hc_cong = $data2["object"]["kyThuatBonPhan"]["phctong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdbonLot"])){
                       $ctd_lot = $data2["object"]["kyThuatBonPhan"]["pctdbonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan1"])){
                        $ctd_lan1 = $data2["object"]["kyThuatBonPhan"]["pctdlan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan2"])){
                        $ctd_lan2 = $data2["object"]["kyThuatBonPhan"]["pctdlan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan3"])){
                        $ctd_lan3 = $data2["object"]["kyThuatBonPhan"]["pctdlan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan4"])){
                        $ctd_lan4 = $data2["object"]["kyThuatBonPhan"]["pctdlan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdlan5"])){
                        $ctd_lan5 = $data2["object"]["kyThuatBonPhan"]["pctdlan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdtong"])){
                        $ctd_cong = $data2["object"]["kyThuatBonPhan"]["pctdtong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["ureBonLot"])){
                       $ure_lot = $data2["object"]["kyThuatBonPhan"]["ureBonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["ureLan1"])){
                        $ure_lan1 = $data2["object"]["kyThuatBonPhan"]["ureLan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["ureLan2"])){
                        $ure_lan2 = $data2["object"]["kyThuatBonPhan"]["ureLan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["ureLan3"])){
                        $ure_lan3 = $data2["object"]["kyThuatBonPhan"]["ureLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["ureLan4"])){
                        $ure_lan4 = $data2["object"]["kyThuatBonPhan"]["ureLan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["ureLan5"])){
                        $ure_lan5 = $data2["object"]["kyThuatBonPhan"]["ureLan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["ureTong"])){
                        $ure_cong = $data2["object"]["kyThuatBonPhan"]["ureTong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["planBonLot"])){
                       $lan_lot = $data2["object"]["kyThuatBonPhan"]["planBonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["planLan1"])){
                        $lan_lan1 = $data2["object"]["kyThuatBonPhan"]["planLan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["planLan2"])){
                        $lan_lan2 = $data2["object"]["kyThuatBonPhan"]["planLan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["planLan3"])){
                        $lan_lan3 = $data2["object"]["kyThuatBonPhan"]["planLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["planLan4"])){
                        $lan_lan4 = $data2["object"]["kyThuatBonPhan"]["planLan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["planLan5"])){
                        $lan_lan5 = $data2["object"]["kyThuatBonPhan"]["planLan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["planTong"])){
                        $lan_cong = $data2["object"]["kyThuatBonPhan"]["planTong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pkaliBonLot"])){
                       $kali_lot = $data2["object"]["kyThuatBonPhan"]["pkaliBonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan1"])){
                        $kali_lan1 = $data2["object"]["kyThuatBonPhan"]["pkaliLan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan2"])){
                        $kali_lan2 = $data2["object"]["kyThuatBonPhan"]["pkaliLan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan3"])){
                        $kali_lan3 = $data2["object"]["kyThuatBonPhan"]["pkaliLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan3"])){
                        $kali_lan4 = $data2["object"]["kyThuatBonPhan"]["pkaliLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pkaliLan5"])){
                        $kali_lan5 = $data2["object"]["kyThuatBonPhan"]["pkaliLan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pctdtong"])){
                        $kali_cong = $data2["object"]["kyThuatBonPhan"]["pkaliTong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pdapBonlot"])){
                       $dap_lot = $data2["object"]["kyThuatBonPhan"]["pdapBonlot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan1"])){
                        $dap_lan1 = $data2["object"]["kyThuatBonPhan"]["pdapLan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan2"])){
                        $dap_lan2 = $data2["object"]["kyThuatBonPhan"]["pdapLan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan3"])){
                        $dap_lan3 = $data2["object"]["kyThuatBonPhan"]["pdapLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan4"])){
                        $dap_lan4 = $data2["object"]["kyThuatBonPhan"]["pdapLan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pdapLan5"])){
                        $dap_lan5 = $data2["object"]["kyThuatBonPhan"]["pdapLan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["pdapTong"])){
                        $dap_cong = $data2["object"]["kyThuatBonPhan"]["pdapTong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["tenPhanNPK"])){
                       $npk_ten = $data2["object"]["kyThuatBonPhan"]["tenPhanNPK"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phNpkBonLot"])){
                       $npk_lot = $data2["object"]["kyThuatBonPhan"]["phNpkBonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan1"])){
                        $npk_lan1 = $data2["object"]["kyThuatBonPhan"]["nhNpkLan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan2"])){
                        $npk_lan2 = $data2["object"]["kyThuatBonPhan"]["nhNpkLan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan3"])){
                        $npk_lan3 = $data2["object"]["kyThuatBonPhan"]["nhNpkLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan4"])){
                        $npk_lan4 = $data2["object"]["kyThuatBonPhan"]["nhNpkLan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["nhNpkLan5"])){
                        $npk_lan5 = $data2["object"]["kyThuatBonPhan"]["nhNpkLan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phNpkTong"])){
                        $npk_cong = $data2["object"]["kyThuatBonPhan"]["phNpkTong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["tenphankhac"])){
                       $khac_ten = $data2["object"]["kyThuatBonPhan"]["tenphankhac"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phKhacBonLot"])){
                       $khac_lot = $data2["object"]["kyThuatBonPhan"]["phKhacBonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan1"])){
                        $khac_lan1 = $data2["object"]["kyThuatBonPhan"]["phKhacLan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan2"])){
                        $khac_lan2 = $data2["object"]["kyThuatBonPhan"]["phKhacLan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan3"])){
                        $khac_lan3 = $data2["object"]["kyThuatBonPhan"]["phKhacLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan4"])){
                        $khac_lan4 = $data2["object"]["kyThuatBonPhan"]["phKhacLan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phKhacLan5"])){
                        $khac_lan5 = $data2["object"]["kyThuatBonPhan"]["phKhacLan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phKhacTong"])){
                        $khac_cong = $data2["object"]["kyThuatBonPhan"]["phKhacTong"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["tenphanbonla"])){
                       $bonla_ten = $data2["object"]["kyThuatBonPhan"]["tenphanbonla"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phBLBonLot"])){
                       $bonla_lot = $data2["object"]["kyThuatBonPhan"]["phBLBonLot"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan1"])){
                        $bonla_lan1 = $data2["object"]["kyThuatBonPhan"]["phBLLan1"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan2"])){
                        $bonla_lan2 = $data2["object"]["kyThuatBonPhan"]["phBLLan2"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan3"])){
                        $bonla_lan3 = $data2["object"]["kyThuatBonPhan"]["phBLLan3"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan4"])){
                        $bonla_lan4 = $data2["object"]["kyThuatBonPhan"]["phBLLan4"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phBLLan5"])){
                        $bonla_lan5 = $data2["object"]["kyThuatBonPhan"]["phBLLan5"];
                    }
                    if(isset($data2["object"]["kyThuatBonPhan"]["phBLTong"])){
                        $bonla_cong = $data2["object"]["kyThuatBonPhan"]["phBLTong"];
                    }

                    echo '<p class="c-title3">- Chi tiết các đợt bón phân (đơn vị bón: '.$donvibon.') </p>';
                    echo '<table class="w3-table-all" border="1">
                        <tr valign="center">
                            <td rowspan="2" style="text-align: center;">Loại phân</td>
                            <td colspan="7" style="text-align: center;">Vụ sản xuất: '.$vusanxuat.'</td>
                            <td rowspan="2" style="text-align: center;">Thời điểm bón phân</td>
                        </tr>
                        <tr>
                            <td>Bón lót</td>
                            <td>Lần 1</td>
                            <td>Lần 2</td>
                            <td>Lần 3</td>
                            <td>Lần 4</td>
                            <td>Lần 5</td>
                            <td>Cộng</td>
                        </tr>
                        <tr>
                            <td>Phân hữu cơ</td>
                            <td>'.$hc_lot.'</td>
                            <td>'.$hc_lan1.'</td>
                            <td>'.$hc_lan2.'</td>
                            <td>'.$hc_lan3.'</td>
                            <td>'.$hc_lan4.'</td>
                            <td>'.$hc_lan5.'</td>
                            <td>'.$hc_cong.'</td>
                            <td>'.$hc_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td>Phân cải tạo đất</td>
                            <td>'.$ctd_lot.'</td>
                            <td>'.$ctd_lan1.'</td>
                            <td>'.$ctd_lan2.'</td>
                            <td>'.$ctd_lan3.'</td>
                            <td>'.$ctd_lan4.'</td>
                            <td>'.$ctd_lan5.'</td>
                            <td>'.$ctd_cong.'</td>
                            <td>'.$ctd_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td>Phân Urê</td>
                            <td>'.$ure_lot.'</td>
                            <td>'.$ure_lan1.'</td>
                            <td>'.$ure_lan2.'</td>
                            <td>'.$ure_lan3.'</td>
                            <td>'.$ure_lan4.'</td>
                            <td>'.$ure_lan5.'</td>
                            <td>'.$ure_cong.'</td>
                            <td>'.$ure_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td>Phân Lân</td>
                            <td>'.$lan_lot.'</td>
                            <td>'.$lan_lan1.'</td>
                            <td>'.$lan_lan2.'</td>
                            <td>'.$lan_lan3.'</td>
                            <td>'.$lan_lan4.'</td>
                            <td>'.$lan_lan5.'</td>
                            <td>'.$lan_cong.'</td>
                            <td>'.$lan_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td>Phân Kali</td>
                            <td>'.$kali_lot.'</td>
                            <td>'.$kali_lan1.'</td>
                            <td>'.$kali_lan2.'</td>
                            <td>'.$kali_lan3.'</td>
                            <td>'.$kali_lan4.'</td>
                            <td>'.$kali_lan5.'</td>
                            <td>'.$kali_cong.'</td>
                            <td>'.$kali_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td>Phân DAP</td>
                            <td>'.$dap_lot.'</td>
                            <td>'.$dap_lan1.'</td>
                            <td>'.$dap_lan2.'</td>
                            <td>'.$dap_lan3.'</td>
                            <td>'.$dap_lan4.'</td>
                            <td>'.$dap_lan5.'</td>
                            <td>'.$dap_cong.'</td>
                            <td>'.$dap_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td><p>Phân NPK</p>'.$npk_ten.'</td>
                            <td>'.$npk_lot.'</td>
                            <td>'.$npk_lan1.'</td>
                            <td>'.$npk_lan2.'</td>
                            <td>'.$npk_lan3.'</td>
                            <td>'.$npk_lan4.'</td>
                            <td>'.$npk_lan5.'</td>
                            <td>'.$npk_cong.'</td>
                            <td>'.$npk_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td><p>Phân khác</p>'.$khac_ten.'</td>
                            <td>'.$khac_lot.'</td>
                            <td>'.$khac_lan1.'</td>
                            <td>'.$khac_lan2.'</td>
                            <td>'.$khac_lan3.'</td>
                            <td>'.$khac_lan4.'</td>
                            <td>'.$khac_lan5.'</td>
                            <td>'.$khac_cong.'</td>
                            <td>'.$khac_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td><p>Phân bó lá</p>'.$bonla_ten.'</td>
                            <td>'.$bonla_lot.'</td>
                            <td>'.$bonla_lan1.'</td>
                            <td>'.$bonla_lan2.'</td>
                            <td>'.$bonla_lan3.'</td>
                            <td>'.$bonla_lan4.'</td>
                            <td>'.$bonla_lan5.'</td>
                            <td>'.$bonla_cong.'</td>
                            <td>'.$bonla_thoidiem.'</td>
                        </tr>
                        <tr>
                            <td><b>Tổng cộng</b></td>
                            <td>'.$tongcong_lot.'</td>
                            <td>'.$tongcong_lan1.'</td>
                            <td>'.$tongcong_lan2.'</td>
                            <td>'.$tongcong_lan3.'</td>
                            <td>'.$tongcong_lan4.'</td>
                            <td>'.$tongcong_lan5.'</td>
                            <td>'.$tongcong_cong.'</td>
                            <td>'.$tongcong_thoidiem.'</td>
                        </tr>
                    </table>';
                    if (isset($data2["object"]["kyThuatBonPhan"]["congCuPhTien"])){
                        echo '<p class="c-title3">- Công cụ, phương tiện: '.$data2["object"]["kyThuatBonPhan"]["congCuPhTien"].'</p>';
                    } else {
                        echo '<p class="c-title3">- Công cụ, phương tiện: </p>';
                    }
                    echo '<h4>8. Quản lý nước</h4>';
                    echo '<p class="c-title3">Có ứng dụng bơm tưới nước tập trung không? </p>';
                    echo '<h4>9. Sử dụng thuốc BVTV</h4>';
                    $solan_truocbv="";$solan_truco="";$solan_trusau="";$solan_truray="";$solan_trubenh="";$solan_trusautruray=".";$solan_trusautrubenh="";$solan_truraytrubenh="";$solan_trusautruraytrubenh="";$solan_bvtv_lancuoi="";
                    if (isset($data2["object"]["thuocBVTV"]["thBV"])){
                        $solan_truocbv = $data2["object"]["thuocBVTV"]["thBV"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTruCo"])){
                        $solan_truco = $data2["object"]["thuocBVTV"]["thTruCo"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTruSau"])){
                        $solan_trusau = $data2["object"]["thuocBVTV"]["thTruSau"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTruRay"])){
                        $solan_truray = $data2["object"]["thuocBVTV"]["thTruRay"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thTrBenh"])){
                        $solan_trubenh = $data2["object"]["thuocBVTV"]["thTrBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thSauRay"])){
                        $solan_trusautruray = $data2["object"]["thuocBVTV"]["thSauRay"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thSauBenh"])){
                        $solan_trusautrubenh = $data2["object"]["thuocBVTV"]["thSauBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thRayBenh"])){
                        $solan_truraytrubenh = $data2["object"]["thuocBVTV"]["thRayBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["thSauRayBenh"])){
                        $solan_trusautruraytrubenh = $data2["object"]["thuocBVTV"]["thSauRayBenh"];
                    }
                    if (isset($data2["object"]["thuocBVTV"]["bvtvLanCuoi"])){
                        $solan_bvtv_lancuoi = $data2["object"]["thuocBVTV"]["bvtvLanCuoi"];
                    }
                    echo '<table class="w3-table-all" border="1">
                        <tr>
                            <td>TT</td>
                            <td>Các loại thuốc BVTV đã sử dụng</td>
                            <td style="text-align: center;">ĐVT</td>
                            <td>Số lần phun</td>
                            <td>Thời điểm sử dụng thuốc BVTV</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Thuốc trừ ốc Bươu Vàng</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_truocbv.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Thuốc trừ cỏ</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_truco.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Thuốc trừ sâu</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_trusau.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Thuốc trừ rầy</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_truray.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Thuốc trừ bệnh</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_trubenh.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Phối hợp thuốc (trừ sâu, trừ rầy)</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_trusautruray.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Phối hợp thuốc (trừ sâu, trừ bệnh)</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_trusautrubenh.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Phối hợp thuốc (trừ rầy, trừ bệnh)</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_truraytrubenh.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Phối hợp thuốc (trừ sâu, trừ rầy, trừ bệnh)</td>
                            <td style="text-align: center;">Lần/vụ</td>
                            <td>'.$solan_trusautruraytrubenh.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Thời điểm sử dụng thuốc BVTV lần cuối</td>
                            <td style="text-align: center;">Ngày trước thu hoạch</td>
                            <td>'.$solan_bvtv_lancuoi.'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Cộng</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>';
                    if (isset($data2["object"]["thuocBVTV"]["congCuPhun"])){
                        echo '<p class="c-title3">- Công cụ phương tiện: '.$data2["object"]["thuocBVTV"]["congCuPhun"].'</p>';
                    } else {
                        echo '<p class="c-title3">- Công cụ phương tiện: </p>';
                    }
                    echo '<h4>10. Thu hoạch</h4>';
                    echo '<p class="c-title3">- Ngày thu hoạch: </p>';
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
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Hè Thu: '.$thuhoach_hethu.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Thu Đông: '.$thuhoach_thudong.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Đông Xuân: '.$thuhoach_dongxuan.'</p>';
                    echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Xuân Hè : '.$thuhoach_xuanhe.'</p>';
                    if (isset($data2["object"]["hieuQuaKinhTe"]["luaNsBq"])){
                        echo '<p class="c-title3">- Sản lượng: '.$data2["object"]["hieuQuaKinhTe"]["luaNsBq"].' kg/ha</p>';
                    } else {
                        
                        echo '<p class="c-title3">- Sản lượng: </p>';
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