<?php
function upload_img()
{
    if (isset($_POST['submit'])) {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $flag = false;
            //Bước 1: Tạo thư mục lưu file

            $error = array();
            $target_dir = "view/upload/";

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
                } else {
                    echo "@File bạn vừa upload gặp sự cố<br>";
                }
            }

            // upload 2
            if ($_FILES['fileUpload_1']['name'] != "") {


                $target_file = $target_dir . basename($_FILES['fileUpload_1']['name']);
                // Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['fileUpload_1']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error['fileUpload_1'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
                //Kiểm tra kích thước file
                $size_file = $_FILES['fileUpload_1']['size'];
                if ($size_file > 5242880) {
                    $error['fileUpload_1'] = "File bạn chọn không được quá 5MB";
                }
                // Kiểm tra file đã tồn tại trê hệ thống
                if (file_exists($target_file)) {
                    $error['fileUpload_1'] = "File bạn chọn đã tồn tại trên hệ thống";
                }
                //
                if (empty($error)) {
                    if (move_uploaded_file($_FILES["fileUpload_1"]["tmp_name"], $target_file)) {
                        echo "Bạn đã upload file thành công";
                        $flag = true;
                    } else {
                        echo "@File bạn vừa upload gặp sự cố<br>";
                    }
                }
                # code...
            }
            // upload 3
            if ($_FILES['fileUpload_2']['name'] != "") {
                $target_file = $target_dir . basename($_FILES['fileUpload_2']['name']);
                // Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['fileUpload_2']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error['fileUpload_2'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
                //Kiểm tra kích thước file
                $size_file = $_FILES['fileUpload_2']['size'];
                if ($size_file > 5242880) {
                    $error['fileUpload_2'] = "File bạn chọn không được quá 5MB";
                }
                // Kiểm tra file đã tồn tại trê hệ thống
                if (file_exists($target_file)) {
                    $error['fileUpload_2'] = "File bạn chọn đã tồn tại trên hệ thống";
                }
                //
                if (empty($error)) {
                    if (move_uploaded_file($_FILES["fileUpload_2"]["tmp_name"], $target_file)) {
                        echo "Bạn đã upload file thành công";
                        $flag = true;
                    } else {
                        echo "@File bạn vừa upload gặp sự cố<br>";
                    }
                }
            }
            // upload 3
            if ($_FILES['fileUpload_3']['name'] != "") {
                $target_file = $target_dir . basename($_FILES['fileUpload_3']['name']);
                // Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['fileUpload_3']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error['fileUpload_3'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
                //Kiểm tra kích thước file
                $size_file = $_FILES['fileUpload_3']['size'];
                if ($size_file > 5242880) {
                    $error['fileUpload_3'] = "File bạn chọn không được quá 5MB";
                }
                // Kiểm tra file đã tồn tại trê hệ thống
                if (file_exists($target_file)) {
                    $error['fileUpload_3'] = "File bạn chọn đã tồn tại trên hệ thống";
                }
                //
                if (empty($error)) {
                    if (move_uploaded_file($_FILES["fileUpload_3"]["tmp_name"], $target_file)) {
                        echo "Bạn đã upload file thành công";
                        $flag = true;
                    } else {
                        echo "@File bạn vừa upload gặp sự cố<br>";
                    }
                }
            }
            // upload 4

            if ($_FILES['fileUpload_4']['name'] != "") {
                $target_file = $target_dir . basename($_FILES['fileUpload_4']['name']);
                // Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['fileUpload_4']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error['fileUpload_4'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
                //Kiểm tra kích thước file
                $size_file = $_FILES['fileUpload_4']['size'];
                if ($size_file > 5242880) {
                    $error['fileUpload_4'] = "File bạn chọn không được quá 5MB";
                }
                // Kiểm tra file đã tồn tại trê hệ thống
                if (file_exists($target_file)) {
                    $error['fileUpload_4'] = "File bạn chọn đã tồn tại trên hệ thống";
                }
                //
                if (empty($error)) {

                    if (move_uploaded_file($_FILES['fileUpload_4']['tmp_name'], $target_file)) {
                        echo "Bạn đã upload file thành công";
                        $flag = true;
                    } else {
                        echo "@File bạn vừa upload gặp sự cố<br>";
                    }
                }
            }
            // upload 5
            if ($_FILES['fileUpload_5']['name'] != "") {
                $target_file = $target_dir . basename($_FILES['fileUpload_5']['name']);
                // Kiểm tra kiểu file hợp lệ
                $type_file = pathinfo($_FILES['fileUpload_5']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error['fileUpload_5'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
                //Kiểm tra kích thước file
                $size_file = $_FILES['fileUpload_5']['size'];
                if ($size_file > 5242880) {
                    $error['fileUpload_5'] = "File bạn chọn không được quá 5MB";
                }
                // Kiểm tra file đã tồn tại trê hệ thống
                if (file_exists($target_file)) {
                    $error['fileUpload_5'] = "File bạn chọn đã tồn tại trên hệ thống";
                }
                //
                if (empty($error)) {
                    if (move_uploaded_file($_FILES["fileUpload_5"]["tmp_name"], $target_file)) {
                        echo "Bạn đã upload file thành công";
                        $flag = true;
                    } else {
                        echo "@File bạn vừa upload gặp sự cố<br>";
                    }
                }
            }
        }
    }

    return  $flag;
}

