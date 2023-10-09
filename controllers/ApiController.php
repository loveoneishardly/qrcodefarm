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

        public function FUpdateApiVfarmID($sodienthoai, $thongtinchung_dientich, $giongvacachxulygiong_tengiong, $thoivu_hethu, $thoivu_thudong, $thoivu_dongxuan, $thoivu_xuanhe, $phanbon_tongphanbon, $phanbon_vusanxuat, $phanbon_donvibon, $phanbon_thuchiencongviec, $phanbon_congcu, $phanbon_huuco_bonlot, $phanbon_huuco_bonlan1, $phanbon_huuco_bonlan2, $phanbon_huuco_bonlan3, $phanbon_huuco_bonlan4, $phanbon_huuco_bonlan5, $phanbon_huuco_note, $phanbon_caitaodat_bonlot, $phanbon_caitaodat_bonlan1, $phanbon_caitaodat_bonlan2, $phanbon_caitaodat_bonlan3, $phanbon_caitaodat_bonlan4, $phanbon_caitaodat_bonlan5, $phanbon_caitaodat_note, $phanbon_ure_bonlot, $phanbon_ure_bonlan1, $phanbon_ure_bonlan2, $phanbon_ure_bonlan3, $phanbon_ure_bonlan4, $phanbon_ure_bonlan5, $phanbon_ure_note, $phanbon_lan_bonlot, $phanbon_lan_bonlan1, $phanbon_lan_bonlan2, $phanbon_lan_bonlan3, $phanbon_lan_bonlan4, $phanbon_lan_bonlan5, $phanbon_lan_note, $phanbon_kali_bonlot, $phanbon_kali_bonlan1, $phanbon_kali_bonlan2, $phanbon_kali_bonlan3, $phanbon_kali_bonlan4, $phanbon_kali_bonlan5, $phanbon_kali_note, $phanbon_dap_bonlot, $phanbon_dap_bonlan1, $phanbon_dap_bonlan2, $phanbon_dap_bonlan3, $phanbon_dap_bonlan4, $phanbon_dap_bonlan5, $phanbon_dap_note, $phanbon_npk_tenphan, $phanbon_npk_bonlot, $phanbon_npk_bonlan1, $phanbon_npk_bonlan2, $phanbon_npk_bonlan3, $phanbon_npk_bonlan4, $phanbon_npk_bonlan5, $phanbon_npk_note, $phanbon_khac_tenphan, $phanbon_khac_bonlot, $phanbon_khac_bonlan1, $phanbon_khac_bonlan2, $phanbon_khac_bonlan3, $phanbon_khac_bonlan4, $phanbon_khac_bonlan5, $phanbon_khac_note, $phanbon_phanbonla_tenphan, $phanbon_phanbonla_bonlot, $phanbon_phanbonla_bonlan1, $phanbon_phanbonla_bonlan2, $phanbon_phanbonla_bonlan3, $phanbon_phanbonla_bonlan4, $phanbon_phanbonla_bonlan5, $phanbon_phanbonla_note, $thuocbvtv_solanphun_buouvang, $thuocbvtv_soluong_buouvang, $thuocbvtv_solanphun_truco, $thuocbvtv_soluong_truco, $thuocbvtv_solanphun_trusau, $thuocbvtv_soluong_trusau, $thuocbvtv_solanphun_truray, $thuocbvtv_soluong_truray, $thuocbvtv_solanphun_trubenh, $thuocbvtv_soluong_trubenh, $thuocbvtv_solanphun_trusautruray, $thuocbvtv_soluong_trusautruray, $thuocbvtv_solanphun_trusautrubenh, $thuocbvtv_soluong_trusautrubenh, $thuocbvtv_solanphun_truraytrubenh, $thuocbvtv_soluong_truraytrubenh, $thuocbvtv_solanphun_trusautruraytrubenh, $thuocbvtv_soluong_trusautruraytrubenh, $thuocbvtv_solanphun_lancuoi, $thuocbvtv_soluong_lancuoi, $thuocbvtv_phundinhky, $thuocbvtv_phundinhky_thoigianphun, $thuocbvtv_phundinhky_lydophun, $thuocbvtv_phunthoidiem_lan1, $thuocbvtv_phunthoidiem_lan2, $thuocbvtv_phunthoidiem_lan3, $thuocbvtv_phunthoidiem_lan4, $thuocbvtv_phunthoidiem_lan5, $thuocbvtv_phunthoidiem_lan6, $thuocbvtv_phunthoidiem_lan7, $thuocbvtv_phunthoidiem_lan8, $thuocbvtv_phunthoidiem_lan9, $thuocbvtv_phunthoidiem_lan10, $thuocbvtv_phunthoidiem_lydophun, $thuocbvtv_phunthuockhi, $thuocbvtv_thuchiencongviec, $thuocbvtv_phuongtien, $thuhoach_hethu, $thuhoach_thudong, $thuhoach_dongxuan, $thuhoach_xuanhe, $nangsuatbinhquan, $key){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:sodienthoai);");
            $stmt -> bindParam(':sodienthoai', $sodienthoai, PDO::PARAM_STR);
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
                        "pHCBonLot" => $phanbon_huuco_bonlot,
                        "pHCLan1" => $phanbon_huuco_bonlan1,
                        "pHCLan2" => $phanbon_huuco_bonlan2,
                        "pHCLan3" => $phanbon_huuco_bonlan3,
                        "pHCLan4" => $phanbon_huuco_bonlan4,
                        "pHCLan5" => $phanbon_huuco_bonlan5,
                        "pHCNote" => $phanbon_huuco_note,
                        "pCTDBonLot" => $phanbon_caitaodat_bonlot,
                        "pCTDLan1" => $phanbon_caitaodat_bonlan1,
                        "pCTDLan2" => $phanbon_caitaodat_bonlan2,
                        "pCTDLan3" => $phanbon_caitaodat_bonlan3,
                        "pCTDLan4" => $phanbon_caitaodat_bonlan4,
                        "pCTDLan5" => $phanbon_caitaodat_bonlan5,
                        "pCTDNote" => $phanbon_caitaodat_note,
                        "ureBonLot" => $phanbon_ure_bonlot,
                        "ureLan1" => $phanbon_ure_bonlan1,
                        "ureLan2" => $phanbon_ure_bonlan2,
                        "ureLan3" => $phanbon_ure_bonlan3,
                        "ureLan4" => $phanbon_ure_bonlan4,
                        "ureLan5" => $phanbon_ure_bonlan5,
                        "ureNote" => $phanbon_ure_note,
                        "pLanBonLot" => $phanbon_lan_bonlot,
                        "pLanLan1" => $phanbon_lan_bonlan1,
                        "pLanLan2" => $phanbon_lan_bonlan2,
                        "pLanLan3" => $phanbon_lan_bonlan3,
                        "pLanLan4" => $phanbon_lan_bonlan4,
                        "pLanLan5" => $phanbon_lan_bonlan5,
                        "pLanNote" => $phanbon_lan_note,
                        "pkaliBonLot" => $phanbon_kali_bonlot,
                        "pkaliLan1" => $phanbon_kali_bonlan1,
                        "pkaliLan2" => $phanbon_kali_bonlan2,
                        "pkaliLan3" => $phanbon_kali_bonlan3,
                        "pkaliLan4" => $phanbon_kali_bonlan4,
                        "pkaliLan5" => $phanbon_kali_bonlan5,
                        "pkaliNote" => $phanbon_kali_note,
                        "pdapBonLot" => $phanbon_dap_bonlot,
                        "pdapLan1" => $phanbon_dap_bonlan1,
                        "pdapLan2" => $phanbon_dap_bonlan2,
                        "pdapLan3" => $phanbon_dap_bonlan3,
                        "pdapLan4" => $phanbon_dap_bonlan4,
                        "pdapLan5" => $phanbon_dap_bonlan5,
                        "pdapNote" => $phanbon_dap_note,
                        "tenPhanNPK" => $phanbon_npk_tenphan,
                        "phNpkBonLot" => $phanbon_npk_bonlot,
                        "nhNpkLan1" => $phanbon_npk_bonlan1,
                        "nhNpkLan2" => $phanbon_npk_bonlan2,
                        "nhNpkLan3" => $phanbon_npk_bonlan3,
                        "nhNpkLan4" => $phanbon_npk_bonlan4,
                        "nhNpkLan5" => $phanbon_npk_bonlan5,
                        "phNpkTNote" => $phanbon_npk_note,
                        "tenPhKhac" => $phanbon_khac_tenphan,
                        "phKhacBonLot" => $phanbon_khac_bonlot,
                        "phKhacLan1" => $phanbon_khac_bonlan1,
                        "phKhacLan2" => $phanbon_khac_bonlan2,
                        "phKhacLan3" => $phanbon_khac_bonlan3,
                        "phKhacLan4" => $phanbon_khac_bonlan4,
                        "phKhacLan5" => $phanbon_khac_bonlan5,
                        "phKhacNote" => $phanbon_khac_note,
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

        public function FUpdateInFoApiVfarmID($SDT, $MAXACNHAN){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:SDT);");
            $stmt -> bindParam(':SDT', $SDT, PDO::PARAM_STR);
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