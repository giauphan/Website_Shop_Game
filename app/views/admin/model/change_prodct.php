<?php
function show_img($img)
{

    $img = explode("|", $img);

    for ($i = 0; $i < sizeof($img); $i++) {
        if ($img[$i] != "") {
           
         
        echo ' <div class="col1">
            <div class="tensp">
                <div class="text_name">
                    <label for="fileUpload_' . ($i + 1) . '">Ảnh chi tiết ' . ($i + 1) . ' <span>*</span></label>
                </div>
                <div class="inp">
                    <input type="file" id="fileUpload_1" name="fileUpload_' . ($i + 1) . '" placeholder="ảnh sp"  >
              <img src="view/upload/' . $img[$i] . '" width="100%" height="150px"/>
                </div>

            </div>
            </div>'; 
         }
           else{
          break;
           }
    }
}
function showchange()
{
    $conn = po_con();
    if (isset($_GET['change'])) {


        $sql_user = 'SELECT * FROM sp  ';
        $run_user = pdo_query($sql_user);
      foreach(  $run_user as $row ) {
            if ($row['ma_sp'] == $_GET['change']) {

                echo ' <!-- star   block1 -->
                
                <div class="col">

              
                
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="fileUpload">Ảnh</label>
                            </div>
                            <div class="inp">
                                <input value="' . $row['hinh'] . '" type="file" id="fileUpload" name="fileUpload" placeholder="ảnh sp"  > <img src="view/upload/' . $row['hinh'] . '" width="100%" height="150px"/>
                            </div>
        
                        </div>

                    </div>
        ';

                show_img($row['hinh_ct_1']);
                echo '      
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="giasp">Giá sản phẩm</label>
                            </div>
                            <div class="inp">
                                <input type="number" id="giasp" name="giasp" placeholder="giá sp"  value="' . $row['giasp'] . '"   min="0">
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="tuong">tướng</label>
                            </div>
                            <div class="inp">
                                <input type="number" id="tuong" name="tuong" placeholder="nhập tướng"  value="' . $row['tuong'] . '"   min="0">
                            </div>
        
                        </div>
                    </div>
        
             
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="rank">Rank</label>
                            </div>
                            <div class="inp">
                                <select name="rank" id="rank"  value="' . $row['rank'] . '"  >
                                  
                                    <option value="cao thủ">cao thủ</option>
                                    <option value="tinh anh">tinh anh</option>
                                    <option value="kim cương">kim cương</option>
                                    <option value="bạch kim">bạch kim</option>
                                    <option value="vàng">vàng</option>
                                    <option value="bạc">bạc</option>
                                    <option value="đồng">đồng</option>
                                
                                </select>
                                <!-- <input type="text" id="rank" name="rank" placeholder="rank sản phẩm"  > -->
                            </div>
        
                        </div>
                    </div>
        
        
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="ngoc">Ngọc 90</label>
                            </div>
                            <div class="inp">
                                <select name="ngoc" id="ngoc" value="' . $row['ngoc'] . '"  >
                                    <option value="có">có</option>
                                    <option value="không">không</option>
                                </select>
                                <!-- <input type="" id="ngoc" name="ngoc" placeholder="ngọc sp"  > -->
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="trang_phuc">trang phục</label>
                            </div>
                            <div class="inp">
                                <input type="number" id="trang_phuc" name="trang_phuc" placeholder="nhập trang phục sp"  value="' . $row['trang_phuc'] . '"   min="0">
                            </div>
        
                        </div>
                    </div>
        
            
        
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="giam_gia">giảm giá</label>
                            </div>
                            <div class="inp">
                                <input type="text" id="giam_gia" name="giam_gia" placeholder="giảm giá sp"  value="' . $row['giam_gia'] . '"  >
                            </div>
        
                        </div>
                    </div>
        
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="tai_khoan">tài khoản</label>
                            </div>
                            <div class="inp">
                                <input type="text" id="tai_khoan" name="tai_khoan" placeholder="nhập tài khoản"  value="' . $row['tai_khoan_game'] . '"  >
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="pass_acc">Mật khẩu</label>
                            </div>
                            <div class="inp">
                                <input type="password" id="pass_acc" name="pass_acc" placeholder="nhập Mật khẩu" value="' . $row['password_game'] . '"  >
                            </div>
        
                        </div>
        
                    </div>
                    <div class="col1">
                        <div class="tensp">
        
                            <label for="pass_acc">mô tả</label>
        
                            <div class="inp">
                                <textarea name="mo_ta" id="mo_ta" cols="auto" rows="auto"placeholder="nhập mô tả sản phẩm"   >' . $row['mo_ta'] . '</textarea>
                                <!-- <input type="text" id="pass_acc" name="pass_acc"    > -->
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="danh_muc">danh mục</label>
                            </div>
                            <div class="inp">
                                <select name="danh_muc" id="danh_muc"  value="' . $row['ma_loai'] . '"  >
                                    <option value="1">liên quân</option>
                                    <option value="2">liên minh </option>
                                    <option value="3">ngọc rồng </option>
                                    <option value="4">free fire </option>
                                </select>
                                <!-- <input type="" id="ngoc" name="ngoc" placeholder="ngọc sp"  > -->
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col_btn">
        
                        <div class="btn">
                            <button type="submit" name="submit_change"> Gửi</button>
                        </div>
                    </div>
                </div>';
            }
        }
    }
}

