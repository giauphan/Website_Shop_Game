<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use  App\Models\user;
use  App\Models\napthe;
use  App\Models\muahang;
use  App\Models\Page_home;

class muahang_controller extends Controller
{

    public function lichsumua() {
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $bill = new muahang();
        $kq = $home->danhmuc();
        if (isset($_SESSION['ma_user'])) {
            $tien =     $tien->get_money($_SESSION['ma_user']);
            }else{
                $tien  =0;
            }
        $napthe->pay_the();
        $runshowtien = $bill->show_bill();

        return View::render('lichsumua', [
            'kq' => $kq,
            'runshowtien' => $runshowtien,
            'tien' => $tien,
            'thongbao' => ''
        ]);
    }

    

    

}