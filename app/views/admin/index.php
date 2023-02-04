<?php
ob_start();
session_start();
include 'model/connect.php';
include 'model/home.php';

include 'model/change_prodct.php';
include 'model/add_product.php';

include 'model/account_amin.php';
include 'model/ql_binhluan.php';


include 'model/search.php';
include 'model/category.php';

include 'model/admin-recharge-card.php';
include 'model/admin_ql_category.php';

include 'model/admin_ql_bill.php';
include 'model/admin_ql_sale.php';
include 'view/head.php';
include 'view/header.php';
if (isset($_SESSION['vai_tro']) && isset($_SESSION['ma_user'])) {

    if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {

        if (isset($_GET['act'])) {

            switch ($_GET['act']) {
                case 'del_sp':
                    if (isset($_GET['de'])) {
                        de_sp($_GET['de']);
                    }
                    include 'view/home.php';
                    break;
                case 'change_product':
                    if (isset($_POST['submit_change']) && isset($_GET['change'])) {
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $mydate = getdate(date("U"));
                        $today = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";

                        $ma_sp = $_GET['change'];


                        if (isset($_FILES['fileUpload']['name']) && $_FILES['fileUpload']['name'] != "") {
                            $hinh = $_FILES['fileUpload']['name'];
                        } else {
                            $hinh = "";
                        }

                        if (isset($_FILES['fileUpload_1']['name']) && $_FILES['fileUpload_1']['name'] != "") {
                            $hinh_1 = $_FILES['fileUpload_1']['name'];
                        } else {
                            $hinh_1 = "";
                        }

                        if (isset($_FILES['fileUpload_5']['name']) && $_FILES['fileUpload_5']['name'] != "") {
                            $hinh_5 = $_FILES['fileUpload_5']['name'];
                        } else {
                            $hinh_5 = "";
                        }
                        if (isset($_FILES['fileUpload_4']['name']) && $_FILES['fileUpload_4']['name'] != "") {
                            $hinh_4 = $_FILES['fileUpload_4']['name'];
                        } else {
                            $hinh_4 = "";
                        }
                        if (isset($_FILES['fileUpload_3']['name']) && $_FILES['fileUpload_3']['name'] != "") {
                            $hinh_3 = $_FILES['fileUpload_3']['name'];
                        } else {
                            $hinh_3 = "";
                        }
                        if (isset($_FILES['fileUpload_2']['name']) && $_FILES['fileUpload_2']['name'] != "") {
                            $hinh_2 = $_FILES['fileUpload_2']['name'];
                        } else {
                            $hinh_2 = "";
                        }
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
                        if (   $hinh  !="" || $hinh_1!= "") {
                            $check =  upload_img_change();
                       }
                       else {
                           $check = true;
                       }
                        if ($check == true) {
                        get_product($ma_sp, $hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $danh_muc, $hinh_1, $hinh_2, $hinh_3, $hinh_4, $hinh_5);
                        }
                        else {
                            header("location:?act=change_product&change=".$_GET['change']."&check=0");
                        }
                    }

                    if (isset($_GET['check'])) {
                        if ($_GET['check'] ==0) {
                            echo '<script> swal("trùng sản phẩm");</script>';
                        }
                      
                    }
                    include 'view/change_product.php';
                    break;
                case 'add_product':
                    if (isset($_POST['submit'])) {
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $mydate = getdate(date("U"));
                        $today = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
                        $hinh = $_FILES['fileUpload']['name'];
                        $hinh_1 = $_FILES['fileUpload_1']['name'];
                        $hinh_3 = $_FILES['fileUpload_3']['name'];
                        $hinh_2 = $_FILES['fileUpload_2']['name'];
                        $hinh_4 = $_FILES['fileUpload_4']['name'];
                        $hinh_5 = $_FILES['fileUpload_5']['name'];
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
                        if (   $hinh  !="" || $hinh_1!= "") {
                             $check =  upload_img();
                        }
                        else {
                            $check = true;
                        }
                      
                        if ($check == true) {
                        add_product($hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $danh_muc, $hinh_1, $hinh_2, $hinh_3, $hinh_4, $hinh_5);
                        }
                        else {
                            header("location:?act=change_product&change=".$_GET['change']."&check=0&".$hinh."");
                        }
                    }
                

                    if (isset($_GET['check'])) {
                        if ($_GET['check'] ==0) {
                            echo '<script> swal("trùng sản phẩm");</script>';
                        }
                    }
                    include 'view/admin_acc.php';
                    break;
                case 'ql_category':

                    include 'view/admin_ql_category.php';
                    break;
                case 'add_category':
                    if (isset($_POST['submit_category'])) {

                        $hinh = $_FILES['fileUpload']['name'];
                        $ten_loai = $_POST['ten_loai'];
                        upload_category();


                        $check =   category($ten_loai, $hinh);
                        echo "<script>alert(" . $check . ")</script>";
                        if ($check == true) {
                            header("location:/duan/admin/?act=ql_category");
                        } else {
                            header("location:/duan/admin/?act=add_category&check=true&coincide=true");
                        } # code...
                    }


                    if (isset($_GET['coincide']) && $_GET['coincide'] == true) {
                        echo "<script> swal('xảy ra trùng tên danh mục ')</script>";
                    }
                    include 'view/add_category.php';
                    break;
                case 'change_category':
                    if (isset($_POST['submit_category'])) {
                        $ma_loai = $_GET['change'];
                        $hinh_loai = $_FILES['fileUpload']['name'];
                        $ten_loai = $_POST['ten_loai'];
                        upload_category();
                        change_category($ma_loai, $ten_loai, $hinh_loai);
                    }
                    if (isset($_GET['coincide']) && $_GET['coincide'] == true) {
                        echo "<script> swal('xảy ra trùng tên danh mục ')</script>";
                    }

                    include 'view/change_category.php';
                    break;
                case 'del_category':
                    if (isset($_GET['de'])) {
                        de_category($_GET['de']);
                    }
                    include 'view/admin_ql_category.php';
                    break;
                case 'ql_sale':

                    include 'view/admin_ql_sale.php';
                    break;
                case 'add_sale':
                    if (isset($_POST['submit_sale'])) {


                        $loai = $_POST['danh_muc'];
                        $price = $_POST['price_down'];
                        $code_sale = $_POST['ma_sale'];
                        $check =   sale($code_sale, $price, $loai);
                        echo "<script>alert(" . $check . ")</script>";
                        if ($check == true) {
                            header("location:/duan/admin/?act=ql_sale");
                        } else {
                            header("location:/duan/admin/?act=add_sale&check=true&coincide=true");
                        } # code...
                    }


                    if (isset($_GET['coincide']) && $_GET['coincide'] == true) {
                        echo "<script> swal('xảy ra trùng tên mã sale ')</script>";
                    }
                    $kq = show_category();
                    include 'view/add_sale.php';
                    break;
                case 'change_sale':
                    if (isset($_POST['submit_category'])) {
                        $ma_loai = $_GET['change'];
                        $hinh_loai = $_FILES['fileUpload']['name'];
                        $ten_loai = $_POST['ten_loai'];
                        upload_category();
                        change_category($ma_loai, $ten_loai, $hinh_loai);
                    }
                    if (isset($_GET['coincide']) && $_GET['coincide'] == true) {
                        echo "<script> swal('xảy ra trùng tên danh mục ')</script>";
                    }

                    include 'view/change_category.php';
                    break;
                case 'del_sale':
                    if (isset($_GET['de'])) {
                        de_category($_GET['de']);
                    }
                    include 'view/admin_ql_category.php';
                    break;
                case 'del_user':
                    $user = new account_admin();
                    if (isset($_GET['de'])) {
                        $user->del_user($_GET['de']);
                    }
                    include 'view/admin_ql_user.php';
                    break;
                case 'ql_user':

                    include 'view/admin_ql_user.php';
                    break;

                case 'ql_history_recharge':

                    include 'view/ql-recharge-card.php';
                    break;
                case 'ql_bill':

                    include 'view/ql_bill.php';
                    break;
                case 'de_bill':

                    if (isset($_GET['de'])) {
                        de_bill($_GET['de']);
                    }
                    break;
                case 'ql_binhluan':

                    include 'view/admin_de_bl.php';
                    break;
                case 'search':
                    if (isset($_POST['sumbit_search']) && ($_POST['sumbit_search'])) {
                        $keyword = $_POST['keyword'];
                        search_sp($keyword);
                    }

                    include 'view/home.php';
                    break;
                case 'del_bl':
                    if (isset($_GET['de'])) {
                        del_bl($_GET['de']);
                    }
                    include 'view/admin_de_bl.php';
                    break;
                default:
                    include 'view/home.php';
                    break;
            }
        } else {
            if (isset($_POST['submit'])) {
                $price =  $_POST['price'];
                $price = explode('-', $price);
                $price_min = $price[0];

                $price_max = null;
                if (isset($price[1])) {
                    $price_max = $price[1];
                }
                $ma_sp =  $_POST['id'];

                $rank_seach =  $_POST['rank_seach'];

                $ngoc_seach =  $_POST['ngoc_seach'];

                $trang_thai =  $_POST['status'];
                get_search($ma_sp, $price_min, $trang_thai, $price_max, $rank_seach, $ngoc_seach);
            }
            include 'view/home.php';
        }
    }
}


if (isset($_SESSION['vai_tro']) && isset($_SESSION['ma_user'])) {

    if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {
    } else {
        header("location:/duan/");
    }
} else {
    header("location:/duan/?act=dangnhap");
}
