<!DOCTYPE html>
<html>
    <head>
        <title>Kiểm tra thông tin</title>
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
        .w3-row-padding{
            margin-top: 30px
        }
    </style>
<body>
    <header>
        <div class="w3-container w3-green">
            <h1>CẬP NHẬT VÙNG TRỒNG</h1>
        </div>
        <div class="w3-row-padding">
            <?php
				$arr_header = "Authorization: VNPTSTG eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6InNvY3RyYW5nIiwiZXhwIjoxNjc5NDU4NjAyfQ.wbHGDO4UliQYDBp64YNkqa8prmeAAZuLm4A5d52clJE";
                $curl = curl_init();
                curl_setopt_array($curl, 
                    array(
                        CURLOPT_URL => 'http://localhost/service_quangtrac/api/get_alldata.php',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array(
                            $arr_header,
                            'Content-Type: application/json'
                        ),
                    )
                );
            
                $response = curl_exec($curl);
                echo $response;
            ?>
        </div>
    </header>
    <script>
        $(function(){
            $("#xoacookie").click(function(){
                var name = "QRCODEFARM";
                document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                alert("ok");
            });
        });
    </script>
</body>
</html>