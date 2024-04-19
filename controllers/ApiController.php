<?php
    include_once('./lib/phpqrcode/qrlib.php');

    class ApiController {

        public function FGetInFoApiVfarm($ID, $MADINHDANH, $LOAISANPHAM){
            $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
            $curl_post_data =  array(
                "maDinhDanh"        => "WTKMSL", // $MADINHDANH
                "loaiSanPham"       => "1" //$LOAISANPHAM
            );
            $curl = curl_init();
            curl_setopt_array($curl, 
                array(
                    CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/get-info',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                    CURLOPT_HTTPHEADER => array(
                        $arr_header,
                        'Content-Type: application/json'
                    ),
                )
            );
            $response = curl_exec($curl);
            return $response;
        }

        public function FGetInFoApiVfarmID($IDVUNGTRONG){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_madinhdanh(:IDVUNGTRONG);");
            $stmt -> bindParam(':IDVUNGTRONG', $IDVUNGTRONG, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
                $curl_post_data =  array(
                    "maDinhDanh"        => $row["MAVUNGTRONG"], // $MADINHDANH $row["MAVUNGTRONG"]
                    "loaiSanPham"       => $row["LOAISANPHAM"] //$LOAISANPHAM
                );
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/get-info',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                return $response;
            } else {
                return array('status' => false, "message" => "Chưa có thông tin mã định danh");
            }
        }

        public function FUpdateApiVfarmID($sodienthoai, $madinhdanh, $thongtinchung_dientich, $giongvacachxulygiong_tengiong, $thoivu_hethu, $thoivu_thudong, $thoivu_dongxuan, $thoivu_xuanhe, $phanbon_tongphanbon, $phanbon_vusanxuat, $phanbon_donvibon, $phanbon_thuchiencongviec, $phanbon_congcu, $phanbon_huuco_bonlot, $phanbon_huuco_bonlan1, $phanbon_huuco_bonlan2, $phanbon_huuco_bonlan3, $phanbon_huuco_bonlan4, $phanbon_huuco_bonlan5, $phanbon_huuco_note, $phanbon_caitaodat_bonlot, $phanbon_caitaodat_bonlan1, $phanbon_caitaodat_bonlan2, $phanbon_caitaodat_bonlan3, $phanbon_caitaodat_bonlan4, $phanbon_caitaodat_bonlan5, $phanbon_caitaodat_note, $phanbon_ure_bonlot, $phanbon_ure_bonlan1, $phanbon_ure_bonlan2, $phanbon_ure_bonlan3, $phanbon_ure_bonlan4, $phanbon_ure_bonlan5, $phanbon_ure_note, $phanbon_lan_bonlot, $phanbon_lan_bonlan1, $phanbon_lan_bonlan2, $phanbon_lan_bonlan3, $phanbon_lan_bonlan4, $phanbon_lan_bonlan5, $phanbon_lan_note, $phanbon_kali_bonlot, $phanbon_kali_bonlan1, $phanbon_kali_bonlan2, $phanbon_kali_bonlan3, $phanbon_kali_bonlan4, $phanbon_kali_bonlan5, $phanbon_kali_note, $phanbon_dap_bonlot, $phanbon_dap_bonlan1, $phanbon_dap_bonlan2, $phanbon_dap_bonlan3, $phanbon_dap_bonlan4, $phanbon_dap_bonlan5, $phanbon_dap_note, $phanbon_npk_tenphan, $phanbon_npk_bonlot, $phanbon_npk_bonlan1, $phanbon_npk_bonlan2, $phanbon_npk_bonlan3, $phanbon_npk_bonlan4, $phanbon_npk_bonlan5, $phanbon_npk_note, $phanbon_khac_tenphan, $phanbon_khac_bonlot, $phanbon_khac_bonlan1, $phanbon_khac_bonlan2, $phanbon_khac_bonlan3, $phanbon_khac_bonlan4, $phanbon_khac_bonlan5, $phanbon_khac_note, $phanbon_phanbonla_tenphan, $phanbon_phanbonla_bonlot, $phanbon_phanbonla_bonlan1, $phanbon_phanbonla_bonlan2, $phanbon_phanbonla_bonlan3, $phanbon_phanbonla_bonlan4, $phanbon_phanbonla_bonlan5, $phanbon_phanbonla_note, $thuocbvtv_solanphun_buouvang, $thuocbvtv_soluong_buouvang, $thuocbvtv_solanphun_truco, $thuocbvtv_soluong_truco, $thuocbvtv_solanphun_trusau, $thuocbvtv_soluong_trusau, $thuocbvtv_solanphun_truray, $thuocbvtv_soluong_truray, $thuocbvtv_solanphun_trubenh, $thuocbvtv_soluong_trubenh, $thuocbvtv_solanphun_trusautruray, $thuocbvtv_soluong_trusautruray, $thuocbvtv_solanphun_trusautrubenh, $thuocbvtv_soluong_trusautrubenh, $thuocbvtv_solanphun_truraytrubenh, $thuocbvtv_soluong_truraytrubenh, $thuocbvtv_solanphun_trusautruraytrubenh, $thuocbvtv_soluong_trusautruraytrubenh, $thuocbvtv_solanphun_lancuoi, $thuocbvtv_soluong_lancuoi, $thuocbvtv_phundinhky, $thuocbvtv_phundinhky_thoigianphun, $thuocbvtv_phundinhky_lydophun, $thuocbvtv_phunthoidiem_lan1, $thuocbvtv_phunthoidiem_lan2, $thuocbvtv_phunthoidiem_lan3, $thuocbvtv_phunthoidiem_lan4, $thuocbvtv_phunthoidiem_lan5, $thuocbvtv_phunthoidiem_lan6, $thuocbvtv_phunthoidiem_lan7, $thuocbvtv_phunthoidiem_lan8, $thuocbvtv_phunthoidiem_lan9, $thuocbvtv_phunthoidiem_lan10, $thuocbvtv_phunthoidiem_lydophun, $thuocbvtv_phunthuockhi, $thuocbvtv_thuchiencongviec, $thuocbvtv_phuongtien, $thuhoach_hethu, $thuhoach_thudong, $thuhoach_dongxuan, $thuhoach_xuanhe, $nangsuatbinhquan, $key){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:sodienthoai, :madinhdanh);");
            $stmt -> bindParam(':sodienthoai', $sodienthoai, PDO::PARAM_STR);
            $stmt -> bindParam(':madinhdanh', $madinhdanh, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
                $hethu_gieosa01= "";$hethu_gieosa02= "";$hethu_gieosa03= "";$hethu_gieosa04= "";$hethu_gieosa05= "";$hethu_gieosa06= "";$hethu_gieosa07= "";$hethu_gieosa08= "";$hethu_gieosa09= "";$hethu_gieosa10= "";$hethu_gieosa11= "";$hethu_gieosa12= "";
                $hethu_thuhoach01= "";$hethu_thuhoach02= "";$hethu_thuhoach03= "";$hethu_thuhoach04= "";$hethu_thuhoach05= "";$hethu_thuhoach06= "";$hethu_thuhoach07= "";$hethu_thuhoach08= "";$hethu_thuhoach09= "";$hethu_thuhoach10= "";$hethu_thuhoach11= "";$hethu_thuhoach12= "";
                $thudong_gieosa01= "";$thudong_gieosa02= "";$thudong_gieosa03= "";$thudong_gieosa04= "";$thudong_gieosa05= "";$thudong_gieosa06= "";$thudong_gieosa07= "";$thudong_gieosa08= "";$thudong_gieosa09= "";$thudong_gieosa10= "";$thudong_gieosa11= "";$thudong_gieosa12= "";
                $thudong_thuhoach01= "";$thudong_thuhoach02= "";$thudong_thuhoach03= "";$thudong_thuhoach04= "";$thudong_thuhoach05= "";$thudong_thuhoach06= "";$thudong_thuhoach07= "";$thudong_thuhoach08= "";$thudong_thuhoach09= "";$thudong_thuhoach10= "";$thudong_thuhoach11= "";$thudong_thuhoach12= "";
                $dongxuan_gieosa01= "";$dongxuan_gieosa02= "";$dongxuan_gieosa03= "";$dongxuan_gieosa04= "";$dongxuan_gieosa05= "";$dongxuan_gieosa06= "";$dongxuan_gieosa07= "";$dongxuan_gieosa08= "";$dongxuan_gieosa09= "";$dongxuan_gieosa10= "";$dongxuan_gieosa11= "";$dongxuan_gieosa12= "";
                $dongxuan_thuhoach01= "";$dongxuan_thuhoach02= "";$dongxuan_thuhoach03= "";$dongxuan_thuhoach04= "";$dongxuan_thuhoach05= "";$dongxuan_thuhoach06= "";$dongxuan_thuhoach07= "";$dongxuan_thuhoach08= "";$dongxuan_thuhoach09= "";$dongxuan_thuhoach10= "";$dongxuan_thuhoach11= "";$dongxuan_thuhoach12= "";
                $xuanhe_gieosa01= "";$xuanhe_gieosa02= "";$xuanhe_gieosa03= "";$xuanhe_gieosa04= "";$xuanhe_gieosa05= "";$xuanhe_gieosa06= "";$xuanhe_gieosa07= "";$xuanhe_gieosa08= "";$xuanhe_gieosa09= "";$xuanhe_gieosa10= "";$xuanhe_gieosa11= "";$xuanhe_gieosa12= "";
                $xuanhe_thuhoach01= "";$xuanhe_thuhoach02= "";$xuanhe_thuhoach03= "";$xuanhe_thuhoach04= "";$xuanhe_thuhoach05= "";$xuanhe_thuhoach06= "";$xuanhe_thuhoach07= "";$xuanhe_thuhoach08= "";$xuanhe_thuhoach09= "";$xuanhe_thuhoach10= "";$xuanhe_thuhoach11= "";$xuanhe_thuhoach12= "";
                if($thoivu_hethu != ""){
                    if (date("m",strtotime($thoivu_hethu)) == "01"){
                        $hethu_gieosa01  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "02"){
                        $hethu_gieosa02  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "03"){
                        $hethu_gieosa03  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "04"){
                        $hethu_gieosa04  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "05"){
                        $hethu_gieosa05  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "06"){
                        $hethu_gieosa06  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "07"){
                        $hethu_gieosa07  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "08"){
                        $hethu_gieosa08  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "09"){
                        $hethu_gieosa09  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "10"){
                        $hethu_gieosa10  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "11"){
                        $hethu_gieosa11  = date("d",strtotime($thoivu_hethu));
                    } else if (date("m",strtotime($thoivu_hethu)) == "12"){
                        $hethu_gieosa12  = date("d",strtotime($thoivu_hethu));
                    }
                }
                if($thuhoach_hethu != ""){
                    if (date("m",strtotime($thuhoach_hethu)) == "01"){
                        $hethu_thuhoach01  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "02"){
                        $hethu_thuhoach02  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "03"){
                        $hethu_thuhoach03  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "04"){
                        $hethu_thuhoach04  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "05"){
                        $hethu_thuhoach05  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "06"){
                        $hethu_thuhoach06  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "07"){
                        $hethu_thuhoach07  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "08"){
                        $hethu_thuhoach08  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "09"){
                        $hethu_thuhoach09  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "10"){
                        $hethu_thuhoach10  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "11"){
                        $hethu_thuhoach11  = date("d",strtotime($thuhoach_hethu));
                    } else if (date("m",strtotime($thuhoach_hethu)) == "12"){
                        $hethu_thuhoach12  = date("d",strtotime($thuhoach_hethu));
                    }
                }
                if($thoivu_thudong != ""){
                    if (date("m",strtotime($thoivu_thudong)) == "01"){
                        $thudong_gieosa01  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "02"){
                        $thudong_gieosa02  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "03"){
                        $thudong_gieosa03  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "04"){
                        $thudong_gieosa04  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "05"){
                        $thudong_gieosa05  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "06"){
                        $thudong_gieosa06  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "07"){
                        $thudong_gieosa07  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "08"){
                        $thudong_gieosa08  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "09"){
                        $thudong_gieosa09  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "10"){
                        $thudong_gieosa10  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "11"){
                        $thudong_gieosa11  = date("d",strtotime($thoivu_thudong));
                    } else if (date("m",strtotime($thoivu_thudong)) == "12"){
                        $thudong_gieosa12  = date("d",strtotime($thoivu_thudong));
                    }
                }
                if($thuhoach_thudong != ""){
                    if (date("m",strtotime($thuhoach_thudong)) == "01"){
                        $thudong_thuhoach01  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "02"){
                        $thudong_thuhoach02  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "03"){
                        $thudong_thuhoach03  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "04"){
                        $thudong_thuhoach04  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "05"){
                        $thudong_thuhoach05  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "06"){
                        $thudong_thuhoach06  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "07"){
                        $thudong_thuhoach07  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "08"){
                        $thudong_thuhoach08  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "09"){
                        $thudong_thuhoach09  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "10"){
                        $thudong_thuhoach10  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "11"){
                        $thudong_thuhoach11  = date("d",strtotime($thuhoach_thudong));
                    } else if (date("m",strtotime($thuhoach_thudong)) == "12"){
                        $thudong_thuhoach12  = date("d",strtotime($thuhoach_thudong));
                    }
                }
                if($thoivu_dongxuan != ""){
                    if (date("m",strtotime($thoivu_dongxuan)) == "01"){
                        $dongxuan_gieosa01  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "02"){
                        $dongxuan_gieosa02  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "03"){
                        $dongxuan_gieosa03  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "04"){
                        $dongxuan_gieosa04  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "05"){
                        $dongxuan_gieosa05  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "06"){
                        $dongxuan_gieosa06  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "07"){
                        $dongxuan_gieosa07  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "08"){
                        $dongxuan_gieosa08  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "09"){
                        $dongxuan_gieosa09  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "10"){
                        $dongxuan_gieosa10  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "11"){
                        $dongxuan_gieosa11  = date("d",strtotime($thoivu_dongxuan));
                    } else if (date("m",strtotime($thoivu_dongxuan)) == "12"){
                        $dongxuan_gieosa12  = date("d",strtotime($thoivu_dongxuan));
                    }
                }
                if($thuhoach_dongxuan != ""){
                    if (date("m",strtotime($thuhoach_dongxuan)) == "01"){
                        $dongxuan_thuhoach01  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "02"){
                        $dongxuan_thuhoach02  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "03"){
                        $dongxuan_thuhoach03  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "04"){
                        $dongxuan_thuhoach04  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "05"){
                        $dongxuan_thuhoach05  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "06"){
                        $dongxuan_thuhoach06  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "07"){
                        $dongxuan_thuhoach07  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "08"){
                        $dongxuan_thuhoach08  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "09"){
                        $dongxuan_thuhoach09  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "10"){
                        $dongxuan_thuhoach10  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "11"){
                        $dongxuan_thuhoach11  = date("d",strtotime($thuhoach_dongxuan));
                    } else if (date("m",strtotime($thuhoach_dongxuan)) == "12"){
                        $dongxuan_thuhoach12  = date("d",strtotime($thuhoach_dongxuan));
                    }
                }
                if($thoivu_xuanhe != ""){
                    if (date("m",strtotime($thoivu_xuanhe)) == "01"){
                        $xuanhe_gieosa01  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "02"){
                        $xuanhe_gieosa02  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "03"){
                        $xuanhe_gieosa03  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "04"){
                        $xuanhe_gieosa04  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "05"){
                        $xuanhe_gieosa05  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "06"){
                        $xuanhe_gieosa06  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "07"){
                        $xuanhe_gieosa07  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "08"){
                        $xuanhe_gieosa08  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "09"){
                        $xuanhe_gieosa09  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "10"){
                        $xuanhe_gieosa10  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "11"){
                        $xuanhe_gieosa11  = date("d",strtotime($thoivu_xuanhe));
                    } else if (date("m",strtotime($thoivu_xuanhe)) == "12"){
                        $xuanhe_gieosa12  = date("d",strtotime($thoivu_xuanhe));
                    }
                }
                if($thuhoach_xuanhe != ""){
                    if (date("m",strtotime($thuhoach_xuanhe)) == "01"){
                        $xuanhe_thuhoach01  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "02"){
                        $xuanhe_thuhoach02  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "03"){
                        $xuanhe_thuhoach03  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "04"){
                        $xuanhe_thuhoach04  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "05"){
                        $xuanhe_thuhoach05  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "06"){
                        $xuanhe_thuhoach06  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "07"){
                        $xuanhe_thuhoach07  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "08"){
                        $xuanhe_thuhoach08  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "09"){
                        $xuanhe_thuhoach09  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "10"){
                        $xuanhe_thuhoach10  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "11"){
                        $xuanhe_thuhoach11  = date("d",strtotime($thuhoach_xuanhe));
                    } else if (date("m",strtotime($thuhoach_xuanhe)) == "12"){
                        $xuanhe_thuhoach12  = date("d",strtotime($thuhoach_xuanhe));
                    }
                }
                $tong_phanhuuco = ($phanbon_huuco_bonlot == "" ? 0 : $phanbon_huuco_bonlot) + ($phanbon_huuco_bonlan1 == "" ? 0 : $phanbon_huuco_bonlan1) + ($phanbon_huuco_bonlan2 == "" ? 0 : $phanbon_huuco_bonlan2) + ($phanbon_huuco_bonlan3 == "" ? 0 : $phanbon_huuco_bonlan3) + ($phanbon_huuco_bonlan4 == "" ? 0 : $phanbon_huuco_bonlan4) + ($phanbon_huuco_bonlan5 == "" ? 0 : $phanbon_huuco_bonlan5);
                if ($tong_phanhuuco == 0) {$tong_phanhuuco = "";}
                $tong_phancaitaodat = ($phanbon_caitaodat_bonlot == "" ? 0 : $phanbon_caitaodat_bonlot) + ($phanbon_caitaodat_bonlan1 == "" ? 0 : $phanbon_caitaodat_bonlan1) + ($phanbon_caitaodat_bonlan2 == "" ? 0 : $phanbon_caitaodat_bonlan2) + ($phanbon_caitaodat_bonlan3 == "" ? 0 : $phanbon_caitaodat_bonlan3) + ($phanbon_caitaodat_bonlan4 == "" ? 0 : $phanbon_caitaodat_bonlan4) + ($phanbon_caitaodat_bonlan5 == "" ? 0 : $phanbon_caitaodat_bonlan5);
                if ($tong_phancaitaodat == 0) {$tong_phancaitaodat = "";}
                $tong_phanure = ($phanbon_ure_bonlot == "" ? 0 : $phanbon_ure_bonlot) + ($phanbon_ure_bonlan1 == "" ? 0 : $phanbon_ure_bonlan1) + ($phanbon_ure_bonlan2 == "" ? 0 : $phanbon_ure_bonlan2) + ($phanbon_ure_bonlan3 == "" ? 0 : $phanbon_ure_bonlan3) + ($phanbon_ure_bonlan4 == "" ? 0 : $phanbon_ure_bonlan4) + ($phanbon_ure_bonlan5 == "" ? 0 : $phanbon_ure_bonlan5);
                if ($tong_phanure == 0) {$tong_phanure = "";}
                $tong_phanlan = ($phanbon_lan_bonlot == "" ? 0 : $phanbon_lan_bonlot) + ($phanbon_lan_bonlan1 == "" ? 0 : $phanbon_lan_bonlan1) + ($phanbon_lan_bonlan2 == "" ? 0 : $phanbon_lan_bonlan2) + ($phanbon_lan_bonlan3 == "" ? 0 : $phanbon_lan_bonlan3) + ($phanbon_lan_bonlan4 == "" ? 0 : $phanbon_lan_bonlan4) + ($phanbon_lan_bonlan5 == "" ? 0 : $phanbon_lan_bonlan5);
                if ($tong_phanlan == 0) {$tong_phanlan = "";}
                $tong_phankali = ($phanbon_kali_bonlot == "" ? 0 : $phanbon_kali_bonlot) + ($phanbon_kali_bonlan1 == "" ? 0 : $phanbon_kali_bonlan1) + ($phanbon_kali_bonlan2 == "" ? 0 : $phanbon_kali_bonlan2) + ($phanbon_kali_bonlan3 == "" ? 0 : $phanbon_kali_bonlan3) + ($phanbon_kali_bonlan4 == "" ? 0 : $phanbon_kali_bonlan4) + ($phanbon_kali_bonlan5 == "" ? 0 : $phanbon_kali_bonlan5);
                if ($tong_phankali == 0) {$tong_phankali = "";}
                $tong_phandap = ($phanbon_dap_bonlot == "" ? 0 : $phanbon_dap_bonlot) + ($phanbon_dap_bonlan1 == "" ? 0 : $phanbon_dap_bonlan1) + ($phanbon_dap_bonlan2 == "" ? 0 : $phanbon_dap_bonlan2) + ($phanbon_dap_bonlan3 == "" ? 0 : $phanbon_dap_bonlan3) + ($phanbon_dap_bonlan4 == "" ? 0 : $phanbon_dap_bonlan4) + ($phanbon_dap_bonlan5 == "" ? 0 : $phanbon_dap_bonlan5);
                if ($tong_phandap == 0) {$tong_phandap = "";}
                $tong_phannpk = ($phanbon_npk_bonlot == "" ? 0 : $phanbon_npk_bonlot) + ($phanbon_npk_bonlan1 == "" ? 0 : $phanbon_npk_bonlan1) + ($phanbon_npk_bonlan2 == "" ? 0 : $phanbon_npk_bonlan2) + ($phanbon_npk_bonlan3 == "" ? 0 : $phanbon_npk_bonlan3) + ($phanbon_npk_bonlan4 == "" ? 0 : $phanbon_npk_bonlan4) + ($phanbon_npk_bonlan5 == "" ? 0 : $phanbon_npk_bonlan5);
                if ($tong_phannpk == 0) {$tong_phannpk = "";}
                $tong_phankhac = ($phanbon_khac_bonlot == "" ? 0 : $phanbon_khac_bonlot) + ($phanbon_khac_bonlan1 == "" ? 0 : $phanbon_khac_bonlan1) + ($phanbon_khac_bonlan2 == "" ? 0 : $phanbon_khac_bonlan2) + ($phanbon_khac_bonlan3 == "" ? 0 : $phanbon_khac_bonlan3) + ($phanbon_khac_bonlan4 == "" ? 0 : $phanbon_khac_bonlan4) + ($phanbon_khac_bonlan5 == "" ? 0 : $phanbon_khac_bonlan5);
                if ($tong_phankhac == 0) {$tong_phankhac = "";}
                $tong_phanbonla = ($phanbon_phanbonla_bonlot == "" ? 0 : $phanbon_phanbonla_bonlot) + ($phanbon_phanbonla_bonlan1 == "" ? 0 : $phanbon_phanbonla_bonlan1) + ($phanbon_phanbonla_bonlan2 == "" ? 0 : $phanbon_phanbonla_bonlan2) + ($phanbon_phanbonla_bonlan3 == "" ? 0 : $phanbon_phanbonla_bonlan3) + ($phanbon_phanbonla_bonlan4 == "" ? 0 : $phanbon_phanbonla_bonlan4) + ($phanbon_phanbonla_bonlan5 == "" ? 0 : $phanbon_phanbonla_bonlan5);
                if ($tong_phanbonla == 0) {$tong_phanbonla = "";}
                $curl_data_edit =  array(
                    "thongTinChung" => array(
                        "dienTichLuaHA" => $thongtinchung_dientich
                    ),
                    "giongVaXuLyGiong" => array(
                        "tenGiong3VuGanNhat" => $giongvacachxulygiong_tengiong
                    ),
                    "thoiVuCanhTac" => array(
                        "heThuGieoSa01" => $hethu_gieosa01,
                        "heThuThuHoach01" => $hethu_thuhoach01,
                        "heThuGieoSa02" => $hethu_gieosa02,
                        "heThuThuHoach02" => $hethu_thuhoach02,
                        "heThuGieoSa03" => $hethu_gieosa03,
                        "heThuThuHoach03" => $hethu_thuhoach03,
                        "heThuGieoSa04" => $hethu_gieosa04,
                        "heThuThuHoach04" => $hethu_thuhoach04,
                        "heThuGieoSa05" => $hethu_gieosa05,
                        "heThuThuHoach05" => $hethu_thuhoach05,
                        "heThuGieoSa06" => $hethu_gieosa06,
                        "heThuThuHoach06" => $hethu_thuhoach06,
                        "heThuGieoSa07" => $hethu_gieosa07,
                        "heThuThuHoach07" => $hethu_thuhoach07,
                        "heThuGieoSa08" => $hethu_gieosa08,
                        "heThuThuHoach08" => $hethu_thuhoach08,
                        "heThuGieoSa09" => $hethu_gieosa09,
                        "heThuThuHoach09" => $hethu_thuhoach09,
                        "heThuGieoSa10" => $hethu_gieosa10,
                        "heThuThuHoach10" => $hethu_thuhoach10,
                        "heThuGieoSa11" => $hethu_gieosa11,
                        "heThuThuHoach11" => $hethu_thuhoach11,
                        "heThuGieoSa12" => $hethu_gieosa12,
                        "heThuThuHoach12" => $hethu_thuhoach12,
                        "thuDongGieoSa01" => $thudong_gieosa01,
                        "thuDongThuHoach01" => $thudong_thuhoach01,
                        "thuDongGieoSa02" => $thudong_gieosa02,
                        "thuDongThuHoach02" => $thudong_thuhoach02,
                        "thuDongGieoSa03" => $thudong_gieosa03,
                        "thuDongThuHoach03" => $thudong_thuhoach03,
                        "thuDongGieoSa04" => $thudong_gieosa04,
                        "thuDongThuHoach04" => $thudong_thuhoach04,
                        "thuDongGieoSa05" => $thudong_gieosa05,
                        "thuDongThuHoach05" => $thudong_thuhoach05,
                        "thuDongGieoSa06" => $thudong_gieosa06,
                        "thuDongThuHoach06" => $thudong_thuhoach06,
                        "thuDongGieoSa07" => $thudong_gieosa07,
                        "thuDongThuHoach07" => $thudong_thuhoach07,
                        "thuDongGieoSa08" => $thudong_gieosa08,
                        "thuDongThuHoach08" => $thudong_thuhoach08,
                        "thuDongGieoSa09" => $thudong_gieosa09,
                        "thuDongThuHoach09" => $thudong_thuhoach09,
                        "thuDongGieoSa10" => $thudong_gieosa10,
                        "thuDongThuHoach10" => $thudong_thuhoach10,
                        "thuDongGieoSa11" => $thudong_gieosa11,
                        "thuDongThuHoach11" => $thudong_thuhoach11,
                        "thuDongGieoSa12" => $thudong_gieosa12,
                        "thuDongThuHoach12" => $thudong_thuhoach12,
                        "dongXuanGieoSa01" => $dongxuan_gieosa01,
                        "dongXuanThuHoach01" => $dongxuan_thuhoach01,
                        "dongXuanGieoSa02" => $dongxuan_gieosa02,
                        "dongXuanThuHoach02" => $dongxuan_thuhoach02,
                        "dongXuanGieoSa03" => $dongxuan_gieosa03,
                        "dongXuanThuHoach03" => $dongxuan_thuhoach03,
                        "dongXuanGieoSa04" => $dongxuan_gieosa04,
                        "dongXuanThuHoach04" => $dongxuan_thuhoach04,
                        "dongXuanGieoSa05" => $dongxuan_gieosa05,
                        "dongXuanThuHoach05" => $dongxuan_thuhoach05,
                        "dongXuanGieoSa06" => $dongxuan_gieosa06,
                        "dongXuanThuHoach06" => $dongxuan_thuhoach06,
                        "dongXuanGieoSa07" => $dongxuan_gieosa07,
                        "dongXuanThuHoach07" => $dongxuan_thuhoach07,
                        "dongXuanGieoSa08" => $dongxuan_gieosa08,
                        "dongXuanThuHoach08" => $dongxuan_thuhoach08,
                        "dongXuanGieoSa09" => $dongxuan_gieosa09,
                        "dongXuanThuHoach09" => $dongxuan_thuhoach09,
                        "dongXuanGieoSa10" => $dongxuan_gieosa10,
                        "dongXuanThuHoach10" => $dongxuan_thuhoach10,
                        "dongXuanGieoSa11" => $dongxuan_gieosa11,
                        "dongXuanThuHoach11" => $dongxuan_thuhoach11,
                        "dongXuanGieoSa12" => $dongxuan_gieosa12,
                        "dongXuanThuHoach12" => $dongxuan_thuhoach12,
                        "xuanHeGieoSa01" => $xuanhe_gieosa01,
                        "xuanHeThuHoach01" => $xuanhe_thuhoach01,
                        "xuanHeGieoSa02" => $xuanhe_gieosa02,
                        "xuanHeThuHoach02" => $xuanhe_thuhoach02,
                        "xuanHeGieoSa03" => $xuanhe_gieosa03,
                        "xuanHeThuHoach03" => $xuanhe_thuhoach03,
                        "xuanHeGieoSa04" => $xuanhe_gieosa04,
                        "xuanHeThuHoach04" => $xuanhe_thuhoach04,
                        "xuanHeGieoSa05" => $xuanhe_gieosa05,
                        "xuanHeThuHoach05" => $xuanhe_thuhoach05,
                        "xuanHeGieoSa06" => $xuanhe_gieosa06,
                        "xuanHeThuHoach06" => $xuanhe_thuhoach06,
                        "xuanHeGieoSa07" => $xuanhe_gieosa07,
                        "xuanHeThuHoach07" => $xuanhe_thuhoach07,
                        "xuanHeGieoSa08" => $xuanhe_gieosa08,
                        "xuanHeThuHoach08" => $xuanhe_thuhoach08,
                        "xuanHeGieoSa09" => $xuanhe_gieosa09,
                        "xuanHeThuHoach09" => $xuanhe_thuhoach09,
                        "xuanHeGieoSa10" => $xuanhe_gieosa10,
                        "xuanHeThuHoach10" => $xuanhe_thuhoach10,
                        "xuanHeGieoSa11" => $xuanhe_gieosa11,
                        "xuanHeThuHoach11" => $xuanhe_thuhoach11,
                        "xuanHeGieoSa12" => $xuanhe_gieosa12,
                        "xuanHeThuHoach12" => $xuanhe_thuhoach12
                    ),
                    "kyThuatBonPhan" => array(
                        "soLanBonPhan" => $phanbon_tongphanbon,
                        "vuSanXuat" => $phanbon_vusanxuat,
                        "donViBon" => $phanbon_donvibon,
                        "aiBonPhan" => $phanbon_thuchiencongviec,
                        "congCuPhTien" => $phanbon_congcu,
                        "phctong" => $tong_phanhuuco,
                        "phcbonLot" => $phanbon_huuco_bonlot,
                        "phclan1" => $phanbon_huuco_bonlan1,
                        "phclan2" => $phanbon_huuco_bonlan2,
                        "phclan3" => $phanbon_huuco_bonlan3,
                        "phclan4" => $phanbon_huuco_bonlan4,
                        "phclan5" => $phanbon_huuco_bonlan5,
                        "phcnote" => $phanbon_huuco_note,
                        "pctdtong" => $tong_phancaitaodat,
                        "pctdbonLot" => $phanbon_caitaodat_bonlot,
                        "pctdlan1" => $phanbon_caitaodat_bonlan1,
                        "pctdlan2" => $phanbon_caitaodat_bonlan2,
                        "pctdlan3" => $phanbon_caitaodat_bonlan3,
                        "pctdlan4" => $phanbon_caitaodat_bonlan4,
                        "pctdlan5" => $phanbon_caitaodat_bonlan5,
                        "pctdnote" => $phanbon_caitaodat_note,
                        "ureTong" => $tong_phanure,
                        "ureBonLot" => $phanbon_ure_bonlot,
                        "ureLan1" => $phanbon_ure_bonlan1,
                        "ureLan2" => $phanbon_ure_bonlan2,
                        "ureLan3" => $phanbon_ure_bonlan3,
                        "ureLan4" => $phanbon_ure_bonlan4,
                        "ureLan5" => $phanbon_ure_bonlan5,
                        "ureNote" => $phanbon_ure_note,
                        "planTong" => $tong_phanlan,
                        "planBonLot" => $phanbon_lan_bonlot,
                        "planLan1" => $phanbon_lan_bonlan1,
                        "planLan2" => $phanbon_lan_bonlan2,
                        "planLan3" => $phanbon_lan_bonlan3,
                        "planLan4" => $phanbon_lan_bonlan4,
                        "planLan5" => $phanbon_lan_bonlan5,
                        "planNote" => $phanbon_lan_note,
                        "pkaliTong" => $tong_phankali,
                        "pkaliBonLot" => $phanbon_kali_bonlot,
                        "pkaliLan1" => $phanbon_kali_bonlan1,
                        "pkaliLan2" => $phanbon_kali_bonlan2,
                        "pkaliLan3" => $phanbon_kali_bonlan3,
                        "pkaliLan4" => $phanbon_kali_bonlan4,
                        "pkaliLan5" => $phanbon_kali_bonlan5,
                        "pkaliNote" => $phanbon_kali_note,
                        "pdapTong" => $tong_phandap,
                        "pdapBonLot" => $phanbon_dap_bonlot,
                        "pdapLan1" => $phanbon_dap_bonlan1,
                        "pdapLan2" => $phanbon_dap_bonlan2,
                        "pdapLan3" => $phanbon_dap_bonlan3,
                        "pdapLan4" => $phanbon_dap_bonlan4,
                        "pdapLan5" => $phanbon_dap_bonlan5,
                        "pdapNote" => $phanbon_dap_note,
                        "phNpkTong" => $tong_phannpk,
                        "tenPhanNPK" => $phanbon_npk_tenphan,
                        "phNpkBonLot" => $phanbon_npk_bonlot,
                        "phNpkLan1" => $phanbon_npk_bonlan1,
                        "phNpkLan2" => $phanbon_npk_bonlan2,
                        "phNpkLan3" => $phanbon_npk_bonlan3,
                        "phNpkLan4" => $phanbon_npk_bonlan4,
                        "phNpkLan5" => $phanbon_npk_bonlan5,
                        "phNpkTNote" => $phanbon_npk_note,
                        "phKhacTong" => $tong_phankhac,
                        "tenPhKhac" => $phanbon_khac_tenphan,
                        "phKhacBonLot" => $phanbon_khac_bonlot,
                        "phKhacLan1" => $phanbon_khac_bonlan1,
                        "phKhacLan2" => $phanbon_khac_bonlan2,
                        "phKhacLan3" => $phanbon_khac_bonlan3,
                        "phKhacLan4" => $phanbon_khac_bonlan4,
                        "phKhacLan5" => $phanbon_khac_bonlan5,
                        "phKhacNote" => $phanbon_khac_note,
                        "phBLTong" => $tong_phanbonla,
                        "tenPhBL" => $phanbon_phanbonla_tenphan,
                        "phBLBonLot" => $phanbon_phanbonla_bonlot,
                        "phBLLan1" => $phanbon_phanbonla_bonlan1,
                        "phBLLan2" => $phanbon_phanbonla_bonlan2,
                        "phBLLan3" => $phanbon_phanbonla_bonlan3,
                        "phBLLan4" => $phanbon_phanbonla_bonlan4,
                        "phBLLan5" => $phanbon_phanbonla_bonlan5,
                        "phBLNote" => $phanbon_phanbonla_note
                    ),
                    "thuocBVTV" => array(
                        "thBV" => $thuocbvtv_solanphun_buouvang,
                        "thBVNote" => $thuocbvtv_soluong_buouvang,
                        "thTruCo" => $thuocbvtv_solanphun_truco,
                        "thTruCoNote" => $thuocbvtv_soluong_truco,
                        "thTruSau" => $thuocbvtv_solanphun_trusau,
                        "thTruSauNote" => $thuocbvtv_soluong_trusau,
                        "thTruRay" => $thuocbvtv_solanphun_truray,
                        "thTruRayNote" => $thuocbvtv_soluong_truray,
                        "thTrBenh" => $thuocbvtv_solanphun_trubenh,
                        "thTrBenhNote" => $thuocbvtv_soluong_trubenh,
                        "thSauRay" => $thuocbvtv_solanphun_trusautruray,
                        "thSauRayNote" => $thuocbvtv_soluong_trusautruray,
                        "thSauBenh" => $thuocbvtv_solanphun_trusautrubenh,
                        "thSauBenhNote" => $thuocbvtv_soluong_trusautrubenh,
                        "thRayBenh" => $thuocbvtv_solanphun_truraytrubenh,
                        "thRayBenhNote" => $thuocbvtv_soluong_truraytrubenh,
                        "thSauRayBenh" => $thuocbvtv_solanphun_trusautruraytrubenh,
                        "thSauRayBenhNote" => $thuocbvtv_soluong_trusautruraytrubenh,
                        "bvtvLanCuoi" => $thuocbvtv_solanphun_lancuoi,
                        "bvtvLanCuoiNote" => $thuocbvtv_soluong_lancuoi,
                        "phunDinhKy" => $thuocbvtv_phundinhky,
                        "thGianPhun" => $thuocbvtv_phundinhky_thoigianphun,
                        "lyDoPhun" => $thuocbvtv_phundinhky_lydophun,
                        "phunLan01" => $thuocbvtv_phunthoidiem_lan1,
                        "phunLan02" => $thuocbvtv_phunthoidiem_lan2,
                        "phunLan03" => $thuocbvtv_phunthoidiem_lan3,
                        "phunLan04" => $thuocbvtv_phunthoidiem_lan4,
                        "phunLan05" => $thuocbvtv_phunthoidiem_lan5,
                        "phunLan06" => $thuocbvtv_phunthoidiem_lan6,
                        "phunLan07" => $thuocbvtv_phunthoidiem_lan7,
                        "phunLan08" => $thuocbvtv_phunthoidiem_lan8,
                        "phunLan09" => $thuocbvtv_phunthoidiem_lan9,
                        "phunLan10" => $thuocbvtv_phunthoidiem_lan10,
                        "lyDoPhunLucNay" => $thuocbvtv_phunthoidiem_lydophun,
                        "phunThKhi" => $thuocbvtv_phunthuockhi,
                        "aiPhunTh" => $thuocbvtv_thuchiencongviec,
                        "congCuPhun" => $thuocbvtv_phuongtien
                    ),
                    "hieuQuaKinhTe" => array(
                        "luaNsBq" => $nangsuatbinhquan
                    )
                );
                $curl_post_data =  array(
                    "maDinhDanh"       => $row["MAVUNGTRONG"],
                    "updateData"       => $curl_data_edit
                );
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/edit-info/'.$row["LOAISANPHAM"],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                return $response;
            } else {
                return json_encode(array('status' => false, "message" => "Chưa có thông tin mã định danh"));
            }
        }

        public function FUpdateBuoiApiVfarmID($sodienthoai, $madinhdanh, $buoi_thongtinsp,
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
                        $buoi_thitruongngoaitinh, $key){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:sodienthoai, :madinhdanh);");
            $stmt -> bindParam(':sodienthoai', $sodienthoai, PDO::PARAM_STR);
            $stmt -> bindParam(':madinhdanh', $madinhdanh, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
                $curl_data_edit =  array(
                    "thongTinChung" => array(
                        "dienTichBuoiHA" => $thongtinchung_dientich
                    ),
                    "thongTinSanXuat" => array(
                        "dtSxBuoi" => $buoi_thongtinsp,
                        "giongBuoiGanNhat" => $buoi_gionggannhat,
                        "nguonGocGiong" => $buoi_nguongocgiong,
                        "giayXnNgGiong" => $buoi_giayxacnhangiong,
                        "coXuLyGiong" => $buoi_xulycaygiong,
                        "chePhamXuLy" => $buoi_chephamxuly,
                        "mdXuLyCay" => $buoi_mucdichxuly,
                        "matDoCayTrong" => $buoi_matdocaytrong,
                        "khgCachCayTrong" => $buoi_khoangcachtrong
                    ),
                    "kyThuatCanhTac" => array(
                        "boBaoDeBao" => $buoi_bodebobao,
                        "chieuCaoDeBao" => $buoi_chieucaobobao,
                        "chieuRongDeBao" => $buoi_chieurongbobao,
                        "cgBongSl" => $buoi_slongbong,
                        "cgBongDgKinh" => $buoi_duongkinhongbong,
                        "cgBongCachDat" => $buoi_cachdatongbong,
                        "quanLyCoDai" => $buoi_quanlycodai
                    ),
                    "kyThuatBonPhan" => array(
                        "bpThoiKyCay01" => $buoi_phanbon_thoiky1,
                        "bpThoiKyCay02" => $buoi_phanbon_thoiky2,
                        "bpThoiKyCay03" => $buoi_phanbon_thoiky3,
                        "bpThoiKyCay04" => $buoi_phanbon_thoiky4,
                        "bpThoiKyCay05" => $buoi_phanbon_thoiky5,
                        "bpThoiKyCay06" => $buoi_phanbon_thoiky6,
                        "bpThoiKyCay07" => $buoi_phanbon_thoiky7,
                        "bpThoiKyCay08" => $buoi_phanbon_thoiky8,
                        "bpThoiDiemBon01" => $buoi_phanbon_thoidiem1,
                        "bpThoiDiemBon02" => $buoi_phanbon_thoidiem2,
                        "bpThoiDiemBon03" => $buoi_phanbon_thoidiem3,
                        "bpThoiDiemBon04" => $buoi_phanbon_thoidiem4,
                        "bpThoiDiemBon05" => $buoi_phanbon_thoidiem5,
                        "bpThoiDiemBon06" => $buoi_phanbon_thoidiem6,
                        "bpThoiDiemBon07" => $buoi_phanbon_thoidiem7,
                        "bpThoiDiemBon08" => $buoi_phanbon_thoidiem8,
                        "bpLoaiPhan01" => $buoi_phanbon_loaiphan1,
                        "bpLoaiPhan02" => $buoi_phanbon_loaiphan2,
                        "bpLoaiPhan03" => $buoi_phanbon_loaiphan3,
                        "bpLoaiPhan04" => $buoi_phanbon_loaiphan4,
                        "bpLoaiPhan05" => $buoi_phanbon_loaiphan5,
                        "bpLoaiPhan06" => $buoi_phanbon_loaiphan6,
                        "bpLoaiPhan07" => $buoi_phanbon_loaiphan7,
                        "bpLoaiPhan08" => $buoi_phanbon_loaiphan8,
                        "lieuLuongBp01" => $buoi_phanbon_lieuluong1,
                        "lieuLuongBp02" => $buoi_phanbon_lieuluong2,
                        "lieuLuongBp03" => $buoi_phanbon_lieuluong3,
                        "lieuLuongBp04" => $buoi_phanbon_lieuluong4,
                        "lieuLuongBp05" => $buoi_phanbon_lieuluong5,
                        "lieuLuongBp06" => $buoi_phanbon_lieuluong6,
                        "lieuLuongBp07" => $buoi_phanbon_lieuluong7,
                        "lieuLuongBp08" => $buoi_phanbon_lieuluong8,
                        "cachBon01" => $buoi_phanbon_cachbon1,
                        "cachBon02" => $buoi_phanbon_cachbon2,
                        "cachBon03" => $buoi_phanbon_cachbon3,
                        "cachBon04" => $buoi_phanbon_cachbon4,
                        "cachBon05" => $buoi_phanbon_cachbon5,
                        "cachBon06" => $buoi_phanbon_cachbon6,
                        "cachBon07" => $buoi_phanbon_cachbon7,
                        "cachBon08" => $buoi_phanbon_cachbon8,
                        "hieuQuaBp01" => $buoi_phanbon_thoigiantuoi1,
                        "hieuQuaBp02" => $buoi_phanbon_thoigiantuoi2,
                        "hieuQuaBp03" => $buoi_phanbon_thoigiantuoi3,
                        "hieuQuaBp04" => $buoi_phanbon_thoigiantuoi4,
                        "hieuQuaBp05" => $buoi_phanbon_thoigiantuoi5,
                        "hieuQuaBp06" => $buoi_phanbon_thoigiantuoi6,
                        "hieuQuaBp07" => $buoi_phanbon_thoigiantuoi7,
                        "hieuQuaBp08" => $buoi_phanbon_thoigiantuoi8,
                    ),
                    "thuocBVTV" => array(
                        "bvTvThKyCay01" => $buoi_bvtv_thoiky1,
                        "bvTvThKyCay02" => $buoi_bvtv_thoiky2,
                        "bvTvThKyCay03" => $buoi_bvtv_thoiky3,
                        "bvTvThKyCay04" => $buoi_bvtv_thoiky4,
                        "bvTvThKyCay05" => $buoi_bvtv_thoiky5,
                        "bvTvThKyCay06" => $buoi_bvtv_thoiky6,
                        "bvTvThKyCay07" => $buoi_bvtv_thoiky7,
                        "bvTvThKyCay08" => $buoi_bvtv_thoiky8,
                        "bvTvThDiemBon01" => $buoi_bvtv_thoidiem1,
                        "bvTvThDiemBon02" => $buoi_bvtv_thoidiem2,
                        "bvTvThDiemBon03" => $buoi_bvtv_thoidiem3,
                        "bvTvThDiemBon04" => $buoi_bvtv_thoidiem4,
                        "bvTvThDiemBon05" => $buoi_bvtv_thoidiem5,
                        "bvTvThDiemBon06" => $buoi_bvtv_thoidiem6,
                        "bvTvThDiemBon07" => $buoi_bvtv_thoidiem7,
                        "bvTvThDiemBon08" => $buoi_bvtv_thoidiem8,
                        "bvTvLoaiSau01" => $buoi_bvtv_loaisau1,
                        "bvTvLoaiSau02" => $buoi_bvtv_loaisau2,
                        "bvTvLoaiSau03" => $buoi_bvtv_loaisau3,
                        "bvTvLoaiSau04" => $buoi_bvtv_loaisau4,
                        "bvTvLoaiSau05" => $buoi_bvtv_loaisau5,
                        "bvTvLoaiSau06" => $buoi_bvtv_loaisau6,
                        "bvTvLoaiSau07" => $buoi_bvtv_loaisau7,
                        "bvTvLoaiSau08" => $buoi_bvtv_loaisau8,
                        "bvTvLoaiThuoc01" => $buoi_bvtv_loaithuoc1,
                        "bvTvLoaiThuoc02" => $buoi_bvtv_loaithuoc2,
                        "bvTvLoaiThuoc03" => $buoi_bvtv_loaithuoc3,
                        "bvTvLoaiThuoc04" => $buoi_bvtv_loaithuoc4,
                        "bvTvLoaiThuoc05" => $buoi_bvtv_loaithuoc5,
                        "bvTvLoaiThuoc06" => $buoi_bvtv_loaithuoc6,
                        "bvTvLoaiThuoc07" => $buoi_bvtv_loaithuoc7,
                        "bvTvLoaiThuoc08" => $buoi_bvtv_loaithuoc8,
                        "bvTvLieuLuong01" => $buoi_bvtv_lieuluong1,
                        "bvTvLieuLuong02" => $buoi_bvtv_lieuluong2,
                        "bvTvLieuLuong03" => $buoi_bvtv_lieuluong3,
                        "bvTvLieuLuong04" => $buoi_bvtv_lieuluong4,
                        "bvTvLieuLuong05" => $buoi_bvtv_lieuluong5,
                        "bvTvLieuLuong05" => $buoi_bvtv_lieuluong6,
                        "bvTvLieuLuong07" => $buoi_bvtv_lieuluong7,
                        "bvTvLieuLuong08" => $buoi_bvtv_lieuluong8,
                        "bvTvHieuQua01" => $buoi_bvtv_hieuqua1,
                        "bvTvHieuQua02" => $buoi_bvtv_hieuqua2,
                        "bvTvHieuQua03" => $buoi_bvtv_hieuqua3,
                        "bvTvHieuQua04" => $buoi_bvtv_hieuqua4,
                        "bvTvHieuQua05" => $buoi_bvtv_hieuqua5,
                        "bvTvHieuQua06" => $buoi_bvtv_hieuqua6,
                        "bvTvHieuQua07" => $buoi_bvtv_hieuqua7,
                        "bvTvHieuQua08" => $buoi_bvtv_hieuqua8,
                    ),
                    "thuHoach" => array(
                        "thGianThuHoach" => $buoi_thoigianthuhoach,
                        "dacDiemThuHoach" => $buoi_dacdiemthuhoach,
                        "soLanThuHoach" => $buoi_solanthuhoach,
                        "nangSuatMuaThuan" => $buoi_nsmuathuan,
                        "nangSuatMuaNghich" => $buoi_nsmuanghich,
                        "sanLuongMuaThuan" => $buoi_slmuathuan,
                        "sanLuongMuaNghich" => $buoi_slmuanghich,
                        "giaBanLoai1Th01" => $buoi_dongia_l1t1,
                        "giaBanLoai1Th02" => $buoi_dongia_l1t2,
                        "giaBanLoai1Th03" => $buoi_dongia_l1t3,
                        "giaBanLoai1Th04" => $buoi_dongia_l1t4,
                        "giaBanLoai1Th05" => $buoi_dongia_l1t5,
                        "giaBanLoai1Th06" => $buoi_dongia_l1t6,
                        "giaBanLoai1Th07" => $buoi_dongia_l1t7,
                        "giaBanLoai1Th08" => $buoi_dongia_l1t8,
                        "giaBanLoai1Th09" => $buoi_dongia_l1t9,
                        "giaBanLoai1Th10" => $buoi_dongia_l1t10,
                        "giaBanLoai1Th11" => $buoi_dongia_l1t11,
                        "giaBanLoai1Th12" => $buoi_dongia_l1t12,
                        "giaBanLoai2Th01" => $buoi_dongia_l2t1,
                        "giaBanLoai2Th02" => $buoi_dongia_l2t2,
                        "giaBanLoai2Th03" => $buoi_dongia_l2t3,
                        "giaBanLoai2Th04" => $buoi_dongia_l2t4,
                        "giaBanLoai2Th05" => $buoi_dongia_l2t5,
                        "giaBanLoai2Th06" => $buoi_dongia_l2t6,
                        "giaBanLoai2Th07" => $buoi_dongia_l2t7,
                        "giaBanLoai2Th08" => $buoi_dongia_l2t8,
                        "giaBanLoai2Th09" => $buoi_dongia_l2t9,
                        "giaBanLoai2Th10" => $buoi_dongia_l2t10,
                        "giaBanLoai2Th11" => $buoi_dongia_l2t11,
                        "giaBanLoai2Th12" => $buoi_dongia_l2t12,
                        "giaBanLoai3Th1" => $buoi_dongia_l3t1,
                        "giaBanLoai3Th2" => $buoi_dongia_l3t2,
                        "giaBanLoai3Th3" => $buoi_dongia_l3t3,
                        "giaBanLoai3Th4" => $buoi_dongia_l3t4,
                        "giaBanLoai3Th5" => $buoi_dongia_l3t5,
                        "giaBanLoai3Th6" => $buoi_dongia_l3t6,
                        "giaBanLoai3Th7" => $buoi_dongia_l3t7,
                        "giaBanLoai3Th8" => $buoi_dongia_l3t8,
                        "giaBanLoai3Th9" => $buoi_dongia_l3t9,
                        "giaBanLoai3Th10" => $buoi_dongia_l3t10,
                        "giaBanLoai3Th11" => $buoi_dongia_l3t11,
                        "giaBanLoai3Th12" => $buoi_dongia_l3t12,
                    ),
                    "thiTruongTieuThu" => array(
                        "thiTruongThieuThu" => $buoi_thitruongtieuthu,
                        "tinhNgoai" => $buoi_thitruongngoaitinh
                    )
                );
                $curl_post_data =  array(
                    "maDinhDanh"       => $row["MAVUNGTRONG"],
                    "updateData"       => $curl_data_edit
                );
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/edit-info/'.$row["LOAISANPHAM"],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                return $response;
            } else {
                return json_encode(array('status' => false, "message" => "Chưa có thông tin mã định danh"));
            }
        }

        public function FUpdateTomApiVfarmID($sodienthoai,$madinhdanh,$tom_thongtinsp,
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
            $tom_thitruongtieuthu_xuatkhau,$key){
    $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:sodienthoai,:madinhdanh);");
            $stmt -> bindParam(':sodienthoai', $sodienthoai, PDO::PARAM_STR);
            $stmt -> bindParam(':madinhdanh', $madinhdanh, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
                $curl_data_edit =  array(
                    "thongTinChung" => array(
                        "dienTichTom" => $thongtinchung_dientich,
                        "dienTichTomSu" => $thongtinchung_dientichtomsu,
                        "dienTichTomTct" => $thongtinchung_dientichtomtct
                    ),
                    "thongTinSanXuat" => array(
                        "doiTuongSxTom" => $tom_thongtinsp,
                        "loaiHinhSxTom" => $thongtinchung_loaihinhsxtom,
                        "loaiDatTom" => $thongtinchung_loaidatsx,
                        "saCauDatTom" => $thongtinchung_sacaudat,
                        "doPhTrungBinh" => $thongtinchung_dophtrungbinh,
                        "aoTomSau" => $thongtinchung_aotomsau,
                        "tenVuTom" => $thongtinchung_vutom
                    ),
                    "hoatDongSanXuat" => array(
                        "danQuatNuoiTom" => $tom_danquat,
                        "mayDuPhongDien" => $tom_mayphongdien,
                        "thietBiDayDien" => $tom_daydien,
                        "denChieuSang" => $tom_denchieusang,
                        "mayBomNuoc" => $tom_maybomnuoc,
                        "tuiLocNuoc" => $tom_tuilocnuoc,
                        "congCapXaNuoc" => $tom_congxanuoc,
                        "thietBiKhac" => $tom_thietbi_khac,
                        "caiTaoCongTrinh" => $tom_caitaocongtrinh,
                        "senVetAo" => $tom_senvetao,
                        "lotBatBoBatDay" => $tom_lotbatbobatday,
                        "giaCoBoBao" => $tom_giacobobao,
                        "bonVoi" => $tom_bonvoi,
                        "lieuLuongBonVoi" => $tom_lieuluongbonvoi,
                        "phoiMatTrang" => $tom_phoimattrang,
                        "phoiBaoNhieuNgay" => $tom_phoingay,
                        "xuLyNuoc" => $tom_xulynuoc,
                        "dietTapThoiGian" => $tom_dt_thoigian,
                        "dietTapTenThuoc" => $tom_dt_tenthuoc,
                        "dietTapLieuLuong" => $tom_dt_lieuluong,
                        "dietTapCachBon" => $tom_dt_cachbon,
                        "dietTapHieuQua" => $tom_dt_hieuqua,
                        "dietkhuanThoiGian" => $tom_dk_thoigian,
                        "dietkhuanTenThuoc" => $tom_dk_tenthuoc,
                        "dietkhuanLieuLuong" => $tom_dk_lieuluong,
                        "dietkhuanCachBon" => $tom_dk_cachbon,
                        "dietkhuanHieuQua" => $tom_dk_hieuqua,
                        "gaymaunuocThoiGian" => $tom_gmn_thoigian,
                        "gaymaunuocTenThuoc" => $tom_gmn_tenthuoc,
                        "gaymaunuocLieuLuong" => $tom_gmn_lieuluong,
                        "gaymaunuocCachBon" => $tom_gmn_cachbon,
                        "gaymaunuocHieuQua" => $tom_gmn_hieuqua,
                        "cayvisinhThoiGian" => $tom_cvs_thoigian,
                        "cayvisinhTenThuoc" => $tom_cvs_tenthuoc,
                        "cayvisinhLieuLuong" => $tom_cvs_lieuluong,
                        "cayvisinhCachBon" => $tom_cvs_cachbon,
                        "cayvisinhHieuQua" => $tom_cvs_hieuqua,
                        "xulykhacThoiGian" => $tom_kh_thoigian,
                        "xulykhacTenThuoc" => $tom_kh_tenthuoc,
                        "xulykhacLieuLuong" => $tom_kh_lieuluong,
                        "xulykhacCachBon" => $tom_kh_cachbon,
                        "xulykhacHieuQua" => $tom_kh_hieuqua,
                        "kiemTraYeuToMoiTruong" => $tom_yeutomt,
                        "giongTomGanNhat" => $tom_gionggannhat,
                        "nguonGocTom" => $tom_nguongoctom,
                        "giayXacNhanNguonGocTom" => $tom_giayxacnhangiong,
                        "matDoTha" => $tom_matdotha,
                        "thoiGianThaTom" => $tom_thoigiantha,
                        "huongTha" => $tom_huongtha,
                        "uongGieo" => $tom_uonggieo,
                        "suDungThuocNguaBenh" => $tom_sdthuocnguabenh,
                        "soVoiTruocDay" => $tom_sthuocsovoitruocday,
                        "suDungMenViSinh" => $tom_sdmenvisinh,
                        "kiemTraMoiTruong" => $tom_kiemtramt,
                        "quanLyNuocNuoiTom" => $tom_quanlynuocmt,
                        "tinhHinhDichBenhEMS" => $tom_dichbenhems,
                        "soAoBiBenh" => $tom_soaobibenh,
                        "benhDomTrang" => $tom_benhdomtrang,
                        "benhDomTrangSoSanh" => $tom_benhdomtrang_sosanh,
                        "benhDauVang" => $tom_benhdauvang,
                        "benhDauVangSoSanh" => $tom_benhdauvang_sosanh,
                        "benhIHHnv" => $tom_benhIHHNV,
                        "benhIHHnvSoSanh" => $tom_benhIHHNV_sosanh,
                        "benhPhanTrang" => $tom_benhphantrang,
                        "benhPhanTrangSoSanh" => $tom_benhphantrang_sosanh,
                        "benhIMNV" => $tom_benhIMNV,
                        "benhIMNVSoSanh" => $tom_benhIMNV_sosanh,
                        "viBaoTuTrung" => $tom_vibaotutrung,
                        "thoiGianXuatHien" => $tom_vibao_thoigian,
                        "coXuLyAoKhiChetNhieu" => $tom_xlaokhichetnhieu,
                        "php" => $tom_xuly_php,
                        "phongtribenhdomtrangthoigian" => $tom_domtrang_thoigian,
                        "phongtribenhdomtrangphuongphap" => $tom_domtrang_tenthuoc,
                        "phongtribenhdomtranglieuluong" => $tom_domtrang_lieuluong,
                        "phongtribenhdomtrangcachbon" => $tom_domtrang_cachbon,
                        "phongtribenhdomtranghieuqua" => $tom_domtrang_hieuqua,
                        "phongtribenhdauvangthoigian" => $tom_dauvang_thoigian,
                        "phongtribenhdauvangphuongphap" => $tom_dauvang_tenthuoc,
                        "phongtribenhdauvanglieuluong" => $tom_dauvang_lieuluong,
                        "phongtribenhdauvangcachbon" => $tom_dauvang_cachbon,
                        "phongtribenhdauvanghieuqua" => $tom_dauvang_hieuqua,
                        "phongtribenhIHHNVthoigian" => $tom_ihhnv_thoigian,
                        "phongtribenhIHHNVphuongphap" => $tom_ihhnv_tenthuoc,
                        "phongtribenhIHHNVlieuluong" => $tom_ihhnv_lieuluong,
                        "phongtribenhIHHNVcachbon" => $tom_ihhnv_cachbon,
                        "phongtribenhIHHNVhieuqua" => $tom_ihhnv_hieuqua,
                        "phongtribenhphantrangthoigian" => $tom_phantrang_thoigian,
                        "phongtribenhphantrangphuongphap" => $tom_phantrang_tenthuoc,
                        "phongtribenhphantranglieuluong" => $tom_phantrang_lieuluong,
                        "phongtribenhphantrangcachbon" => $tom_phantrang_cachbon,
                        "phongtribenhphantranghieuqua" => $tom_phantrang_hieuqua,
                        "phongtribenhIMNVthoigian" => $tom_imnv_thoigian,
                        "phongtribenhIMNVphuongphap" => $tom_imnv_tenthuoc,
                        "phongtribenhIMNVlieuluong" => $tom_vbtt_lieuluong,
                        "phongtribenhIMNVcachbon" => $tom_imnv_cachbon,
                        "phongtribenhIMNVhieuqua" => $tom_imnv_hieuqua,
                        "phongtribenhvibaotutrungthoigian" => $tom_vbtt_thoigian,
                        "phongtribenhvibaotutrungphuongphap" => $tom_vbtt_tenthuoc,
                        "phongtribenhvibaotutrunglieuluong" => $tom_vbtt_lieuluong,
                        "phongtribenhvibaotutrungcachbon" => $tom_vbtt_cachbon,
                        "phongtribenhvibaotutrunghieuqua" => $tom_vbtt_hieuqua,
                        "cachChoTomAn" => $tom_cachchoan,
                        "soLanChoAn" => $tom_solanchoan,
                        "soSangAn" => $tom_sosangan,
                        "coTronThucAnKhac" => $tom_phoitromthucan,
                        "tomTenThuoc01" => $tom_thucan_ten1,
                        "tomThoiGian01" => $tom_thucan_thoigian1,
                        "tomLieuLuong01" => $tom_thucan_lieuluong1,
                        "tomCachBon01" => $tom_thucan_cachbon1,
                        "tomHieuQua01" => $tom_thucan_hieuqua1,
                        "tomTenThuoc02" => $tom_thucan_ten2,
                        "tomThoiGian02" => $tom_thucan_thoigian2,
                        "tomLieuLuong02" => $tom_thucan_lieuluong2,
                        "tomCachBon02" => $tom_thucan_cachbon2,
                        "tomHieuQua02" => $tom_thucan_hieuqua2,
                        "tomTenThuoc03" => $tom_thucan_ten3,
                        "tomThoiGian03" => $tom_thucan_thoigian3,
                        "tomLieuLuong03" => $tom_thucan_lieuluong3,
                        "tomCachBon03" => $tom_thucan_cachbon3,
                        "tomHieuQua03" => $tom_thucan_hieuqua3,
                        "kiemTraPhTrongAo" => $tom_ktdoph,
                        "tanSuatKiemTraPh" => $tom_ktdoph_solan,
                        "kiemTraKiemTrongAo" => $tom_ktdokiem,
                        "tanSuatKiemTraKiem" => $tom_ktdokiem_solan,
                        "duyTriDoKiem" => $tom_duytridokiem,
                        "quanlymoitruongduytridokiemthoigian" => $tom_dokiem_thoigian,
                        "quanlymoitruongduytridokiemtenthuoc" => $tom_dokiem_tenthuoc,
                        "quanlymoitruongduytridokiemlieuluong" => $tom_dokiem_lieuluong,
                        "quanlymoitruongduytridokiemcachbon" => $tom_dokiem_cachbon,
                        "quanlymoitruongduytridokiemhieuqua" => $tom_dokiem_hieuqua,
                        "quanlymoitruongbosungkhoangthoigian" => $tom_bskhoang_thoigian,
                        "quanlymoitruongbosungkhoangtenthuoc" => $tom_bskhoang_tenthuoc,
                        "quanlymoitruongbosungkhoanglieuluong" => $tom_bskhoang_lieuluong,
                        "quanlymoitruongbosungkhoangcachbon" => $tom_bskhoang_cachbon,
                        "quanlymoitruongbosungkhoanghieuqua" => $tom_bskhoang_hieuqua,
                        "quanlymoitruongcayvisinhthoigian" => $tom_cayvisinh_thoigian,
                        "quanlymoitruongcayvisinhtenthuoc" => $tom_cayvisinh_tenthuoc,
                        "quanlymoitruongcayvisinhlieuluong" => $tom_cayvisinh_lieuluong,
                        "quanlymoitruongcayvisinhcachbon" => $tom_cayvisinh_cachbon,
                        "quanlymoitruongcayvisinhhieuqua" => $tom_cayvisinh_hieuqua,
                        "quanlymoitruongchephamsinhhocthoigian" => $tom_cpsinhhoc_thoigian,
                        "quanlymoitruongchephamsinhhoctenthuoc" => $tom_cpsinhhoc_tenthuoc,
                        "quanlymoitruongchephamsinhhoclieuluong" => $tom_cpsinhhoc_lieuluong,
                        "quanlymoitruongchephamsinhhoccachbon" => $tom_cpsinhhoc_cachbon,
                        "quanlymoitruongchephamsinhhochieuqua" => $tom_cpsinhhoc_hieuqua,
                        "quanlymoitruongdinhduongmentieuhoathoigian" => $tom_dinhduong_thoigian,
                        "quanlymoitruongdinhduongmentieuhoatenthuoc" => $tom_dinhduong_tenthuoc,
                        "quanlymoitruongdinhduongmentieuhoalieuluong" => $tom_dinhduong_lieuluong,
                        "quanlymoitruongdinhduongmentieuhoacachbon" => $tom_dinhduong_cachbon,
                        "quanlymoitruongdinhduongmentieuhoahieuqua" => $tom_dinhduong_hieuqua,
                        "xaTrucTiep" => $tom_xatructiep,
                        "xuLyTruocKhiThai" => $tom_xltruocthai,
                        "phPhapXuLyTruocKhiThai" => $tom_xltruocthai_pp,
                        "xuLyBunThai" => $tom_xlbunthai,
                        "phPhapXuLyBunThai" => $tom_xlbunthai_pp
                    ),
                    "thuHoach" => array(
                        "thGianThaNuoiThuHoach" => $tom_nuoithuhoach,
                        "soLanThuHoach" => $tom_thuhoach_solan,
                        "trgLgTieuChuan" => $tom_thuhoach_trongluong,
                        "nangSuatTomMuaThuan" => $tom_nsmuathuan,
                        "nangSuatTomMuaNghich" => $tom_nsmuanghich,
                        "sanLuongTomMuaThuan" => $tom_slmuathuan,
                        "sanLuongTomMuaNghich" => $tom_slmuanghich,
                        "thuhoachgiabansize1thang1" => $tom_dongia_l1t1,
                        "thuhoachgiabansize1thang2" => $tom_dongia_l1t2,
                        "thuhoachgiabansize1thang3" => $tom_dongia_l1t3,
                        "thuhoachgiabansize1thang4" => $tom_dongia_l1t4,
                        "thuhoachgiabansize1thang5" => $tom_dongia_l1t5,
                        "thuhoachgiabansize1thang6" => $tom_dongia_l1t6,
                        "thuhoachgiabansize1thang7" => $tom_dongia_l1t7,
                        "thuhoachgiabansize1thang8" => $tom_dongia_l1t8,
                        "thuhoachgiabansize1thang9" => $tom_dongia_l1t9,
                        "thuhoachgiabansize1thang10" => $tom_dongia_l1t10,
                        "thuhoachgiabansize1thang11" => $tom_dongia_l1t11,
                        "thuhoachgiabansize1thang12" => $tom_dongia_l1t12,
                        "thuhoachgiabansize2thang1" => $tom_dongia_l2t1,
                        "thuhoachgiabansize2thang2" => $tom_dongia_l2t2,
                        "thuhoachgiabansize2thang3" => $tom_dongia_l2t3,
                        "thuhoachgiabansize2thang4" => $tom_dongia_l2t4,
                        "thuhoachgiabansize2thang5" => $tom_dongia_l2t5,
                        "thuhoachgiabansize2thang6" => $tom_dongia_l2t6,
                        "thuhoachgiabansize2thang7" => $tom_dongia_l2t7,
                        "thuhoachgiabansize2thang8" => $tom_dongia_l2t8,
                        "thuhoachgiabansize2thang9" => $tom_dongia_l2t9,
                        "thuhoachgiabansize2thang10" => $tom_dongia_l2t10,
                        "thuhoachgiabansize2thang11" => $tom_dongia_l2t11,
                        "thuhoachgiabansize2thang12" => $tom_dongia_l2t12,
                        "thuhoachgiabansize3thang1" => $tom_dongia_l3t1,
                        "thuhoachgiabansize3thang2" => $tom_dongia_l3t2,
                        "thuhoachgiabansize3thang3" => $tom_dongia_l3t3,
                        "thuhoachgiabansize3thang4" => $tom_dongia_l3t4,
                        "thuhoachgiabansize3thang5" => $tom_dongia_l3t5,
                        "thuhoachgiabansize3thang6" => $tom_dongia_l3t6,
                        "thuhoachgiabansize3thang7" => $tom_dongia_l3t7,
                        "thuhoachgiabansize3thang8" => $tom_dongia_l3t8,
                        "thuhoachgiabansize3thang9" => $tom_dongia_l3t9,
                        "thuhoachgiabansize3thang10" => $tom_dongia_l3t10,
                        "thuhoachgiabansize3thang11" => $tom_dongia_l3t11,
                        "thuhoachgiabansize3thang12" => $tom_dongia_l3t12
                    ),
                    "thiTruongTieuThu" => array(
                        "tieuThuTom" => $tom_thitruongtieuthu,
                        "ngoaiTinhTieuThuTom" => $tom_thitruongtieuthu_ngoaitinh,
                        "ngoaiNuocTieuThuTom" => $tom_thitruongtieuthu_xuatkhau
                    )
                );
                $curl_post_data =  array(
                    "maDinhDanh"       => $row["MAVUNGTRONG"],
                    "updateData"       => $curl_data_edit
                );
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/edit-info/'.$row["LOAISANPHAM"],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                return $response;
            } else {
                return json_encode(array('status' => false, "message" => "Chưa có thông tin mã định danh"));
            }

        }

        public function FUpdateInFoApiVfarmID($SDT, $MAXACNHAN, $madinhdanh){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:SDT, :madinhdanh);");
            $stmt -> bindParam(':SDT', $SDT, PDO::PARAM_STR);
            $stmt -> bindParam(':madinhdanh', $madinhdanh, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch();
                $arr_header = "Authorization: Bearer h9yrbI2BBWQZu1LL8wEd3ubWIpELm8s5vj8DZ4kuuIWiba4wNYyPG7RSvtJxiUgd6pdKq6QIRFpB44IqFjAWbMtrBZAelh7FfMd680wpmKDVtkdkihyi0tiBqBvjIYA8FAfOzcNCfamd7tPROKgEt9dLLLvYLyu1";
                $curl_post_data =  array(
                    "maDinhDanh"        => $row["MAVUNGTRONG"], // $MADINHDANH $row["MAVUNGTRONG"]
                    "loaiSanPham"       => $row["LOAISANPHAM"] //$LOAISANPHAM
                );
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://113.161.136.250:8080/tracebility/pmct-api/get-info',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($curl_post_data),
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                return $response;
            } else {
                return json_encode(array('status' => false, "message" => "Chưa có thông tin mã định danh"));
            }
        }

        function base64url_encode($data) {
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        }

        function generate_jwt($headers_encoded, $payload_encoded, $signature_encoded) {
            $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
            $_SESSION["SECRET_KEY"] = $jwt;
            return $jwt;
        }        
    }
?>