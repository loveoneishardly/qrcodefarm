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
    }
?>