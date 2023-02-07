<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use App\Models\Page_home;
use Core\View;
use  App\Models\user;

class login extends Controller
{

    public function index()
    {
        $tien = new user();
        $danhmuc = new Page_home();
        $thongbao = "";
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
                    header("location: /login?status=0");
                } else {
                    // header("location: /?check=" . $_SESSION['trang_thai'] . "");
                }
            } else {
                header("location: /login?check=0");
            }
        }

        if (isset($_GET['status'])) {
            if ($_GET['status'] == 0) {
                $thongbao = '<script> swal("tài khoản đã bị khóa")</script>';
            }
        }
        if (isset($_GET['check'])) {
            if ($_GET['check'] == 0) {
                $thongbao = '<script> swal("tài khoản mật khẩu không chính xác")</script>';
            }
        }

        if (isset($_SESSION['ma_user'])) {
            header("location: /");
        }
        $tien =     $tien->get_money();
        $danhmuc = $danhmuc->danhmuc();
        return View::render('dangnhap', [
            'kq' => $danhmuc,
            'tien' => $tien,
            'thongbao' => $thongbao
        ]);
    }
    public function sigin()
    {
        $sign = new user();
        $danhmuc = new Page_home();
        $thongbao = "";
        if (isset($_POST['dangky'])) {
            $username_show = $_POST['username_show'];

            $username = $_POST['username'];

            $pass = $_POST['password'];

            $email = $_POST['email'];

            $phone = $_POST['phone'];

            $check = $sign->check_email($username, $email);
            if ($check  == 1) {
                $_SESSION['code_email'] =  sendmail_sign($email);
                $_SESSION['email_sign']  = $email;
                $sign->sign($username, $username_show, $pass, $email,  $phone);
                // header("location: /?act=dangnhap");
            } else {
                header("location: /?act=dangky&coincide=0");
            }
        }
        if (isset($_POST['sumbit_code'])) {
            $code = $_POST['code_email'];
            $email =  $_SESSION['email_sign'];
            if ($_SESSION['code_email'] == $code) {
                $sign->action_email($email);
                header("location: /?act=dangnhap");
            } else {
                $check = 1;
                $thongbao = '<script> swal("Sai mã xác minh ")</script>';
            }
        }
        if (isset($_GET['coincide'])) {
            if ($_GET['coincide'] == 0) {
                $thongbao = '<script> swal("user đã tồn tại")</script>';
            }
        }
        if (isset($_SESSION['ma_user'])) {
            if (isset($_SESSION['ma_user']) && isset($_SESSION['vai_tro'])) {
                if ($_SESSION['vai_tro'] == 'admin') {
                    header("location: /wp-amin");
                } elseif ($_SESSION['vai_tro'] == 'ctv') {
                    $thongbao =  '<script> swal("'.$_SESSION['vai_tro'].'")</script>';
                    header("location: /ql-san-pham");
                } else {
                     header("location: /");
                }
            } else {
            }




           
        }
        $tien =     $sign->get_money();
        $danhmuc = $danhmuc->danhmuc();
        return View::render('dangky', [
            'kq' => $danhmuc,
            'tien' => $tien,
            'thongbao' => $thongbao
        ]);
    }
}
