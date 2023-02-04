<?php



function show_sp_admin()
{

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
    $sql = pdo_query($query);
    return $sql;
}

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
