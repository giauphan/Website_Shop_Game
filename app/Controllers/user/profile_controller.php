<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use App\Models\user;
use App\Models\napthe;
use App\Models\Page_home;
use App\Models\ktlogin;

class profile_controller extends Controller
{
    public function index() {
        $profile = new ktlogin();
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $napthe->pay_the();
        $kq = $home->danhmuc();
        $tien = $tien->get_money();
            if (!isset($_SESSION['ma_user'])) {
                header("location:/duan/");
            }
            if (isset($_GET['change'])) {

                if ($_GET['change'] == 1) {
                    echo '<script> swal("thay đổi mật khẩu thành công");</script>';
                }
            }
            if (!isset($_SESSION['ma_user'])) {
                header("location:/duan/");
            }

            if (isset($_GET['edit'])) {

                if ($_GET['edit'] == 1) {
                    echo '<script> swal("cập nhật thành công");</script>';
                }
            }
            $kq = $profile->get_all_user_one($_SESSION['ma_user']);

            return View::render('profile', [
                'kq' => $kq,
                'tien' => $tien,
                'thongbao' => ''
            ]);
    }
}