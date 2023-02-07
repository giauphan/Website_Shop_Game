<?php

namespace App\Models\admin;

use App\Models\database;

class change_prodct extends database
{
    public  function upload_img($count)
    {
        $flag = false;
        if (isset($_POST['submit'])) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                //Bước 1: Tạo thư mục lưu file

                $error = array();
                $target_dir = "assets/upload/";
                for ($i = 0; $i < $count - 7; $i++) {
                    if (isset($_FILES['fileUpload_' . $i . '']['name']) && $_FILES['fileUpload_' . $i . '']['name'] !="") {
                        $target_file = $target_dir . basename($_FILES['fileUpload_' . $i . '']['name']);
                        // Kiểm tra kiểu file hợp lệ
                        $type_file = pathinfo($_FILES['fileUpload_' . $i . '']['name'], PATHINFO_EXTENSION);
                        $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                        if (!in_array(strtolower($type_file), $type_fileAllow)) {
                            $error['fileUpload_' . $i . ''] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                        }
                        //Kiểm tra kích thước file
                        $size_file = $_FILES['fileUpload_' . $i . '']['size'];
                        if ($size_file > 5242880) {
                            $error['fileUpload_' . $i . ''] = "File bạn chọn không được quá 5MB";
                        }
                        // Kiểm tra file đã tồn tại trê hệ thống
                        if (file_exists($target_file)) {
                            $error['fileUpload_' . $i . ''] = "File bạn chọn đã tồn tại trên hệ thống";
                        }
                        //
                        if (empty($error)) {
                            if (move_uploaded_file($_FILES['fileUpload_' . $i . '']["tmp_name"], $target_file)) {
                                // echo "Bạn đã upload file thành công";
                                $flag = true;
                            } else {
                                // echo "@File bạn vừa upload gặp sự cố<br>";
                            }
                        }
                    }
                }
            }
        }


        return  $flag;
    }
    public  function showchange($id)
    {
        $sql_user = 'SELECT * FROM sp join loai on sp.ma_loai = loai.ma_loai where ma_sp = ?';
        $run_user = $this->pdo_query($sql_user, $id);
        return $run_user;
    }

    public   function get_product($ma_sp, $hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today,  $hinh_ct)
    {
        if ($hinh != "") {
            $sql_change_acc = " UPDATE `sp` SET  hinh=?, giasp=?, field2=?, field1=?, field3=?, field4=?, giam_gia=?,ngay_nhap=?,ma_user=?,`tai_khoan_game`=?,mo_ta=?,`password_game`=?  WHERE ma_sp =?";
            $this->pdo_execute($sql_change_acc, $hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $today, $_SESSION['ma_user'], $tai_khoan_game, $mo_ta, $password_game, $ma_sp);
        } else if ($hinh_ct != "") {
            $sql_change_acc = " UPDATE `sp` SET `hinh_ct_1`=?, giasp=?, field2=?, field1=?, field3=?, field4=?, giam_gia=?,ngay_nhap=?,ma_user=?,`tai_khoan_game`=?,mo_ta=?,`password_game`=?  WHERE ma_sp =?";
            $this->pdo_execute($sql_change_acc, $hinh_ct, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $today, $_SESSION['ma_user'], $tai_khoan_game, $mo_ta, $password_game, $ma_sp);
       
        } else  if ($hinh != "" && $hinh_ct != "") {
            $sql_change_acc = " UPDATE `sp` SET `hinh_ct_1`=?, hinh=?, giasp=?, field2=?, field1=?, field3=?, field4=?, giam_gia=?,ngay_nhap=?,ma_user=?,`tai_khoan_game`=?,`password_game`=?  WHERE ma_sp =?";
            $this->pdo_execute($sql_change_acc, $hinh_ct, $hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia,  $today, $_SESSION['ma_user'], $tai_khoan_game, $password_game, $ma_sp);
        } else {
            $sql_change_acc = " UPDATE `sp` SET  `giasp`=?, `field2`=?, `field1`=?, `field3`=?, `field4`=?, `giam_gia`=?,`ngay_nhap`=?,`tai_khoan_game`=?,`password_game`=?,`ma_user`=?  WHERE `ma_sp` =?";
            $this->pdo_execute($sql_change_acc, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $today, $tai_khoan_game, $password_game, $_SESSION['ma_user'], $ma_sp);
        }

        return $hinh_ct;
    }
}
