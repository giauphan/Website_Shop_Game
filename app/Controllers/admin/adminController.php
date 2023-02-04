<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\admin\HomeModels;
use Core\View;

class adminController extends Controller
{
    public function index()
    {
        
        $home =  new HomeModels;
        // check admin
        if ( isset($_SESSION['ma_user'])) {

            if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {
                
            } else {
                header("location:/");
            }
        } else {
            header("location:/login");
        }

        if (isset($_POST['submit']) ) {
                  echo '<script> alert("true")</script>';
            $price =  $_POST['price'];
            $price = explode('-', $price);
            $price_min = $price[0];
            $price_max = null;
            if (isset($price[1])) {
                $price_max = $price[1];
            }
            $ma_sp =  $_POST['id'];
            $rank_seach =  $_POST['rank_seach'];
            $ngoc_seach =  $_POST['ngoc_seach'];
            $trang_thai =  $_POST['status'];
            header("Location:?danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=" . $trang_thai . "&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $rank_seach . "&Field02=" . $ngoc_seach . "");
        }
        if (isset($_GET['de'])) {
            $id_sp = $_GET['de'];
            $de_sp = $home->de_sp($id_sp);
        }else{
            $de_sp ='';
        }

        $page = $home->show_sp_admin();
      $tien = 0;

        return  View::render('admin/home', [

            'page' => $page,
            'de_sp' => $de_sp,
            'tien'=> $tien
        ]);
    }
}