function add_product($hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $danh_muc, $hinh_1, $hinh_2, $hinh_3, $hinh_4, $hinh_5)
{
    if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {

        //  $ma_sp_acc = 0;
        //     $query = "SELECT * FROM `sp` ORDER BY ma_sp DESC LIMIT 1";

        //     $result = pdo_query($query);


        //     foreach ($result as  $row ) {

        //         $ma_sp_acc = $row['ma_sp'] + 1;
        //     }


        $sql_submit_acc = " INSERT INTO `sp`(  `hinh`, `hinh_ct_1`, `giasp`, `rank`, `tuong`, `trang_phuc`, `ngoc`,  `giam_gia`,`ngay_nhap`,`tai_khoan_game`, `password_game`, `ma_loai`, `ma_user`) VALUES ('" . $hinh . "','" . $hinh_1 . "|" .  $hinh_2 . "|" . $hinh_3 . "|" . $hinh_4 . "|" . $hinh_5 . "','" . $giasp . "','" . $rank . "','" . $tuong . "','" . $trang_phuc . "','" . $ngoc . "','" . $giam_gia . "','" . $today . "','" . $tai_khoan_game . "','" . $password_game . "','" . $danh_muc . "','" . $_SESSION['ma_user'] . "') ";
        // $sql_submit_acc = "INSERT INTO `sp_test`( `hinh`, `hinh_ct_1`, `hinh_ct_2`, `hinh_ct_3`, `hinh_ct_4`, `hinh_ct_5`, `giam_gia`, `ngay_nhap`, `ma_loai`, `ma_user`) VALUES ('" . $hinh . "','" . $hinh_1 . "','" . $hinh_2 . "','" . $hinh_3 . "','" . $hinh_4 . "','" . $hinh_5 . "','" . $giam_gia . "','" . $today . "','" . $danh_muc . "','" . $_SESSION['ma_user'] . "')"; 
        return pdo_execute($sql_submit_acc);

        // $sql = "INSERT INTO `ct_sp`(`mo_ta`,  `tai_khoan_game`, `password_game`, `hinh_ct_1`, `hinh_ct_2`, `hinh_ct_3`, `hinh_ct_4`, `hinh_ct_5`, `ma_sp`) VALUES ('" . $mo_ta . "','" . $tai_khoan_game . "','" . $password_game . "','" . $hinh_1 . "','" . $hinh_2 . "','" . $hinh_3 . "','" . $hinh_4 . "','" . $hinh_5 . "','" . $ma_sp_acc . "')";
        // echo         $sql;
        // $sql  = "INSERT INTO `ct_sp_test`( `giasp`, `rank`, `tuong`, `trang_phuc`, `ngoc`, `mo_ta`, `tai_khoan_game`, `password_game`, `ma_sp`) VALUES ('" . $giasp . "','" . $rank . "','" . $tuong . "','" . $trang_phuc . "','" . $ngoc . "','" . $mo_ta . "','" . $tai_khoan_game . "','" . $password_game . "','" . $ma_sp_acc . "')";

        // mysqli_query($conn, $sql);



    }
}
