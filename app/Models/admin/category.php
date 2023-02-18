<?php

namespace App\Models\admin;

use App\Models\database;

class category extends database
{
    public function upload_category()
    {
        if (isset($_POST['submit_category'])) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $flag = false;
                //Bước 1: Tạo thư mục lưu file
                $error = array();
                $target_dir = "assets/upload/";
                $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
                // Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
                //Kiểm tra kích thước file
                $size_file = $_FILES['fileUpload']['size'];
                if ($size_file > 5242880) {
                    $error['fileUpload'] = "File bạn chọn không được quá 5MB";
                }
                // Kiểm tra file đã tồn tại trê hệ thống
                if (file_exists($target_file)) {
                    $error['fileUpload'] = "File bạn chọn đã tồn tại trên hệ thống";
                }
                //
                if (empty($error)) {
                    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                        echo "Bạn đã upload file thành công";
                        $flag = true;
                        return $flag;
                    } else {
                        echo "File bạn vừa upload gặp sự cố ";
                    }
                }
            }
        }
    }

    public function category($ten_loai, $hinh)
    {

        $sql_show = "SELECT * FROM `loai` where `ten_loai` like '%" . $ten_loai . "%' ";
        $query = $this->pdo_query($sql_show);
        $check = true;
        foreach ($query as $row) {
            if ($row['ten_loai'] == $ten_loai) {
                $check = false;
            }
        }
        if ($check == false) {
            return false;
        } else {
            $sql = "INSERT INTO `loai`( `ten_loai`, `hinh_loai`) VALUES (?,?)";
            $this->pdo_query($sql, $ten_loai, $hinh);
            return true;
        }
    }
    public function change_category($ma_loai, $ten_loai, $hinh_loai)
    {

        if ($hinh_loai != "") {
            $sql = "UPDATE `loai` SET `ten_loai`=?,`hinh_loai`=? WHERE ma_loai = ?";
            $this->pdo_execute($sql, $ten_loai, $hinh_loai, $ma_loai);
        } else {
            $sql = "UPDATE `loai` SET `ten_loai`=? WHERE ma_loai = ?";
            $this->pdo_execute($sql, $ten_loai, $ma_loai);
        }
      
    }
    public function check_category_onSp($id)
    {
        $sql = 'SELECT * FROM `loai` WHERE ma_loai  IN (SELECT ma_loai FROM sp WHERE sp.ma_loai = loai.ma_loai)';
        return $this->pdo_query($sql);
    }

    public function check_category_onDiscount($id)
    {
        $sql = 'SELECT * FROM `loai` WHERE ma_loai  IN (SELECT ma_loai FROM tbl_code_sale WHERE loai.ma_loai = tbl_code_sale.ma_loai)';
        return $this->pdo_query($sql);
    }

    public function de_category($id)
    {
        $sql = 'DELETE FROM `loai`  WHERE ma_loai = ?  ';
        $this->pdo_execute($sql,$id);
    }

    public function show_category()
    {
        $sql = 'SELECT * from  `loai`  ';
        return $this->pdo_query($sql);
    }
    
   
}
