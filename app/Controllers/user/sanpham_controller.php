<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use App\Models\user;
use App\Models\napthe;
use App\Models\Page_home;
use App\Models\sanpham;
use App\Models\profile;

class sanpham_controller extends Controller
{
    public function index() {
        $thongbao = '';
        $profile = new user();
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $sanpham = new sanpham();
        $kq = $home->danhmuc();
        $napthe->pay_the();
        $tienkq = $tien->get_money();
            if (isset($_POST['submit'])) {
                $price =  $_POST['price'];

                $price = explode('-', $price);

                $price_min = $price[0];

                $price_max = null;
                if (isset($price[1])) {
                    $price_max = $price[1];
                }
                $ma_sp =  $_POST['id'];

                $Field01 =  $_POST['Field01'];

                $Field02 =  $_POST['Field02'];
                $Field03 =  $_POST['Field03'];

                $trang_thai =  $_POST['status'];
                header("Location:?act=nick&danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=" . $trang_thai . "&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $Field02 . "&Field02=" . $Field01 . "&Field03=".$Field03."");
            }
        

            $kq = $profile->get_all_user_one($_SESSION['ma_user']);

            return View::render('sanpham', [
                'kq' => $kq,
                'tienkq' => $tienkq,
                'thongbao' => $thongbao,
            ]);
    }
}