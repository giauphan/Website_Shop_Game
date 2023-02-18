<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use App\Models\user;
use App\Models\napthe;
use App\Models\Page_home;
use App\Models\sanpham;
use App\Models\pay;
use App\Models\pay_sp;

class sanpham_controller extends Controller
{
    public function index()
    {
        $thongbao = '';
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $sanpham = new sanpham();
        $kq = $home->danhmuc();
        $napthe->pay_the();
        if (isset($_SESSION['ma_user'])) {
            $tiens = $tien->get_money();
        } else {
            $tien = 0;
        }
        $result = $sanpham->showsp();
        $number_of_page = $sanpham->phantrang();
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

            $Field04 =  $_POST['Field04'];

            $trang_thai =  $_POST['status'];
            header("Location:sanpham?danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=" . $trang_thai . "&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $Field02 . "&Field02=" . $Field01 . "&Field03=" . $Field03 . "&Field04=" . $Field04 . "");
        }

        if (isset($_SESSION['ma_user'])) {
            $ketqua = $tien->get_all_user_one($_SESSION['ma_user']);
        } else {
            $ketqua = [];
        }
        return View::render('sanpham', [
            'kq' => $kq,

            'ketqua' => $ketqua,
            'number_of_page' => $number_of_page,
            'result' => $result,
            'tien' => $tiens,
            'thongbao' => $thongbao,
        ]);
    }
    public function chitietsanpham()
    {
        $thongbao = '';
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $bill = new pay_sp();
        $acc = new pay();
        $kq = $home->danhmuc();
        $napthe->pay_the();
        $tiens = $tien->get_money();

        if (isset($_GET['check'])) {

            if ($_GET['check'] == 1) {
                $thongbao =  '<script>
                swal("thanh toán thành công");
                </script>';
            }
            if ($_GET['check'] == 0) {
                $thongbao = '<script>
                swal("số dư của bạn  không đủ");
                </script>';
            }
        }

        if (isset($_GET['id'])) {
            $run = $acc->showproductcfsp($_GET['id']);
            $runanh = $acc->showproductcfsp($_GET['id']);
        } else {
            $run = [];
            $runanh = [];
        }
        if (isset($_POST['pay']) ) {
            $gia_sp = $_POST['price_sp'];
            $check_pay =   $bill->pay_sp($gia_sp);
            if ($check_pay == true) {
                header("location: /lichsumua?id=" . $_GET['id'] . "&check=1");
            } else {
                header("location: /pay/sp?id=" . $_GET['id'] . "&check=0");
            }
        }
        // ctsp
        $payAcc = $acc->pay();
        $payAccLogin = $acc->pay_login();
        $runsq = $acc->showsplienquan();
        $runcode = $acc->show_code_sale();
        $showprice = $acc->show_price_sale();
        $showcategory = $acc->show_category_sale();
        return View::render('chitietsanpham', [
            'kq' => $kq,
            'payAcc' => $payAcc,
            'payAccLogin' => $payAccLogin,
            'tien' => $tiens,
            'runShow' =>   $runcode,
            'showPrice' => $showprice,
            'showCategory' => $showcategory,
            'thongbao' => $thongbao,
            'run' => $run,
            'runsq' => $runsq,
            'runanh' => $runanh,
        ]);
    }
}
