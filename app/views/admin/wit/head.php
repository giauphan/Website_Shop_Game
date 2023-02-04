<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="author" content="Bin-It">

  
  <meta property="og:url" />

  <meta property="og:type" content="truongbinit" />

  <meta property="og:title" content="Website TruongBin" />

  <meta property="og:description" content="Wellcome to my Website" />



  <title>TRANG QUẢN TRỊ VIÊN</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <!--===============================================================================================-->

  <link rel="stylesheet" href="/assets/css/style_admin.css" type="text/css">

  <!-- Latest compiled and minified CSS -->

  <!--===============================================================================================-->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- jQuery library -->

  <!--===============================================================================================-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

  <!--===============================================================================================-->

  <!-- Latest compiled JavaScript -->

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!--===============================================================================================-->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">

  <!--===============================================================================================-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>

  <!--===============================================================================================-->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!--===============================================================================================-->

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



  <link rel="stylesheet" href="/assets/css/tesf.css">

  <script type="text/javascript">

        //PhÃ¢n Trang Cho Table

        function Pager(tableName, itemsPerPage) {

            this.tableName = tableName;

            this.itemsPerPage = itemsPerPage;

            this.currentPage = 1;

            this.pages = 0;

            this.inited = false;



            this.showRecords = function (from, to) {

                var rows = document.getElementById(tableName).rows;

                for (var i = 1; i < rows.length; i++) {

                    if (i < from || i > to)

                        rows[i].style.display = 'none';

                    else

                        rows[i].style.display = '';

                }

            }



            this.showPage = function (pageNumber) {

                if (!this.inited) {

                    alert("not inited");

                    return;

                }

                var oldPageAnchor = document.getElementById('pg' + this.currentPage);

                oldPageAnchor.className = 'pg-normal';



                this.currentPage = pageNumber;

                var newPageAnchor = document.getElementById('pg' + this.currentPage);

                newPageAnchor.className = 'pg-selected';



                var from = (pageNumber - 1) * itemsPerPage + 1;

                var to = from + itemsPerPage - 1;

                this.showRecords(from, to);

            }



            this.prev = function () {

                if (this.currentPage > 1)

                    this.showPage(this.currentPage - 1);

            }



            this.next = function () {

                if (this.currentPage < this.pages) {

                    this.showPage(this.currentPage + 1);

                }

            }



            this.init = function () {

                var rows = document.getElementById(tableName).rows;

                var records = (rows.length - 1);

                this.pages = Math.ceil(records / itemsPerPage);

                this.inited = true;

            }

            this.showPageNav = function (pagerName, positionId) {

                if (!this.inited) {

                    alert("not inited");

                    return;

                }

                var element = document.getElementById(positionId);



                var pagerHtml = '<span onclick="' + pagerName +

                    '.prev();" class="pg-normal">&#171</span> | ';

                for (var page = 1; page <= this.pages; page++)

                    pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName +

                        '.showPage(' + page + ');">' + page + '</span> | ';

                pagerHtml += '<span onclick="' + pagerName + '.next();" class="pg-normal">&#187;</span>';



                element.innerHTML = pagerHtml;

            }

        }

    </script>

  <style>

    #myInput {

      background-image: url('/css/searchicon.png');

      background-position: 10px 10px;

      background-repeat: no-repeat;

      width: 30%;

      font-size: 14px;

      padding: 12px 20px 12px 40px;

      border: 1px solid #ddd;

      margin-bottom: 12px;

      border-radius: 20px;

      outline: none !important;

    }



    @media screen and (max-width: 767px) {

      table.table {

        table-layout: initial !important;

      }



      .col {

        display: grid;

        grid-auto-rows: minmax(min-content, max-content);

        grid-template-columns: repeat(2, minmax(0, 1fr));

      }

    }



    @media screen and (max-width: 960px) {

      table.table {

        table-layout: initial !important;

      }



      .col {

        display: grid;

        grid-auto-rows: minmax(min-content, max-content);

        grid-template-columns: repeat(2, minmax(0, 1fr));

      }

    }

  </style>

</head>


<body onload="time()">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> QUẢN
                TRỊ VIÊN</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/duan/">Về trang chủ </a></li>
                <?= '<li  ><a href="/duan/admin?ma_user=' . $_SESSION['ma_user'] . '" data-toggle="tooltip" data-placement="bottom" title="Admin">Tổng quan</a></li>'; ?>
                <li><a href="?act=ql_category">Quản lý danh mục</a></li>
                <li><a href="?act=ql_user">Quản lý user </a></li>
                <li><a href="?act=ql_binhluan">Quản lý bình luận </a></li>
                <li ><a href="?act=ql_sale">Quản lý sale</a></li>
                <li><a href="?act=ql_history_recharge">Quản lý nạp thẻ </a></li>
                <li><a href="?act=ql_bill">Quản lý đặt hàng </a></li>
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="TÀI KHOẢN"><b> <?= '  ' . $_SESSION["username_show"] . ' - ví:  <b>' . number_format($tien, 0, ',', '.') . ' </b>';

                                                                                                    ?></b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="/outlogin.php" data-toggle="tooltip" data-placement="bottom" title="ĐĂNG XUẤT"><b>Đăng xuất <i class="fas fa-sign-out-alt"></i></b></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>