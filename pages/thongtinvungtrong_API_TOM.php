<!DOCTYPE html>
<html>
    <head>
        <title>Định danh vùng nuôi tôm</title>
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
                    if (isset($data1["object"]["thongTinSanXuat"]["doiTuongSxTom"])) {
                        echo '<p><b>4. Thông tin sản phẩm:</b> '.$data1["object"]["thongTinSanXuat"]["doiTuongSxTom"].'</p>';
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
                    if (isset($data2["object"]["thongTinChung"]["dienTichTom"])){
                        echo '<p class="c-title5">- Diện tích canh tác: '.$data2["object"]["thongTinChung"]["dienTichTom"].' ha</p>'; 
                    } else {
                        echo '<p class="c-title5">- Diện tích canh tác: ...... ha</p>';
                    }
                    if (isset($data2["object"]["thongTinChung"]["dienTichTomSu"])){
                        echo '<p class="c-title3">+ Tôm sú: '.$data2["object"]["thongTinChung"]["dienTichTomSu"].' ha</p>'; 
                    } else {
                        echo '<p class="c-title3">+ Tôm sú: ...... ha</p>';
                    }
                    if (isset($data2["object"]["thongTinChung"]["dienTichTomTct"])){
                        echo '<p class="c-title3">+ Tôm TCT: '.$data2["object"]["thongTinChung"]["dienTichTomTct"].' ha</p>'; 
                    } else {
                        echo '<p class="c-title3">+ Tôm TCT: ...... ha</p>';
                    }
                    if (isset($data2["object"]["thongTinSanXuat"]["loaiHinhSxTom"])){
                        echo '<p class="c-title5">- Loại hình sản xuất: '.$data2["object"]["thongTinSanXuat"]["loaiHinhSxTom"].'</p>'; 
                    } else {
                        echo '<p class="c-title5">- Loại hình sản xuất: ......</p>';
                    }
                    echo '<p class="c-title5">- Loại đất sản xuất:</p>';
                    if (isset($data2["object"]["thongTinSanXuat"]["loaiDatTom"])) {
                        echo '<p class="c-title3">+ Loại đất: '.$data2["object"]["thongTinSanXuat"]["loaiDatTom"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Loại đất: ......</p>';
                    }
                    if (isset($data2["object"]["thongTinSanXuat"]["saCauDatTom"])) {
                        echo '<p class="c-title3">+ Sa cấu đất: '.$data2["object"]["thongTinSanXuat"]["saCauDatTom"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Sa cấu đất: ......</p>';
                    }
                    if (isset($data2["object"]["thongTinSanXuat"]["doPhTrungBinh"])){
                        echo '<p class="c-title3">+ Độ PH trung bình: '.$data2["object"]["thongTinSanXuat"]["doPhTrungBinh"].' </p>'; 
                    } else {
                        echo '<p class="c-title3">+ Độ PH trung bình: ......</p>';
                    }
                    if (isset($data2["object"]["thongTinSanXuat"]["aoTomSau"])){
                        echo '<p class="c-title3">+ Ao sâu: '.$data2["object"]["thongTinSanXuat"]["aoTomSau"].' (m)</p>'; 
                    } else {
                        echo '<p class="c-title3">+ Ao sâu: ...... (m)</p>';
                    }
                    if (isset($data2["object"]["thongTinSanXuat"]["tenVuTom"])){
                        echo '<p class="c-title5">- Vụ tôm: '.$data2["object"]["thongTinSanXuat"]["tenVuTom"].' . Từ tháng: '.$data2["object"]["thongTinSanXuat"]["thangBatDauVuTom"].' đến tháng: '.$data2["object"]["thongTinSanXuat"]["thangKetThucVuTom"].'</p>'; 
                    } else {
                        echo '<p class="c-title5">- Vụ tôm: ...... Từ tháng ...... đến tháng ......</p>';
                    }
                    echo '<p class="c-title1">3. Khu vực sản xuất: </p>';
                    echo '<p class="c-title5">- Tên khu vực sản xuất: '.$data_info1[0]["KV_TEN"].'</p>';
                    echo '<p class="c-title5">- Tên Kế hoạch sản xuất: '.$data_info1[0]["KV_KEHOACH"].'</p>';
                    echo '<p class="c-title1">4. Nhật ký sản xuất:</p>';
                    echo '<p class="c-title2">&#9658; Đầu tư trang thiết bị</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["danQuatNuoiTom"])) {
                        echo '<p class="c-title3">+ Dàn quạt: '.$data2["object"]["hoatDongSanXuat"]["danQuatNuoiTom"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Dàn quạt: </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["mayDuPhongDien"])) {
                        echo '<p class="c-title3">+ Máy dự phòng thay thế điện: '.$data2["object"]["hoatDongSanXuat"]["mayDuPhongDien"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Máy dự phòng thay thế điện: </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["thietBiDayDien"])) {
                        echo '<p class="c-title3">+ Dây điện: '.$data2["object"]["hoatDongSanXuat"]["thietBiDayDien"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Dây điện: </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["denChieuSang"])) {
                        echo '<p class="c-title3">+ Đèn chiếu sáng: '.$data2["object"]["hoatDongSanXuat"]["denChieuSang"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Đèn chiếu sáng: </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["mayBomNuoc"])) {
                        echo '<p class="c-title3">+ Máy bơm nước: '.$data2["object"]["hoatDongSanXuat"]["mayBomNuoc"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Máy bơm nước: </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["tuiLocNuoc"])) {
                        echo '<p class="c-title3">+ Túi lọc nước: '.$data2["object"]["hoatDongSanXuat"]["tuiLocNuoc"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Túi lọc nước: </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["congCapXaNuoc"])) {
                        echo '<p class="c-title3">+ Cống cấp, xả nước: '.$data2["object"]["hoatDongSanXuat"]["congCapXaNuoc"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Cống cấp, xả nước: </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["thietBiKhac"])) {
                        echo '<p class="c-title3">+ Khác: '.$data2["object"]["hoatDongSanXuat"]["thietBiKhac"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Khác: </p>';
                    }
                    echo '<p class="c-title2">&#9658; Cải tạo ao</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["caiTaoCongTrinh"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["caiTaoCongTrinh"] == "1"){
                            echo '<p class="c-title3">+ Cải tạo công trình: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Cải tạo công trình: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Cải tạo công trình: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["senVetAo"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["senVetAo"] == "1"){
                            echo '<p class="c-title3">+ Sên vét ao: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Sên vét ao: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Sên vét ao: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["lotBatBoBatDay"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["lotBatBoBatDay"] == "1"){
                            echo '<p class="c-title3">+ Lót bạt bờ, bạt đáy: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Lót bạt bờ, bạt đáy: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Lót bạt bờ, bạt đáy: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["giaCoBoBao"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["giaCoBoBao"] == "1"){
                            echo '<p class="c-title3">+ Gia cố bờ bao: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Gia cố bờ bao: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Gia cố bờ bao: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["lieuLuongBonVoi"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["bonVoi"] == "1"){
                            echo '<p class="c-title3">+ Bón vôi: Có . Liều lượng: '.$data2["object"]["hoatDongSanXuat"]["lieuLuongBonVoi"].' kg/m<sup>2</sup></p>';
                        } else {
                            echo '<p class="c-title3">+ Bón vôi: Không . Liều lượng: ..... kg/m<sup>2</sup></p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Bón vôi: ...... Liều lượng: ..... kg/m<sup>2</sup></p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["phoiBaoNhieuNgay"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["phoiMatTrang"] == "1"){
                            echo '<p class="c-title3">+ Phơi mặt trảng: Có . Bao nhiêu ngày: '.$data2["object"]["hoatDongSanXuat"]["phoiBaoNhieuNgay"].' ngày</p>';
                        } else {
                            echo '<p class="c-title3">+ Phơi mặt trảng: Không . Bao nhiêu ngày: ..... ngày</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Phơi mặt trảng: ...... Bao nhiêu ngày: ..... ngày</p>';
                    }
                    echo '<p class="c-title2">&#9658; Xử lý nước</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["xuLyNuoc"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["xuLyNuoc"] == "1"){
                            echo '<p class="c-title3">+ Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Không</p>';
                        }
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
                            <td>'.$dt_thoigian.'</td>
                            <td>'.$dt_tenthuoc.'</td>
                            <td>'.$dt_lieuluong.'</td>
                            <td>'.$dt_cachbon.'</td>
                            <td>'.$dt_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Diệt khuẩn</td>
                            <td>'.$dk_thoigian.'</td>
                            <td>'.$dk_tenthuoc.'</td>
                            <td>'.$dk_lieuluong.'</td>
                            <td>'.$dk_cachbon.'</td>
                            <td>'.$dk_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Gây màu nước</td>
                            <td>'.$gmn_thoigian.'</td>
                            <td>'.$gmn_tenthuoc.'</td>
                            <td>'.$gmn_lieuluong.'</td>
                            <td>'.$gmn_cachbon.'</td>
                            <td>'.$gmn_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Cấy vi sinh</td>
                            <td>'.$cvs_thoigian.'</td>
                            <td>'.$cvs_tenthuoc.'</td>
                            <td>'.$cvs_lieuluong.'</td>
                            <td>'.$cvs_cachbon.'</td>
                            <td>'.$cvs_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Xử lý khác</td>
                            <td>'.$kh_thoigian.'</td>
                            <td>'.$kh_tenthuoc.'</td>
                            <td>'.$kh_lieuluong.'</td>
                            <td>'.$kh_cachbon.'</td>
                            <td>'.$kh_hieuqua.'</td>
                        </tr>
                    </table>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraYeuToMoiTruong"])) {
                        echo '<p class="c-title3">+ Kiểm tra các yếu tố môi trường: '.$data2["object"]["hoatDongSanXuat"]["kiemTraYeuToMoiTruong"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Kiểm tra các yếu tố môi trường: ..... </p>';
                    }
                    echo '<p class="c-title2">&#9658; Chọn giống và cách xử lý giống</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["giongTomGanNhat"])) {
                        echo '<p class="c-title3">+ Giống tôm được nuôi gần nhất: '.$data2["object"]["hoatDongSanXuat"]["giongTomGanNhat"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Giống tôm được nuôi gần nhất: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["nguonGocTom"])) {
                        echo '<p class="c-title3">+ Nguồn gốc giống: '.$data2["object"]["hoatDongSanXuat"]["nguonGocTom"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Nguồn gốc giống: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["giayXacNhanNguonGocTom"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["giayXacNhanNguonGocTom"] == "1"){
                            echo '<p class="c-title3">+ Giấy xác nhận nguồn gốc tôm giống: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Giấy xác nhận nguồn gốc tôm giống: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Giấy xác nhận nguồn gốc tôm giống: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["matDoTha"])) {
                        echo '<p class="c-title3">+ Mật độ thả: '.$data2["object"]["hoatDongSanXuat"]["matDoTha"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Mật độ thả: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["thoiGianThaTom"])) {
                        echo '<p class="c-title3">+ Thời gian thả tôm: '.$data2["object"]["hoatDongSanXuat"]["thoiGianThaTom"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Thời gian thả tôm: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["huongTha"])) {
                        echo '<p class="c-title3">+ Hướng thả: '.$data2["object"]["hoatDongSanXuat"]["huongTha"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Hướng thả: ..... </p>';
                    }
                    echo '<p class="c-title2">&#9658; Giám sát sức khỏe</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["uongGieo"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["uongGieo"] == "1"){
                            echo '<p class="c-title3">+ Ương gièo trước khi thả nuôi: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Ương gièo trước khi thả nuôi: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Ương gièo trước khi thả nuôi: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["suDungThuocNguaBenh"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["suDungThuocNguaBenh"] == "1"){
                            echo '<p class="c-title3">+ Sử dụng thuốc ngừa bệnh: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Sử dụng thuốc ngừa bệnh: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Sử dụng thuốc ngừa bệnh: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["soVoiTruocDay"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> So với trước đây: '.$data2["object"]["hoatDongSanXuat"]["soVoiTruocDay"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> So với trước đây: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["suDungMenViSinh"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["suDungMenViSinh"] == "1"){
                            echo '<p class="c-title3">+ Sử dụng men vi sinh định kỳ: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Sử dụng men vi sinh định kỳ: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Sử dụng men vi sinh định kỳ: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraMoiTruong"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["kiemTraMoiTruong"] == "1"){
                            echo '<p class="c-title3">+ Kiểm tra môi trường nuôi: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Kiểm tra môi trường nuôi: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Kiểm tra môi trường nuôi: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["quanLyNuocNuoiTom"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["quanLyNuocNuoiTom"] == "1"){
                            echo '<p class="c-title3">+ Quản lý nước trong suốt quá trình nuôi: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Quản lý nước trong suốt quá trình nuôi: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Quản lý nước trong suốt quá trình nuôi: ..... </p>';
                    }
                    echo '<p class="c-title2">&#9658; Quản lý sức khoẻ Bổ sung thêm bệnh EMS</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["tinhHinhDichBenhEMS"])) {
                        echo '<p class="c-title3">+ Tình hình dịch bệnh so với trước đây: '.$data2["object"]["hoatDongSanXuat"]["tinhHinhDichBenhEMS"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Tình hình dịch bệnh so với trước đây: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["soAoBiBenh"])) {
                        echo '<p class="c-title3">+ Số ao bị bệnh:  '.$data2["object"]["hoatDongSanXuat"]["soAoBiBenh"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Số ao bị bệnh: ..... </p>';
                    }
                    echo '<p class="c-title3">+ Các loại bệnh xuất hiện trong ao nuôi: </p>';
                    $benhdomtrang = "";
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhDomTrang"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["benhDomTrang"] == "1") {
                            $benhdomtrang = "Có";
                        } else {
                            $benhdomtrang = "Không";
                        }
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhDomTrangSoSanh"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đốm trắng:  '.$benhdomtrang.'. '.$data2["object"]["hoatDongSanXuat"]["benhDomTrangSoSanh"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đốm trắng: ..... </p>';
                    }
                    $benhdauvang = "";
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhDauVang"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["benhDauVang"] == "1") {
                            $benhdauvang = "Có";
                        } else {
                            $benhdauvang = "Không";
                        }
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhDauVangSoSanh"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đầu vàng:  '.$benhdauvang.'. '.$data2["object"]["hoatDongSanXuat"]["benhDauVangSoSanh"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh đầu vàng: ..... </p>';
                    }
                    $benhIHHNV = "";
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhIHHnv"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["benhIHHnv"] == "1") {
                            $benhIHHNV = "Có";
                        } else {
                            $benhIHHNV = "Không";
                        }
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhIHHnvSoSanh"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IHHNV (hoại tử dưới vỏ và cơ quan tạo máu): '.$benhIHHNV.'. '.$data2["object"]["hoatDongSanXuat"]["benhIHHnvSoSanh"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IHHNV (hoại tử dưới vỏ và cơ quan tạo máu): ..... </p>';
                    }
                    $benhphantrang = "";
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhPhanTrang"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["benhPhanTrang"] == "1") {
                            $benhphantrang = "Có";
                        } else {
                            $benhphantrang = "Không";
                        }
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhPhanTrangSoSanh"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh phân trắng: '.$benhphantrang.'. '.$data2["object"]["hoatDongSanXuat"]["benhPhanTrangSoSanh"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh phân trắng: ..... </p>';
                    }
                    $benhIMNV = "";
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhIMNV"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["benhIMNV"] == "1") {
                            $benhIMNV = "Có";
                        } else {
                            $benhIMNV = "Không";
                        }
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["benhIMNVSoSanh"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IMNV (hoại tử cơ):  '.$benhIMNV.'. '.$data2["object"]["hoatDongSanXuat"]["benhIMNVSoSanh"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Bệnh IMNV (hoại tử cơ): ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["viBaoTuTrung"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["viBaoTuTrung"] == "1"){
                            echo '<p class="c-title3">+ Vi bào tử trùng: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Vi bào tử trùng: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Vi bào tử trùng: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["thoiGianXuatHien"])) {
                        echo '<p class="c-title3">+ Thời gian xuất hiện: '.$data2["object"]["hoatDongSanXuat"]["thoiGianXuatHien"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Thời gian xuất hiện: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["coXuLyAoKhiChetNhieu"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["coXuLyAoKhiChetNhieu"] == "1"){
                            echo '<p class="c-title3">+ Xử lý ao khi có hiện tượng chết nhiều: Có</p>';
                        } else {
                            echo '<p class="c-title3">+ Xử lý ao khi có hiện tượng chết nhiều: Không</p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Xử lý ao khi có hiện tượng chết nhiều: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["php"])) {
                        echo '<p class="c-title3">+ PHP: '.$data2["object"]["hoatDongSanXuat"]["php"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ PHP: ..... </p>';
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
                            <td>Tên thuốc/Phương pháp xử lý</td>
                            <td>Liều lượng</td>
                            <td>Cách bón</td>
                            <td>Hiệu quả</td>
                        </tr>
                        <tr>
                            <td>Bệnh đốm trắng</td>
                            <td>'.$domtrang_thoigian.'</td>
                            <td>'.$domtrang_tenthuoc.'</td>
                            <td>'.$domtrang_lieuluong.'</td>
                            <td>'.$domtrang_cachbon.'</td>
                            <td>'.$domtrang_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Bệnh đầu vàng</td>
                            <td>'.$dauvang_thoigian.'</td>
                            <td>'.$dauvang_tenthuoc.'</td>
                            <td>'.$dauvang_lieuluong.'</td>
                            <td>'.$dauvang_cachbon.'</td>
                            <td>'.$dauvang_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Bệnh IHHNV (hoại tử dưới vỏ và cơ quan tạo máu)</td>
                            <td>'.$ihhnv_thoigian.'</td>
                            <td>'.$ihhnv_tenthuoc.'</td>
                            <td>'.$ihhnv_lieuluong.'</td>
                            <td>'.$ihhnv_cachbon.'</td>
                            <td>'.$ihhnv_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Bệnh phân trắng</td>
                            <td>'.$phantrang_thoigian.'</td>
                            <td>'.$phantrang_tenthuoc.'</td>
                            <td>'.$phantrang_lieuluong.'</td>
                            <td>'.$phantrang_cachbon.'</td>
                            <td>'.$phantrang_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Bệnh IMNV (hoại tử cơ)</td>
                            <td>'.$imnv_thoigian.'</td>
                            <td>'.$imnv_tenthuoc.'</td>
                            <td>'.$imnv_lieuluong.'</td>
                            <td>'.$imnv_cachbon.'</td>
                            <td>'.$imnv_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Vi bào tử trùng</td>
                            <td>'.$vbtt_thoigian.'</td>
                            <td>'.$vbtt_tenthuoc.'</td>
                            <td>'.$vbtt_lieuluong.'</td>
                            <td>'.$vbtt_cachbon.'</td>
                            <td>'.$vbtt_hieuqua.'</td>
                        </tr>
                    </table>';
                    echo '<p class="c-title2">&#9658; Thức ăn</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["cachChoTomAn"])){
                        echo '<p class="c-title3">+ Cách cho ăn: '.$data2["object"]["hoatDongSanXuat"]["cachChoTomAn"].' </p>';
                    } else {
                        echo '<p class="c-title3">+ Cách cho ăn: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["soLanChoAn"])){
                        echo '<p class="c-title3">+ Số lần cho ăn: '.$data2["object"]["hoatDongSanXuat"]["soLanChoAn"].' lần/ngày</p>';
                    } else {
                        echo '<p class="c-title3">+ Số lần cho ăn: ..... lần/ngày </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["soSangAn"])){
                        echo '<p class="c-title3">+ Số sang ăn: '.$data2["object"]["hoatDongSanXuat"]["soSangAn"].' cái </p>';
                    } else {
                        echo '<p class="c-title3">+ Số sang ăn: ..... cái </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["coTronThucAnKhac"])){
                        if ($data2["object"]["hoatDongSanXuat"]["coTronThucAnKhac"] == "1") {
                            echo '<p class="c-title3">+ Phối trộn các thành phần khác vào thức ăn: Có </p>';
                        } else {
                            echo '<p class="c-title3">+ Phối trộn các thành phần khác vào thức ăn: Không </p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Phối trộn các thành phần khác vào thức ăn: ..... </p>';
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
                            <td>'.$thucan_ten1.'</td>
                            <td>'.$thucan_thoigian1.'</td>
                            <td>'.$thucan_lieuluong1.'</td>
                            <td>'.$thucan_cachbon1.'</td>
                            <td>'.$thucan_hieuqua1.'</td>
                        </tr>
                        <tr>
                            <td>'.$thucan_ten2.'</td>
                            <td>'.$thucan_thoigian2.'</td>
                            <td>'.$thucan_lieuluong2.'</td>
                            <td>'.$thucan_cachbon2.'</td>
                            <td>'.$thucan_hieuqua2.'</td>
                        </tr>
                        <tr>
                            <td>'.$thucan_ten3.'</td>
                            <td>'.$thucan_thoigian3.'</td>
                            <td>'.$thucan_lieuluong3.'</td>
                            <td>'.$thucan_cachbon3.'</td>
                            <td>'.$thucan_hieuqua3.'</td>
                        </tr>
                    </table>';
                    echo '<p class="c-title2">&#9658; Quản lý môi trường ao nuôi</p>';
                    $ktdoph = "";
                    if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraPhTrongAo"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["kiemTraPhTrongAo"] == "1") {
                            $ktdoph = "Có";
                        } else {
                            $ktdoph = "Không";
                        }
                    } else {
                        $ktdoph = " ..... ";
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraPh"])) {
                        echo '<p class="c-title3">+ Kiểm tra độ pH trong ao:  '.$ktdoph.' , số lần '.$data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraPh"].' lần/ngày</p>';
                    } else {
                        echo '<p class="c-title3">+ Kiểm tra độ pH trong ao: '.$ktdoph.' , số lần: ..... lần/ngày</p>';
                    }
                    $ktdokiem = "";
                    if (isset($data2["object"]["hoatDongSanXuat"]["kiemTraKiemTrongAo"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["kiemTraKiemTrongAo"] == "1") {
                            $ktdokiem = "Có";
                        } else {
                            $ktdokiem = "Không";
                        }
                    } else {
                        $ktdokiem = " ..... ";
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraKiem"])) {
                        echo '<p class="c-title3">+ Kiểm tra độ kiềm trong ao: '.$ktdokiem.' , số lần '.$data2["object"]["hoatDongSanXuat"]["tanSuatKiemTraKiem"].' lần/ngày</p>';
                    } else {
                        echo '<p class="c-title3">+ Kiểm tra độ kiềm trong ao: '.$ktdokiem.' , số lần: ..... lần/ngày</p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["duyTriDoKiem"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["duyTriDoKiem"] == "1") {
                            echo '<p class="c-title3">+ Duy trì độ kiềm: Có </p>';
                        } else {
                            echo '<p class="c-title3">+ Duy trì độ kiềm: Không </p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Duy trì độ kiềm: ..... </p>';
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
                            <td>'.$dokiem_thoigian.'</td>
                            <td>'.$dokiem_tenthuoc.'</td>
                            <td>'.$dokiem_lieuluong.'</td>
                            <td>'.$dokiem_cachbon.'</td>
                            <td>'.$dokiem_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Bổ sung khoáng</td>
                            <td>'.$bskhoang_thoigian.'</td>
                            <td>'.$bskhoang_tenthuoc.'</td>
                            <td>'.$bskhoang_lieuluong.'</td>
                            <td>'.$bskhoang_cachbon.'</td>
                            <td>'.$cayvisinh_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Cấy vi sinh</td>
                            <td>'.$cayvisinh_thoigian.'</td>
                            <td>'.$cayvisinh_tenthuoc.'</td>
                            <td>'.$cayvisinh_lieuluong.'</td>
                            <td>'.$cayvisinh_cachbon.'</td>
                            <td>'.$cayvisinh_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Chế phẩm sinh học</td>
                            <td>'.$cpsinhhoc_thoigian.'</td>
                            <td>'.$cpsinhhoc_tenthuoc.'</td>
                            <td>'.$cpsinhhoc_lieuluong.'</td>
                            <td>'.$cpsinhhoc_cachbon.'</td>
                            <td>'.$cpsinhhoc_hieuqua.'</td>
                        </tr>
                        <tr>
                            <td>Dinh dưỡng, men tiêu hoá</td>
                            <td>'.$dinhduong_thoigian.'</td>
                            <td>'.$dinhduong_tenthuoc.'</td>
                            <td>'.$dinhduong_lieuluong.'</td>
                            <td>'.$dinhduong_cachbon.'</td>
                            <td>'.$dinhduong_hieuqua.'</td>
                        </tr>
                    </table>';
                    echo '<p class="c-title2">&#9658; Quản lý xả thải</p>';
                    if (isset($data2["object"]["hoatDongSanXuat"]["xaTrucTiep"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["xaTrucTiep"] == "1") {
                            echo '<p class="c-title3">+ Xả trực tiếp ra ngoài: Có </p>';
                        } else {
                            echo '<p class="c-title3">+ Xả trực tiếp ra ngoài: Không </p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Xả trực tiếp ra ngoài: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["xuLyTruocKhiThai"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["xuLyTruocKhiThai"] == "1") {
                            echo '<p class="c-title3">+ Xử lý nước thải trước khi xả ra ngoài: Có </p>';
                        } else {
                            echo '<p class="c-title3">+ Xử lý nước thải trước khi xả ra ngoài: Không </p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Xử lý nước thải trước khi xả ra ngoài: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["phPhapXuLyTruocKhiThai"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: '.$data2["object"]["hoatDongSanXuat"]["phPhapXuLyTruocKhiThai"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["xuLyBunThai"])) {
                        if ($data2["object"]["hoatDongSanXuat"]["xuLyBunThai"] == "1") {
                            echo '<p class="c-title3">+ Xử lý bùn thải: Có </p>';
                        } else {
                            echo '<p class="c-title3">+ Xử lý bùn thải: Không </p>';
                        }
                    } else {
                        echo '<p class="c-title3">+ Xử lý bùn thải: ..... </p>';
                    }
                    if (isset($data2["object"]["hoatDongSanXuat"]["phPhapXuLyBunThai"])) {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: '.$data2["object"]["hoatDongSanXuat"]["phPhapXuLyBunThai"].'</p>';
                    } else {
                        echo '<p class="c-title4"><i class="fa fa-arrow-right"></i> Phương pháp: ..... </p>';
                    }
                    echo '<p class="c-title1">5. Thu hoạch:</p>';
                    if (isset($data2["object"]["thuHoach"]["thGianThaNuoiThuHoach"])){
                        echo '<p class="c-title3">+ Thời gian từ khi thả nuôi đến khi thu hoạch (ngày hay tháng): '.$data2["object"]["thuHoach"]["thGianThaNuoiThuHoach"].' </p>';
                    } else {
                        echo '<p class="c-title3">+ Thời gian từ khi thả nuôi đến khi thu hoạch( ngày hay tháng): ..... </p>';
                    }
                    if (isset($data2["object"]["thuHoach"]["soLanThuHoach"])){
                        echo '<p class="c-title3">+ Số lần thu hoạch( lần): '.$data2["object"]["thuHoach"]["soLanThuHoach"].' </p>';
                    } else {
                        echo '<p class="c-title3">+ Số lần thu hoạch( lần): ..... </p>';
                    }
                    if (isset($data2["object"]["thuHoach"]["trgLgTieuChuan"])){
                        echo '<p class="c-title3">+ Phân loại và tỷ lệ trọng lượng của tôm: Trọng lượng tôm bao nhiêu thì đạt tiêu chuẩn: '.$data2["object"]["thuHoach"]["trgLgTieuChuan"].' kg/ha</p>';
                    } else {
                        echo '<p class="c-title3">+ Phân loại và tỷ lệ trọng lượng của tôm: Trọng lượng tôm bao nhiêu thì đạt tiêu chuẩn: ..... </p>';
                    }
                    echo '<p class="c-title3">+ Năng suất (tấn/ao/vụ):</p>';
                    if (isset($data2["object"]["thuHoach"]["nangSuatTomMuaThuan"])){
                        echo '<p class="c-title3"> Mùa thuận: '.$data2["object"]["thuHoach"]["nangSuatTomMuaThuan"].'</p>';
                    } else {
                        echo '<p class="c-title3"> Mùa thuận: .....</p>';
                    }
                    if (isset($data2["object"]["thuHoach"]["nangSuatTomMuaNghich"])){
                        echo '<p class="c-title3"> Mùa nghịch: '.$data2["object"]["thuHoach"]["nangSuatTomMuaNghich"].'</p>';
                    } else {
                        echo '<p class="c-title3"> Mùa nghịch: ....</p>';
                    }
                    echo '<p class="c-title3">+ Sản lượng( tấn/năm): </p>';
                    if (isset($data2["object"]["thuHoach"]["sanLuongTomMuaThuan"])){
                        echo '<p class="c-title3"> Mùa thuận: '.$data2["object"]["thuHoach"]["sanLuongTomMuaThuan"].'</p>';
                    } else {
                        echo '<p class="c-title3"> Mùa thuận: .....</p>';
                    }
                    if (isset($data2["object"]["thuHoach"]["sanLuongTomMuaNghich"])){
                        echo '<p class="c-title3"> Mùa nghịch: '.$data2["object"]["thuHoach"]["sanLuongTomMuaNghich"].'</p>';
                    } else {
                        echo '<p class="c-title3"> Mùa nghịch: ....</p>';
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
                            <td>'.$gial1t1.'</td>
                            <td>'.$gial1t2.'</td>
                            <td>'.$gial1t3.'</td>
                            <td>'.$gial1t4.'</td>
                            <td>'.$gial1t5.'</td>
                            <td>'.$gial1t6.'</td>
                            <td>'.$gial1t7.'</td>
                            <td>'.$gial1t8.'</td>
                            <td>'.$gial1t9.'</td>
                            <td>'.$gial1t10.'</td>
                            <td>'.$gial1t11.'</td>
                            <td>'.$gial1t12.'</td>
                        </tr>
                        <tr>
                            <td>Size 2</td>
                            <td>'.$gial2t1.'</td>
                            <td>'.$gial2t2.'</td>
                            <td>'.$gial2t3.'</td>
                            <td>'.$gial2t4.'</td>
                            <td>'.$gial2t5.'</td>
                            <td>'.$gial2t6.'</td>
                            <td>'.$gial2t7.'</td>
                            <td>'.$gial2t8.'</td>
                            <td>'.$gial2t9.'</td>
                            <td>'.$gial2t10.'</td>
                            <td>'.$gial2t11.'</td>
                            <td>'.$gial2t12.'</td>
                        </tr>
                        <tr>
                            <td>Size 3</td>
                            <td>'.$gial3t1.'</td>
                            <td>'.$gial3t2.'</td>
                            <td>'.$gial3t3.'</td>
                            <td>'.$gial3t4.'</td>
                            <td>'.$gial3t5.'</td>
                            <td>'.$gial3t6.'</td>
                            <td>'.$gial3t7.'</td>
                            <td>'.$gial3t8.'</td>
                            <td>'.$gial3t9.'</td>
                            <td>'.$gial3t10.'</td>
                            <td>'.$gial3t11.'</td>
                            <td>'.$gial3t12.'</td>
                        </tr>
                    </table>';
                    echo '<p class="c-title1">6. Thị trường tiêu thụ</p>';
                    if (isset($data2["object"]["thiTruongTieuThu"]["tieuThuTom"])){
                        echo '<p class="c-title3">+ '.$data2["object"]["thiTruongTieuThu"]["tieuThuTom"].'</p>';
                    } else {
                        echo '<p class="c-title3"></p>';
                    }
                    if (isset($data2["object"]["thiTruongTieuThu"]["ngoaiTinhTieuThuTom"])){
                        echo '<p class="c-title3">+ Thị trường ngoài tỉnh( tỉnh, khu vực nào)? '.$data2["object"]["thiTruongTieuThu"]["ngoaiTinhTieuThuTom"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Thị trường ngoài tỉnh( tỉnh, khu vực nào)? ......</p>';
                    }
                    if (isset($data2["object"]["thiTruongTieuThu"]["ngoaiNuocTieuThuTom"])){
                        echo '<p class="c-title3">+ Thị trường xuất khẩu( quốc gia, khu vực nào)? '.$data2["object"]["thiTruongTieuThu"]["ngoaiNuocTieuThuTom"].'</p>';
                    } else {
                        echo '<p class="c-title3">+ Thị trường xuất khẩu( quốc gia, khu vực nào)? ......</p>';
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