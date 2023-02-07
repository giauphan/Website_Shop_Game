<?php

namespace App\Controllers\ctv;

use App\Controllers\Controller;
use App\Models\admin\change_prodct;
use App\Models\Page_home;
use Core\View;

class changeproduct extends Controller
{
    public function index()
    {
        $change = new change_prodct();
        $danhmuc = new Page_home();
        $count = count($_POST);
        $thongbao = "";
        if (isset($_POST['submit']) && isset($_GET['change'])) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $mydate = getdate(date("U"));
            $today = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
            $ma_sp = $_GET['change'];
            $hinh = $_FILES['fileUpload_0']['name'];
            $hinh_ct = "";
            for ($i = 0; $i <    $count - 7; $i++) {
                if (isset($_FILES['fileUpload_' . ($i + 1) . '']['name']) && $hinh_ct != "") {
                    $hinh_ct .= "|" . $_FILES['fileUpload_' . ($i + 1) . '']['name'];
                } else   if (isset($_FILES['fileUpload_' . ($i + 1) . '']['name'])) {
                    $hinh_ct =  $_FILES['fileUpload_' . ($i + 1) . '']['name'];
                }
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
            $change->upload_img($count);

            $change->get_product($ma_sp, $hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $hinh_ct);
            //   header("location:/wp-admin");
        }
        // if (isset($_GET['check'])) {
        //     if ($_GET['check'] ==0) {
        //         echo '<script> swal("trùng sản phẩm");</script>';
        //     }
        // }
        if (isset($_SESSION['ma_user'])) {
        } else {
            header("location:/wp-admin");
        }
        $show_change = $change->showchange($_GET['change']);
        $danhmuc = $danhmuc -> danhmuc();
        $tien = 0;
        return View::render('change_product', [
            'thongbao' => $thongbao,
            'show_change' =>    $show_change,
            'tien' => $tien
        ]);
    }
}
