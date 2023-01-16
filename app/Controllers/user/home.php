<?php

namespace App\Controllers\user;

use App\Controllers\Controller;
use Core\View;

use App\Models\Page_home ;
use App\Models\user;



class home extends Controller
{

    public function index()
    {
        $tien = new user();
        $home =new Page_home();
        $thongbao = "";
        if (!isset($_SESSION['luottruycap'])) $_SESSION['luottruycap'] = 1;
        else $_SESSION['luottruycap'] += 1;
        if ($_SESSION['luottruycap'] == 1) {
            $thongbao = "Swal.fire({
           title: '<h1>THÔNG BÁO</h1>',
           html: '<h2><b>Nhân Dịp Black Friday <a href=` /`><b style=`color:#5E70B3;`>TAIKHOANGAME</b></a>  Sale 50% </b></h2>',
           imageUrl: ' /Controller/img/banner_sale.jpg',
           imageWidth: 800,
           imageHeight: 300,
           imageAlt: 'Custom image',
         });";
        }
        $pro_sale =   $home->showproductSALE();
        $pro =   $home->product_new();
        $kq = $home->danhmuc();
        $tien =     $tien->get_money();
        return View::render('home',[
            'kq' => $kq,
            'pro' => $pro,
            'pro_sale' => $pro_sale,
            'tien'=> $tien
        ]);
    }
}
