<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\admin\change_prodct;
use Core\View;

class changeproduct extends Controller
{
    public function index(){
        $change = new change_prodct();
        
        $count = count($_POST);
        $thongbao = "";
        if (isset($_POST['submit_change']) && isset($_GET['change'])) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $mydate = getdate(date("U"));
            $today = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
            $ma_sp = $_GET['change'];
            $hinh = $_FILES['fileUpload_0']['name'];
            $hinh_ct = $_FILES['fileUpload_0']['name'];
            for ($i=0; $i <    $count -7 ; $i++) { 
           
              $hinh_ct .= "|".$_FILES['fileUpload_'.($i+1).'']['name'];
            }
            
            $giasp = $_POST['giasp'];
            $tuong = $_POST['tuong'];
            $rank = $_POST['rank'];
            $trang_phuc = $_POST['trang_phuc'];
            $ngoc = $_POST['ngoc'];
            $giam_gia = $_POST['giam_gia'];
            $mo_ta = $_POST['mo_ta'];
            $tai_khoan_game = $_POST['tai_khoan'];
            $password_game = $_POST['pass_acc'];
            $danh_muc = $_POST['danh_muc'];
            if (   $hinh  !="" || $hinh_ct!= "") {
                $check =  upload_img(  $count);
           }
           else {
               $check = true;
           }
            if ($check == true) {
                $change->get_product($ma_sp, $hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $danh_muc, $hinh_ct);
            }
            else {
                header("location:/wp-admin/add-product?change=".$_GET['change']."&check=0");
            }
        }

        if (isset($_GET['check'])) {
            if ($_GET['check'] ==0) {
                echo '<script> swal("trùng sản phẩm");</script>';
            }
        }
        $tien = 0;
        return View::render('admin/change_product', [
            'thongbao' => $thongbao,
                        'tien'=> $tien
                    ]);
    }
}
