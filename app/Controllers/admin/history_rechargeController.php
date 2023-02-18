<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\admin\historyRechargeModel;
use App\Models\user;
use Core\View;

class history_rechargeController extends Controller
{
    public function index()
    {
        $historycard = new historyRechargeModel();
        $tien = new user();
        $thongbao = "";


        $tiens = $tien->get_money();
        $query = $historycard->history_recharge();
        return View::render('admin/ql-recharge-card', [
            'thongbao' => $thongbao,
            'query' => $query,
            'tien' => $tiens
        ]);
    }
}
