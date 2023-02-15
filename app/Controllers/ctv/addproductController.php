<?php

namespace App\Controllers\ctv;

use App\Controllers\Controller;
use App\Models\admin\add_product;
use App\Models\Page_home;
use Core\View;

class addproductController extends Controller
{


    public function index()
    {

        $add = new add_product();
        $danhmuc = new Page_home();
        $count = count($_POST);
        $check_add = 0;
        if (isset($_POST['submit'])) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $mydate = getdate(date("U"));
            $today = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
            $hinh = $_FILES['fileUpload_0']['name'];
            $hinh_ct = $_FILES['fileUpload_0']['name'];
            for ($i = 0; $i <    $count - 7; $i++) {
                if (isset($_FILES['fileUpload_' . ($i + 1) . '']['name'])) {
                    $hinh_ct .= "|" . $_FILES['fileUpload_' . ($i + 1) . '']['name'];
                }
            }
            $giasp = $_POST['giasp'];
            $field1 = (isset($_POST['tuong'])) ? $_POST['tuong'] : "";
            $field2 = (isset($_POST['rank'])) ? $_POST['rank'] : "";
            $field3 = (isset($_POST['trang_phuc'])) ? $_POST['trang_phuc'] : "";
            $field4 = (isset($_POST['ngoc'])) ? $_POST['ngoc'] : "";
            $giam_gia = $_POST['giam_gia'];
            $mo_ta = $_POST['mo_ta'];
            $tai_khoan_game = $_POST['tai_khoan'];
            $password_game = $_POST['pass_acc'];
            $danh_muc = $_POST['danh_muc'];
            if ($hinh  != "" || $hinh_ct != "") {
                $check =  $add->upload_img($count);
            }

            if ($check == true) {
                $check_add =   $add->add_product($hinh, $giasp, $field2, $field1, $field3, $field4, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $danh_muc, $hinh_ct);
            } else {
                header("location:?check=0");
            }
        }
        $thongbao = "";
        if (isset($_GET['check'])) {
            if ($_GET['check'] == 0) {
                $thongbao =  '<script> swal("trùng sản phẩm");</script>';
            }
        }
        $tien = 0;
        $danhmuc = $danhmuc -> danhmuc();
        return  View::render('addproduct', [
            'kq'=>$danhmuc,
            'thongbao' => $thongbao,
            'tien' => $tien
        ]);
    }
}
