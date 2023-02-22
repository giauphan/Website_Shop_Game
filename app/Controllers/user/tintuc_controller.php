<?php
//chua xong
namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;
use  App\Models\user;
use  App\Models\Page_home;

class tintuc_controller extends Controller
{
    public function index() {
        $thongbao = '';
        $tien = new user();
        $home = new Page_home();
        $kq = $home->danhmuc();
        $tiens = $tien->get_money();
       
        return View::render('tintuc', [
            'kq' => $kq,
            'tien' => $tiens,
            'thongbao' => $thongbao,
        ]);
    }
}