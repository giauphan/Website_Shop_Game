<?php

namespace App\Models\admin;

use App\Models\database;

class ql_code_sale extends database
{
    public function ql_sale($id)
    {
        $sql = "SELECT * FROM `tbl_code_sale` where ma_kh =?";
        $query = $this->pdo_query($sql, $id);
        return $query;
    }
    

    public function sale($code, $price, $loai,$ma_user)
    {
        $sql_show = "SELECT * FROM `tbl_code_sale` where `code` like ? ";
        $check = true;
        $kq = $this->pdo_query($sql_show,$code);
        foreach ($kq as $row) {
            if ($row['code'] == $code) {
                $check = false;
            }
        }

        if ($check == false) {
            return false;
        } else {
            $sql = "INSERT INTO `tbl_code_sale`(  `code`, `price_sale`, `ma_loai`,`ma_kh`) VALUES (?,?,?,?)";
            $this->pdo_execute($sql, $code, $price, $loai,$ma_user);
            return true;
        }
    }

    public function change_sale($ma_loai, $ten_loai, $hinh_loai)
    {
        if ($hinh_loai != "") {
            $sql = "UPDATE `loai` SET `ten_loai`=?,`hinh_loai`=? WHERE ma_loai = ?";
            $this->pdo_execute($sql, $ten_loai, $hinh_loai, $ma_loai);
        } else {
            $sql = "UPDATE `loai` SET `ten_loai`=? WHERE ma_loai = ?";
            $this->pdo_execute($sql, $ten_loai, $ma_loai);
        }
        header("location:/duan/admin/?act=ql_category");
    }

    public function de_sale($id)
    {
        $sql = 'DELETE FROM `tbl_code_sale` WHERE ma_sale =?  ';
        $this->pdo_execute($sql, $id);
    }

    public function lock_up($id)
    {
        $sql = 'UPDATE FROM `tbl_code_sale` SET`status`="1" WHERE ma_sale = ?  ';
        $this->pdo_execute($sql, $id);
    }
}
