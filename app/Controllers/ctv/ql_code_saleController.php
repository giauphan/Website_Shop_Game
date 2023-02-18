<?php

namespace App\Controllers\ctv;

use App\Controllers\Controller;
use App\Models\admin\category;

use App\Models\admin\ql_code_sale;
use App\Models\Page_home;
use Core\View;
use  App\Models\user;

class ql_code_saleController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['vai_tro'])) {
          if ($_SESSION['vai_tro'] == 'admin') {
            header("location:/wp-admin/");
          }else{
            header("location:/");
          }
        }
        $kq = new ql_code_sale();
        $danhmuc = new Page_home();
        $tien = new user();
        $thongbao = "";
        $tien = $tien->get_money();
        if (isset($_SESSION['ma_user'])) {
            $code_sale = $kq->ql_sale($_SESSION['ma_user']);
        } else {
            $code_sale = [];
        }
        
        $danhmuc = $danhmuc -> danhmuc();
        return view::render("ql_sale", [
            'kq'=>$danhmuc,
            'ql_sale' => $code_sale,
            'thongbao' => $thongbao,
            'tien' => $tien
        ]);
    }
   
}
