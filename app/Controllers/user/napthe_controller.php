<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use  App\Models\user;
use  App\Models\napthe;
use  App\Models\Page_home;

class napthe_controller extends Controller
{
    public function index() {
        $tien = new user();
        $home = new Page_home();
        $napthe = new napthe();
        $kq = $home->danhmuc();
        $tien = $tien->get_money();
        $napthe->pay_the();
        return View::render('napthe', [
            'kq' => $kq,
            'tien' => $tien,
            'thongbao' => ''
        ]);
    }
}