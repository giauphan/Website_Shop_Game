<?php

namespace App\Controllers\ctv;

use App\Controllers\Controller;
use App\Models\admin\HomeModels;
use App\Models\history_bill;
use App\Models\Page_home;
use Core\View;

class adminController extends Controller
{
    public function index()
    {

        $home =  new HomeModels;
        $thongke = new history_bill;
        $danhmuc = new Page_home();
        $thongbao = '';
        // check admin
        if (isset($_SESSION['ma_user'])) {

            if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {
            } else {
                header("location:/");
            }
        } else {
            header("location:/login");
        }

        if (isset($_POST['submit'])) {
            echo '<script> alert("true")</script>';
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
            header("Location:?danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=" . $trang_thai . "&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $rank_seach . "&Field02=" . $ngoc_seach . "");
        }
        $check_product = $home->check_product();
        if (isset($_GET['de'])) {
            $check_pro = true;

            foreach ($check_product as $row) {
                if ($row['ma_sp'] == $_GET['de']) {
                    $check_pro = false;
                }
            }
            if ($check_pro == true) {
                $id_sp = $_GET['de'];
                $home->de_sp($id_sp);
            } else {
                $thongbao = '<script> swal("uii Sản phẩm đã bán không thể xóa");</script>';
            }
        }
        $danhmuc = $danhmuc -> danhmuc();
        $thongke = $thongke->get_month_bill();
        $page = $home->show_sp_admin();
        $tien = 0;

        return  View::render('home_ctv', [
'kq'=>$danhmuc,
            'page' => $page,
            'thongbao' => $thongbao,
            'thongke' => $thongke,
            'check_product' =>$check_product,
            'tien' => $tien
        ]);
    }
}
