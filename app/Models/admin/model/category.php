<?php
function upload_category()
{
    if (isset($_POST['submit_category'])) {
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
                    return $flag;
                } else {
                    echo "File bạn vừa upload gặp sự cố ";
                }
            }
        }
    }
}

function category($ten_loai, $hinh)
{
    $conn = po_con();
    $sql_show = "SELECT * FROM `loai` where `ten_loai` like '%" . $ten_loai . "%' ";
    $query = mysqli_query($conn, $sql_show);
    $check = true;
    while ($row = mysqli_fetch_array($query)) {
        if ($row['ten_loai'] == $ten_loai) {
            $check = false;
        }
    }

    if ($check == false) {
        return false;
    } else {
        $sql = "INSERT INTO `loai`( `ten_loai`, `hinh_loai`) VALUES ('" . $ten_loai . "','" . $hinh . "')";
        mysqli_query($conn, $sql);
        return true;
    }
}


function change_category($ma_loai, $ten_loai, $hinh_loai)
{
 
    if ($hinh_loai != "") {


        $sql = "UPDATE `loai` SET `ten_loai`='" . $ten_loai . "',`hinh_loai`='" . $hinh_loai . "' WHERE ma_loai = " . $ma_loai . "";
        pdo_execute($sql);
    }
    else{
        $sql = "UPDATE `loai` SET `ten_loai`='" . $ten_loai . "' WHERE ma_loai = " . $ma_loai . "";
        pdo_execute($sql);
    }
    header("location:/duan/admin/?act=ql_category");
}
function show_change_category()
{
    $conn = po_con();
    $sql = "SELECT * FROM `loai` ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        if ($row['ma_loai'] == $_GET['change']) {

            echo '  <div class="col">

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="fileUpload">Ảnh danh mục<span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="file" id="fileUpload" name="fileUpload" placeholder="ảnh danh mục " >
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="ten_loai">Tên danh mục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="text" id="ten_loai" name="ten_loai" value="' . $row['ten_loai'] . '" placeholder="nhập Tên danh mục "  min="0">
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="col_btn">
                    <div class="text_name">
                            <label for="tuong"></label>
                        </div>
                        <div class="btn">
                            <button type="submit" name="submit_category"> Gửi</button>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
}

function de_category($id)
{
    $conn = po_con();

    $sql = 'DELETE FROM `loai` WHERE ma_loai = "' . $id .  '"  ';
    mysqli_query($conn, $sql);
}

function show_category(){
    $sql = 'select * from  `loai`  ';
   return pdo_query($sql);
    
}