<!DOCTYPE html>
<html>
    <head>
        <title>Cập nhật vùng trồng BƯỞI</title>
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
                            $thongtinsanpham = "";
                            if (isset($data1["object"]["thongTinSanXuat"]["dtSxBuoi"])){
                                $thongtinsanpham = $data1["object"]["thongTinSanXuat"]["dtSxBuoi"];
                            }
                            echo '<p><b>4. Thông tin sản phẩm:</b> <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="buoi_thongtinsp">
                                    <option selected>'.$thongtinsanpham.'</option>
                                    <option>----------------------------</option>
                                    <option>Bưởi da xanh</option>
                                    <option>Bưởi năm roi</option>
                                    <option>Bưởi khác</option>
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
                            if (isset($data2["object"]["thongTinChung"]["dienTichBuoiHA"])){
                                echo '<p class="c-title5">- Diện tích canh tác: <input type = "text" class="w3-input" id="thongtinchung_dientich" value="'.$data2["object"]["thongTinChung"]["dienTichBuoiHA"].'" /> ha</p>'; 
                            } else {
                                echo '<p class="c-title5">- Diện tích canh tác: <input type = "text" class="w3-input" id="thongtinchung_dientich" value="" /> ha</p>';
                            }
                            echo '<p class="c-title5">- Loại đất sản xuất:</p>';
                            if (isset($data2["object"]["thongTinSanXuat"]["loaiDatSx"])) {
                                echo '<p class="c-title3">+ '.$data2["object"]["thongTinSanXuat"]["loaiDatSx"].'</p>';
                            }
                            echo '<p class="c-title3">+ Độ PH: </p>';
                            echo '<p class="c-title1">3. Khu vực sản xuất: </p>';
                            echo '<p class="c-title5">- Tên khu vực sản xuất: '.$data_info1[0]["KV_TEN"].'</p>';
                            echo '<p class="c-title5">- Tên Kế hoạch sản xuất: '.$data_info1[0]["KV_KEHOACH"].'</p>';
                            echo '<p class="c-title1">4. Nhật ký sản xuất:</p>';
                            echo '<p class="c-title2">&#9658; Quản lý nước</p>';
                            $ngapt1 = "";$ngapt2 = "";$ngapt3 = "";$ngapt4 = "";$ngapt5 = "";$ngapt6 = "";$ngapt7 = "";$ngapt8 = "";$ngapt9 = "";$ngapt10 = "";$ngapt11 = "";$ngapt12 = "";
                            $phent1 = "";$phent2 = "";$phent3 = "";$phent4 = "";$phent5 = "";$phent6 = "";$phent7 = "";$phent8 = "";$phent9 = "";$phent10 = "";$phent11 = "";$phent12 = "";
                            $mant1 = "";$mant2 = "";$mant3 = "";$mant4 = "";$mant5 = "";$mant6 = "";$mant7 = "";$mant8 = "";$mant9 = "";$mant10 = "";$mant11 = "";$mant12 = "";
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh01"])) {
                                $ngapt1 = $data2["object"]["thongTinSanXuat"]["ngapTh01"];
                            } else {
                                $ngapt1 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh02"])) {
                                $ngapt2 = $data2["object"]["thongTinSanXuat"]["ngapTh02"];
                            } else {
                                $ngapt2 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh03"])) {
                                $ngapt3 = $data2["object"]["thongTinSanXuat"]["ngapTh03"];
                            } else {
                                $ngapt3 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh04"])) {
                                $ngapt4 = $data2["object"]["thongTinSanXuat"]["ngapTh04"];
                            } else {
                                $ngapt4 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh05"])) {
                                $ngapt5 = $data2["object"]["thongTinSanXuat"]["ngapTh05"];
                            } else {
                                $ngapt5 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh06"])) {
                                $ngapt6 = $data2["object"]["thongTinSanXuat"]["ngapTh06"];
                            } else {
                                $ngapt6 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh07"])) {
                                $ngapt7 = $data2["object"]["thongTinSanXuat"]["ngapTh07"];
                            } else {
                                $ngapt7 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh08"])) {
                                $ngapt8 = $data2["object"]["thongTinSanXuat"]["ngapTh08"];
                            } else {
                                $ngapt8 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh09"])) {
                                $ngapt9 = $data2["object"]["thongTinSanXuat"]["ngapTh09"];
                            } else {
                                $ngapt9 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh10"])) {
                                $ngapt10 = $data2["object"]["thongTinSanXuat"]["ngapTh10"];
                            } else {
                                $ngapt10 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh11"])) {
                                $ngapt11 = $data2["object"]["thongTinSanXuat"]["ngapTh11"];
                            } else {
                                $ngapt11 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["ngapTh12"])) {
                                $ngapt12 = $data2["object"]["thongTinSanXuat"]["ngapTh12"];
                            } else {
                                $ngapt12 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh01"])) {
                                $phent1 = $data2["object"]["thongTinSanXuat"]["phenTh01"];
                            } else {
                                $phent1 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh02"])) {
                                $phent2 = $data2["object"]["thongTinSanXuat"]["phenTh02"];
                            } else {
                                $phent2 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh03"])) {
                                $phent3 = $data2["object"]["thongTinSanXuat"]["phenTh03"];
                            } else {
                                $phent3 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh04"])) {
                                $phent4 = $data2["object"]["thongTinSanXuat"]["phenTh04"];
                            } else {
                                $phent4 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh05"])) {
                                $phent5 = $data2["object"]["thongTinSanXuat"]["phenTh05"];
                            } else {
                                $phent5 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh06"])) {
                                $phent6 = $data2["object"]["thongTinSanXuat"]["phenTh06"];
                            } else {
                                $phent6 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh07"])) {
                                $phent7 = $data2["object"]["thongTinSanXuat"]["phenTh07"];
                            } else {
                                $phent7 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh08"])) {
                                $phent8 = $data2["object"]["thongTinSanXuat"]["phenTh08"];
                            } else {
                                $phent8 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh09"])) {
                                $phent9 = $data2["object"]["thongTinSanXuat"]["phenTh09"];
                            } else {
                                $phent9 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh10"])) {
                                $phent10 = $data2["object"]["thongTinSanXuat"]["phenTh10"];
                            } else {
                                $phent10 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh11"])) {
                                $phent11 = $data2["object"]["thongTinSanXuat"]["phenTh11"];
                            } else {
                                $phent11 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["phenTh12"])) {
                                $phent12 = $data2["object"]["thongTinSanXuat"]["phenTh12"];
                            } else {
                                $phent12 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh01"])) {
                                $mant1 = $data2["object"]["thongTinSanXuat"]["manTh01"];
                            } else {
                                $mant1 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh02"])) {
                                $mant2 = $data2["object"]["thongTinSanXuat"]["manTh02"];
                            } else {
                                $mant2 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh03"])) {
                                $mant3 = $data2["object"]["thongTinSanXuat"]["manTh03"];
                            } else {
                                $mant3 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh04"])) {
                                $mant4 = $data2["object"]["thongTinSanXuat"]["manTh04"];
                            } else {
                                $mant4 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh05"])) {
                                $mant5 = $data2["object"]["thongTinSanXuat"]["manTh05"];
                            } else {
                                $mant5 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh06"])) {
                                $mant6 = $data2["object"]["thongTinSanXuat"]["manTh06"];
                            } else {
                                $mant6 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh07"])) {
                                $mant7 = $data2["object"]["thongTinSanXuat"]["manTh07"];
                            } else {
                                $mant7 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh08"])) {
                                $mant8 = $data2["object"]["thongTinSanXuat"]["manTh08"];
                            } else {
                                $mant8 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh09"])) {
                                $mant9 = $data2["object"]["thongTinSanXuat"]["manTh09"];
                            } else {
                                $mant9 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh10"])) {
                                $mant10 = $data2["object"]["thongTinSanXuat"]["manTh10"];
                            } else {
                                $mant10 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh11"])) {
                                $mant11 = $data2["object"]["thongTinSanXuat"]["manTh11"];
                            } else {
                                $mant11 = '...';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["manTh12"])) {
                                $mant12 = $data2["object"]["thongTinSanXuat"]["manTh12"];
                            } else {
                                $mant12 = '...';
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
                                    <td>Ngập (m)</td>
                                    <td>'.$ngapt1.'</td>
                                    <td>'.$ngapt2.'</td>
                                    <td>'.$ngapt3.'</td>
                                    <td>'.$ngapt4.'</td>
                                    <td>'.$ngapt5.'</td>
                                    <td>'.$ngapt6.'</td>
                                    <td>'.$ngapt7.'</td>
                                    <td>'.$ngapt8.'</td>
                                    <td>'.$ngapt9.'</td>
                                    <td>'.$ngapt10.'</td>
                                    <td>'.$ngapt11.'</td>
                                    <td>'.$ngapt12.'</td>
                                </tr>
                                <tr>
                                    <td>Phèn</td>
                                    <td>'.$phent1.'</td>
                                    <td>'.$phent2.'</td>
                                    <td>'.$phent3.'</td>
                                    <td>'.$phent4.'</td>
                                    <td>'.$phent5.'</td>
                                    <td>'.$phent6.'</td>
                                    <td>'.$phent7.'</td>
                                    <td>'.$phent8.'</td>
                                    <td>'.$phent9.'</td>
                                    <td>'.$phent10.'</td>
                                    <td>'.$phent11.'</td>
                                    <td>'.$phent12.'</td>
                                </tr>
                                <tr>
                                    <td>Mặn (‰)</td>
                                    <td>'.$mant1.'</td>
                                    <td>'.$mant2.'</td>
                                    <td>'.$mant3.'</td>
                                    <td>'.$mant4.'</td>
                                    <td>'.$mant5.'</td>
                                    <td>'.$mant6.'</td>
                                    <td>'.$mant7.'</td>
                                    <td>'.$mant8.'</td>
                                    <td>'.$mant9.'</td>
                                    <td>'.$mant10.'</td>
                                    <td>'.$mant11.'</td>
                                    <td>'.$mant12.'</td>
                                </tr>
                            </table>';
                            echo '<p class="c-title2">&#9658; Chọn giống và cách xử lý giống</p>';
                            if (isset($data2["object"]["thongTinSanXuat"]["giongBuoiGanNhat"])){
                                echo '<p class="c-title3">+ Giống bưởi được trồng gần nhất: <input type = "text" class="w3-input" id="buoi_gionggannhat" value="'.$data2["object"]["thongTinSanXuat"]["giongBuoiGanNhat"].'" /> </p>'; 
                            } else {
                                echo '<p class="c-title3">+ Giống bưởi được trồng gần nhất: <input type = "text" class="w3-input" id="buoi_gionggannhat" value="" /> </p>';
                            }

                            $nguongocgiong = "";
                            if (isset($data2["object"]["thongTinSanXuat"]["nguonGocGiong"])){
                                $nguongocgiong = $data2["object"]["thongTinSanXuat"]["nguonGocGiong"];
                            }
                            echo '<p class="c-title3">+ Nguồn gốc giống: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="buoi_nguongocgiong">
                                    <option selected>'.$nguongocgiong.'</option>
                                    <option>----------------------------</option>
                                    <option>Tự sản xuất</option>
                                    <option>Mua trong tỉnh</option>
                                    <option>Mua ngoài tỉnh</option>
                                </select></p>';
                            $giayxacnhangiong = "";
                            if (isset($data2["object"]["thongTinSanXuat"]["giayXnNgGiong"])) {
                                $giayxacnhangiong = $data2["object"]["thongTinSanXuat"]["giayXnNgGiong"];
                            }
                            if ($giayxacnhangiong == "1"){
                                echo '<p class="c-title3">+ Giấy xác nhận nguồn gốc giống bưởi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="buoi_giayxacnhangiong">
                                    <option selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Giấy xác nhận nguồn gốc giống bưởi: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="buoi_giayxacnhangiong">
                                    <option selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            $xulycaygiong = "";
                            if (isset($data2["object"]["thongTinSanXuat"]["coXuLyGiong"])) {
                                $xulycaygiong = $data2["object"]["thongTinSanXuat"]["coXuLyGiong"];
                            }
                            if ($xulycaygiong == "1"){
                                echo '<p class="c-title3">+ Xử lý cây giống: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="buoi_xulycaygiong">
                                    <option selected>Có</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            } else {
                                echo '<p class="c-title3">+ Xử lý cây giống: <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="buoi_xulycaygiong">
                                    <option selected>Không</option>
                                    <option>----------------------------</option>
                                    <option value = "1">Có</option>
                                    <option value = "0">Không</option>
                                </select></p>';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["coXuLyGiong"])) {
                                if ($data2["object"]["thongTinSanXuat"]["coXuLyGiong"] == "1"){
                                    echo '<p class="c-title3">Chế phẩm xử lý: <input type = "text" class="w3-input" id="buoi_chephamxuly" value = "'.$data2["object"]["thongTinSanXuat"]["chePhamXuLy"].'" /></p>';
                                }
                            }  else {
                                echo '<p class="c-title3">Chế phẩm xử lý: <input type = "text" class="w3-input" id="buoi_mucdichxuly" value = "" /></p>';
                            }

                            if (isset($data2["object"]["thongTinSanXuat"]["mdXuLyCay"])) {
                                echo '<p class="c-title3">+ Mục đích xử lý cây giống để làm gì? <input type = "text" class="w3-input" id="buoi_mucdichxuly" value = "'.$data2["object"]["thongTinSanXuat"]["mdXuLyCay"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Mục đích xử lý cây giống để làm gì? <input type = "text" class="w3-input" id="buoi_mucdichxuly" value = "" /></p>';
                            }



                            echo '<p class="c-title2">&#9658; Mật độ và khoảng cách trồng</p>';
                            if (isset($data2["object"]["thongTinSanXuat"]["matDoCayTrong"])) {
                                echo '<p class="c-title3">+ Mật độ: '.$data2["object"]["thongTinSanXuat"]["matDoCayTrong"].' cây/1.000m<sup>2</sup></p>';
                            } else {
                                echo '<p class="c-title3">+ Mật độ:</p>';
                            }
                            if (isset($data2["object"]["thongTinSanXuat"]["khgCachCayTrong"])) {
                                echo '<p class="c-title3">+ Khoảng cách trồng: '.$data2["object"]["thongTinSanXuat"]["khgCachCayTrong"].' m</p>';
                            } else {
                                echo '<p class="c-title3">+ Khoảng cách trồng:</p>';
                            }
                            echo '<p class="c-title2">&#9658; Bờ bao, đê bao</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["boBaoDeBao"])) {
                                echo '<p class="c-title3">+ '.$data2["object"]["kyThuatCanhTac"]["boBaoDeBao"].'</p>';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["chieuCaoDeBao"])) {
                                echo '<p class="c-title3">+ Chiều cao: '.$data2["object"]["kyThuatCanhTac"]["chieuCaoDeBao"].' . Chiều rộng: '.$data2["object"]["kyThuatCanhTac"]["chieuRongDeBao"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Chiều cao:........Chiều rộng:........</p>';
                            }
                            echo '<p class="c-title2">&#9658; Cống, bọng</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["cgBongSl"])) {
                                echo '<p class="c-title3">+ Số lượng: '.$data2["object"]["kyThuatCanhTac"]["cgBongSl"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Số lượng:</p>';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["cgBongDgKinh"])) {
                                echo '<p class="c-title3">+ Đường kính: '.$data2["object"]["kyThuatCanhTac"]["cgBongDgKinh"].' (m)</p>';
                            } else {
                                echo '<p class="c-title3">+ Đường kính::</p>';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["cgBongCachDat"])) {
                                echo '<p class="c-title3">+ Cách đặt cống, bọng: '.$data2["object"]["kyThuatCanhTac"]["cgBongCachDat"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Cách đặt cống, bọng:</p>';
                            }
                            echo '<p class="c-title2">&#9658; Kích thước mương, liếp</p>';
                            $liepdai = "";$lieprong = "";$liepcao = "";$muongdai = "";$muongrong = "";$muongcao = "";
                            if (isset($data2["object"]["kyThuatCanhTac"]["liepDai"])) {
                                $liepdai = $data2["object"]["kyThuatCanhTac"]["liepDai"];
                            } else {
                                $liepdai = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["liepRong"])) {
                                $lieprong = $data2["object"]["kyThuatCanhTac"]["liepRong"];
                            } else {
                                $lieprong = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["liepCao"])) {
                                $liepcao = $data2["object"]["kyThuatCanhTac"]["liepCao"];
                            } else {
                                $liepcao = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["muongDai"])) {
                                $muongdai = $data2["object"]["kyThuatCanhTac"]["muongDai"];
                            } else {
                                $muongdai = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["muongRong"])) {
                                $muongrong = $data2["object"]["kyThuatCanhTac"]["muongRong"];
                            } else {
                                $muongrong = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["muongCao"])) {
                                $muongcao = $data2["object"]["kyThuatCanhTac"]["muongCao"];
                            } else {
                                $muongcao = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td></td>
                                    <td>Dài (m)</td>
                                    <td>Rộng (m)</td>
                                    <td>Cao (m)</td>
                                </tr>
                                <tr>
                                    <td>Liếp</td>
                                    <td>'.$liepdai.'</td>
                                    <td>'.$lieprong.'</td>
                                    <td>'.$liepcao.'</td>
                                </tr>
                                <tr>
                                    <td>Mương</td>
                                    <td>'.$muongdai.'</td>
                                    <td>'.$muongrong.'</td>
                                    <td>'.$muongcao.'</td>
                                </tr>
                            </table>';
                            echo '<p class="c-title2">&#9658; Mô trồng</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["coMoTrong"])) {
                                if ($data2["object"]["kyThuatCanhTac"]["coMoTrong"] == "1") {
                                    echo '<p class="c-title3">Có. Thời gian đắp mô trước khi trồng: '.$data2["object"]["kyThuatCanhTac"]["thGgDapMo"].' tuần</p>';
                                } else {
                                    echo '<p class="c-title3">Không. Thời gian đắp mô trước khi trồng: '.$data2["object"]["kyThuatCanhTac"]["thGgDapMo"].' tuần</p>';
                                }
                            } else {
                                echo '<p class="c-title3">Thời gian đắp mô trước khi trồng:</p>';
                            }
                            echo '<p class="c-title2">&#9658; Mặt mô</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["chCaoMatMo"])) {
                                echo '<p class="c-title3">+ Chiều cao: '.$data2["object"]["kyThuatCanhTac"]["chCaoMatMo"].' (m)</p>';
                            } else {
                                echo '<p class="c-title3">+ Chiều cao:.....(m)</p>';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["dgKinhMatMo"])) {
                                echo '<p class="c-title3">+ Đường kính: '.$data2["object"]["kyThuatCanhTac"]["dgKinhMatMo"].' (m)</p>';
                            } else {
                                echo '<p class="c-title3">+ Đường kính:.....(m)</p>';
                            }
                            echo '<p class="c-title2">&#9658; Xử lý đất trước khi trồng</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["xuLyDat"])) {
                                if ($data2["object"]["kyThuatCanhTac"]["xuLyDat"] == "1"){
                                    echo '<p class="c-title3">+ Có. Chế phẩm xử lý: '.$data2["object"]["kyThuatCanhTac"]["chPhamXuLyDat"].'</p>';
                                } else {
                                    echo '<p class="c-title3">+ Không</p>';
                                }   
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["mdXuLyDat"])) {
                                echo '<p class="c-title3">+ Mục đích xử lý đất để làm gì? '.$data2["object"]["kyThuatCanhTac"]["mdXuLyDat"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Mục đích xử lý đất để làm gì?</p>';   
                            }
                            echo '<p class="c-title2">&#9658; Cây chắn gió</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["cayChanGio"])) {
                                if ($data2["object"]["kyThuatCanhTac"]["cayChanGio"] == "1"){
                                    echo '<p class="c-title3">+ Có</p>';
                                } else {
                                    echo '<p class="c-title3">+ Không</p>';
                                }   
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["chCCaySoMm"])) {
                                echo '<p class="c-title2">&#9658; Chiều cao cây so với mặt mô: '.$data2["object"]["kyThuatCanhTac"]["chCCaySoMm"].' (m)</p>';
                            } else {
                                echo '<p class="c-title2">&#9658; Chiều cao cây so với mặt mô:</p>';   
                            }
                            echo '<p class="c-title2">&#9658; Tủ gốc giữ ẩm</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["tuGocGiuAm"])) {
                                if ($data2["object"]["kyThuatCanhTac"]["tuGocGiuAm"] == "1"){
                                    echo '<p class="c-title3">+ Có</p>';
                                } else {
                                    echo '<p class="c-title3">+ Không</p>';
                                }   
                            }
                            echo '<p class="c-title2">&#9658; Tưới nước</p>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["coTuoiNuoc"])) {
                                if ($data2["object"]["kyThuatCanhTac"]["coTuoiNuoc"] == "1"){
                                    echo '<p class="c-title3">+ Có</p>';
                                } else {
                                    echo '<p class="c-title3">+ Không</p>';
                                }   
                            }
                            $caycon_solan = "";$caycon_cachtuoi = "";$caycon_thoigian = "";
                            $truongthanh_solan = "";$truongthanh_cachtuoi = "";$truongthanh_thoigian = "";
                            $rahoa_solan = "";$rahoa_cachtuoi = "";$rahoan_thoigian = "";
                            if (isset($data2["object"]["kyThuatCanhTac"]["cayConLanNg"])) {
                                $caycon_solan = $data2["object"]["kyThuatCanhTac"]["cayConLanNg"];
                            } else {
                                $caycon_solan = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["cayConCaTuoi"])) {
                                $caycon_cachtuoi = $data2["object"]["kyThuatCanhTac"]["cayConCaTuoi"];
                            } else {
                                $caycon_cachtuoi = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["cayConThGianTuoi"])) {
                                $caycon_thoigian = $data2["object"]["kyThuatCanhTac"]["cayConThGianTuoi"];
                            } else {
                                $caycon_thoigian = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["cayTtLanNg"])) {
                                $truongthanh_solan = $data2["object"]["kyThuatCanhTac"]["cayTtLanNg"];
                            } else {
                                $truongthanh_solan = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["cayTtCaTuoi"])) {
                                $truongthanh_cachtuoi = $data2["object"]["kyThuatCanhTac"]["cayTtCaTuoi"];
                            } else {
                                $truongthanh_cachtuoi = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["cayTtThGianTuoi"])) {
                                $truongthanh_thoigian = $data2["object"]["kyThuatCanhTac"]["cayTtThGianTuoi"];
                            } else {
                                $truongthanh_thoigian = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["raHoaLanNg"])) {
                                $rahoa_solan = $data2["object"]["kyThuatCanhTac"]["raHoaLanNg"];
                            } else {
                                $rahoa_solan = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["raHoaCaTuoi"])) {
                                $rahoa_cachtuoi = $data2["object"]["kyThuatCanhTac"]["raHoaCaTuoi"];
                            } else {
                                $rahoa_cachtuoi = '...';
                            }
                            if (isset($data2["object"]["kyThuatCanhTac"]["raHoaThGianTuoi"])) {
                                $rahoan_thoigian = $data2["object"]["kyThuatCanhTac"]["raHoaThGianTuoi"];
                            } else {
                                $rahoan_thoigian = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Giai đoạn</td>
                                    <td>Số lần/ ngày</td>
                                    <td>Cách tưới</td>
                                    <td>Thời gian tưới</td>
                                </tr>
                                <tr>
                                    <td>Cây con</td>
                                    <td>'.$caycon_solan.'</td>
                                    <td>'.$caycon_cachtuoi.'</td>
                                    <td>'.$caycon_thoigian.'</td>
                                </tr>
                                <tr>
                                    <td>Cây trưởng thành</td>
                                    <td>'.$truongthanh_solan.'</td>
                                    <td>'.$truongthanh_cachtuoi.'</td>
                                    <td>'.$truongthanh_thoigian.'</td>
                                </tr>
                                <tr>
                                    <td>Ra hoa đậu trái</td>
                                    <td>'.$rahoa_solan.'</td>
                                    <td>'.$rahoa_cachtuoi.'</td>
                                    <td>'.$rahoan_thoigian.'</td>
                                </tr>
                            </table>';
                            if (isset($data2["object"]["kyThuatCanhTac"]["quanLyCoDai"])) {
                                echo '<p class="c-title2">&#9658; Quản lý cỏ dại: '.$data2["object"]["kyThuatCanhTac"]["quanLyCoDai"].'</p>';
                            } else {
                                echo '<p class="c-title2">&#9658; Quản lý cỏ dại:</p>';   
                            }
                            echo '<p class="c-title2">&#9658; Phân bón và kỹ thuật bón phân</p>';
                            if (isset($data2["object"]["kyThuatBonPhan"]["dvBonPhan"])){
                                echo '<p class="c-title3">+ Đơn vị tính: '.$data2["object"]["kyThuatBonPhan"]["dvBonPhan"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Đơn vị tính:</p>';
                            }
                            $thoiky1 = "";$thoidiem1 = "";$loaiphan1 = "";$lieuluong1 = "";$cachbon1 = "";$thoigiantuoi1 = "";
                            $thoiky2 = "";$thoidiem2 = "";$loaiphan2 = "";$lieuluong2 = "";$cachbon2 = "";$thoigiantuoi2 = "";
                            $thoiky3 = "";$thoidiem3 = "";$loaiphan3 = "";$lieuluong3 = "";$cachbon3 = "";$thoigiantuoi3 = "";
                            $thoiky4 = "";$thoidiem4 = "";$loaiphan4 = "";$lieuluong4 = "";$cachbon4 = "";$thoigiantuoi4 = "";
                            $thoiky5 = "";$thoidiem5 = "";$loaiphan5 = "";$lieuluong5 = "";$cachbon5 = "";$thoigiantuoi5 = "";
                            $thoiky6 = "";$thoidiem6 = "";$loaiphan6 = "";$lieuluong6 = "";$cachbon6 = "";$thoigiantuoi6 = "";
                            $thoiky7 = "";$thoidiem7 = "";$loaiphan7 = "";$lieuluong7 = "";$cachbon7 = "";$thoigiantuoi7 = "";
                            $thoiky8 = "";$thoidiem8 = "";$loaiphan8 = "";$lieuluong8 = "";$cachbon8 = "";$thoigiantuoi8 = "";
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay01"])) {
                                $thoiky1 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay01"];
                            } else {
                                $thoiky1 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay02"])) {
                                $thoiky2 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay02"];
                            } else {
                                $thoiky2 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay03"])) {
                                $thoiky3 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay03"];
                            } else {
                                $thoiky3 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay04"])) {
                                $thoiky4 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay04"];
                            } else {
                                $thoiky4 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay05"])) {
                                $thoiky5 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay05"];
                            } else {
                                $thoiky5 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay06"])) {
                                $thoiky6 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay06"];
                            } else {
                                $thoiky6 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay07"])) {
                                $thoiky7 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay07"];
                            } else {
                                $thoiky7 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiKyCay08"])) {
                                $thoiky8 = $data2["object"]["kyThuatBonPhan"]["bpThoiKyCay08"];
                            } else {
                                $thoiky8 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon01"])) {
                                $thoidiem1 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon01"];
                            } else {
                                $thoidiem1 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon02"])) {
                                $thoidiem2 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon02"];
                            } else {
                                $thoidiem2 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon03"])) {
                                $thoidiem3 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon03"];
                            } else {
                                $thoidiem3 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon04"])) {
                                $thoidiem4 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon04"];
                            } else {
                                $thoidiem4 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon05"])) {
                                $thoidiem5 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon05"];
                            } else {
                                $thoidiem5 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon06"])) {
                                $thoidiem6 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon06"];
                            } else {
                                $thoidiem6 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon07"])) {
                                $thoidiem7 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon07"];
                            } else {
                                $thoidiem7 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon08"])) {
                                $thoidiem8 = $data2["object"]["kyThuatBonPhan"]["bpThoiDiemBon08"];
                            } else {
                                $thoidiem8 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan01"])) {
                                $loaiphan1 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan01"];
                            } else {
                                $loaiphan1 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan02"])) {
                                $loaiphan2 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan02"];
                            } else {
                                $loaiphan2 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan03"])) {
                                $loaiphan3 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan03"];
                            } else {
                                $loaiphan3 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan04"])) {
                                $loaiphan4 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan04"];
                            } else {
                                $loaiphan4 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan05"])) {
                                $loaiphan5 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan05"];
                            } else {
                                $loaiphan5 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan06"])) {
                                $loaiphan6 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan06"];
                            } else {
                                $loaiphan6 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan07"])) {
                                $loaiphan7 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan07"];
                            } else {
                                $loaiphan7 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan08"])) {
                                $loaiphan8 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan08"];
                            } else {
                                $loaiphan8 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["lieuLuongBp01"])) {
                                $lieuluong1 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan01"];
                            } else {
                                $lieuluong1 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan02"])) {
                                $lieuluong2 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan02"];
                            } else {
                                $lieuluong2 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan03"])) {
                                $lieuluong3 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan03"];
                            } else {
                                $lieuluong3 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan04"])) {
                                $lieuluong4 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan04"];
                            } else {
                                $lieuluong4 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan05"])) {
                                $lieuluong5 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan05"];
                            } else {
                                $lieuluong5 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan06"])) {
                                $lieuluong6 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan06"];
                            } else {
                                $lieuluong6 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan07"])) {
                                $lieuluong7 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan07"];
                            } else {
                                $lieuluong7 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["bpLoaiPhan08"])) {
                                $lieuluong8 = $data2["object"]["kyThuatBonPhan"]["bpLoaiPhan08"];
                            } else {
                                $lieuluong8 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["lieuLuongBp01"])) {
                                $cachbon1 = $data2["object"]["kyThuatBonPhan"]["cachBon01"];
                            } else {
                                $cachbon1 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["cachBon02"])) {
                                $cachbon2 = $data2["object"]["kyThuatBonPhan"]["cachBon02"];
                            } else {
                                $cachbon2 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["cachBon03"])) {
                                $cachbon3 = $data2["object"]["kyThuatBonPhan"]["cachBon03"];
                            } else {
                                $cachbon3 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["cachBon04"])) {
                                $cachbon4 = $data2["object"]["kyThuatBonPhan"]["cachBon04"];
                            } else {
                                $cachbon4 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["cachBon05"])) {
                                $cachbon5 = $data2["object"]["kyThuatBonPhan"]["cachBon05"];
                            } else {
                                $cachbon5 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["cachBon06"])) {
                                $cachbon6 = $data2["object"]["kyThuatBonPhan"]["cachBon06"];
                            } else {
                                $cachbon6 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["cachBon07"])) {
                                $cachbon7 = $data2["object"]["kyThuatBonPhan"]["cachBon07"];
                            } else {
                                $cachbon7 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["cachBon08"])) {
                                $cachbon8 = $data2["object"]["kyThuatBonPhan"]["cachBon08"];
                            } else {
                                $cachbon8 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["lieuLuongBp01"])) {
                                $thoigiantuoi1 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp01"];
                            } else {
                                $thoigiantuoi1 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["hieuQuaBp02"])) {
                                $thoigiantuoi2 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp02"];
                            } else {
                                $thoigiantuoi2 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["hieuQuaBp03"])) {
                                $thoigiantuoi3 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp03"];
                            } else {
                                $thoigiantuoi3 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["hieuQuaBp04"])) {
                                $thoigiantuoi4 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp04"];
                            } else {
                                $thoigiantuoi4 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["hieuQuaBp05"])) {
                                $thoigiantuoi5 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp05"];
                            } else {
                                $thoigiantuoi5 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["hieuQuaBp06"])) {
                                $thoigiantuoi6 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp06"];
                            } else {
                                $thoigiantuoi6 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["hieuQuaBp07"])) {
                                $thoigiantuoi7 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp07"];
                            } else {
                                $thoigiantuoi7 = '...';
                            }
                            if (isset($data2["object"]["kyThuatBonPhan"]["hieuQuaBp08"])) {
                                $thoigiantuoi8 = $data2["object"]["kyThuatBonPhan"]["hieuQuaBp08"];
                            } else {
                                $thoigiantuoi8 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Thời kỳ cây</td>
                                    <td>Thời điểm bón</td>
                                    <td>Loại phân</td>
                                    <td>Liều lượng</td>
                                    <td>Cách bón</td>
                                    <td>Hiệu quả</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky1.'</td>
                                    <td>'.$thoidiem1.'</td>
                                    <td>'.$loaiphan1.'</td>
                                    <td>'.$lieuluong1.'</td>
                                    <td>'.$cachbon1.'</td>
                                    <td>'.$thoigiantuoi1.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky2.'</td>
                                    <td>'.$thoidiem2.'</td>
                                    <td>'.$loaiphan2.'</td>
                                    <td>'.$lieuluong2.'</td>
                                    <td>'.$cachbon2.'</td>
                                    <td>'.$thoigiantuoi2.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky3.'</td>
                                    <td>'.$thoidiem3.'</td>
                                    <td>'.$loaiphan3.'</td>
                                    <td>'.$lieuluong3.'</td>
                                    <td>'.$cachbon3.'</td>
                                    <td>'.$thoigiantuoi3.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky4.'</td>
                                    <td>'.$thoidiem4.'</td>
                                    <td>'.$loaiphan4.'</td>
                                    <td>'.$lieuluong4.'</td>
                                    <td>'.$cachbon4.'</td>
                                    <td>'.$thoigiantuoi4.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky5.'</td>
                                    <td>'.$thoidiem5.'</td>
                                    <td>'.$loaiphan5.'</td>
                                    <td>'.$lieuluong5.'</td>
                                    <td>'.$cachbon5.'</td>
                                    <td>'.$thoigiantuoi5.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky6.'</td>
                                    <td>'.$thoidiem6.'</td>
                                    <td>'.$loaiphan6.'</td>
                                    <td>'.$lieuluong6.'</td>
                                    <td>'.$cachbon6.'</td>
                                    <td>'.$thoigiantuoi6.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky7.'</td>
                                    <td>'.$thoidiem7.'</td>
                                    <td>'.$loaiphan7.'</td>
                                    <td>'.$lieuluong7.'</td>
                                    <td>'.$cachbon7.'</td>
                                    <td>'.$thoigiantuoi7.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thoiky8.'</td>
                                    <td>'.$thoidiem8.'</td>
                                    <td>'.$loaiphan8.'</td>
                                    <td>'.$lieuluong8.'</td>
                                    <td>'.$cachbon8.'</td>
                                    <td>'.$thoigiantuoi8.'</td>
                                </tr>
                            </table>';
                            echo '<p class="c-title2">&#9658; Sử dụng thuốc BVTV</p>';
                            $thuocthoiky1 = "";$thuocthoidiem1 = "";$thuocloaisau1 = "";$thuocloaithuoc1 = "";$thuoclieuluong1 = "";$thuochieuqua1 = "";
                            $thuocthoiky2 = "";$thuocthoidiem2 = "";$thuocloaisau2 = "";$thuocloaithuoc2 = "";$thuoclieuluong2 = "";$thuochieuqua2 = "";
                            $thuocthoiky3 = "";$thuocthoidiem3 = "";$thuocloaisau3 = "";$thuocloaithuoc3 = "";$thuoclieuluong3 = "";$thuochieuqua3 = "";
                            $thuocthoiky4 = "";$thuocthoidiem4 = "";$thuocloaisau4 = "";$thuocloaithuoc4 = "";$thuoclieuluong4 = "";$thuochieuqua4 = "";
                            $thuocthoiky5 = "";$thuocthoidiem5 = "";$thuocloaisau5 = "";$thuocloaithuoc5 = "";$thuoclieuluong5 = "";$thuochieuqua5 = "";
                            $thuocthoiky6 = "";$thuocthoidiem6 = "";$thuocloaisau6 = "";$thuocloaithuoc6 = "";$thuoclieuluong6 = "";$thuochieuqua6 = "";
                            $thuocthoiky7 = "";$thuocthoidiem7 = "";$thuocloaisau7 = "";$thuocloaithuoc7 = "";$thuoclieuluong7 = "";$thuochieuqua7 = "";
                            $thuocthoiky8 = "";$thuocthoidiem8 = "";$thuocloaisau8 = "";$thuocloaithuoc8 = "";$thuoclieuluong8 = "";$thuochieuqua8 = "";
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay01"])) {
                                $thuocthoiky1 = $data2["object"]["thuocBVTV"]["bvTvThKyCay01"];
                            } else {
                                $thuocthoiky1 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay02"])) {
                                $thuocthoiky2 = $data2["object"]["thuocBVTV"]["bvTvThKyCay02"];
                            } else {
                                $thuocthoiky2 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay03"])) {
                                $thuocthoiky3 = $data2["object"]["thuocBVTV"]["bvTvThKyCay03"];
                            } else {
                                $thuocthoiky3 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay04"])) {
                                $thuocthoiky4 = $data2["object"]["thuocBVTV"]["bvTvThKyCay04"];
                            } else {
                                $thuocthoiky4 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay05"])) {
                                $thuocthoiky5 = $data2["object"]["thuocBVTV"]["bvTvThKyCay05"];
                            } else {
                                $thuocthoiky5 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay06"])) {
                                $thuocthoiky6 = $data2["object"]["thuocBVTV"]["bvTvThKyCay06"];
                            } else {
                                $thuocthoiky6 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay07"])) {
                                $thuocthoiky7 = $data2["object"]["thuocBVTV"]["bvTvThKyCay07"];
                            } else {
                                $thuocthoiky7 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThKyCay08"])) {
                                $thuocthoiky8 = $data2["object"]["thuocBVTV"]["bvTvThKyCay08"];
                            } else {
                                $thuocthoiky8 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon01"])) {
                                $thuocthoidiem1 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon01"];
                            } else {
                                $thuocthoidiem1 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon02"])) {
                                $thuocthoidiem2 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon02"];
                            } else {
                                $thuocthoidiem2 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon03"])) {
                                $thuocthoidiem3 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon03"];
                            } else {
                                $thuocthoidiem3 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon04"])) {
                                $thuocthoidiem4 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon04"];
                            } else {
                                $thuocthoidiem4 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon05"])) {
                                $thuocthoidiem5 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon05"];
                            } else {
                                $thuocthoidiem5 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon06"])) {
                                $thuocthoidiem6 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon06"];
                            } else {
                                $thuocthoidiem6 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon07"])) {
                                $thuocthoidiem7 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon07"];
                            } else {
                                $thuocthoidiem7 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvThDiemBon08"])) {
                                $thuocthoidiem8 = $data2["object"]["thuocBVTV"]["bvTvThDiemBon08"];
                            } else {
                                $thuocthoidiem8 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau01"])) {
                                $thuocloaisau1 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau01"];
                            } else {
                                $thuocloaisau1 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau02"])) {
                                $thuocloaisau2 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau02"];
                            } else {
                                $thuocloaisau2 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau03"])) {
                                $thuocloaisau3 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau03"];
                            } else {
                                $thuocloaisau3 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau04"])) {
                                $thuocloaisau4 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau04"];
                            } else {
                                $thuocloaisau4 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau05"])) {
                                $thuocloaisau5 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau05"];
                            } else {
                                $thuocloaisau5 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau06"])) {
                                $thuocloaisau6 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau06"];
                            } else {
                                $thuocloaisau6 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau07"])) {
                                $thuocloaisau7 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau07"];
                            } else {
                                $thuocloaisau7 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiSau08"])) {
                                $thuocloaisau8 = $data2["object"]["thuocBVTV"]["bvTvLoaiSau08"];
                            } else {
                                $thuocloaisau8 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc01"])) {
                                $thuocloaithuoc1 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc01"];
                            } else {
                                $thuocloaithuoc1 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc02"])) {
                                $thuocloaithuoc2 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc02"];
                            } else {
                                $thuocloaithuoc2 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc03"])) {
                                $thuocloaithuoc3 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc03"];
                            } else {
                                $thuocloaithuoc3 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc04"])) {
                                $thuocloaithuoc4 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc04"];
                            } else {
                                $thuocloaithuoc4 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc05"])) {
                                $thuocloaithuoc5 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc05"];
                            } else {
                                $thuocloaithuoc5 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc06"])) {
                                $thuocloaithuoc6 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc06"];
                            } else {
                                $thuocloaithuoc6 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc07"])) {
                                $thuocloaithuoc7 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc07"];
                            } else {
                                $thuocloaithuoc7 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLoaiThuoc08"])) {
                                $thuocloaithuoc8 = $data2["object"]["thuocBVTV"]["bvTvLoaiThuoc08"];
                            } else {
                                $thuocloaithuoc8 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong01"])) {
                                $thuoclieuluong1 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong01"];
                            } else {
                                $thuoclieuluong1 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong02"])) {
                                $thuoclieuluong2 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong02"];
                            } else {
                                $thuoclieuluong2 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong03"])) {
                                $thuoclieuluong3 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong03"];
                            } else {
                                $thuoclieuluong3 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong04"])) {
                                $thuoclieuluong4 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong04"];
                            } else {
                                $thuoclieuluong4 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong05"])) {
                                $thuoclieuluong5 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong05"];
                            } else {
                                $thuoclieuluong5 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong06"])) {
                                $thuoclieuluong6 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong06"];
                            } else {
                                $thuoclieuluong6 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong07"])) {
                                $thuoclieuluong7 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong07"];
                            } else {
                                $thuoclieuluong7 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvLieuLuong08"])) {
                                $thuoclieuluong8 = $data2["object"]["thuocBVTV"]["bvTvLieuLuong08"];
                            } else {
                                $thuoclieuluong8 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua01"])) {
                                $thuochieuqua1 = $data2["object"]["thuocBVTV"]["bvTvHieuQua01"];
                            } else {
                                $thuochieuqua1 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua02"])) {
                                $thuochieuqua2 = $data2["object"]["thuocBVTV"]["bvTvHieuQua02"];
                            } else {
                                $thuochieuqua2 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua03"])) {
                                $thuochieuqua3 = $data2["object"]["thuocBVTV"]["bvTvHieuQua03"];
                            } else {
                                $thuochieuqua3 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua04"])) {
                                $thuochieuqua4 = $data2["object"]["thuocBVTV"]["bvTvHieuQua04"];
                            } else {
                                $thuochieuqua4 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua05"])) {
                                $thuochieuqua5 = $data2["object"]["thuocBVTV"]["bvTvHieuQua05"];
                            } else {
                                $thuochieuqua5 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua06"])) {
                                $thuochieuqua6 = $data2["object"]["thuocBVTV"]["bvTvHieuQua06"];
                            } else {
                                $thuochieuqua6 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua07"])) {
                                $thuochieuqua7 = $data2["object"]["thuocBVTV"]["bvTvHieuQua07"];
                            } else {
                                $thuochieuqua7 = '...';
                            }
                            if (isset($data2["object"]["thuocBVTV"]["bvTvHieuQua08"])) {
                                $thuochieuqua8 = $data2["object"]["thuocBVTV"]["bvTvHieuQua08"];
                            } else {
                                $thuochieuqua8 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Thời kỳ cây</td>
                                    <td>Thời điểm bón</td>
                                    <td>Loại sâu bệnh</td>
                                    <td>Loại thuốc</td>
                                    <td>Liều lượng</td>
                                    <td>Hiệu quả</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky1.'</td>
                                    <td>'.$thuocthoidiem1.'</td>
                                    <td>'.$thuocloaisau1.'</td>
                                    <td>'.$thuocloaithuoc1.'</td>
                                    <td>'.$thuoclieuluong1.'</td>
                                    <td>'.$thuochieuqua1.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky2.'</td>
                                    <td>'.$thuocthoidiem2.'</td>
                                    <td>'.$thuocloaisau2.'</td>
                                    <td>'.$thuocloaithuoc2.'</td>
                                    <td>'.$thuoclieuluong2.'</td>
                                    <td>'.$thuochieuqua2.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky3.'</td>
                                    <td>'.$thuocthoidiem3.'</td>
                                    <td>'.$thuocloaisau3.'</td>
                                    <td>'.$thuocloaithuoc3.'</td>
                                    <td>'.$thuoclieuluong3.'</td>
                                    <td>'.$thuochieuqua3.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky4.'</td>
                                    <td>'.$thuocthoidiem4.'</td>
                                    <td>'.$thuocloaisau4.'</td>
                                    <td>'.$thuocloaithuoc4.'</td>
                                    <td>'.$thuoclieuluong4.'</td>
                                    <td>'.$thuochieuqua4.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky5.'</td>
                                    <td>'.$thuocthoidiem5.'</td>
                                    <td>'.$thuocloaisau5.'</td>
                                    <td>'.$thuocloaithuoc5.'</td>
                                    <td>'.$thuoclieuluong5.'</td>
                                    <td>'.$thuochieuqua5.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky6.'</td>
                                    <td>'.$thuocthoidiem6.'</td>
                                    <td>'.$thuocloaisau6.'</td>
                                    <td>'.$thuocloaithuoc6.'</td>
                                    <td>'.$thuoclieuluong6.'</td>
                                    <td>'.$thuochieuqua6.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky7.'</td>
                                    <td>'.$thuocthoidiem7.'</td>
                                    <td>'.$thuocloaisau7.'</td>
                                    <td>'.$thuocloaithuoc7.'</td>
                                    <td>'.$thuoclieuluong7.'</td>
                                    <td>'.$thuochieuqua7.'</td>
                                </tr>
                                <tr>
                                    <td>'.$thuocthoiky8.'</td>
                                    <td>'.$thuocthoidiem8.'</td>
                                    <td>'.$thuocloaisau8.'</td>
                                    <td>'.$thuocloaithuoc8.'</td>
                                    <td>'.$thuoclieuluong8.'</td>
                                    <td>'.$thuochieuqua8.'</td>
                                </tr>
                            </table>';

                            echo '<p class="c-title2">&#9658; Xử lý ra hoa tự nhiên</p>';
                            if (isset($data2["object"]["xuLyRaHoa"]["ldRaHoaTuNh"])){
                                echo '<p class="c-title3">+ Lý do: '.$data2["object"]["xuLyRaHoa"]["ldRaHoaTuNh"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Lý do:</p>';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["soLanRaHoa"])){
                                echo '<p class="c-title3">+ Số lần ra hoa trong năm: '.$data2["object"]["xuLyRaHoa"]["soLanRaHoa"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Số lần ra hoa trong năm:</p>';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["thGianRaHoa"])){
                                echo '<p class="c-title3">+ Thời gian ra hoa: '.$data2["object"]["xuLyRaHoa"]["thGianRaHoa"].' . Thời gian ra hoa từng đợt: '.$data2["object"]["xuLyRaHoa"]["thGianRaHoaTgDot"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Thời gian ra hoa:......Thời gian ra hoa từng đợt:.....</p>';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["donViLlgPhanBon"])){
                                echo '<p class="c-title3">+ Sử dụng phân bón : Đơn vị tính liều lượng: '.$data2["object"]["xuLyRaHoa"]["donViLlgPhanBon"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Sử dụng phân bón : Đơn vị tính liều lượng:</p>';
                            }
                            $tnthoidiem1 = "";$tnloaiphan1 = "";$tnlieuluong1 = "";$tncachbon1 = "";
                            $tnthoidiem2 = "";$tnloaiphan2 = "";$tnlieuluong2 = "";$tncachbon2 = "";
                            $tnthoidiem3 = "";$tnloaiphan3 = "";$tnlieuluong3 = "";$tncachbon3 = "";
                            $tnthoidiem4 = "";$tnloaiphan4 = "";$tnlieuluong4 = "";$tncachbon4 = "";
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemBon01"])) {
                                $tnthoidiem1 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemBon01"];
                            } else {
                                $tnthoidiem1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemBon02"])) {
                                $tnthoidiem2 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemBon02"];
                            } else {
                                $tnthoidiem2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemBon03"])) {
                                $tnthoidiem3 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemBon03"];
                            } else {
                                $tnthoidiem3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemBon04"])) {
                                $tnthoidiem4 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemBon04"];
                            } else {
                                $tnthoidiem4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan01"])) {
                                $tnloaiphan1 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan01"];
                            } else {
                                $tnloaiphan1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan02"])) {
                                $tnloaiphan2 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan02"];
                            } else {
                                $tnloaiphan2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan03"])) {
                                $tnloaiphan3 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan03"];
                            } else {
                                $tnloaiphan3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan04"])) {
                                $tnloaiphan4 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiPhan04"];
                            } else {
                                $tnloaiphan4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon01"])) {
                                $tnlieuluong1 = $data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon01"];
                            } else {
                                $tnlieuluong1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon02"])) {
                                $tnlieuluong2 = $data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon02"];
                            } else {
                                $tnlieuluong2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon03"])) {
                                $tnlieuluong3 = $data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon03"];
                            } else {
                                $tnlieuluong3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon04"])) {
                                $tnlieuluong4 = $data2["object"]["xuLyRaHoa"]["raHoaLlgPhanBon04"];
                            } else {
                                $tnlieuluong4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaCachBon01"])) {
                                $tncachbon1 = $data2["object"]["xuLyRaHoa"]["raHoaCachBon01"];
                            } else {
                                $tncachbon1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaCachBon02"])) {
                                $tncachbon2 = $data2["object"]["xuLyRaHoa"]["raHoaCachBon02"];
                            } else {
                                $tncachbon2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaCachBon03"])) {
                                $tncachbon3 = $data2["object"]["xuLyRaHoa"]["raHoaCachBon03"];
                            } else {
                                $tncachbon3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaCachBon04"])) {
                                $tncachbon4 = $data2["object"]["xuLyRaHoa"]["raHoaCachBon04"];
                            } else {
                                $tncachbon4 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Thời điểm bón</td>
                                    <td>Loại phân</td>
                                    <td>Liều lượng</td>
                                    <td>Cách bón</td>
                                </tr>
                                <tr>
                                    <td>'.$tnthoidiem1.'</td>
                                    <td>'.$tnloaiphan1.'</td>
                                    <td>'.$tnlieuluong1.'</td>
                                    <td>'.$tncachbon1.'</td>
                                </tr>
                                <tr>
                                    <td>'.$tnthoidiem2.'</td>
                                    <td>'.$tnloaiphan2.'</td>
                                    <td>'.$tnlieuluong2.'</td>
                                    <td>'.$tncachbon2.'</td>
                                </tr>
                                <tr>
                                    <td>'.$tnthoidiem3.'</td>
                                    <td>'.$tnloaiphan3.'</td>
                                    <td>'.$tnlieuluong3.'</td>
                                    <td>'.$tncachbon3.'</td>
                                </tr>
                                <tr>
                                    <td>'.$tnthoidiem4.'</td>
                                    <td>'.$tnloaiphan4.'</td>
                                    <td>'.$tnlieuluong4.'</td>
                                    <td>'.$tncachbon4.'</td>
                                </tr>
                            </table>';
                            echo '<p class="c-title3">+ Phòng trừ sâu bệnh:</p>';
                            $tnsauthoidiem1 = "";$tnsauloaisau1 = "";$tnsauloaithuoc1 = "";$tnsaulieuluong1 = "";$tnsauhieuqua1 = "";
                            $tnsauthoidiem2 = "";$tnsauloaisau2 = "";$tnsauloaithuoc2 = "";$tnsaulieuluong2 = "";$tnsauhieuqua2 = "";
                            $tnsauthoidiem3 = "";$tnsauloaisau3 = "";$tnsauloaithuoc3 = "";$tnsaulieuluong3 = "";$tnsauhieuqua3 = "";
                            $tnsauthoidiem4 = "";$tnsauloaisau4 = "";$tnsauloaithuoc4 = "";$tnsaulieuluong4 = "";$tnsauhieuqua4 = "";
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau01"])) {
                                $tnsauthoidiem1 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau01"];
                            } else {
                                $tnsauthoidiem1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau02"])) {
                                $tnsauthoidiem2 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau02"];
                            } else {
                                $tnsauthoidiem2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau03"])) {
                                $tnsauthoidiem3 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau03"];
                            } else {
                                $tnsauthoidiem3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau04"])) {
                                $tnsauthoidiem4 = $data2["object"]["xuLyRaHoa"]["raHoaThDiemTruSau04"];
                            } else {
                                $tnsauthoidiem4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiSau01"])) {
                                $tnsauloaisau1 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiSau01"];
                            } else {
                                $tnsauloaisau1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiSau02"])) {
                                $tnsauloaisau2 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiSau02"];
                            } else {
                                $tnsauloaisau2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiSau03"])) {
                                $tnsauloaisau3 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiSau03"];
                            } else {
                                $tnsauloaisau3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiSau04"])) {
                                $tnsauloaisau4 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiSau04"];
                            } else {
                                $tnsauloaisau4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc01"])) {
                                $tnsauloaithuoc1 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc01"];
                            } else {
                                $tnsauloaithuoc1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc02"])) {
                                $tnsauloaithuoc2 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc02"];
                            } else {
                                $tnsauloaithuoc2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc03"])) {
                                $tnsauloaithuoc3 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc03"];
                            } else {
                                $tnsauloaithuoc3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc04"])) {
                                $tnsauloaithuoc4 = $data2["object"]["xuLyRaHoa"]["raHoaLoaiThuoc04"];
                            } else {
                                $tnsauloaithuoc4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc01"])) {
                                $tnsaulieuluong1 = $data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc01"];
                            } else {
                                $tnsaulieuluong1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc02"])) {
                                $tnsaulieuluong2 = $data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc02"];
                            } else {
                                $tnsaulieuluong2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc03"])) {
                                $tnsaulieuluong3 = $data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc03"];
                            } else {
                                $tnsaulieuluong3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc04"])) {
                                $tnsaulieuluong4 = $data2["object"]["xuLyRaHoa"]["raHoaLlgThuoc04"];
                            } else {
                                $tnsaulieuluong4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau01"])) {
                                $tnsauhieuqua1 = $data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau01"];
                            } else {
                                $tnsauhieuqua1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau02"])) {
                                $tnsauhieuqua2 = $data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau02"];
                            } else {
                                $tnsauhieuqua2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau03"])) {
                                $tnsauhieuqua3 = $data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau03"];
                            } else {
                                $tnsauhieuqua3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau04"])) {
                                $tnsauhieuqua4 = $data2["object"]["xuLyRaHoa"]["raHoaHieuQuaTruSau04"];
                            } else {
                                $tnsauhieuqua4 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Thời điểm</td>
                                    <td>Loại sâu bệnh</td>
                                    <td>Loại thuốc</td>
                                    <td>Liều lượng</td>
                                    <td>Hiệu quả</td>
                                </tr>
                                <tr>
                                    <td>'.$tnsauthoidiem1.'</td>
                                    <td>'.$tnsauloaisau1.'</td>
                                    <td>'.$tnsauloaithuoc1.'</td>
                                    <td>'.$tnsaulieuluong1.'</td>
                                    <td>'.$tnsauhieuqua1.'</td>
                                </tr>
                                <tr>
                                    <td>'.$tnsauthoidiem2.'</td>
                                    <td>'.$tnsauloaisau2.'</td>
                                    <td>'.$tnsauloaithuoc2.'</td>
                                    <td>'.$tnsaulieuluong2.'</td>
                                    <td>'.$tnsauhieuqua2.'</td>
                                </tr>
                                <tr>
                                    <td>'.$tnsauthoidiem3.'</td>
                                    <td>'.$tnsauloaisau3.'</td>
                                    <td>'.$tnsauloaithuoc3.'</td>
                                    <td>'.$tnsaulieuluong3.'</td>
                                    <td>'.$tnsauhieuqua3.'</td>
                                </tr>
                                <tr>
                                    <td>'.$tnsauthoidiem4.'</td>
                                    <td>'.$tnsauloaisau4.'</td>
                                    <td>'.$tnsauloaithuoc4.'</td>
                                    <td>'.$tnsaulieuluong4.'</td>
                                    <td>'.$tnsauhieuqua4.'</td>
                                </tr>
                            </table>';

                            echo '<p class="c-title2">&#9658; Áp dụng kỹ thuật xử lý ra hoa tập trung</p>';
                            if (isset($data2["object"]["xuLyRaHoa"]["donViBphanRaHoaTtg"])){
                                echo '<p class="c-title3">+ Bón phân: Đơn vị tính liều lượng: '.$data2["object"]["xuLyRaHoa"]["donViBphanRaHoaTtg"].'</p>';
                            } else {
                                echo '<p class="c-title3">+ Bón phân: Đơn vị tính liều lượng:</p>';
                            }
                            $ttloaiphan1 = "";$ttthoidiem1 = "";$ttlieuluong1 = "";$ttcachbon1 = "";
                            $ttloaiphan2 = "";$ttthoidiem2 = "";$ttlieuluong2 = "";$ttcachbon2 = "";
                            $ttloaiphan3 = "";$ttthoidiem3 = "";$ttlieuluong3 = "";$ttcachbon3 = "";
                            $ttloaiphan4 = "";$ttthoidiem4 = "";$ttlieuluong4 = "";$ttcachbon4 = "";
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan01"])) {
                                $ttloaiphan1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan01"];
                            } else {
                                $ttloaiphan1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan02"])) {
                                $ttloaiphan2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan02"];
                            } else {
                                $ttloaiphan2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan03"])) {
                                $ttloaiphan3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan03"];
                            } else {
                                $ttloaiphan3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan04"])) {
                                $ttloaiphan4 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiPhan04"];
                            } else {
                                $ttloaiphan4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan01"])) {
                                $ttthoidiem1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan01"];
                            } else {
                                $ttthoidiem1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan02"])) {
                                $ttthoidiem2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan02"];
                            } else {
                                $ttthoidiem2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan03"])) {
                                $ttthoidiem3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan03"];
                            } else {
                                $ttthoidiem3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan04"])) {
                                $ttthoidiem4 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgPhan04"];
                            } else {
                                $ttthoidiem4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon01"])) {
                                $ttlieuluong1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon01"];
                            } else {
                                $ttlieuluong1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon02"])) {
                                $ttlieuluong2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon02"];
                            } else {
                                $ttlieuluong2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon03"])) {
                                $ttlieuluong3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon03"];
                            } else {
                                $ttlieuluong3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon04"])) {
                                $ttlieuluong4 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon04"];
                            } else {
                                $ttlieuluong4 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon01"])) {
                                $ttcachbon1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon01"];
                            } else {
                                $ttcachbon1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon02"])) {
                                $ttcachbon2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon02"];
                            } else {
                                $ttcachbon2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon03"])) {
                                $ttcachbon3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon03"];
                            } else {
                                $ttcachbon3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon04"])) {
                                $ttcachbon4 = $data2["object"]["xuLyRaHoa"]["raHoaTtgCachBon04"];
                            } else {
                                $ttcachbon4 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Loại phân</td>
                                    <td>Thời điểm</td>
                                    <td>Liều lượng</td>
                                    <td>Cách bón</td>
                                </tr>
                                <tr>
                                    <td>'.$ttloaiphan1.'</td>
                                    <td>'.$ttthoidiem1.'</td>
                                    <td>'.$ttlieuluong1.'</td>
                                    <td>'.$ttcachbon1.'</td>
                                </tr>
                                <tr>
                                    <td>'.$ttloaiphan2.'</td>
                                    <td>'.$ttthoidiem2.'</td>
                                    <td>'.$ttlieuluong2.'</td>
                                    <td>'.$ttcachbon2.'</td>
                                </tr>
                                <tr>
                                    <td>'.$ttloaiphan3.'</td>
                                    <td>'.$ttthoidiem3.'</td>
                                    <td>'.$ttlieuluong3.'</td>
                                    <td>'.$ttcachbon3.'</td>
                                </tr>
                                <tr>
                                    <td>'.$ttloaiphan4.'</td>
                                    <td>'.$ttthoidiem4.'</td>
                                    <td>'.$ttlieuluong4.'</td>
                                    <td>'.$ttcachbon4.'</td>
                                </tr>
                            </table>';
                            echo '<p class="c-title3">+ Phòng trừ sâu bệnh:</p>';
                            $ttsauloaisau1 = "";$ttsauthoidiem1 = "";$ttsauloaithuoc1 = "";$ttsaulieuluong1 = "";$ttsauhieuqua1 = "";
                            $ttsauloaisau2 = "";$ttsauthoidiem2 = "";$ttsauloaithuoc2 = "";$ttsaulieuluong2 = "";$ttsauhieuqua2 = "";
                            $ttsauloaisau3 = "";$ttsauthoidiem3 = "";$ttsauloaithuoc3 = "";$ttsaulieuluong3 = "";$ttsauhieuqua3 = "";
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiSau01"])) {
                                $ttsauloaisau1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiSau01"];
                            } else {
                                $ttsauloaisau1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiSau02"])) {
                                $ttsauloaisau2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiSau02"];
                            } else {
                                $ttsauloaisau2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiSau03"])) {
                                $ttsauloaisau3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLoaiSau03"];
                            } else {
                                $ttsauloaisau3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgThDiemSau01"])) {
                                $ttsauthoidiem1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgThDiemSau01"];
                            } else {
                                $ttsauthoidiem1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgThDiemSau02"])) {
                                $ttsauthoidiem2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgThDiemSau02"];
                            } else {
                                $ttsauthoidiem2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgThDiemSau03"])) {
                                $ttsauthoidiem3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgThDiemSau03"];
                            } else {
                                $ttsauthoidiem3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgThuoc01"])) {
                                $ttsauloaithuoc1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgThuoc01"];
                            } else {
                                $ttsauloaithuoc1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgThuoc02"])) {
                                $ttsauloaithuoc2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgThuoc02"];
                            } else {
                                $ttsauloaithuoc2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgThuoc03"])) {
                                $ttsauloaithuoc3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgThuoc03"];
                            } else {
                                $ttsauloaithuoc3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgTh01"])) {
                                $ttsaulieuluong1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgTh01"];
                            } else {
                                $ttsaulieuluong1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgTh02"])) {
                                $ttsaulieuluong2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgTh02"];
                            } else {
                                $ttsaulieuluong2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgTh03"])) {
                                $ttsaulieuluong3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgLieuLgTh03"];
                            } else {
                                $ttsaulieuluong3 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgKetQua01"])) {
                                $ttsauhieuqua1 = $data2["object"]["xuLyRaHoa"]["raHoaTtgKetQua01"];
                            } else {
                                $ttsauhieuqua1 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgKetQua02"])) {
                                $ttsauhieuqua2 = $data2["object"]["xuLyRaHoa"]["raHoaTtgKetQua02"];
                            } else {
                                $ttsauhieuqua2 = '...';
                            }
                            if (isset($data2["object"]["xuLyRaHoa"]["raHoaTtgKetQua03"])) {
                                $ttsauhieuqua3 = $data2["object"]["xuLyRaHoa"]["raHoaTtgKetQua03"];
                            } else {
                                $ttsauhieuqua3 = '...';
                            }
                            echo '<table class="w3-table-all" border="1">
                                <tr>
                                    <td>Loại sâu bệnh</td>
                                    <td>Thời điểm</td>
                                    <td>Loại thuốc</td>
                                    <td>Liều lượng</td>
                                    <td>Kết quả</td>
                                </tr>
                                <tr>
                                    <td>'.$ttsauloaisau1.'</td>
                                    <td>'.$ttsauthoidiem1.'</td>
                                    <td>'.$ttsauloaithuoc1.'</td>
                                    <td>'.$ttsaulieuluong1.'</td>
                                    <td>'.$ttsauhieuqua1.'</td>
                                </tr>
                                <tr>
                                    <td>'.$ttsauloaisau2.'</td>
                                    <td>'.$ttsauthoidiem2.'</td>
                                    <td>'.$ttsauloaithuoc2.'</td>
                                    <td>'.$ttsaulieuluong2.'</td>
                                    <td>'.$ttsauhieuqua2.'</td>
                                </tr>
                                <tr>
                                    <td>'.$ttsauloaisau3.'</td>
                                    <td>'.$ttsauthoidiem3.'</td>
                                    <td>'.$ttsauloaithuoc3.'</td>
                                    <td>'.$ttsaulieuluong3.'</td>
                                    <td>'.$ttsauhieuqua3.'</td>
                                </tr>
                            </table>';
                            echo '<p class="c-title1">5. Thu hoạch:</p>';
                            if (isset($data2["object"]["thuHoach"]["thGianThuHoach"])){
                                echo '<p class="c-title3">+ Thời gian từ khi đậu trái đến khi thu hoạch( ngày hay tháng): <input type = "text" class="w3-input" id="buoi_thoigianthuhoach" value = "'.$data2["object"]["thuHoach"]["thGianThuHoach"].'" /> kg/ha</p>';
                            } else {
                                echo '<p class="c-title3">+ Thời gian từ khi đậu trái đến khi thu hoạch( ngày hay tháng): <input type = "text" class="w3-input" id="buoi_thoigianthuhoach" value = "" /></p>';
                            }

                            if (isset($data2["object"]["thuHoach"]["dacDiemThuHoach"])){
                                echo '<p class="c-title3">+ Đặc điểm nhận biết trái có thể thu hoạch được: <input type = "text" class="w3-input" id="buoi_dacdiemthuhoach" value = "'.$data2["object"]["thuHoach"]["dacDiemThuHoach"].'" /> </p>';
                            } else {
                                echo '<p class="c-title3">+ Đặc điểm nhận biết trái có thể thu hoạch được: <input type = "text" class="w3-input" id="buoi_dacdiemthuhoach" value = "" /></p>';
                            }
                            if (isset($data2["object"]["thuHoach"]["soLanThuHoach"])){
                                echo '<p class="c-title3">+ Số lần thu hoạch( lần): <input type = "text" class="w3-input" id="buoi_solanthuhoach" value = "'.$data2["object"]["thuHoach"]["soLanThuHoach"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Số lần thu hoạch( lần): <input type = "text" class="w3-input" id="buoi_solanthuhoach" value = "" /></p>';
                            }
                            if (isset($data2["object"]["thuHoach"]["nangSuatMuaThuan"])){
                                echo '<p class="c-title3">+ Năng suất( kg/cây/năm):</p>';
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="buoi_nsmuathuan" value = "'.$data2["object"]["thuHoach"]["nangSuatMuaThuan"].'" /></p>';
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="buoi_nsmuanghich" value = "'.$data2["object"]["thuHoach"]["nangSuatMuaNghich"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Năng suất( kg/cây/năm): </p>';
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="buoi_nsmuathuan" value = "" /></p>';
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="buoi_nsmuanghich" value = ""/></p>';
                            }

                            if (isset($data2["object"]["thuHoach"]["sanLuongMuaThuan"])){
                                echo '<p class="c-title3">+ Sản lượng( tấn/năm): </p>';
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="buoi_slmuathuan" value = "'.$data2["object"]["thuHoach"]["sanLuongMuaThuan"].'" /></p>';
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="buoi_slmuanghich" value = "'.$data2["object"]["thuHoach"]["sanLuongMuaNghich"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Sản lượng( tấn/năm): </p>';
                                echo '<p class="c-title3"> Mùa thuận: <input type = "text" class="w3-input" id="buoi_slmuathuan" value = "" /></p>';
                                echo '<p class="c-title3"> Mùa nghịch: <input type = "text" class="w3-input" id="buoi_slmuanghich" value = "" /></p>';
                            }
                            echo '<p class="c-title3">+ Giá bán( đồng/kg) theo từng loại theo từng tháng trong năm? </p>';
                            $gial1t1 = "";$gial1t2 = "";$gial1t3 = "";$gial1t4 = "";$gial1t5 = "";$gial1t6 = "";$gial1t7 = "";$gial1t8 = "";$gial1t9 = "";$gial1t10 = "";$gial1t11 = "";$gial1t12 = "";
                            $gial2t1 = "";$gial2t2 = "";$gial2t3 = "";$gial2t4 = "";$gial2t5 = "";$gial2t6 = "";$gial2t7 = "";$gial2t8 = "";$gial2t9 = "";$gial2t10 = "";$gial2t11 = "";$gial2t12 = "";
                            $gial3t1 = "";$gial3t2 = "";$gial3t3 = "";$gial3t4 = "";$gial3t5 = "";$gial3t6 = "";$gial3t7 = "";$gial3t8 = "";$gial3t9 = "";$gial3t10 = "";$gial3t11 = "";$gial3t12 = "";
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th01"])) {
                                $gial1t1 = $data2["object"]["thuHoach"]["giaBanLoai1Th01"];
                            } else {
                                $gial1t1 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th02"])) {
                                $gial1t2 = $data2["object"]["thuHoach"]["giaBanLoai1Th02"];
                            } else {
                                $gial1t2 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th03"])) {
                                $gial1t3 = $data2["object"]["thuHoach"]["giaBanLoai1Th03"];
                            } else {
                                $gial1t3 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th04"])) {
                                $gial1t4 = $data2["object"]["thuHoach"]["giaBanLoai1Th04"];
                            } else {
                                $gial1t4 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th05"])) {
                                $gial1t5 = $data2["object"]["thuHoach"]["giaBanLoai1Th05"];
                            } else {
                                $gial1t5 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th06"])) {
                                $gial1t6 = $data2["object"]["thuHoach"]["giaBanLoai1Th06"];
                            } else {
                                $gial1t6 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th07"])) {
                                $gial1t7 = $data2["object"]["thuHoach"]["giaBanLoai1Th07"];
                            } else {
                                $gial1t7 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th08"])) {
                                $gial1t8 = $data2["object"]["thuHoach"]["giaBanLoai1Th08"];
                            } else {
                                $gial1t8 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th09"])) {
                                $gial1t9 = $data2["object"]["thuHoach"]["giaBanLoai1Th09"];
                            } else {
                                $gial1t9 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th10"])) {
                                $gial1t10 = $data2["object"]["thuHoach"]["giaBanLoai1Th10"];
                            } else {
                                $gial1t10 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th11"])) {
                                $gial1t11 = $data2["object"]["thuHoach"]["giaBanLoai1Th11"];
                            } else {
                                $gial1t11 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai1Th12"])) {
                                $gial1t12 = $data2["object"]["thuHoach"]["giaBanLoai1Th12"];
                            } else {
                                $gial1t12 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th01"])) {
                                $gial2t1 = $data2["object"]["thuHoach"]["giaBanLoai2Th01"];
                            } else {
                                $gial2t1 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th02"])) {
                                $gial2t2 = $data2["object"]["thuHoach"]["giaBanLoai2Th02"];
                            } else {
                                $gial2t2 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th03"])) {
                                $gial2t3 = $data2["object"]["thuHoach"]["giaBanLoai2Th03"];
                            } else {
                                $gial2t3 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th04"])) {
                                $gial2t4 = $data2["object"]["thuHoach"]["giaBanLoai2Th04"];
                            } else {
                                $gial2t4 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th05"])) {
                                $gial2t5 = $data2["object"]["thuHoach"]["giaBanLoai2Th05"];
                            } else {
                                $gial2t5 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th06"])) {
                                $gial2t6 = $data2["object"]["thuHoach"]["giaBanLoai2Th06"];
                            } else {
                                $gial2t6 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th07"])) {
                                $gial2t7 = $data2["object"]["thuHoach"]["giaBanLoai2Th07"];
                            } else {
                                $gial2t7 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th08"])) {
                                $gial2t8 = $data2["object"]["thuHoach"]["giaBanLoai2Th08"];
                            } else {
                                $gial2t8 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th09"])) {
                                $gial2t9 = $data2["object"]["thuHoach"]["giaBanLoai2Th09"];
                            } else {
                                $gial2t9 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th10"])) {
                                $gial2t10 = $data2["object"]["thuHoach"]["giaBanLoai2Th10"];
                            } else {
                                $gial2t10 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th11"])) {
                                $gial2t11 = $data2["object"]["thuHoach"]["giaBanLoai2Th11"];
                            } else {
                                $gial2t11 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th12"])) {
                                $gial2t12 = $data2["object"]["thuHoach"]["giaBanLoai2Th12"];
                            } else {
                                $gial2t12 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th1"])) {
                                $gial3t1 = $data2["object"]["thuHoach"]["giaBanLoai3Th1"];
                            } else {
                                $gial3t1 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th2"])) {
                                $gial3t2 = $data2["object"]["thuHoach"]["giaBanLoai3Th2"];
                            } else {
                                $gial3t2 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th3"])) {
                                $gial3t3 = $data2["object"]["thuHoach"]["giaBanLoai3Th3"];
                            } else {
                                $gial3t3 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th4"])) {
                                $gial3t4 = $data2["object"]["thuHoach"]["giaBanLoai3Th4"];
                            } else {
                                $gial3t4 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th5"])) {
                                $gial3t5 = $data2["object"]["thuHoach"]["giaBanLoai3Th5"];
                            } else {
                                $gial3t5 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th6"])) {
                                $gial3t6 = $data2["object"]["thuHoach"]["giaBanLoai3Th6"];
                            } else {
                                $gial3t6 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th7"])) {
                                $gial3t7 = $data2["object"]["thuHoach"]["giaBanLoai3Th7"];
                            } else {
                                $gial3t7 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th8"])) {
                                $gial3t8 = $data2["object"]["thuHoach"]["giaBanLoai3Th8"];
                            } else {
                                $gial3t8 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai3Th9"])) {
                                $gial3t9 = $data2["object"]["thuHoach"]["giaBanLoai3Th9"];
                            } else {
                                $gial3t9 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th10"])) {
                                $gial3t10 = $data2["object"]["thuHoach"]["giaBanLoai2Th10"];
                            } else {
                                $gial3t10 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th11"])) {
                                $gial3t11 = $data2["object"]["thuHoach"]["giaBanLoai2Th11"];
                            } else {
                                $gial3t11 = '...';
                            }
                            if (isset($data2["object"]["thuHoach"]["giaBanLoai2Th12"])) {
                                $gial3t12 = $data2["object"]["thuHoach"]["giaBanLoai2Th12"];
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
                                    <td>Loại 1</td>
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
                                    <td>Loại 2</td>
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
                                    <td>Loại 3</td>
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
                            $thitruongtieuthu = "";
                            if (isset($data1["object"]["thiTruongTieuThu"]["thiTruongThieuThu"])){
                                $thitruongtieuthu = $data1["object"]["thiTruongTieuThu"]["thiTruongThieuThu"];
                            }
                            echo '<p class="c-title3">+ <label style="color:red;font-weight:bold;">(*)</label><select class="w3-select" id="buoi_thitruongtieuthu">
                                    <option selected>'.$thitruongtieuthu.'</option>
                                    <option>----------------------------</option>
                                    <option>Trong tỉnh</option>
                                    <option>Ngoài tỉnh</option>
                                    <option>Trong tỉnh; Ngoài tỉnh</option>
                                </select></p>';
                            if (isset($data2["object"]["thiTruongTieuThu"]["tinhNgoai"])){
                                echo '<p class="c-title3">+ Thị trường ngoài tỉnh( tỉnh, khu vực nào)? <input type = "text" class="w3-input" id="buoi_thitruongngoaitinh" value = "'.$data2["object"]["thiTruongTieuThu"]["tinhNgoai"].'" /></p>';
                            } else {
                                echo '<p class="c-title3">+ Thị trường ngoài tỉnh( tỉnh, khu vực nào)? <input type = "text" class="w3-input" id="buoi_thitruongngoaitinh" value = "" /></p>';
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
            /*
            $("#capnhatthongtinvungtrong").click(function(){
                alert("Cập nhật thông tin thành công 11");
            });
            */
            
            $("#capnhatthongtinvungtrong").click(function(){
                var sodienthoai = '0' + <?php echo $_GET['SODIENTHOAI'] ?>;
                var thongtinchung_dientich = $("#thongtinchung_dientich").val();
                var giongvacachxulygiong_tengiong = $("#giongvacachxulygiong_tengiong").val();
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
                } else if (phanbon_vusanxuat == "" || phanbon_vusanxuat == " ") {
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Vụ sản xuất đang trống","phanbon_vusanxuat");
                } else if (phanbon_donvibon == "" || phanbon_donvibon == " "){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Đơn vị bón đang trống","phanbon_donvibon");
                } else if (phanbon_thuchiencongviec == "" || phanbon_thuchiencongviec == " "){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Thực hiện công việc đang trống","phanbon_thuchiencongviec");
                } else if (phanbon_congcu == "" || phanbon_congcu == " "){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Công cụ, phương tiện đang trống","phanbon_congcu");
                } else if (thuocbvtv_phunthuockhi == "" || thuocbvtv_phunthuockhi == " "){
                    nofi_alert("Sử dụng thuốc BVTV -> Phun thuốc khi đang trống","thuocbvtv_phunthuockhi");
                } else if (thuocbvtv_thuchiencongviec == "" || thuocbvtv_thuchiencongviec == " "){
                    nofi_alert("Sử dụng thuốc BVTV -> Thực hiện công việc đang trống","thuocbvtv_thuchiencongviec");
                } else if (thuocbvtv_phuongtien == "" || thuocbvtv_phuongtien == " "){
                    nofi_alert("Sử dụng thuốc BVTV -> Công cụ, phương tiện đang trống","thuocbvtv_phuongtien");
                } else if (!checknumber_binary(thongtinchung_dientich)){
                    nofi_alert("Thông tin sản xuất -> Diện tích đất canh tác nhập sai định dạng","thongtinchung_dientich");
                } else if (!checknumber_binary(phanbon_tongphanbon)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Tổng số lần bón phân nhập sai định dạng","phanbon_tongphanbon");
                } else if (!checknumber_binary(phanbon_huuco_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân hữu cơ -> Bón lót nhập sai định dạng","phanbon_huuco_bonlot");
                } else if (!checknumber_binary(phanbon_huuco_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân hữu cơ -> Bón lần 1 nhập sai định dạng","phanbon_huuco_bonlan1");
                } else if (!checknumber_binary(phanbon_huuco_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân hữu cơ -> Bón lần 2 nhập sai định dạng","phanbon_huuco_bonlan2");
                } else if (!checknumber_binary(phanbon_huuco_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân hữu cơ -> Bón lần 3 nhập sai định dạng","phanbon_huuco_bonlan3");
                } else if (!checknumber_binary(phanbon_huuco_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân hữu cơ -> Bón lần 4 nhập sai định dạng","phanbon_huuco_bonlan4");
                } else if (!checknumber_binary(phanbon_huuco_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân hữu cơ -> Bón lần 5 nhập sai định dạng","phanbon_huuco_bonlan5");
                } else if (!checknumber_binary(phanbon_caitaodat_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân cải tạo đất -> Bón lót nhập sai định dạng","phanbon_caitaodat_bonlot");
                } else if (!checknumber_binary(phanbon_caitaodat_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân cải tạo đất -> Bón lần 1 nhập sai định dạng","phanbon_caitaodat_bonlan1");
                } else if (!checknumber_binary(phanbon_caitaodat_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân cải tạo đất -> Bón lần 2 nhập sai định dạng","phanbon_caitaodat_bonlan2");
                } else if (!checknumber_binary(phanbon_caitaodat_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân cải tạo đất -> Bón lần 3 nhập sai định dạng","phanbon_caitaodat_bonlan3");
                } else if (!checknumber_binary(phanbon_caitaodat_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân cải tạo đất -> Bón lần 4 nhập sai định dạng","phanbon_caitaodat_bonlan4");
                } else if (!checknumber_binary(phanbon_caitaodat_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân cải tạo đất -> Bón lần 5 nhập sai định dạng","phanbon_caitaodat_bonlan5");
                } else if (!checknumber_binary(phanbon_ure_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Urê -> Bón lót nhập sai định dạng","phanbon_huuco_bonlot");
                } else if (!checknumber_binary(phanbon_ure_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Urê -> Bón lần 1 nhập sai định dạng","phanbon_ure_bonlan1");
                } else if (!checknumber_binary(phanbon_ure_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Urê -> Bón lần 2 nhập sai định dạng","phanbon_ure_bonlan2");
                } else if (!checknumber_binary(phanbon_ure_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Urê -> Bón lần 3 nhập sai định dạng","phanbon_ure_bonlan3");
                } else if (!checknumber_binary(phanbon_ure_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Urê -> Bón lần 4 nhập sai định dạng","phanbon_ure_bonlan4");
                } else if (!checknumber_binary(phanbon_ure_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Urê -> Bón lần 5 nhập sai định dạng","phanbon_ure_bonlan5");
                } else if (!checknumber_binary(phanbon_lan_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân lân -> Bón lót nhập sai định dạng","phanbon_lan_bonlot");
                } else if (!checknumber_binary(phanbon_lan_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân lân -> Bón lần 1 nhập sai định dạng","phanbon_lan_bonlan1");
                } else if (!checknumber_binary(phanbon_lan_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân lân -> Bón lần 2 nhập sai định dạng","phanbon_lan_bonlan1");
                } else if (!checknumber_binary(phanbon_lan_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân lân -> Bón lần 3 nhập sai định dạng","phanbon_lan_bonlan1");
                } else if (!checknumber_binary(phanbon_lan_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân lân -> Bón lần 4 nhập sai định dạng","phanbon_lan_bonlan1");
                } else if (!checknumber_binary(phanbon_lan_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân lân -> Bón lần 5 nhập sai định dạng","phanbon_lan_bonlan1");
                } else if (!checknumber_binary(phanbon_kali_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Kali -> Bón lót nhập sai định dạng","phanbon_kali_bonlot");
                } else if (!checknumber_binary(phanbon_kali_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Kali -> Bón lần 1 nhập sai định dạng","phanbon_kali_bonlan1");
                } else if (!checknumber_binary(phanbon_kali_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Kali -> Bón lần 2 nhập sai định dạng","phanbon_kali_bonlan2");
                } else if (!checknumber_binary(phanbon_kali_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Kali -> Bón lần 3 nhập sai định dạng","phanbon_kali_bonlan3");
                } else if (!checknumber_binary(phanbon_kali_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Kali -> Bón lần 4 nhập sai định dạng","phanbon_kali_bonlan4");
                } else if (!checknumber_binary(phanbon_kali_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân Kali -> Bón lần 5 nhập sai định dạng","phanbon_kali_bonlan5");
                } else if (!checknumber_binary(phanbon_dap_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân DAP -> Bón lót nhập sai định dạng","phanbon_dap_bonlot");
                } else if (!checknumber_binary(phanbon_dap_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân DAP -> Bón lần 1 nhập sai định dạng","phanbon_dap_bonlan1");
                } else if (!checknumber_binary(phanbon_dap_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân DAP -> Bón lần 2 nhập sai định dạng","phanbon_dap_bonlan2");
                } else if (!checknumber_binary(phanbon_dap_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân DAP -> Bón lần 3 nhập sai định dạng","phanbon_dap_bonlan3");
                } else if (!checknumber_binary(phanbon_dap_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân DAP -> Bón lần 4 nhập sai định dạng","phanbon_dap_bonlan4");
                } else if (!checknumber_binary(phanbon_dap_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân DAP -> Bón lần 5 nhập sai định dạng","phanbon_dap_bonlan5");
                } else if (!checknumber_binary(phanbon_npk_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân NPK -> Bón lót nhập sai định dạng","phanbon_npk_bonlot");
                } else if (!checknumber_binary(phanbon_npk_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân NPK -> Bón lần 1 nhập sai định dạng","phanbon_npk_bonlan1");
                } else if (!checknumber_binary(phanbon_npk_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân NPK -> Bón lần 2 nhập sai định dạng","phanbon_npk_bonlan2");
                } else if (!checknumber_binary(phanbon_npk_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân NPK -> Bón lần 3 nhập sai định dạng","phanbon_npk_bonlan3");
                } else if (!checknumber_binary(phanbon_npk_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân NPK -> Bón lần 4 nhập sai định dạng","phanbon_npk_bonlan4");
                } else if (!checknumber_binary(phanbon_npk_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân NPK -> Bón lần 5 nhập sai định dạng","phanbon_npk_bonlan5");
                } else if (!checknumber_binary(phanbon_khac_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân khác -> Bón lót nhập sai định dạng","phanbon_khac_bonlot");
                } else if (!checknumber_binary(phanbon_khac_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân khác -> Bón lần 1 nhập sai định dạng","phanbon_khac_bonlan1");
                } else if (!checknumber_binary(phanbon_khac_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân khác -> Bón lần 2 nhập sai định dạng","phanbon_khac_bonlan2");
                } else if (!checknumber_binary(phanbon_khac_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân khác -> Bón lần 3 nhập sai định dạng","phanbon_khac_bonlan3");
                } else if (!checknumber_binary(phanbon_khac_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân khác -> Bón lần 4 nhập sai định dạng","phanbon_khac_bonlan4");
                } else if (!checknumber_binary(phanbon_khac_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân khác -> Bón lần 5 nhập sai định dạng","phanbon_khac_bonlan5");
                } else if (!checknumber_binary(phanbon_phanbonla_bonlot)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân bón lá -> Bón lót nhập sai định dạng","phanbon_phanbonla_bonlot");
                } else if (!checknumber_binary(phanbon_phanbonla_bonlan1)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân bón lá -> Bón lần 1 nhập sai định dạng","phanbon_phanbonla_bonlan1");
                } else if (!checknumber_binary(phanbon_phanbonla_bonlan2)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân bón lá -> Bón lần 2 nhập sai định dạng","phanbon_phanbonla_bonlan2");
                } else if (!checknumber_binary(phanbon_phanbonla_bonlan3)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân bón lá -> Bón lần 3 nhập sai định dạng","phanbon_phanbonla_bonlan3");
                } else if (!checknumber_binary(phanbon_phanbonla_bonlan4)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân bón lá -> Bón lần 4 nhập sai định dạng","phanbon_phanbonla_bonlan4");
                } else if (!checknumber_binary(phanbon_phanbonla_bonlan5)){
                    nofi_alert("Phân bón và kỹ thuật bón phân -> Phân bón lá -> Bón lần 5 nhập sai định dạng","phanbon_phanbonla_bonlan5");
                } else if (!checknumber_binary(thuocbvtv_solanphun_buouvang)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ ốc Bươu Vàng -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_buouvang");
                } else if (!checknumber_binary(thuocbvtv_soluong_buouvang)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ ốc Bươu Vàng -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_buouvang");
                } else if (!checknumber_binary(thuocbvtv_solanphun_truco)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ cỏ -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_truco");
                } else if (!checknumber_binary(thuocbvtv_soluong_truco)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ cỏ -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_truco");
                } else if (!checknumber_binary(thuocbvtv_solanphun_trusau)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ sâu -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_trusau");
                } else if (!checknumber_binary(thuocbvtv_soluong_trusau)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ sâu -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_trusau");
                } else if (!checknumber_binary(thuocbvtv_solanphun_truray)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ rầy -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_truray");
                } else if (!checknumber_binary(thuocbvtv_soluong_truray)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ rầy -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_truray");
                } else if (!checknumber_binary(thuocbvtv_solanphun_trubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ bệnh -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_trubenh");
                } else if (!checknumber_binary(thuocbvtv_soluong_trubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thuốc trừ bệnh -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_trubenh");
                } else if (!checknumber_binary(thuocbvtv_solanphun_trusautruray)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ sâu, trừ rầy) -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_trusautruray");
                } else if (!checknumber_binary(thuocbvtv_soluong_trusautruray)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ sâu, trừ rầy) -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_trusautruray");
                } else if (!checknumber_binary(thuocbvtv_solanphun_trusautrubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ sâu, trừ bệnh) -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_trusautrubenh");
                } else if (!checknumber_binary(thuocbvtv_soluong_trusautrubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ sâu, trừ bệnh) -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_trusautrubenh");
                } else if (!checknumber_binary(thuocbvtv_solanphun_truraytrubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ rầy, trừ bệnh) -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_truraytrubenh");
                } else if (!checknumber_binary(thuocbvtv_soluong_truraytrubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ rầy, trừ bệnh) -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_truraytrubenh");
                } else if (!checknumber_binary(thuocbvtv_solanphun_trusautruraytrubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ sâu, trừ rầy, trừ bệnh) -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_trusautruraytrubenh");
                } else if (!checknumber_binary(thuocbvtv_soluong_trusautruraytrubenh)){
                    nofi_alert("Sử dụng thuốc BVTV -> Phối hợp thuốc( trừ sâu, trừ rầy, trừ bệnh) -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_trusautruraytrubenh");
                } else if (!checknumber_binary(thuocbvtv_solanphun_lancuoi)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thời điểm sử dụng thuốc BVTV lần cuối -> Số lần phun nhập sai định dạng","thuocbvtv_solanphun_lancuoi");
                } else if (!checknumber_binary(thuocbvtv_soluong_lancuoi)){
                    nofi_alert("Sử dụng thuốc BVTV -> Thời điểm sử dụng thuốc BVTV lần cuối -> Số lượng phun nhập sai định dạng","thuocbvtv_soluong_lancuoi");
                } else if (!checknumber_binary(nangsuatbinhquan)){
                    nofi_alert("Thu hoạch -> Năng suất bình quân nhập sai định dạng","nangsuatbinhquan");
                } else {
                    $.ajax({
                        type: 'POST',
                        url: 'go',
                        data: {
                            for: "_suathongtinvungtrong_buoi",
                            sodienthoai: sodienthoai,
                            thongtinchung_dientich: thongtinchung_dientich,
                            giongvacachxulygiong_tengiong: giongvacachxulygiong_tengiong,
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


        /* comment tạm thời bỏ để test trước, nào hướng dẫn xong mở lại
            $("#capnhatthongtinvungtrong").click(function(){
                var sodienthoai = '0' + <?php echo $_GET['SODIENTHOAI'] ?>;
				var thongtinchung_dientich = $("#thongtinchung_dientich").val();
                var giongvacachxulygiong_tengiong = $("#giongvacachxulygiong_tengiong").val();
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
							thongtinchung_dientich: thongtinchung_dientich,
                            giongvacachxulygiong_tengiong: giongvacachxulygiong_tengiong,
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
            });*/
    </script>
</body>
</html>

