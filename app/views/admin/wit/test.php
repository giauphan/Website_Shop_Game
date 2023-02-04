<?php

include 'header.php';
if (isset($_POST['submit'])) {

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        //Bước 1: Tạo thư mục lưu file
        $error = array();
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
        // Kiểm tra kiểu file hợp lệ
        $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
        if (!in_array(strtolower($type_file), $type_fileAllow)) {
            $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
        }
        //Kiểm tra kích thước file
        $size_file = $_FILES['fileUpload']['size'];
        if ($size_file > 5242880) {
            $error['fileUpload'] = "File bạn chọn không được quá 5MB";
        }
        // Kiểm tra file đã tồn tại trê hệ thống
        if (file_exists($target_file)) {
            $error['fileUpload'] = "File bạn chọn đã tồn tại trên hệ thống";
        }
        //
        if (empty($error)) {
            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                echo "Bạn đã upload file thành công";
                $flag = true;
            } else {
                echo "File bạn vừa upload gặp sự cố";
            }
        }
    }
}


$thongbao;
if (isset($_POST['submit'])) {

    if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {

        include '../../model/connect.php';
        $today = date("Y/m/d");
        $hinh = $_FILES['fileUpload']['name'];
        $giasp = $_POST['giasp'];
        $tuong = $_POST['tuong'];
        $rank = $_POST['rank'];
        $trang_phuc = $_POST['trang_phuc'];
        $ngoc = $_POST['ngoc'];
        $giam_gia = $_POST['giam_gia'];
        $mo_ta = $_POST['mo_ta'];
        $tai_khoan_game = $_POST['tai_khoan'];
        $password_game = $_POST['pass_acc'];
        $danh_muc = $_POST['danh_muc'];

        if (isset($_POST['submit'])) {
            $sql_submit_acc = " INSERT INTO `sp`( `hinh`, `giasp`, `rank`, `tuong`, `trang_phuc`, `ngoc`, `giam_gia`, `mo_ta`, `tai_khoan_game`, `password_game`, `ngay_nhap`, `ma_loai`, `ma_user`) VALUES ('" . $hinh . "','" . $giasp . "','" . $rank . "','" . $tuong . "','" . $trang_phuc . "','" . $ngoc . "','" . $giam_gia . "','" . $mo_ta . "','" . $tai_khoan_game . "','" . $password_game . "','" . $today . "','" . $danh_muc . "','" . $_SESSION['ma_user'] . "') ";
            mysqli_query($conn, $sql_submit_acc);
            $thongbao = true;
        }
    }
}


?>



<?php
if (isset($thongbao) && $thongbao == true) {
    echo '  <script>
        swal("chúc mừng bạn đã thay đổi gửi thành công");
    </script>';
} else if (isset($thongbao)) {

    echo '  <script>
        swal(" bạn gửi thông tin không giống form và đã gửi hệ thống xem xét và xử lý");
    </script>';
    header('location:admin_acc.php');
} else {
    echo ' <script>
        swal("Xin Chào Admin", "Chúc Bạn 1 Ngày Tốt Lành Nhé", "");
    </script>';
}
?>


