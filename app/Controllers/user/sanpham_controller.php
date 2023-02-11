<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use App\Models\user;
use App\Models\napthe;
use App\Models\Page_home;
use App\Models\sanpham;
use App\Models\profile;
use App\Models\pay;

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
        $result = $sanpham->showsp();
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
                header("Location:sanpham?danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=" . $trang_thai . "&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $Field02 . "&Field02=" . $Field01 . "&Field03=".$Field03."");
            }
        

            $ketqua = $profile->get_all_user_one($_SESSION['ma_user']);

            return View::render('sanpham', [
                'kq' => $kq,
                'ketqua' => $ketqua,
                'result' => $result,
                'tienkq' => $tienkq,
                'thongbao' => $thongbao,
            ]);
    }
    public function chitietsanpham() {
        $thongbao = '';
        $profile = new user();
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $sanpham = new sanpham();
        $acc = new pay();
        $kq = $home->danhmuc();
        $napthe->pay_the();
        $tien = $tien->get_money();

            if (isset($_POST['submitbl'])) {
                date_default_timezone_set("Asia/Ho_Chi_Minh");
                $mydate = getdate(date("U"));
                $today = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
                $noi_dung = $_POST['binhluan'];
                comment($today, $noi_dung);
            }
            if (isset($_GET['check'])) {

                if ($_GET['check'] == 1) {
                    echo '<script>
                swal("thanh toán thành công");
                </script>';
                }
                if ($_GET['check'] == 0) {
                    echo '<script>
                swal("số dư của bạn  không đủ");
                </script>';
                }
            }
            if (isset($_GET['id'])) {
                $idacc = $_GET['id'];
            }
            $run = $acc-> showproductcfsp($_GET['id']);
            $runsq = $acc->showsplienquan();
            $runanh = $acc-> showproductcfsp($_GET['id']);
        
        return View::render('chitietsanpham', [
            'kq' => $kq,
            'tien' => $tien,
            'thongbao' => $thongbao,
            'run' => $run,
            'runsq' => $runsq,
            'runanh' => $runanh,
        ]);
    }

}