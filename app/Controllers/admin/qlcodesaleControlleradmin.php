<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\admin\category;

use App\Models\admin\ql_code_sale;
use App\Models\Page_home;
use Core\View;
use  App\Models\user;

class qlcodesaleControlleradmin extends Controller
{
    public function index()
    {
        $kq = new ql_code_sale();
        $danhmuc = new Page_home();
        $tien = new user();
        $thongbao = "";
        if (isset($_GET['de'])) {
                $id_sp = $_GET['de'];
                $kq->de_sale($id_sp);
                $thongbao = '<script> swal("Đã xóa mã giảm thành công");</script>';
            
        }
        $tien = $tien->get_money();
        $code_sale = $kq->ql_sale();
        $danhmuc = $danhmuc->danhmuc();
        return view::render("admin/ql_sale", [
            'kq' => $danhmuc,
            'ql_sale' => $code_sale,
            'thongbao' => $thongbao,
            'tien' => $tien
        ]);
    }
    public function add_code_sale()
    {
        $danhmuc = new Page_home();
        $tien = new user();
        $sale = new ql_code_sale();
        $kq = new category();
        $thongbao = "";
        if (isset($_POST['submit_sale'])) {
            $loai = $_POST['danh_muc'];
            $price = $_POST['price_down'];
            $code_sale = $_POST['ma_sale'];
            $check =   $sale->sale($code_sale, $price, $loai);
            if ($check == true) {
                header("location:/wp-admin/ql-code-sale");
            } else {
                header("location:/wp-admin/add-code-sale&coincide=true");
            }
        }
        if (isset($_GET['coincide']) && $_GET['coincide'] == true) {
            $thongbao = "<script> swal('xảy ra trùng tên mã sale ')</script>";
        }
        $tien = $tien->get_money();
        $kq = $kq->show_category();
        $danhmuc = $danhmuc->danhmuc();
        return view::render('admin/add_sale', [
            'kq' => $danhmuc,
            'tien' => $tien,
            'thongbao' => $thongbao,
            'kq' =>  $kq
        ]);
    }
   
}