<!DOCTYPE html>
<html lang="en">

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

    <title>Nhân Viên | Quản Lý Bán Hàng</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="css/style.css">
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


    <script type="text/javascript">
        //Phân Trang Cho Table
        function Pager(tableName, itemsPerPage) {
            this.tableName = tableName;
            this.itemsPerPage = itemsPerPage;
            this.currentPage = 1;
            this.pages = 0;
            this.inited = false;

            this.showRecords = function(from, to) {
                var rows = document.getElementById(tableName).rows;
                for (var i = 1; i < rows.length; i++) {
                    if (i < from || i > to)
                        rows[i].style.display = 'none';
                    else
                        rows[i].style.display = '';
                }
            }

            this.showPage = function(pageNumber) {
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

            this.prev = function() {
                if (this.currentPage > 1)
                    this.showPage(this.currentPage - 1);
            }

            this.next = function() {
                if (this.currentPage < this.pages) {
                    this.showPage(this.currentPage + 1);
                }
            }

            this.init = function() {
                var rows = document.getElementById(tableName).rows;
                var records = (rows.length - 1);
                this.pages = Math.ceil(records / itemsPerPage);
                this.inited = true;
            }
            this.showPageNav = function(pagerName, positionId) {
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
</head>

<body onload="time()">
    <div class="container">


        <?php
        if (isset($thongbao) && $thongbao == true) {
            echo '  <script>
        swal("chúc mừng bạn đã thay đổi gửi thành công");
    </script>';
        } else if (isset($thongbao)) {

            echo '  <script>
        swal(" bạn gửi thông tin không giống form và đã gửi hệ thống xem xét và xử lý");
    </script>';
            header('location:admin_acc.php');
        } else {
            echo ' <script>
        swal("Xin Chào Admin", "Chúc Bạn 1 Ngày Tốt Lành Nhé", "");
    </script>';
        }
        ?>
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
                        <li><a href="../index.php">Về trang chủ </a></li>
                        <?php echo     '<li ><a href="index.php?ma_user=' . $_SESSION['ma_user'] . '" data-toggle="tooltip" data-placement="bottom" title="Admin">Trang chủ Admin</a></li>'; ?>
                        <!-- <li><a href="" data-toggle="tooltip" data-placement="bottom" title="ĐIỂM DANH">ĐIỂM DANH</a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="bottom" title="TIỀN LƯƠNG">TIỀN LƯƠNG</a></li>
                    <li><a href="" data-toggle="tooltip" data-placement="bottom" title="LỊCH CÔNG TÁC">LỊCH CÔNG TÁC</a>
                    </li>
                    <li><a href="#contact" data-toggle="tooltip" data-placement="bottom" title="BÁO CÁO">BÁO CÁO</a>
                    </li>-->
                        <li><a href="admin_acc.php" data-toggle="tooltip" data-placement="bottom" title="Thêm sản phẩm">Thêm sản phẩm</a></li>
                        <li class="active"><a href="change_product.php" data-toggle="tooltip" data-placement="bottom" title="Sửa sản phẩm">Sửa sản phẩm</a></li>
                        <li><a href="admin_de_bl.php">Quản lý bình luận </a></li>
                        <li><a href="admin_ql_user.php">Quản lý user </a></li>
                        <li>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="TÀI KHOẢN"><b> <?php
                                                                                                            echo '  ' . $_SESSION["username_show"] . ' - ví:  <b>' . number_format($_SESSION['tien'], 0, ',', '.') . ' </b>';

                                                                                                            ?></b>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown">
                                <li><a href="/duan/Controller/outlogin.php" data-toggle="tooltip" data-placement="bottom" title="ĐĂNG XUẤT"><b>Đăng xuất <i class="fas fa-sign-out-alt"></i></b></a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

<div class="container-fluid al">
    <div id="clock">


    </div>
    <Br>

    <b>CHỨC NĂNG CHÍNH:</b><Br>
    <!--  star them sp -->
    <div class="row">
        <form id="form_upload" method="POST" enctype="multipart/form-data">
            <!-- star   block1 -->
            <div class="col">

                <!-- <div class="col1">
                            <div class="tensp">
                                <div class="text_name">
                                    <label for="tensp">tên sản phẩm</label>
                                </div>
                                <div class="inp">
                                    <input type="text" id="tensp" name="tensp" placeholder="nhập tên sp" required>
                                </div>

                            </div>
                        </div> -->

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="fileUpload">Ảnh</label>
                        </div>
                        <div class="inp">
                            <input type="file" id="fileUpload" name="fileUpload" placeholder="ảnh sp" required>
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="giasp">Giá sản phẩm</label>
                        </div>
                        <div class="inp">
                            <input type="number" id="giasp" name="giasp" placeholder="giá sp" required min="0">
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tuong">tướng</label>
                        </div>
                        <div class="inp">
                            <input type="number" id="tuong" name="tuong" placeholder="nhập tướng" required min="0">
                        </div>

                    </div>
                </div>


                <!-- end   block1 -->
                <!-- star   block2 -->

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="rank">Rank</label>
                        </div>
                        <div class="inp">
                            <select name="rank" id="rank" required>
                                <option value="cao thủ">cao thủ</option>
                                <option value="tinh anh">tinh anh</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                            <!-- <input type="text" id="rank" name="rank" placeholder="rank sản phẩm" required> -->
                        </div>

                    </div>
                </div>



                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="ngoc">Ngọc 90</label>
                        </div>
                        <div class="inp">
                            <select name="ngoc" id="ngoc" required>
                                <option value="có">có</option>
                                <option value="không">không</option>
                            </select>
                            <!-- <input type="" id="ngoc" name="ngoc" placeholder="ngọc sp" required> -->
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="trang_phuc">trang phục</label>
                        </div>
                        <div class="inp">
                            <input type="number" id="trang_phuc" name="trang_phuc" placeholder="nhập trang phục sp" required min="0">
                        </div>

                    </div>
                </div>


                <!-- end   block2 -->
                <!-- star   block3 -->





                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="giam_gia">giảm giá (%)</label>
                        </div>
                        <div class="inp">
                            <input type="text" id="giam_gia" name="giam_gia" placeholder="giảm giá sp (%)" required min="10" max="100">
                        </div>

                    </div>
                </div>


                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tai_khoan">tài khoản</label>
                        </div>
                        <div class="inp">
                            <input type="text" id="tai_khoan" name="tai_khoan" placeholder="nhập tài khoản" required>
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="pass_acc">Mật khẩu</label>
                        </div>
                        <div class="inp">
                            <input type="password" id="pass_acc" name="pass_acc" placeholder="nhập Mật khẩu" required>
                        </div>

                    </div>

                </div>



                <!-- end   block3 -->



                <div class="col1">
                    <div class="tensp">

                        <label for="pass_acc">mô tả</label>

                        <div class="inp">
                            <textarea name="mo_ta" id="mo_ta" cols="40" rows="5"></textarea>
                            <!-- <input type="text" id="pass_acc" name="pass_acc" placeholder="nhập Mật khẩu" required > -->
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="danh_muc">danh mục</label>
                        </div>
                        <div class="inp">
                            <select name="danh_muc" id="danh_muc" required>
                                <option value="1">liên quân</option>
                                <option value="2">liên minh </option>
                                <option value="3">ngọc rồng </option>
                                <option value="4">free fire </option>
                            </select>
                            <!-- <input type="" id="ngoc" name="ngoc" placeholder="ngọc sp" required> -->
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="col_btn">

                        <div class="btn">
                            <button type="submit" name="submit"> Gửi</button>
                        </div>
                    </div>
                </div>
            </div>




        </form>
    </div>

</div>
<!-- end them sp -->
</div>

</div>
<hr class="hr1">
<div class="container-fluid end">
    <div class="row text-center">
        <div class="col-lg-12 link">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-youtube"></i>
            <i class="fab fa-google"></i>
        </div>
        <div class="col-lg-12">
            2019 CopyRight Phan mem quan ly | Design by <a href="#">TruongBinIT</a>
        </div>
    </div>
</div>
<script src="jquery.min.js"></script>
<script type="text/javascript">
    //Tìm kiếm
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    //Lọc bảng
    function sortTable() {
        var table, rows, switching, i, x, y, shouldSwitch;
        table = document.getElementById("myTable");
        switching = true;
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[i + 1].getElementsByTagName("TD")[0];
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                swal("Thành Công!", "Bạn Đã Lọc Thành Công", "success");
            }
        }
    }
    //Thời Gian
    function time() {
        var today = new Date();
        var weekday = new Array(7);
        weekday[0] = "Chủ Nhật";
        weekday[1] = "Thứ Hai";
        weekday[2] = "Thứ Ba";
        weekday[3] = "Thứ Tư";
        weekday[4] = "Thứ Năm";
        weekday[5] = "Thứ Sáu";
        weekday[6] = "Thứ Bảy";
        var day = weekday[today.getDay()];
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        nowTime = h + ":" + m + ":" + s;
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = day + ', ' + dd + '/' + mm + '/' + yyyy;
        tmp = '<i class="fa fa-clock-o" aria-hidden="true"></i> <span class="date">' + today + ' | ' + nowTime +
            '</span>';
        document.getElementById("clock").innerHTML = tmp;
        clocktime = setTimeout("time()", "1000", "Javascript");

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    }

    //Thêm
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = $("table td:last-child").html();
        $(".add-new").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="name" id="name" placeholder="Nhập Tên"></td>' +
                '<td><input type="text" class="form-control" name="gioitinh" id="gioitinh" placeholder="Nhập Giới Tính"></td>' +
                '<td><input type="text" class="form-control" name="namsinh" id="namsinh" value="" placeholder="Nhập Ngày Sinh"></td>' +
                '<td><input type="text" class="form-control" name="diachi" id="diachi" value="" placeholder="Nhập Địa Chỉ"></td>' +
                '<td><input type="text" class="form-control" name="chucvu" id="chucvu" value="" placeholder="Nhập Chức Vụ"></td>' +
                '<td>' + actions + '</td>' +
                '</tr>';
            $("table").append(row);
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
        });
        //Kiểm tra rỗng
        $(document).on("click", ".add", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function() {
                if (!$(this).val()) {
                    $(this).addClass("error");
                    swal("Thông Báo!", "Dữ Liệu Trống Vui Lòng Kiểm Tra", "error");
                    empty = true;
                } else {
                    $(this).removeClass("error");
                    swal("Thông Báo!", "Bạn Chưa Nhập Dữ Liệu", "warning");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if (!empty) {
                input.each(function() {
                    $(this).parent("td").html($(this).val());
                    swal("Thành Công", "Bạn Đã Cập Nhật Thành Công", "success");
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }
        });
        // Sửa
        $(document).on("click", ".edit", function() {
            $(this).parents("tr").find("td:not(:last-child)").each(function() {
                $(this).html('<input type="text" class="form-control" value="' + $(this)
                    .text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        jQuery(function() {
            jQuery(".add").click(function() {
                swal("Thành Công!", "Bạn Đã Sửa Thành Công", "success");
            });
        });
        // Xóa
        $(document).on("click", ".delete", function() {
            $(this).parents("tr").remove();
            swal("Thành Công!", "Bạn Đã Xóa Thành Công", "success");
            $(".add-new").removeAttr("disabled");
        });
    });
    //Not use
    jQuery(function() {
        jQuery(".cog").click(function() {
            swal("Sorry!", "Tính Năng Này Chưa Có", "error");
        });
    });
    //Tool tip
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</div>
</body>

</html>