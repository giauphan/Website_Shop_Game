<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\admin\qlAccount;
use App\Models\user;
use Core\View;

class qluserController extends Controller
{
    public function index()
    {
        if (isset($_SESSION['vai_tro'])) {
            if ($_SESSION['vai_tro'] == 'admin') {
                $qluser = new qlAccount();
                $tien = new user();
                $thongbao = "";

                if (isset($_GET['de'])) {
                    $qluser->lockUser($_GET['de']);
                }
                $tiens =  $tien->get_money();
                $showuser = $qluser->show_user();
                return View::render("admin/ql_user", [
                    'thongbao' => $thongbao,
                    'show' => $showuser,
                    'tien' => $tiens
                ]);
            } else {
                header("location:/");
            }
        }
    }
}
