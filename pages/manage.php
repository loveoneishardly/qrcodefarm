<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý các vùng định danh</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
        <link href="lib/css/app_style.css" rel="stylesheet"/>
        <script src="lib/js/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/css/css/all.css">
        <link rel="stylesheet" type="text/css" href="lib/css/css/fontawesome.css">
        <link rel="stylesheet" type="text/css" href="lib/css/css/brands.css">
        <link rel="stylesheet" type="text/css" href="lib/css/css/solid.css">
        <link rel="stylesheet" href="lib/jqwidgets/styles/jqx.base.css" type="text/css" />
        <script type="text/javascript" src="lib/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcore.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxdata.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxbuttons.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxradiobutton.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxscrollbar.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxlistbox.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxdropdownlist.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxmenu.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.edit.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.selection.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.grouping.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.columnsresize.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.filter.js"></script> 
        <script type="text/javascript" src="lib/jqwidgets/jqxdatetimeinput.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxtabs.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcheckbox.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcombobox.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxcalendar.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/globalization/globalize.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.sort.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.aggregates.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxwindow.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxloader.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxfileupload.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxnotification.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxgrid.pager.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxnumberinput.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxinput.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxtooltip.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxpanel.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxtree.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxexpander.js"></script>
        <script type="text/javascript" src="lib/jqwidgets/jqxsplitter.js"></script>
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
        .jqx-rc-all > .jqx-fill-state-normal {
            width: 130px !important;
        }
        * {
            box-sizing: border-box;
        }
    </style>
