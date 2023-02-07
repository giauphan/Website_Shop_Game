<?php

namespace App\Models\admin;

use App\Models\database;

class homeModels extends database
{

    function show_sp_admin()
    {
        if (isset($_GET['game_id']) && isset($_GET['trang_thai']) && isset($_GET['moneymin']) && isset($_GET['moneymax']) && isset($_GET['Field01'])  && isset($_GET['Field02'])) {

            $query = "SELECT * FROM `user`join sp  join loai on loai.ma_loai = sp.ma_loai  and sp.ma_user = user.ma_kh  WHERE ma_kh = " . $_SESSION['ma_user'] . "  ";

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
            $sql = $this->pdo_query($query);
        } else {
            $query = 'SELECT * FROM `user`join sp  join loai WHERE ma_kh = ' . $_SESSION['ma_user'] . ' and loai.ma_loai = sp.ma_loai ORDER BY sp.ma_loai ASC';


            $sql = $this->pdo_query($query);
        }
        return $sql;
    }

    function de_sp($id)
    {
        $sql_sp = 'DELETE FROM `sp` WHERE ma_sp = ?  ';
        $this->pdo_execute($sql_sp,$id);
    }
    public function check_product()
    {
        $sql = 'SELECT * FROM `sp` WHERE ma_sp  IN (SELECT ma_sp FROM donhang WHERE sp.ma_sp = donhang.ma_sp)';
        return $this->pdo_query($sql);
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
            $this->pdo_query($sql, $price_min, $price_max);
        } else {
            $sql = 'SELECT * FROM `sp` WHERE giasp = ? ';
            $this->pdo_query($sql, $price_min);
        }
    }
}
