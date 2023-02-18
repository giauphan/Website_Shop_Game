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
        $tiens = $tien->get_money();
        $napthe->pay_the();
        return View::render('napthe', [
            'kq' => $kq,
            'tienkq' => $tienkq,
            'thongbao' => ''
        ]);
    }
    public function muathe() {
        $tien = new user();
        $home = new Page_home();
        $muathe = new napthe();
        $kq = $home->danhmuc();
        $tiens = $tien->get_money();
        $muathe->pay_the();
        return View::render('muathe', [
            'kq' => $kq,
            'tienkq' => $tienkq,
            'thongbao' => ''
        ]);
    }
    public function lichsunap()
    {
        $tien = new user();
        $home = new Page_home();
        $lichsunap = new napthe();
        $kq = $home->danhmuc();
        $tiens = $tien->get_money();
        $lichsunap->pay_the();
        $result = $lichsunap->showthe();
        return View::render('lichsunap', [
            'kq' => $kq,
            'result' => $result,
            'tienkq' => $tienkq,
            'thongbao' => ''
        ]);
    }
}