<body>
    <div class="w3-container w3-green">
        <h1>QUẢN LÝ DANH SÁCH VÙNG ĐỊNH DANH</h1> 
        <!--<p>Thông tin</p> -->
    </div>
    <div class="w3-container">
        <div class="w3-col">
            <div class="w3-col">
                <div id="listvungtrong"></div>
            </div>
            <div class="w3-col">
                <input type="hidden" id="madonvi" name="madonvi" />
                <input type="hidden" id="idmavungtrong" name="idmavungtrong" />
                <input type="hidden" id="madinhdanhvungtrong" name="madinhdanhvungtrong" />
                <input type="hidden" id="loaisanphamtrong" name="loaisanphamtrong" />
                <input type="hidden" id="session_u" name="session_u" value="<?php echo $trangthai; ?>"/>
                <input type="hidden" id="sodienthoai" name="sodienthoai" />
                <hr>
                <table style="width: 100%">
                    <tr>
                        <td align="center">
                            <input type="button" value="XEM DANH SÁCH VÙNG TRỒNG" id='xemdanhsachvungtrong' class="qt_button"/>
                            <input type="button" value="XEM THÔNG TIN VÙNG TRỒNG" id='xemthongtinvungtrong' class="qt_button"/>
                            <input type="button" value="CẬP NHẬT VÙNG TRỒNG" id='capnhatvungtrong' class="qt_button"/>
                            <input type="button" value="TẠO QR CODE" id='taoqrcode' class="qt_button"/>
                            <input type="button" value="GET INFO API" id='getinfo_api_vfarm' class="qt_button"/>
                            <input type="button" value="UPDATE INFO API" id='updateinfo_api_vfarm' class="qt_button"/>
                            <input type="button" />
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="w3-col" id="contentqrcode">
            <img src='./lib/images/vnpt.png' style='position:relative;display:block;width:240px;height:240px;margin:30px auto;' id="QRCode">
        </div>
    </div>
    <div title="Về đầu trang" id="top-up">
    <i class="fas fa-arrow-circle-up"></i></div>
    <script type="text/javascript">
        var source_listvungtrong;
        var offset = 50;
        var duration = 500;
        var currentTab = 0;
        var trangthai = ""; //$("#session_u").val();
        $(document).ready(function () {
            $("#xemthongtinvungtrong").jqxButton({ width: 240, height: 40 });
            $("#xemdanhsachvungtrong").jqxButton({ width: 240, height: 40 });
            $("#capnhatvungtrong").jqxButton({ width: 200, height: 40 });
            $("#taoqrcode").jqxButton({ width: 130, height: 40 });
            $("#getinfo_api_vfarm").jqxButton({ width: 130, height: 40 });
            $("#updateinfo_api_vfarm").jqxButton({ width: 150, height: 40 });
            $(window).scroll(function () {
                if ($(this).scrollTop() > offset)
                $('#top-up').fadeIn(duration);else
                $('#top-up').fadeOut(duration);
            });
            $('#top-up').click(function () {
                $('body,html').animate({scrollTop: 0}, duration);
            });
            source_listvungtrong = {
                datatype: "json",
                datafields: [
                    { name: 'ID'},
                    { name: 'IDDONVI'},
                    { name: 'TENVUNGTRONG'},
                    { name: 'MAVUNGTRONG'},
                    { name: 'TENNONGHO'},
                    { name: 'DIACHI'},
                    { name: 'HOPTACXA'},
                    { name: 'SANPHAMTRONG'},
                    { name: 'GHICHU'},
                    { name: 'TRANGTHAI'},
                    { name: 'LOAISANPHAM'},
                    { name: 'SODIENTHOAI'}
                ],
                url: 'go?for=loadlistvungtrong&iddonvi=1',
                cache: false,
                pagesize: 50,
                pager: function (pagenum, pagesize, oldpagenum) {
                }
            };
            var dataAdapter = new $.jqx.dataAdapter(source_listvungtrong);
            $("#listvungtrong").jqxGrid({
                source: dataAdapter,
                width: '100%',
                height: '550',
                source: dataAdapter,
                columnsresize: true,
                showfilterrow: true,
                filterable: true,
                editable: false,
                selectionmode: 'singlerow',
                showstatusbar: true,
                statusbarheight: 32,
                showaggregates: true,
                pageable: true,
                pagermode: 'simple',
                columns: [
                    { text: 'ID', datafield: 'ID', width: 70, align: 'center', cellsalign: 'center'},
                    { text: 'Mã Đơn Vị', datafield: 'IDDONVI', width: 100, align: 'center', cellsalign: 'center'},
                    { text: 'Tên Vùng Trồng', datafield: 'TENVUNGTRONG', width: 300, align: 'center', cellsalign: 'left',
                        aggregates: [{'<b>Tổng</b>':
                            function (aggregatedValue, currentValue, column, record) {
                                return aggregatedValue + 1;
                            }
                        }]
                    },
                    { text: 'Mã Vùng Trồng', datafield: 'MAVUNGTRONG', width: 200, align: 'center', cellsalign: 'center'},
                    { text: 'Tên Nông Hộ', datafield: 'TENNONGHO', width: 200, align: 'center', cellsalign: 'left'},
                    { text: 'Địa Chỉ', datafield: 'DIACHI', width: 450, align: 'center', cellsalign: 'left'},
                    { text: 'Hợp Tác Xã', datafield: 'HOPTACXA', width: 300, align: 'center', cellsalign: 'left'},
                    { text: 'Sản Phẩm Trồng', datafield: 'SANPHAMTRONG', width: 200, align: 'center', cellsalign: 'left'},
                    { text: 'Ghi Chú', datafield: 'GHICHU', width: 150, align: 'center', cellsalign: 'left'},
                    { text: 'Trạng Thái', datafield: 'TRANGTHAI', width: 150, align: 'center', cellsalign: 'center'},
                    { text: 'Loại sản phẩm', datafield: 'LOAISANPHAM', width: 150, align: 'center', cellsalign: 'center'},
                    { text: 'Số điện thoại', datafield: 'SODIENTHOAI', width: 150, align: 'center', cellsalign: 'center'}
                ]
            });
            $('#listvungtrong').on('rowclick', function (event) {
                var args = event.args;
                var rowBoundIndex = args.rowindex;
                var selectedRowData_dsvungtrong = $('#listvungtrong').jqxGrid('getrowdata', rowBoundIndex);
                $("#idmavungtrong").val(selectedRowData_dsvungtrong.ID);
                $("#madinhdanhvungtrong").val(selectedRowData_dsvungtrong.MAVUNGTRONG);
                $("#loaisanphamtrong").val(selectedRowData_dsvungtrong.LOAISANPHAM);
                $("#sodienthoai").val(selectedRowData_dsvungtrong.SODIENTHOAI);
                $("#madonvi").val(selectedRowData_dsvungtrong.IDDONVI);
            });
            $("#xemthongtinvungtrong").click(function(){
                var madonvi = $("#madonvi").val();
                var mavungtrong = $("#idmavungtrong").val();
                var loaisanpham = $("#loaisanphamtrong").val();
                if (mavungtrong != "" && trangthai == "1") {
                    window.open("go?page=_thongtinvungtrong&ID="+mavungtrong + "&loaisanpham=" + loaisanpham + "&madonvi=" + madonvi, "_blank");
                } else if (mavungtrong != "" && trangthai == "") {
					window.open("go?check=_thongtinvungtrong&ID="+mavungtrong + "&loaisanpham=" + loaisanpham + "&madonvi=" + madonvi, "_blank");
				} else {
                    alert("Chưa chọn vùng định danh.");
                }
            });
            $("#xemdanhsachvungtrong").click(function(){
                loadDSvungtrong();
            });
            $("#getinfo_api_vfarm").click(function(){
                var mavungtrong = $("#idmavungtrong").val();
                var madinhdanh = $("#madinhdanhvungtrong").val();
                $.ajax({
                    type: 'POST',
                    url: 'go',
                    data: {
                        for: "_getinfoapivfarm",
                        madinhdanh: madinhdanh,
                        loaisanpham: loaisanpham,
                        mavungtrong: mavungtrong
                    }
                }).done(function(data){
                    var jsonData = JSON.parse(data);   
                    if (jsonData.code == 200){
                        alert("Lấy thông tin thành công!");
                    } else {
                        alert("Lấy thông tin thất bại!");
                    }
                });
            });
            $("#updateinfo_api_vfarm").click(function(){
                var mavungtrong = $("#idmavungtrong").val();
                var madinhdanh = $("#madinhdanhvungtrong").val();
                var loaisanpham = $("#loaisanphamtrong").val();
                $.ajax({
                    type: 'POST',
                    url: 'go',
                    data: {
                        for: "_updateinfoapivfarm",
                        madinhdanh: madinhdanh,
                        loaisanpham: loaisanpham,
                        mavungtrong: mavungtrong
                    }
                }).done(function(data){
                    var jsonData = JSON.parse(data);   
                    if (jsonData.code == 200){
                        alert("Cập nhật thành công!");
                    } else {
                        alert("Cập nhật thất bại!");
                    }
                });
            });
            $("#taoqrcode").click(function(){
                var mavungtrong = $("#idmavungtrong").val();
                if (mavungtrong){
                    location.href='#contentqrcode';
                    $.ajax({
                        type: 'POST',
                        url: 'go',
                        data: {
                            for: "_taomaqrcode",
                            mavungtrong: mavungtrong
                        }
                    }).done(function(data){
                        $('#QRCode').attr('src', data);
                    });
                } else {
                    alert("Chưa chọn vùng định danh.");
                }
            });
            $("#capnhatvungtrong").click(function(){
                var SODIENTHOAI = $("#sodienthoai").val();
                if (SODIENTHOAI == "-1"){
                    window.open("go?check=_registerinfo", '_blank');
                } else {
                    window.open("go?check=_registerinfo"+SODIENTHOAI, '_blank');
                }
            });
        });
        function loadDSvungtrong(){
            var url_dsvungtrong = "go?for=loadlistvungtrong&iddonvi=1";
            source_listvungtrong.url = url_dsvungtrong;
            $("#listvungtrong").jqxGrid('updatebounddata');
        }
    </script>
</body>
</html>

