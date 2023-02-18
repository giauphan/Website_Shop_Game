<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use App\Models\admin\category;
use App\Models\user;
use Core\View;

class qlCategoryController extends Controller
{
    public function index()
    {
        $category  = new category();
        $tien = new user();
        $thongbao = "";
        $tiens = $tien->get_money();
        $howctgr = $category->show_category();

        if (isset($_GET['del_category'])) {
            $check = 0;
            $check_loai_sp = $category -> check_category_onSp($_GET['del_category']);
            foreach($check_loai_sp as $row){
                if ($row['ma_loai'] == $_GET['del_category']) {
                    $check = 1;
                }
            }
            $check_loai_sp = $category -> check_category_onDiscount($_GET['del_category']);
            foreach($check_loai_sp as $row){
                if ($row['ma_loai'] == $_GET['del_category']) {
                    $check = 2;
                }
            }

            if ($check == 0) {
                $category->de_category($_GET['del_category']);
                
            } else if ($check ==1){
                $thongbao = '<script> swal("Uii Danh mục tồn tại trong sản phẩm không thể xóa");</script>';
            } else {
                $thongbao = '<script> swal("uii Danh mục tồn tại trong Giảm giá không thể xóa");</script>';
            }

        }
        
        return view::render('admin/qlCategory', [
            'thongbao' => $thongbao,
            'query' => $howctgr,
            'tien' => $tiens

        ]);
    }

    public function addCategory()
    {
        $category = new category();
        $tien = new user();
        $thongbao = "";
        if (isset($_POST['submit_category'])) {
            $hinh = $_FILES['fileUpload']['name'];
            $ten_loai = $_POST['ten_loai'];
            $category->upload_category();
            $check =    $category->category($ten_loai, $hinh);
            if ($check == true) {
                header("location:/wp-admin/ql-category");
            } else {
                header("location:/wp-admin/add-category?check=true&coincide=true");
            }
        }
        if (isset($_GET['coincide']) && $_GET['coincide'] == true) {
            $thongbao = "<script> swal('xảy ra trùng tên danh mục ')</script>";
        }

        $tiens = $tien->get_money();
        return View::render('admin/addCategory', [
            'thongbao' => $thongbao,
            'tien' => $tiens
        ]);
    }
    public function changeCategory()
    {
        $category = new category();
        $tien = new user();
        $thongbao = "";
        if (isset($_POST['submit_category'])) {
            $ma_loai = $_GET['change'];
            $hinh_loai = $_FILES['fileUpload']['name'];
            $ten_loai = $_POST['ten_loai'];
            $category->upload_category();
            $category->change_category($ma_loai, $ten_loai, $hinh_loai);
            header("location:/wp-admin/ql-category");
        }
        if (isset($_GET['coincide']) && $_GET['coincide'] == true) {
            $thongbao = "<script> swal('xảy ra trùng tên danh mục ')</script>";
        }

        $change = $category->show_category();
        $tiens = $tien->get_money();
        return View::render('admin/changeCategory', [
            'thongbao' => $thongbao,
            'tien' => $tiens,
            'change' => $change
        ]);
    }
}
