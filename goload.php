<?php
    session_start();
    include_once('controllers/AppController.php');

    if(isset($_GET['check'])) {
        ob_start();
        switch ($_GET['check']) {
            case "_home":
                include("pages/index.php");
            break;
            case "_index":
                include("pages/manage.php");
            break;
            case "_thongtinvungtrong":
                $IDVUNGTRONG = "";
                if (isset($_GET['ID'])) {
                    $IDVUNGTRONG = $_GET['ID'];
                } else {
                    $IDVUNGTRONG = "0";
                }
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
            break;
            default:
                include("pages/ferror.php");
            break;
        }
        echo ob_get_clean();
    }

    if(isset($_POST['for'])) {
        switch ($_POST['for']) {
            default:
                echo "Chức năng không tồn tại";
        }
    }

    if(isset($_GET['for'])) {
        switch ($_GET['for']) {
            case "loadlistvungtrong":
                $iddonvi = $_GET['iddonvi'];
                $res = (new AppController())->LoadListVungTrong($iddonvi);
                echo json_encode($res);
            break;
            default:
                echo "Chức năng không tồn tại";
            break;
        }
    }

    if(isset($_GET['page'])) {
        
        /*
        if(!isset($_SESSION["sansang"])){
                header("Location: go?check=_home");
        } else {
            if($_SESSION["sansang"] != "1"){
                header("Location: go?check=_home");
            }
        }
        */
        
        ob_start();

        switch ($_GET['page']) {
            case "_home":
                
                include("pages/index.php");
            break;
            case "_index":
                include("pages/manage.php");
            break;
            case "_thongtinvungtrong":
                $IDVUNGTRONG = "";
                if (isset($_GET['ID'])) {
                    $IDVUNGTRONG = $_GET['ID'];
                } else {
                    $IDVUNGTRONG = "0";
                }
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
            break;
            default:
                include("pages/ferror.php");
            break;
        }
        echo ob_get_clean();
    }
?>