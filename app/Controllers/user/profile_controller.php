<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use App\Models\user;
use App\Models\napthe;
use App\Models\Page_home;
use App\Models\profile;
use App\Models\phpmailer;

class profile_controller extends Controller
{
    
    public function index() {
        $thongbao = '';
        $profile = new user();
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $kq = $home->danhmuc();
        $napthe->pay_the();
        $tiens = $tien->get_money();
            if (!isset($_SESSION['ma_user'])) {
                header("location:/duan/");
            }
            if (isset($_GET['change'])) {

                if ($_GET['change'] == 1) {
                    $thongbao = '<script> swal("thay đổi mật khẩu thành công");</script>';
                }
            }
            if (!isset($_SESSION['ma_user'])) {
                header("location:/duan/");
            }

            if (isset($_GET['edit'])) {

                if ($_GET['edit'] == 1) {
                    $thongbao = '<script> swal("cập nhật thành công");</script>';
                }
            }

            $result = $profile->get_all_user_one($_SESSION['ma_user']);

            return View::render('profile', [
                'kq' => $kq,
                'result' => $result,
                'tienkq' => $tiens,
                'thongbao' => $thongbao,
            ]);
    }
    public function edit() {
        $thongbao = '';
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $napthe->pay_the();
        $kq = $home->danhmuc();
        $tiens = $tien->get_money();
            if (isset($_POST['ud_infor'])) {
                $username_show = $_POST['username_show'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $check =    $tien->ud_user($phone, $email, $username_show);
                if ($check == 1) {
                    header("location:/profile");
                }
            }
            
            $result = $tien->get_all_user_one($_SESSION['ma_user']);

            return View::render('edit_profile', [
                'kq' => $kq,
                'result' => $result,
                'tien' => $tiens,
                'thongbao' => $thongbao,
            ]);
    }
    public function doimk() {
        $thongbao = '';
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $doimk = new profile();
        $napthe->pay_the();
        $kq = $home->danhmuc();
        $tiens = $tien->get_money();
        $runshowtien = $doimk->check_tien_mail();
        $restpass = $doimk->get_user_doimk();

        if (isset($_SESSION['ma_user'])) {
            $email="";
            foreach($runshowtien as $rowtien) { 
                $_SESSION['tien'] = $rowtien['tien'];
                $email = $rowtien['email'];
            }

            if (isset($_POST['change_pass'])) {

                $ma_user = $_SESSION['ma_user'];
                $passold = $_POST['passold'];
                $passnew = $_POST['passnew'];
                $passnewre = $_POST['passnewRe'];
                
                $kt_rsp = false;
                foreach ($restpass as $row) {

                    if ($passnewre == $passnew && $row['password'] == $passold) {
                        $doimk->doi_mk($passnew, $ma_user);

                        $kt_rsp = true;
                    } 
                }
                if ($kt_rsp == true) {
                    header("location:/profile");
                } else {
                    header("location:/doimk");
                }
            }
        }

        return View::render('doimk', [
            'kq' => $kq,
            'tien' => $tiens,
            'thongbao' => $thongbao,
        ]);
    }

    public function quenmk() {
        $thongbao = '';
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $doimk = new profile();
        $mail = new \phpmailer();
        $napthe->pay_the();
        $kq = $home->danhmuc();
        $tiens = $tien->get_money();
        $runshowtien = $doimk->check_tien_mail();
        $restpass = $doimk->get_user_doimk();

        if (isset($_POST['sendmail'])) {
            $email = $_POST['email'];
            $check = $mail->get_one_email($email);

            if (is_array($check) > 1) {

                $_SESSION['code_opt'] =   $mail->sendmail($email);
                $_SESSION['email_forget'] =   $email;
                header("location:/duan/?act=forget_pass&check=1&email=" . $email . "");
            } else {
                header("location:/duan/?act=forget_pass&check=0&email=" . $email . "");
            }
        }
        if (isset($_GET['check']) && isset($_GET['email'])) {
            if ($_GET['check'] == 1) {
                echo '<script> swal("Mã xác minh đã được gửi đến địa chỉ ' . $_GET['email'] . '");</script>';
            } else {
                echo '<script> swal("Không tìm thấy tài khoản");</script>';
            }
        }


        return View::render('quenmk', [
            'kq' => $kq,
            'tien' => $tiens,
            'thongbao' => $thongbao,
        ]);
    }

   
}