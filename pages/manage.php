<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý các vùng định danh</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="lib/images/vnpt_icon.ico" type="image/x-icon">
        <link href="lib/css/app_style.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
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
    </style>
<body>
    <div class="w3-container w3-green">
        <h1>QUẢN LÝ DANH SÁCH VÙNG ĐỊNH DANH</h1> 
        <!--<p>Thông tin</p> -->
    </div>
    <div class="w3-row-padding">
        <div class="w3-col">
            <div class="w3-col">
                <div id="listvungtrong"></div>
            </div>
            <div class="w3-col">
            <input type="hidden" id="idmavungtrong" name="idmavungtrong" />
                <table style="width: 100%">
                    <tr>
                        <td align="center">
                            <input type="button" value="XEM DANH SÁCH VÙNG TRỒNG" id='xemdanhsachvungtrong' class="qt_button"/>
                            <input type="button" value="XEM THÔNG TIN VÙNG TRỒNG" id='xemthongtinvungtrong' class="qt_button"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div title="Về đầu trang" id="top-up">
    <i class="fas fa-arrow-circle-up"></i></div>
    <script type="text/javascript">
        var source_listvungtrong;
        var offset = 50;
        var duration = 500;
        $(document).ready(function () {
            $("#xemthongtinvungtrong").jqxButton({ width: 240, height: 40 });
            $("#xemdanhsachvungtrong").jqxButton({ width: 240, height: 40 });
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
                    { name: 'TRANGTHAI'}
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
                height: '650',
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
                    { text: 'Trạng Thái', datafield: 'TRANGTHAI', width: 150, align: 'center', cellsalign: 'center'}
                ]
            });
            $('#listvungtrong').on('rowclick', function (event) {
                var args = event.args;
                var rowBoundIndex = args.rowindex;
                var selectedRowData_dsvungtrong = $('#listvungtrong').jqxGrid('getrowdata', rowBoundIndex);
                $("#idmavungtrong").val(selectedRowData_dsvungtrong.ID);
            });
            $("#xemthongtinvungtrong").click(function(){
                var mavungtrong = $("#idmavungtrong").val();
                if (mavungtrong) {
                    window.open("go?page=_thongtinvungtrong&ID="+mavungtrong, '_blank');
                } else {
                    alert("Chưa chọn vùng định danh.");
                }
            });
            $("#xemdanhsachvungtrong").click(function(){
                loadDSvungtrong();
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

