<?php



function show_sp_admin()
{
    $conn = po_con();

    if (isset($_SESSION['ma_user'])) {
        // if (isset($_GET['keyword'])) {
        //     $keyword = $_GET['keyword'];
        //     if ($_GET['keyword'] != "") {

        //         $keyword = explode('-', $keyword);

        //         $keyword = $keyword[0];

        //         $keyword_max = null;
        //         if (isset($keyword[1])) {
        //             $keyword_max = $keyword[1];
        //         }
        //         if ($keyword_max == null) {
        //             $query = "SELECT * FROM  `user`join `sp` join loai on  ma_kh =  " . $_SESSION['ma_user'] . " and loai.ma_loai = sp.ma_loai  WHERE trang_thai_sp = " . $_GET['keyword'] . "  or ma_sp = " . $_GET['keyword'] . " or giasp = " . $_GET['keyword'] . "  or rank like '%" . $_GET['keyword']  . "%' or ngoc = " . $_GET['keyword'] . "  ORDER BY ma_sp ASC";
        //         } else {
        //             $query = "SELECT * FROM  `user`join `sp` join loai on  ma_kh =  " . $_SESSION['ma_user'] . " and loai.ma_loai = sp.ma_loai  WHERE trang_thai_sp = " . $_GET['keyword'] . "  or ma_sp = " . $_GET['keyword'] . " or giasp = " . $_GET['keyword'] . " and   giasp = " . $keyword_max . " or rank like '%" . $_GET['keyword']  . "%' or ngoc = " . $_GET['keyword'] . "  ORDER BY ma_sp ASC";
        //         }
        //     } else {
        //         $query = 'SELECT * FROM `user`join sp  join loai WHERE ma_kh = ' . $_SESSION['ma_user'] . ' and loai.ma_loai = sp.ma_loai ORDER BY ma_sp ASC';
        //     }
        // } 

        if (isset($_GET['game_id']) && isset($_GET['trang_thai']) && isset($_GET['moneymin']) && isset($_GET['moneymax']) && isset($_GET['Field01'])  && isset($_GET['Field02'])) {



            $query = "SELECT * FROM `user`join sp  join loai  WHERE ma_user = " . $_SESSION['ma_user'] . " and loai.ma_loai = sp.ma_loai ";

            if ($_GET['game_id'] != "") {

                $query .= " and ma_sp = '" . $_GET['game_id'] . "' ";
            }

            if ($_GET['trang_thai'] != "") {

                $query .= " and trang_thai_sp = '" . $_GET['trang_thai'] . "' ";
            }

            if ($_GET['moneymin'] != "" && $_GET['moneymax'] != null) {

                $query .= " and giasp >=' " . $_GET['moneymin'] . "' and  giasp <= '" . $_GET['moneymax'] . "' ";
            } else if ($_GET['moneymin'] != "") {

                $query .= "and giasp >= '" . $_GET['moneymin']  . "' ";
            }

            if ($_GET['Field01']  != "") {

                $query .= "and rank like '%" . $_GET['Field01']  . "%' ";
            }

            if ($_GET['Field02']  != "") {

                $query .= "and ngoc = '" . $_GET['Field02'] . "' ";
            }
            $query .= ' ORDER BY sp.ma_loai ASC';
        } else {
            $query = 'SELECT * FROM `user`join sp  join loai WHERE ma_kh = ' . $_SESSION['ma_user'] . ' and loai.ma_loai = sp.ma_loai ORDER BY sp.ma_loai ASC';
        }



        $run_user = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($run_user)) {

            if ($_SESSION['ma_user'] == $row['ma_kh'] &&  $row['ma_kh']  ==  $row['ma_user']) {


                // $slq_showsp = 'SELECT * FROM `sp`';
                // $run_shopsp = mysqli_query($conn, $slq_showsp);

                // $retVal = ($row['ngoc'] == 0) ?  "có" : "không";
                $trang_thai = ($row['trang_thai_sp'] == 0) ?  "Chưa bán" : "Đã bán";
                echo '   <tr>
        <td>' . $row['ma_sp'] . '</td>
        <td><img src="/duan/admin/view/upload/' . $row['hinh'] . '" width="100%" heght="auto"></td>
        <td>  ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ</td>
      
        <td>' .   $trang_thai . '</td>
        <td>' . ($row['giam_gia']) . '%</td>
    
  <td>' . $row['ngay_nhap'] . '</td>


        <td>' . $row['ten_loai'] . '</td>
        <td>
        <a class="edit" href="?act=change_product&change=' . $row['ma_sp'] . '" title="" data-toggle="tooltip" data-original-title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a class="delete" href="?act=del_sp&de=' . $row['ma_sp'] . '" title="Xóa" data-toggle="tooltip"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
        </td>
    </tr>';
            }
        }
    }
}
// <td>' . $row['rank'] . '</td>

// <td>' . $row['mo_ta'] . '</td>
// <td>' . $row['tuong'] . '</td>sea
// <td>' . $row['trang_phuc'] . '</td>
// <td>' . $retVal . '</td>
function de_sp($id)
{
    $conn = po_con();
    $sql_sp = 'DELETE FROM `ct_sp` WHERE ma_sp = "' . $id .  '"  ';
    mysqli_query($conn, $sql_sp);
    $sql_sp = 'DELETE FROM `sp` WHERE ma_sp = "' . $id .  '"  ';
    mysqli_query($conn, $sql_sp);
}

function get_price($price)
{
    $price = explode('-', $price);

    $price_min = $price[0];

    $price_max = null;
    if (isset($price[1])) {
        $price_max = $price[1];
    }
    if ($price_max == null) {
        $sql = 'SELECT * FROM `sp` WHERE giasp = ? and giasp = ?';
        pdo_query($sql, $price_min, $price_max);
    } else {
        $sql = 'SELECT * FROM `sp` WHERE giasp = ? ';
        pdo_query($sql, $price_min);
    }
}
function get_search($ma_sp, $price_min, $trang_thai, $price_max, $rank_seach, $ngoc_seach)
{
    header("Location:?danhmuc=" . $_GET['danhmuc'] . "&game_id=" . $ma_sp . "&trang_thai=" . $trang_thai . "&moneymin=" . $price_min . "&moneymax=" . $price_max . "&Field01=" . $rank_seach . "&Field02=" . $ngoc_seach . "");
}
function get_money()
{
    if (isset($_SESSION['ma_user'])) {
        $conn = po_con();
        $showtien = 'SELECT tien,email FROM `user` WHERE ma_kh = "' . $_SESSION['ma_user'] . '" ';
        $runshowtien = mysqli_query($conn, $showtien);
        $tien = 0;
        while ($rowtien = mysqli_fetch_assoc($runshowtien)) {
            $tien = $rowtien['tien'];
        }
        return $tien;
    }
}
