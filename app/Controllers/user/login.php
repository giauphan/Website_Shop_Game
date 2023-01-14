<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use  App\Models\user\user;

class login extends Controller
{
    public function index()
    {
        return View::render('login');
    }
    public function login()
    {
        if (isset($_POST['dangnhap'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $login = new user();
            $kt  = $login->login($user, $pass);
            $check = false;
            if (is_array($kt) > 0) {

                foreach ($kt as $row) {
                    if ($row['trang_thai_kh'] == 1) {
                        $_SESSION['ma_user'] = $row['ma_kh'];
                        $_SESSION['username_show'] = $row['ten_hien_thi'];
                        $_SESSION['vai_tro'] = $row['vai_tro'];
                        $_SESSION['trang_thai'] = $row['trang_thai_kh'];
                        $check = true;
                    } else {
                        $_SESSION['trang_thai'] = $row['trang_thai_kh'];
                        $check = true;
                    }
                }
            }
            if ($check == true) {
                if ($_SESSION['trang_thai'] == 0) {
                    header("location: /?act=dangnhap&status=0");
                } else {
                    // header("location: /?check=" . $_SESSION['trang_thai'] . "");
                }
            } else {
                header("location: /?act=dangnhap&check=0");
            }
        }
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 0) {
                echo '<script> swal("tài khoản đã bị khóa")</script>';
            }
        }
        if (isset($_GET['check'])) {
            if ($_GET['check'] == 0) {
                echo '<script> swal("tài khoản mật khẩu không chính xác")</script>';
            }
        }

        if (isset($_SESSION['ma_user'])) {
            header("location: /");
        }
        // $tien = get_money();
        $home = ['items' => ['item 1', 'item 2', 'item 3']];
        return View::render('home', $home);
    }
}
