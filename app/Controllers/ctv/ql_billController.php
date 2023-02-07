<?php

namespace App\Controllers\ctv;
use App\Controllers\Controller;
use App\Models\admin\homeModels;
use App\Models\admin\ql_bill;
use App\Models\Page_home;
use App\Models\user;
use Core\View;

class ql_billController extends Controller
{
    public function index()
    {
        $danhmuc = new Page_home();
        $bill = new ql_bill();
        $tien = new user();
        $page = new homeModels();
        $thongbao = "";
        $tien = $tien ->get_money();
        $bill = $bill->ql_bill();
        $page  = $page->show_sp_admin();
        $danhmuc = $danhmuc -> danhmuc();
        return view::render("ql_bill",[
            'kq'=>$danhmuc,
            'thongbao'=>$thongbao,
            "bill"=> $bill,
            'tien'=> $tien,
            'page'=>$page
        ]);
    }
}
