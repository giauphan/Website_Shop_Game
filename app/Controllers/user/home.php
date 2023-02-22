<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;

use App\Models\Page_home;
use App\Models\user;



class home extends Controller
{
    public function index()
    {
        $tien = new user();
        $home = new Page_home();
        $thongbao = "";
       
        
        $sl_loai = $home->sl_loai();
        $sl_pay = $home->sl_pay();
        $pro_sale =   $home->showproductSALE();
        $pro =   $home->product_new();
        $kq = $home->danhmuc();
        $tiens =     $tien->get_money();
        return View::render('home', [
            'kq' => $kq,
            'pro' => $pro,
            'pro_sale' => $pro_sale,
            'tien' => $tiens,
            'sl_loai' => $sl_loai,
            'sl_pay' => $sl_pay,
            'thongbao' => $thongbao
        ]);
    }
}
