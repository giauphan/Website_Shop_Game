<?php

namespace App\Models\admin;

use App\Models\database;

class ql_code_sale extends database
{
    public function ql_sale()
    {
        $sql = "SELECT * FROM `tbl_code_sale` join loai on tbl_code_sale.ma_loai = loai.ma_loai ";
        $query = $this->pdo_query($sql);
        return $query;
    }
    

    public function sale($code, $price, $loai)
    {
        $sql_show = "SELECT * FROM `tbl_code_sale`  where `code` = ? ";
        $check = true;
        $kq = $this->pdo_query($sql_show,$code);
        if (sizeof($kq)>0) {
        foreach ($kq as $row) {
            if ($row['code'] == $code) {
                $check = false;
            }
        }  }

        if ($check == true) {
         
            $sql = "INSERT INTO `tbl_code_sale`(  `code`, `price_sale`, `ma_loai`) VALUES (?,?,?)";
            $this->pdo_execute($sql, $code, $price, $loai);
            return true;
        }
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
