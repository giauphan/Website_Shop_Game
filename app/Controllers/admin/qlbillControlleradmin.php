<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\admin\homeModels;
use App\Models\admin\ql_bill;
use App\Models\Page_home;
use App\Models\user;
use Core\View;


class qlbillControlleradmin extends Controller
{
    public function index()
    {
        $danhmuc = new Page_home();
        $bill = new ql_bill();
        $tien = new user();
        $page = new homeModels();

        $thongbao = "";
        

        $bills = $bill->ql_bill();
        $tien = $tien->get_money();

        $page  = $page->show_sp_admin();
        $danhmuc = $danhmuc->danhmuc();
        return view::render("admin/ql_bill", [
            'kq' => $danhmuc,
            'thongbao' => $thongbao,
            "bill" => $bills,
            'tien' => $tien,
            'page' => $page
        ]);
    }
}
