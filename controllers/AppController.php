<?php
    include_once('./config/db.php');

    class AppController {

        public function LoadContentPage($IDVUNGTRONG){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_load_thongtinvungtrong(:IDVUNGTRONG);");
            $stmt -> bindParam(':IDVUNGTRONG', $IDVUNGTRONG, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function LoadDSNhatky($IDVUNGTRONG){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_load_dsnhatky(:IDVUNGTRONG);");
            $stmt -> bindParam(':IDVUNGTRONG', $IDVUNGTRONG, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function LoadThongtinNhatky($IDVUNGTRONG,$IDNHATKY){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_load_thongtinnhatky(:IDVUNGTRONG,:IDNHATKY);");
            $stmt -> bindParam(':IDVUNGTRONG', $IDVUNGTRONG, PDO::PARAM_STR);
            $stmt -> bindParam(':IDNHATKY', $IDNHATKY, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function LoadListVungTrong($iddonvi){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_load_listvungtrong(:iddonvi);");
            $stmt -> bindParam(':iddonvi', $iddonvi, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FGetInFoID($IDVUNGTRONG){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_madinhdanh(:IDVUNGTRONG);");
            $stmt -> bindParam(':IDVUNGTRONG', $IDVUNGTRONG, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FUpdateInFoID($SDT){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_info_phonenumber(:SDT);");
            $stmt -> bindParam(':SDT', $SDT, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return array('status' => "false", "message" => "Chưa có thông tin số điện thoại");
            }
        }

        public function FCheckInfo($SDT){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_check_phonenumber(:SDT);");
            $stmt -> bindParam(':SDT', $SDT, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FGetPhoneNumber($madinhdanh){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_get_phonenumber(:madinhdanh);");
            $stmt -> bindParam(':madinhdanh', $madinhdanh, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function FCheckCodeApi($IDVUNGTRONG){
            $pdo = ConnectDb::getInstance()->getConnection();
            $stmt = $pdo->prepare("call p_check_codeapi(:IDVUNGTRONG);");
            $stmt -> bindParam(':IDVUNGTRONG', $IDVUNGTRONG, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>