function upload_img_change()
{
    $flag  = false;
    if (isset($_POST['submit_change'])) {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $flag = false;
            //Bước 1: Tạo thư mục lưu file

            $error = array();
            $target_dir = "view/upload/";
            if (  $_FILES['fileUpload']['name'] != "") {
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
            }
     
            // upload 2
            if (isset($_FILES['fileUpload_1']['name'])&&  $_FILES['fileUpload_1']['name'] != "") {


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
            if (isset($_FILES['fileUpload_2']['name'])&&$_FILES['fileUpload_2']['name'] != "") {
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
            if (isset($_FILES['fileUpload_3']['name'])&&$_FILES['fileUpload_3']['name'] != "") {
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

            if (isset($_FILES['fileUpload_4']['name'])&&$_FILES['fileUpload_4']['name'] != "") {
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
            if (isset($_FILES['fileUpload_5']['name'])&&$_FILES['fileUpload_5']['name'] != "") {
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


}


function get_product($ma_sp, $hinh, $giasp, $rank, $tuong, $trang_phuc, $ngoc, $giam_gia, $mo_ta, $tai_khoan_game, $password_game, $today, $danh_muc, $hinh_1, $hinh_2, $hinh_3, $hinh_4, $hinh_5)
{
 
    if ($_SESSION['vai_tro'] == 'ctv' || $_SESSION['vai_tro'] == 'admin') {
        if ($hinh != "" ) {

            $sql_change_acc = " UPDATE `sp` SET  hinh='" . $hinh . "', giasp='" . $giasp . "', rank='" . $rank . "', tuong='" . $tuong . "', trang_phuc='" . $trang_phuc . "', ngoc='" . $ngoc . "', giam_gia='" . $giam_gia . "',ngay_nhap='" . $today . "',ma_loai='" . $danh_muc . "',ma_user='" . $_SESSION['ma_user'] . "',`tai_khoan_game`='" . $tai_khoan_game . "',`password_game`='" . $password_game . "'  WHERE ma_sp =" . $ma_sp . "";
            return pdo_execute($sql_change_acc);

            // $sql = "UPDATE `ct_sp` SET ,`mo_ta`='" . $mo_ta . "',`tai_khoan_game`='" . $tai_khoan_game . "',`password_game`='" . $password_game . "',`hinh_ct_1`='" . $hinh_1 . "',`hinh_ct_2`='" . $hinh_2 . "',`hinh_ct_3`='" . $hinh_3 . "',`hinh_ct_4`='" . $hinh_4 . "',`hinh_ct_5`='" . $hinh_5 . "' WHERE ma_sp =" . $ma_sp . "";
            // mysqli_query($conn, $sql);
        }
      else  if ($hinh != "" || $hinh_1  != "" || $hinh_2 != "" || $hinh_3 != "" || $hinh_4 != "" || $hinh_5 != "") {

            $sql_change_acc = " UPDATE `sp` SET `hinh_ct_1`='" . $hinh_1 ."|". $hinh_2 ."|". $hinh_3 ."|". $hinh_4 ."|" .$hinh_5. "', hinh='" . $hinh . "', giasp='" . $giasp . "', rank='" . $rank . "', tuong='" . $tuong . "', trang_phuc='" . $trang_phuc . "', ngoc='" . $ngoc . "', giam_gia='" . $giam_gia . "',ngay_nhap='" . $today . "',ma_loai='" . $danh_muc . "',ma_user='" . $_SESSION['ma_user'] . "',`tai_khoan_game`='" . $tai_khoan_game . "',`password_game`='" . $password_game . "'  WHERE ma_sp =" . $ma_sp . "";
            return pdo_execute($sql_change_acc);

            // $sql = "UPDATE `ct_sp` SET ,`mo_ta`='" . $mo_ta . "',`tai_khoan_game`='" . $tai_khoan_game . "',`password_game`='" . $password_game . "',`hinh_ct_1`='" . $hinh_1 . "',`hinh_ct_2`='" . $hinh_2 . "',`hinh_ct_3`='" . $hinh_3 . "',`hinh_ct_4`='" . $hinh_4 . "',`hinh_ct_5`='" . $hinh_5 . "' WHERE ma_sp =" . $ma_sp . "";
            // mysqli_query($conn, $sql);
        } else {
            $sql_change_acc = " UPDATE `sp` SET  giasp='" . $giasp . "', rank='" . $rank . "', tuong='" . $tuong . "', trang_phuc='" . $trang_phuc . "', ngoc='" . $ngoc . "', giam_gia='" . $giam_gia . "',ngay_nhap='" . $today . "',ma_loai='" . $danh_muc . "',`tai_khoan_game`='" . $tai_khoan_game . "',`password_game`='" . $password_game . "',ma_user='" . $_SESSION['ma_user'] . "'  WHERE ma_sp =" . $ma_sp . "";
         return pdo_execute($sql_change_acc);

            // $sql = "UPDATE `ct_sp` SET `mo_ta`='" . $mo_ta . "',`tai_khoan_game`='" . $tai_khoan_game . "',`password_game`='" . $password_game . "' WHERE ma_sp =" . $ma_sp . "";
            // mysqli_query($conn, $sql);
        }
        header("location:/duan/admin/");
    }
}
