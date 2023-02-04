<?php

function ql_sale()
{



    $sql = "SELECT * FROM `tbl_code_sale`";
    $query = pdo_query($sql);
    $i = 1;
    foreach ($query  as  $row) {

        echo ' <tr>
      <td>' . $i . '</td>
      <td>' . $row['code']  . '</td>
     <td>' . $row['price_sale'] . '</td>
   
   
      <td>

    
      <a class="edit" href="?act=add_sale&change=' . $row['ma_sale'] . '" title="" data-toggle="tooltip" data-original-title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
      <a class="delete" href ="?act=del_sale&de=' . $row['ma_sale'] . '"title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
  </td>
  
  </tr>';
        $i++;
    }
}



function sale($code, $price,$loai)
{
    $sql_show = "SELECT * FROM `tbl_code_sale` where `code` like ? ";
    $check = true;
    $kq = pdo_query($sql_show, '%'.$code.'%');
    foreach ($kq as $row) {
        if ($row['code'] == $code) {
            $check = false;
        }
    }

    if ($check == false) {
        return false;
    } else {
        $sql = "INSERT INTO `tbl_code_sale`(  `code`, `price_sale`, `ma_loai`) VALUES (?,?,?)";
        echo '<script>'.$sql.'<script>';
        pdo_execute($sql, $code, $price,$loai);
        return true;
    }
}


function change_sale($ma_loai, $ten_loai, $hinh_loai)
{

    if ($hinh_loai != "") {


        $sql = "UPDATE `loai` SET `ten_loai`='" . $ten_loai . "',`hinh_loai`='" . $hinh_loai . "' WHERE ma_loai = " . $ma_loai . "";
        pdo_execute($sql);
    } else {
        $sql = "UPDATE `loai` SET `ten_loai`='" . $ten_loai . "' WHERE ma_loai = " . $ma_loai . "";
        pdo_execute($sql);
    }
    header("location:/duan/admin/?act=ql_category");
}
function show_change_sale()
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
                            <input type="file" id="fileUpload" name="fileUpload" placeholder="ảnh danh mục " required>
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="ten_loai">Tên danh mục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="text" id="ten_loai" name="ten_loai" value="' . $row['ten_loai'] . '" placeholder="nhập Tên danh mục " required min="0">
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

function de_sale($id)
{
    $conn = po_con();
    $sql = 'DELETE FROM `tbl_code_sale` WHERE ma_sale = "' . $id .  '"  ';
    mysqli_query($conn, $sql);
}



