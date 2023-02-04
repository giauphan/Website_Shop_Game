<?php
//chua xong
namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use  App\Models\user;
use  App\Models\quenmk;
use  App\Models\Page_home;

class quenmk_controller extends Controller
{
    public function index() {
        $thongbao = '';
        $tien = new user();
        $home = new Page_home();
        $kq = $home->danhmuc();
        $tien = $tien->get_money();
        if (isset($_POST['sendmail'])) {
            $email = $_POST['email'];
            $check = get_one_email($email);

            if (is_array($check) > 1) {

                $_SESSION['code_opt'] =   sendmail($email);
                $_SESSION['email_forget'] =   $email;
                header("location:/duan/?act=forget_pass&check=1&email=" . $email . "");
            } else {
                header("location:/duan/?act=forget_pass&check=0&email=" . $email . "");
            }
        }
        if (isset($_GET['check']) && isset($_GET['email'])) {
            if ($_GET['check'] == 1) {
                $thongbao = '<script> swal("Mã xác minh đã được gửi đến địa chỉ ' . $_GET['email'] . '");</script>';
            } else {
                $thongbao = '<script> swal("Không tìm thấy tài khoản");</script>';
            }
        }
        return View::render('napthe', [
            'kq' => $kq,
            'tien' => $tien,
            'thongbao' => $thongbao,
        ]);
    }
}