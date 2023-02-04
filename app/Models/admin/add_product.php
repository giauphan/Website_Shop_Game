<?php



namespace App\Models\admin;

use App\Models\database;

class add_product extends database
{

  public  function upload_img($count)
    {
        if (isset($_POST['submit'])) {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $flag = false;
                //Bước 1: Tạo thư mục lưu file
    
                $error = array();
                $target_dir = "assets/upload/";
                for ($i = 0; $i < $count-6; $i++) {

                    $target_file = $target_dir . basename($_FILES['fileUpload_'.$i.'']['name']);
                    // Kiểm tra kiểu file hợp lệ
                    $type_file = pathinfo($_FILES['fileUpload_'.$i.'']['name'], PATHINFO_EXTENSION);
                    $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                    if (!in_array(strtolower($type_file), $type_fileAllow)) {
                        $error['fileUpload_'.$i.''] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                    }
                    //Kiểm tra kích thước file
                    $size_file = $_FILES['fileUpload_'.$i.'']['size'];
                    if ($size_file > 5242880) {
                        $error['fileUpload_'.$i.''] = "File bạn chọn không được quá 5MB";
                    }
                    // Kiểm tra file đã tồn tại trê hệ thống
                    if (file_exists($target_file)) {
                        $error['fileUpload_'.$i.''] = "File bạn chọn đã tồn tại trên hệ thống";
                    }
                    //
                    if (empty($error)) {
                        if (move_uploaded_file($_FILES['fileUpload_'.$i.'']["tmp_name"], $target_file)) {
                            // echo "Bạn đã upload file thành công";
                            $flag = true;
                        } else {
                            // echo "@File bạn vừa upload gặp sự cố<br>";
                        }
                    }
                }
            
        }}


        return  $flag;
    }

    public  function add_product($hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $danh_muc, $hinh_ct)
    {
        if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {
            $sql_submit_acc = " INSERT INTO `sp`(  `hinh`, `hinh_ct_1`, `giasp`, `field2`, `field1`, `field3`, `field4`,  `giam_gia`,`ngay_nhap`,`tai_khoan_game`, `password_game`,mo_ta, `ma_loai`, `ma_user`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
           
        $add_ac =    $this->pdo_execute($sql_submit_acc, $hinh, $hinh_ct, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $today, $tai_khoan_game, $password_game,$mo_ta, $danh_muc, $_SESSION['ma_user']);
             return$add_ac;
        }
    }
}
