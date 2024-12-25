<?php
    session_start();
    include_once('controllers/AppController.php');
    include_once('controllers/QrCode.php');
    include_once('controllers/ApiController.php');

    if(isset($_GET['check'])) {
        $check_session = 0;
		if(!isset($_SESSION["sansang"])){
            $check_session = "";
        } else {
            if($_SESSION["sansang"] != "1"){
                $check_session = $_SESSION["sansang"];
            }
        }

        ob_start();

        switch ($_GET['check']) {
            case "_home":
                include("pages/index.php");
            break;
            case "_index":
                $trangthai = $check_session;
                include("pages/manage.php");
            break;
            case "_addthongtinvungtrong":
                include("pages/themvungtrong.php");
            break;
            case "_thongtinvungtrong":
                $IDVUNGTRONG = "";
                $LOAISANPHAM = "";
                $MADONVI = "";
                if (isset($_GET['ID'])) {
                    $IDVUNGTRONG = $_GET['ID'];
                    $LOAISANPHAM = $_GET['loaisanpham'];
                    $MADONVI = $_GET['madonvi'];
                } else {
                    $IDVUNGTRONG = "0";
                    $LOAISANPHAM = "0";
                    $MADONVI = "1";
                }
                $checkAPI = (new AppController())->FCheckCodeApi($IDVUNGTRONG);
                if ($checkAPI["result"] == 0){
                    $respone = (new AppController())->LoadContentPage($IDVUNGTRONG);
                    $dsnhatky = (new AppController())->LoadDSNhatky($IDVUNGTRONG);
                    $resnhatky1 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'1');
                    $resnhatky2 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'2');
                    $resnhatky3 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'3');
                    $resnhatky4 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'4');
                    $resnhatky5 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'5');
                    $resnhatky6 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'6');
                    $resnhatky7 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'7');
                    $resnhatky8 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'8');
                    $resnhatky9 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'9');
                    $resnhatky10 = (new AppController())->LoadThongtinNhatky($IDVUNGTRONG,'10');
                    include("pages/thongtinvungtrong_detail.php");
                } else {
                    $responeInfo = json_encode((new AppController())->FGetInFoID($IDVUNGTRONG));
                    $responeAPI = (new ApiController())->FGetInFoApiVfarmID($IDVUNGTRONG);
                    if ($LOAISANPHAM == "1") {
                        if ($MADONVI == "1") {
                            include("pages/thongtinvungtrong_APIVfarm.php");
                        } else {
                            include("pages/thongtinvungtrong_APIVfarm_v2.php");
                        }
                    } else if ($LOAISANPHAM == "2") {
                        include("pages/thongtinvungtrong_API_BUOI.php");
                    } else if ($LOAISANPHAM == "3") {
                        include("pages/thongtinvungtrong_API_TOM.php");
                    }
                }
                
            break;
            case "_capnhatthongtin":
                $madinhdanh = $_GET['madinhdanh'];
                $key = $_GET['key'];
                $SDT = $_GET['SODIENTHOAI'];
                $key_secret = "-999";
                if (isset($_SESSION["SECRET_KEY"])){
                    $key_secret = $_SESSION["SECRET_KEY"];
                }
                if ($key != $key_secret) {
                    include("pages/ferror.php");
                } else {
                    $SDT = "";
                    $LOAISANPHAM_EDIT = "";
                    $reponse_sdt = (new AppController())->FGetPhoneNumber($madinhdanh);
                    foreach ($reponse_sdt as $key) {
                        $SDT = $key["SODIENTHOAI"];
                        $LOAISANPHAM_EDIT = $key["LOAISANPHAM"];
                    }
                    $MAXACNHAN = $key_secret;
                    if ($SDT) {
                        $responeupdateInfo = json_encode((new AppController())->FUpdateInFoID($SDT, $madinhdanh));
                        $responeupdateAPI = (new ApiController())->FUpdateInFoApiVfarmID($SDT, $MAXACNHAN, $madinhdanh);
                        if ($LOAISANPHAM_EDIT == "1") {
                            include("pages/thongtinvungtrong_edit.php");
                        } else if ($LOAISANPHAM_EDIT == "2") {
                            include("pages/thongtinvungtrong_edit_buoi.php");
                        } else if ($LOAISANPHAM_EDIT == "3") {
                            include("pages/thongtinvungtrong_edit_tom.php");
                        }
                    } else {
                        include("pages/ferror.php");
                    }
                }
            break;
            case "_registerinfo":
                include("pages/check_page_edit.php");
            break;
            default:
                include("pages/ferror.php");
            break;
        }
        echo ob_get_clean();
    }

    if(isset($_POST['for'])) {
        switch ($_POST['for']) {
            case "check_captcha":
                if (isset($_POST['captcha'])){
                    if (strtolower($_SESSION['captcha']) != strtolower(trim($_POST['captcha']))){
                        echo json_encode(array("trangthai" => 'false', "cap" => $_SESSION['captcha']));
                    } else {
                        echo json_encode(array("trangthai" => 'true', "cap" => $_SESSION['captcha']));
                    }
                }
            break;
            case "_taomaqrcode":
                $ID = $_POST['mavungtrong'];
                $res = (new CreateQRCode())->CreateQRcodeVungTrong($ID);
                echo $res;
            break;
            case "_getinfoapivfarm":
                $ID = $_POST['mavungtrong'];
                $MADINHDANH = $_POST['madinhdanh'];
                $LOAISANPHAM = $_POST['loaisanpham'];
                $res = (new ApiController())->FGetInFoApiVfarm($ID, $MADINHDANH, $LOAISANPHAM);
                echo $res;
            break;
            case "_updateinfoapivfarm":
                $MADINHDANH = $_POST['madinhdanh'];
                $LOAISANPHAM = $_POST['loaisanpham'];
                $res = (new ApiController())->FUpdateApiVfarmID($MADINHDANH, $LOAISANPHAM);
                echo $res;
            break;
            case "_laythongtin":
                $sodienthoai = $_POST['sodienthoai'];
                $res = (new AppController())->FUpdateInFoID($sodienthoai,'');
                $current = DateTime::createFromFormat('U.u', number_format(microtime(true), 6, '.', ''));
                $date = $current->format("m-d-Y H:i:s.u");
                $headers = array('alg'=>'HS256','typ'=>'JWT');
                $payload = array('key1' => $date, 'key2' => "VNPTSTG");
                $headers_encoded = (new ApiController())->base64url_encode(json_encode($headers));
                $payload_encoded = (new ApiController())->base64url_encode(json_encode($payload));
                $secret = '0b7e367fb674d93b0681eeb663987782';
                $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
                $signature_encoded = (new ApiController())->base64url_encode($signature);
                $keyadd = (new ApiController())->generate_jwt($headers_encoded,$payload_encoded,$signature_encoded);
                echo json_encode(array("keytracuu" => $keyadd, "result" => $res));
            break;
            case "_suathongtinvungtrong":
                $sodienthoai = $_POST['sodienthoai'];
                $madinhdanh = $_POST['madinhdanh'];
                $thongtinchung_dientich = $_POST['thongtinchung_dientich'];
                $giongvacachxulygiong_tengiong = $_POST['giongvacachxulygiong_tengiong'];
                $thoivu_hethu = $_POST['thoivu_hethu'];
                $thoivu_thudong = $_POST['thoivu_thudong'];
                $thoivu_dongxuan =$_POST['thoivu_dongxuan'];
                $thoivu_xuanhe = $_POST['thoivu_xuanhe'];
                $phanbon_tongphanbon = $_POST['phanbon_tongphanbon'];
                $phanbon_vusanxuat = $_POST['phanbon_vusanxuat'];
                $phanbon_donvibon = $_POST['phanbon_donvibon'];
                $phanbon_thuchiencongviec = $_POST['phanbon_thuchiencongviec'];
                $phanbon_congcu = $_POST['phanbon_congcu'];
                $phanbon_huuco_bonlot = $_POST['phanbon_huuco_bonlot'];
                $phanbon_huuco_bonlan1 = $_POST['phanbon_huuco_bonlan1'];
                $phanbon_huuco_bonlan2 = $_POST['phanbon_huuco_bonlan2'];
                $phanbon_huuco_bonlan3 = $_POST['phanbon_huuco_bonlan3'];
                $phanbon_huuco_bonlan4 = $_POST['phanbon_huuco_bonlan4'];
                $phanbon_huuco_bonlan5 = $_POST['phanbon_huuco_bonlan5'];
                $phanbon_huuco_note = $_POST['phanbon_huuco_note'];
                $phanbon_caitaodat_bonlot = $_POST['phanbon_caitaodat_bonlot'];
                $phanbon_caitaodat_bonlan1 = $_POST['phanbon_caitaodat_bonlan1'];
                $phanbon_caitaodat_bonlan2 = $_POST['phanbon_caitaodat_bonlan2'];
                $phanbon_caitaodat_bonlan3 = $_POST['phanbon_caitaodat_bonlan3'];
                $phanbon_caitaodat_bonlan4 = $_POST['phanbon_caitaodat_bonlan4'];
                $phanbon_caitaodat_bonlan5 = $_POST['phanbon_caitaodat_bonlan5'];
                $phanbon_caitaodat_note = $_POST['phanbon_caitaodat_note'];
                $phanbon_ure_bonlot = $_POST['phanbon_ure_bonlot'];
                $phanbon_ure_bonlan1 = $_POST['phanbon_ure_bonlan1'];
                $phanbon_ure_bonlan2 = $_POST['phanbon_ure_bonlan2'];
                $phanbon_ure_bonlan3 = $_POST['phanbon_ure_bonlan3'];
                $phanbon_ure_bonlan4 = $_POST['phanbon_ure_bonlan4'];
                $phanbon_ure_bonlan5 = $_POST['phanbon_ure_bonlan5'];
                $phanbon_ure_note = $_POST['phanbon_ure_note'];
                $phanbon_lan_bonlot = $_POST['phanbon_lan_bonlot'];
                $phanbon_lan_bonlan1 = $_POST['phanbon_lan_bonlan1'];
                $phanbon_lan_bonlan2 = $_POST['phanbon_lan_bonlan2'];
                $phanbon_lan_bonlan3 = $_POST['phanbon_lan_bonlan3'];
                $phanbon_lan_bonlan4 = $_POST['phanbon_lan_bonlan4'];
                $phanbon_lan_bonlan5 = $_POST['phanbon_lan_bonlan5'];
                $phanbon_lan_note = $_POST['phanbon_lan_note'];
                $phanbon_kali_bonlot = $_POST['phanbon_kali_bonlot'];
                $phanbon_kali_bonlan1 = $_POST['phanbon_kali_bonlan1'];
                $phanbon_kali_bonlan2 = $_POST['phanbon_kali_bonlan2'];
                $phanbon_kali_bonlan3 = $_POST['phanbon_kali_bonlan3'];
                $phanbon_kali_bonlan4 = $_POST['phanbon_kali_bonlan4'];
                $phanbon_kali_bonlan5 = $_POST['phanbon_kali_bonlan5'];
                $phanbon_kali_note = $_POST['phanbon_kali_note'];
                $phanbon_dap_bonlot = $_POST['phanbon_dap_bonlot'];
                $phanbon_dap_bonlan1 = $_POST['phanbon_dap_bonlan1'];
                $phanbon_dap_bonlan2 = $_POST['phanbon_dap_bonlan2'];
                $phanbon_dap_bonlan3 = $_POST['phanbon_dap_bonlan3'];
                $phanbon_dap_bonlan4 = $_POST['phanbon_dap_bonlan4'];
                $phanbon_dap_bonlan5 = $_POST['phanbon_dap_bonlan5'];
                $phanbon_dap_note = $_POST['phanbon_dap_note'];
                $phanbon_npk_tenphan = $_POST['phanbon_npk_tenphan'];
                $phanbon_npk_bonlot = $_POST['phanbon_npk_bonlot'];
                $phanbon_npk_bonlan1 = $_POST['phanbon_npk_bonlan1'];
                $phanbon_npk_bonlan2 = $_POST['phanbon_npk_bonlan2'];
                $phanbon_npk_bonlan3 = $_POST['phanbon_npk_bonlan3'];
                $phanbon_npk_bonlan4 = $_POST['phanbon_npk_bonlan4'];
                $phanbon_npk_bonlan5 = $_POST['phanbon_npk_bonlan5'];
                $phanbon_npk_note = $_POST['phanbon_npk_note'];
                $phanbon_khac_tenphan = $_POST['phanbon_khac_tenphan'];
                $phanbon_khac_bonlot = $_POST['phanbon_khac_bonlot'];
                $phanbon_khac_bonlan1 = $_POST['phanbon_khac_bonlan1'];
                $phanbon_khac_bonlan2 = $_POST['phanbon_khac_bonlan2'];
                $phanbon_khac_bonlan3 = $_POST['phanbon_khac_bonlan3'];
                $phanbon_khac_bonlan4 = $_POST['phanbon_khac_bonlan4'];
                $phanbon_khac_bonlan5 = $_POST['phanbon_khac_bonlan5'];
                $phanbon_khac_note = $_POST['phanbon_khac_note'];
                $phanbon_phanbonla_tenphan = $_POST['phanbon_phanbonla_tenphan'];
                $phanbon_phanbonla_bonlot = $_POST['phanbon_phanbonla_bonlot'];
                $phanbon_phanbonla_bonlan1 = $_POST['phanbon_phanbonla_bonlan1'];
                $phanbon_phanbonla_bonlan2 = $_POST['phanbon_phanbonla_bonlan2'];
                $phanbon_phanbonla_bonlan3 = $_POST['phanbon_phanbonla_bonlan3'];
                $phanbon_phanbonla_bonlan4 = $_POST['phanbon_phanbonla_bonlan4'];
                $phanbon_phanbonla_bonlan5 = $_POST['phanbon_phanbonla_bonlan5'];
                $phanbon_phanbonla_note = $_POST['phanbon_phanbonla_note'];
                $thuocbvtv_solanphun_buouvang = $_POST['thuocbvtv_solanphun_buouvang'];
                $thuocbvtv_soluong_buouvang = $_POST['thuocbvtv_soluong_buouvang'];
                $thuocbvtv_solanphun_truco = $_POST['thuocbvtv_solanphun_truco'];
                $thuocbvtv_soluong_truco = $_POST['thuocbvtv_soluong_truco'];
                $thuocbvtv_solanphun_trusau = $_POST['thuocbvtv_solanphun_trusau'];
                $thuocbvtv_soluong_trusau = $_POST['thuocbvtv_soluong_trusau'];
                $thuocbvtv_solanphun_truray = $_POST['thuocbvtv_solanphun_truray'];
                $thuocbvtv_soluong_truray = $_POST['thuocbvtv_soluong_truray'];
                $thuocbvtv_solanphun_trubenh = $_POST['thuocbvtv_solanphun_trubenh'];
                $thuocbvtv_soluong_trubenh = $_POST['thuocbvtv_soluong_trubenh'];
                $thuocbvtv_solanphun_trusautruray = $_POST['thuocbvtv_solanphun_trusautruray'];
                $thuocbvtv_soluong_trusautruray = $_POST['thuocbvtv_soluong_trusautruray'];
                $thuocbvtv_solanphun_trusautrubenh = $_POST['thuocbvtv_solanphun_trusautrubenh'];
                $thuocbvtv_soluong_trusautrubenh = $_POST['thuocbvtv_soluong_trusautrubenh'];
                $thuocbvtv_solanphun_truraytrubenh = $_POST['thuocbvtv_solanphun_truraytrubenh'];
                $thuocbvtv_soluong_truraytrubenh = $_POST['thuocbvtv_soluong_truraytrubenh'];
                $thuocbvtv_solanphun_trusautruraytrubenh = $_POST['thuocbvtv_solanphun_trusautruraytrubenh'];
                $thuocbvtv_soluong_trusautruraytrubenh = $_POST['thuocbvtv_soluong_trusautruraytrubenh'];
                $thuocbvtv_solanphun_lancuoi = $_POST['thuocbvtv_solanphun_lancuoi'];
                $thuocbvtv_soluong_lancuoi = $_POST['thuocbvtv_soluong_lancuoi'];
                $thuocbvtv_phundinhky = $_POST['thuocbvtv_phundinhky'];
                $thuocbvtv_phundinhky_thoigianphun = $_POST['thuocbvtv_phundinhky_thoigianphun'];
                $thuocbvtv_phundinhky_lydophun = $_POST['thuocbvtv_phundinhky_lydophun'];
                $thuocbvtv_phunthoidiem_lan1 = $_POST['thuocbvtv_phunthoidiem_lan1'];
                $thuocbvtv_phunthoidiem_lan2 = $_POST['thuocbvtv_phunthoidiem_lan2'];
                $thuocbvtv_phunthoidiem_lan3 = $_POST['thuocbvtv_phunthoidiem_lan3'];
                $thuocbvtv_phunthoidiem_lan4 = $_POST['thuocbvtv_phunthoidiem_lan4'];
                $thuocbvtv_phunthoidiem_lan5 = $_POST['thuocbvtv_phunthoidiem_lan5'];
                $thuocbvtv_phunthoidiem_lan6 = $_POST['thuocbvtv_phunthoidiem_lan6'];
                $thuocbvtv_phunthoidiem_lan7 = $_POST['thuocbvtv_phunthoidiem_lan7'];
                $thuocbvtv_phunthoidiem_lan8 = $_POST['thuocbvtv_phunthoidiem_lan8'];
                $thuocbvtv_phunthoidiem_lan9 = $_POST['thuocbvtv_phunthoidiem_lan9'];
                $thuocbvtv_phunthoidiem_lan10 = $_POST['thuocbvtv_phunthoidiem_lan10'];
                $thuocbvtv_phunthoidiem_lydophun = $_POST['thuocbvtv_phunthoidiem_lydophun'];
                $thuocbvtv_phunthuockhi = $_POST['thuocbvtv_phunthuockhi'];
                $thuocbvtv_thuchiencongviec = $_POST['thuocbvtv_thuchiencongviec'];
                $thuocbvtv_phuongtien = $_POST['thuocbvtv_phuongtien'];
                $thuhoach_hethu = $_POST['thuhoach_hethu'];
                $thuhoach_thudong = $_POST['thuhoach_thudong'];
                $thuhoach_dongxuan = $_POST['thuhoach_dongxuan'];
                $thuhoach_xuanhe = $_POST['thuhoach_xuanhe'];
                $nangsuatbinhquan = $_POST['nangsuatbinhquan'];
                $key = $_POST['key'];
                $res = (new ApiController())->FUpdateApiVfarmID($sodienthoai, $madinhdanh, $thongtinchung_dientich, $giongvacachxulygiong_tengiong, $thoivu_hethu, $thoivu_thudong, $thoivu_dongxuan, $thoivu_xuanhe, $phanbon_tongphanbon, $phanbon_vusanxuat, $phanbon_donvibon, $phanbon_thuchiencongviec, $phanbon_congcu, $phanbon_huuco_bonlot, 
                    $phanbon_huuco_bonlan1, $phanbon_huuco_bonlan2, $phanbon_huuco_bonlan3, $phanbon_huuco_bonlan4, $phanbon_huuco_bonlan5, $phanbon_huuco_note, $phanbon_caitaodat_bonlot, $phanbon_caitaodat_bonlan1, $phanbon_caitaodat_bonlan2, $phanbon_caitaodat_bonlan3, 
                    $phanbon_caitaodat_bonlan4, $phanbon_caitaodat_bonlan5, $phanbon_caitaodat_note, $phanbon_ure_bonlot, $phanbon_ure_bonlan1, $phanbon_ure_bonlan2, $phanbon_ure_bonlan3, $phanbon_ure_bonlan4, 
                    $phanbon_ure_bonlan5, $phanbon_ure_note, $phanbon_lan_bonlot, $phanbon_lan_bonlan1, $phanbon_lan_bonlan2, $phanbon_lan_bonlan3, $phanbon_lan_bonlan4, $phanbon_lan_bonlan5, $phanbon_lan_note, $phanbon_kali_bonlot, 
                    $phanbon_kali_bonlan1, $phanbon_kali_bonlan2, $phanbon_kali_bonlan3, $phanbon_kali_bonlan4, $phanbon_kali_bonlan5, $phanbon_kali_note, $phanbon_dap_bonlot, $phanbon_dap_bonlan1, $phanbon_dap_bonlan2, $phanbon_dap_bonlan3, 
                    $phanbon_dap_bonlan4, $phanbon_dap_bonlan5, $phanbon_dap_note, $phanbon_npk_tenphan, $phanbon_npk_bonlot, $phanbon_npk_bonlan1, $phanbon_npk_bonlan2, $phanbon_npk_bonlan3, $phanbon_npk_bonlan4, $phanbon_npk_bonlan5, 
                    $phanbon_npk_note, $phanbon_khac_tenphan, $phanbon_khac_bonlot, $phanbon_khac_bonlan1, $phanbon_khac_bonlan2, $phanbon_khac_bonlan3, $phanbon_khac_bonlan4, $phanbon_khac_bonlan5, $phanbon_khac_note, $phanbon_phanbonla_tenphan, 
                    $phanbon_phanbonla_bonlot, $phanbon_phanbonla_bonlan1, $phanbon_phanbonla_bonlan2, $phanbon_phanbonla_bonlan3, $phanbon_phanbonla_bonlan4, $phanbon_phanbonla_bonlan5, $phanbon_phanbonla_note, $thuocbvtv_solanphun_buouvang, $thuocbvtv_soluong_buouvang, $thuocbvtv_solanphun_truco, 
                    $thuocbvtv_soluong_truco, $thuocbvtv_solanphun_trusau, $thuocbvtv_soluong_trusau, $thuocbvtv_solanphun_truray, $thuocbvtv_soluong_truray, $thuocbvtv_solanphun_trubenh, $thuocbvtv_soluong_trubenh, $thuocbvtv_solanphun_trusautruray, $thuocbvtv_soluong_trusautruray, $thuocbvtv_solanphun_trusautrubenh, 
                    $thuocbvtv_soluong_trusautrubenh, $thuocbvtv_solanphun_truraytrubenh, $thuocbvtv_soluong_truraytrubenh, $thuocbvtv_solanphun_trusautruraytrubenh, $thuocbvtv_soluong_trusautruraytrubenh, $thuocbvtv_solanphun_lancuoi, $thuocbvtv_soluong_lancuoi, $thuocbvtv_phundinhky, $thuocbvtv_phundinhky_thoigianphun, $thuocbvtv_phundinhky_lydophun, 
                    $thuocbvtv_phunthoidiem_lan1, $thuocbvtv_phunthoidiem_lan2, $thuocbvtv_phunthoidiem_lan3, $thuocbvtv_phunthoidiem_lan4, $thuocbvtv_phunthoidiem_lan5, $thuocbvtv_phunthoidiem_lan6, $thuocbvtv_phunthoidiem_lan7, $thuocbvtv_phunthoidiem_lan8, $thuocbvtv_phunthoidiem_lan9, $thuocbvtv_phunthoidiem_lan10, 
                    $thuocbvtv_phunthoidiem_lydophun, $thuocbvtv_phunthuockhi, $thuocbvtv_thuchiencongviec, $thuocbvtv_phuongtien, $thuhoach_hethu, $thuhoach_thudong, $thuhoach_dongxuan, $thuhoach_xuanhe, $nangsuatbinhquan, $key
                );
                echo $res;
            break;
            case "_suathongtinvungtrong_buoi":
                $sodienthoai = $_POST['sodienthoai'];
                $madinhdanh = $_POST['madinhdanh'];
                $buoi_thongtinsp = $_POST['buoi_thongtinsp'];
                $thongtinchung_dientich = $_POST['thongtinchung_dientich'];
                $buoi_gionggannhat = $_POST['buoi_gionggannhat'];
                $buoi_nguongocgiong = $_POST['buoi_nguongocgiong'];
                $buoi_giayxacnhangiong = $_POST['buoi_giayxacnhangiong'];
                $buoi_xulycaygiong = $_POST['buoi_xulycaygiong'];
                $buoi_chephamxuly = $_POST['buoi_chephamxuly'];
                $buoi_mucdichxuly = $_POST['buoi_mucdichxuly'];
                $buoi_matdocaytrong = $_POST['buoi_matdocaytrong'];
                $buoi_khoangcachtrong = $_POST['buoi_khoangcachtrong'];
                $buoi_bodebobao = $_POST['buoi_bodebobao'];
                $buoi_chieucaobobao = $_POST['buoi_chieucaobobao'];
                $buoi_chieurongbobao = $_POST['buoi_chieurongbobao'];
                $buoi_slongbong = $_POST['buoi_slongbong'];
                $buoi_duongkinhongbong = $_POST['buoi_duongkinhongbong'];
                $buoi_cachdatongbong = $_POST['buoi_cachdatongbong'];
                $buoi_quanlycodai = $_POST['buoi_quanlycodai'];
                $buoi_phanbon_thoiky1 = $_POST['buoi_phanbon_thoiky1'];
                $buoi_phanbon_thoidiem1 = $_POST['buoi_phanbon_thoidiem1'];
                $buoi_phanbon_loaiphan1 = $_POST['buoi_phanbon_loaiphan1'];
                $buoi_phanbon_lieuluong1 = $_POST['buoi_phanbon_lieuluong1'];
                $buoi_phanbon_cachbon1 = $_POST['buoi_phanbon_cachbon1'];
                $buoi_phanbon_thoigiantuoi1 = $_POST['buoi_phanbon_thoigiantuoi1'];
                $buoi_phanbon_thoiky2 = $_POST['buoi_phanbon_thoiky2'];
                $buoi_phanbon_thoidiem2 = $_POST['buoi_phanbon_thoidiem2'];
                $buoi_phanbon_loaiphan2 = $_POST['buoi_phanbon_loaiphan2'];
                $buoi_phanbon_lieuluong2 = $_POST['buoi_phanbon_lieuluong2'];
                $buoi_phanbon_cachbon2 = $_POST['buoi_phanbon_cachbon2'];
                $buoi_phanbon_thoigiantuoi2 = $_POST['buoi_phanbon_thoigiantuoi2'];
                $buoi_phanbon_thoiky3 = $_POST['buoi_phanbon_thoiky3'];
                $buoi_phanbon_thoidiem3 = $_POST['buoi_phanbon_thoidiem3'];
                $buoi_phanbon_loaiphan3 = $_POST['buoi_phanbon_loaiphan3'];
                $buoi_phanbon_lieuluong3 = $_POST['buoi_phanbon_lieuluong3'];
                $buoi_phanbon_cachbon3 = $_POST['buoi_phanbon_cachbon3'];
                $buoi_phanbon_thoigiantuoi3 = $_POST['buoi_phanbon_thoigiantuoi3'];
                $buoi_phanbon_thoiky4 = $_POST['buoi_phanbon_thoiky4'];
                $buoi_phanbon_thoidiem4 = $_POST['buoi_phanbon_thoidiem4'];
                $buoi_phanbon_loaiphan4 = $_POST['buoi_phanbon_loaiphan4'];
                $buoi_phanbon_lieuluong4 = $_POST['buoi_phanbon_lieuluong4'];
                $buoi_phanbon_cachbon4 = $_POST['buoi_phanbon_cachbon4'];
                $buoi_phanbon_thoigiantuoi4 = $_POST['buoi_phanbon_thoigiantuoi4'];
                $buoi_phanbon_thoiky5 = $_POST['buoi_phanbon_thoiky5'];
                $buoi_phanbon_thoidiem5 = $_POST['buoi_phanbon_thoidiem5'];
                $buoi_phanbon_loaiphan5 = $_POST['buoi_phanbon_loaiphan5'];
                $buoi_phanbon_lieuluong5 = $_POST['buoi_phanbon_lieuluong5'];
                $buoi_phanbon_cachbon5 = $_POST['buoi_phanbon_cachbon5'];
                $buoi_phanbon_thoigiantuoi5 = $_POST['buoi_phanbon_thoigiantuoi5'];
                $buoi_phanbon_thoiky6 = $_POST['buoi_phanbon_thoiky6'];
                $buoi_phanbon_thoidiem6 = $_POST['buoi_phanbon_thoidiem6'];
                $buoi_phanbon_loaiphan6 = $_POST['buoi_phanbon_loaiphan6'];
                $buoi_phanbon_lieuluong6 = $_POST['buoi_phanbon_lieuluong6'];
                $buoi_phanbon_cachbon6 = $_POST['buoi_phanbon_cachbon6'];
                $buoi_phanbon_thoigiantuoi6 = $_POST['buoi_phanbon_thoigiantuoi6'];
                $buoi_phanbon_thoiky7 = $_POST['buoi_phanbon_thoiky7'];
                $buoi_phanbon_thoidiem7 = $_POST['buoi_phanbon_thoidiem7'];
                $buoi_phanbon_loaiphan7 = $_POST['buoi_phanbon_loaiphan7'];
                $buoi_phanbon_lieuluong7 = $_POST['buoi_phanbon_lieuluong7'];
                $buoi_phanbon_cachbon7 = $_POST['buoi_phanbon_cachbon7'];
                $buoi_phanbon_thoigiantuoi7 = $_POST['buoi_phanbon_thoigiantuoi7'];
                $buoi_phanbon_thoiky8 = $_POST['buoi_phanbon_thoiky8'];
                $buoi_phanbon_thoidiem8 = $_POST['buoi_phanbon_thoidiem8'];
                $buoi_phanbon_loaiphan8 = $_POST['buoi_phanbon_loaiphan8'];
                $buoi_phanbon_lieuluong8 = $_POST['buoi_phanbon_lieuluong8'];
                $buoi_phanbon_cachbon8 = $_POST['buoi_phanbon_cachbon8'];
                $buoi_phanbon_thoigiantuoi8 = $_POST['buoi_phanbon_thoigiantuoi8'];
                $buoi_bvtv_thoiky1 = $_POST['buoi_bvtv_thoiky1'];
                $buoi_bvtv_thoidiem1 = $_POST['buoi_bvtv_thoidiem1'];
                $buoi_bvtv_loaisau1 = $_POST['buoi_bvtv_loaisau1'];
                $buoi_bvtv_loaithuoc1 = $_POST['buoi_bvtv_loaithuoc1'];
                $buoi_bvtv_lieuluong1 = $_POST['buoi_bvtv_lieuluong1'];
                $buoi_bvtv_hieuqua1 = $_POST['buoi_bvtv_hieuqua1'];
                $buoi_bvtv_thoiky2 = $_POST['buoi_bvtv_thoiky2'];
                $buoi_bvtv_thoidiem2 = $_POST['buoi_bvtv_thoidiem2'];
                $buoi_bvtv_loaisau2 = $_POST['buoi_bvtv_loaisau2'];
                $buoi_bvtv_loaithuoc2 = $_POST['buoi_bvtv_loaithuoc2'];
                $buoi_bvtv_lieuluong2 = $_POST['buoi_bvtv_lieuluong2'];
                $buoi_bvtv_hieuqua2 = $_POST['buoi_bvtv_hieuqua2'];
                $buoi_bvtv_thoiky3 = $_POST['buoi_bvtv_thoiky3'];
                $buoi_bvtv_thoidiem3 = $_POST['buoi_bvtv_thoidiem3'];
                $buoi_bvtv_loaisau3 = $_POST['buoi_bvtv_loaisau3'];
                $buoi_bvtv_loaithuoc3 = $_POST['buoi_bvtv_loaithuoc3'];
                $buoi_bvtv_lieuluong3 = $_POST['buoi_bvtv_lieuluong3'];
                $buoi_bvtv_hieuqua3 = $_POST['buoi_bvtv_hieuqua3'];
                $buoi_bvtv_thoiky4 = $_POST['buoi_bvtv_thoiky4'];
                $buoi_bvtv_thoidiem4 = $_POST['buoi_bvtv_thoidiem4'];
                $buoi_bvtv_loaisau4 = $_POST['buoi_bvtv_loaisau4'];
                $buoi_bvtv_loaithuoc4 = $_POST['buoi_bvtv_loaithuoc4'];
                $buoi_bvtv_lieuluong4 = $_POST['buoi_bvtv_lieuluong4'];
                $buoi_bvtv_hieuqua4 = $_POST['buoi_bvtv_hieuqua4'];
                $buoi_bvtv_thoiky5 = $_POST['buoi_bvtv_thoiky5'];
                $buoi_bvtv_thoidiem5 = $_POST['buoi_bvtv_thoidiem5'];
                $buoi_bvtv_loaisau5 = $_POST['buoi_bvtv_loaisau5'];
                $buoi_bvtv_loaithuoc5 = $_POST['buoi_bvtv_loaithuoc5'];
                $buoi_bvtv_lieuluong5 = $_POST['buoi_bvtv_lieuluong5'];
                $buoi_bvtv_hieuqua5 = $_POST['buoi_bvtv_hieuqua5'];
                $buoi_bvtv_thoiky6 = $_POST['buoi_bvtv_thoiky6'];
                $buoi_bvtv_thoidiem6 = $_POST['buoi_bvtv_thoidiem6'];
                $buoi_bvtv_loaisau6 = $_POST['buoi_bvtv_loaisau6'];
                $buoi_bvtv_loaithuoc6 = $_POST['buoi_bvtv_loaithuoc6'];
                $buoi_bvtv_lieuluong6 = $_POST['buoi_bvtv_lieuluong6'];
                $buoi_bvtv_hieuqua6 = $_POST['buoi_bvtv_hieuqua6'];
                $buoi_bvtv_thoiky7 = $_POST['buoi_bvtv_thoiky7'];
                $buoi_bvtv_thoidiem7 = $_POST['buoi_bvtv_thoidiem7'];
                $buoi_bvtv_loaisau7 = $_POST['buoi_bvtv_loaisau7'];
                $buoi_bvtv_loaithuoc7 = $_POST['buoi_bvtv_loaithuoc7'];
                $buoi_bvtv_lieuluong7 = $_POST['buoi_bvtv_lieuluong7'];
                $buoi_bvtv_hieuqua7 = $_POST['buoi_bvtv_hieuqua7'];
                $buoi_bvtv_thoiky8 = $_POST['buoi_bvtv_thoiky8'];
                $buoi_bvtv_thoidiem8 = $_POST['buoi_bvtv_thoidiem8'];
                $buoi_bvtv_loaisau8 = $_POST['buoi_bvtv_loaisau8'];
                $buoi_bvtv_loaithuoc8 = $_POST['buoi_bvtv_loaithuoc8'];
                $buoi_bvtv_lieuluong8 = $_POST['buoi_bvtv_lieuluong8'];
                $buoi_bvtv_hieuqua8 = $_POST['buoi_bvtv_hieuqua8'];
                $buoi_thoigianthuhoach = $_POST['buoi_thoigianthuhoach'];
                $buoi_dacdiemthuhoach = $_POST['buoi_dacdiemthuhoach'];
                $buoi_solanthuhoach = $_POST['buoi_solanthuhoach'];
                $buoi_nsmuathuan = $_POST['buoi_nsmuathuan'];
                $buoi_nsmuanghich = $_POST['buoi_nsmuanghich'];
                $buoi_slmuathuan = $_POST['buoi_slmuathuan'];
                $buoi_slmuanghich = $_POST['buoi_slmuanghich'];
                $buoi_dongia_l1t1 = $_POST['buoi_dongia_l1t1'];
                $buoi_dongia_l1t2 = $_POST['buoi_dongia_l1t2'];
                $buoi_dongia_l1t3 = $_POST['buoi_dongia_l1t3'];
                $buoi_dongia_l1t4 = $_POST['buoi_dongia_l1t4'];
                $buoi_dongia_l1t5 = $_POST['buoi_dongia_l1t5'];
                $buoi_dongia_l1t6 = $_POST['buoi_dongia_l1t6'];
                $buoi_dongia_l1t7 = $_POST['buoi_dongia_l1t7'];
                $buoi_dongia_l1t8 = $_POST['buoi_dongia_l1t8'];
                $buoi_dongia_l1t9 = $_POST['buoi_dongia_l1t9'];
                $buoi_dongia_l1t10 = $_POST['buoi_dongia_l1t10'];
                $buoi_dongia_l1t11 = $_POST['buoi_dongia_l1t11'];
                $buoi_dongia_l1t12 = $_POST['buoi_dongia_l1t12'];
                $buoi_dongia_l2t1 = $_POST['buoi_dongia_l2t1'];
                $buoi_dongia_l2t2 = $_POST['buoi_dongia_l2t2'];
                $buoi_dongia_l2t3 = $_POST['buoi_dongia_l2t3'];
                $buoi_dongia_l2t4 = $_POST['buoi_dongia_l2t4'];
                $buoi_dongia_l2t5 = $_POST['buoi_dongia_l2t5'];
                $buoi_dongia_l2t6 = $_POST['buoi_dongia_l2t6'];
                $buoi_dongia_l2t7 = $_POST['buoi_dongia_l2t7'];
                $buoi_dongia_l2t8 = $_POST['buoi_dongia_l2t8'];
                $buoi_dongia_l2t9 = $_POST['buoi_dongia_l2t9'];
                $buoi_dongia_l2t10 = $_POST['buoi_dongia_l2t10'];
                $buoi_dongia_l2t11 = $_POST['buoi_dongia_l2t11'];
                $buoi_dongia_l2t12 = $_POST['buoi_dongia_l2t12'];
                $buoi_dongia_l3t1 = $_POST['buoi_dongia_l3t1'];
                $buoi_dongia_l3t2 = $_POST['buoi_dongia_l3t2'];
                $buoi_dongia_l3t3 = $_POST['buoi_dongia_l3t3'];
                $buoi_dongia_l3t4 = $_POST['buoi_dongia_l3t4'];
                $buoi_dongia_l3t5 = $_POST['buoi_dongia_l3t5'];
                $buoi_dongia_l3t6 = $_POST['buoi_dongia_l3t6'];
                $buoi_dongia_l3t7 = $_POST['buoi_dongia_l3t7'];
                $buoi_dongia_l3t8 = $_POST['buoi_dongia_l3t8'];
                $buoi_dongia_l3t9 = $_POST['buoi_dongia_l3t9'];
                $buoi_dongia_l3t10 = $_POST['buoi_dongia_l3t10'];
                $buoi_dongia_l3t11 = $_POST['buoi_dongia_l3t11'];
                $buoi_dongia_l3t12 = $_POST['buoi_dongia_l3t12'];
                $buoi_thitruongtieuthu = $_POST['buoi_thitruongtieuthu'];
                $buoi_thitruongngoaitinh = $_POST['buoi_thitruongngoaitinh'];
                $key = $_POST['key'];
                $res = (new ApiController())->FUpdateBuoiApiVfarmID($sodienthoai, $madinhdanh, $buoi_thongtinsp,
$thongtinchung_dientich,$buoi_gionggannhat,$buoi_nguongocgiong,$buoi_giayxacnhangiong,
$buoi_xulycaygiong,$buoi_chephamxuly,$buoi_mucdichxuly,$buoi_matdocaytrong,
$buoi_khoangcachtrong,$buoi_bodebobao,$buoi_chieucaobobao,
$buoi_chieurongbobao,$buoi_slongbong,$buoi_duongkinhongbong,
$buoi_cachdatongbong,$buoi_quanlycodai,$buoi_phanbon_thoiky1,
$buoi_phanbon_thoidiem1,$buoi_phanbon_loaiphan1,
$buoi_phanbon_lieuluong1,$buoi_phanbon_cachbon1,
$buoi_phanbon_thoigiantuoi1,$buoi_phanbon_thoiky2,
$buoi_phanbon_thoidiem2,$buoi_phanbon_loaiphan2 ,
$buoi_phanbon_lieuluong2,$buoi_phanbon_cachbon2 ,
$buoi_phanbon_thoigiantuoi2 ,$buoi_phanbon_thoiky3 ,
$buoi_phanbon_thoidiem3 ,$buoi_phanbon_loaiphan3 ,
$buoi_phanbon_lieuluong3 ,$buoi_phanbon_cachbon3 ,
$buoi_phanbon_thoigiantuoi3 ,$buoi_phanbon_thoiky4 ,
$buoi_phanbon_thoidiem4 ,$buoi_phanbon_loaiphan4 ,
$buoi_phanbon_lieuluong4 ,$buoi_phanbon_cachbon4 ,
$buoi_phanbon_thoigiantuoi4,$buoi_phanbon_thoiky5 ,
$buoi_phanbon_thoidiem5 ,$buoi_phanbon_loaiphan5 ,
$buoi_phanbon_lieuluong5,$buoi_phanbon_cachbon5 ,
$buoi_phanbon_thoigiantuoi5 ,$buoi_phanbon_thoiky6,
$buoi_phanbon_thoidiem6,$buoi_phanbon_loaiphan6,
$buoi_phanbon_lieuluong6,$buoi_phanbon_cachbon6 ,
$buoi_phanbon_thoigiantuoi6 ,$buoi_phanbon_thoiky7,
$buoi_phanbon_thoidiem7 ,$buoi_phanbon_loaiphan7,
$buoi_phanbon_lieuluong7,$buoi_phanbon_cachbon7,
$buoi_phanbon_thoigiantuoi7,$buoi_phanbon_thoiky8,
$buoi_phanbon_thoidiem8,$buoi_phanbon_loaiphan8,
$buoi_phanbon_lieuluong8 ,$buoi_phanbon_cachbon8 ,
$buoi_phanbon_thoigiantuoi8,$buoi_bvtv_thoiky1,
$buoi_bvtv_thoidiem1,$buoi_bvtv_loaisau1,
$buoi_bvtv_loaithuoc1,$buoi_bvtv_lieuluong1,
$buoi_bvtv_hieuqua1,$buoi_bvtv_thoiky2,
$buoi_bvtv_thoidiem2,$buoi_bvtv_loaisau2,
$buoi_bvtv_loaithuoc2,$buoi_bvtv_lieuluong2,
$buoi_bvtv_hieuqua2,$buoi_bvtv_thoiky3,
$buoi_bvtv_thoidiem3,$buoi_bvtv_loaisau3,
$buoi_bvtv_loaithuoc3,$buoi_bvtv_lieuluong3,
$buoi_bvtv_hieuqua3,$buoi_bvtv_thoiky4,
$buoi_bvtv_thoidiem4,$buoi_bvtv_loaisau4 ,
$buoi_bvtv_loaithuoc4,$buoi_bvtv_lieuluong4,
$buoi_bvtv_hieuqua4,$buoi_bvtv_thoiky5,
$buoi_bvtv_thoidiem5,$buoi_bvtv_loaisau5,
$buoi_bvtv_loaithuoc5,$buoi_bvtv_lieuluong5,
$buoi_bvtv_hieuqua5,$buoi_bvtv_thoiky6,
$buoi_bvtv_thoidiem6,$buoi_bvtv_loaisau6,
$buoi_bvtv_loaithuoc6,$buoi_bvtv_lieuluong6,
$buoi_bvtv_hieuqua6,$buoi_bvtv_thoiky7,
$buoi_bvtv_thoidiem7,$buoi_bvtv_loaisau7,
$buoi_bvtv_loaithuoc7,$buoi_bvtv_lieuluong7,
$buoi_bvtv_hieuqua7,$buoi_bvtv_thoiky8,
$buoi_bvtv_thoidiem8,$buoi_bvtv_loaisau8,
$buoi_bvtv_loaithuoc8,$buoi_bvtv_lieuluong8,
$buoi_bvtv_hieuqua8, $buoi_thoigianthuhoach,
$buoi_dacdiemthuhoach,
$buoi_solanthuhoach,
$buoi_nsmuathuan,
$buoi_nsmuanghich,
$buoi_slmuathuan,
$buoi_slmuanghich,
$buoi_dongia_l1t1,
$buoi_dongia_l1t2,
$buoi_dongia_l1t3,
$buoi_dongia_l1t4,
$buoi_dongia_l1t5,
$buoi_dongia_l1t6,
$buoi_dongia_l1t7,
$buoi_dongia_l1t8,
$buoi_dongia_l1t9,
$buoi_dongia_l1t10,
$buoi_dongia_l1t11,
$buoi_dongia_l1t12,
$buoi_dongia_l2t1,
$buoi_dongia_l2t2,
$buoi_dongia_l2t3,
$buoi_dongia_l2t4,
$buoi_dongia_l2t5,
$buoi_dongia_l2t6,
$buoi_dongia_l2t7,
$buoi_dongia_l2t8,
$buoi_dongia_l2t9,
$buoi_dongia_l2t10,
$buoi_dongia_l2t11,
$buoi_dongia_l2t12,
$buoi_dongia_l3t1,
$buoi_dongia_l3t2,
$buoi_dongia_l3t3,
$buoi_dongia_l3t4,
$buoi_dongia_l3t5,
$buoi_dongia_l3t6,
$buoi_dongia_l3t7,
$buoi_dongia_l3t8,
$buoi_dongia_l3t9,
$buoi_dongia_l3t10,
$buoi_dongia_l3t11,
$buoi_dongia_l3t12,
$buoi_thitruongtieuthu,
$buoi_thitruongngoaitinh, $key);
                echo $res;
            break;
            case "_suathongtinvungtrong_tom":
                $sodienthoai = $_POST['sodienthoai'];
                $madinhdanh = $_POST['madinhdanh'];
                $tom_thongtinsp = $_POST['tom_thongtinsp'];
                $thongtinchung_dientich = $_POST['thongtinchung_dientich'];
                $thongtinchung_dientichtomsu = $_POST['thongtinchung_dientichtomsu'];
                $thongtinchung_dientichtomtct = $_POST['thongtinchung_dientichtomtct'];
                $thongtinchung_loaihinhsxtom = $_POST['thongtinchung_loaihinhsxtom'];
                $thongtinchung_loaidatsx = $_POST['thongtinchung_loaidatsx'];
                $thongtinchung_sacaudat = $_POST['thongtinchung_sacaudat'];
                $thongtinchung_dophtrungbinh = $_POST['thongtinchung_dophtrungbinh'];
                $thongtinchung_aotomsau = $_POST['thongtinchung_aotomsau'];
                $thongtinchung_vutom = $_POST['thongtinchung_vutom'];
                $tom_danquat = $_POST['tom_danquat'];
                $tom_mayphongdien = $_POST['tom_mayphongdien'];
                $tom_daydien = $_POST['tom_daydien'];
                $tom_denchieusang = $_POST['tom_denchieusang'];
                $tom_maybomnuoc = $_POST['tom_maybomnuoc'];
                $tom_tuilocnuoc = $_POST['tom_tuilocnuoc'];
                $tom_congxanuoc = $_POST['tom_congxanuoc'];
                $tom_thietbi_khac = $_POST['tom_thietbi_khac'];
                $tom_caitaocongtrinh = $_POST['tom_caitaocongtrinh'];
                $tom_senvetao = $_POST['tom_senvetao'];
                $tom_lotbatbobatday = $_POST['tom_lotbatbobatday'];
                $tom_giacobobao = $_POST['tom_giacobobao'];
                $tom_bonvoi = $_POST['tom_bonvoi'];
                $tom_lieuluongbonvoi = $_POST['tom_lieuluongbonvoi'];
                $tom_phoimattrang = $_POST['tom_phoimattrang'];
                $tom_phoingay = $_POST['tom_phoingay'];
                $tom_xulynuoc = $_POST['tom_xulynuoc'];
                $tom_dt_thoigian = $_POST['tom_dt_thoigian'];
                $tom_dt_tenthuoc = $_POST['tom_dt_tenthuoc'];
                $tom_dt_lieuluong = $_POST['tom_dt_lieuluong'];
                $tom_dt_cachbon = $_POST['tom_dt_cachbon'];
                $tom_dt_hieuqua = $_POST['tom_dt_hieuqua'];
                $tom_dk_thoigian = $_POST['tom_dk_thoigian'];
                $tom_dk_tenthuoc = $_POST['tom_dk_tenthuoc'];
                $tom_dk_lieuluong = $_POST['tom_dk_lieuluong'];
                $tom_dk_cachbon = $_POST['tom_dk_cachbon'];
                $tom_dk_hieuqua = $_POST['tom_dk_hieuqua'];
                $tom_gmn_thoigian = $_POST['tom_gmn_thoigian'];
                $tom_gmn_tenthuoc = $_POST['tom_gmn_tenthuoc'];
                $tom_gmn_lieuluong = $_POST['tom_gmn_lieuluong'];
                $tom_gmn_cachbon = $_POST['tom_gmn_cachbon'];
                $tom_gmn_hieuqua = $_POST['tom_gmn_hieuqua'];
                $tom_cvs_thoigian = $_POST['tom_cvs_thoigian'];
                $tom_cvs_tenthuoc = $_POST['tom_cvs_tenthuoc'];
                $tom_cvs_lieuluong = $_POST['tom_cvs_lieuluong'];
                $tom_cvs_cachbon = $_POST['tom_cvs_cachbon'];
                $tom_cvs_hieuqua = $_POST['tom_cvs_hieuqua'];
                $tom_kh_thoigian = $_POST['tom_kh_thoigian'];
                $tom_kh_tenthuoc = $_POST['tom_kh_tenthuoc'];
                $tom_kh_lieuluong = $_POST['tom_kh_lieuluong'];
                $tom_kh_cachbon = $_POST['tom_kh_cachbon'];
                $tom_kh_hieuqua = $_POST['tom_kh_hieuqua'];
                $tom_yeutomt = $_POST['tom_yeutomt'];
                $tom_gionggannhat = $_POST['tom_gionggannhat'];
                $tom_nguongoctom = $_POST['tom_nguongoctom'];
                $tom_giayxacnhangiong = $_POST['tom_giayxacnhangiong'];
                $tom_matdotha = $_POST['tom_matdotha'];
                $tom_thoigiantha = $_POST['tom_thoigiantha'];
                $tom_huongtha = $_POST['tom_huongtha'];
                $tom_uonggieo = $_POST['tom_uonggieo'];
                $tom_sdthuocnguabenh = $_POST['tom_sdthuocnguabenh'];
                $tom_sthuocsovoitruocday = $_POST['tom_sthuocsovoitruocday'];
                $tom_sdmenvisinh = $_POST['tom_sdmenvisinh'];
                $tom_kiemtramt = $_POST['tom_kiemtramt'];
                $tom_quanlynuocmt = $_POST['tom_quanlynuocmt'];
                $tom_dichbenhems = $_POST['tom_dichbenhems'];
                $tom_soaobibenh = $_POST['tom_soaobibenh'];
                $tom_benhdomtrang = $_POST['tom_benhdomtrang'];
                $tom_benhdomtrang_sosanh = $_POST['tom_benhdomtrang_sosanh'];
                $tom_benhdauvang = $_POST['tom_benhdauvang'];
                $tom_benhdauvang_sosanh = $_POST['tom_benhdauvang_sosanh'];
                $tom_benhIHHNV = $_POST['tom_benhIHHNV'];
                $tom_benhIHHNV_sosanh = $_POST['tom_benhIHHNV_sosanh'];
                $tom_benhphantrang = $_POST['tom_benhphantrang'];
                $tom_benhphantrang_sosanh = $_POST['tom_benhphantrang_sosanh'];
                $tom_benhIMNV = $_POST['tom_benhIMNV'];
                $tom_benhIMNV_sosanh = $_POST['tom_benhIMNV_sosanh'];
                $tom_vibaotutrung = $_POST['tom_vibaotutrung'];
                $tom_vibao_thoigian = $_POST['tom_vibao_thoigian'];
                $tom_xlaokhichetnhieu = $_POST['tom_xlaokhichetnhieu'];
                $tom_xuly_php = $_POST['tom_xuly_php'];
                $tom_domtrang_thoigian = $_POST['tom_domtrang_thoigian'];
                $tom_domtrang_tenthuoc = $_POST['tom_domtrang_tenthuoc'];
                $tom_domtrang_lieuluong = $_POST['tom_domtrang_lieuluong'];
                $tom_domtrang_cachbon = $_POST['tom_domtrang_cachbon'];
                $tom_domtrang_hieuqua = $_POST['tom_domtrang_hieuqua'];
                $tom_dauvang_thoigian = $_POST['tom_dauvang_thoigian'];
                $tom_dauvang_tenthuoc = $_POST['tom_dauvang_tenthuoc'];
                $tom_dauvang_lieuluong = $_POST['tom_dauvang_lieuluong'];
                $tom_dauvang_cachbon = $_POST['tom_dauvang_cachbon'];
                $tom_dauvang_hieuqua = $_POST['tom_dauvang_hieuqua'];
                $tom_ihhnv_thoigian = $_POST['tom_ihhnv_thoigian'];
                $tom_ihhnv_tenthuoc = $_POST['tom_ihhnv_tenthuoc'];
                $tom_ihhnv_lieuluong = $_POST['tom_ihhnv_lieuluong'];
                $tom_ihhnv_cachbon = $_POST['tom_ihhnv_cachbon'];
                $tom_ihhnv_hieuqua = $_POST['tom_ihhnv_hieuqua'];
                $tom_phantrang_thoigian = $_POST['tom_phantrang_thoigian'];
                $tom_phantrang_tenthuoc = $_POST['tom_phantrang_tenthuoc'];
                $tom_phantrang_lieuluong = $_POST['tom_phantrang_lieuluong'];
                $tom_phantrang_cachbon = $_POST['tom_phantrang_cachbon'];
                $tom_phantrang_hieuqua = $_POST['tom_phantrang_hieuqua'];
                $tom_imnv_thoigian = $_POST['tom_imnv_thoigian'];
                $tom_imnv_tenthuoc = $_POST['tom_imnv_tenthuoc'];
                $tom_imnv_lieuluong = $_POST['tom_imnv_lieuluong'];
                $tom_imnv_cachbon = $_POST['tom_imnv_cachbon'];
                $tom_imnv_hieuqua = $_POST['tom_imnv_hieuqua'];
                $tom_vbtt_thoigian = $_POST['tom_vbtt_thoigian'];
                $tom_vbtt_tenthuoc = $_POST['tom_vbtt_tenthuoc'];
                $tom_vbtt_lieuluong = $_POST['tom_vbtt_lieuluong'];
                $tom_vbtt_cachbon = $_POST['tom_vbtt_cachbon'];
                $tom_vbtt_hieuqua = $_POST['tom_vbtt_hieuqua'];
                $tom_cachchoan = $_POST['tom_cachchoan'];
                $tom_solanchoan = $_POST['tom_solanchoan'];
                $tom_sosangan = $_POST['tom_sosangan'];
                $tom_phoitromthucan = $_POST['tom_phoitromthucan'];
                $tom_thucan_ten1 = $_POST['tom_thucan_ten1'];
                $tom_thucan_thoigian1 = $_POST['tom_thucan_thoigian1'];
                $tom_thucan_lieuluong1 = $_POST['tom_thucan_lieuluong1'];
                $tom_thucan_cachbon1 = $_POST['tom_thucan_cachbon1'];
                $tom_thucan_hieuqua1 = $_POST['tom_thucan_hieuqua1'];
                $tom_thucan_ten2 = $_POST['tom_thucan_ten2'];
                $tom_thucan_thoigian2 = $_POST['tom_thucan_thoigian2'];
                $tom_thucan_lieuluong2 = $_POST['tom_thucan_lieuluong2'];
                $tom_thucan_cachbon2 = $_POST['tom_thucan_cachbon2'];
                $tom_thucan_hieuqua2 = $_POST['tom_thucan_hieuqua2'];
                $tom_thucan_ten3 = $_POST['tom_thucan_ten3'];
                $tom_thucan_thoigian3 = $_POST['tom_thucan_thoigian3'];
                $tom_thucan_lieuluong3 = $_POST['tom_thucan_lieuluong3'];
                $tom_thucan_cachbon3 = $_POST['tom_thucan_cachbon3'];
                $tom_thucan_hieuqua3 = $_POST['tom_thucan_hieuqua3'];
                $tom_ktdoph = $_POST['tom_ktdoph'];
                $tom_ktdoph_solan = $_POST['tom_ktdoph_solan'];
                $tom_ktdokiem = $_POST['tom_ktdokiem'];
                $tom_ktdokiem_solan = $_POST['tom_ktdokiem_solan'];
                $tom_duytridokiem = $_POST['tom_duytridokiem'];
                $tom_dokiem_thoigian = $_POST['tom_dokiem_thoigian'];
                $tom_dokiem_tenthuoc = $_POST['tom_dokiem_tenthuoc'];
                $tom_dokiem_lieuluong = $_POST['tom_dokiem_lieuluong'];
                $tom_dokiem_cachbon = $_POST['tom_dokiem_cachbon'];
                $tom_dokiem_hieuqua = $_POST['tom_dokiem_hieuqua'];
                $tom_bskhoang_thoigian = $_POST['tom_bskhoang_thoigian'];
                $tom_bskhoang_tenthuoc = $_POST['tom_bskhoang_tenthuoc'];
                $tom_bskhoang_lieuluong = $_POST['tom_bskhoang_lieuluong'];
                $tom_bskhoang_cachbon = $_POST['tom_bskhoang_cachbon'];
                $tom_bskhoang_hieuqua = $_POST['tom_bskhoang_hieuqua'];
                $tom_cayvisinh_thoigian = $_POST['tom_cayvisinh_thoigian'];
                $tom_cayvisinh_tenthuoc = $_POST['tom_cayvisinh_tenthuoc'];
                $tom_cayvisinh_lieuluong = $_POST['tom_cayvisinh_lieuluong'];
                $tom_cayvisinh_cachbon = $_POST['tom_cayvisinh_cachbon'];
                $tom_cayvisinh_hieuqua = $_POST['tom_cayvisinh_hieuqua'];
                $tom_cpsinhhoc_thoigian = $_POST['tom_cpsinhhoc_thoigian'];
                $tom_cpsinhhoc_tenthuoc = $_POST['tom_cpsinhhoc_tenthuoc'];
                $tom_cpsinhhoc_lieuluong = $_POST['tom_cpsinhhoc_lieuluong'];
                $tom_cpsinhhoc_cachbon = $_POST['tom_cpsinhhoc_cachbon'];
                $tom_cpsinhhoc_hieuqua = $_POST['tom_cpsinhhoc_hieuqua'];
                $tom_dinhduong_thoigian = $_POST['tom_dinhduong_thoigian'];
                $tom_dinhduong_tenthuoc = $_POST['tom_dinhduong_tenthuoc'];
                $tom_dinhduong_lieuluong = $_POST['tom_dinhduong_lieuluong'];
                $tom_dinhduong_cachbon = $_POST['tom_dinhduong_cachbon'];
                $tom_dinhduong_hieuqua = $_POST['tom_dinhduong_hieuqua'];
                $tom_xatructiep = $_POST['tom_xatructiep'];
                $tom_xltruocthai = $_POST['tom_xltruocthai'];
                $tom_xltruocthai_pp = $_POST['tom_xltruocthai_pp'];
                $tom_xlbunthai = $_POST['tom_xlbunthai'];
                $tom_xlbunthai_pp = $_POST['tom_xlbunthai_pp'];
                $tom_nuoithuhoach = $_POST['tom_nuoithuhoach'];
                $tom_thuhoach_solan = $_POST['tom_thuhoach_solan'];
                $tom_thuhoach_trongluong = $_POST['tom_thuhoach_trongluong'];
                $tom_nsmuathuan = $_POST['tom_nsmuathuan'];
                $tom_nsmuanghich = $_POST['tom_nsmuanghich'];
                $tom_slmuathuan = $_POST['tom_slmuathuan'];
                $tom_slmuanghich = $_POST['tom_slmuanghich'];
                $tom_dongia_l1t1 = $_POST['tom_dongia_l1t1'];
                $tom_dongia_l1t2 = $_POST['tom_dongia_l1t2'];
                $tom_dongia_l1t3 = $_POST['tom_dongia_l1t3'];
                $tom_dongia_l1t4 = $_POST['tom_dongia_l1t4'];
                $tom_dongia_l1t5 = $_POST['tom_dongia_l1t5'];
                $tom_dongia_l1t6 = $_POST['tom_dongia_l1t6'];
                $tom_dongia_l1t7 = $_POST['tom_dongia_l1t7'];
                $tom_dongia_l1t8 = $_POST['tom_dongia_l1t8'];
                $tom_dongia_l1t9 = $_POST['tom_dongia_l1t9'];
                $tom_dongia_l1t10 = $_POST['tom_dongia_l1t10'];
                $tom_dongia_l1t11 = $_POST['tom_dongia_l1t11'];
                $tom_dongia_l1t12 = $_POST['tom_dongia_l1t12'];
                $tom_dongia_l2t1 = $_POST['tom_dongia_l2t1'];
                $tom_dongia_l2t2 = $_POST['tom_dongia_l2t2'];
                $tom_dongia_l2t3 = $_POST['tom_dongia_l2t3'];
                $tom_dongia_l2t4 = $_POST['tom_dongia_l2t4'];
                $tom_dongia_l2t5 = $_POST['tom_dongia_l2t5'];
                $tom_dongia_l2t6 = $_POST['tom_dongia_l2t6'];
                $tom_dongia_l2t7 = $_POST['tom_dongia_l2t7'];
                $tom_dongia_l2t8 = $_POST['tom_dongia_l2t8'];
                $tom_dongia_l2t9 = $_POST['tom_dongia_l2t9'];
                $tom_dongia_l2t10 = $_POST['tom_dongia_l2t10'];
                $tom_dongia_l2t11 = $_POST['tom_dongia_l2t11'];
                $tom_dongia_l2t12 = $_POST['tom_dongia_l2t12'];
                $tom_dongia_l3t1 = $_POST['tom_dongia_l3t1'];
                $tom_dongia_l3t2 = $_POST['tom_dongia_l3t2'];
                $tom_dongia_l3t3 = $_POST['tom_dongia_l3t3'];
                $tom_dongia_l3t4 = $_POST['tom_dongia_l3t4'];
                $tom_dongia_l3t5 = $_POST['tom_dongia_l3t5'];
                $tom_dongia_l3t6 = $_POST['tom_dongia_l3t6'];
                $tom_dongia_l3t7 = $_POST['tom_dongia_l3t7'];
                $tom_dongia_l3t8 = $_POST['tom_dongia_l3t8'];
                $tom_dongia_l3t9 = $_POST['tom_dongia_l3t9'];
                $tom_dongia_l3t10 = $_POST['tom_dongia_l3t10'];
                $tom_dongia_l3t11 = $_POST['tom_dongia_l3t11'];
                $tom_dongia_l3t12 = $_POST['tom_dongia_l3t12'];
                $tom_thitruongtieuthu = $_POST['tom_thitruongtieuthu'];
                $tom_thitruongtieuthu_ngoaitinh = $_POST['tom_thitruongtieuthu_ngoaitinh'];
                $tom_thitruongtieuthu_xuatkhau = $_POST['tom_thitruongtieuthu_xuatkhau'];
                $key = $_POST['key'];
                $res = (new ApiController())->FUpdateTomApiVfarmID($sodienthoai,$madinhdanh,$tom_thongtinsp,
$thongtinchung_dientich,
$thongtinchung_dientichtomsu,
$thongtinchung_dientichtomtct,
$thongtinchung_loaihinhsxtom,
$thongtinchung_loaidatsx,
$thongtinchung_sacaudat,
$thongtinchung_dophtrungbinh,
$thongtinchung_aotomsau,
$thongtinchung_vutom,
$tom_danquat,
$tom_mayphongdien,
$tom_daydien,
$tom_denchieusang,
$tom_maybomnuoc,
$tom_tuilocnuoc,
$tom_congxanuoc,
$tom_thietbi_khac,
$tom_caitaocongtrinh,
$tom_senvetao,
$tom_lotbatbobatday,
$tom_giacobobao,
$tom_bonvoi,
$tom_lieuluongbonvoi,
$tom_phoimattrang,
$tom_phoingay,
$tom_xulynuoc,
$tom_dt_thoigian,
$tom_dt_tenthuoc,
$tom_dt_lieuluong,
$tom_dt_cachbon,
$tom_dt_hieuqua,
$tom_dk_thoigian,
$tom_dk_tenthuoc,
$tom_dk_lieuluong,
$tom_dk_cachbon,
$tom_dk_hieuqua,
$tom_gmn_thoigian,
$tom_gmn_tenthuoc,
$tom_gmn_lieuluong,
$tom_gmn_cachbon,
$tom_gmn_hieuqua,
$tom_cvs_thoigian,
$tom_cvs_tenthuoc,
$tom_cvs_lieuluong,
$tom_cvs_cachbon,
$tom_cvs_hieuqua,
$tom_kh_thoigian,
$tom_kh_tenthuoc,
$tom_kh_lieuluong,
$tom_kh_cachbon,
$tom_kh_hieuqua,
$tom_yeutomt,
$tom_gionggannhat,
$tom_nguongoctom,
$tom_giayxacnhangiong,
$tom_matdotha,
$tom_thoigiantha,
$tom_huongtha,
$tom_uonggieo,
$tom_sdthuocnguabenh,
$tom_sthuocsovoitruocday,
$tom_sdmenvisinh,
$tom_kiemtramt,
$tom_quanlynuocmt,
$tom_dichbenhems,
$tom_soaobibenh,
$tom_benhdomtrang,
$tom_benhdomtrang_sosanh,
$tom_benhdauvang,
$tom_benhdauvang_sosanh,
$tom_benhIHHNV,
$tom_benhIHHNV_sosanh,
$tom_benhphantrang,
$tom_benhphantrang_sosanh,
$tom_benhIMNV,
$tom_benhIMNV_sosanh,
$tom_vibaotutrung,
$tom_vibao_thoigian,
$tom_xlaokhichetnhieu,
$tom_xuly_php,
$tom_domtrang_thoigian,
$tom_domtrang_tenthuoc,
$tom_domtrang_lieuluong,
$tom_domtrang_cachbon,
$tom_domtrang_hieuqua,
$tom_dauvang_thoigian,
$tom_dauvang_tenthuoc,
$tom_dauvang_lieuluong,
$tom_dauvang_cachbon,
$tom_dauvang_hieuqua,
$tom_ihhnv_thoigian,
$tom_ihhnv_tenthuoc,
$tom_ihhnv_lieuluong,
$tom_ihhnv_cachbon,
$tom_ihhnv_hieuqua,
$tom_phantrang_thoigian,
$tom_phantrang_tenthuoc,
$tom_phantrang_lieuluong,
$tom_phantrang_cachbon,
$tom_phantrang_hieuqua,
$tom_imnv_thoigian ,
$tom_imnv_tenthuoc,
$tom_imnv_lieuluong,
$tom_imnv_cachbon,
$tom_imnv_hieuqua,
$tom_vbtt_thoigian,
$tom_vbtt_tenthuoc,
$tom_vbtt_lieuluong,
$tom_vbtt_cachbon,
$tom_vbtt_hieuqua,
$tom_cachchoan,
$tom_solanchoan,
$tom_sosangan,
$tom_phoitromthucan,
$tom_thucan_ten1,
$tom_thucan_thoigian1,
$tom_thucan_lieuluong1,
$tom_thucan_cachbon1,
$tom_thucan_hieuqua1,
$tom_thucan_ten2,
$tom_thucan_thoigian2,
$tom_thucan_lieuluong2,
$tom_thucan_cachbon2,
$tom_thucan_hieuqua2,
$tom_thucan_ten3,
$tom_thucan_thoigian3,
$tom_thucan_lieuluong3,
$tom_thucan_cachbon3,
$tom_thucan_hieuqua3,
$tom_ktdoph,
$tom_ktdoph_solan,
$tom_ktdokiem,
$tom_ktdokiem_solan,
$tom_duytridokiem,
$tom_dokiem_thoigian,
$tom_dokiem_tenthuoc,
$tom_dokiem_lieuluong,
$tom_dokiem_cachbon,
$tom_dokiem_hieuqua,
$tom_bskhoang_thoigian,
$tom_bskhoang_tenthuoc,
$tom_bskhoang_lieuluong,
$tom_bskhoang_cachbon,
$tom_bskhoang_hieuqua,
$tom_cayvisinh_thoigian,
$tom_cayvisinh_tenthuoc,
$tom_cayvisinh_lieuluong,
$tom_cayvisinh_cachbon,
$tom_cayvisinh_hieuqua,
$tom_cpsinhhoc_thoigian,
$tom_cpsinhhoc_tenthuoc,
$tom_cpsinhhoc_lieuluong,
$tom_cpsinhhoc_cachbon,
$tom_cpsinhhoc_hieuqua,
$tom_dinhduong_thoigian,
$tom_dinhduong_tenthuoc,
$tom_dinhduong_lieuluong,
$tom_dinhduong_cachbon,
$tom_dinhduong_hieuqua,
$tom_xatructiep,
$tom_xltruocthai,
$tom_xltruocthai_pp,
$tom_xlbunthai,
$tom_xlbunthai_pp,
$tom_nuoithuhoach,
$tom_thuhoach_solan,
$tom_thuhoach_trongluong,
$tom_nsmuathuan,
$tom_nsmuanghich,
$tom_slmuathuan,
$tom_slmuanghich,
$tom_dongia_l1t1,
$tom_dongia_l1t2,
$tom_dongia_l1t3,
$tom_dongia_l1t4,
$tom_dongia_l1t5,
$tom_dongia_l1t6,
$tom_dongia_l1t7,
$tom_dongia_l1t8,
$tom_dongia_l1t9,
$tom_dongia_l1t10,
$tom_dongia_l1t11,
$tom_dongia_l1t12,
$tom_dongia_l2t1,
$tom_dongia_l2t2,
$tom_dongia_l2t3,
$tom_dongia_l2t4,
$tom_dongia_l2t5,
$tom_dongia_l2t6,
$tom_dongia_l2t7,
$tom_dongia_l2t8,
$tom_dongia_l2t9,
$tom_dongia_l2t10,
$tom_dongia_l2t11,
$tom_dongia_l2t12,
$tom_dongia_l3t1,
$tom_dongia_l3t2,
$tom_dongia_l3t3,
$tom_dongia_l3t4,
$tom_dongia_l3t5,
$tom_dongia_l3t6,
$tom_dongia_l3t7,
$tom_dongia_l3t8,
$tom_dongia_l3t9,
$tom_dongia_l3t10,
$tom_dongia_l3t11,
$tom_dongia_l3t12,
$tom_thitruongtieuthu,
$tom_thitruongtieuthu_ngoaitinh,
$tom_thitruongtieuthu_xuatkhau,$key);
                echo $res;
            break;
            default:
                echo "Chức năng không tồn tại";
        }
    }

    if(isset($_GET['for'])) {
        switch ($_GET['for']) {
            case "check_captcha":
                if (isset($_POST['captcha'])){
                    if (strtolower($_SESSION['captcha']) != strtolower(trim($_POST['captcha']))){
                        echo json_encode(array("trangthai" => 'false', "cap" => $_SESSION['captcha']));
                    } else {
                        echo json_encode(array("trangthai" => 'true', "cap" => $_SESSION['captcha']));
                    }
                }
            break;
            case "loadlistvungtrong":
                $iddonvi = $_GET['iddonvi'];
                $res = (new AppController())->LoadListVungTrong($iddonvi);
                echo json_encode($res);
            break;
            case "_getinfoapivfarm":
                $ID = $_POST['mavungtrong'];
                $MADINHDANH = $_POST['madinhdanh'];
                $LOAISANPHAM = $_POST['loaisanpham'];
                $res = (new ApiController())->FGetInFoApiVfarm($ID, $MADINHDANH, $LOAISANPHAM);
                echo $res;
            break;
            case "_updateinfoapivfarm":
                $MADINHDANH = $_POST['madinhdanh'];
                $LOAISANPHAM = $_POST['loaisanpham'];
                $res = (new ApiController())->FUpdateApiVfarmID($MADINHDANH, $LOAISANPHAM);
                echo $res;
            break;
            default:
                echo "Chức năng không tồn tại";
            break;
        }
    }

    if(isset($_GET['page'])) {
        
        if(!isset($_SESSION["sansang"])){
                header("Location: go?check=_home");
        } else {
            if($_SESSION["sansang"] != "1"){
                header("Location: go?check=_home");
            }
        }
        
        ob_start();

        switch ($_GET['page']) {
            case "_home":
                include("pages/index.php");
            break;
            case "_index":
                $trangthai = $check_session;
                include("pages/manage.php");
            break;
            case "_addthongtinvungtrong":
                include("pages/themvungtrong.php");
            break;
            case "_thongtinvungtrong":
                $IDVUNGTRONG = "";
                if (isset($_GET['ID'])) {
                    $IDVUNGTRONG = $_GET['ID'];
                } else {
                    $IDVUNGTRONG = "0";
                }
                $responeInfo = json_encode((new AppController())->FGetInFoID($IDVUNGTRONG));
                $responeAPI = (new ApiController())->FGetInFoApiVfarmID($IDVUNGTRONG);
                include("pages/thongtinvungtrong_detail.php");
            break;
            case "_capnhatthongtin":
                $madinhdanh = $_GET['madinhdanh'];
                $key = $_GET['key'];
                $SDT = $_GET['SODIENTHOAI'];
                $key_secret = $_SESSION["SECRET_KEY"];
                if ($key != $key_secret) {
                    include("pages/ferror.php");
                } else {
                    $SDT = "";
                    $reponse_sdt = (new AppController())->FGetPhoneNumber($madinhdanh);
                    foreach ($reponse_sdt as $key) {
                        $SDT = $key["SODIENTHOAI"];
                    }
                    $MAXACNHAN = $key_secret;
                    if ($SDT) {
                        $responeupdateInfo = json_encode((new AppController())->FUpdateInFoID($SDT));
                        $responeupdateAPI = (new ApiController())->FUpdateInFoApiVfarmID($SDT, $MAXACNHAN);
                        include("pages/thongtinvungtrong_edit.php");
                    } else {
                        include("pages/ferror.php");
                    }
                }
            break;
            case "_registerinfo":
                include("pages/check_page_edit.php");
            break;
            default:
                include("pages/ferror.php");
            break;
        }
        echo ob_get_clean();
    }
?>